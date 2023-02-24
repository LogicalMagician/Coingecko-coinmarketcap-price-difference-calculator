This PHP script compares the prices of selected cryptocurrencies on CoinMarketCap and CoinGecko exchanges and displays the differences between the prices for the same assets on both exchanges.

Prerequisites
To use this script, you'll need:

A web server that supports PHP
A valid CoinMarketCap API key
An internet connection
Installation
Clone or download the repository to your local machine.
Open the index.php file in a text editor.
Replace YOUR_CMC_API_KEY with your actual CoinMarketCap API key.
Save the file.
Usage
To use the script, simply run the index.php file on a web server that supports PHP. The script will fetch the prices of selected cryptocurrencies on CoinMarketCap and CoinGecko exchanges, compare them, and display the differences in the browser window.

Configuration
You can configure the script by modifying the following variables in the index.php file:

$cmc_url: The URL of the CoinMarketCap API endpoint.
$cg_url: The URL of the CoinGecko API endpoint.
$cmc_key: Your CoinMarketCap API key.
$assets: An array of cryptocurrencies to compare.
