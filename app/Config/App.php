<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public string $baseURL = 'http://localhost:8080/';
    public string $indexPage = '';
    public string $uriProtocol = 'REQUEST_URI';
    /*
     |--------------------------------------------------------------------------
     | Allowed URL Characters
     |--------------------------------------------------------------------------
     |
     | This lets you specify which characters are permitted within your URLs.
     | The configured value is a character group used like: '/\A[<permittedURIChars>]+\z/iu'
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-';
    public string $defaultLocale = 'id';
    public bool $negotiateLocale = false;
    public array $supportedLocales = ['id'];
    public string $appTimezone = 'Asia/Jakarta';
    public string $charset = 'UTF-8';
    public bool $forceGlobalSecureRequests = false;
    public bool $CSPEnabled = false;
    /**
     * Allowed hostnames for the application.
     * Used by CodeIgniter when validating the request host.
     *
     * @var string[]
     */
    public array $allowedHostnames = [];
    /**
     * Proxy IPs that the framework should trust for forwarded headers.
     * Example: ['10.0.0.1' => 'X-Forwarded-For']
     *
     * @var array<string, string>
     */
    public array $proxyIPs = [];
}
