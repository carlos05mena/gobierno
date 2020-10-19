<?php
require ('controlador/coneccion.php');
if( isset($_GET["id"])   )
{
    $id=$_GET["id"];
    $sql = "SELECT * FROM  medico where id_medico=$id";
    $result = pg_query($dbconn, $sql);
    
    $row = pg_fetch_assoc($result) ;
    
}
?>
<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
<form id="frmespecialidad" method="post"     style="margin:0;padding:20px 50px">
    <table border="2">
        <thead> 
            
            <tr><th>Identificador:</th><td><?php echo $row ['id_medico']?></td> </tr>
            <tr><th>Nombres:  <?php echo $row ['nombres_medico'] ?> </th><th field="apellidos_medico" width="100">Apellidos:  <?php echo $row ['apellidos_medico'] ?></th></tr>
            <tr><th>Sexo:   <?php echo $row ['sexo_medico'] ?> </th><th field="edad_medico" width="100">Edad:  <?php echo $row ['edad_medico'] ?></th></tr>
            <tr><th>Sexo:   <?php echo $row ['sexo_medico'] ?> </th><th field="edad_medico" width="100">Edad:  <?php echo $row ['edad_medico'] ?></th></tr>
            
            <tr><th field="direccion_medico" width="100">Direccion</th><th field="referencia_direccion" width="100">Referencia domiciliaria</th></tr>
            <tr><th field="fecha_nacimiento" width="100">Fecha de nacimiento</th><th field="lugar_nacimiento" width="100">Lugar de nacimiento</th></tr>
            <tr><th field="telefono_medico" width="100">Telefono de contacto</th><th field="telefono_fijo_medico" width="100">Número de telefono fijo</th><th field="telefono_fijo_medico" width="100">Número de telefono fijo</th></tr>
            <tr><th field="correo_medico" width="100">Correo electrónico</th><th field="telefono_extension_medico" width="100">Número de telefono institucional</th></tr>                  
        </thead>
    
       
			
    </table> 
    </form>
     
    
    </div>