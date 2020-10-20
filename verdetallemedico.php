<?php
require ('controlador/coneccion.php');
if( isset($_GET["id"])   )
{
    $id=$_GET["id"];
    $sql = "SELECT medico.*, especialidad.id_especialidad,especialidad.nom_especialidad FROM  medico,especialidad where medico.id_especialidad=especialidad.id_especialidad and id_medico=$id";
    $result = pg_query($dbconn, $sql);
    
    $row = pg_fetch_assoc($result) ;    
}
?>
<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
<form id="frmespecialidad" method="post"     style="margin:0;padding:20px 50px">
 <center>   <table border="2">
        <thead> 
            
            <tr><th>Identificador:</th><td colspan="5"><?php echo $row ['id_medico']?></td> </tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Nombres:</th><td> <?php echo $row ['nom_medico'] ?></td>    <th>Apellidos:</th><td><?php echo $row ['ape_medico'] ?></td><th>Sexo: </th><td> <?php echo $row ['sexo_medico'] ?></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Cedula: </th><td>  <?php echo $row ['ced_medico'] ?> </td><th>Fecha Nacimiento:</th><td> <?php echo $row ['fecha_nac_medico'] ?></td><th>Edad: </th><td> <?php echo $row ['edad_medico'] ?></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Direccion:</th><td colspan="5"><?php echo $row ['dir_medico'] ?></td> </tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Telefono: </th><td>  <?php echo $row ['telf_medico'] ?> </td><th>Celular: </th><td colspan="2"> <?php echo $row ['cel_medico'] ?></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Extension </th><td>  <?php echo $row ['telf_ext_medico'] ?> </td><th>Especialidad: </th><td colspan="2"> <?php echo $row ['nom_medico'] ?></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><th>Correo Electronico:</th><td><?php echo $row ['mail_medico']?></td> </tr>     
        </thead>
    
       
			
    </table> 
    </center>
    </form>
     
    
</div>