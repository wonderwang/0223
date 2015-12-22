<?php

class MagicToolbox_MagicZoomPlus_Block_Header extends Mage_Core_Block_Template {

    protected $pageType = '';

    public function _construct() {
        $this->setTemplate('magiczoomplus/header.phtml');
    }

    public function setPageType($pageType = '') {
        $this->pageType = $pageType;
    }

    public function getPageType() {
        return $this->pageType;
    }

}
