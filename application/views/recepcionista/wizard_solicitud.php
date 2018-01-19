<!-- page content -->
<div class="right_col" role="main">
      <div id="rootwizard">
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
      <ul>
          <li><a href="#tab1" data-toggle="tab">Cliente</a></li>
        <li><a href="#tab2" data-toggle="tab">Datos de la Muestra</a></li>
        <li><a href="#tab3" data-toggle="tab">Datos de Análisis</a></li>        
      </ul>
       </div>
        </div>
      </div>
      <div class="tab-content">
          <div class="tab-pane" id="tab1">
            <!--Formularios para nuevo editar y confirmar borrado-->
            
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form" class="form-horizontal" data-toggle="validator" role="form" >
                        <fieldset>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="nombre_empresa">Nombre Empresa</label>
                            <div class="input-group col-md-7">
                              <input id="nombre_empresa" name="nombre_empresa"
                                placeholder="Nombre de Empresa"
                                class="form-control input-md" type="text"
                                pattern="^[A-z0-9\-.ñÑáéíóúÁÉÍÓÚ\s]{1,}$" required
                                data-error="Campo Obligatorio solo letras y números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="numero_ci">CI</label>
                            <div class="input-group col-md-7">
                              <input id="numero_ci" name="numero_ci"
                                placeholder="numero_ci"
                                class="form-control input-md" type="text"
                                pattern="^[A-z0-9\-]{1,}$" required
                                data-error="Campo Obligatorio solo letras y números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="nombre_responsable">Nombre Responsable</label>
                            <div class="input-group col-md-7">
                              <input id="nombre_responsable" name="nombre_responsable"
                                placeholder="nombre_responsable"
                                class="form-control input-md" type="text"
                                pattern="^[A-z\s]{1,}$" required
                                data-error="Campo Obligatorio solo letras"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="nit">NIT</label>
                            <div class="input-group col-md-7">
                              <input id="nit" name="nit"
                                placeholder="nit"
                                class="form-control input-md" type="text"
                                pattern="^[0-9]{1,}$" required
                                data-error="Campo Obligatorio solo números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="direccion">Dirección</label>
                            <div class="input-group col-md-7">
                              <input id="direccion" name="direccion"
                                placeholder="Nombre de direccion"
                                class="form-control input-md" type="text"
                                pattern="^[A-z0-9\-.ñÑáéíóúÁÉÍÓÚ#\s]{1,}$" required
                                data-error="Campo Obligatorio solo letras y números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="numero_celular">Número de Celular</label>
                            <div class="input-group col-md-7">
                              <input id="numero_celular" name="numero_celular"
                                placeholder="numero_celular"
                                class="form-control input-md" type="text"
                                pattern="^[0-9]{1,}$" required
                                data-error="Campo Obligatorio solo números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="numero_telefono">Número Telefono</label>
                            <div class="input-group col-md-7">
                              <input id="numero_telefono" name="numero_telefono"
                                placeholder="numero_telefono"
                                class="form-control input-md" type="text"
                                pattern="^[0-9]{1,}$" required
                                data-error="Campo Obligatorio solo números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="departamento">Departamento</label>
                            <div class="input-group col-md-7">
                              <input id="departamento" name="departamento"
                                placeholder="departamento"
                                class="form-control input-md" type="text"
                                pattern="^[A-z\s]{1,}$" required
                                data-error="Campo Obligatorio solo letras"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="form-group has-feedback">
                            <label class="col-md-4 control-label" for="email">email</label>
                            <div class="input-group col-md-7">
                              <input id="email" name="email"
                                placeholder="email"
                                class="form-control input-md" type="email"
                                required
                                data-error="Campo Obligatorio solo letras y números"> <span
                                class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>                    
                  </div>
                
          </div>
          <div class="tab-pane" id="tab2">
            <!--Formularios para nuevo editar y confirmar borrado-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Cliente</h4>
        </div>
        <div class="modal-body">
          <form id="form" class="form-horizontal" data-toggle="validator" role="form" >
            <fieldset>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="numero_hoja_ruta">numero_hoja_ruta</label>
                <div class="input-group col-md-7">
                  <input id="numero_hoja_ruta" name="numero_hoja_ruta"
                    placeholder="numero_hoja_ruta"
                    class="form-control input-md" type="text"
                    pattern="^[A-z0-9]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="cantidad_muestras">cantidad_muestras</label>
                <div class="input-group col-md-7">
                  <input id="cantidad_muestras" name="cantidad_muestras"
                    placeholder="cantidad_muestras"
                    class="form-control input-md" type="text"
                    pattern="^[0-9]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
             <!-- Text input-->
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="clave">tipo_muestra</label>
                <div class="input-group col-md-7">
                  <select class="select2_single form-control" tabindex="-1" name="tipo_muestra">
                    <option></option>                    
                    <option value="Agua">Agua</option>
                    <option value="Minerales">Minerales</option>                    
                  </select>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="procedencia">procedencia</label>
                <div class="input-group col-md-7">
                  <input id="procedencia" name="procedencia"
                    placeholder="procedencia"
                    class="form-control input-md" type="text"
                    pattern="^[A-z0-9]{1,}$" required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="fecha_entrega">fecha_entrega</label>
                <div class="input-group col-md-7">
                  <input id="fecha_entrega" name="fecha_entrega"
                    placeholder="fecha_entrega"
                    class="form-control input-md" type="text"
                    required
                    data-error="Campo Obligatorio solo letras y números"> <span
                    class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>              
            </fieldset>
          </form>
        </div>       
      </div>
    
          </div>
        <div class="tab-pane" id="tab3">
          <!--Formularios para nuevo editar y confirmar borrado-->

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
      </div>    
        </div>        
        <ul class="pager wizard">
          <li class="previous first" style="display:none;"><a href="#">Primero</a></li>
          <li class="previous btn-default"><a href="#">Anterior</a></li>
          <li class="next last" style="display:none;"><a href="#">Ultimo</a></li>
            <li class="next btn-principal"><a href="#">Siguiente</a></li>
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