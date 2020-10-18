<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<?php
    echo "<link rel=stylesheet href=includes/estilo.css>";
    include('controlador/coneccion.php')
	?>
    
</head>
<body>
	<center>
        <form method="POST">
	        <table border=1>

		    <tr>
			    <th colspan="2">Eliminar especialidad</th>
		    </tr>
		    <tr>
			    <td>Seleccione el especialidad a eliminar</td>
			<td><select name="dep">
		<?php
			$sqli1="select * from especialidad";
			$res=mysqli_query($dbconn,$sqli1);
			while ($fila=mysqli_fetch_array($res)) 
		{
		?>
			<option name="variable" value="<?php echo $fila['id_especialidad'];?>">
				<?php echo $fila['nombre_especialidad'];?>
            </option>
            <?php
		}?>		
			</select></td>
		</tr>
        <tr>
			<td align="center"><input type="submit" name="BUSCAR" value="BUSCAR"></td>

		</tr>	
	</table>
    </form>
	</center>

	<?php

	if (isset($_POST['BUSCAR']))
	{   
        if($_POST['dep']==null)
        {
            echo "Seleccione por favor";
        }
        else
        {
        ?>
        <center>
   <form method="post">
        <table border="1">
        <?php
            $sqli2="select * from especialidad where id_especialidad=$_POST[dep]";
			$res1=mysqli_query($dbconn,$sqli2);
			while ($registro=mysqli_fetch_assoc($res1)) 
		{ ?>
          <tr>  <td colspan="2">ESTA SEGURO QUE DESEA ELIMINAR ESTOS</td></tr>
        <tr>
            
			<td>ID del especialidad</td>
			<td><input type="text" name="id" value="<?php echo $registro['id_especialidad'] ?>"></td>
        </tr>
        <tr>
        <?php $var1=$registro['id_especialidad']; ?>
			<td>Nombre del especialidad</td>
			<td><input type="text" name="p1" value="<?php echo $registro['nombre_especialidad'] ?>"></td>
        </tr>
        <tr> 
            <td>Telefono del especialidad</td>
            <td><input type="text" name="p2" value="<?php echo $registro['tlf_especialidad'] ?>"></td>
        </tr>
            <td>Encargado del especialidad</td>
            <td><input type="text" name="p3" value="<?php echo $registro['enc_especialidad'] ?>"></td> 
        </tr>
        <tr>     
			<td align="center"><input type="submit" name="BORRAR" value="BORRAR"></td>

		</tr>
        <?php
        }
        }
    }
        ?>
        </table>
        </form>
        </center>
        <?php  
           
        if(isset($_POST['BORRAR']))
        {   
            echo'<script type="text/javascript">
            alert("Los archivos han sido eliminados de manera correcta");
            window.location.href="eliminar.php";
            </script>';
            $sqlactualizar="DELETE FROM especialidad WHERE especialidad.id_especialidad=$_POST[id]";
            mysqli_query($dbconn,$sqlactualizar);
            echo "datos actualizados";
        }
        else
        {
            echo "no se pudo ingresar";
        }
        ?>


</body>
</html>