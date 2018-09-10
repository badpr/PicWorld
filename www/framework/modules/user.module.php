<?php
class user {
    static
        $config;
    function __construct()
    {
        user::$config = require CONF_PATH;
        user::$config = user::$config['db'];
        if(!is_array(user::$config)){
            exit('You have any problems');
        }
    }
    public static function auth($login, $pass){
        if (count($pass) > 1 and count($login) > 1){
            R::setup( 'mysql:host='. user::$config['host_db'] .';dbname='. user::$config['name_db'] .'',
                user::$config['user_db'] , user::$config['pass_db'] );
            $sql = 'SELECT * FROM users WHERE login=:login AND pass=:pass';
            R::getAll($sql, [':login' => $login, ':pass' => $pass]);
            R::close();
        }
    }
    public static  function add($login, $mail, $pass, $first_name, $last_name){

    }
}