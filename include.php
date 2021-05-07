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

    $user = '1';

    exec('redis-server --daemonize yes');

?>