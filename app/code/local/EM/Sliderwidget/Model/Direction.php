<?php
class EM_Sliderwidget_Model_Direction extends Mage_Core_Model_Abstract
{
	/*
		Get List of Direction
		return : array(
			array(
				'value'	=>	'',
				'label'	=>	''
			)
		)
	*/
	public function toOptionArray()
    {
		return array(
			array(
				'value'	=>	'vertical',
				'label'	=>	Mage::helper('sliderwidget')->__('Vertical')
			),
			array(
				'value'	=>	'horizontal',
				'label'	=>	Mage::helper('sliderwidget')->__('Horizontal')
			)
		);
    }
}