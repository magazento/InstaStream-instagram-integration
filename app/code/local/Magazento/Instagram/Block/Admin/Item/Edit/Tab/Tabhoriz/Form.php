<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz_Form extends Mage_Adminhtml_Block_Widget_Form {


    protected function _prepareForm() {
        $model = Mage::registry('instagram_item');
        
        if ($model->getData('links') == '') $model->setData('links','1');
        if ($model->getData('items_count') == '') $model->setData('items_count','10');
        if ($model->getData('is_active') == '') $model->setData('is_active','1');
        
        if ($model->getData('height') == '') $model->setData('order','500px');
        
        
        $form = new Varien_Data_Form(array('id' => 'edit_form_item', 'action' => $this->getData('action'), 'method' => 'post'));
        $form->setHtmlIdPrefix('item_');
        

        $fieldset = $form->addFieldset('base_fieldset_automation', array('legend' => Mage::helper('instagram')->__('General settings'), 'class' => 'fieldset-wide'));
        if ($model->getItemType()) {
            $fieldset->addField('item_type', 'hidden', array(
                'name' => 'item_type',
            ));
        }    
        
        
        $type = $this->getRequest()->getParam('type');
        
        switch ($type) {
            case 'user':
                    $fieldset->addField('user', 'text', array(
                        'name' => 'user',
                        'label' => Mage::helper('instagram')->__('User'),
                        'title' => Mage::helper('instagram')->__('User'),
                        'required' => true,
                        'note' => 'The profile username. Type the username without the @. Protected users will not work.',
                    ));  
                break;                
            case 'tag':
                    $fieldset->addField('tag', 'text', array(
                        'name' => 'tag',
                        'label' => Mage::helper('instagram')->__('Tag'),
                        'title' => Mage::helper('instagram')->__('Tag'),
                        'required' => true,
                        'note' => 'The profile username. Type the username without the @. Protected users will not work.',
                    ));  

                break;

            default:
                break;
        }
        
        
        $fieldset->addField('items_count', 'text', array(
            'name' => 'items_count',
            'label' => Mage::helper('instagram')->__('Count'),
            'title' => Mage::helper('instagram')->__('Count'),
            'required' => true,
            'note' => 'how many itens to show.',
        ));  
        
        $fieldset->addField('links', 'select', array(
            'name' => 'links',
            'label' => Mage::helper('instagram')->__('Links'),
            'title' => Mage::helper('instagram')->__('Links'),
            'required' => true,
            'note' => 'Link pictures to external content',
            'options' => array(
                '0' => Mage::helper('instagram')->__('Disabled'),
                '1' => Mage::helper('instagram')->__('Enabled'),                
            ),            
        ));  
        
        
        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('instagram')->__('Display settings'), 'class' => 'fieldset-wide'));
        $fieldset->addField('height', 'text', array(
            'name' => 'height',
            'label' => Mage::helper('instagram')->__('Fixed height'),
            'title' => Mage::helper('instagram')->__('Fixed height'),
            'required' => false,
            'note' => 'You can set block height using this field. <br/> <b>Blank field = without height limit.<b>'
        ));    
        $fieldset->addField('layout', 'select', array(
            'name' => 'layout',
            'label' => Mage::helper('instagram')->__('Layout block'),
            'title' => Mage::helper('instagram')->__('Layout block'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getLayoutTypes(),
        ));    
        $fieldset->addField('order', 'select', array(
            'name' => 'order',
            'label' => Mage::helper('instagram')->__('Block order'),
            'title' => Mage::helper('instagram')->__('Block order'),
            'required' => true,
            'options' => Mage::helper('instagram/data')->getLayoutOrder(),
        ));    
        
        if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('store_id', 'multiselect', array(
                'name' => 'stores[]',
                'label' => Mage::helper('instagram')->__('Store View'),
                'title' => Mage::helper('instagram')->__('Store View'),
                'required' => true,
                'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            'style' => 'height:150px',
            ));
        } else {
            $fieldset->addField('store_id', 'hidden', array(
                'name' => 'stores[]',
                'value' => Mage::app()->getStore(true)->getId()
            ));
            $model->setStoreId(Mage::app()->getStore(true)->getId());
        }

        $fieldset->addField('is_active', 'select', array(
            'label' => Mage::helper('instagram')->__('Status'),
            'title' => Mage::helper('instagram')->__('Status'),
            'name' => 'is_active',
            'required' => true,
            'options' => array(
                '0' => Mage::helper('instagram')->__('Disabled'),
                '1' => Mage::helper('instagram')->__('Enabled'),                
            ),
        ));

        $fieldset->addField('assign_products', 'select', array(
            'label' => Mage::helper('instagram')->__('Display on product pages'),
            'title' => Mage::helper('instagram')->__('Display on product pages'),
            'name' => 'assign_products',
            'required' => true,
            'options' => array(
                '0' => Mage::helper('instagram')->__('Dispaly on selected products'),
                '1' => Mage::helper('instagram')->__('All products'),
            ),
        ));
        $fieldset->addField('assign_categories', 'select', array(
            'label' => Mage::helper('instagram')->__('Display on category pages'),
            'title' => Mage::helper('instagram')->__('Display on category pages'),
            'name' => 'assign_categories',
            'required' => true,
            'options' => array(
                '0' => Mage::helper('instagram')->__('Dispaly on selected categories'),
                '1' => Mage::helper('instagram')->__('All categories'),
            ),
        ));
        $fieldset->addField('assign_pages', 'select', array(
            'label' => Mage::helper('instagram')->__('Display on CMS pages'),
            'title' => Mage::helper('instagram')->__('Display on CMS pages'),
            'name' => 'assign_pages',
            'required' => true,
            'options' => array(
                '0' => Mage::helper('instagram')->__('Dispaly on selected pages'),
                '1' => Mage::helper('instagram')->__('All pages'),
            ),
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM);
        $fieldset->addField('from_time', 'date', array(
            'name' => 'from_time',
            'time' => true,
            'label' => Mage::helper('instagram')->__('From Time'),
            'title' => Mage::helper('instagram')->__('From Time'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'style' => 'width:272px',
            'input_format' => Varien_Date::DATETIME_INTERNAL_FORMAT,
            'format' => $dateFormatIso,
        ));

        $fieldset->addField('to_time', 'date', array(
            'name' => 'to_time',
            'time' => true,
            'label' => Mage::helper('instagram')->__('To Time'),
            'title' => Mage::helper('instagram')->__('To Time'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'input_format' => Varien_Date::DATETIME_INTERNAL_FORMAT,
            'style' => 'width:272px',
            'format' => $dateFormatIso,
        ));
        

        $fieldset->addField('script_java', 'note', array(
            'text' => '<script type="text/javascript">
				            var inputDateFrom = document.getElementById(\'item_from_time\');
				            var inputDateTo = document.getElementById(\'item_to_time\');
            				inputDateTo.onchange=function(){dateTestAnterior(this)};
				            inputDateFrom.onchange=function(){dateTestAnterior(this)};


				            function dateTestAnterior(inputChanged){
				            	dateFromStr=inputDateFrom.value;
				            	dateToStr=inputDateTo.value;

				            	if(dateFromStr.indexOf(\'.\')==-1)
				            		dateFromStr=dateFromStr.replace(/(\d{1,2} [a-zA-Zâêûîôùàçèé]{3})[^ \.]+/,"$1.");
				            	if(dateToStr.indexOf(\'.\')==-1)
				            		dateToStr=dateToStr.replace(/(\d{1,2} [a-zA-Zâêûîôùàçèé]{3})[^ \.]+/,"$1.");

				            	fromDate= Date.parseDate(dateFromStr,"%e %b %Y %H:%M:%S");
				            	toDate= Date.parseDate(dateToStr,"%e %b %Y %H:%M:%S");

				            	if(dateToStr!=\'\'){
					            	if(fromDate>toDate){
	            						inputChanged.value=\'\';
	            						alert(\'' . Mage::helper('instagram')->__('You must set a date to value greater than the date from value') . '\');
					            	}
				            	}
            				}
            			</script>',
            'disabled' => true
        ));
        

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
