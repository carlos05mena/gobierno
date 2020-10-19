<table id="dg" title="Lista de Pacientes" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/paciente.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">

        <thead> 
            <tr>               
                <th field="ced_paciente" width="100">Cédula de Paciente</th>
                <th field="nom_paciente" width="100">Nombres Paciente</th>
                <th field="ape_paciente" width="100">Apellidos Paciente</th>
                <th field="sexo_paciente" width="100">Sexo</th>
                <th field="dir_paciente" width="100">Dirección</th>
                <th field="telf_cel_paciente" width="100">Celular</th>
                <th field="telf_paciente" width="100">Teléfono</th>
             
            </tr>
        </thead>
			
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar' " style="width:250px">
        <a  href="main.php?pagina=newpaciente" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
    <script type="text/javascript">
        var url;
        
        function editUser()
        {
            var row = $('#dg').datagrid('getSelected');
            if (row)
            {
                window.location.href = 'main.php?pagina=editpaciente&id='+row.id_paciente;
            }
        }
       
        function destroyUser()
        {
            var row = $('#dg').datagrid('getSelected');     

            if (row)
            {
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r)
                {       
                    if (r)
                    {
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

                        $.post('controlador/paciente.php?op=delete',{id_paciente:row.id_paciente},function(result)
                        {
                            $.messager.progress('close');     
                            
                            if (result.status == 1)
                            {
                                $('#dg').datagrid('reload');    
                            } 
                            else 
                            {
                                $.messager.show({    
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }

        function refrescar()
        {
            $('#dg').datagrid('reload');   
        }
    </script>    



    
 