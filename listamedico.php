<table id="dg" title="Lista de medicos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/medico.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">

        <thead> 
            <tr>               
                <th field="id_medico" width="100">Id</th>
                <th field="ced_medico" width="100">Número de ced</th>
                <th field="nom_medico" width="100">Nom</th>
                <th field="ape_medico" width="100">Ape</th>
                <th field="sexo_medico" width="100">Sexo</th>
                <th field="dir_medico" width="100">Dir</th>
                <th field="edad_medico" width="100">Edad</th>
                <th field="fecha_nac_medico" width="100">Fecha de nac_medico</th>
                <th field="cel_medico" width="100">Celular</th>
                <th field="telf_medico" width="100">Telefono convencional</th>
                <th field="telf_ext_medico" width="100">Número de telefono institucional</th>
                <th field="mail_medico" width="100">mail electrónico</th>
                <th field="id_especialidad" width="100">Especialidad</th>
            </tr>
        </thead>
			
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar' " style="width:250px">
        <a  href="main.php?pagina=newmedico" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
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
                window.location.href = 'main.php?pagina=editmedico&id='+row.cod_medico;
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

                        $.post('controlador/medico.php?op=delete',{id_medico:row.id_medico},function(result)
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



    
 