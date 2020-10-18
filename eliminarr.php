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
			            <th colspan="2">Eliminar medico</th>
		            </tr>
		            
                    <tr>
			            <td>Seleccione el medico a eliminar</td>
			                <td><select name="dep">
                                <?php
			                        $sqli1="select * from medico";
			                        $res=mysqli_query($dbconn,$sqli1);
			                        while ($fila=mysqli_fetch_array($res)) 
		                            {
		                                ?>
			                                <option name="variable" value="<?php echo $fila['id_medico'];?>">
				                                <?php echo $fila['nombres_medico'];?>
                                            </option>
                                        <?php
                                    }
                                ?>		
			                </select>
                        </td>
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
                        $sqli2="select * from medico where id_medico=$_POST[dep]";
			            $res1=mysqli_query($dbconn,$sqli2);
			            while ($registro=mysqli_fetch_assoc($res1)) 
		                { 
                    ?>

                    <tr>  
                        <td colspan="2">ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?</td>
                    </tr>
                
                    <tr>
			            <td>ID del medico</td>
			            <td><input type="text" name="id" value="<?php echo $registro['id_medico'] ?>"></td>
                    </tr>
                
                    <tr>
                        <?php $var1=$registro['id_medico']; ?>
			            <td>Nombre del medico</td>
			            <td><input type="text" name="p1" value="<?php echo $registro['nombres_medico'] ?>"></td>
                    </tr>
                
                    <tr> 
                        <td>Apellido del medico</td>
                        <td><input type="text" name="p2" value="<?php echo $registro['apellidos_medico'] ?>"></td>
                    </tr>
                    
                    <tr>    
                        <td>Cedula del medico</td>
                        <td><input type="text" name="p3" value="<?php echo $registro['cedula_medico'] ?>"></td> 
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
                $sqlactualizar="DELETE FROM medico WHERE medico.id_medico=$_POST[id]";
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