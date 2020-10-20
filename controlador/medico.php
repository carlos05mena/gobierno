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
    switch ($op) 
    {
      case 'select':
        $resultqry = pg_query($dbconn, 'SELECT * FROM medico');
        if (!$resultqry) 
        {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
        }
        $result = array();
        $items = array();  
     
        while($row = pg_fetch_object($resultqry)) 
        {
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
        
        try
        { 
            $id_medico = $_POST['id_medico'];
            $ced_medico = $_POST['ced_medico'];   
            $nom_medico= $_POST['nom_medico']; 
            $ape_medico = $_POST['ape_medico']; 
            $sexo_medico = $_POST['sexo_medico'];   
            $dir_medico= $_POST['dir_medico']; 
            $edad_medico= $_POST['edad_medico']; 
            $fecha_nac_medico= $_POST['fecha_nac_medico']; 
            $cel_medico= $_POST['cel_medico']; 
            $telf_medico= $_POST['telf_medico']; 
            $telf_ext_medico= $_POST['telf_ext_medico'];
            $mail_medico= $_POST['mail_medico']; 
            $id_especialidad= $_POST['id_especialidad']; 
             
            
            $sql = "INSERT INTO medico (id_medico, ced_medico, nom_medico, ape_medico, sexo_medico, dir_medico, edad_medico, fecha_nac_medico, cel_medico, telf_medico, telf_ext_medico, mail_medico, id_especialidad) 
                    VALUES   ('$id_medico', '$ced_medico ', ' $nom_medico', '$ape_medico', '$sexo_medico', '$dir_medico', '$edad_medico', '$fecha_nac_medico', '$cel_medico', '$telf_medico', '$telf_ext_medico', '$mail_medico', '$id_especialidad');"; 
            $insert = pg_query($dbconn,$sql); 
             
            if($insert)
            { 
                $response['status'] = 1; 
                $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
            } 
        }

        catch (Exception $e)
        { 
            $response = array( 
                'status' => 0, 
                'msg' =>  'Este registro ya existe'  
            );           
        }
        echo json_encode($response); 
    break; 

    case 'verdetalle':
        $resultqry = pg_query($dbconn, 'SELECT * FROM medico');
        if (!$resultqry) 
        {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
        }
        $result = array();
        $items = array();  
     
        while($row = pg_fetch_object($resultqry)) 
        {
           array_push($items, $row);
        }
        $result["rows"] = $items;
        echo json_encode($result);
    break;

    case 'update':
        $response = array( 
            'status' => 0, 
            'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
        );          
            
        if(!empty($_POST['id_medico']) && !empty($_POST['ced_medico']) && !empty($_POST['nom_medico']) && !empty($_POST['ape_medico']) && !empty($_POST['sexo_medico']) && !empty($_POST['dir_medico']) && !empty($_POST['edad_medico']) && !empty($_POST['fecha_nac_medico']) && !empty($_POST['cel_medico']) && !empty($_POST['telf_medico']) && !empty($_POST['telf_ext_medico']) && !empty($_POST['mail_medico']) && !empty($_POST['id_especialidad']))
        { 
            $id_medico = $_POST['id_medico']; 
            $ced_medico = $_POST['ced_medico'];   
            $nom_medico= $_POST['nom_medico']; 
            $ape_medico = $_POST['ape_medico']; 
            $sexo_medico = $_POST['sexo_medico'];   
            $dir_medico= $_POST['dir_medico']; 
            $edad_medico= $_POST['edad_medico']; 
            $fecha_nac_medico= $_POST['fecha_nac_medico']; 
            $cel_medico= $_POST['cel_medico']; 
            $telf_medico= $_POST['telf_medico']; 
            $telf_ext_medico= $_POST['telf_ext_medico']; 
            $mail_medico= $_POST['mail_medico']; 
            $id_especialidad= $_POST['id_especialidad']; 

            $sql = "UPDATE medico SET ced_medico='$ced_medico', nom_medico='$nom_medico', 
            ape_medico='$ape_medico', sexo_medico='$sexo_medico', dir_medico='$dir_medico', edad_medico=$edad_medico, 
            fecha_nac_medico='$fecha_nac_medico', cel_medico='$cel_medico', telf_medico='$telf_medico', telf_ext_medico='$telf_ext_medico', 
            mail_medico='$mail_medico', id_especialidad=$id_especialidad WHERE id_medico=$id_medico"; 
            $update = pg_query($sql); 
                       
            if($update)
            { 
                $response['status'] = 1; 
                $response['msg'] = '¡Los datos del usuario se han actualizado con éxito!'; 
            }               
        }
        else
        { 
            $response['msg'] = 'Por favor complete todos los campos para ingresar el registro.'; 
        } 
                   
        echo json_encode($response); 
        break; 

        case 'delete':
        $response = array( 
            'status' => 0, 
            'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
        );          
            
        if(!empty($_POST['id_medico'])   )
        { 
            $id_medico = $_POST['id_medico']; 
                      
            $sql = " DELETE from medico where id_medico ='$id_medico' "; 

            $insert = pg_query($sql); 
                         
            if($insert)
            { 
                $response['status'] = 1; 
                $response['msg'] = '¡Los datos del usuario se han eliminado con éxito!'; 
            }                 
        }
            else
        { 
            $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
        } 
                     
        echo json_encode($response); 
        break; 
        default:
        echo json_encode( "Error, no existe la opcion solicitada  " .$op);
    }
?>