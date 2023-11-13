<?php 


function c_tab_highlight($pg_name){
    return $_SERVER['REQUEST_URI'] === $pg_name ? 'bg-gray-900 text-white' : 'text-gray-300';
}

function uriIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value) {

    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function authorize($condition, $status = 403){
    if (! $condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    session_regenerate_id(true);
}

function logout(){
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}