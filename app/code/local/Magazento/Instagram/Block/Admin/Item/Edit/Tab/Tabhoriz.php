<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php
class Magazento_Instagram_Block_Admin_Item_Edit_Tab_Tabhoriz extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('general_tab');
        $this->setDestElementId('instagram_tabs_form_section_item_content');
        $this->setTemplate('widget/tabshoriz.phtml');
    }

    protected function _prepareLayout()
    {
        $this->addTab('content', array(
            'label'     => $this->__('Content'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_content')->toHtml(),
            'active'    => true
        ));
        $this->addTab('container', array(
            'label'     => $this->__('Container'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_container')->toHtml(),
            'active'    => true
        ));              
        $this->addTab('caption', array(
            'label'     => $this->__('Caption'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_caption')->toHtml(),
            'active'    => true
        ));              
        $this->addTab('meta', array(
            'label'     => $this->__('Meta'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_meta')->toHtml(),
            'active'    => true
        ));              
        $this->addTab('item', array(
            'label'     => $this->__('Item'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_item')->toHtml(),
            'active'    => true
        ));              
        $this->addTab('comments', array(
            'label'     => $this->__('Comments'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_comments')->toHtml(),
            'active'    => true
        ));              
        $this->addTab('form', array(
            'label'     => $this->__('General'),
            'content'   => $this->getLayout()->createBlock('instagram/admin_item_edit_tab_tabhoriz_form')->toHtml(),
            'active'    => true
        ));            
        return parent::_prepareLayout();
    }
}