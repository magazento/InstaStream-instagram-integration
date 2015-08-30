<?php

/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_Instagram_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getTitleNew() {
        return Mage::getStoreConfig('instagram/new/title');
    }

    public function getTitlePopular() {
        return Mage::getStoreConfig('instagram/popular/title');
    }

    public function getTitleReview() {
        return Mage::getStoreConfig('instagram/review/title');
    }

    public function getTitleToprated() {
        return Mage::getStoreConfig('instagram/toprated/title');
    }

    public function getTitleTopSell() {
        return Mage::getStoreConfig('instagram/topsell/title');
    }

    public function getCurrentCategory() {

        if (Mage::app()->getFrontController()->getRequest()->getRouteName() == 'cms') {
            return array('route' => 'page', 'category' => 0);
        }

        if (Mage::registry('current_product') != null) {
            $_category = Mage::registry('current_product')->getCategoryIds();
            return array('route' => 'product', 'category' => $_category[0]);
        }
//        
        if (Mage::registry('current_category') != null) {
            return array('route' => 'catalog', 'category' => Mage::registry('current_category')->getId());
        }        
    }

    
    //.......
    
    public function isInstagramConnected() {
        $token = Mage::getStoreConfig('instagram/general/token');
        if ($token) {
            return true;
        } else return false;
    }
    
    public function getSize() {
        $type = array();
        $type['tiny'] = 'tiny';
        $type['small'] = 'small';
        $type['normal'] = 'normal';
        $type['big'] = 'big';
        return $type; 
    }
    public function getPadding() {
        $type = array();
        $type['5px'] = '5px';
        $type['10px'] = '10px';
        $type['15px'] = '15px';
        $type['20px'] = '20px';
        $type['25px'] = '25px';
        $type['30px'] = '30px';
        return $type; 
    }
    public function getSpacing() {
        $type = array();
        $type['none'] = 'none';
        $type['1px'] = '1px';
        $type['2px'] = '2px';
        $type['3px'] = '3px';
        $type['4px'] = '4px';
        $type['5px'] = '5px';
        $type['6px'] = '6px';
        $type['7px'] = '7px';
        $type['8px'] = '8px';
        $type['9px'] = '9px';
        $type['10px'] = '10px';
        return $type; 
    }
    public function getBorderRadius() {
        $type = array();
        $type['none'] = 'none';
        $type['1px'] = '1px';
        $type['2px'] = '2px';
        $type['3px'] = '3px';
        $type['4px'] = '4px';
        $type['5px'] = '5px';
        return $type; 
    }
    public function getBackgroundImage() {
        $type = array();
        $type['pinst-bg-noise'] = 'Background 1';
        $type['pinst-bg-grid-b'] = 'Background 2';
        $type['pinst-bg-grid-b-2'] = 'Background 3';
        $type['pinst-bg-grid-w'] = 'Background 4';
        $type['pinst-bg-grid-w-2'] = 'Background 5';
        $type['pinst-bg-line-b'] = 'Background 6';
        $type['pinst-bg-line-w'] = 'Background 7';
        $type['pinst-bg-none'] = 'None';
        return $type; 
    }
    
    
    public function getLayoutTypes() {
        
        $type = array();
        $type['left'] = 'Left column';
        $type['right'] = 'Right column';
        $type['content'] = 'Content';
        return $type; 
    }
    public function getLayoutOrder() {
        
        $type = array();
        $type['before'] = 'Top';
        $type['after'] = 'Bottom';
        return $type; 
    }
    public function versionUseAdminTitle() {
        $info = explode('.', Mage::getVersion());
        if ($info[0] > 1) {
            return true;
        }
        if ($info[1] > 3) {
            return true;
        }
        return false;
    }

    public function versionUseWysiwig() {
        $info = explode('.', Mage::getVersion());
        if ($info[0] > 1) {
            return true;
        }
        if ($info[1] > 3) {
            return true;
        }
        return false;
    }
    
    public function numberArray($max,$text) {

        $items = array();
        for ($index = 1; $index <= $max; $index++) {
            $items[$index]=$text.' '.$index;
        }
        return $items;
    }
    
    
    function ago($timestamp){
        $difference = time() - $timestamp;

        if($difference < 60)
            return $difference."&nbsp".Mage::helper('instagram')->__("seconds ago");
        else{
            $difference = round($difference / 60);
            if($difference < 60)
                return $difference."&nbsp".Mage::helper('instagram')->__("minutes ago");
            else{
                $difference = round($difference / 60);
                if($difference < 24)
                    return $difference."&nbsp".Mage::helper('instagram')->__("hours ago");
                else{
                    $difference = round($difference / 24);
                    if($difference < 7)
                        return $difference."&nbsp".Mage::helper('instagram')->__("days ago");
                    else{
                        $difference = round($difference / 7);
                            return $difference."&nbsp".Mage::helper('instagram')->__("weeks ago");
                    }
                }
            }
        }
    }    
    
        
    
}