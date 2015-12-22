<?php

class Magegiant_GiantPointsBehavior_Model_Rule_Action_Social_Purchase_Facebook_Share extends Magegiant_GiantPointsBehavior_Model_Rule_Action_Social_Purchase_Abstract implements Magegiant_GiantPoints_Model_Rule_Action_Interface
{
    const ACTION_CODE = 'giantpoints_customer_purchase_facebook_share';


    public function getCustomerConditions()
    {
        return array(
            self::ACTION_CODE => Mage::helper('giantpoints')->__('Shares a purchase on Facebook'),
        );
    }


}