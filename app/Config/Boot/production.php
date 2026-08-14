<?php

// Boot file for production environment
defined('ENVIRONMENT') || define('ENVIRONMENT', 'production');

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');
