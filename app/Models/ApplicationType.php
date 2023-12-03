<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationType extends Model
{
    public const APP_WEB_APP_ID = 1;
    public const APP_MOBILE_ID = 2;
    public const APP_SPA_ID = 3;
    public const APP_SERVERSIDE_ID = 4;
    public const APP_M2M_ID = 5;
    public const APP_IOT_ID = 6;
    public const APP_DESKTOP_ID = 7;
    public const APP_API_MICROSERVICE_ID = 8;

    public const APP_TYPES = [
        self::APP_WEB_APP_ID => [
            'id' => self::APP_WEB_APP_ID,
            'title' => 'Web Application',
            'description' => 'OAuth 2.0 is widely used to secure web applications. In this scenario, a user interacts with a web application, and the web application obtains access to protected resources on behalf of the user.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
        self::APP_MOBILE_ID => [
            'id' => self::APP_MOBILE_ID,
            'title' => 'Mobile Application',
            'description' => 'Mobile apps, whether native or hybrid, can use OAuth 2.0 to obtain access tokens for accessing protected resources. OAuth 2.0 supports mobile-specific authentication and authorization flows.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
        self::APP_SPA_ID => [
            'id' => self::APP_SPA_ID,
            'title' => 'Single Page Application',
            'description' => 'SPAs, which run entirely in the user\'s browser, can leverage OAuth 2.0 for secure access to APIs and resources. Implicit Grant is a common OAuth 2.0 grant type used in SPAs.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
        self::APP_SERVERSIDE_ID => [
            'id' => self::APP_SERVERSIDE_ID,
            'title' => 'Server-Side Application',
            'description' => 'Server-side applications, where the entire application logic and execution occur on a server, can use OAuth 2.0 to obtain access tokens for interacting with protected resources.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
        self::APP_M2M_ID => [
            'id' => self::APP_M2M_ID,
            'title' => 'Machine-to-Machine Application',
            'description' => 'OAuth 2.0 is applicable to scenarios involving machine-to-machine communication, where one system (acting as a client) accesses protected resources on another system without user involvement. Client Credentials Grant is commonly used in such scenarios.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
        self::APP_IOT_ID => [
            'id' => self::APP_IOT_ID,
            'title' => 'Internet of Things (IoT) Device(s)',
            'description' => 'OAuth 2.0 can be employed in IoT applications, allowing devices to obtain access tokens for interacting with APIs and services securely.',
            'rfc' => '6749, 8628',
            'metadata' => [
                'rfc' => ['https://tools.ietf.org/html/rfc6749', 'https://tools.ietf.org/html/rfc8628']
            ],
        ],
        self::APP_DESKTOP_ID => [
            'id' => self::APP_DESKTOP_ID,
            'title' => 'Desktop Application',
            'description' => 'Desktop applications can use OAuth 2.0 for authentication and authorization. The authorization code grant type is commonly used in this context.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],

        self::APP_API_MICROSERVICE_ID => [
            'id' => self::APP_API_MICROSERVICE_ID,
            'title' => 'API / MicroService',
            'description' => 'OAuth 2.0 is often used to secure APIs and microservices. This enables clients to obtain access tokens to access protected resources provided by these services.',
            'rfc' => '6749',
            'metadata' => [
                'rfc' => 'https://tools.ietf.org/html/rfc6749'
            ],
        ],
    ];

    protected $table = 'application_types';

    public $timestamps = true;

    protected $casts = [
        'metadata' => 'array'
    ];
}
