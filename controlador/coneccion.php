
<?php
  $conn_string = "host=localhost port=5432 dbname=gob1 user=postgres password=root";
  $dbconn = pg_connect($conn_string);  
  if ($dbconn == false )  
  {
    echo "Ocurrió un error en la conexion";
    exit;
  }
?>