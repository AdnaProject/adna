<?php

    /*

                 _
         __ _ __| |_ _  __ _
        / _` / _` | ' \/ _` |
        \__,_\__,_|_||_\__,_|

            (c) 2021 Lincoln Williams

            Thank you to all of our contributors!

    */

    require('vendor/autoload.php');

    Predis\Autoloader::register();

    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379
      ));

    $r = $redis;

    if ( $usercheck !== 'no' ) {
        if ( $_COOKIE['username'] !== null and $_COOKIE['password'] !== null ) {
            if ( password_verify($_COOKIE['password'], $r->hget('users', $_COOKIE['username'])) ) {
                $user = $_COOKIE['username'];
            } else {
                header('Location: login.php');
            }
        } else {
            header('Location: login.php');
        }
    }

    exec('redis-server --daemonize yes');

    $sitename = 'adna';
    $version = '0.3.2 Beta';

?>