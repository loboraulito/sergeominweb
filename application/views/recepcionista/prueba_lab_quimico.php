<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Bienvenido</h3>
      </div>      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Analisis por:</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>             
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h2>Lista de Analisis:</h2> 
            <button class="btn btn-default btn-success" onclick="nuevo()">Nuevo</button>
            <?php //print_r($empleados);?>
            <table id="tabla" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Elementos</th>
                  <th>Nro de Analisis</th>                  
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
          <h4 class="modal-title" id="myModalLabel">Prueba Lab Quimico</h4>
        </div>
        <div class="modal-body">
          <form id="form" class="form-horizontal" data-toggle="validator" role="form" >
            <fieldset>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="codigo_muestra_cliente">codigo_muestra_cliente</label>
                <div class="input-group col-md-7">
                  <input id="codigo_muestra_cliente" name="codigo_muestra_cliente"
                    placeholder="codigo_muestra_cliente"
                    class="form-control input-md" type="text"
                    required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="codigo_muestra_cliente">elementos</label>
                <div class="input-group col-md-7">
                  <select data-placeholder="Seleccione los elementos..." class="chosen-select" multiple tabindex="4">
                    <option value=""></option>
                    <?php foreach ($cotizaciones as $key => $cotizacion):?>
                      <option value="<?php echo $cotizacion->id_cotizacion;?>"><?php echo $cotizacion->elemento;?></option>
                    <?php endforeach;?>
                  </select>
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
var js_data = '<?php echo json_encode($prueba_lab_quimicos); ?>';
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
      {"data":"codigo_muestra_cliente"},
      {"data":"elementos"},
      {"data":"id_prueba_lab_quimico"},      
      {"targets": -1,
        "data": null,        
        "render":function(a,b,data,d){
          return "<button class='btn btn-primary btn-editar'>Editar</button>";
        }
      }
    ]

  } );

  $('#tabla tbody').on( 'click','.btn-editar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    editar( data['id_prueba_lab_quimico']);     
  } );
  
  $('#tabla tbody').on( 'click','.btn-borrar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    borrar( data['id_prueba_lab_quimico']);     
  } );

  $('#tabla tbody').on( 'click','.btn-activar', function () {
    var data = tabla.row( $(this).parents('tr') ).data();
    activar( data['id_prueba_lab_quimico']);     
  } );
  

  $('#fecha_entrega').datepicker(
  {
    language: 'es',
    autoclose: true,
    format: 'yyyy-mm-dd',
    startDate: '+0d'
  });

  $(".chosen-select").chosen({
    disable_search_threshold: 10,
    no_results_text: "Oops, nothing found!",
    width: "95%"
  });
});

function guardar_nuevo(){
  if(!$('#form').find('.has-error').length) {
    var datos=$('#form').serializeArray();   
    datos.push({name: 'id_solicitud_analisis_lq', value: <?php echo $id_solicitud_analisis_lq?>});
    //console.log(datos);
    var values = $('.chosen-select').val();
    //console.log(values);
    //var elems = values.split(',');
    datos.push({name: 'elementos', value: values});
    $.ajax({
        type: "POST",
        url: '<?php echo site_url('recepcionista/prueba_lab_quimico/nuevo');?>',
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
            url: '<?php echo site_url('recepcionista/cliente/editar/');?>'+id,
            data: $('#form').serialize(),
            success: function(response){ $('#nuevo').modal('hide');location.reload();},
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
          function(data){return data.id_prueba_lab_quimico == id}
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