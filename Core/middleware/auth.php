<?php

namespace Core\middleware;

class auth{
    public function handle(){
        if(! $_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
}