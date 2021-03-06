<?php
/**
 * MageGiant
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MageGiant.com license that is
 * available through the world-wide-web at this URL:
 * http://magegiant.com/license-agreement/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    MageGiant
 * @package     MageGiant_GiantPoints
 * @copyright   Copyright (c) 2014 MageGiant (http://magegiant.com/)
 * @license     http://magegiant.com/license-agreement/
 */

/**
 * Giantpoints Model
 *
 * @category    MageGiant
 * @package     MageGiant_GiantPoints
 * @author      MageGiant Developer
 */
class Magegiant_GiantPointsRefer_Model_Config extends Mage_Adminhtml_Model_Config
{
    /**
     * init config for behavior
     */
    protected function _initSectionsAndTabs()
    {
        $mergeConfig = Mage::getModel('core/config_base');

        $config = Mage::getConfig()->loadModulesConfiguration('referral.xml');

        $this->_sections = $config->getNode('sections');

        $this->_tabs = $config->getNode('tabs');
    }

}
