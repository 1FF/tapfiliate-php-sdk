Tapfiliate PHP SDK
==================

A PHP wrapper around the Tapfiliate API

Install
-------

Install http://getcomposer.org/ and run the following command:

```
php composer.phar require tapfiliate/sdk-php
```

PHP SDK Configuration
---

##  To use SDK you need:
- Configure an ApiClient
- Configure handler which will perform an action

### How to configure an ApiClient?
You just need to fill in the required arguments
```php
$logger = new NullLogger();
$helper = new ModelFiller();
$api = new ApiClient($logger, '<Your API key>');
```

#### How to get an API key? </br>

- Go to Tapfiliate platform.
- Login to your publisher account. 
- Click on your account image. 
- Then choose ```Profile settings > API key```
- And copy the value from ```API key``` text field

### How to get a Tapfiliate host? </br>
By default, it's set to: [https://api.tapfiliate.com](https://api.tapfiliate.com) <br>
But you can modify host by adding your own data to ```ApiClient``` constructor

#### How to configure a handler?
Example of ClicksHandler configuration:
```php
$clickHandler = new ClicksHandler($api, $helper);
```

Example of click creation:
```php
$clicks = new Click();
// You can set specific data to Click model (e.g referral code)
$clicks->setReferralCode('<referral code>');
$clickHandler->createClick($clicks);
```
After executing ```createClick``` action it will return a Clicks object filled with API response. <br>
Example of response:
```php
object(Tapfiliate\Models\Click) {
    ["id":"Tapfiliate\Models\Click":private]=> string(36) "<click id>"
    ["referralCode":"Tapfiliate\Models\Click":private]=> string(6) "<referral code>"
    ["sourceId":"Tapfiliate\Models\Click":private]=> NULL
    ["referrer":"Tapfiliate\Models\Click":private]=> NULL
    ["landingPage":"Tapfiliate\Models\Click":private]=> NULL
    ["userAgent":"Tapfiliate\Models\Click":private]=> NULL
    ["ip":"Tapfiliate\Models\Click":private]=> NULL
    ["metaData":"Tapfiliate\Models\Click":private]=> array(0) {
    }
}
```
If something goes wrong ```ClicksHandler``` will throw an exception.



