<?php
/**
 * Magegiant
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the magegiant.com license that is
 * available through the world-wide-web at this URL:
 * http://magegiant.com/license-agreement/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Magegiant
 * @package     Magegiant_GiantPoints
 * @copyright   Copyright (c) 2014 Magegiant (http://magegiant.com/)
 * @license     http://magegiant.com/license-agreement/
 */

/**
 *
 * @category     Magegiant
 * @package     Magegiant_GiantPoints
 * @author      Magegiant Developer
 */
class Magegiant_GiantPoints_Block_Adminhtml_Rate_Renderer_Grid_Money
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return Mage::app()->getStore()->getBaseCurrency()->format($row->getMoney());
    }
}
