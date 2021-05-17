<?php

    /*

                 _
         __ _ __| |_ _  __ _
        / _` / _` | ' \/ _` |
        \__,_\__,_|_||_\__,_|

            (c) 2021 Lincoln Williams

            Thank you to all of our contributors!

    */

    $usercheck = 'no';
    require('include.php');

    $apikey = $_GET['apikey'];

    $user = $r->hget('apikeys', $apikey);
    $name = $_GET['taskname'];
    $action = $_GET['action'];
    $task = $_GET['task'];

    if ( $action = 'add' ) {
        $tasknum = count($r->smembers($user . '-tasks')) + 1;
        $r->sadd($user . '-tasks', $tasknum);
        $r->hset($user . '-task-' . $tasknum, 'name', $name);
        echo('Done');
    }

    if ( $action = 'complete' ) {
        $r->srem($user . '-tasks', $task);
        $r->del($user . '-task-' . $task);
    }

?>