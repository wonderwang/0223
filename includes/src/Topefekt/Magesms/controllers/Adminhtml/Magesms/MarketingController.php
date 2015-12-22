<?php
/**
 * Mage SMS - SMS notification & SMS marketing
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the BSD 3-Clause License
 * It is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/BSD-3-Clause
 *
 * @category    TOPefekt
 * @package     TOPefekt_Magesms
 * @copyright   Copyright (c) 2012-2015 TOPefekt s.r.o. (http://www.mage-sms.com)
 * @license     http://opensource.org/licenses/BSD-3-Clause
 */
 class Topefekt_Magesms_Adminhtml_Magesms_MarketingController extends Topefekt_Magesms_Controller_Template_Action { private $vdc6442a8b0624835ef0da7b7fcc0ac1da4d6d2da = array('type', 'country', 'group', 'gender', 'newsletter', 'website', 'firstname', 'lastname', 'city', 'register', 'birthday', 'birthdayall', 'orderssum', 'product'); protected $_filters; protected $_collection; private $v148194b5b9cc653ce2e35e9709e441dc6fd4123a = array(); public function preDispatch() { parent::preDispatch(); $ia309f32db02d9de4490b0dcce975d0ccbce2c215 = Mage::helper('adminhtml')->prepareFilterString($this->getRequest()->getParam('sms')); $ia309f32db02d9de4490b0dcce975d0ccbce2c215 = $this->_filterDates($ia309f32db02d9de4490b0dcce975d0ccbce2c215, array('datumodesl')); $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Object(); foreach ($ia309f32db02d9de4490b0dcce975d0ccbce2c215 as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { if (!empty($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) || is_numeric($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89)) { $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a->setData($i670253c23c6fcba76bc4256a88fdd8fbc1041039, $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); } } $this->_smsData = $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a; return $this; return $this; } private function f6d43ff809a46f71c1e634564f2b37e20a99bbb9c() { $this->_filters = Mage::getModel('magesms/marketing_filter_collection'); $this->_filters->addFilters($this->vdc6442a8b0624835ef0da7b7fcc0ac1da4d6d2da); Mage::register('magesms_marketing_filters', $this->_filters, true); $this->_collection = $this->_getCollection(); $this->_filters->setCollection($this->_collection); $this->_filters->setFilters($this->_collection); Mage::register('magesms_marketing_collection', $this->_collection, true); } public function indexAction() { $this->_initAction(); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i5509ac707290a86add15ab0ce4da982d395f4c4f = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/marketing.phtml') ); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setSmsData($this->_smsData ? $this->_smsData : $this->getRequest()->getParams()); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setFilterData($this->_filterData); $i7d411c0cc32cdb65ec82b9e8d79aa996946f553842c5963b49dec2d3a886ec5045e3b8e035c239f = '{customer_firstname}, {customer_lastname}, {customer_email}, {customer_phone}, {shop_name}, {shop_domain}, {shop_email}, {shop_phone}'; $i1ec93d6cdf7202ea32d00997e9d5b5a68e2df3bc = '{coupon_name}, {coupon_code}, {coupon_description}, {coupon_reduction_percent}, {coupon_reduction_amount}, {coupon_reduction_currency}, {coupon_date_start}, {coupon_date_end}, {coupon_quantity}'; $i5509ac707290a86add15ab0ce4da982d395f4c4f->setNotice($i7d411c0cc32cdb65ec82b9e8d79aa996946f553842c5963b49dec2d3a886ec5045e3b8e035c239f); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setCouponsNotice($i1ec93d6cdf7202ea32d00997e9d5b5a68e2df3bc); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setTranslate(Mage::helper('magesms')->hookVariablesJS($i7d411c0cc32cdb65ec82b9e8d79aa996946f553842c5963b49dec2d3a886ec5045e3b8e035c239f.', '.$i1ec93d6cdf7202ea32d00997e9d5b5a68e2df3bc)); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setCollection($this->_collection); $i3e3a0f2ae6a0c8837eef43b5d93ce2acef452442 = Mage::getModel('salesrule/rule')->getCollection() ->addFieldToFilter('is_active', 1) ->addFieldToFilter('coupon_type', Mage_SalesRule_Model_Rule::COUPON_TYPE_SPECIFIC); $ic6e86aba1bc36abbc0265f7e37437aa716c170c0 = array(array('id' => '', 'name' => '- '.Mage::helper('magesms')->__('Please Select').' -')); $ic6e86aba1bc36abbc0265f7e37437aa716c170c0 = array_merge($ic6e86aba1bc36abbc0265f7e37437aa716c170c0, $i3e3a0f2ae6a0c8837eef43b5d93ce2acef452442->getData()); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setCoupons($ic6e86aba1bc36abbc0265f7e37437aa716c170c0); $this->getLayout()->getBlock('content')->append($i5509ac707290a86add15ab0ce4da982d395f4c4f); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = $this->getLayout()->createBlock('magesms/marketing_form'); $this->getLayout()->getBlock('content')->append($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a); $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $this->getLayout()->getBlock('content')->append($i21e55df616c305955791876c1eb4da83448beba2); $i2ca8461421e371a2dc8ff5b5c9a248f5fb0a6dbc = $this->_getBlockDeleted(); $this->getLayout()->getBlock('content')->append($i2ca8461421e371a2dc8ff5b5c9a248f5fb0a6dbc); $this->renderLayout(); return $this; } public function filterAction() { $ia1a238c1f12f3901520c7ca55efa646e471f7f6e = new Varien_Object(); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setError(false); if ($this->getRequest()->getParams()) { $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setType('marketing'); $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2 = $this->getRequest(); if ($i1507c94b68f51b22087227858337782550edf618 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('action')) { try { switch ($i1507c94b68f51b22087227858337782550edf618) { case 'save': $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($this->_popup()); break; case 'load': $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($this->_popup(false)); break; case 'saveFilter': if ($this->getRequest()->isPost()) { $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = Mage::getModel('magesms/marketing_filter'); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->setData(array( 'name' => $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('saveName'), 'filter' => $this->_filters->toSerialize(), 'date' => date('Y-m-d H:i:s'), )); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->save(); } break; case 'remove': if ($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('id')) { $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = Mage::getModel('magesms/marketing_filter'); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->load($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->delete(); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($this->_popup(false)); } break; case 'restore': if ($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('id')) { $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = Mage::getModel('magesms/marketing_filter'); if ($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->load($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538)) { $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2->fromSerialize($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->getFilter()); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd = $this->_getBlockDeleted(); $i1791b2d1f89bb2bd83b34046f59125af207713db = $this->getLayout()->createBlock('magesms/marketing_form'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml( array( 'appliedFilters' => $i1791b2d1f89bb2bd83b34046f59125af207713db->getHtmlFilters(), 'customers' => $i21e55df616c305955791876c1eb4da83448beba2->toHtml(), 'deleted' => $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd->toHtml(), 'count' => $this->_collection->count() )); } } break; case 'loadFilter': if ($i2bd9743336318d0e14be0600c9129730279505dd = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('name')) { if ($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = Mage::getModel('magesms/marketing_filter_'.$i2bd9743336318d0e14be0600c9129730279505dd)) { $i1791b2d1f89bb2bd83b34046f59125af207713db = new Varien_Data_Form(); switch ($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->filter['type']) { case 'select': $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter', 'select', array( 'name' => 'filter', 'values' => $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->getValues(), )); break; case 'input': $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter', 'text', array( 'name' => 'filter', )); break; case 'datetime': $i8114d84b871449f246242a4433e364f848daff0c = array(); $i03474abc9cad4f5c29a2f0bca70a29051a128bc9 = 'Calendar.setup({
												inputField: "%s",
												ifFormat: "%s",
												showsTime: true,
												button: "%s_trig",
												align: "Bl",
												singleClick : true
											});'; $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78 = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM); $i376a6873d4104d44a8d8f0acacfc41b40105e11f = Varien_Date::convertZendToStrFtime($i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, true, true); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter1', 'date', array( 'name' => 'filter[]', 'format' => $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, 'value' => Mage::app()->getLocale()->date()->toString(), 'image' => Mage::getDesign()->getSkinUrl('images/grid-cal.gif'), )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('note', 'note', array( 'text' => Mage::helper('magesms')->__('to: '), )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter2', 'date', array( 'name' => 'filter[]', 'format' => $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, 'value' => Mage::app()->getLocale()->date()->toString(), 'image' => Mage::getDesign()->getSkinUrl('images/grid-cal.gif'), )); $i8114d84b871449f246242a4433e364f848daff0c[] = sprintf($i03474abc9cad4f5c29a2f0bca70a29051a128bc9, 'filter1', $i376a6873d4104d44a8d8f0acacfc41b40105e11f, 'filter1'); $i8114d84b871449f246242a4433e364f848daff0c[] = sprintf($i03474abc9cad4f5c29a2f0bca70a29051a128bc9, 'filter2', $i376a6873d4104d44a8d8f0acacfc41b40105e11f, 'filter2'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setJs($i8114d84b871449f246242a4433e364f848daff0c); break; case 'date': $i8114d84b871449f246242a4433e364f848daff0c = array(); $i03474abc9cad4f5c29a2f0bca70a29051a128bc9 = 'Calendar.setup({
												inputField: "%s",
												ifFormat: "%s",
												showsTime: false,
												button: "%s_trig",
												align: "Bl",
												singleClick : true
											});'; $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78 = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM); $i376a6873d4104d44a8d8f0acacfc41b40105e11f = Varien_Date::convertZendToStrFtime($i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, true, true); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter1', 'date', array( 'name' => 'filter[]', 'format' => $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, 'value' => Mage::app()->getLocale()->date()->toString(), 'image' => Mage::getDesign()->getSkinUrl('images/grid-cal.gif'), )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('note', 'note', array( 'text' => Mage::helper('magesms')->__('to: '), )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter2', 'date', array( 'name' => 'filter[]', 'format' => $i5e2f8ae4963934ca8fbc2fff6103b6356dd52c78, 'value' => Mage::app()->getLocale()->date()->toString(), 'image' => Mage::getDesign()->getSkinUrl('images/grid-cal.gif'), )); $i8114d84b871449f246242a4433e364f848daff0c[] = sprintf($i03474abc9cad4f5c29a2f0bca70a29051a128bc9, 'filter1', $i376a6873d4104d44a8d8f0acacfc41b40105e11f, 'filter1'); $i8114d84b871449f246242a4433e364f848daff0c[] = sprintf($i03474abc9cad4f5c29a2f0bca70a29051a128bc9, 'filter2', $i376a6873d4104d44a8d8f0acacfc41b40105e11f, 'filter2'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setJs($i8114d84b871449f246242a4433e364f848daff0c); break; case 'birthdayall': $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('note1', 'note', array( 'text' => Mage::helper('magesms')->__('day').': ', )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter1', 'select', array( 'name' => 'filter[]', 'values' => array_combine(range(1, 31), range(1, 31)), )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('note2', 'note', array( 'text' => Mage::helper('magesms')->__('month').': ', )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter2', 'select', array( 'name' => 'filter[]', 'values' => array_combine(range(1, 12), range(1, 12)), )); break; case 'number': $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter1', 'select', array( 'name' => 'filter[]', 'values' => array('0'=> '<', '1' => '>', '2' => '=', '3' => '≠'), 'style' => 'min-width:auto;width:40px' )); $i1791b2d1f89bb2bd83b34046f59125af207713db->addField('filter2', 'text', array( 'name' => 'filter[]', )); break; } $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($i1791b2d1f89bb2bd83b34046f59125af207713db->getHtml()); } } break; case 'applyFilter': $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('value'); if (is_array($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) && count($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) == 1) $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89 = $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89[0]; if (($i2bd9743336318d0e14be0600c9129730279505dd = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('name')) && $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89 !== '') { $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2->addApplyFilter($i2bd9743336318d0e14be0600c9129730279505dd, $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $i1791b2d1f89bb2bd83b34046f59125af207713db = $this->getLayout()->createBlock('magesms/marketing_form'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml( array( 'appliedFilters' => $i1791b2d1f89bb2bd83b34046f59125af207713db->getHtmlFilters(), 'customers' => $i21e55df616c305955791876c1eb4da83448beba2->toHtml(), 'count' => $this->_collection->count() )); } break; case 'removeFilter': $i7d411c0cc32cdb65ec82b9e8d79aa996946f5538 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('id'); if (is_numeric($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538)) { $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2->removeFilter($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd = $this->_getBlockDeleted(); $i1791b2d1f89bb2bd83b34046f59125af207713db = $this->getLayout()->createBlock('magesms/marketing_form'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml( array( 'appliedFilters' => $i1791b2d1f89bb2bd83b34046f59125af207713db->getHtmlFilters(), 'customers' => $i21e55df616c305955791876c1eb4da83448beba2->toHtml(), 'deleted' => $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd->toHtml(), 'count' => $this->_collection->count() )); } break; case 'listCustomers': if ($i47b2a41e4081b6f8d8381f411087dcd7042bfb53 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('letter')) { $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $this->_collection->addFieldToFilter('lastname', array('like' => $i47b2a41e4081b6f8d8381f411087dcd7042bfb53.'%')); $i21e55df616c305955791876c1eb4da83448beba2 = $this->getBlockCustomer(); $i21e55df616c305955791876c1eb4da83448beba2->setCollection($this->_collection); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($i21e55df616c305955791876c1eb4da83448beba2->toHtml()); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setType('customer'); } break; case 'removeCustomer': if ($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('id')) { $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2->addRemoveCustomer($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $ib1285cda66d7403b4e0132565b5359295c62d58c = clone $this->_collection; $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd = $this->_getBlockDeleted(); $id82aaf2f437652c4b6efbd55703199f614e8e516 = array( 'customers' => $i21e55df616c305955791876c1eb4da83448beba2->toHtml(), 'deleted' => $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd->toHtml(), 'count' => $this->_collection->count() ); if ($i47b2a41e4081b6f8d8381f411087dcd7042bfb53 = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('letter')) { $ib1285cda66d7403b4e0132565b5359295c62d58c->addFieldToFilter('lastname', array('like' => $i47b2a41e4081b6f8d8381f411087dcd7042bfb53.'%')); $i2ca8461421e371a2dc8ff5b5c9a248f5fb0a6dbc = $this->getBlockCustomer(); $i2ca8461421e371a2dc8ff5b5c9a248f5fb0a6dbc->setCollection($ib1285cda66d7403b4e0132565b5359295c62d58c); $id82aaf2f437652c4b6efbd55703199f614e8e516['customer_letter'] = $i2ca8461421e371a2dc8ff5b5c9a248f5fb0a6dbc->toHtml(); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setType('customer'); } $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml($id82aaf2f437652c4b6efbd55703199f614e8e516); } break; case 'reset': $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 = Mage::getModel('magesms/marketing_filter_collection'); $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2->resetFilter(); $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i21e55df616c305955791876c1eb4da83448beba2 = $this->_getBlockCustomer(); $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd = $this->_getBlockDeleted(); $i1791b2d1f89bb2bd83b34046f59125af207713db = $this->getLayout()->createBlock('magesms/marketing_form'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setHtml( array( 'appliedFilters' => $i1791b2d1f89bb2bd83b34046f59125af207713db->getHtmlFilters(), 'customers' => $i21e55df616c305955791876c1eb4da83448beba2->toHtml(), 'deleted' => $i9e86252a333eb6c832bb895a8d1690c48b2ed3fd->toHtml(), 'count' => $this->_collection->count() )); break; } } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setError(true); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setMessage($this->getLayout()->getMessagesBlock()->getGroupedHtml()); } } } $this->getResponse()->setBody($ia1a238c1f12f3901520c7ca55efa646e471f7f6e->toJson()); } protected function _popup($iacea0d13bc5e2676192c06d68cb091dc0ce26320 = true) { $id82aaf2f437652c4b6efbd55703199f614e8e516 = ''; if ($iacea0d13bc5e2676192c06d68cb091dc0ce26320) { $i1791b2d1f89bb2bd83b34046f59125af207713db = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'magesms_marketing_templateform', array('template' => 'topefekt/magesms/marketing/form.phtml') ); $id82aaf2f437652c4b6efbd55703199f614e8e516 = $i1791b2d1f89bb2bd83b34046f59125af207713db->toHtml(); } $i42cf41da37138d64d37b0778e6561aab5e1239d6 = $this->getLayout()->createBlock('magesms/marketing_template'); return $id82aaf2f437652c4b6efbd55703199f614e8e516.$i42cf41da37138d64d37b0778e6561aab5e1239d6->toHtml(); } public function sendAction() { $ia1a238c1f12f3901520c7ca55efa646e471f7f6e = new Varien_Object(); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setError(false); if ( $this->getRequest()->getPost() ) { try { $iacbd1c78463510856e506611fe14b5e1173581a6 = Mage::app()->getRequest(); $i7d411c0cc32cdb65ec82b9e8d79aa996946f5538fc9fbe8edf868c14fc4a3f15c7f40aabfa080aa = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('text'); $ifc17de93671eea5715520ecfbc4dc543818685b8 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unique') ? true : false; $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unicode') ? true : false; $iad9ca2238db0190a0310a03143f9935535720c34 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('coupon'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f = Mage::getModel('magesms/sms'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setMessage($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538fc9fbe8edf868c14fc4a3f15c7f40aabfa080aa) ->setType(Topefekt_Magesms_Model_Sms::TYPE_MARKETING) ->setPriority(false) ->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd) ->setUnique($ifc17de93671eea5715520ecfbc4dc543818685b8); if ($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('sendlater') && $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl')) { $i4c323947385ff52539168f26084feed4bc17e2dc = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl'); $i6aa8d50211ad373efab0896425f6f5fa0e013c29 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_hour'); $if8001c570b9f0e904df8b36797628015beb8fa80 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_min'); $i836a3cd8c554d1c35cc3c6cf3e3f49052b683096 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datereal', 0); $i4c323947385ff52539168f26084feed4bc17e2dc = strtotime("$i4c323947385ff52539168f26084feed4bc17e2dc $i6aa8d50211ad373efab0896425f6f5fa0e013c29:$if8001c570b9f0e904df8b36797628015beb8fa80:00") + 3600*$i836a3cd8c554d1c35cc3c6cf3e3f49052b683096; $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setSendlater($i4c323947385ff52539168f26084feed4bc17e2dc); } $this->f6d43ff809a46f71c1e634564f2b37e20a99bbb9c(); $i66e3a0cd135d568c8d85190341325c1d3af03b4b = null; if ($iad9ca2238db0190a0310a03143f9935535720c34) { $i66e3a0cd135d568c8d85190341325c1d3af03b4b = Mage::getSingleton('salesrule/rule')->load($iad9ca2238db0190a0310a03143f9935535720c34); if ($i66e3a0cd135d568c8d85190341325c1d3af03b4b) { if ($i66e3a0cd135d568c8d85190341325c1d3af03b4b->getUseAutoGeneration()) { if (count($i66e3a0cd135d568c8d85190341325c1d3af03b4b->getCoupons()) < $this->_collection->count()) { $if3b1e2c1706de4c1bca112c669caba3a0420b880 = Mage::helper('magesms')->__('Few coupons have been generated. Generate more coupons.'); $if3b1e2c1706de4c1bca112c669caba3a0420b880 .= '<br />'.Mage::helper('magesms')->__('Number of coupons: %s', count($i66e3a0cd135d568c8d85190341325c1d3af03b4b->getCoupons())); $if3b1e2c1706de4c1bca112c669caba3a0420b880 .= '<br />'.Mage::helper('magesms')->__('Number of recipients: %s', $this->_collection->count()); Mage::throwException($if3b1e2c1706de4c1bca112c669caba3a0420b880); } } if ($i3e3a0f2ae6a0c8837eef43b5d93ce2acef452442 = $i66e3a0cd135d568c8d85190341325c1d3af03b4b->getCoupons()) { $i66e3a0cd135d568c8d85190341325c1d3af03b4b->setCoupon(current($i3e3a0f2ae6a0c8837eef43b5d93ce2acef452442)); } } } foreach($this->_collection as $iff7e46827cbb6547116c592bf800f4687428abf9) { if ($iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()) { if (isset($this->v148194b5b9cc653ce2e35e9709e441dc6fd4123a['website_'.$iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()])) { $i9fdb3b1e2e6984ebdd1220ec199279013c5483fc = $this->v148194b5b9cc653ce2e35e9709e441dc6fd4123a['website_'.$iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()]; $ic5616185277631275bc74b85565c0c6eed62a3cd = $this->v148194b5b9cc653ce2e35e9709e441dc6fd4123a['store-id_'.$iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()]; } else { $this->v148194b5b9cc653ce2e35e9709e441dc6fd4123a['website_'.$iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()] = $i9fdb3b1e2e6984ebdd1220ec199279013c5483fc = Mage::getModel('core/website')->load($iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()); $this->v148194b5b9cc653ce2e35e9709e441dc6fd4123a['store-id_'.$iff7e46827cbb6547116c592bf800f4687428abf9->getWebsiteId()] = $ic5616185277631275bc74b85565c0c6eed62a3cd = $i9fdb3b1e2e6984ebdd1220ec199279013c5483fc->getDefaultStore()->getId(); } } else { $ic5616185277631275bc74b85565c0c6eed62a3cd = null; } $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->addRecipient($iff7e46827cbb6547116c592bf800f4687428abf9->getTelephone(), array( 'country' => $iff7e46827cbb6547116c592bf800f4687428abf9->getCountryId(), 'customerId' => $iff7e46827cbb6547116c592bf800f4687428abf9->getId(), 'recipient' => $iff7e46827cbb6547116c592bf800f4687428abf9->getFirstname().' '.$iff7e46827cbb6547116c592bf800f4687428abf9->getLastname(), 'text' => $this->_prepareText($i7d411c0cc32cdb65ec82b9e8d79aa996946f5538fc9fbe8edf868c14fc4a3f15c7f40aabfa080aa, $ic5616185277631275bc74b85565c0c6eed62a3cd, $iff7e46827cbb6547116c592bf800f4687428abf9, $i66e3a0cd135d568c8d85190341325c1d3af03b4b), 'dnd' => !(($i17dbc08b33778f0cb7ec2da29ca88fea8caf1bf1 = $iff7e46827cbb6547116c592bf800f4687428abf9->getMagesmsCustomerMarketing()) ? $i17dbc08b33778f0cb7ec2da29ca88fea8caf1bf1 : is_null($i17dbc08b33778f0cb7ec2da29ca88fea8caf1bf1) ? 1 : $i17dbc08b33778f0cb7ec2da29ca88fea8caf1bf1), ) ); if ($i66e3a0cd135d568c8d85190341325c1d3af03b4b && $i66e3a0cd135d568c8d85190341325c1d3af03b4b->getUseAutoGeneration()) { $i66e3a0cd135d568c8d85190341325c1d3af03b4b->setCoupon(next($i3e3a0f2ae6a0c8837eef43b5d93ce2acef452442)); } } $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->send(); $this->getResponse()->setBody($ia1a238c1f12f3901520c7ca55efa646e471f7f6e->toJson()); } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); $this->_initLayoutMessages('adminhtml/session'); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setError(true); $ia1a238c1f12f3901520c7ca55efa646e471f7f6e->setMessage($this->getLayout()->getMessagesBlock()->getGroupedHtml()); $this->getResponse()->setBody($ia1a238c1f12f3901520c7ca55efa646e471f7f6e->toJson()); } } else { $this->getResponse()->setBody($ia1a238c1f12f3901520c7ca55efa646e471f7f6e->toJson()); } return $this; } public function sentAction() { $this->_redirect('*/*/index'); } protected function _getBlockCustomer() { $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock('magesms/marketing_customer'); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setCollection($this->_collection); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setTitle(Mage::helper('magesms')->__('Customers found: ')); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setId('customer'); return $i8ee45e0018a32fb1a855b82624506e35789cc4d2; } protected function _getBlockDeleted() { $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock('magesms/marketing_customer'); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setDeleteCustomer(true); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setTitle(Mage::helper('magesms')->__('Removed Customers: ')); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setId('deleted'); $iff7e46827cbb6547116c592bf800f4687428abf9 = Mage::helper('magesms')->getCustomerCollection(); $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('entity_id', array('in' => $this->_filters->getCache()->getCustomers()->getIds())); foreach($iff7e46827cbb6547116c592bf800f4687428abf9 as $i705fa7c9639d497e1179d7d5691c212668a8c9c8) { $i705fa7c9639d497e1179d7d5691c212668a8c9c8->setDetailUrl(Mage::helper("adminhtml")->getUrl('adminhtml/customer/edit', array('id' => $i705fa7c9639d497e1179d7d5691c212668a8c9c8->getId()))); $i705fa7c9639d497e1179d7d5691c212668a8c9c8->setRemoveUrl($this->getUrl('*/*/filter', array('action' => 'removeCustomer', 'id' => $i705fa7c9639d497e1179d7d5691c212668a8c9c8->getId()))); } $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setCollection($iff7e46827cbb6547116c592bf800f4687428abf9); return $i8ee45e0018a32fb1a855b82624506e35789cc4d2; } protected function _getCollection() { $iff7e46827cbb6547116c592bf800f4687428abf9 = Mage::helper('magesms')->getCustomerCollection(); $iff7e46827cbb6547116c592bf800f4687428abf9->addAttributeToSelect('magesms_customer_marketing'); return $iff7e46827cbb6547116c592bf800f4687428abf9; } protected function _initAction() { parent::_initAction(); $this->_setActiveMenu('magesms/marketing') ->_title(Mage::helper('magesms')->__('Marketing SMS')) ; $i3358fd35282548f1f8ccafbf23d60a4ade466fd3 = '
			Translator.add("Filter has been applied.", "'.$this->__('Filter has been applied.').'");
			Translator.add("Filter has been saved.", "'.$this->__('Filter has been saved.').'");
			Translator.add("Are you sure you want to reset the filter?", "'.$this->__('Are you sure you want to reset the filter?').'");
			Translator.add("Are you sure you want to remove the filter?", "'.$this->__('Are you sure you want to remove the filter?').'");
			Translator.add("Filter has been reset.", "'.$this->__('Filter has been reset.').'");
		'; $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock('core/text', 'marketing') ->setText(Mage::helper('adminhtml/media_js')->getScript($i3358fd35282548f1f8ccafbf23d60a4ade466fd3)); $this->_addContent($i8ee45e0018a32fb1a855b82624506e35789cc4d2); return $this; } } 