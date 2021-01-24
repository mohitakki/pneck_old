<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        
         'vendorkyc' => [
            'driver' => 'local',
            'root' => public_path('/storage/pan_file/'),
            'url' => env('APP_URL').'/storage/pan_file',
            'visibility' => 'public',
        ],

        'publickyc' => [
            'driver' => 'local',
            'root' => public_path('/storage/dl_file/'),
            'url' => env('APP_URL').'/storage/dl_file',
            'visibility' => 'public',
        ],

        'empdlkyc' => [
            'driver' => 'local',
            'root' => public_path('dl_file/'),
            'url' => env('APP_URL').'/dl_file',
            'visibility' => 'public',
        ],
        
         'empvehiclekyc' => [
            'driver' => 'local',
            'root' => storage_path('vehicle_file/'),
            'url' => env('APP_URL').'/vehicle_file',
            'visibility' => 'public',
        ],
        
        'empaadharkyc' => [
            'driver' => 'local',
            'root' => public_path('aadhar_file/'),
            'url' => env('APP_URL').'/aadhar_file',
            'visibility' => 'public',
        ],
        
        'kycpanvendor' => [
            'driver' => 'local',
            'root' => storage_path('/pan_file/'),
            'url' => env('APP_URL').'/storage/pan_file',
            'visibility' => 'public',
        ],
        
        'kycdlemp' => [
            'driver' => 'local',
            'root' => storage_path('/dl_file/'),
            'url' => env('APP_URL').'/storage/dl_file',
            'visibility' => 'public',
        ],
        
         'kycvehicleemp' => [
            'driver' => 'local',
            'root' => storage_path('/vehicle_file/'),
            'url' => env('APP_URL').'/storage/vehicle_file',
            'visibility' => 'public',
        ],
        
         'kycaadharemp' => [
            'driver' => 'local',
            'root' => storage_path('/aadhar_file/'),
            'url' => env('APP_URL').'/storage/aadhar_file',
            'visibility' => 'public',
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('/employee_img/'),
            'url' => env('APP_URL').'/storage/employee_img',
            'visibility' => 'public',
        ],
        
        'user' => [
            'driver' => 'local',
            'root' => storage_path('/user_img/'),
            'url' => env('APP_URL').'/storage/user_img',
            'visibility' => 'public',
        ],
        
        'passenger' => [
            'driver' => 'local',
            'root' => storage_path('/passenger/'),
            'url' => env('APP_URL').'/storage/passenger',
            'visibility' => 'public',
        ],

        'vendor' => [
            'driver' => 'local',
            'root' => storage_path('/vendor_img/'),
            'url' => env('APP_URL').'/storage/vendor_img',
            'visibility' => 'public',
        ],
        
        'vendor_service_img' => [
            'driver' => 'local',
            'root' => storage_path('/vendor_service_img/'),
            'url' => env('APP_URL').'/storage/vendor_service_img',
            'visibility' => 'public',
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

];
