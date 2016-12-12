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

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
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
	           	<li role="button" id="projeto_btn2"></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li  id="projeto_btnSair"><a id="projetoLogoff">Sair</a></li>
                </ul>
              </li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div id='CorpoHome'></div>

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