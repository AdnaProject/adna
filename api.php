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

    $user = $r->hget('apikeys', $_GET['apikey']));
    $name = $_GET['taskname'];
    $action = $_GET['action'];

    if ( $action = 'add' ) {
        $tasknum = count($r->smembers($user . '-tasks')) + 1;
        $r->sadd($user . '-tasks', $tasknum);
        $r->hset($user . '-task-' . $tasknum, 'name', $name);
        echo('Done');
    }

?>