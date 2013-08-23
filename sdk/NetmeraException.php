<?php
class NetmeraException extends Exception {
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}
?>