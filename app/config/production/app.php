<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => 'http://202.166.167.119:81/ams/public',


    /*
    |--------------------------------------------------------------------------
    | Organization Domain Name
    |--------------------------------------------------------------------------
    |
    | The domain name of the organization, used when generating email addresses
    | through the import tools.
    |
    */

    'domain' => 'yourserver.com',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    | Run a php artisan key:generate --env=staging to create a random one
    */

    'key' => 'Do0p9gff4LxpGMeGEXgphRCeO81TDgNn',

);
