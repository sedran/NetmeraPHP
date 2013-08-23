<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
		<?php
			include 'sdk/Netmera.php';
			
			$apikey = "{WRITE_YOUR_API_KEY_HERE}";
			
			Netmera::init($apikey);
			
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
		?>
    </body>
</html>
