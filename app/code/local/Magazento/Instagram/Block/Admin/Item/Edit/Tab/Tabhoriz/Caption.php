<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz_Caption extends Mage_Adminhtml_Block_Widget_Form {


    protected function _prepareForm() {
        $model = Mage::registry('instagram_item');
        
        if ($model->getData('caption_enabled') == '') $model->setData('caption_enabled','1');        
        if ($model->getData('caption_color') == '') $model->setData('caption_color','#454545');        
        
        $form = new Varien_Data_Form(array('id' => 'edit_form_item', 'action' => $this->getData('action'), 'method' => 'post'));
        $form->setHtmlIdPrefix('item_');
        

        $fieldset = $form->addFieldset('caption_fieldset', array('legend' => Mage::helper('instagram')->__('Display settings'), 'class' => 'fieldset-wide'));
        if ($model->getItemId()) {
            $fieldset->addField('item_id', 'hidden', array(
                'name' => 'item_id',
            ));
        }
        
        $fieldset->addField('caption_enabled', 'select', array(
            'name' => 'caption_enabled',
            'label' => Mage::helper('instagram')->__('Caption'),
            'title' => Mage::helper('instagram')->__('Caption'),
            'required' => true,
            'options' => array(
                '1' => Mage::helper('instagram')->__('Enabled'),
                '0' => Mage::helper('instagram')->__('Disabled'),
            ),
            'note' => 'Show caption if present',             
        ));    
        
        $fieldset->addField('caption_color', 'text', array(
            'name' => 'caption_color',
            'label' => Mage::helper('instagram')->__('Caption color'),
            'title' => Mage::helper('instagram')->__('Caption color'),
            'required' => true,
        ));          
        
        

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
