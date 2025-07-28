<?php

namespace Szluha\Framesz;

use Szluha\Framesz\Framesz;

class Sessions {
    public function startSession($username, $password) {
        if ($this->authUser($username, $password)) {
            session_start();
            $_SESSION['user'] = $username;
            
            session_regenerate_id(true);
            
            return true;
        } else {
            return false;
        }   
    }

    public static function endSession() {
        $_SESSION = [];
        $cookie = session_get_cookie_params();
        session_destroy();
        
        setcookie("PHPSESSID", 
                  "", 
                  time() - 3600, 
                  $cookie["path"], 
                  $cookie["domain"], 
                  $cookie["secure"], 
                  $cookie["httponly"]);
    }

    protected function authUser($username, $password) {
        $db = Framesz::resolve("database");
        $sql = "SELECT * FROM users WHERE (username = ?)";
        $user = $db->query($sql, [$username])->fetch();

        if (! empty($user)) {
            if (! password_verify($password, $user['password'])) {
                return false;  
            }
            return true;         
        }
    }
}