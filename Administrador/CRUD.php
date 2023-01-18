<?php include('../conexion/conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <!-- <link rel="stylesheet" href="css/styles_CRUD.css"> -->
    <link rel="stylesheet" href="../bootstrap.trabajo/css/bootstrap.min.css">
    <link rel="icon" href="../img/icon_page.png">
</head>
<body>

<!--  -->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg" style="background-color: #57a639; margin: left 50%; color:white ;" >
      <div class="container px-12">
          <a class="navbar-brand" href="#" style="color: white;"><img src="../img/logo_sena_blanco.png" height="50" alt="Logo de la pagina"></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active"  style="color: white;" aria-current="page" href="index.php">Inicio</a></li>
                  <!-- ks -->
                  <li class="nav-item"><a class="nav-link" style="color: white;" href="Pages/articulos.php">Articulos</a></li>
                  <li class="nav-item"><a class="nav-link" style="color: white;" href="Pages/añadirRoles.php">Roles</a></li>
              </ul>
          </div>
      </div>
      <a style="margin-right:15px;" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="../configuracion/cambiar_contraseña.php">Cambiar contraseña</a></li> 
          <li><hr class="dropdown-divider" /></li>
          <li><a class="dropdown-item" href="../php/cerrar_sesion.php">Cerrar Sesión</a></li>
      </ul>
  </nav>
  
    <div class="container" style="margin-top:5%;">
    <h1>Registro de usuarios</h1>
      <div class="col-sm-12 col-sm-offset-2">
    <!-- <a href="#addnew" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a> -->
      

      
    
    <table class="table table-hover ">
        <thead>
            <tr>
              <th scope="col">Documento</th>
              <th scope="col">Nombres</th>
              <th scope="col">Apellidos</th>
              <th scope="col">E-mail</th>
              <th scope="col">Rol</th>
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
              <?php
                /* $sql= "SELECT `usuario`.`id`, login.`usuario` AS Usuario, `usuario`.`nombres`,`usuario`.`apellidos`,`usuario`.`tipoDoc`,`usuario`.`Doc`,`usuario`.`Rol` FROM usuario INNER JOIN login ON `usuario`.`id_login`=login.`id`"; */
                $sql= "SELECT *,roles.`descripcion` AS Roles FROM persona INNER JOIN roles ON `persona`.`rol`= roles.`id`";
                $query = mysqli_query($conexion,$sql);
                while($rs = mysqli_fetch_array($query)){
                  $id = $rs['id'];
                  $id_rol = $rs['rol'];
                  $rol_name = $rs['Roles'];
                }
                $SQL2 = "SELECT *,persona.id AS id_persona,roles.`descripcion` AS Roles FROM persona INNER JOIN roles ON `persona`.`rol`= roles.`id` WHERE rol='1' OR rol='2';";
                $query2 = mysqli_query($conexion,$SQL2);
                while($mostrar = mysqli_fetch_array($query2)){

              ?>
            <tr>
              <td><?php echo $mostrar['documento'] ?></td>
              <td><?php echo $mostrar['nombre'] ?></td>
              <td><?php echo $mostrar['apellido'] ?></td>
              <td><?php echo $mostrar['correo'] ?></td>
              <td><?php echo $mostrar['Roles'] ?></td>
              <?php if ($mostrar['Roles']=="administrador") {?>
                <td>
                  <a href="#" class="btn btn-secondary" readonly>No Disponible</a>
                </td>
              <?php }else{ ?>
                <td>
                  <a href="" class="btn btn-danger borrar" borrar-id="<?php echo $mostrar['id_persona'] ?>"> <span class="glyphicon glyphicon-trash"></span> Borrar</a>
                </td>
              <?php }?>
            </tr>
            <?php
            }
            ?>
           
          </tbody>
          
      </table>
      <!-- <button class="btn btn-primary">Agregar usuario</button> -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Insertar Registro
      </button>
      <!-- <a class="btn btn-primary" href="../crud-registro/dist/dashboard.php" role="button">Ir a la Pagina Principal</a> -->
      </div>
    </div>

  
    
    <?php include('include/modal.php');//include('include/AgregarModal.php');?>
    <script src="../bootstrap.trabajo/js/bootstrap.min.js"></script>
    <script>
      const myModal = document.getElementById('myModal')
      const myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })
    </script>
    <!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script>
        initSalida();
        function initSalida() {
            $(".borrar").click(function(e) {
                e.preventDefault();
                var id = $(this).attr("borrar-id");
                var boton = $(this)[0];
                boton.blur();

                if (confirm("¿Esta seguro que desea borrar a está persona?")) {
                    $.ajax({
                        type: "POST",
                        url: "php/borrar_crud.php",
                        data: 'id='+id,
                        success: function(data){
                            alert(data, 1);
                            window.location.reload();
                        }
                    });
                }          
            });
        }
    </script>
</body>
</html>