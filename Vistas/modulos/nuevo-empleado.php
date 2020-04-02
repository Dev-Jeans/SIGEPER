    <!--inicia nuevo empleado-->
    <div class="container-fluid px-xl-5">
    <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Datos Personales</h6>
                    <div>
                      <!--<a href="#" id="addDatos"><i class="fas fa-plus-circle text-success"></i> AGREGAR DATOS</a>-->
                    </div>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label>Nombres</label>
                          <input type="text" placeholder="Documento" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                          <label>Apellidos</label>
                          <input type="text" placeholder="Documento" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Tipo de Doc <a href=""><i class="fas fa-exclamation-circle text-secondary"></i></a></label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="DNI">DNI</option>
                            <option value="CE">CE</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Nro de Documento</label>
                          <input type="number" placeholder="Documento" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Género</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Nacionalidad</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="">PERUANA</option>
                            <option value="">VENEZOLANA</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Estado Civil</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="SOLTERO">SOLTERO</option>
                            <option value="CASADO">CASADO</option>
                            <option value="VIUDO">VIUDO</option>
                            <option value="DIVORCIADO">DIVORCIADO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Fecha de Nacimiento</label> 
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-white">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Lugar de Nacimiento</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="LIMA">LIMA</option>
                            <option value="ICA">ICA</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Tiene hijos?</label>
                          <select name="" id="cbxHijos" class="form-control">
                            <option value=""></option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2 d-none" id="edtHijos">
                          <label>Cuántos</label>
                          <input type="number" placeholder="hijos" value="0" class="form-control">
                        </div>
                      </div>
                      <h6 class="text-uppercase mb-0">Datos de Contacto</h6>
                      <hr>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label>Telefono Móvil</label>
                          <input type="telephone" placeholder="Movil" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Telefono Fijo</label>
                          <input type="telephone" placeholder="Fijo" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                          <label>Correo</label>
                          <input type="email" placeholder="Correo" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                          <label>Dirección de Domicilio</label>
                          <input type="text" placeholder="Dirección" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                          <label>Referencia de Domicilio</label>
                          <input type="text" placeholder="Referencia" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Departamento</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="LIMA">LIMA</option>
                            <option value="ICA">ICA</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Provincia</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="LIMA">LIMA</option>
                            <option value="ICA">ICA</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Distrito</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="LIMA">LIMA</option>
                            <option value="ICA">ICA</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-secondary mr-3">Cancel</button>
                          <button type="submit" class="btn btn-primary">Guardar datos</button>
                        </div>
                      </div>                          
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Datos de Contrato</h6>
                    <div>
                      <!--<a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR CONTRATO</a>-->
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    <div id="formaddContrato" class="">
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label>Nomina</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="PANILLA">PANILLA</option>
                            <option value="RXH">RXH</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Cargo</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="SUPERVISOR">SUPERVISOR</option>
                            <option value="EJECUTIVO">EJECUTIVO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Empresa</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="TERCERIZA">TERCERIZA S.R.L</option>
                            <option value="OTRO">OTRO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Jornada</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="FULL TIME">FULL TIME</option>
                            <option value="PART TIME">PART TIME</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Turno</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="MAÑANA">MAÑANA</option>
                            <option value="TARDE">TARDE</option>
                            <option value="NOCHE">NOCHE</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Fecha de Inicio</label> 
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-white">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Area</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="">PLANEAMIENTO Y CONTROL</option>
                            <option value="">OPERACIONES</option>
                            <option value="">GESTION DE TALENTO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>SubArea</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="">ANALISTAS</option>
                            <option value="">VALIDACION</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Segmentación</label>
                          <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="">STAFF</option>
                            <option value="">ESTRUCTURA</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Servicio Asociado</h6>
                    <div>
                      <a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR SERVICIO</a>
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    <div id="formaddServicio" class="">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label>Cliente</label>
                          <select name="" id="" class="form-control">
                            <option value="">CLARO</option>
                            <option value="">ONCOSALUD</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Campaña</label>
                          <select name="" id="" class="form-control">
                            <option value="">PORTABILIDAD</option>
                            <option value="">RENOVACION ESPECIAL</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Fecha de Inicio</label> 
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-white">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Experiencias Laborales</h6>
                    <div>
                      <a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR EXPERIENCIA</a>
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Educación</h6>
                    <div>
                      <a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR ESTUDIO</a>
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Idiomas</h6>
                    <div>
                      <a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR IDIOMA</a>
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                    <h6 class="text-uppercase mb-0">Conocimientos y Habilidades</h6>
                    <div>
                      <a href=""><i class="fas fa-plus-circle text-success"></i> AGREGAR CONOCIMIENTO</a>
                    </div>
                    </div>
                  </div>
                  <div class="card-body">                           
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>  
    <!--termina nuevo empleado-->
   