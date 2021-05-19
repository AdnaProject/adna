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



    if ( isset($_POST['username']) && isset($_POST['password']) ) {
    if ( $_POST['username'] !== null && $_POST['password'] !== null ) {

        if ( $r->hexists('users', $_POST['username']) ) {
            if ( password_verify($_POST['password'], $r->hget('users', $_POST['username'])) ) {
                setcookie("username", $_POST['username'], time()+9999999999999999999);
                setcookie("password", $_POST['password'], time()+9999999999999999999);
                header('Location: index.php');
            } else {
                echo('Incorrect Password :(');
            }
        } else {
            $r->hset('users', $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            echo('Account Created! Please login to continue');
        }

    }
    }

?>

    <!DOCTYPE html>
    <html>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    	<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: Comfortaa;
            }
        </style>
    	<body>
    		<br><br>
    		<div class="small-screen container bg-light bg-gradient rounded shadow-lg text-center" style="padding-top:1rem;padding-bottom:1rem;width:80%;display:none">
    			<h2 style="font-size:100px">Sorry!</h2>
    			<h3>classi needs a larger screen to function properly. If you have a tablet or laptop, try using that instead. Sorry for the inconvenience.<br><br>classi</h3>
    		</div>
    		<div class="ui container-lg bg-light bg-gradient rounded shadow text-center text-wrap" style="padding-top:1rem;padding-bottom:2rem">
    		<div class="container bg-light bg-gradient rounded shadow-lg text-center" style="padding-top:5px;padding-bottom:5px;width:50%">
    			<img src="AdnaProject.png" height="200px" width="200px" />
    			<?php echo('<h2>' . $sitename . '</h2>'); ?>
    			<h4>Version 0.3 Beta</h4>
    		</div>
    		<br>
    		<div class="row row-cols-1">
    			<div class="col">
    				<div class="container bg-light bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:2rem;width:90%;margin-top:0.5rem;margin-bottom:0.5rem">
    					<div class="container bg-primary bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:1px;width:100%">
    						<center>
    							<h3>Login</h3>
    							<p>Don't have a login? Just enter a valid username and password here and we'll create the account for you.</p>

    							<form action="login.php" method="post">
                                  <input class="form-control" type="text" id="username" name="username" placeholder="Username"><br>
                                  <input class="form-control" type="password" id="password" name="password" placeholder="Password"><br>
                                  <input class="form-control" type="submit" value="Login">
                                </form>

                                <br>
    						</center>
    					</div>