<?php

class Moota extends CI_Controller{

	//function untuk get list bank
	function list_bank($key){
		$ch = curl_init();
		$headers = [
			"Accept: application/json",
    		"Authorization: Bearer $key"
		];

		curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v1/bank/");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_exec($ch);
	}

		//function untuk get mutasi/transaksi
	function mutasi($key, $bankid, $count){
		$ch = curl_init();
		$headers = [
			"Accept: application/json",
    		"Authorization: Bearer $key"
		];

		curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v1/bank/$bankid/mutation/recent/$count");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_exec($ch);
	}

	function getsaldo($key){

	$curl = curl_init();
	$headers= [
    "Accept: application/json",
    "Authorization: Bearer $key"
	];

	curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v1/balance');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_exec($curl);
	}

}

?>