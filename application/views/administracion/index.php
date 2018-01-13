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
            <h2>Administrador</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h2>Lista de Empleados</h2> 
            <button class="btn btn-default btn-success" onclick="nuevo()">Nuevo</button>
            <?php //print_r($empleados);?>
            <table id="tabla" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>CI</th>
                  <th>Telefono</th>
                  <th>Cargo</th>                  
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
          <h4 class="modal-title" id="myModalLabel">Empleados</h4>
        </div>
        <div class="modal-body">
          <form id="form" class="form-horizontal" data-toggle="validator" role="form" >
            <fieldset>

              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="nombre">Nombres</label>
                <div class="input-group col-md-7">
                  <input id="nombre" name="nombre"
                    placeholder="Nombre del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$" required
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_paterno">Apellido Paterno</label>
                <div class="input-group col-md-7">
                  <input id="apellido_paterno" name="apellido_paterno"
                    placeholder="Apellidos del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$" required
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Apellido Materno</label>
                <div class="input-group col-md-7">
                  <input id="apellido_materno" name="apellido_materno"
                    placeholder="Apellidos del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$"
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="ci">ci</label>
                <div class="input-group col-md-7">
                  <input id="ci" name="ci"
                    placeholder="ci"
                    class="form-control input-md" type="text"
                    pattern="^[0-9A-z\s\-]{1,}$"
                    data-remote="<?php echo site_url('administracion/empleado/verificar_ci/0');?>"
                    data-pattern-error="Campo Obligatorio solo números, letras, guión y espacios" data-remote-error="El CI debe ser único"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>  
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Telefono</label>
                <div class="input-group col-md-7">
                  <input id="telefono" name="telefono"
                    placeholder="telefono"
                    class="form-control input-md" type="text"
                    pattern="^[0-9\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Celular</label>
                <div class="input-group col-md-7">
                  <input id="celular" name="celular"
                    placeholder="celular"
                    class="form-control input-md" type="text"
                    pattern="^[0-9\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Dirección</label>
                <div class="input-group col-md-7">
                  <input id="direccion" name="direccion"
                    placeholder="direccion"
                    class="form-control input-md" type="text"
                    pattern="^[0-9A-Za-z\s]{1,}$"
                    data-error="Campo Obligatorio letras, números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Email</label>
                <div class="input-group col-md-7">
                  <input id="email" name="email"
                    placeholder="email"
                    class="form-control input-md" type="email"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Lugar de Nacimiento</label>
                <div class="input-group col-md-7">
                  <input id="lugar_nacimiento" name="lugar_nacimiento"
                    placeholder="lugar_nacimiento"
                    class="form-control input-md" type="text"
                    pattern="^[A-zñÑáéíóúÁÉÍÓÚ\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Fecha de Nacimiento</label>
                <div class="input-group col-md-7">
                  <input id="fecha_nacimiento" name="fecha_nacimiento"
                    placeholder="fecha_nacimiento"
                    class="form-control input-md" type="date"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true" required></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Fecha Ingreso</label>
                <div class="input-group col-md-7">
                  <input id="fecha_ingreso" name="fecha_ingreso"
                    placeholder="fecha_ingreso"
                    class="form-control input-md" type="date"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
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

<!--Formularios para nuevo editar y confirmar borrado-->
<div class="modal fade" id="nuevo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
    <div class="modal-dialog " >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Empleados</h4>
        </div>
        <div class="modal-body">
          <form id="form1" class="form-horizontal" data-toggle="validator" role="form" >
            <fieldset>

              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="nombre">Nombres</label>
                <div class="input-group col-md-7">
                  <input id="nombre" name="nombre"
                    placeholder="Nombre del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$" required
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_paterno">Apellido Paterno</label>
                <div class="input-group col-md-7">
                  <input id="apellido_paterno" name="apellido_paterno"
                    placeholder="Apellidos del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$" required
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Apellido Materno</label>
                <div class="input-group col-md-7">
                  <input id="apellido_materno" name="apellido_materno"
                    placeholder="Apellidos del Empleado"
                    class="form-control input-md" type="text"
                    pattern="^[A-z\s]{1,}$"
                    data-error="Campo Obligatorio solo letras y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="ci">ci</label>
                <div class="input-group col-md-7">
                  <input id="ci" name="ci"
                    placeholder="ci"
                    class="form-control input-md" type="text"
                    pattern="^[0-9A-z\s\-]{1,}$"
                    data-remote="<?php echo site_url('administracion/empleado/verificar_ci/1');?>"
                    data-pattern-error="Campo Obligatorio solo números, letras, guión y espacios" data-remote-error="El CI debe ser único"> 
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>  
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Telefono</label>
                <div class="input-group col-md-7">
                  <input id="telefono" name="telefono"
                    placeholder="telefono"
                    class="form-control input-md" type="text"
                    pattern="^[0-9\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Celular</label>
                <div class="input-group col-md-7">
                  <input id="celular" name="celular"
                    placeholder="celular"
                    class="form-control input-md" type="text"
                    pattern="^[0-9\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Dirección</label>
                <div class="input-group col-md-7">
                  <input id="direccion" name="direccion"
                    placeholder="direccion"
                    class="form-control input-md" type="text"
                    pattern="^[0-9A-Za-z\s]{1,}$"
                    data-error="Campo Obligatorio letras, números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Email</label>
                <div class="input-group col-md-7">
                  <input id="email" name="email"
                    placeholder="email"
                    class="form-control input-md" type="email"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Lugar de Nacimiento</label>
                <div class="input-group col-md-7">
                  <input id="lugar_nacimiento" name="lugar_nacimiento"
                    placeholder="lugar_nacimiento"
                    class="form-control input-md" type="text"
                    pattern="^[A-zñÑáéíóúÁÉÍÓÚ\s]{1,}$"
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Fecha de Nacimiento</label>
                <div class="input-group col-md-7">
                  <input id="fecha_nacimiento" name="fecha_nacimiento"
                    placeholder="fecha_nacimiento"
                    class="form-control input-md" type="date"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true" required></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
               <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="apellido_materno">Fecha Ingreso</label>
                <div class="input-group col-md-7">
                  <input id="fecha_ingreso" name="fecha_ingreso"
                    placeholder="fecha_ingreso"
                    class="form-control input-md" type="date"                    
                    data-error="Campo Obligatorio solo números y espacios"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>                
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button id="guardar-btn-editar" type="button" class="btn btn-primary">Guardar</button>
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
          Esta seguro de Borrar el Empleado
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
var js_data = '<?php echo json_encode($empleados); ?>';
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
      {"data":"id_empleado",
        searchable:false},
      {"data":null,
        "render":function(a,b,data,d){
          return data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno;
        }},
      {"data":"ci"},
      {"data":"telefono",
        searchable:false},
      {"data":null},      
      {"targets": -1,
        "data": null,        
        "render":function(a,b,data,d){          
          if (data.estado == 'A') {
                return "<button class='btn btn-primary btn-editar'>Editar</button><button class='btn btn-danger btn-borrar'>Borrar</button><button class='btn btn-info btn-imprimir'>Imprimir</button>";
            }
            return "<button class='btn btn-warning btn-activar'>Activar</button><button class='btn btn-info btn-imprimir'>Imprimir</button>";
        },
        searchable:false
      }
    ]

  } );

  $('#tabla tbody').on( 'click','.btn-usuario', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    location = "<?php echo site_url('administracion/usuario/listar_usuarios_empleado/') ?>"+data['id_empleado'];
  } );

  $('#tabla tbody').on( 'click','.btn-editar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    editar( data['id_empleado']);     
  } );
  
  $('#tabla tbody').on( 'click','.btn-borrar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    borrar( data['id_empleado']);     
  } );

  $('#tabla tbody').on( 'click','.btn-activar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    activar( data['id_empleado']);     
  } );

  $('#tabla tbody').on( 'click','.btn-imprimir', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    window.open( "<?php echo site_url('administracion/empleado/imprimir/') ?>"+data['id_empleado']);    
  } );
});

function guardar_nuevo(){
  if(!$('#form').find('.has-error').length) {
    $.ajax({
          type: "POST",
          url: '<?php echo site_url('administracion/empleado/nuevo');?>',
          data: $('#form').serialize(),
          success: function(response){ $('#nuevo').modal('hide');location.reload();},
          error: function(){alert('Formulario con errores al crear nuevo empleado');}
      });   
    } 
}

function guardar_editar(id){
  if(!$('#form1').find('.has-error').length) {
      $.ajax({
            type: "POST",
            url: '<?php echo site_url('administracion/empleado/editar/');?>'+id,
            data: $('#form1').serialize(),
            success: function(response){ $('#nuevo1').modal('hide');location.reload();},
            error: function(){alert('Formulario con errores al editar');}
        });
  }   
}

function nuevo(){
  $('#form').resetear();
  $('#nuevo').appendTo("body").modal('show');
  $( "#guardar-btn").unbind( "click" );
  $( "#guardar-btn" ).bind( "click", function() {
      guardar_nuevo();
  });
}

function buscar(id) {
  return js_obj_data.filter(
          function(data){return data.id_empleado == id}
      );
  } 

function editar(id){
  $('#form1').resetear();
  datos = buscar(id)[0];
  
  populate_form(datos);
  
  $('#nuevo1').modal('show');
  $( "#guardar-btn-editar").unbind( "click" );
  $( "#guardar-btn-editar" ).bind( "click", function() {
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

function guardar_borrar(id){
  $.ajax({
        type: "POST",
        url: '<?php echo site_url('administracion/empleado/borrar/');?>'+id,        
        success: function(response){ $('#confirmar').modal('hide');location.reload();},
        error: function(){alert('Formulario con errores al Borrar');}
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