<?php
    require ('controlador/coneccion.php');
    if( isset($_GET["id"])   )
    {
        $id=$_GET["id"];
        $sql = "SELECT * FROM  medico where id_medico='$id'";
        $result = pg_query($dbconn, $sql);
    
        $row = pg_fetch_assoc($result) ;
    }
?>

<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
    <form id="frmusuario" method="post"     style="margin:0;padding:20px 50px">

        <div style="margin-bottom:5px">
            <input name="cedula_medico" labelPosition="top" class="easyui-textbox" required="true" label="Cedula medico:" style="width:80%" >
        </div>           
            
        <div style="margin-bottom:5px">
            <input name="nombres_medico" labelPosition="top" class="easyui-textbox" required="true" label="Nombre medico:" style="width:80%" >
        </div>   

        <div style="margin-bottom:5px">
            <input name="apellidos_medico" labelPosition="top" class="easyui-textbox" required="true" label="Apellido medico:" style="width:80%" >
        </div>   
            
        <div style="margin-bottom:5px">
            <input name="sexo_medico" labelPosition="top" class="easyui-textbox" label="Telefono medico:" style="width:80%" >
        </div>   

        <div style="margin-bottom:5px">
            <input name="direccion_medico" labelPosition="top" class="easyui-textbox"  label="E-mail medico:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="referencia_direccion" labelPosition="top" class="easyui-textbox"  label="Referencia domiciliaria:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="edad_medico" labelPosition="top" class="easyui-textbox"  label="Edad medico:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="fecha_nacimiento" labelPosition="top" class="easyui-textbox"  label="Fecha de nacimiento:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="lugar_nacimiento" labelPosition="top" class="easyui-textbox"  label="Lugar de nacimiento:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="telefono_medico" labelPosition="top" class="easyui-textbox"  label="Telefono de contacto:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="correo_medico" labelPosition="top" class="easyui-textbox"  label="E-mail:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="id_medico" labelPosition="top" class="easyui-textbox" required="true" label="Id Medico:" style="width:80%">
        </div>

        <div style="margin-bottom:5px">
            <input name="telefono_fijo_medico" labelPosition="top" class="easyui-textbox"  label="Telefono fijo:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="telefono_extension_medico" labelPosition="top" class="easyui-textbox"  label="Telefono ye extension de trabajo:" style="width:80%" >
        </div>  

    </form>
   
    <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pagina=listamedico" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
</div>
    
<script type="text/javascript">
      
    function saveUser()
    {              
        $('#frmusuario').form('submit',
        {
            url: 'controlador/medico.php?op=update',
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
                $.messager.show(
                   {
                        title: 'exito',
                        msg: result
                    }
                );
                window.location.href= 'main.php?pagina=listamedico';
                }
            }); 
        }
    }
</script>