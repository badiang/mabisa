<?php 

	function send_sms($number,$message)
	{
		  // $message = [
		  //     "secret" => "e6749ca7d0fa4e28236952661f9ad371975648eb", // your API secret from (Tools -> API Keys) page
		  //     "mode" => "devices",
		  //     "device" => "00000000-0000-0000-4172-d14bb3643cfe",
		  //     "sim" => 1,
		  //     "priority" => 1,
		  //     "phone" => $number,
		  //     "message" => $message
		  // ];

		  // $cURL = curl_init("https://sms.uncgateway.com/api/send/sms");
		  // curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		  // curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
		  // $response = curl_exec($cURL);
		  // curl_close($cURL);

		  // print_r ($result = json_decode($response, true));

		  //  $message = [
		  //     "secret" => "da76b868c8250b4a66962e43dfb724eac07c18a8", 
		  //     "mode" => "devices",
		  //     "device" => "00000000-0000-0000-6328-f6dfedda7e56",
		  //     "sim" => 1,
		  //     "phone" => $number,
		  //     "message" => $message
		  // ];

		  // $cURL = curl_init("https://www.cloud.smschef.com/api/send/sms");
		  // curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		  // curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
		  // $response = curl_exec($cURL);
		  // curl_close($cURL);

		  // print_r ($result = json_decode($response, true));
		echo 'good';
	}
 ?>