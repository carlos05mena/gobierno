
<?php
  $conn_string = "host=localhost port=5432 dbname=gob user=postgres password=carlos09mena";
  $dbconn = pg_connect($conn_string);  
  if ($dbconn == false )  
  {
    echo "Ocurrió un error en la coneccion";
    exit;
  }
?>