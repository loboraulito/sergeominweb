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
              Lista de Empleados
          </div>
          <?php //print_r($empleados);?>

          <table id="tabla" class="table table-striped table-bordered table-hover">
            <tr>
              <th>Nro</th>
              <th>Nombre</th>
              <th>Opciones</th>
            </tr>
            <?php foreach ($empleados as $id => $empleado):?>
            <tr>
              <td><?php echo $id+1;?></td>
              <td><?php echo $empleado->apellido_paterno.' '.$empleado->apellido_materno.' '.$empleado->nombre;?></td>
              <td><button type="button" class="btn btn-primary">Editar</button></td>
            </tr>  
            <?php endforeach;?>  
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<script>
var js_data = '<?php echo json_encode($empleados); ?>';
var js_obj_data = JSON.parse(js_data);


$(function() {
  $('#nuevo').on('shown.bs.modal', function (e) { $('#form').validator() });  
  
  jQuery.fn.resetear = function () {
      $(this).each (function() { this.reset(); });
    }

  $('#tabla').DataTable( {
    data: js_obj_data
} );
  
});

function guardar_nuevo(){
  if(!$('#form').find('.has-error').length) {
    $.ajax({
          type: "POST",
          url: '<?php echo base_url().'administracion/empleado/nuevo';?>',
          data: $('#form').serialize(),
          success: function(response){ $('#nuevo').modal('hide');location.reload();},
          error: function(){alert('Formulario con errores');}
      });   
    } 
}

function guardar_editar(id){
  if(!$('#form').find('.has-error').length) {
      $.ajax({
            type: "POST",
            url: '<?php echo base_url().'administracion/empleado/editar/';?>'+id,
            data: $('#form').serialize(),
            success: function(response){ $('#nuevo').modal('hide');location.reload();},
            error: function(){alert('Formulario con errores');}
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
  $('#form').resetear();
  datos = buscar(id)[0];
  
  populate_form(datos);
  $("#id_area_funcional option[value="+datos.id_area_funcional+"]").attr("selected","selected");
  $("#id_area_funcional option[value="+datos.id_area_funcional+"]").trigger("change");
  $("#id_unidad_funcional option[value="+datos.id_unidad_funcional+"]").attr("selected","selected");
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

function guardar_borrar(id){
  $.ajax({
        type: "POST",
        url: '<?php echo base_url().'administracion/empleado/borrar/';?>'+id,        
        success: function(response){ $('#confirmar').modal('hide');location.reload();},
        error: function(){alert('Formulario con errores');}
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