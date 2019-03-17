<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web manager - By Marine</title>

    <meta name="author" content="https://github.com/marineeee">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 class="text-info text-center">
				Web manager for segment screen.
			</h3>
			<div class="row">
					<div class="col-md-5">
					</div>
					<div class="col-md-2 col-md-offset-2">
              <div class="alert alert-warning alert-dismissable">
									<strong>Total data sent : </strong> 
									15
              </div>
					</div>
      </div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">
						<a href="index.php">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="logs.php">Logs</a>
					</li>
					<li class="breadcrumb-item">
						Last update :		
					</li>
				</ol>
			</nav>

			<?php

			if(isset($_GET['success']) && !empty($_GET['success']) && is_string($_GET['success']))
			{
				echo 
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<strong>Warning!</strong> ' . htmlspecialchars(strip_tags($_GET['success'])) . '
				</div>';
			}

			if(isset($_GET['error']) && !empty($_GET['error']) && is_string($_GET['error']))
			{
				echo 
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<strong>Warning!</strong> ' . htmlspecialchars(strip_tags($_GET['error'])) . '
				</div>';
			}

			?>

			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-2">
						
					<form role="form" method="POST" action="send_message.php">
						<div class="form-group">
							
							<label for="message">
								Message to send
							</label>
							<input type="text" class="form-control" id="message" name="message" style="text-align: center; display: inline-block;" required>
						</div>
						<div class="form-group">
							
							<label for="password">
								Password
							</label>
							<input type="password" class="form-control" id="password" name="password" style="text-align: center; display: inline-block;" required>
						</div>

						<div class="text-center">
							<button type="submit" class="btn btn-primary">
									Submit
							</button>
						</div>

					</form>
					
				</div>
			</div>

		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>