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
    $action = $_GET['action'];

    if ( $action == 'add' ) {
        $name = $_GET['taskname'];
        $tasknum = count($r->smembers($user . '-tasks')) + 1;
        $r->sadd($user . '-tasks', $tasknum);
        $r->hset($user . '-task-' . $tasknum, 'name', $name);

        if ( isset($_GET['taskurl']) ) {
            $url = $_GET['taskurl'];
            $r->hset($user . '-task-' . $tasknum, 'url', $url);
        }

        echo('Done');
    }

    if ( $action == 'complete' ) {
        $task = $_GET['task'];
        $r->srem($user . '-tasks', $task);
        $r->del($user . '-task-' . $task);
        echo('Done');
    }

    if ( $action == 'list' ) {
        $tasks = $r->smembers($user . '-tasks');

        $i = 0;
        foreach ( $tasks as $task ) {
            if ( ++$i == 1 ) {
                echo( $r->hget($user . '-task-' . $task, 'name') . ',' . $r->hget($user . '-task-' . $task, 'url') );
            } else {
                echo( ';' . $r->hget($user . '-task-' . $task, 'name') . ',' . $r->hget($user . '-task-' . $task, 'url') );
            }
        }
    }

?>