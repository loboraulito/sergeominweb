<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Bienvenido Administrador</h3>
      </div>      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Usuarios</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>             
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h2>Lista de Usuarios</h2> 
            
            <?php //print_r($empleados);?>
            <table id="tabla" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>CI</th>
                  <th>Telefono</th>
                  <th>Usuario</th>
                  <th>Rol</th>                  
                  <th>Opciones</th>
                </tr> 
              </thead>           
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!--Formularios para nuevo editar y confirmar borrado-->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
    <div class="modal-dialog " >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Usuario</h4>
        </div>
        <div class="modal-body">
          <form id="form" class="form-horizontal" data-toggle="validator" role="form" >
            <fieldset>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="usuario">Nombre de Usuario</label>
                <div class="input-group col-md-7">
                  <input id="usuario" name="usuario"
                    placeholder="Nombre de usuario"
                    class="form-control input-md" type="text"
                    pattern="^[A-z]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>              
              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="clave">Rol</label>
                <div class="input-group col-md-7">
                  <select class="select2_single form-control" tabindex="-1" name="id_rol">
                    <option></option>
                    <?php foreach($roles as $rol):?>
                      <option value="<?php echo $rol->id_rol;?>"><?php echo $rol->rol;?></option>
                    <?php endforeach;?>
                  </select>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="clave">Clave</label>
                <div class="input-group col-md-7">
                  <input id="clave" name="clave"
                    placeholder="Clave del usuario"
                    class="form-control input-md" type="password"
                    pattern="^[A-z0-9]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="clave1">Confirmar Clave</label>
                <div class="input-group col-md-7">
                  <input id="clave1" name="clave1"
                    placeholder="Clave del usuario"
                    class="form-control input-md" type="password"
                    pattern="^[A-z0-9]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"
                    data-match="#clave" data-match-error="Las contraseñas deben ser iguales"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>                            
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button id="guardar-btn" type="button" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>  

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">¿Borrar?</h4>
        </div>
        <div class="modal-body">
          Esta seguro de Borrar el Usuario
        </div>
        <div class="modal-footer">
          <button id="confirmar-guardar-btn" type="button" class="btn btn-primary" >Si</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
var js_data = '<?php echo json_encode($usuarios); ?>';
var js_obj_data = JSON.parse(js_data);
var tabla;
var a;

$(function() {
  $('#nuevo').on('shown.bs.modal', function (e) { $('#form').validator() });  
  
  jQuery.fn.resetear = function () {
      $(this).each (function() { this.reset(); });
    }

  tabla = $('#tabla').DataTable( {
    language:{
      "url":"/sergeominweb/public/vendors/datatables.net/js/Spanish.json"
    },
    data: js_obj_data,
    "columns":[
      {"data":"id_empleado"},
      {"data":null,
        "render":function(a,b,data,d){
          return data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno;
        }},
      {"data":"ci"},
      {"data":"telefono"},  
      {"data":"usuario"},
      {"data":"rol"},     
      {"targets": -1,
        "data": null,        
        "render":function(a,b,data,d){          
          if (data.ru_estado) {
                return "<button class='btn btn-info btn-asignar-rol-editar'>Asignar Rol</button><button class='btn btn-danger btn-borrar'>Borrar</button>";
            }
            return "<button class='btn btn-info btn-asignar-rol-nuevo'>Asignar Rol</button>";
        }
      }
    ]

  } );

  $('#tabla tbody').on( 'click','.btn-asignar-rol-editar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    editar( data['id_empleado']);     
  } );

  $('#tabla tbody').on( 'click','.btn-asignar-rol-nuevo', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    nuevo( data['id_empleado']);     
  } );
  
  $('#tabla tbody').on( 'click','.btn-borrar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    borrar( data['id_empleado']);     
  } );

  $('#tabla tbody').on( 'click','.btn-activar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    activar( data['id_empleado']);     
  } );
});

function guardar_nuevo(id_empleado){
  if(!$('#form').find('.has-error').length) {
    var datos=$('#form').serializeArray();
    datos.push({name: 'id_empleado', value: id_empleado});
    $.ajax({
        type: "POST",
        url: '<?php echo site_url('administracion/usuario/nuevo');?>',
        data: datos,
        success: function(response){ $('#nuevo').modal('hide');location.reload();},
        error: function(){alert('Formulario con errores al crear nuevo usuario');}
    });   
  } 
}

function guardar_editar(id){
  if(!$('#form').find('.has-error').length) {
      $.ajax({
            type: "POST",
            url: '<?php echo site_url('administracion/usuario/editar/');?>'+id,
            data: $('#form').serialize(),
            success: function(response){ $('#nuevo').modal('hide');location.reload();},
            error: function(){alert('Formulario con errores al editar');}
        });
  }   
}

function nuevo($id_empleado){
  $('#form').resetear();
  $('#nuevo').appendTo("body").modal('show');
  $( "#guardar-btn").unbind( "click" );
  $( "#guardar-btn" ).bind( "click", function() {
      guardar_nuevo($id_empleado);
  });
}

function buscar(id) {
  return js_obj_data.filter(
          function(data){return data.id_empleado == id}
      );
  } 

function editar(id){
  $('#form').resetear();
  datos = buscar(id)[0];  
  populate_form(datos);  
  $('#nuevo').modal('show');
  $( "#guardar-btn").unbind( "click" );
  $( "#guardar-btn" ).bind( "click", function() {
      guardar_editar(id);
  });
}

function borrar(id){  
  $('#confirmar').modal('show');
  $( "#confirmar-guardar-btn").unbind( "click" );
  $( "#confirmar-guardar-btn" ).bind( "click", function() {
      guardar_borrar(id);
  });
}

function activar(id){  
  $.ajax({
        type: "POST",
        url: '<?php echo site_url('administracion/empleado/activar/');?>'+id,        
        success: function(response){ location.reload();},
        error: function(){alert('Formulario con errores al Activar');}
    });
}

function guardar_borrar(id){
  $.ajax({
        type: "POST",
        url: '<?php echo site_url('administracion/empleado/borrar/');?>'+id,        
        success: function(response){ $('#confirmar').modal('hide');location.reload();},
        error: function(){alert('Formulario con errores al Borrar');}
    });   
}

function populate_form(datos){
  //console.log(datos[0]);
  $.each(datos, function(name, val){
      var $el = $('[name="'+name+'"]'),
          type = $el.attr('type');
    console.log(name);
    console.log($el);
    console.log(type);
    console.log(val);
      switch(type){
          case 'checkbox':
              $el.attr('checked', 'checked');
              break;
          case 'radio':
              $el.filter('[value="'+val+'"]').attr('checked', 'checked');
              break;          
          default:
              $el.val(val);
      }
  });
}
</script>
<?php
function buscar($lista,$campo,$valor,$campo_a_retornar){
    foreach($lista as &$elemento) {
        $elemento     = get_object_vars($elemento);
        $val = $elemento[$campo];
        if ($val == $valor) return $elemento[$campo_a_retornar];
    }
    return '';
}
?>