<table id="dg" title="Lista de Clientes" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/cliente.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead> 








            <tr>               
                <th field="id_especialidad" width="100">Id</th>
                <th field="nombre_especialidad" width="100">Nombre</th>
                <th field="observacion" width="100">Observacion</th>
 
            </tr>
         
        </thead>
    
        <tbody>  <?php
         /*   $json = file_get_contents("http://localhost/gobierno/controlador/cliente.php?op=selectcliente");
$clientes = json_decode($json,"false");
foreach($clientes as $cliente){
    echo "<tr>";
       echo "<td>$cliente[id_especialidad]</td>";
       echo "<td>$cliente[nombre_especialidad]</td>";
       echo "<td>$cliente[observacion]</td>";
        
    echo "</tr>";
 }
*/?></tbody>
			
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar' " style="width:250px">
        <a  href="main.php?pagina=newcliente" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
           
            var row = $('#dg').datagrid('getSelected');
            if (row){
             
                window.location.href = 'main.php?pagina=editcliente&id='+row.cod_cliente;
            }
        }
       


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

            if (row){
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                                 
                    if (r){
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

                        $.post('controlador/cliente.php?op=delete',{id_especialidad:row.id_especialidad},function(result){
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



    
 