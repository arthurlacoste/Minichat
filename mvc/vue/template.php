<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mini chat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<header class="sb-page-header">
		<div class="container detail-portfolio-container">
			<a class="anchor" id="portfolio"></a>
			<h1>Minichat</h1>
			<p>Écrivez ce que vous voulez</p>
		</div>
	</header>
			
    <!-- Page Content -->
    <div class="container">

        <div class="row">
			
			
			<div class="col-lg-4 col-lg-push-8">
			
                <!-- Comments Form -->
                <div class="well">
                    <form role="form" method="post">
                      	<fieldset class="form-group">
    						<input type="text" class="form-control" name="pseudo" placeholder="Pseudo" value="<?=$pseudo?>"/>
  						</fieldset>
                        <fieldset class="form-group">
                        	<textarea class="form-control" rows="3" name="contenu" placeholder="Message"></textarea>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
			</div>
			<div class="col-lg-8 col-lg-pull-4">
        

                <!-- Posted Comments -->

				<?php include('mvc/vue/messages.php'); ?>

            </div>


        </div>
        <!-- /.row -->

        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Créé avec <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> par <a href="http://arthurlacoste.com">Arthur Lacoste</a></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
