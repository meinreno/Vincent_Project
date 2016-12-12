<?php
    if (!isset($_COOKIE['emailUsuario'])) {
        header("Location: index.php"); //caso o usuario não tenha feito logoff
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Royalle Consultoria Ltda</title>
	<script type="text/javascript" src="Scripts/jquery.js"></script>
    <script type="text/javascript" src="Scripts/Vincent_Project.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/Vincent_Project.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<!-- Fixed navbar -->
	    <nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a style="color: black; font-weight: bold;" class="navbar-brand" href="#">Royalle Consultoria Ltda</a>
	        </div> 	
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li role="button" id="projeto_btn1"></li>
	            <li  id="projeto_btn2"></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li  id="projeto_btnSair"><a id="projetoLogoff">Sair</a></li>
	              </ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="jumbotron">
        <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
      </div>
	</div>
	    
	      

	</div> <!-- /container -->


	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
        Projetos();
        //$("#CorpoHome").load("./Exibir/Projetos.php")
    }); //.ready
</script>
</body>
</html>