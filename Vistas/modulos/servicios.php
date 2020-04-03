    <!--inicia seccion usuarios-->
    <div class="container-fluid px-xl-5">
    <section class="py-5">
            <div class="row">
              <div class="col-12 text-center text-lg-left">
                  <div class="form-group">       
                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#crearUsuario">Nuevo servicio</button>
                  </div>
              </div>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <!--<div class="card-header">
                    <h6 class="text-uppercase mb-0">Striped table with hover effect</h6>
                  </div>-->
                  <div class="card-body">                           
                    <table class="table table-striped table-bordered dt-responsive nowrap tablas text-center" style="width:100%; font-size: 12px;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Campaña</th>
                          <th>Cliente</th>
                          <th>Fecha de Registro</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>RENOVACIÓN ESPECIAL</td>
                          <td>AMERICA MOVIL DEL PERU S.A</td>
                          <td>2020-03-25 00:00:00</td>
                          <td><button class="btn btn-success btn-sm">ACTIVO</button></td>
                          <td>
                            <div class="btn-group">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>  
    <!--termina seccion usuarios-->
    <!--Inicia Modal nuevo-->
    <div id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="POST">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Nuevo Cliente</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Registro de nuevo cliente</p>
          
              <div class="form-group">
                <label>R.U.C O Documento de Identidad</label>
                <input type="text" placeholder="RUC o DNI" class="form-control">
              </div>
              <div class="form-group">       
                <label>Razon Social</label>
                <input type="text" class="form-control" readonly>
              </div>
              <div class="form-group">       
                <label>Domicilio</label>
                <input type="text" class="form-control" readonly>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="button" class="btn btn-primary">Guardar cliente</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--Termina Modal nuevo-->
    <!--Inicia Modal editar-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <form>
              <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">       
                <label>Password</label>
                <input type="password" placeholder="Password" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!--Termina Modal editar-->
    <!--Inicia Modal eliminar-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <form>
              <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">       
                <label>Password</label>
                <input type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">       
                <input type="submit" value="Signin" class="btn btn-primary">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!--Termina Modal eliminar-->





