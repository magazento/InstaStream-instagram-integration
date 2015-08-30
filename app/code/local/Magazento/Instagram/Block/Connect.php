<?php

class Magazento_Instagram_Block_Connect extends Mage_Adminhtml_Block_System_Config_Form_Fieldset {

    public function render(Varien_Data_Form_Element_Abstract $element) {
//        $clientid = 0;
        $clientid = Mage::getStoreConfig('instagram/general/clientid');
        $token = Mage::getStoreConfig('instagram/general/token');
//        var_dump($clientid);
//        var_dump($token);
        $content= "<link href='http://fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>";
        $content.= "<link href='http://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet' type='text/css'>";
        $content.= '<style>
                    .developer {
                        background: #F1F1F1;
                        border: 1px solid #CCC;
                        margin-bottom: 10px;
                        padding: 15px 5px 8px 5px;
                        height: auto;
                        font-family: Kite One, sans-serif;
                        font-size: 12px;
                    }

                    .developer .connect {
                            color: #444;
                            font-size:32px;
                            text-decoration:none;
                    }
                    .magazento-header {
                        font-size:40px; 
                        padding:10px 5px; 
                        font-family: Alex Brush, cursive;
                    }


                    .developer .info {
                            background: #E7EFEF;
                            padding: 5px 10px 0 5px;
                            margin-left: 210px;
                            height: 195px;
                    }
                    </style>

                    ';
                    echo '<div class="developer">';
                        if ($clientid) {
                            if (!$token) {
                                echo 'Almost done! <a class="connect" href="https://instagram.com/oauth/authorize/?client_id='.$clientid.'&redirect_uri='.$this->getUrl('instagram',array('key'=>'')).'&response_type=token" class="pixed-instagram-connect"> Connect your store to <strong><u>Instagram</u></strong></a>';
                            } else {
                                echo '<div class="magazento-header">Congratulations! Instagram is ready now. <a href="'.Mage::getUrl('instagram/index/disconect').'">Disconnect</a></div>';
                            }
                        } else {
                            echo 'Instagram’s API only requires the use of a client_id. A client_id simply associates your server.<br/>';
                            echo 'Before you start using this extesnion you will need to register a new appication <a target="_blank" href="http://instagram.com/developer/clients/manage/"> http://instagram.com/developer/clients/manage/ </a> <br/>';
                            echo 'With the following inforamtion: <br/>';
                            echo '<div style="width:120px;float:left;">Application name:</div> <input type="text" size="80" value="'.Mage::getBaseUrl().'"/><br/>';
                            echo '<div style="width:120px;float:left;">Description name:</div>  <input type="text" size="80" value="'.Mage::getBaseUrl().'"/><br/>';
                            echo '<div style="width:120px;float:left;">Website:</div>  <input type="text" size="80" value="'.Mage::getBaseUrl().'"/><br/>';
                            echo '<div style="width:120px;float:left;">OAuth redirect_uri:</div>  <input type="text" size="80" value="'.$this->getUrl('instagram',array('key'=>'')).'"/>';
                        }
                    echo '</div>';
                    




        return $content;


    }


}
