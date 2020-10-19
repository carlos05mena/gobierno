<table id="dg" title="Lista de medicos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
    url="controlador/medico.php?op=select"
    toolbar="#toolbar" pagination="false" 
    rownumbers="true" fitColumns="true" singleSelect="true">

    <thead> 
        <tr>               

            <th field="ced_medico" width="100">Número de cedula</th>
            <th field="nom_medico" width="100">Nombres</th>
            <th field="ape_medico" width="100">Apellidos</th>
            <th field="dir_medico" width="100">Direccion</th>
        </tr>
    </thead>
</table> 
   
<div id="toolbar">      
    <input class="easyui-searchbox" data-options="prompt:'Buscar' " style="width:250px">
    <a  href="main.php?pagina=newmedico" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-tip" plain="true" onclick="verDetalle()">Ver a Detalle</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
</div>
    
<script type="text/javascript">
    var url;
    function editUser()
    {
        var row = $('#dg').datagrid('getSelected');
        if (row)
        {
            window.location.href = 'main.php?pagina=editmedico&id='+row.id_medico;
        }
    }
    
    function verDetalle()
    {
        var row = $('#dg').datagrid('getSelected');
        if (row)
        {
            window.location.href = 'main.php?pagina=verdetallemedico&id='+row.id_medico;
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



    
 