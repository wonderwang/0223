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
 * Giantpoints Grid Block
 *
 * @category    Magegiant
 * @package     Magegiant_GiantPoints
 * @author      Magegiant Developer
 */
class Magegiant_GiantPointsRefer_Block_Adminhtml_Invitation_Renderer_Customer
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Render customer info to grid column html
     * 
     * @param Varien_Object $row
     */
    public function render(Varien_Object $row)
    {
        $actionName = $this->getRequest()->getActionName();
        $customer_email=Mage::getModel('customer/customer')->load($row->getReferralId())->getEmail();
        if (strpos($actionName, 'export') === 0) {
            return $customer_email;
        }
        return sprintf('<a target="_blank" href="%s">%s</a>',
            $this->getUrl('adminhtml/customer/edit', array('id' => $row->getReferralId())),
            $customer_email
        );
    }
}
