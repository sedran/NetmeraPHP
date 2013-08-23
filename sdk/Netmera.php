<?php
define("NETMERA_URL", "http://api.netmera.com/");
define("NETMERA_PUSH_SEND_URL", NETMERA_URL . "push/1.1/notification");

require_once 'NetmeraException.php';
require_once 'NetmeraPush.php';
require_once 'NetmeraPushService.php';

class Netmera {
	private static $apikey;
	
	public static function init($apikey) {
		Netmera::$apikey = $apikey;
	}
	
	public static function getApiKey() {
		return Netmera::$apikey;
	}
	
	public static function sendRequest($params) {
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $params['url']);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "X-netmera-api-key: " . Netmera::$apikey));
		
		if ($params['method'] == 'POST') {
			curl_setopt($ch, CURLOPT_POST, TRUE);
			if ($params['postBody']) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $params['postBody']);
			}
		} else if ($params['method'] == 'GET') {
			curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
		}

		// grab URL and pass it to the browser
		$result = json_decode(curl_exec($ch));

		// close cURL resource, and free up system resources
		curl_close($ch);
		
		return $result;
	}
}
?>