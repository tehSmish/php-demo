<?php


use Core\Database;
use Core\App;
use Core\validator;

$email = $_POST['email'];

$password = $_POST['password'];


//validate
$err = [];
if (! Validator::email($email)) {
    $err['email'] = 'Please provide a valid email addresss.';
}
if (! Validator::string($password)) {
    $err['password'] = 'Please provide a valid password.';
}

if (! empty($err)){
    return view('session/create.view.php', [
        'err' => $err
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from user where email = :email', [
    'email' => $email
])->find();

if($user){
    if (password_verify($password, $user['password'])){
        login([
            'email' => $email
        ]);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'err' => [
        'email' => 'No matching email or password found'
    ]
]);



