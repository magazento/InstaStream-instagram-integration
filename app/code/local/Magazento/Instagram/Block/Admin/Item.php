<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Block_Admin_Item extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    
    public function __construct()
    {
        
        $this->_controller = 'admin_item';
        $this->_blockGroup = 'instagram';
        $this->_headerText = Mage::helper('instagram')->__('InstaStream - Instagram integration');
        $this->_addButtonLabel = Mage::helper('instagram')->__('Add Rule');
        parent::__construct();

        $this->setTemplate('widget/grid/container.phtml');

//        $this->_addButton('add', array(
//            'label'     => $this->getAddButtonLabel(),
//            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/new') .'\')',
//            'class'     => 'add',
//        ));
        
        $this->_addButton('add', array(
            'label'     => 'Add User',
            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/newuser') .'\')',
            'class'     => 'add',
        ));
        $this->_addButton('newtag', array(
            'label'     => 'Add Tag',
            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/newtag') .'\')',
            'class'     => 'add',
        ));        
    }
    
}
