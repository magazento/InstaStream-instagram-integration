<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz_Meta extends Mage_Adminhtml_Block_Widget_Form {


    protected function _prepareForm() {
        $model = Mage::registry('instagram_item');
        
        if ($model->getData('meta_enabled') == '') $model->setData('meta_enabled','1');        
        if ($model->getData('meta_likes_enabled') == '') $model->setData('meta_likes','1');        
        if ($model->getData('meta_comments_enabled') == '') $model->setData('meta_comments_enabled','1');        
        if ($model->getData('meta_timestamp_enabled') == '') $model->setData('meta_timestamp_enabled','1');        
        if ($model->getData('meta_text_color') == '') $model->setData('meta_text_color','#454545');        
        if ($model->getData('meta_comments_icon_color') == '') $model->setData('meta_comments_icon_color','#454545');        
        if ($model->getData('meta_background_color') == '') $model->setData('meta_background_color','#e5e5e5');        
        if ($model->getData('meta_likes_icon_color') == '') $model->setData('meta_likes_icon_color','#454545');        
        if ($model->getData('meta_timestamp_icon_color') == '') $model->setData('meta_timestamp_icon_color','#454545');              
        
        $form = new Varien_Data_Form(array('id' => 'edit_form_item', 'action' => $this->getData('action'), 'method' => 'post'));
        $form->setHtmlIdPrefix('item_');
        

        $fieldset = $form->addFieldset('meta_fieldset', array('legend' => Mage::helper('instagram')->__('Display settings'), 'class' => 'fieldset-wide'));
        
        $fieldset->addField('meta_enabled', 'select', array(
            'name' => 'meta_enabled',
            'label' => Mage::helper('instagram')->__('Meta'),
            'title' => Mage::helper('instagram')->__('Meta'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
        ));    
        
        $fieldset->addField('meta_text_color', 'text', array(
            'name' => 'meta_text_color',
            'label' => Mage::helper('instagram')->__('Text color'),
            'title' => Mage::helper('instagram')->__('Text color'),
            'required' => true,
        ));            
        
        $fieldset->addField('meta_background_color', 'text', array(
            'name' => 'meta_background_color',
            'label' => Mage::helper('instagram')->__('Background color'),
            'title' => Mage::helper('instagram')->__('Background color'),
            'required' => true,
        ));        
        
        $fieldset->addField('meta_likes_enabled', 'select', array(
            'name' => 'meta_likes_enabled',
            'label' => Mage::helper('instagram')->__('Likes'),
            'title' => Mage::helper('instagram')->__('Likes'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
        ));    
        
        $fieldset->addField('meta_likes_icon_color', 'text', array(
            'name' => 'meta_likes_icon_color',
            'label' => Mage::helper('instagram')->__('Likes icon color'),
            'title' => Mage::helper('instagram')->__('Likes icon color'),
            'required' => true,
        ));      
        
        $fieldset->addField('meta_comments_enabled', 'select', array(
            'name' => 'meta_comments_enabled',
            'label' => Mage::helper('instagram')->__('Comments'),
            'title' => Mage::helper('instagram')->__('Comments'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
        ));    
        
        $fieldset->addField('meta_comments_icon_color', 'text', array(
            'name' => 'meta_comments_icon_color',
            'label' => Mage::helper('instagram')->__('Comments icon color'),
            'title' => Mage::helper('instagram')->__('Comments icon color'),
            'required' => true,
        ));            
        
        $fieldset->addField('meta_timestamp_enabled', 'select', array(
            'name' => 'meta_timestamp_enabled',
            'label' => Mage::helper('instagram')->__('Timestamp'),
            'title' => Mage::helper('instagram')->__('Timestamp'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
        ));   
        
        $fieldset->addField('meta_timestamp_icon_color', 'text', array(
            'name' => 'meta_timestamp_icon_color',
            'label' => Mage::helper('instagram')->__('Timestamp icon color'),
            'title' => Mage::helper('instagram')->__('Timestamp icon color'),
            'required' => true,
        ));          

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
