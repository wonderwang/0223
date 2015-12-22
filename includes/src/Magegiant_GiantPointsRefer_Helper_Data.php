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
 * @package     MageGiant_GiantPointsRefer
 * @copyright   Copyright (c) 2014 MageGiant (http://magegiant.com/)
 * @license     http://magegiant.com/license-agreement/
 */

/**
 * GiantPointsRefer Helper
 *
 * @category    MageGiant
 * @package     MageGiant_GiantPointsRefer
 * @author      MageGiant Developer
 */
class Magegiant_GiantPointsRefer_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function checkReferralOrderConfig($store = null)
    {
        if (!Mage::helper('giantpointsrefer/config')->isEnabled($store))
            return false;
        $referralConfig = Mage::helper('giantpointsrefer/config');
        $pointForOrder  = $referralConfig->getPointForOrderConfig($store);
        if ($pointForOrder == Magegiant_GiantPoints_Model_System_Config_Source_PointForOrder::FIRST_ORDER_ONLY) {
            $cookie     = Mage::getModel('giantpoints/cookie');
            $cookie_key = Magegiant_GiantPoints_Model_Cookie::COOKIE_GIANTPOINT_REFERRAL;
            $cookie->setCookie($cookie_key, '');
        }
    }

}