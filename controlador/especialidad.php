<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccion.php'); 
$op=  $_GET['op'] ;
if( !isset($op) )
{
  echo  json_encode( "No se definió  la variable op");
  exit;
}
switch ($op) {
    
      case 'select':
        $resultqry = pg_query($dbconn, 'SELECT * FROM especialidad');
        if (!$resultqry) {
        echo json_encode("Ocurrió un error en la consulta");
        exit;
        }
        $result = array();
        $items = array();  
     
        while($row = pg_fetch_object($resultqry)) {
           array_push($items, $row);
        }
        $result["rows"] = $items;
        echo json_encode($result);

        break;
        
   
     case 'insert':
        $response = array( 
            'status' => 0, 
            'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
        );          
        try{ 
            $id_especialidad = $_POST['id_especialidad']; 
            $nom_especialidad = $_POST['nom_especialidad'];   
            $obs_especialidad= $_POST['obs_especialidad']; 
            $sql = "INSERT INTO especialidad (id_especialidad, nom_especialidad, obs_especialidad) VALUES   ('$id_especialidad','$nom_especialidad ', ' $obs_especialidad');"; 
            $insert = pg_query($dbconn,$sql); 
             
             
            if($insert){ 
                $response['status'] = 1; 
                $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
            } 
            }

            catch (Exception $e){ //usar logs
                $response = array( 
                    'status' => 0, 
                    'msg' =>  'La especialidad ya existe'  
                );           
            }
            echo json_encode($response); 
            break; 

            case 'update':
              $response = array( 
                      'status' => 0, 
                      'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
                  );          
                  if(!empty($_POST['id_especialidad']) && !empty($_POST['nom_especialidad']) && !empty($_POST['obs_especialidad']) ){ 
                        $id_especialidad = $_POST['id_especialidad']; 
                        $nom_especialidad = $_POST['nom_especialidad'];   
                        $obs_especialidad= $_POST['obs_especialidad']; 
                       
                      $sql = "UPDATE especialidad SET nom_especialidad='$nom_especialidad',obs_especialidad='$obs_especialidad' WHERE id_especialidad=$id_especialidad"; 
                      $update = pg_query($sql); 
                       
                      if($update){ 
                          $response['status'] = 1; 
                          $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
                      } 
                  }else{ 
                      $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
                  } 
                   
                  echo json_encode($response); 
              break; 

              case 'delete':
                $response = array( 
                        'status' => 0, 
                        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
                    );          
                    if(!empty($_POST['id_especialidad'])   ){ 
                        $id_especialidad = $_POST['id_especialidad']; 
                      
                        $sql = " DELETE from especialidad where id_especialidad ='$id_especialidad' "; 
                        $insert = pg_query($sql); 
                         
                        if($insert){ 
                            $response['status'] = 1; 
                            $response['msg'] = '¡Los datos del usuario se han eliminado con éxito!'; 
                        } 
                    }else{ 
                        $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
                    } 
                     
                    echo json_encode($response); 
         break; 
    default:
            echo json_encode( "Error no existe la opcion:  " .$op);

            }
  
?>