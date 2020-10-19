
<?php
  $conn_string = "host=localhost port=5432 dbname=gob user=postgres password=635246789";
  $dbconn = pg_connect($conn_string);  
  if ($dbconn == false )  
  {
    echo "Ocurrió un error en la conexion";
    exit;
  }
?>