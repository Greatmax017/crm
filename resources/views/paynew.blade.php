<?php

$curl = curl_init();

$customer_email = $_POST['email'];
$amount = $_POST['amount'];  
$currency = "NGN";
$txref = "rave" . uniqid(); // ensure you generate unique references per transaction.
// get your public key from the dashboard.
$PBFPubKey = "FLWPUBK_TEST-6aadf92525413d3f04fb0f26b35ebb2f-X"; 
$redirect_url = "https://127.0.0.1:8000/dashboard"; // Set your own redirect URL



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// redirect to page so User can pay

header('Location: ' . $transaction->data->link);