<?php

class Magazento_Instagram_IndexController extends Mage_Core_Controller_Front_Action {

   public function indexAction() {
//       var_dump($_SERVER);
       echo "
           <script>
           
                function getHashUrlVars(){
                    var vars = [], hash;
                    var hashes = window.location.href.slice(window.location.href.indexOf('#') + 1).split('&');
                    for(var i = 0; i < hashes.length; i++)
                    {
                        hash = hashes[i].split('=');
                        vars.push(hash[0]);
                        vars[hash[0]] = hash[1];
                    }
                    return vars;
                }
                
                var allVars = getHashUrlVars();
                var access_token = getHashUrlVars()['access_token'];
                var href = '".Mage::getUrl('instagram/index/access')."?access_token='+access_token;
                window.location.href = href;
           </script>
        ";
   }
   public function disconectAction() {
       Mage::getModel('core/config')->saveConfig('instagram/general/token','');
       $url = Mage::helper("adminhtml")->getUrl("instagram/admin_item/index/",array("key"=>Mage::getSingleton('adminhtml/url')->getSecretKey("instagram/admin_item","index")));
       echo 'Store was disconnected from Instagram. Click <a href="'.$url.'">here</a> to continue.';
   }
   public function accessAction() {
      $access_token = $this->getRequest()->getParam('access_token');
      if ($access_token) {
        Mage::getModel('core/config')->saveConfig('instagram/general/token',$access_token);
        $url = Mage::helper("adminhtml")->getUrl("instagram/admin_item/index/",array("key"=>Mage::getSingleton('adminhtml/url')->getSecretKey("instagram/admin_item","index")));        
        echo 'Instagram configuration has been finished. Click <a href="'.$url.'">here</a> to continue.';
      }
       
   }
   
}
?>
