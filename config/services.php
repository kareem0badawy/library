<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' =>
    [
    'client_id'     =>'1777369105831396',
    'client_secret' =>'74f5552d92d3e9a6dd6907f7cd76fbf4',
    'redirect'     =>'http://localhost:8000/callback',
    ],

    'google' =>
    [
    'client_id'     =>'257965243628-8u3q71egai8lmop4eh73akmg3drjn36j.apps.googleusercontent.com',
    'client_secret' =>'jMBo9jVK6vfFH2sxxMkmUElO',
    'redirect'     =>'http://localhost:8000/callback/google',
    ],

];
