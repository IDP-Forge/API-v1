<?php

namespace App\Domain\OAuth2\Protocol\Role\Client;

enum ClientProfile: string
{
    case WebApp = 'Web Application';
    case MobileApp = 'Mobile Application';
    case SinglePageApp = 'Single-page Application';
    case ServersideApp = 'Serverside Application';
    case M2MApp = 'Machine-to-Machine Application';
    case IoTApp = 'Internet of Things Device(s)';
    case NativeApp = 'Native Application';
    case APIApp = 'API / Microservice';
}
