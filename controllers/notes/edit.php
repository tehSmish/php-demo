<?php

use Core\Database;
use Core\App;
use Core\validator;

$db = App::resolve(Database::class);
$active_user = 3;



$note = $db->query('select * from notes where id = :id', [
        
    'id' => $_GET['id']
    
])->find_or_fail();

authorize($note['user_id'] === $active_user);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'err' => [],
    'note' => $note
]);