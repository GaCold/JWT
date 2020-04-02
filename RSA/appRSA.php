<?php 
/**
*#generate private key
*openssl genrsa -out private_key.pem 2048
*#generate public key
*openssl rsa -in private_key.pem -pubout -out public_key.pem
*/
class appRSA {
	
	public static $public_key = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzXQ8HK7wBOWrUAgTwWuY
exHKOHrKw9J/R+kHZJcN7qVoKXPF9gGxmnDhfAcsu4m+TTRW/DofkrsVeFj0QzzR
t5ZLmXN6q8Px7IJNG87vkDpShzdyqg//grp/e7HsKL8VCcZIdYSQss2UE0HwFD11
emzFtzxM5vZ/9ekHqrB/HvJEWkHhqYsgadob1ns+zAdtMv6r05qjZPwxv/ZTfgtk
JP9qq3bYk9oBrifOiwSI1TutK2Kw9hBsHzlgC2ERae3ybYCC9FgFMtI2tpOFE+bv
s7jKWwr5zDymUeZCXZHD5NmzhlX+Ncfz8yN02PAMxew5K8qjcBVVq8vrCBnfVy1N
dQIDAQAB
-----END PUBLIC KEY-----
EOD;

	private static $private_key = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEAzXQ8HK7wBOWrUAgTwWuYexHKOHrKw9J/R+kHZJcN7qVoKXPF
9gGxmnDhfAcsu4m+TTRW/DofkrsVeFj0QzzRt5ZLmXN6q8Px7IJNG87vkDpShzdy
qg//grp/e7HsKL8VCcZIdYSQss2UE0HwFD11emzFtzxM5vZ/9ekHqrB/HvJEWkHh
qYsgadob1ns+zAdtMv6r05qjZPwxv/ZTfgtkJP9qq3bYk9oBrifOiwSI1TutK2Kw
9hBsHzlgC2ERae3ybYCC9FgFMtI2tpOFE+bvs7jKWwr5zDymUeZCXZHD5NmzhlX+
Ncfz8yN02PAMxew5K8qjcBVVq8vrCBnfVy1NdQIDAQABAoIBACuKg6bMiD9xcQHw
BEfMhq8mUQXxOAGSHblesFtoC+LUmSOXzo9ZQotpes/vMVK5WWRBQGIJ62EMVvt/
VpzdSdCvgGwP5iJ6z02BO9g13d1iDtVrMdjKtSq+XYAYb+UewdWlePu20XejS8td
AQU5FSmR3cD8fYvBF9NExIQvDXHAIqD8lhWAL2+A2BzqDgnAmTT/Hzm/AGkQ7dOg
2WptQPNZRuv+XY8eDip8UB+z1vlXH4zQ1o9I6qDPPPDnCZccOgRoWHN0uqtbCJvs
zplNHxWUbJIbgl2trmST/gAUL3CgXDY8t1q+g2Y6rWpc1vQdQb6AtQUjskxh1gmH
DzRrHwECgYEA+Xs7NzIMLWFpq8iEUf0pgIUJyswIKv+NOiwcnL+OE47ZAyOdCpTz
IrwkydqMi9IlXAcghGEpSK/oXJ2KwYnUYr8TpIwycIMjehFQUx1sudxgsWX+QZBJ
xOuyRBXXYhq42LGXQ4xS2toqdQ3zDUAXmvfrvqGrjdwqG0UlnRB3b7UCgYEA0tKB
wKOBlhY9UJiIOWVeookfp77tk3iriUCsaFR1CCzTgupYZyMXNmBH3lUVkXV5NLPR
KVqTYrwf3DjPIghbv2h89l80O1hzOJm8IqTZDbO+K5m35+6ueoICeYOlhqggELJC
p0gVmZc6u9V9XsLRUj/X0yILMtfnztoHbtXrfsECgYEAwAyfLwQ135FHmVfIlJ0A
H9FKEnUyLHeBLjDa7ceABYpHgGUf9Q9og2q2HzVAUDo7TDaoT3/EGhJgGzujnw0N
E97nrhnGklpBKyy82t6h3gnJ3YYYTjxWrWKLXmI55WmQti8vtG4HMjYTzPwqCB84
jLEhJySpPZEoUMnQBLKyXqkCgYEAgv47kwfFUA13gamVExyyZYmQOrl+guA6rWia
96Rqp2666aBU15jNJoNChJoXca8tZZrJPsnBxFqh7UL7KOlKoK763lafbLRzu1qC
tH/7QfFKG2tDAwCiNwqrIPe0lOvIKLeqhKhci3eVDfsEECo6x8FViCGiFbBjn3qH
nc2bqsECgYEA5NVe0VY1fYYSXmVk7DnPQfxxb0eMy2GkAMmuQ7e10ui3aCZbC28L
gttBY63XLNCrEsJYd2jhur1+sAp4jD+ULFVQ54zw0fkr9f8bzzmgt63eDROXg7Xw
qD7Nt0B0jxM6/rgSLVHb602/Kx/5vW/I/y/8/iSYsAZmvubkILmb3wQ=
-----END RSA PRIVATE KEY-----
EOD;

	public static function encryptRSA($data, $array = true) {
		if($array) {
    		$data = Util::encodeJSON($data);
		}

		if (openssl_public_encrypt($data, $encrypted, self::$public_key, OPENSSL_PKCS1_PADDING)) {
			$data = base64_encode($encrypted);
		}
		else {
			throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
		}

		return $data;
	}

	public static function decryptRSA($data, $json = true) {
		if (openssl_private_decrypt(base64_decode($data), $decrypted, self::$private_key)) {
			$data = $decrypted;
		}
		else {
			$data = '';
		}

		if($json) {
			return Util::decodeJSON($data);
		}

		return $data;
	}		



}