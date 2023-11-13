<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$active_user = 3;

$note = $db->query('select * from notes where id = :id', [
    
    'id' => $_POST['id']
    
])->find_or_fail();

authorize($note['user_id'] === $active_user);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /index');
exit();

