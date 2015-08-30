<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz_Item extends Mage_Adminhtml_Block_Widget_Form {


    protected function _prepareForm() {
        $model = Mage::registry('instagram_item');
        
        
        
        if ($model->getData('item_size') == '') $model->setData('item_size','normal');        
        if ($model->getData('item_spacing') == '') $model->setData('item_spacing','4px');        
        if ($model->getData('item_background_color') == '') $model->setData('item_background_color','#ffffff');        
        
        $form = new Varien_Data_Form(array('id' => 'edit_form_item', 'action' => $this->getData('action'), 'method' => 'post'));
        $form->setHtmlIdPrefix('item_');
        

        $fieldset = $form->addFieldset('Item_fieldset', array('legend' => Mage::helper('instagram')->__('Display settings'), 'class' => 'fieldset-wide'));
        
        $fieldset->addField('item_size', 'select', array(
            'name' => 'item_size',
            'label' => Mage::helper('instagram')->__('Size'),
            'title' => Mage::helper('instagram')->__('Size'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getSize(),
            'note' => 'Pick a size for each item. Tiny size do not show caption and comments.',             
        ));    
        
        $fieldset->addField('item_spacing', 'select', array(
            'name' => 'item_spacing',
            'label' => Mage::helper('instagram')->__('Spacing'),
            'title' => Mage::helper('instagram')->__('Spacing'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getSpacing(),
            'note' => 'Pick a space betweet each cell and the container',             
            
        ));    
        
        $fieldset->addField('item_border_radius', 'select', array(
            'name' => 'item_border_radius',
            'label' => Mage::helper('instagram')->__('Border radius'),
            'title' => Mage::helper('instagram')->__('Border radius'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getBorderRadius(),
        ));    
        
        $fieldset->addField('item_background_color', 'text', array(
            'name' => 'item_background_color',
            'label' => Mage::helper('instagram')->__('Background color'),
            'title' => Mage::helper('instagram')->__('Background color'),
            'required' => true,
        ));            
        
        $fieldset->addField('item_background_image', 'select', array(
            'name' => 'item_background_image',
            'label' => Mage::helper('instagram')->__('Background image'),
            'title' => Mage::helper('instagram')->__('Background image'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getBackgroundImage(),
            'note' => '<div style="background: #AAA;
                                width: 273px;
                                padding: 20px;
                                margin-top: 10px;
                                border: 1px solid #888;
                                color: #555;
                                ">
                       Background 1 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/noise.png" /><br/>
                       Background 2 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/grid_b.png" /><br/>
                       Background 3 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/grid_b_2.png" /><br/>
                       Background 4 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/grid_w.png" /><br/>
                       Background 5 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/grid_w_2.png" /><br/>
                       Background 6 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/line_b.png" /><br/>
                       Background 7 <br/>
                       <img src="'. Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN) .'frontend/base/default/magazento_instagram/img/patterns/line_w.png" /><br/>
                       </div>    

                       '
        ));            
        
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
