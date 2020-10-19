<table id="dg" title="Lista de especialidad" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/especialidad.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead> 
            <tr>               
                <th field="id_especialidad" width="100">Id</th> 
                <th field="nom_especialidad" width="100">Nombre</th>
                <th field="obs_especialidad" width="100">Observacion</th>
 
            </tr>
         
        </thead>
    			
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar' " style="width:250px">
        <a  href="main.php?pagina=newespecialidad" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
           
            var row = $('#dg').datagrid('getSelected');
            if (row){
             
                window.location.href = 'main.php?pagina=editespecialidad&id='+row.id_especialidad;
            }
        }
       


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

            if (row){
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                                 
                    if (r){
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

                        $.post('controlador/especialidad.php?op=delete',{id_especialidad:row.id_especialidad},function(result){
                            $.messager.progress('close');     
                            
                            if (result.status == 1){
                                $('#dg').datagrid('reload');    
                            } else {
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

        function refrescar(){
            $('#dg').datagrid('reload');   
        }
    </script>    



    
 