<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>GOB</title>
 
    <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/black/easyui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery-easyui-1.8.8/locale/easyui-lang-es.js"></script>
	
</head>
<?/*php
 session_start();
 if( isset(  $_SESSION['usuario']) ==false)
 header("location: index2.php") ;
*/?>
<body style = "background-color:#28293D;" class="easyui-layout" >
          
        <div data-options="region:'north'" style="height:60px"> 
        <img src="imagenes/firma.png"   height="100px"  > </img>
         <div class="titulousuario">
		 	<img src="imagenes/perfil.png"   height="10px"  > </img>
          	Usuario: <?//php echo $_SESSION['usuario']; ?> 
          	<a href="index2.php"> Salir </a>
         </div> 

        </div>

		

        <div data-options="region:'south',split:true" style="height:50px;"></div>
       
        <div data-options="region:'west',split:true" title="Menu" style="width:200px;">
        
        <ul class="easyui-tree">
			<li>
				<span>Menu Principal</span>
				<ul>
					<li>
						<span>Seguridad</span>
						<ul>
							<li>
								<span>Rol de Usuarios</span>
							</li>
							<li>
							<a href="main.php?pagina=newusuario"> Nuevo Usuario</a>
							</li>
							<li>
							<a  href="main.php?pagina=listausuario">  Lista de Usuarios</a> 
							</li>
						</ul>
					</li>
					<li>
						<span>medicos</span>
						<ul>
							<li>
							<a href="main.php?pagina=newmedico"> Nuevo medico</a>
							</li>
							<li>
							<a href="main.php?pagina=listamedico"> Lista medico</a>
							</li>
							<li>
							<a href="main.php?pagina=listatrabajadores"> Lista Trabajadores</a>
							</li>
							<li>
							<a href="main.php?pagina=newtrabajador"> Nuevo Trabajador</a>
							</li>
							<li>
							<a href="main.php?pagina=newjuez"> Nuevo Juez</a>							
							</li>
							<li>
							<a href="main.php?pagina=listajuez"> Lista Jueces</a>
							</li>
							<li>
							<a href="main.php?pagina=listacontra"> Lista Contrapartes</a>
							</li>
							<li>
							<a href="main.php?pagina=listacitacion"> Lista Citacion</a>
							</li>
							<li>
							<a href="main.php?pagina=listaactividad"> Lista Actividad</a>
							</li>
							<li>
							<a href="main.php?pagina=listacaso"> Lista Caso</a>
							</li>
							<li>
							<a href="main.php?pagina=listacaac"> Lista Caso Actividad</a>
							</li>
							<li>
							<a  href="main.php?pagina=reporte">  Reportes  </a> 
							</li>
							
						</ul>
					</li>
				</ul>
			</li>
		</ul>
		

        </div>
        <div data-options="region:'center' ">
        
		

		<?php
		   if(  isset($_GET["pagina"])){
			$page = $_GET["pagina"];	
			$page = $page.".php";
			include ($page);
		}	

		   
		   ?>

        </div>
 
 
</body>
</html>