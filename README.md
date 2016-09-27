# OpenExchangeRates PHP API Wrapper

This package is a slightly OpenExchangeRates API wrapper.
Right now it only supports latest.json endpoint

## Usage - simple

Simplest possible use case:

```php
$wrapper = new \TigranMaestro\OpenExchangeRatesPHPClient\Wrapper('__YOUR_APP_ID__');
$wrapper->setHttpClient();

$api = $wrapper->createLatestAPI();
$api->setSymbols([
    'EUR',
    'AMD'
]);

$result = $api->call();

echo "<pre>";
var_dump($result);
echo "</pre>";
```

That's it, this is all you need to get started.