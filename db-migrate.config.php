<?php
$host   = getenv('MYSQL_HOST')     ?: 'localhost';
$user   = getenv('MYSQL_USER')     ?: 'root';
$pass   = getenv('MYSQL_PASSWORD') ?: 'root';
$dbname = getenv('MYSQL_DATABASE') ?: 'test';
$pdo = new \PDO("mysql:dbname=$dbname;port=33066;host=$host;charset=utf8", $user, $pass);

return array(
    'pdo' => $pdo,
    'directory' => 'migrate',
    'args' => array($pdo),
);
