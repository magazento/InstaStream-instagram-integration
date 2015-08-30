<?php
/*
 *  Created on Dec 16, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php
class Magazento_Instagram_Model_Source_Boolean {

    public function toOptionArray() {
        return array(
            array('value' => 'true', 'label' => Mage::helper('instagram')->__('True')),
            array('value' => 'fade', 'label' => Mage::helper('instagram')->__('Fade')),
        );
    }

}