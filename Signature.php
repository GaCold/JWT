<?php 
require './Util/appUtil.php';
require './RSA/appRSA.php';
class Signature {

	public function checkSignature() {
		return $this->validateSignatureGetData();
	}
	
	private function validateSignatureGetData() {
		if(Util::getParam($_SERVER, 'CONTENT_TYPE') == 'application/json') {
			$all_data_json = file_get_contents('php://input');
			$all_data = Util::decodeJSON($all_data_json);

			if(
                appUtil::getParam($all_data, 'request_id') &&
                appUtil::getParam($all_data, 'signature') &&
                appRSA::decrypt($all_data['signature'])
            ) {
				return true;
			}

			return false;
		}
	}
}