<?php

/*
 * This file is part of the Laravel payant package.
 *
 * (c) Odutola Abisoye <odutolaabisoye@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
