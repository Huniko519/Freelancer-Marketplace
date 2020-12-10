<?php

define('FIR', true);

// Database Settings
define('DB_TYPE', getenv('DB_TYPE'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_USERNAME', getenv('DB_USERNAME'));
define('DB_DATABASE', getenv('DB_DATABASE'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_PREFIX', '');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATION', 'utf8mb4_unicode_ci');

// External Paths
define('URL_PATH', getenv('URL_PATH'));

// Internal Paths
define('PUBLIC_PATH', 'public');
define('THEME_PATH', 'themes');
define('STORAGE_PATH', 'storage');
define('UPLOADS_PATH', 'uploads');

// Miscellaneous
define('COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', URL_PATH) . '/');

// Config Variables

$GLOBALS['config'] = array(
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800
  ),
  'session' => array(
    'session_admin' => 'waveAdmin',
    'session_name' => 'waveUser',
    'token_name' => 'token'
  )
);

// Freelancer User Roles
define('FREELANCER', getenv('FREELANCER_ROLE_CAPITAL_LETTERS'));
define('FREELANCER_URL', getenv('FREELANCER_ROLE_SMALL_LETTERS'));
define('FREELANCERS', getenv('FREELANCER_ROLE_CAPITAL_LETTERS_PLURAL'));
define('FREELANCERS_URL', getenv('FREELANCER_ROLE_SMALL_LETTERS_PLURAL'));

// Client User Roles
define('CLIENT', getenv('CLIENT_ROLE_CAPITAL_LETTERS'));
define('CLIENT_URL', getenv('CLIENT_ROLE_SMALL_LETTERS'));
define('CLIENTS', getenv('CLIENT_ROLE_CAPITAL_LETTERS_PLURAL'));
define('CLIENTS_URL', getenv('CLIENT_ROLE_SMALL_LETTERS_PLURAL'));