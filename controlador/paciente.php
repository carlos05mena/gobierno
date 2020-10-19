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
        $resultqry = pg_query($dbconn, 'SELECT * FROM paciente');
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
                'msg' =>  '  Se produjeron algunos problemas INSERT. Inténtalo de nuevo.' 
            );          
            try{ 
            $id_paciente = $_POST['id_paciente']; 
            $ced_paciente = $_POST['ced_paciente'];   
            $nom_paciente= $_POST['nom_paciente']; 
            $ape_paciente = $_POST['ape_paciente']; 
            $sexo_paciente = $_POST['sexo_paciente'];    
            $id_canton= $_POST['id_canton']; 
            $dir_paciente= $_POST['dir_paciente']; 
            $fecha_nac_paciente= $_POST['fecha_nac_paciente']; 
            $lug_nac_paciente= $_POST['lug_nac_paciente']; 
            $edad_paciente= $_POST['edad_paciente']; 
            $telf_cel_paciente= $_POST['telf_cel_paciente']; 
            $telf_paciente= $_POST['telf_paciente'];
            $tip_sangre_paciente= $_POST['tip_sangre_paciente']; 
            $aler_paciente= $_POST['aler_paciente']; 
            $ciru_paciente= $_POST['ciru_paciente']; 
            $enfer_cron_paciente= $_POST['enfer_cron_paciente']; 
            $medi_paciente= $_POST['medi_paciente']; 
            $obs_paciente= $_POST['obs_paciente']; 
             
            
            $sql = "INSERT INTO paciente (id_paciente, ced_paciente, nom_paciente, ape_paciente, sexo_paciente, id_canton, dir_paciente, fecha_nac_paciente, lug_nac_paciente, edad_paciente, telf_cel_paciente, telf_paciente, tip_sangre_paciente, aler_paciente, ciru_paciente, enfer_cron_paciente, medi_paciente, obs_paciente) 
                    VALUES   ('$id_paciente', '$ced_paciente ', '$nom_paciente', '$ape_paciente', '$sexo_paciente', '$id_canton', '$dir_paciente', '$fecha_nac_paciente', '$lug_nac_paciente', '$edad_paciente', '$telf_cel_paciente', '$telf_paciente', '$tip_sangre_paciente', '$aler_paciente', '$ciru_paciente', '$enfer_cron_paciente', '$medi_paciente', '$obs_paciente');"; 
            $insert = pg_query($dbconn,$sql); 
             
             
            if($insert){ 
                $response['status'] = 1; 
                $response['msg'] = '¡Los datos del paciente se han agregado con éxito!'; 
            } 
            }

            catch (Exception $e){ //usar logs
                $response = array( 
                    'status' => 0, 
                    'msg' =>  'El Paciente ya existe'  
                );           
            }
            echo json_encode($response); 
            break; 

    case 'update':
        $response = array( 
            'status' => 0, 
            'msg' =>  '  Se produjeron algunos problemas UPDATE. Inténtalo de nuevo.' 
        );          
            
        if(!empty($_POST['ced_medico']) && !empty($_POST['nom_medico']) && !empty($_POST['ape_medico']) && !empty($_POST['sexo_medico']) && !empty($_POST['dir_medico']) && !empty($_POST['']) && !empty($_POST['edad_medico']) && !empty($_POST['fecha_nac_medico']) && !empty($_POST['cel_medico']) && !empty($_POST['telf_medico']) && !empty($_POST['mail_medico']) && !empty($_POST['id_paciente']) && !empty($_POST['id_especialidad']) && !empty($_POST['telf_ext_medico']) )
        { 
            $id_paciente = $_POST['id_paciente']; 
            $ced_paciente = $_POST['ced_paciente'];   
            $nom_paciente= $_POST['nom_paciente']; 
            $ape_paciente = $_POST['ape_paciente']; 
            $sexo_paciente = $_POST['sexo_paciente'];    
            $id_canton= $_POST['id_canton']; 
            $dir_paciente= $_POST['dir_paciente']; 
            $fecha_nac_paciente= $_POST['fecha_nac_paciente']; 
            $lug_nac_paciente= $_POST['lug_nac_paciente']; 
            $edad_paciente= $_POST['edad_paciente']; 
            $telf_cel_paciente= $_POST['telf_cel_paciente']; 
            $telf_paciente= $_POST['telf_paciente'];
            $tip_sangre_paciente= $_POST['tip_sangre_paciente']; 
            $aler_paciente= $_POST['aler_paciente']; 
            $ciru_paciente= $_POST['ciru_paciente']; 
            $enfer_cron_paciente= $_POST['enfer_cron_paciente']; 
            $medi_paciente= $_POST['medi_paciente']; 
            $obs_paciente= $_POST['obs_paciente']; 

            $sql = "UPDATE paciente SET id_paciente=$id_paciente, ced_paciente='$ced_paciente', nom_paciente='$nom_paciente', ape_paciente='$ape_paciente', sexo_paciente='$sexo_paciente', id_canton='$id_canton', dir_paciente='$dir_paciente', fecha_nac_paciente='$fecha_nac_paciente', lug_nac_paciente='$lug_nac_paciente', edad_paciente=$edad_paciente, telf_cel_paciente='$telf_cel_paciente', telf_paciente='$telf_paciente', tip_sangre_paciente='$tip_sangre_paciente', aler_paciente='$aler_paciente', ciru_paciente='$ciru_paciente', enfer_cron_paciente='$enfer_cron_paciente', medi_paciente='$medi_paciente', obs_paciente='$obs_paciente' "; 
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
            'msg' =>  '  Se produjeron algunos problemas DELETE. Inténtalo de nuevo.' 
        );          
            
        if(!empty($_POST['id_paciente'])   )
        { 
            $id_paciente = $_POST['id_paciente']; 
                      
            $sql = " DELETE from paciente where id_paciente ='$id_paciente' "; 
            
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