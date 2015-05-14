var magicToolboxLinks = [];
var optionLabels = {};
var optionTitles = {};
var optionProductIDs = {};
var choosedOptions = {};
//var magicToolboxProductId = 0;//defined in header.phtml
//var magicToolboxOptionTitles = '';//defined in header.phtml
//var magicToolboxSwitchMetod = 'click';//defined in header.phtml
//var magicToolboxMouseoverDelay = 0;//defined in header.phtml

var allowMagicToolboxChange = true;

function magicToolboxPrepareOptions() {
    var productId;
    if(typeof optionsPrice.productId != 'undefined') {
        productId = optionsPrice.productId;
    } else {
        var inputs = document.getElementsByName('product');
        if(inputs.length) {
            productId = inputs[0].value;
        } else {
            productId = magicToolboxProductId;
        }
    }
    var container = document.getElementById('MagicToolboxSelectors'+productId);
    if(container) magicToolboxLinks = container.getElementsByTagName('a');

    //for products with options
    for(var optionID in optionLabels) {
        var elements = document.getElementsByName('options['+optionID+']');
        if(elements) {
            for(var i = 0, l = elements.length; i < l; i++) {
                var eventType = (elements[i].type == 'radio') ? 'click' : 'change';
                $mjs(elements[i])[magicAddEvent](eventType, function(e) {
                    var objThis = e.target || e.srcElement;
                    var optionID = objThis.name.replace('options[', '').replace(']', '');
                    magicToolboxOnChangeOption(objThis, optionTitles[optionID]);
                });
            }
        }
    }

    //for configurable products
    if(typeof spConfig != 'undefined' && typeof spConfig.config.attributes != 'undefined') {
        for(var attributeID in spConfig.config.attributes) {
            optionLabels[attributeID] = {};
            optionProductIDs[attributeID] = {};
            optionTitles[attributeID] = spConfig.config.attributes[attributeID].label.toLowerCase();
            for(var optionID in spConfig.config.attributes[attributeID].options) {
                var option = spConfig.config.attributes[attributeID].options[optionID];
                if(typeof option == 'object') {
                    optionLabels[attributeID][option.id] = option.label.replace(/(^\s+)|(\s+$)/g, "")/*.replace(/"/g, "'")*/.toLowerCase();
                    optionProductIDs[attributeID][option.id] = {};
                    for(var i = 0, productsLength = option.products.length; i < productsLength; i++) {
                        optionProductIDs[attributeID][option.id][i] = option.products[i];
                    }
                }
            }
            //NOTE: for select in configurable.phtml
            var selectEl = document.getElementById('attribute'+attributeID);
            if(selectEl) {
                $mjs(selectEl)[magicAddEvent]('change', function(e) {
                    var objThis = e.target || e.srcElement;
                    var attrID = objThis.id.replace('attribute', '');
                    magicToolboxOnChangeOptionConfigurable(objThis, optionTitles[attrID]);
                });
            }
        }
    }
    //if(typeof opConfig != 'undefined') opConfig.reloadPrice();

    //for magic360 products
    if(document.getElementById('magic360Container'))
    for(var j = 0, linksLength = magicToolboxLinks.length; j < linksLength; j++) {
        $mjs(magicToolboxLinks[j])[magicAddEvent](magicToolboxSwitchMetod, function(e) {
            var objThis = e.target || e.srcElement;
            if(objThis.tagName.toLowerCase() == 'img') {
                objThis = objThis.parentNode;
            }
            var isMagic360Visible = document.getElementById('magic360Container').style.display != 'none';
            var isThisMagic360Selector = objThis.className.match(new RegExp('(?:\\s|^)magic360selector(?:\\s|$)'));
            if(isThisMagic360Selector && !isMagic360Visible) {
                document.getElementById('mainImageContainer').style.display = 'none';
                document.getElementById('magic360Container').style.display = 'block';
            } else if(isMagic360Visible && (!isThisMagic360Selector || magicToolboxLinks.length == 1 ||
                magicToolboxLinks[0].className.match(new RegExp('(?:\\s|^)magic360selector(?:\\s|$)')) &&
                magicToolboxLinks[1].className.match(/(?:\s|^)hidden\-selector(?:\s|$)/)))
            {
                document.getElementById('magic360Container').style.display = 'none';
                document.getElementById('mainImageContainer').style.display = 'block';
                if(magicToolboxTool == 'magicmagnify') {
                    if(!isThisMagic360Selector) {
                        MagicMagnify.stop();
                        var a = document.getElementById('MagicMagnifyImage'+productId);
                        a.href = objThis.href;
                        a.firstChild.src = objThis.rev;
                        MagicMagnify.start();
                    }
                } else if(magicToolboxTool == 'magicmagnifyplus') {
                    if(!isThisMagic360Selector) {
                        MagicMagnifyPlus.stop();
                        var a = document.getElementById('MagicMagnifyPlusImage'+productId);
                        a.href = objThis.href;
                        a.firstChild.src = objThis.rev;
                        MagicMagnifyPlus.start();
                    }
                }
            }
            return false;
        });
    }

}

function magicToolboxClickElement(element, eventType, eventName) {
    var event;
    if(document.createEvent) {
        event = document.createEvent(eventType);
        event.initEvent(eventName, true, true);
        element.dispatchEvent(event);
    } else {
        event = document.createEventObject();
        event.eventType = eventType;
        element.fireEvent('on' + eventName, event);
    }
    return event;
}

function magicToolboxOnChangeOption(element, optionTitle) {

    if(!allowMagicToolboxChange) {
        allowMagicToolboxChange = true;
        return;
    }

    if(magicToolboxInArray(optionTitle, magicToolboxOptionTitles)) {
        var id = '';
        if(element.type == 'radio' && element.checked) {
            id = element.name.replace('options[', '').replace(']', '');
        } else if(element.type == 'select-one') {
            id = element.id.replace('select_', '').replace('attribute', '');
        } else {
            return;
        }
        if(element.value == '' || (typeof optionLabels[id][element.value] == 'undefined')) {
            return;
        }
        var label = optionLabels[id][element.value];
        for(var j = 0, linksLength = magicToolboxLinks.length; j < linksLength; j++) {
            if(magicToolboxLinks[j].firstChild.getAttribute('alt').replace(/(^\s+)|(\s+$)/g, "")/*.replace(/"/g, "'")*/.toLowerCase() == label) {
                allowMagicToolboxChange = false;
                magicToolboxClickElement(magicToolboxLinks[j], 'MouseEvents', magicToolboxSwitchMetod);
                break;
            }
        }
    }

}

function magicToolboxOnChangeSelector(a) {
    if(!allowMagicToolboxChange) {
        allowMagicToolboxChange = true;
        return;
    }
    var label = a.firstChild.getAttribute('alt').replace(/(^\s+)|(\s+$)/g, "").toLowerCase();
    var reloadPrice = false;
    for(var optionID in optionLabels) {
        for(var optionValue in optionLabels[optionID]) {
            if(optionLabels[optionID][optionValue] == label && magicToolboxInArray(optionTitles[optionID], magicToolboxOptionTitles)) {
                var elementNames = ['options['+optionID+']', 'super_attribute['+optionID+']'];
                for(var elementNameIndex = 0, elementNamesLength = elementNames.length; elementNameIndex < elementNamesLength; elementNameIndex++) {
                    var elements = document.getElementsByName(elementNames[elementNameIndex]);
                    for(var i = 0, l = elements.length; i < l; i++) {
                        if(elements[i].type == 'radio') {
                            if(elements[i].value == optionValue) {
                                setTimeout(function(element) {
                                    return function() {
                                        var radios = document.getElementsByName(element.name);
                                        for(var radioIndex = 0, radiosLength = radios.length; radioIndex < radiosLength; radioIndex++) {
                                            radios[radioIndex].checked = false;
                                        }
                                        element.checked = true;
                                        allowMagicToolboxChange = false;
                                        magicToolboxClickElement(element, 'Event', 'click');
                                    }
                                }(elements[i]), magicToolboxMouseoverDelay);
                                return;
                            }
                        } else if(elements[i].type == 'select-one') {
                            if(elements[i].options && !elements[i].disabled) {
                                for(var j = 0, k = elements[i].options.length; j < k; j++) {
                                    if(elements[i].options[j].value == optionValue) {
                                        setTimeout(function(element, optionValue) {
                                            return function() {
                                                element.value = optionValue;
                                                element.selectedIndex = j;
                                                allowMagicToolboxChange = false;
                                                magicToolboxClickElement(element, 'Event', 'change');
                                            }
                                        }(elements[i], elements[i].options[j].value), magicToolboxMouseoverDelay);
                                        return;
                                    }
                                }
                            }
                        } else {
                            break;
                        }
                    }
                }
            }
        }
    }
}

function magicToolboxOnChangeSelectorConfigurable(a) {
    if(!allowMagicToolboxChange) {
        allowMagicToolboxChange = true;
        return;
    }
    if(typeof useAssociatedProductImages != 'undefined') {
        var productId = a.getAttribute('data-id');
        var options = magicToolboxFindOptions(productId);
        if(typeof(spConfig) != 'undefined' && typeof(spConfig.settings) != 'undefined') {
            setTimeout(function(options) {
                return function() {
                    magicToolboxChangeOptions(0, options);
                }
            }(options), magicToolboxMouseoverDelay);
        }
    }
}

function magicToolboxFindOptions(associatedProductId) {
    var options = {};
    for(var attributeId in optionProductIDs) {
        for(var optionId in optionProductIDs[attributeId]) {
            for(var i in optionProductIDs[attributeId][optionId]) {
                if(associatedProductId == optionProductIDs[attributeId][optionId][i]) {
                    options[attributeId] = optionId;
                }
            }
        }
    }
    return options;
}

function magicToolboxChangeOptions(i, options) {
    var select = spConfig.settings[i];
    var attributeId = select.id.replace(/[a-z]*/, '');
    if(select.options && !select.disabled) {
        for(var j = 0; j < select.options.length; j++) {
            if(select.options[j].value == options[attributeId]) {
                select.value = select.options[j].value;
                select.selectedIndex = j;

                if(select.childSettings) {
                    for(var k = 0; k < select.childSettings.length; k++) {
                        var childAttributeId = select.childSettings[k].id.replace(/[a-z]*/, '');
                        if(typeof choosedOptions[childAttributeId] != 'undefined') {
                            delete choosedOptions[childAttributeId];
                        }
                    }
                }
                choosedOptions[attributeId] = select.value;

                allowMagicToolboxChange = false;
                magicToolboxClickElement(select, 'Event', 'change');
                i++;
                if(i < spConfig.settings.length) {
                    setTimeout(function(i, options) {
                        return function() {
                            magicToolboxChangeOptions(i, options);
                        }
                    }(i, options), 100);
                }
                return;
            }
        }
    }
}

function magicToolboxInArray(needle, haystack) {
    var o = {};
    for(var i = 0, l = haystack.length; i < l; i++) {
        o[haystack[i]] = '';
    }
    if(needle in o) {
        return true;
    }
    return false;
}

function magicToolboxOnChangeOptionConfigurable(element, optionTitle) {

    if(!allowMagicToolboxChange) {
        allowMagicToolboxChange = true;
        return;
    }

    if(typeof useAssociatedProductImages != 'undefined') {

        var attributeId = element.id.replace(/[a-z]*/, '');

        if(typeof choosedOptions[attributeId] != 'undefined') {
            delete choosedOptions[attributeId];
        }

        //clear child elements in choosedOptions
        if(element.childSettings) {
            for(var i=0,l= element.childSettings.length;i<l;i++){
                var childAttributeId = element.childSettings[i].id.replace(/[a-z]*/, '');
                if(typeof choosedOptions[childAttributeId] != 'undefined') {
                    delete choosedOptions[childAttributeId];
                }
            }
        }

        var configurableProductId = spConfig.config.productId;
        //var mainSelectorImage = document.getElementById('imageMain'+configurableProductId);

        if(element.value.length === 0) {
            //if(mainSelectorImage) {
            //    mainSelectorImage.parentNode.click();
            //}
            return;
        }

        var associatedProductId = magicToolboxFindProduct(attributeId, element.value);
        //add new option or replace one
        choosedOptions[attributeId] = element.value;

        var associatedImage = document.getElementById('imageConfigurable'+associatedProductId);
        if(associatedImage) {
            //associatedImage.parentNode.click();
            allowMagicToolboxChange = false;
            magicToolboxClickElement(associatedImage.parentNode, 'MouseEvents', magicToolboxSwitchMetod);
            return;
        } else {
            /*if(mainSelectorImage) {
                //mainSelectorImage.parentNode.click();
                allowMagicToolboxChange = false;
                magicToolboxClickElement(mainSelectorImage.parentNode, 'MouseEvents', magicToolboxSwitchMetod);
            }
            return;*/
        }

    }

    magicToolboxOnChangeOption(element, optionTitle);

}

function magicToolboxFindProduct(attributeId, optionId) {

    for(var i in optionProductIDs[attributeId][optionId]) {
        //product associated with current option
        var pId = optionProductIDs[attributeId][optionId][i];
        for(var attrId in choosedOptions) {
            //selected option's ID
            var optId = choosedOptions[attrId];
            for(var j in optionProductIDs[attrId][optId]) {
                if(pId == optionProductIDs[attrId][optId][j]) {
                    optId = null;
                    break;
                }
            }
            if(optId != null) {
                pId = null;
                break;
            }
        }
        if(pId != null) {
            return pId;
        }
    }
    return optionProductIDs[attributeId][optionId][0];

}

//NOTE: add "PRESELECT COLORS PLUS SWATCHES" support (#58917)
if(typeof(colorSelected) == 'function') {
    function get_image_name(str) {
        return str.replace(/.*\/(.*?)$/i,'$1');
    }
    var colorSelectedBusy = false;
    window['old_colorSelected'] = window['colorSelected'];
    window['colorSelected'] = function() {
        jQuery('#image').attr('style', 'position:absolute;top:-10000px;');
        old_colorSelected.apply(undefined, arguments);
        if(!colorSelectedBusy) {
            jQuery('.MagicToolboxSelectorsContainer a:not([rel=""])').each(function() {
                if(get_image_name(jQuery(this).attr('href')) == get_image_name(jQuery('#image').attr('src'))) {
                    magicToolboxClickElement(this, 'MouseEvents', magicToolboxSwitchMetod);
                }
            });
        }
    }
    window['old_magicToolboxOnChangeSelector'] = window['magicToolboxOnChangeSelector'];
    window['magicToolboxOnChangeSelector'] = function() {
        old_magicToolboxOnChangeSelector.apply(undefined, arguments);
        jQuery('li.swatchContainer img[onclick*="'+get_image_name(jQuery(arguments[0]).attr('href'))+'"]').each(function() {
            colorSelectedBusy = true;
            eval(jQuery(this).attr('onclick'));
            colorSelectedBusy = false;
        });
    }
}
