<?php
/*
 *  Created on Mar 16, 2011
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php
class Magazento_Instagram_Block_Userrecent extends Mage_Core_Block_Template 
{ 
    
    protected function _construct() {
        $this->addData(array(
            'cache_lifetime' => 86400,
            'cache_tags' => array("magazento_instagram_layout"),
        ));               
    }
    
    public function getCacheKeyInfo()
    {
        $identificator = $this->getData('instagram_item_id');
        return array(
           'magazento_instagram_layout',
           Mage::app()->getStore()->getId(),
           Mage::getDesign()->getPackageName(),
           Mage::getDesign()->getTheme('template'),
           $identificator
        );
    }    
    
    public function getTemplate()
    {
        if (!$this->hasData('template')) {
            $this->setData('template', "magazento_instagram/user_recent.phtml");
        }
        return $this->_getData('template');
    }

    public function load($itemId) {
        $model = Mage::getModel('instagram/item')->load($itemId);
        if ($model->getUser()) {
            $request = Mage::getModel('instagram/pinstapi')->getUserRecent($model->getUser(),$model->getItemsCount());
            if ($request) {
                $return = array();
                $return['model'] = $model;
                $return['request'] = $request;
                $return['type'] = 'user';
            } else $return = false;
        } 
        
        if ($model->getTag()) {
            $request = Mage::getModel('instagram/pinstapi')->getRecentTag($model->getTag(),$model->getItemsCount()); 
            if ($request) {
                $return = array();
                $return['model'] = $model;
                $return['request'] = $request;
                $return['type'] = 'tag';
            } else $return = false;           
        } 
        
        return $return;
    }
    
}