<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz_Comments extends Mage_Adminhtml_Block_Widget_Form {


    protected function _prepareForm() {
        $model = Mage::registry('instagram_item');
        
        $form = new Varien_Data_Form(array('id' => 'edit_form_item', 'action' => $this->getData('action'), 'method' => 'post'));
        $form->setHtmlIdPrefix('item_');
        
        if ($model->getData('comments_enabled') == '') $model->setData('comments_enabled','1');        
        if ($model->getData('comments_user_images') == '') $model->setData('comments_user_images','1');        
        if ($model->getData('comments_text_color') == '') $model->setData('comments_text_color','#454545');        
        if ($model->getData('comments_border_color') == '') $model->setData('comments_border_color','#f1f1f1');  
        
        $fieldset = $form->addFieldset('comments_fieldset', array('legend' => Mage::helper('instagram')->__('Display settings'), 'class' => 'fieldset-wide'));
        
        $fieldset->addField('comments_enabled', 'select', array(
            'name' => 'comments_enabled',
            'label' => Mage::helper('instagram')->__('Comments'),
            'title' => Mage::helper('instagram')->__('Comments'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
            'note' => 'Choose if you wish to show comments',
        ));    
        
        $fieldset->addField('comments_text_color', 'text', array(
            'name' => 'comments_text_color',
            'label' => Mage::helper('instagram')->__('Text color'),
            'title' => Mage::helper('instagram')->__('Text color'),
            'required' => true,
        ));            
        
        $fieldset->addField('comments_border_color', 'text', array(
            'name' => 'comments_border_color',
            'label' => Mage::helper('instagram')->__('Border color'),
            'title' => Mage::helper('instagram')->__('Border color'),
            'required' => true,
        ));        
        
        $fieldset->addField('comments_user_images', 'select', array(
            'name' => 'comments_user_images',
            'label' => Mage::helper('instagram')->__('User images'),
            'title' => Mage::helper('instagram')->__('User images'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
            'note' => 'Choose if you wish to show user\'s images',            
        ));    
        

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
