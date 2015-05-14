<?php

class MagicToolbox_MagicZoomPlus_Block_Adminhtml_Settings extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_blockGroup = 'magiczoomplus';//module name
        $this->_controller = 'adminhtml_settings';//the path to your block class
        $this->_headerText = Mage::helper('magiczoomplus')->__('Magic Zoom Plus&#8482; settings');
        parent::__construct();
        $this->setTemplate('magiczoomplus/settings.phtml');

    }

    protected function _prepareLayout() {

        $this->setChild('settings_grid', $this->getLayout()->createBlock('magiczoomplus/adminhtml_settings_grid', 'magiczoomplus.grid'));
        $this->setChild('custom_design_settings_form', $this->getLayout()->createBlock('magiczoomplus/adminhtml_settings_form', 'magiczoomplus.form'));
        return parent::_prepareLayout();

    }

    public function getAddCustomSettingsFormHtml() {

        $html = $this->getChildHtml('custom_design_settings_form');
        if(Mage::registry('magiczoomplus_custom_design_settings_form')) {
            return $html;
        } else {
            return '';
        }

    }

    public function getSettingsGridHtml() {

        return $this->getChildHtml('settings_grid');

    }

}
