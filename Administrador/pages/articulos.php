<?php session_start();
include('../../php/validar_sesion.php');
include('../../CRUD-REGISTRO/dist/php/datetime.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro de articulos</title>
        <link rel="icon" href="../../img/icon_page.png">
        <link rel="stylesheet" href="../../CRUD-REGISTRO/dist/styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../CRUD-REGISTRO/dist/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../bootstrap.trabajo/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- jQuery -->
    <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
  
    <!-- DataTables CSS -->
    <link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  
    <!-- DataTables JS -->
    <script src=
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
    </script>
    <!-- Estilos de la caja xD -->    
    <style>
        .submit-hv:hover{
            background-color: #47a386;
        }
    </style>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg" style="background-color: #57a639; margin: left 50%; color:white ;" >
                <div class="container px-12">
                    <a class="navbar-brand" href="#" style="color: white;"><img src="../../img/logo_sena_blanco.png" height="50" alt="Logo de la pagina"></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" style="color: white;" href="../index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link active"  style="color: white;" aria-current="page" href="../CRUD.php">Personal</a></li>
                            <li class="nav-item"><a class="nav-link active"  style="color: white;" aria-current="page" href="añadirRoles.php">Rol</a></li>
                        </ul>
                    </div>
                </div>
                <a style="margin-right:15px;" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../configuracion/cambiar_contraseña.php">Cambiar contraseña</a></li> 
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../../php/cerrar_sesion.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
            <!-- Aqui va el resto del codigo, tablas etc -->
            <br><br>
        <h1 class="text-center">Control de articulos</h1>
        <div class="col-lg-11" style="margin-left:5rem;">
            <div class="tablita dataTable-container mt-5">
                <div class="row">
                    <form method="POST">
                        <div class="col-lg-2">
                            <label>Fecha:</label>
                            <input type="date" name="fecha" id="fecha" onchange="mandarFecha()" value="<?php echo $fecha ?>">
                        </div>
                    </form>
                </div>
                <div id="mostrar-tabla">

                </div>
            </div>
        </div>
                    




        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="../../bootstrap.trabajo/js/bootstrap.min.js"></script>
        <script>
            // Initialize the DataTable
            $(document).ready(function () {
                $('#example').DataTable({    
                    // Enable the searching
                    // of the DataTable
                    //searching: true
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });
            });
        </script> 
        <script>
            $( document ).ready(function() {

                //php/buscarfecha.php
                $("#fecha").on("change", mandarFecha);
                mandarFecha();
                function mandarFecha() {
                    let fecha = $('#fecha').val();
                        $.ajax({
                            type: "POST",
                            url: "../php/buscarfecha.php",
                            data: {
                                'fecha': fecha,
                            },
                            success: function(data){
                                $("#mostrar-tabla").html(data);
                            }
                        });
                    }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="../../data-table/datatables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    </body>
</html>
