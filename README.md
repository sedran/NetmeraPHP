NetmeraPHP
==========

In order to be able to use Netmera Services, first you need to initialize Netmera with your Netmera apikey.

	include 'sdk/Netmera.php';
	$apikey = "{YOUR_NETMERA_APIKEY}";
    Netmera::init($apikey);
	
Now you can send a push notification.

	$notification = new NetmeraPush();
	$notification->setTitle("My First Push Notification");
	$notification->setMessage("My First Push Notification message");
	$notification->setHtml("<html><body><p>Test Html</p></body></html>");
	$notification->setPlatforms(array("ANDROID", "IOS", "WP"));
	$notification->setTags(array("A", "B", "C"));

	try {
		$result = NetmeraPushService::sendNotification($notification);
		echo "NotificationId: " . $result;
	} catch (NetmeraException $e) {
		echo $e->getMessage();
	}

