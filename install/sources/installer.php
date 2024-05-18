<?php

// Installer script

// Define constants for database connection
$dbHost = $_POST['dbHost'];
$dbName = $_POST['dbName'];
$dbUser = $_POST['dbUser'];
$dbPass = $_POST['dbPass'];
$siteName = $_POST['siteName'];

// Define constant for base URL
$baseUrl = 'http://'.$dbHost.'/'.$siteName.'/';

// Check if the database host is specified
if (empty($dbHost)) {
    die('The database host is not specified. Please check the installer script and try again.');
}

// Create a config file to store the defined constants
$configFile = '../../config/index.php';

// Check if the config file is writable
if (!is_writable($configFile)) {
    die('The config file is not writable. Please check the file permissions and try again.');
}

// Write the defined constants to the config file
$constants = array(
    'DB_HOST' => $dbHost,
    'DB_NAME' => $dbName,
    'DB_USER' => $dbUser,
    'DB_PASS' => $dbPass,
    'BASE_URL' => $baseUrl,
    'SITE_NAME' => $siteName
);

foreach ($constants as $name => $value) {
    $line = "define('{$name}', '{$value}');\n";
    file_put_contents($configFile, $line, FILE_APPEND);
}

// Create database tables
try {
    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
} catch (\Throwable $th) {
    die('No existe la base de datos "'.$dbName.'".');
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create users table
$usersTable = <<<SQL
CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
SQL;
$pdo->exec($usersTable);

// Insert the admin user into the database
$stmt = $pdo->prepare('INSERT INTO usuarios (usuario, correo, password) VALUES (:usuario, :correo, :password)');
$stmt->execute(['usuario' => 'admin', 'correo' => 'admin@admin.com', 'password' => password_hash('admin', PASSWORD_DEFAULT)]);


// Create posts table
$postsTable = <<<SQL
CREATE TABLE IF NOT EXISTS posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
SQL;
$pdo->exec($postsTable);

header('Location: '. $baseUrl.'install/bienvenida.php');
exit;

?>