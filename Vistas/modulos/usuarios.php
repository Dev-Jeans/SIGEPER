    <!--inicia seccion usuarios-->
    <div class="container-fluid px-xl-5">
    <section class="py-5">
            <div class="row">
              <div class="col-12 text-center text-lg-left">
                  <div class="form-group">       
                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#crearUsuario">Nuevo usuario</button>
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
                          <th>Nombres</th>
                          <th>Usuario</th>
                          <th>Foto</th>
                          <th>Perfil</th>
                          <th>Estado</th>
                          <th>Ultima Conexión</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                        $item = null;
                        $valor = null;
                        $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

                        foreach ($usuarios as $key => $value) {

                        echo '<tr>
                                <th scope="row">'.($key+1).'</th>
                                <td>' . $value["NOMBRES"] . '</td>
                                <td>' . $value["USUARIO"] . '</td>';

                                if ($value["FOTO"] != "") {
                                  
                                  echo '<td><img src="' . $value["FOTO"] . '" class="rounded-circle" alt="" width="35px"></td>';
                                }else{

                                  echo '<td><img src="Vistas/img/usuarios/default/anonymous.png" class="rounded-circle" alt="" width="35px"></td>';

                                }

                        echo ' <td>' . $value["PERFIL"] . '</td> ';

                                if ($value["ESTADO"] == "ACTIVO") {

                                  echo ' <td><button class="btn btn-success btn-sm btnActivar" idUsuario="'.$value["ID_USUARIO"].'" estadoUsuario="DESACTIVO">' . $value["ESTADO"] . '</button></td>';

                                }else {
                                  
                                  echo ' <td><button class="btn btn-danger btn-sm btnActivar" idUsuario="'.$value["ID_USUARIO"].'" estadoUsuario="ACTIVO">' . $value["ESTADO"] . '</button></td>';

                                }

                                
                        echo ' <td>' . $value["ULTIMO_LOGIN"] . '</td>
                                <td>
                                  <div class="btn-group">
                                  <button class="btn btn-warning btn-sm btnEditarUsuario" idUsuario="'.$value["ID_USUARIO"].'" data-toggle="modal" data-target="#editarUsuario"><i class="far fa-edit"></i></button>
                                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarUsuario"><i class="fa fa-times"></i></button>
                                  </div>
                                </td>
                              </tr>';
                          

                        }
                        
                        ?>
                        
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
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Nuevo Usuario</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Complete los campos para registrar al nuevo usuario</p>
          
              <div class="form-group">
                <label>Usuario</label>
                <input type="text" placeholder="Usuario" id="nuevoUsuario" name="nuevoUsuario" class="form-control" required>
              </div>
              <div class="form-group">       
                <label>Contraseña</label>
                <input type="password" placeholder="Contraseña" name="nuevoPassword" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Perfil</label>
                  <div class="select">
                    <select class="form-control" name="nuevoPerfil" required>
                      <option value="" class="text-secondary">---SELECCIONE---</option>
                      <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                      <option value="CAPACITADOR">CAPACITADOR</option>
                      <option value="SUPERVISOR">SUPERVISOR</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label for="nuevaFoto">Subir Foto</label>
                <input type="file" class="form-control-file nuevaFoto" name="nuevaFoto">
                <p>Peso máximo de la foto 2MB</p>
                <img src="Vistas/img/usuarios/default/anonymous.png" class="previsualizar" alt="..." width="100px">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="submit" class="btn btn-primary">Crear usuario</button>
          </div>
          <?php

            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();

          ?>
          </form>
        </div>
      </div>
    </div>
    <!--Termina Modal nuevo-->
    <!--Inicia Modal editar-->
    <div id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Editar Usuario</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Editar datos del usuario</p>
              <div id="editarContenido">
                
              </div>
              <div class="form-group">
                <label for="nuevaFoto">Subir Foto</label>
                <input type="file" class="form-control-file nuevaFoto" name="editarFoto">
                <p>Peso máximo de la foto 2MB</p>
                <img src="Vistas/img/usuarios/default/anonymous.png" class="previsualizar" alt="..." width="100px">
                <div id="contFoto">
                  
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="submit" class="btn btn-primary">Guardar cambio</button>
          </div>
          <?php

            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();

          ?>
          </form>
        </div>
      </div>
    </div>
    <!--Termina Modal editar-->
    <!--Inicia Modal eliminar-->
    <div id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
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
