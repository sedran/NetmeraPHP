<?php

class NetmeraPushService {
	public static function sendNotification(NetmeraPush $notification) {
		$params = array();
		$params['url'] = NETMERA_PUSH_SEND_URL;
		$params['method'] = 'POST';
		$params['postBody'] = $notification->toJSON();
		$result = Netmera::sendRequest($params);
		
		if ($result->code == 1000) {
			return $result->result->notificationId;
		} else {
			throw new NetmeraException($result->message, $result->code);
		}
	}
}
?>
