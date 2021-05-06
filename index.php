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

?>

<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<body>
		<br><br>
		<div class="small-screen container bg-light bg-gradient rounded shadow-lg text-center" style="padding-top:1rem;padding-bottom:1rem;width:80%;display:none">
			<h2 style="font-size:100px">Sorry!</h2>
			<h3>classi needs a larger screen to function properly. If you have a tablet or laptop, try using that instead. Sorry for the inconvenience.<br><br>classi</h3>
		</div>
		<div class="ui container-lg bg-light bg-gradient rounded shadow text-center text-wrap" style="padding-top:1rem;padding-bottom:2rem">
		<div class="container bg-light bg-gradient rounded shadow-lg text-center" style="padding-top:5px;padding-bottom:5px;width:50%">
			<h2 style="font-size:100px">adna</h2>
			<h3>Version 0.1 Beta</h3>
		</div>
		<br>
		<div class="row row-cols-1">
			<div class="col">
				<div class="container bg-light bg-gradient rounded shadow" style="padding-top:1rem;padding-bottom:2rem;width:90%;margin-top:0.5rem;margin-bottom:0.5rem">
					<div class="container bg-primary bg-gradient rounded shadow" style="padding-top:2px;padding-bottom:1px;width:100%">
						<center>
							<h3>You have <b><?php echo(count($r->smembers($user . '-tasks'))); ?></b> Tasks</h3>

							<form action="addtask.php" method="get">
                              <input class="form-control" type="text" id="task" name="task" placeholder="New Task"><br>
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

					<div class="container bg-light bg-gradient rounded shadow" style="padding-top:5px;padding-bottom:1px;width:100%">
						<div class="row">
							<div class="col-1">
								<div class="form-check">
									<a href="completetask.php?task='.$task.'"><h3><button type="button" class="btn btn-primary">✓</button></h3></a>
								</div>
							</div>
							<div class="col">
								<p>' . $r->hget($user . '-task-' . $task, 'name') . '</p>
							</div>
						</div>
					</div>
					<br>

					');

					}

					?>



				</div>
			</div>
		</div>
	</body>
</html>