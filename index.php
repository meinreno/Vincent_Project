<?php
	if (isset($_COOKIE['emailUsuario'])) {
		header("Location: home.php"); //caso o usuario não tenha feito logoff
		exit();}
if(isset($_POST['login_email'])){
				include 'Classes/Usuarios.php';

				$loginUsuario = new LoginUsuario($_POST['login_email'], $_POST['login_senha']);

				$loginUsuario->login();
			}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Royalle Consultoria Ltda</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="Scripts/jquery.js"></script>
  </head>
  <body>

  	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="color: black; font-weight: bold;" class="navbar-brand" href="#">Royalle Consultoria Ltda</a>
    </div>
    <!--<ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>-->
  </div>
</nav>

    <div class="container-fluid col-md-4 col-md-offset-4">
    	<div class="panel panel-default">
  			<div class="panel-heading">Faça o Login:</div>
  			<div class="panel-body">
  				<form class="form-signin" name="login_usuario" method="POST" action="#">
			        <label for="inputEmail" class="sr-only">Email address</label>
			        <input type="email" id="inputEmail" class="form-control" placeholder="Endereço Email" name="login_email" required autofocus>
			        <label for="inputPassword" class="sr-only">Senha</label>
			        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="login_senha" required>
			        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
			    </form>
  			</div>
		</div>
    </div> <!-- /container -->

    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>