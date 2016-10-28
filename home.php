<!DOCTYPE html>
<html>
<head>
	<title>Royalle Consultoria Ltda</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="Scripts/jquery.js"></script>
    <script type="text/javascript" src="Scripts/Vincent_Project.js"></script>
    <link rel="stylesheet" type="text/css" media="all"  href="Cascade/assets/css/cascade/production/build-full.min.css"/>
    <link rel="stylesheet" type="text/css" media="all"  href="Cascade/assets/css/site.css" />
    <link rel="stylesheet" type="text/css" href="Css/Vincent_Project.css">
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
                        <a href="../home.php" class="logo"></a>
                    </div>
                </div>
                <div class="col width-fill mobile-width-fill">
                    <div class="cell">
                        <ul class="col nav">
                            <li class="active"><a href="#">Novo Usuario</a></li>
                            <li class="active"><a href="#">Novo Projeto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
		<div class="site-header">
            <div class="col width-fit mobile-width-fit">
                <div class="cell">
                    <a href="../home.php" class="logo"></a>
                </div>
            </div>
            <div class="col width-fill mobile-width-fill">
                <div class="cell">
                    <ul class="col nav">
                        <li class="active" id="projeto_btn1"></li>
                        <li class="active" id="projeto_btn2"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="site-body centered-content">
        <div class="site-center">
            <div id='CorpoHome'></div><!--Div onde ficarão as informações vindas por .load-->
        </div>
    </div>

	
<script src="Cascade/assets/js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        Projetos();
        //$("#CorpoHome").load("./Exibir/Projetos.php")
    }); //.ready
</script>
</body>
</html>
