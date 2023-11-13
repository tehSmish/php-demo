<?php

use Core\Database;
use Core\App;
use Core\validator;

$db = App::resolve(Database::class);
$active_user = 3;


$note = $db->query('select * from notes where id = :id', [
        
    'id' => $_POST['id']
    
])->find_or_fail();

authorize($note['user_id'] === $active_user);

$err = [];


if (! Validator::string($_POST['body'], 1, 1000)){
    $err['body'] = 'a body of no more than 1k characters is requiered';
}

if (count($err)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'err' => $err,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /index');
die();