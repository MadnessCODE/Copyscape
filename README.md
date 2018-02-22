# Copyscape API For PHP

## Installation

The Copyscape API can be installed with [Composer](https://getcomposer.org/). Run this command:
```sh
composer require madnesscode/copyscape
```

## Usage

> **Note:** This version of the API requires PHP 5.6 or greater.

Example

```php
use MadnessCODE\Copyscape\Api;
```
Use copyscape username and API key for credentials:
```php
$copyscape = new Api('my_username', 'my_api_key');
```
Enable test mode:
```php
$copyscape->setTestMode();
```
Check your account balance:
```php
$result = $copyscape->getBalance();
print_r($result);
```
Url search:
```php
$result = $copyscape->urlSearch('http://www.copyscape.com/example.html');
print_r($result);
```
Text search:
```php
$result = $copyscape->textSearch('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
print_r($result);
```

Complete documentation is available [here](https://www.copyscape.com/api-guide.php).