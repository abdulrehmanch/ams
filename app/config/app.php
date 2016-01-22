<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale
    |--------------------------------------------------------------------------
    |
    | This locale ties into the language files in app/lang, which contain the
    | language files for each translation.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | This setting may be used to control the default cipher used by the Laravel
    | encryption facilities.
    |
    | Note: In Laravel 4.2, the default cipher is MCRYPT_RIJNDAEL_128 (AES),
    | which is considered to be the most secure cipher. Changing the cipher
    | back to MCRYPT_RIJNDAEL_256 is required to decrypt cookies/values that
    | were encrypted in Laravel <= 4.1
    |
    */

    'cipher' => MCRYPT_RIJNDAEL_256,

    /*
    |--------------------------------------------------------------------------
    | Prevent Password changes
    |--------------------------------------------------------------------------
    |
    | If for some reason you do not wish for admins to be able to edit the password
    | for any user (including themselves), set this to true.
    |
    */

    'lock_passwords' => false,



    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */


    'providers' => array(

        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        'Illuminate\Cache\CacheServiceProvider',
        'Illuminate\Session\CommandsServiceProvider',
        'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
        'Illuminate\Routing\ControllerServiceProvider',
        'Illuminate\Cookie\CookieServiceProvider',
        'Illuminate\Database\DatabaseServiceProvider',
        'Illuminate\Encryption\EncryptionServiceProvider',
        'Illuminate\Filesystem\FilesystemServiceProvider',
        'Illuminate\Hashing\HashServiceProvider',
        'Illuminate\Html\HtmlServiceProvider',
        'Illuminate\Log\LogServiceProvider',
        'Illuminate\Mail\MailServiceProvider',
        'Illuminate\Database\MigrationServiceProvider',
        'Illuminate\Pagination\PaginationServiceProvider',
        'Illuminate\Queue\QueueServiceProvider',
        'Illuminate\Redis\RedisServiceProvider',
        'Illuminate\Remote\RemoteServiceProvider',
        'Illuminate\Auth\Reminders\ReminderServiceProvider',
        'Illuminate\Database\SeedServiceProvider',
        'Illuminate\Session\SessionServiceProvider',
        'Illuminate\Translation\TranslationServiceProvider',
        'Illuminate\Validation\ValidationServiceProvider',
        'Illuminate\View\ViewServiceProvider',
        'Illuminate\Workbench\WorkbenchServiceProvider',
        'Barryvdh\Debugbar\ServiceProvider',
        'Cartalyst\Sentry\SentryServiceProvider',
        'Chumper\Datatable\DatatableServiceProvider',
        'Maknz\Slack\SlackServiceProvider',
        'Schickling\Backup\BackupServiceProvider',
        'Chumper\Zipper\ZipperServiceProvider',
        'Fideloper\Proxy\ProxyServiceProvider',

    ),

    /*
    |--------------------------------------------------------------------------
    | Service Provider Manifest
    |--------------------------------------------------------------------------
    |
    | The service provider manifest is used by Laravel to lazy load service
    | providers which are not needed for each request, as well to keep a
    | list of all of the services. Here, you may set its storage spot.
    |
    */

    'manifest' => storage_path().'/meta',

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => array(

            'App'             		=> 'Illuminate\Support\Facades\App',
            'Artisan'         		=> 'Illuminate\Support\Facades\Artisan',
            'Auth'            		=> 'Illuminate\Support\Facades\Auth',
            'Blade'           		=> 'Illuminate\Support\Facades\Blade',
            'Cache'           		=> 'Illuminate\Support\Facades\Cache',
            'ClassLoader'     		=> 'Illuminate\Support\ClassLoader',
            'Config'          		=> 'Illuminate\Support\Facades\Config',
            'Controller'      		=> 'Illuminate\Routing\Controller',
            'Cookie'          		=> 'Illuminate\Support\Facades\Cookie',
            'Crypt'           		=> 'Illuminate\Support\Facades\Crypt',
            'DB'              		=> 'Illuminate\Support\Facades\DB',
            'Datatable' 			=> 'Chumper\Datatable\Facades\DatatableFacade',
            'Eloquent'        		=> 'Illuminate\Database\Eloquent\Model',
            'Event'           		=> 'Illuminate\Support\Facades\Event',
            'File'            		=> 'Illuminate\Support\Facades\File',
            'Form'            		=> 'Illuminate\Support\Facades\Form',
            'Hash'            		=> 'Illuminate\Support\Facades\Hash',
            'HTML'            		=> 'Illuminate\Support\Facades\HTML',
			'Image'           		=> 'Intervention\Image\ImageManagerStatic',
            'Input'           		=> 'Illuminate\Support\Facades\Input',
            'Lang'            		=> 'Illuminate\Support\Facades\Lang',
            'Log'             		=> 'Illuminate\Support\Facades\Log',
            'Mail'            		=> 'Illuminate\Support\Facades\Mail',
            'Paginator'       		=> 'Illuminate\Support\Facades\Paginator',
            'Password'        		=> 'Illuminate\Support\Facades\Password',
            'Queue'           		=> 'Illuminate\Support\Facades\Queue',
            'Redirect'        		=> 'Illuminate\Support\Facades\Redirect',
            'Redis'           		=> 'Illuminate\Support\Facades\Redis',
            'Request'         		=> 'Illuminate\Support\Facades\Request',
            'Response'        		=> 'Illuminate\Support\Facades\Response',
            'Route'           		=> 'Illuminate\Support\Facades\Route',
            'Schema'          		=> 'Illuminate\Support\Facades\Schema',
            'Seeder'          		=> 'Illuminate\Database\Seeder',
            'Sentry'          		=> 'Cartalyst\Sentry\Facades\Laravel\Sentry',
            'Session'         		=> 'Illuminate\Support\Facades\Session',
            'SoftDeletingTrait'     => 'Illuminate\Database\Eloquent\SoftDeletingTrait',
            'SSH'             		=> 'Illuminate\Support\Facades\SSH',
            'Str'             		=> 'Illuminate\Support\Str',
            'URL'             		=> 'Illuminate\Support\Facades\URL',
            'Validator'       		=> 'Illuminate\Support\Facades\Validator',
            'View'            		=> 'Illuminate\Support\Facades\View',
            'Reader'				=> 'League\Csv\Reader',
            'Slack' 				=> 'Maknz\Slack\Facades\Slack',
            'Zipper'                => 'Chumper\Zipper\Zipper',

    ),

);
