<!-- page content -->
<div class="right_col" role="main">
      <div id="rootwizard">
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
      <ul>
          <li><a href="#tab1" data-toggle="tab">First</a></li>
        <li><a href="#tab2" data-toggle="tab">Second</a></li>
        <li><a href="#tab3" data-toggle="tab">Third</a></li>
        <li><a href="#tab4" data-toggle="tab">Forth</a></li>
        <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
        <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
        <li><a href="#tab7" data-toggle="tab">Seventh</a></li>
      </ul>
       </div>
        </div>
      </div>
      <div class="tab-content">
          <div class="tab-pane" id="tab1">
            1
          </div>
          <div class="tab-pane" id="tab2">
            2
          </div>
        <div class="tab-pane" id="tab3">
          3
          </div>
        <div class="tab-pane" id="tab4">
          4
          </div>
        <div class="tab-pane" id="tab5">
          5
          </div>
        <div class="tab-pane" id="tab6">
          6
          </div>
        <div class="tab-pane" id="tab7">
          7
          </div>
        <ul class="pager wizard">
          <li class="previous first" style="display:none;"><a href="#">First</a></li>
          <li class="previous"><a href="#">Previous</a></li>
          <li class="next last" style="display:none;"><a href="#">Last</a></li>
            <li class="next"><a href="#">Next</a></li>
        </ul>
      </div>
    </div>
</div>

<script>


$(function() {
  $('#rootwizard').bootstrapWizard();
});

function guardar_nuevo(){
  if(!$('#form').find('.has-error').length) {
    var datos=$('#form').serializeArray();    
    $.ajax({
        type: "POST",
        url: '<?php echo site_url('recepcionista/cliente/nuevo');?>',
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
          function(data){return data.id_cliente == id}
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
        url: '<?php echo site_url('recepcionista/cliente/activar/');?>'+id,        
        success: function(response){ location.reload();},
        error: function(){alert('Formulario con errores al Activar');}
    });
}

function guardar_borrar(id){
  $.ajax({
        type: "POST",
        url: '<?php echo site_url('recepcionista/cliente/borrar/');?>'+id,        
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