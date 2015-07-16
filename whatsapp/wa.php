<?php
function onGetProfilePicture($from, $target, $type, $data)
{
    if ($type == "preview") {
        $filename = "My/preview_" . $target . ".jpg";
    } else {
        $filename = "My/" . $target . ".jpg";
    }
    $fp = @fopen($filename, "w");
    if ($fp) {
        fwrite($fp, $data);
        fclose($fp);
    }
}
	$config['webpassword'] = 'Nyandarua';
	$config['254707820997'] = array(
    'fromNumber' => '254707820997',
    'nick' => "Nyandarua",
    'waPassword' => "Mny0EPWPZmHmlVNkWTdiQ+5sIaI=",
	'id' => "%ec%5d%23%24xa%00%5d%dd%7d%5b%0b%bf%3c%9b%9f%3c%89x%0e"
);
require 'src/whatsprot.class.php';

$whatsapp = new Whatsapp($config);
$whatsapp->sendMessage();
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
				
						// $this->wa->pollMessage();
						 $this->wa->eventManager()->bind('onGetMessage', array($this, 'processReceivedMessage'));
					//	 $this->wa->eventManager()->bind('onGetImage', array($this, 'processReceivedImage'));
						//  $this->wa->eventManager()->bind('onGetVideo', array($this, 'processReceivedVideo'));
						$this->wa->eventManager()->bind('onGetProfilePicture', 'onGetProfilePicture');		
						
                     $this->sendMessage('y','u');
					 
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
	public function processReceivedImage( $phone, $from, $id, $type, $time, $name, $size, $url, $file, $mimeType, $fileHash, $width, $height, $preview, $caption )
  {
    $previewuri = "media/thumb_" . $file;
    $fp = @fopen($previewuri, "w");
    if ($fp) {
        fwrite($fp, $preview);
        fclose($fp);
    }
    $data = file_get_contents($url);
    $fulluri = "media/" . $file;
    $fp = @fopen($fulluri, "w");
    if ($fp) {
        fwrite($fp, $data);
        fclose($fp);
    }
    $msg = "<a href='$fulluri' target='_blank'><img src='$previewuri' /></a>";
}
public function processReceivedVideo($phone, $from, $id, $type, $time,  $name, $url, $file, $size, $mimeType, $fileHash, $duration, $vcodec, $acodec, $preview, $caption) 
{
    $data = file_get_contents($url);
    $fulluri = "media/" . $file;
    $fp = @fopen($fulluri, "w");
    if ($fp) {
        fwrite($fp, $data);
        fclose($fp);
    }
}
    public function processReceivedMessage($phone, $from, $id, $type, $time, $name, $data)
    { 
	
			$servername = "localhost";
$username = "furahiam_whatsap";
$password = "Thecompany1";
$dbname = "furahiam_whatsapi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT autoreply FROM status where phonenumber like '254707820997'";
echo $sql."</br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$statud = $row["autoreply"];
	}
}
echo "ngethe===".$statud;
//session_write_close();
echo "send tosss ".$from ." ff </br></br>";
	$_SESSION["phone"] = $from ;
	$_SESSION["SMS"]  = "Hey ". $name. " ".$statud."";
	      $matches = null;
		$time = date('F j, Y, g:i a', $time);
        if (preg_match('/\d*/', $from, $matches)) {
            $from = $matches[0];
        }
        $this->messages[] = array('phone' => $phone, 'from' => $from, 'id' => $id, 'type' => $type, 'time' => $time, 'name' => $name, 'data' => $data);
		 	 $this->wa->sendGetProfilePicture($from);
				$image = "preview_".$from."@s.whatsapp.net.jpg";

$sql = "INSERT INTO messages ( uname, pnumber, message, dtime, image ) VALUES ( '$name', '$from', '$data','$time', '$image')";
if ($conn->query($sql) === TRUE) {
} else {
}
$conn->close();  
	}

	Public function sendMessage($targer,$SMS )
    {
	       $this->connectToWhatsApp();
			  
			 while($this->wa->pollMessage());
			 
			
		if (isset($_SESSION["phone"])) {
			$this->wa->sendSync(array($_SESSION["phone"]));
            $this->wa->sendMessageComposing($_SESSION["phone"]);
			usleep(2000000);
            $this->wa->sendMessage($_SESSION["phone"], $_SESSION["SMS"]);	
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