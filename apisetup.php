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



    $bytes = random_bytes(20);
    $newkey = bin2hex($bytes);

    if ( $r->get($user . '-apikey') !== null ) {

        echo('
            Your API key is <b>' . $r->get($user . '-apikey') . '</b>
        ');

    } else {

        $r->set($user . '-apikey', $newkey);
        $r->hset('apikeys', $r->get($user . '-apikey'), $user);

        echo('API Key Generated! Refresh Page to Continue.');

    }

?>