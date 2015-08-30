<?php

class Magazento_Instagram_Model_Pinstapi {


		public $token = null;

		function __construct() {
                    $this->token = Mage::getStoreConfig('instagram/general/token');
                }
                
		public function getUserID($user) {
			
			$url =  'https://api.instagram.com/v1/users/search?q='.$user.'&access_token='.$this->token;

			$request = $this->request($url);

			if ($request) {
				$request = json_decode($request);
				
				if ($request->data) {
					foreach ($request->data as $profile) {
						if ($user == $profile->username) {
							return $profile->id;
						}
					}
				}
			}

			return false;
		}
		public function getUserRecent($user,$count) {

                        $user = $this->getUserID($user);
			if ($user) {
                            $url =  'https://api.instagram.com/v1/users/'.$user.'/media/recent/?count='.$count.'&access_token='.$this->token;
                            $request = $this->request($url);
                            if ($request) {
                                return json_decode($request);
                            } else return false;
			} else return false;
		}

		public function getRecentTag($tag, $count) {

                    if (!is_array($tag)) {
                            $url =  'https://api.instagram.com/v1/tags/'.$tag.'/media/recent/?count='.$count.'&access_token='.$this->token;
                            $request = $this->request($url);
                            if ($request) {
                                return json_decode($request);
                            } else return false;
                    } else return false;
		}
                
                public function get_tag($tag) {
			$tags = $this->core->options->get('instagram_tags');
			if (!empty($tags[$tag])) return $tags[$tag];
			
			$url =  'https://api.instagram.com/v1/tags/search?q='.$tag.'&access_token='.$this->core->options->get('instagram_token');

			$request = $this->request($url);

			if ($request) {
				$request = json_decode($request);
				
				if ($request->data) {
					foreach ($request->data as $data) {
						if ($tag == $data->name && $data->media_count != 0) {
							$tags[$tag] = $data->name;
							$this->core->options->set('instagram_tags', $tags);
							return $data->name;
						}
					}
				}
			}

			return false;
		}      
                                

		public function request($url) {
			$config = array(
                            'adapter'      => 'Zend_Http_Client_Adapter_Socket',
                            'ssltransport' => 'tls'
                        );
                        $client = new Zend_Http_Client($url, $config);
                        $request = $client->request();
			if ($request->getStatus() == 200) {
                            return $request->getBody();
			} else return false;
		}
}