<?php

/**
 * Fir. A lightweight PHP MVC Framework.
 *
 * @author Codefir
 * @license MIT
 * @link https://codefir.com
 */

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../plugins/Stripe/autoload.php';

include __DIR__ .'/../plugins/PHPMailer/PHPMailer.php';
include __DIR__ .'/../plugins/PHPMailer/Exception.php';
include __DIR__ .'/../plugins/PHPMailer/SMTP.php';

use Medoo\Medoo;

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

require_once(__DIR__ . '/../app/includes/config.php');
require_once(__DIR__ . '/../app/includes/init.php');
require_once(__DIR__ . '/../app/includes/info.php');

$app = new Fir\App();