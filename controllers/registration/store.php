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
if (! Validator::string($password, 7, 255)) {
    $err['password'] = 'Please provide a valid password.';
}

if (! empty($err)){
    return view('registration/create.view.php', [
        'err' => $err
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from user where email = :email', [
    'email' => $email
])->find();

if ($user){
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO user(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}