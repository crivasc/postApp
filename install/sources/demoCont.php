<?php

require_once '../../config/index.php';

// Connect to the database
$dsn = [
    'host' => DB_HOST,
    'dbname' => DB_NAME,
];

$pdo = new PDO("mysql:". http_build_query($dsn, '', ';'), DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Define the demo posts
$demoPosts = [
    [
        'titulo' => 'HTML5',
        'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.'
    ],
    [
        'titulo' => 'CSS3',
        'contenido' => 'In hac habitasse platea dictumst. Pellentesque ultrices. Fusce commodo. Vestibulum convallis, lorem a tempus semper, dui nulla ultricies arcu, ut viverra enim sem in augue.'
    ],
    [
        'titulo' => 'JavaScript',
        'contenido' => 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, ultrices ac, pede quic.'
    ],
    [
        'titulo' => 'React',
        'contenido' => 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.'
    ],
    [
        'titulo' => 'Angular',
        'contenido' => 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.'
    ],
    [
        'titulo' => 'Vue',
        'contenido' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci.'
    ],
    [
        'titulo' => 'Node.js',
        'contenido' => 'Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.'
    ]
];

// Insert the demo posts into the database
foreach ($demoPosts as $post) {
    $stmt = $pdo->prepare('INSERT INTO posts (titulo, contenido) VALUES (:titulo, :contenido)');
    $stmt->execute(['titulo' => $post['titulo'], 'contenido' => $post['contenido']]);
}

//echo 'Demo posts inserted successfully.';
header('Location: '.BASE_URL.'install/confirmar.php');

?>