<!DOCTYPE html>
<html lang="en">
  <head>
	   <title>ToolsForEver</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="../styles.css">
  </head>
  <body>
			  <div class="bggrijs">
				<div class="container-fluid">
					<div class="row mt10">
						<div class="col-sm-1">
							<a href="../index.php"><img src="../images/logo.png" class="img-responsive"></a>
						</div>
						
					</div>
				</div>
			   </div>
				<div class="container-fluid">
				  <div class="row">
					
					<div class="col-sm-3 col-lg-2 headgrijs">
						<?php include_once("../header.php"); ?>
					</div>
						
					 <div class="col-sm-9 col-lg-10 mt30">
							  <?php 

                                $errors = array(
                                    1=>"Verkeerde login gegevens, Probeer het opnieuw",
                                    2=>"Je moet als eerst inloggen "
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?> 
						  <div class="well">
							<div class="panel-heading">
								<h2 class="panel-titles text-center">Login voor Beheerders/medewerkers</h2>
							</div>
						  </div>
                              <form action="functies.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">  
                                  <input type="text" name="gebruikersnaam" class="form-control" placeholder="Gebruikersnaam" required autofocus><br/>
                                  <input type="password" name="wachtwoord" class="form-control" placeholder="Wachtwoord" required><br/>
                                  <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
                             </form>
						  
					</div>
				  </div>
				</div>
				
			<?php include_once("../footer.php"); ?>

   
   
  </body>
</html>