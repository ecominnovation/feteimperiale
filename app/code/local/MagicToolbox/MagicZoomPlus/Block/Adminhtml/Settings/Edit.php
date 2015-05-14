<?php

class MagicToolbox_MagicZoomPlus_Block_Adminhtml_Settings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {

        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'magiczoomplus';//module name
        $this->_controller = 'adminhtml_settings';//the path to your block class

        $this->_removeButton('delete');

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit(\''.$this->getSaveAndContinueUrl().'\')',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(urlTemplate) {
                var template = new Template(urlTemplate, /(^|.|\\r|\\n)({{(\w+)}})/);
                var url = template.evaluate({tab_id:magiczoomplus_config_tabsJsTabs.activeTab.id.replace('magiczoomplus_config_tabs_', '')});
                editForm.submit(url);
            }
        ";

    }

    public function getHeaderText() {

        //$package = Mage::registry('magiczoomplus_model_data')->getPackage();
        //$theme = Mage::registry('magiczoomplus_model_data')->getTheme();
        //return Mage::helper('magiczoomplus')->__("Edit setting for <i>%s</i> package".($package=='all'?"s":"").", <i>%s</i> theme".($theme=='all'?"s":""), $this->htmlEscape($package), $this->htmlEscape($theme));
        $title = Mage::registry('magiczoomplus_model_data')->getCustom_settings_title();
        return Mage::helper('magiczoomplus')->__("%s", $this->htmlEscape($title));

    }

    public function getValidationUrl() {

        return $this->getUrl('*/*/validate', array(
            '_current'  => false
        ));

    }

    public function getSaveAndContinueUrl() {

        return $this->getUrl('*/*/save', array(
            '_current'  => true,
            'back'      => 'edit',
            'tab'       => '{{tab_id}}'
        ));

    }

}
