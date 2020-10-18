<html>
<body>
    <?php
        $servidor="localhost";
        $usuario="root";
        $password="";
        $base="gob";
        $cn=new mysqli($servidor,$usuario,$password,$base);
        echo"Conexion Ejecutada satisfactoriamente";
        $sql="Select * from especialidad";
        $res=mysqli_query($cn,$sql);
        echo "Los departamentos existentes son: <br>";
        ?>
    <center>
    <table border="2">
    <tr>
        <th colspan=4>Listado de departamentos</th>
    </tr> 
    <tr>
        <th>ID</th>
        <th>NOMBRE</TH>
        <th>Observacion</TH> 
    </tr> 
    <?php         
        while($registro=mysqli_fetch_assoc($res))
        {
            ?>
            <tr>
                <td><?php echo $registro['id_especialidad'];?></td>
                <td><?php echo $registro['nombre_especialidad'];?></td>
                <td><?php echo $registro['observacion'];?></td>
            </tr>
            <?php
        }
    ?>
    </table>
    </center>
</body>
</html>