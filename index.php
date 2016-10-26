<!DOCTYPE html>
<html>
<head>
	<title>Royalle Consultoria Ltda</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="Scripts/jquery.js"></script>
    <link rel="stylesheet" type="text/css" media="all"  href="Cascade/assets/css/cascade/production/build-full.min.css"/>
    <link rel="stylesheet" type="text/css" media="all"  href="Cascade/assets/css/site.css" />
    <!--[if lt IE 8]><link rel="stylesheet" href="assets/css/cascade/production/icons-ie7.min.css"><![endif]-->
    <!--[if lt IE 9]><script src="assets/js/shim/iehtmlshiv.js"></script><![endif]-->

    <!--Logotipo da empresa-->
    <link rel="shortcut icon" href="Cascade/assets/img/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="site-header-fixture">
	    <div class="site-header-ghost">
            <div class="col width-fit mobile-width-fit">
                <div class="cell">
                    <a href="#" class="logo"></a>
                </div>
            </div>
            <div class="col width-fill mobile-width-fill">
                <div class="cell">
                    <ul class="col nav">
                        <h1>Royalle Consultoria Ltda.</h1>
                    </ul>
                </div>
            </div>
        </div>
        <div class="site-header">
            <div class="col width-fit mobile-width-fit">
                <div class="cell">
                    <a href="#" class="logo"></a>
                </div>
            </div>
            <div class="col width-fill mobile-width-fill">
                <div class="cell">
                    <ul class="col nav">
                        <h1>Royalle Consultoria Ltda.</h1>
                    </ul>
                </div>
            </div>
        </div>
	    
    </div>

    <div class="site-body centered-content">
	    <div class="site-center">
	    	<div class="cell">
	    		<div class="col width-4of12"></div>
			    
			    <div class="col width-4of12">
				    <div class="col ">
		                <div class="cell panel">
		                    <div class="header">Faça o Login</div>
		                    <div class="body">
		                    	<form name="login_usuario" method="POST" action="#">
		                    		<div class="col">
			                    		<div class="cell">
			                    			<input type="text" placeholder="E-Mail" name="login_email">
			                    		</div>
			                    		<div class="cell">
			                    			<input type="password" placeholder="Senha" name="login_senha">
			                    		</div>
			                    		<div class="col width-1of2">
				                    		<div class="cell">
				                    			<input class="button" type="submit" name="Enviar"/>
				                    		</div>
				                    	</div>
		                    		</div>
		                    	</form>
		                    </div>
		                </div>
		            </div>
		        </div>

	    	</div>
	    </div>
	    <?php
			if(isset($_POST['login_email'])){
				include 'Classes/Usuarios.php';

				$loginUsuario = new LoginUsuario($_POST['login_email'], $_POST['login_senha']);

				$loginUsuario->login();
			}
		?>

    	
    </div>

		
	
<script src="Cascade/assets/js/app.js"></script>
</body>
</html>
