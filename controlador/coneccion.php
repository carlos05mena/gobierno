
<?php
<<<<<<< HEAD
  $conn_string = "host=localhost port=5432 dbname=gob user=postgres password=635246789";
=======
  $conn_string = "host=localhost port=5432 dbname=gob1 user=postgres password=root";
>>>>>>> 39a585b186b437b4e6f398f6a716feb914256b7e
  $dbconn = pg_connect($conn_string);  
  if ($dbconn == false )  
  {
    echo "Ocurrió un error en la conexion";
    exit;
  }
?>