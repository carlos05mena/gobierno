    <div id="p" class="easyui-panel" title="Ingreso de Medicos" style="width:100%;height:100%; ">
        <form id="frmUSuario" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="id_medico" labelPosition="top" class="easyui-textbox" required="true" label="Id Medico:" style="width:80%">
            </div>
            
            <div style="margin-bottom:5px">
                <input name="ced_medico" labelPosition="top" class="easyui-textbox" required="true" label="Ced medico:" style="width:80%" >
            </div>           
            
            <div style="margin-bottom:5px">
                <input name="nom_medico" labelPosition="top" class="easyui-textbox" required="true" label="Nombre medico:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="ape_medico" labelPosition="top" class="easyui-textbox" required="true" label="Apellido medico:" style="width:80%" >
            </div>   
            
            <div style="margin-bottom:5px">
                <input name="sexo_medico" labelPosition="top" class="easyui-textbox" label="Sexo:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="dir_medico" labelPosition="top" class="easyui-textbox"  label="Dir:" style="width:80%" >
            </div>   

            <div style="margin-bottom:5px">
                <input name="edad_medico" labelPosition="top" class="easyui-textbox"  label="Edad medico:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="fecha_nac_medico" labelPosition="top" class="easyui-textbox"  label="Fecha de nac_medico:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="cel_medico" labelPosition="top" class="easyui-textbox"  label="Telef fijo:" style="width:80%" >
            </div>
            
            <div style="margin-bottom:5px">
                <input name="telef_medico" labelPosition="top" class="easyui-textbox"  label="Telef de contacto:" style="width:80%" >
            </div>  

            <div style="margin-bottom:5px">
                <input name="telef_ext_medico" labelPosition="top" class="easyui-textbox"  label="Telef ext de trabajo:" style="width:80%" >
            </div>

            <div style="margin-bottom:5px">
                <input name="mail_medico" labelPosition="top" class="easyui-textbox"  label="E-mail:" style="width:80%" >
            </div>

            <div style="margin-bottom:5px">
                <input name="id_especialidad" labelPosition="top" class="easyui-textbox"  label="Especialidad:" style="width:80%" >
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
           $('#frmUSuario').form('submit',
           {
                url: 'controlador/medico.php?op=insert',
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
                    window.location.href= 'main.php?pagina=listamedico';
                }
            }); 
        }
        
    </script>    

    
 
    
 