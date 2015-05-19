<?php
/*
Controller name: Auth
Controller description: Checking auth and so on ...
*/

class JSON_API_Auth_Controller {

    public function info(){
        return array(
            "version" => JSON_API_AUTH_VERSION
        );
    }

    public function check_auth()
    {
        if ( is_user_logged_in() ) {
            return array(
                "user_id" => get_current_user_id(),
//                "user" => new JSON_API_User( wp_get_current_user() )
            );
        } else {
            return array(
                "user_id" => 0,
//                "user" => null
            );
        }
    }
}