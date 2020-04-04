<?php 

class appUtil {

    /**
     * @param $data
     * @return false|string
     */
	public static function encodeJSOn($data) {
		return json_encode($data);
	}

    /**
     * @param $string
     * @return mixed
     */
	public static function decodeJSON($string) {
		return json_decode($string);
	}

    /**
     * @param $data
     * @param $key
     * @param null $default
     * @return mixed|null
     */
	public static function getParam($data, $key, $default = null) {
		if(is_object($data)) {
			return isset($data->$key) ? $data->$key : $default;
		}
		else {
			return isset($data[$key]) ? $data[$key] : $default;
		}
	}

    /**
     * @return string
     */
	public function generateRequestId() {
	    return time() . rand(100, 999);
    }
}
