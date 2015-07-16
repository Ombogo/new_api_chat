<?php
	$config['webpassword'] = 'Nyandarua';
	$config['254707820997'] = array(
    'fromNumber' => '254707820997',
    'nick' => "cfmsaf",
    'waPassword' => "Mny0EPWPZmHmlVNkWTdiQ+5sIaI=",
	'id' => "%ec%5d%23%24xa%00%5d%dd%7d%5b%0b%bf%3c%9b%9f%3c%89x%0e"
);
require 'src/whatsprot.class.php';
$whatsapp = new Whatsapp($config);
$whatsapp->updateStatus();
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
                        $this->nick = "Nyandarua";
                        $this->password = "Mny0EPWPZmHmlVNkWTdiQ+5sIaI=";
						 $this->wa = new WhatsProt($this->number, $this->id, $this->nick, true);
						$this->wa->eventManager()->bind('onConnect', array($this, 'connected'));
$this->updateStatus();						
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
	public function updateStatus()
    {
            $this->connectToWhatsApp();
            
            
$servername = "localhost";
$username = "furahiam_whatsap";
$password = "Thecompany1";
$dbname = "furahiam_whatsapi";
            
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT status,profile_pix FROM status where phonenumber like '254707820997'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$status = $row["status"];
	$profile_pix = $row["profile_pix"];
	}
}
            $this->wa->sendStatusUpdate($status);
            $this->wa->sendSetProfilePicture($profile_pix);
    }
}