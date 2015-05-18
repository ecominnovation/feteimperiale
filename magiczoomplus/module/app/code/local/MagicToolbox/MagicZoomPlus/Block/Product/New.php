<?php

class MagicToolbox_MagicZoomPlus_Block_Product_New extends Mage_Catalog_Block_Product_New {

    protected function _toHtml() {

        $_productCollection = $this->getProductCollection();
        if($_productCollection && $_productCollection->getSize()) {
            $magicToolboxHelper = Mage::helper('magiczoomplus/settings');
            $tool = $magicToolboxHelper->loadTool('newproductsblock');
            if(!$tool->params->checkValue('enable-effect', 'No')) {
                $contents = parent::_toHtml();
                $group = 'newproductsblock';
                require(Mage::getSingleton('core/design_package')->getTemplateFilename('magiczoomplus'.DS.'magictoolbox_list.phtml'));
                return $contents;
            }
        }
        return parent::_toHtml();

    }

}