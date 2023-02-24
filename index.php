<?php

// CoinMarketCap API endpoint URL
$cmc_url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';

// CoinGecko API endpoint URL
$cg_url = 'https://api.coingecko.com/api/v3/simple/price';

// CoinMarketCap API key
$cmc_key = 'YOUR_CMC_API_KEY';

// Assets to compare
$assets = array('bitcoin', 'ethereum', 'litecoin');

// Loop through the assets
foreach ($assets as $asset) {
  
  // Get the prices from CoinMarketCap API
  $cmc_params = array(
    'symbol' => strtoupper($asset),
    'convert' => 'USD'
  );
  $headers = array(
    'X-CMC_PRO_API_KEY: ' . $cmc_key
  );
  $cmc_url_with_params = $cmc_url . '?' . http_build_query($cmc_params);
  $cmc_response = file_get_contents($cmc_url_with_params, false, stream_context_create(array(
    'http' => array(
      'method' => 'GET',
      'header' => implode("\r\n", $headers)
    )
  )));
  $cmc_price = json_decode($cmc_response)->data->{$asset}->quote->USD->price;
  
  // Get the prices from CoinGecko API
  $cg_params = array(
    'ids' => $asset,
    'vs_currencies' => 'usd'
  );
  $cg_url_with_params = $cg_url . '?' . http_build_query($cg_params);
  $cg_response = file_get_contents($cg_url_with_params);
  $cg_price = json_decode($cg_response)->{$asset}->usd;
  
  // Calculate the difference
  $difference = abs($cmc_price - $cg_price);
  
  // Output the result
  echo 'The difference in price for ' . strtoupper($asset) . ' is $' . number_format($difference, 2) . '<br>';
  
}
