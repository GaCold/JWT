<?php 

class appUtil {
	
	public static function jsonEncode ($data) {
		return json_encode($data);
	}

	public static function jsonDecode($tring) {
		return json_decode($tring);
	}

	public static function getParam($data, $key, $default = null) {
		if(is_object($data)) {
			return isset($data->$key) ? $data->$key : $default;
		}
		else {
			return isset($data[$key]) ? $data[$key] : $default;
		}
	}
}