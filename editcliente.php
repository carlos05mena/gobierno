<?php
    require ('controlador/coneccion.php');
    if( isset($_GET["id"])   )
    {
        $id=$_GET["id"];
        $sql = "SELECT * FROM  especialidad where id_especialidad='$id'";
        $result = pg_query($dbconn, $sql);
    
        $row = pg_fetch_assoc($result) ;
    }
?>

<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
    <form id="frmusuario" method="post"     style="margin:0;padding:20px 50px">

        <div style="margin-bottom:5px">
            <input name="cod_cliente" labelPosition="top" class="easyui-textbox" required="true" label="Codigo Cliente:" style="width:80%">
        </div>

        <div style="margin-bottom:5px">
            <input name="ced_cliente" labelPosition="top" class="easyui-textbox" required="true" label="Cedula Cliente:" style="width:80%" >
        </div>           
            
        <div style="margin-bottom:5px">
            <input name="nom_cliente" labelPosition="top" class="easyui-textbox" required="true" label="Nombre Cliente:" style="width:80%" >
        </div>   

        <div style="margin-bottom:5px">
            <input name="ape_cliente" labelPosition="top" class="easyui-textbox" required="true" label="Apellido Cliente:" style="width:80%" >
        </div>   
            
        <div style="margin-bottom:5px">
            <input name="tlf_cliente" labelPosition="top" class="easyui-textbox" label="Telefono Cliente:" style="width:80%" >
        </div>   

        <div style="margin-bottom:5px">
            <input name="mail_cliente" labelPosition="top" class="easyui-textbox"  label="E-mail Cliente:" style="width:80%" >
        </div>      
            
    </form>
   
    <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pagina=listacliente" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
</div>
    
<script type="text/javascript">
      
    function saveUser()
    {              
        $('#frmusuario').form('submit',
        {
            url: 'controlador/cliente.php?op=update',
            onSubmit: function()
            {
                var esvalido =  $(this).form('validate');
                if( esvalido)
                {
                    $.messager.progress(
                        {
                            title:'Por favor espere',
                            msg:'Cargando datos...'
                        }
                    );
                }
                return esvalido;
            },
                
            success: function(result)
            {                   
                $.messager.progress('close');
               // var result = eval('('+result+')');
               // console.log(result);                  
                $.messager.show(
                   {
                        title: 'exito',
                        msg: result
                    }
                );
                window.location.href= 'main.php?pagina=listacliente';
                }
            }); 
        }
    }
</script>