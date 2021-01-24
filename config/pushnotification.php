<?php
/**
 * @see https://github.com/Edujugon/PushNotification
 */

return [
    'gcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'My_ApiKey',
    ],
    'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAA_KzpiF4:APA91bFlIjw6rmefzM3-hakZM3ojhgc8b3feQtfGfwLZpZzcKJo0t6P00pjTC3AAhoYXapQqa-DdJd3I9Sq66QJqjD928CtRnJfIQQjJrgapZzROtHAl3hIVx9r3p_tISvNP-EizB3hQ',
    ],
    'apn' => [
        'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
        'passPhrase' => 'secret', //Optional
        'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
        'dry_run' => true,
    ],
];
