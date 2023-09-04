<?php

use App\Exports\CustomersExport;

class HelperOne extends CustomersExport{

    public function filterData($data){
        $filteringData= $data;
        $this->allData=$filteringData;
        return response()->json($data);
    }

}


function sendSMS($sms, $to)
{

    $apikey = urlencode("C200107361495ffa156de2.55720789");
    $mobileno = $to;
    $senderId = urlencode("8809612113344");
    $type = urlencode("text");
    $mesg = urlencode($sms);

    $api_params = '?api_key=' . $apikey . '&type=' . $type . '&contacts=' . $mobileno . '&senderid=' . $senderId . '&msg=' . $mesg;
    $smsGatewayUrl = "http://portal.metrotel.com.bd/smsapi";
    $smsgatewaydata = $smsGatewayUrl . $api_params;
    $url = $smsgatewaydata;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}
