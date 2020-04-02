<div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5">
              <div id="LottieContainerLogin"></div>
            </div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Sistema de Administracion de Personal</h1>
            <h2 class="mb-4">Bienvenido!</h2>
            <p class="text-muted text-justify">SYSAP, nos permite procesar la información adecuadamente para tomar decisiones oportunas de manera eficiente y eficaz.</p>
            <form id="loginForm" method="POST" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="username" placeholder="Usuario" class="form-control border shadow-lg form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Contraseña" class="form-control border shadow-lg form-control-lg text-violet">
              </div>
              <button type="submit" class="btn btn-primary shadow px-5">Iniciar Sesión</button>

            <?php
              $login = new ControladorUsuarios();
              $login -> ctrIngresoUsuario();
            ?>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">Diseñado por <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Team Developer</a> & 3eriza</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    