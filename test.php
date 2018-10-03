#!/usr/bin/env php
<?php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$token_payload = [
  'iss' => 'https://github.com/auth0/php-jwt-example',
  'sub' => '123456',
  'name' => 'John Doe',
  'email' => 'info@auth0.com'
];

// This is your client secret
$key = '__test_secret__';

// This is your id token
$jwt = JWT::encode($token_payload, base64_decode(strtr($key, '-_', '+/')), 'HS256');

print "JWT:\n";
print_r($jwt);

$decoded = JWT::decode($jwt, base64_decode(strtr($key, '-_', '+/')), ['HS256']);

print "\n\n";
print "Decoded:\n";
print_r($decoded);

?>
