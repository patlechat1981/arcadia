<?php 

$config['dbUser'] = 'root';
$config['dbPassword'] = $_ENV['DB_PASSWORD']; // required
$config['dbConnectionString'] = $_ENV['DB_CONNECTION'];
$config['secret'] = $_ENV['DB_SECRET'];

return $config;

?>