<?php
class NetmeraPush {
	private $title = NULL;
	private $message = NULL;
	private $html = NULL;
	private $regId = NULL;
	private	$customJson = NULL;
	private $tags = NULL;
	private $platforms = NULL;
	
	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getMessage() {
		return $this->message;
	}

	public function setMessage($message) {
		$this->message = $message;
	}

	public function getHtml() {
		return $this->html;
	}

	public function setHtml($html) {
		$this->html = $html;
	}

	public function getRegId() {
		return $this->regId;
	}

	public function setRegId($regId) {
		$this->regId = $regId;
	}

	public function getCustomJson() {
		return $this->customJson;
	}

	public function setCustomJson($customJson) {
		$this->customJson = $customJson;
	}

	public function getTags() {
		return $this->tags;
	}

	public function setTags($tags) {
		$this->tags = $tags;
	}

	public function getPlatforms() {
		return $this->platforms;
	}

	public function setPlatforms($platforms) {
		$this->platforms = $platforms;
	}

	public function toJSON() {
		$map = array();
		
		if ($this->title == NULL) {
			throw new NetmeraException("Title cannot be null!", 2000);
		}
		
		if ($this->message == NULL) {
			throw new NetmeraException("Message cannot be null!", 2000);
		}
		
		if ($this->platforms == NULL) {
			throw new NetmeraException("Platforms cannot be null!", 2000);
		}
		
		$map['title'] = $this->title;
		$map['notificationMsg'] = $this->message;
		$map['platforms'] = $this->platforms;
		
		if ($this->html != NULL) {
			$map['richPushHtml'] = $this->html;
		}
		
		if ($this->customJson != NULL) {
			$map['customJson'] = $this->customJson;
		}
		
		if ($this->tags != NULL) {
			$map['tags'] = $this->tags;
		}
		
		if ($this->regId != NULL) {
			$map['registrationId'] = $this->regId;
		}
		
		return json_encode($map);
	}
}
?>