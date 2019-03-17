<?php

include('ressources/database/login_to_db.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Logs - By Marine</title>

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
				The 50 last logs of the web manager.
			</h3>
			<div class="row">
					<div class="col-md-5">
					</div>
					<div class="col-md-2 col-md-offset-2">
              <div class="alert alert-warning alert-dismissable">
									<strong>Total data sent : </strong> 
									<?php

									$db1 = login_db();
									$db1 = $db1->query('SELECT COUNT(id) as total_sent FROM messages');
									$db1 = $db1->fetch();
									echo $db1['total_sent'];

									?>
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
						Last message :		<strong>
						<?php

								$db3 = login_db();
								$db3 = $db3->query('SELECT message FROM messages ORDER BY post_date DESC LIMIT 1');
								$db3 = $db3->fetch();
								echo htmlspecialchars(strip_tags($db3['message']));

							?>
							</strong>	
							|	( <strong>
						<?php

								$db2 = login_db();
								$db2 = $db2->query('SELECT post_date FROM messages ORDER BY post_date DESC LIMIT 1');
								$db2 = $db2->fetch();
								echo htmlspecialchars($db2['post_date']);
									
							?>
							</strong> )
					</li>
				</ol>
			</nav>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Ip
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $db = login_db();
                                $query = $db->query('SELECT * FROM messages ORDER BY post_date DESC LIMIT 50');

                                // while there is data, echo it
                                while($echo = $query->fetch())
                                {
                                    echo '
                                    <tr>
                                        <td>
                                            ' . htmlspecialchars(strip_tags($echo['message'])) . '
                                        </td>
                                        <td>
                                            ' . htmlspecialchars($echo['post_date']) . '
                                        <td>
                                        ' . htmlspecialchars(strip_tags($echo['post_ip'])) . '
                                        </td>
                                    </tr>
                                    ';
                                }

                            ?>
                        </tbody>
                    </table>
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