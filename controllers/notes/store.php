<?php

use Core\validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$err = [];

if (! Validator::string($_POST['body'], 1, 1000)){
    $err['body'] = 'a body of no more than 1k characters is requiered';
}


if (! empty($err)){
    return view("notes/create.view.php", [
        'heading' => 'Compose Note',
        'err' => $err
    ]);
}


$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 3
]);


header('location: /index');
die();
