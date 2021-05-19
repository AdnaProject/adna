<?php

    /*

                 _
         __ _ __| |_ _  __ _
        / _` / _` | ' \/ _` |
        \__,_\__,_|_||_\__,_|

            (c) 2021 Lincoln Williams

            Thank you to all of our contributors!

    */

    require('include.php');

    $name = $_GET['task'];
    $url = $_GET['url'];

    $tasknum = count($r->smembers($user . '-tasks')) + 1;

    $r->sadd($user . '-tasks', $tasknum);

    $r->hset($user . '-task-' . $tasknum, 'name', $name);

    /*
    $prefixhttps = 'https://';
    $prefixhttp = 'http://';
    $str = $name;

    if ( substr($str, 0, strlen($prefixhttps)) == $prefixhttps ) {
        $str = substr($str, strlen($prefixhttps));
    }
    */

    $r->hset($user . '-task-' . $tasknum, 'url', $url);

    header('Location: index.php');

?>