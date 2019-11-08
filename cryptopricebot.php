<?php
/**
 * Requires curl enabled in php.ini
 * Retrieves a list of the top 100 cryptocurrency and the exchange rate in USD
 **/

include __DIR__ . '/vendor/autoload.php';
use \Arweave\SDK\Arweave;
use \Arweave\SDK\Support\Wallet;

// Creating a Arweave object, this is the primary SDK class,
// It contains the public methods for creating, sending and getting transactions
$arweave = new \Arweave\SDK\Arweave('https', 'arweave.net', '443');

// Decode our JWK file to a PHP array named $jwk
$jwk = json_decode(file_get_contents('/home/sysadmin/arweave/jwk.json'), true);

// Create a new wallet using the $jwk array
$wallet =  new \Arweave\SDK\Support\Wallet($jwk);

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '100',
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: YOUR CMC API KEY GOES HERE'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
// print_r(json_decode($response)); // print json decoded response
curl_close($curl); // Close request




// Retrieve JSON BCH price data from bitcoinaverage
// $results = file_get_contents('https://apiv2.bitcoinaverage.com/indices/global/ticker/BCHUSD');
$trim_data = @json_decode(trim($response), true);

// Verify data and encode data
  if ( is_array( $trim_data ) ) {
  $json_data = json_encode ($trim_data);
  }

// Create a new ARWEAVE transaction to store the verified data
$transaction = $arweave->createTransaction($wallet, [
    'data' => $json_data,
    'tags' => [
        'Content-Type' => 'application/json'
    ]
]);

printf ('Your transaction ID is %s', $transaction->getAttribute('id'));

// Send the transaction to the arweave network
// $arweave->commit($transaction);
$arweave->api()->commit($transaction);
?>
