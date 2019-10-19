# laravel-payant



> A Laravel 5 Package for working with Paystack seamlessly

## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Payant, simply require it

```bash
composer require odutola/laravel-payant
```

Or add the following line to the require block of your `composer.json` file.

```
"composer require odutola/laravel-payant": "1.0.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.



Once Laravel Payant is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

> If you use **Laravel >= 5.5** you can skip this step and go to [**`configuration`**](https://github.com/odutolaabisoye/laravel-payant#configuration)

* `Odutola\Payant\PayantServiceProvider::class`

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'Payant' => Odutola\Payant\Facades\Payant::class,
    ...
]
```

## Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="Odutola\Payant\PayantServiceProvider"
```

A configuration-file named `payant.php` with some sensible defaults will be placed in your `config` directory:

```php
<?php

return [

    /**
     * Public Key From Payant Dashboard
     *
     */
    'publicKey' => getenv('PAYANT_PUBLIC_KEY'),

    /**
     * Secret Key From Payant Dashboard
     *
     */
    'secretKey' => getenv('PAYANT_SECRET_KEY'),

    /**
     * Payant Payment URL
     *
     */
    'paymentUrl' => getenv('PAYANT_PAYMENT_URL'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),
];
```


##General payment flow

Though there are multiple ways to pay an order, most payment gateways expect you to follow the following flow in your checkout process:

###1. The customer is redirected to the payment provider
After the customer has gone through the checkout process and is ready to pay, the customer must be redirected to site of the payment provider.

The redirection is accomplished by submitting a form with some hidden fields. The form must post to the site of the payment provider. The hidden fields minimally specify the amount that must be paid, the order id and a hash.

The hash is calculated using the hidden form fields and a non-public secret. The hash used by the payment provider to verify if the request is valid.


###2. The customer pays on the site of the payment provider
The customer arrived on the site of the payment provider and gets to choose a payment method. All steps necessary to pay the order are taken care of by the payment provider.

###3. The customer gets redirected back
After having paid the order the customer is redirected back. In the redirection request to the shop-site some values are returned. The values are usually the order id, a paymentresult and a hash.

The hash is calculated out of some of the fields returned and a secret non-public value. This hash is used to verify if the request is valid and comes from the payment provider. It is paramount that this hash is thoroughly checked.


## Usage

Open your .env file and add your public key, secret key, merchant email and payment url like so:

```php
PAYANT_PUBLIC_KEY=xxxxxxxxxxxxx
PAYANT_SECRET_KEY=xxxxxxxxxxxxx
PAYANT_PAYMENT_URL=https://api.demo.payant.ng
MERCHANT_EMAIL=odutolaabisoye@gmail.com
```

