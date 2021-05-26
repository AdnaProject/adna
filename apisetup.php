<?php

    /*

                 _
         __ _ __| |_ _  __ _
        / _` / _` | ' \/ _` |
        \__,_\__,_|_||_\__,_|

            (c) 2021 Lincoln Williams

            Thank you to all of our contributors!

    */

    $usercheck = 'yes';
    require('include.php');



    $bytes = random_bytes(20);
    $newkey = bin2hex($bytes);

    if ( $r->get($user . '-apikey') !== null ) {

        echo('
        <center><br>
            Your API key is: <br><h3>' . $r->get($user . '-apikey') . '</h3>
        </center>
        ');

    } else {

        $r->set($user . '-apikey', $newkey);
        $r->hset('apikeys', $r->get($user . '-apikey'), $user);

        echo('API Key Generated! Refresh Page to Continue.');

    }

?>