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
			<h4>Version <?php echo($version); ?></h4>
		</div>
		<br>
		<div class="row row-cols-1">
			<div class="col">
				<div class="container bg-light bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:2rem;width:90%;margin-top:0.5rem;margin-bottom:0.5rem">
					<div class="container bg-primary bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:1px;width:100%">
						<center>
							<h3>You have <b><?php echo(count($r->smembers($user . '-tasks'))); ?></b> Tasks</h3>

							<form action="addtask.php" method="get">
                              <input class="form-control" type="text" id="task" name="task" placeholder="Name"><br>
                              <input class="form-control" type="text" id="url" name="url" placeholder="URL"><br>
                              <input class="form-control" type="submit" value="Add Task">
                            </form>

                            <br>
						</center>
					</div>
					<div style="height:0.5rem"></div>



					<?php

					$tasks = $r->smembers($user . '-tasks');

					foreach ( $tasks as $task ) {

					echo('

					<div class="container bg-light bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:0.5rem;width:100%">
						<div class="row">
							<div class="col-1">
								<div class="form-check">
									<a href="completetask.php?task='.$task.'"><h3><button type="button" class="btn btn-primary">✓</button></h3></a>
								</div>
							</div>
							<div class="col">
								<p><a href="' . $r->hget($user . '-task-' . $task, 'url') . '" target="_blank">' . $r->hget($user . '-task-' . $task, 'name') . '</a></p>
							</div>
						</div>
					</div>
					<br>

					');

					}

					?>



				</div>
			</div>
			<center><h2>adna - <a href="https://github.com/AdnaProject">GitHub</a></h2></center>
		</div>
	</body>
</html>