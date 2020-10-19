<?php
require ('controlador/coneccion.php');
if( isset($_GET["id"])   )
{
    $id=$_GET["id"];
    $sql = "SELECT * FROM  especialidad where id_especialidad=$id";
    $result = pg_query($dbconn, $sql);
    
    $row = pg_fetch_assoc($result) ;
    
}
?>

<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
<form id="frmespecialidad" method="post"     style="margin:0;padding:20px 50px">

           
            <div style="margin-bottom:5px">
                <input name="id_especialidad" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['id_especialidad']?>" required="true" label="Id Especialidad:" style="width:80%" >
            </div> 
           
            <div style="margin-bottom:5px">
                <input name="nom_especialidad" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['nom_especialidad']?>" required="true" label="Nombre de Especialidad:" style="width:80%" >
            </div>           
            <div style="margin-bottom:5px">
                <input name="obs_especialidad" labelPosition="top" class="easyui-textbox" required="true" value="<?php echo $row ['obs_especialidad']?>" label="Observacion:" style="width:80%" >
            </div>   

         

        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pagina=listaespecialidad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
      
        function saveUser(){              
           $('#frmespecialidad').form('submit',{
                url: 'controlador/especialidad.php?op=update',
                onSubmit: function(){
                    var esvalido =  $(this).form('validate');
                    if( esvalido){
                        $.messager.progress({
                       title:'Por favor espere',
                      msg:'Cargando datos...'
                      });
                    }
                    return esvalido;
                },
                success: function(result){                   
                    $.messager.progress('close');
                   // var result = eval('('+result+')');
                   // console.log(result);                  
                   $.messager.show({
                            title: 'exito',
                            msg: result
                        });
                    window.location.href= 'main.php?pagina=listaespecialidad';
                }
            }); 
        }
        
    </script>