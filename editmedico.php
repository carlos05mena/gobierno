<?php
    require ('controlador/coneccion.php');
    if( isset($_GET["id"])   )
    {
        $id=$_GET["id"];
        $sql = "SELECT * FROM  medico where id_medico=$id";
        $result = pg_query($dbconn, $sql);
    
        $row = pg_fetch_assoc($result) ;

        $sql1 = "SELECT * FROM  especialidad ";
        $result1 = pg_query($dbconn, $sql1);
        $row1 = pg_fetch_assoc($result1) ;
    }
?>

<div id="$id" class="easyui-panel" title="Ingreso de datos" style="width:100%;height:100%; ">
    <form id="frmusuario" method="post"     style="margin:0;padding:20px 50px">

        <div style="margin-bottom:5px">
            <input name="id_medico" labelPosition="top" value="<?php echo $row ['id_medico']?>" class="easyui-textbox" required="true" label="Id Medico:" style="width:80%">
        </div>

        <div style="margin-bottom:5px">
            <input name="ced_medico" labelPosition="top" value="<?php echo $row ['ced_medico']?>" class="easyui-textbox" required="true" label="Cedula medico:" style="width:80%" >
        </div>           
            
        <div style="margin-bottom:5px">
            <input name="nom_medico" labelPosition="top" value="<?php echo $row ['nom_medico']?>" class="easyui-textbox" required="true" label="Nombres medico:" style="width:80%">
        </div>   

        <div style="margin-bottom:5px">
            <input name="ape_medico" labelPosition="top" value="<?php echo $row ['ape_medico']?>" class="easyui-textbox" required="true" label="Apellidos medico:" style="width:80%" >
        </div>   
            
        <div style="margin-bottom:5px">
            <input name="sexo_medico" labelPosition="top" value="<?php echo $row ['sexo_medico']?>" class="easyui-textbox" label="Sexo medico:" style="width:80%" >
        </div>   

        <div style="margin-bottom:5px">
            <input name="dir_medico" labelPosition="top" value="<?php echo $row ['dir_medico']?>" class="easyui-textbox"  label="Direccion medico:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="edad_medico" labelPosition="top" value="<?php echo $row ['edad_medico']?>" class="easyui-textbox"  label="Edad medico:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="fecha_nac_medico" labelPosition="top" value="<?php echo $row ['fecha_nac_medico']?>" class="easyui-textbox"  label="Fecha de nacimiento:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="cel_medico" labelPosition="top" value="<?php echo $row ['cel_medico']?>" class="easyui-textbox"  label="Celular:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="telf_medico" labelPosition="top" value="<?php echo $row ['telf_medico']?>" class="easyui-textbox"  label="Telefono fijo:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="telf_ext_medico" labelPosition="top" value="<?php echo $row ['telf_ext_medico']?>" class="easyui-textbox"  label="Telf y ext de trabajo:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <input name="mail_medico" labelPosition="top" value="<?php echo $row ['mail_medico']?>" class="easyui-textbox"  label="E-mail:" style="width:80%" >
        </div>  

        <div style="margin-bottom:5px">
            <select name="id_especialidad" labelPosition="top" class="easyui-combobox" label="Especialidad:" style="width:80%" >       
                <?php  while($row1 = pg_fetch_assoc($result1)) 
                    {
                        ?>  
                            <option value="<?php echo $row1 ['id_especialidad'] ?> "><?php echo $row1 ['nom_especialidad'] ?></option>
                        <?php
                    }
                ?>  
            </select>    
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
</script>