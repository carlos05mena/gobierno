    <div id="p" class="easyui-panel" title="Ingreso de Pacientes" style="width:100%;height:100%; ">
        <form id="frmUSuario" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="id_paciente" labelPosition="top" class="easyui-textbox" required="true" label="Id Paciente:" style="width:80%">
            </div>
            
            <div style="margin-bottom:5px">
                <input name="ced_paciente" labelPosition="top" class="easyui-textbox" required="true" label="Cédula Paciente:" style="width:80%" >
            </div>           
            
            <div style="margin-bottom:5px">
                <input name="nom_paciente" labelPosition="top" class="easyui-textbox" required="true" label="Nombre Paciente:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="ape_paciente" labelPosition="top" class="easyui-textbox" required="true" label="Apellido Paciente:" style="width:80%" >
            </div>   
            
            <div style="margin-bottom:5px">
                <input name="sexo_paciente" labelPosition="top" class="easyui-textbox" required="true" label="Sexo Paciente:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="id_canton" labelPosition="top" class="easyui-textbox"  label="Cantón:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="dir_paciente" labelPosition="top" class="easyui-textbox"  label="Dirección:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="fecha_nac_paciente" labelPosition="top" class="easyui-textbox"  label="Fecha de nacimiento:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="lug_nac_paciente" labelPosition="top" class="easyui-textbox"  label="Lugar de Nacimiento:" style="width:80%" >
            </div>
            
            <div style="margin-bottom:5px">
                <input name="edad_paciente" labelPosition="top" class="easyui-textbox"  label="Edad:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="telf_cel_paciente" labelPosition="top" class="easyui-textbox"  label="Celular:" style="width:80%" >
            </div>

            <div style="margin-bottom:5px">
                <input name="telf_paciente" labelPosition="top" class="easyui-textbox"  label="Teléfono:" style="width:80%" >
            </div>

            <div style="margin-bottom:5px">
                <input name="tip_sangre_paciente" labelPosition="top" class="easyui-textbox"  label="Tipo de Sangre:" style="width:80%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="aler_paciente" labelPosition="top" class="easyui-textbox"  label="Alergias:" style="width:80%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="ciru_paciente" labelPosition="top" class="easyui-textbox"  label="Cirugías:" style="width:80%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="enfer_cron_paciente" labelPosition="top" class="easyui-textbox"  label="Enfermedades Crónicas:" style="width:80%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="medi_paciente" labelPosition="top" class="easyui-textbox"  label="Medicamentos:" style="width:80%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="obs_paciente" labelPosition="top" class="easyui-textbox"  label="Observaciones:" style="width:80%" >
            </div> 
        </form>
   
        <div style="text-align:center;padding:5px 0">
            <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
            <a  href="main.php?pagina=listapaciente" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
        </div>   

    </div>
    
 
    <script type="text/javascript">
       
   

       function saveUser()
       {              
           $('#frmUSuario').form('submit',
           {
                url: 'controlador/paciente.php?op=insert',
                onSubmit: function()
                {
                    var esvalido =  $(this).form('validate');
                    if( esvalido)
                    {
                        $.messager.progress({
                            title:'Por favor espere',
                            msg:'Cargando datos...'
                        });
                    }
                    return esvalido;
                },
                success: function(result)
                {                   
                    $.messager.progress('close');
                    var result = eval('('+result+')');
                    console.log(result);                  
                    if (result.errorMsg)
                    { 
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } 
                    else 
                    {  
                        $('#dlg').dialog('close');      
                        $('#dg').datagrid('reload');   
                    }
                    window.location.href= 'main.php?pagina=listapaciente';
                }
            }); 
        }
        
    </script>    

    
 
    
 