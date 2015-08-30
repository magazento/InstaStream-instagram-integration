<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('InstagramGrid');
        $this->setDefaultSort('item_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('instagram/item')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {

        $baseUrl = $this->getUrl();
        $this->addColumn('item_id', array(
            'header' => Mage::helper('instagram')->__('ID'),
            'align' => 'left',
            'width' => '50px',
            'index' => 'item_id',
        ));
        
        $this->addColumn('user', array(
            'header' => Mage::helper('instagram')->__('User'),
            'align' => 'left',
            'index' => 'user',
        ));
        
        $this->addColumn('tag', array(
            'header' => Mage::helper('instagram')->__('Tag'),
            'align' => 'left',
            'index' => 'tag',
        ));
        
//        $this->addColumn('item_type', array(
//            'header' => Mage::helper('instagram')->__('Type'),
//            'align' => 'left',
//            'index' => 'user',            
//            'type' => 'options',      
//            'options' => array(
//                'tag' => Mage::helper('instagram')->__('user'),
//                'user' => Mage::helper('instagram')->__('tag'),
//            ),            
//            'index' => 'tag',
//        ));
        
        $this->addColumn('item_type', array(
            'header' => Mage::helper('instagram')->__('Type'),
            'index' => 'item_type',
            'type' => 'options',
            'options' => array(
                'tag' => Mage::helper('instagram')->__('tag'),
                'user' => Mage::helper('instagram')->__('user'),
            ),    
        ));        
        
        
//        $this->addColumn('layout', array(
//            'header' => Mage::helper('instagram')->__('Layout'),
//            'index' => 'layout',
//            'type' => 'options',
//            'options' => Mage::helper('instagram/data')->getLayoutTypes(),
//        ));        
//        $this->addColumn('order', array(
//            'header' => Mage::helper('instagram')->__('Order'),
//            'index' => 'order',
//            'type' => 'options',
//            'options' => Mage::helper('instagram/data')->getLayoutOrder(),
//        ));        
        
        
        $this->addColumn('products', array(
            'header' => Mage::helper('instagram')->__('Show on products'),
            'align' => 'left',
            'type' => 'options',     
            'sortable' => false,
            'options' => Mage::getModel('instagram/data')->getProducts4Form(),            
            'index' => 'products',
            'filter_condition_callback'  => array($this, '_filterProductCondition'),             
            'renderer' => 'instagram/admin_item_grid_renderer_products'
        ));
        
        $this->addColumn('categories', array(
            'header' => Mage::helper('instagram')->__('Show on categories'),
            'align' => 'left',
            'type' => 'options',
            'sortable' => false,
            'options' => Mage::getModel('instagram/data')->getCategories4Grid(),            
            'index' => 'categories',
            'filter_condition_callback'  => array($this, '_filterCategoryCondition'),
            'renderer' => 'instagram/admin_item_grid_renderer_categories'
        ));        
        
        $this->addColumn('pages', array(
            'header' => Mage::helper('instagram')->__('Show on pages'),
            'align' => 'left',
            'type' => 'options',     
            'sortable' => false,
            'options' => Mage::getModel('instagram/data')->getPages4Grid(),                
            'index' => 'products',
            'filter_condition_callback'  => array($this, '_filterPageCondition'),            
            'renderer' => 'instagram/admin_item_grid_renderer_pages'
        ));   
        
        if (!Mage::app()->isSingleStoreMode()) {
            $this->addColumn('store_id', array(
                'header'        => Mage::helper('instagram')->__('Store View'),
                'index'         => 'store_id',
                'type'          => 'store',
                'store_all'     => true,
                'width'         => '120px',
                'store_view'    => true,
                'sortable'      => false,
                'filter_condition_callback'  => array($this, '_filterStoreCondition'),
            ));
        }        

        if (Mage::getStoreConfig('instagram/options/bigsize')) {         
            $this->addColumn('from_time', array(
                'header' => Mage::helper('instagram')->__('From Time'),
                'index' => 'from_time',
                'type' => 'datetime',
            ));

            $this->addColumn('to_time', array(
                'header' => Mage::helper('instagram')->__('To Time'),
                'index' => 'to_time',
                'type' => 'datetime',
            ));
        }
        $this->addColumn('is_active', array(
            'header' => Mage::helper('instagram')->__('Status'),
            'index' => 'is_active',
            'type' => 'options',
            'options' => array(
                0 => Mage::helper('instagram')->__('Disabled'),
                1 => Mage::helper('instagram')->__('Enabled'),
            ),
        ));


        $this->addColumn('action',
                array(
                    'header' => Mage::helper('instagram')->__('Action'),
                    'index' => 'item_id',
                    'sortable' => false,
                    'filter' => false,
                    'no_link' => true,
                    'width' => '100px',
                    'renderer' => 'instagram/admin_item_grid_renderer_action'
        ));
//        $this->addExportType('*/*/exportCsv', Mage::helper('instagram')->__('CSV'));
//        $this->addExportType('*/*/exportXml', Mage::helper('instagram')->__('XML'));
        return parent::_prepareColumns();
    }

    protected function _afterLoadCollection() {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    protected function _filterStoreCondition($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $this->getCollection()->addStoreFilter($value);
    }

    protected function _filterCategoryCondition($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $this->getCollection()->addCategoryFilter($value);
    }
    protected function _filterProductCondition($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $this->getCollection()->addProductFilter($value);
    }
    protected function _filterPageCondition($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $this->getCollection()->addPageFilter($value);
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('item_id');
        $this->getMassactionBlock()->setFormFieldName('massaction');
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('instagram')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('instagram')->__('Are you sure?')
        ));
        $this->getMassactionBlock()->addItem('switch', array(
            'label' => Mage::helper('instagram')->__('Switch'),
            'url' => $this->getUrl('*/*/massSwitch'),
        ));

        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('instagram')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('instagram')->__('Status'),
                    'values' => array(
                        0 => Mage::helper('instagram')->__('Disabled'),
                        1 => Mage::helper('instagram')->__('Enabled'),
                    ),
                )
            )
        ));
        
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit',  array('item_id' => $row->getId(), 'type' => $row->getData('item_type')));
    }

}
