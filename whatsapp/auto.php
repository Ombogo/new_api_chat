<?php
$targer = $_REQUEST['targer'];
$SMS = $_REQUEST['SMS'];
	$config['webpassword'] = 'Nyandarua';
	$config['254707820997'] = array(
    'fromNumber' => '254707820997',
    'nick' => "Nyandarua",
    'waPassword' => "Mny0EPWPZmHmlVNkWTdiQ+5sIaI=",
	'id' => "%ec%5d%23%24xa%00%5d%dd%7d%5b%0b%bf%3c%9b%9f%3c%89x%0e"
);
require 'src/whatsprot.class.php';

$whatsapp = new Whatsapp($config);
$whatsapp->sendMessage($targer,$SMS);
class Whatsapp
{
    private $config;
    private $from;
    private $number;
    private $id;
    private $nick;
    private $password;
    private $contacts = array();
    private $inputs;
    private $messages;
    private $wa;
    private $connected;
    private $waGroupList;
    public function __construct(array $config)
    {
        $this->config = $config;
            try {
          			$this->number = "254707820997";
                        $this->id = "%ec%5d%23%24xa%00%5d%dd%7d%5b%0b%bf%3c%9b%9f%3c%89x%0e";
                        $this->nick = "airtel";
                        $this->password = "Mny0EPWPZmHmlVNkWTdiQ+5sIaI=";
						 $this->wa = new WhatsProt($this->number, $this->id, $this->nick, true);
						$this->wa->eventManager()->bind('onConnect', array($this, 'connected'));
				
						
                    // $this->sendMessage($targer,$SMS);
					 
            } catch (Exception $e) {
                exit(json_encode(array(
                    "success" => false,
                    'type' => 'contacts',
                    "errormsg" => $e->getMessage()
                )));
} }
    public function connected()
    {
        $this->connected = true;
    }

    public function __destruct()
    {
        if (isset($this->wa) && $this->connected) {
            $this->wa->disconnect();
        }
    }
    private function connectToWhatsApp()
    {
        if (isset($this->wa)) {
            $this->wa->connect();
            $this->wa->loginWithPassword($this->password);
            return true;
        }
        return false;
    }
	Public function sendMessage($targer,$SMS )
    {
	       $this->connectToWhatsApp();
			  
			
			
		if (isset($targer)) {
			$this->wa->sendSync(array($targer));
            $this->wa->sendMessage($targer, $SMS);	
            exit(json_encode(array(
                "success" => true,
                "data" => "Message Sent!",
                "messages" => $this->messages
            )));
    	}else{
			 exit(json_encode(array(
                "success" => true,
                "data" => "Nothing to Send!",
                "messages" => $this->messages
            )));
		}
    }
}