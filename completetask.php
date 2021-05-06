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

    $task = $_GET['task'];

    $r->srem($user . '-tasks', $task);

    $r->del($user . '-task-' . $task);

    header('Location: index.php');

?>