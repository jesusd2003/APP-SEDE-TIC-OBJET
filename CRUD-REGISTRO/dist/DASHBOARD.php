<?php 
session_start();
$nombreCompleto = $_SESSION['nombre_ingreso']." ".$_SESSION['apellido_ingreso'];
$doc = null;$nombre = null;$apellido = null;$rol = null;$id_rol = null;$documentos=null;
if(!empty($_SESSION['documento']) && !empty($_SESSION['documentos']) && !empty($_SESSION['nombre']) && !empty($_SESSION['apellido']) && !empty($_SESSION['roless']) && !empty($_SESSION['id_rol'])){
    $doc = $_SESSION['documento'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $rol = $_SESSION['roless'];
    $id_rol = $_SESSION['id_rol'];
    $documentos = $_SESSION['documentos'];
}
include('../../php/validar_sesion.php');
include('php/datetime.php');
?>
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
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/responsive.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../bootstrap.trabajo/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Estilos de la caja xD -->    
    <style>
        .submit-hv:hover{
            background-color: #47a386;
        }
    </style>
    </head>
    <body class="sb-nav-fixed" onload="mandarFecha();">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #57a639;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-2" href="#" style="color: white;"><img src="../../img/logo_sena_blanco.png" height="60" alt="Logo de la pagina" /></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

                <a  style="margin-right:15px; margin-left:85%; color:white;" class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../configuracion/cambiar_contraseña.php">Cambiar Contraseña</a></li> 
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../../php/cerrar_sesion.php">Cerrar Sesión</a></li>
                </ul>
        </nav>
        <div id="layoutSidenav" style="display: flex;align-items: center;justify-content: center;"> 
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:#57a639;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color: white;">INICIO</div>
                            <a style="color: white;" class="nav-link" href="inicio.php">
                                <div class="sb-nav-link-icon" style="color: white;"><i class="fas fa-tachometer-alt"></i></div>
                                INICIO
                            </a>    
                            <div class="sb-sidenav-menu-heading" style="color: white;">Principal</div>
                            <a class="nav-link" href="#" style="color: white;">
                                <div class="sb-nav-link-icon" style="color: white;"><i class="fas fa-chart-area"></i></div>
                                Registro de Articulos
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="standar">Conectado como: <br> <?php echo $nombreCompleto."."; ?></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div class="container-fluid px-12ks">
                    <div class="row">
                        <div class="caja"> 
                            <div class="col-lg-12">
                                <header class="header" id="header">
                                    <figure class="logo">
                                    <img src="images/icon_page.png" height="60" alt="Logo de la pagina" />
                                    </figure>
                                    <h3 class="mt-4 text-start">Registro de articulos</h3>   
                                </header>
                                <br>
                                <div class="containter-fluid" >
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" placeholder="Documento" name="documento" id="document" value="<?php echo $doc?>">
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" id="buscar" onclick="" class="submit submit-hv buscar_doc" style="border-radius:10px;">Buscar</button>
                                                <!-- <input type="submit" name="submit" id="buscar" value="buscar" class="submit submit-hv"style="border-radius:10px;"> -->
                                            </div>
                                        </div>
                                    </form><br>
                                    <div id="register"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tablita dataTable-container">
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
                            <div style="margin-top:9%;">
                                <footer class="py-4 bg-light mt-auto">
                                    <div class="container px-12">
                                        <div class="d-flex align-items-center justify-content-between standar">
                                            <div class="text-muted">Copyright &copy; Hecho por Jesús Rueda y Jesús Mosquera</div>
                                            <div>
                                                <a href="#">Privacy Policy</a>
                                                &middot;
                                                <a href="#">SENA</a>
                                                &middot;
                                                <a href="#">Terms &amp; Conditions</a>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="../../data-table/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

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
        ejecutar();
        function ejecutar(){
            $(".buscar_doc").click(function(e) {
                let doc = $('#document').val();                  
                
                $.ajax({
                    type: 'POST',
                    url: 'php/codigo_php.php',
                    data: {
                        'documento' : doc,
                    },
                    success: function(data){
                        $("#register").html(data);
                    }
                });
            });
        }
                                      
    </script>
    <script>
        initSalida();
        function initSalida() {
            $(".enviar").click(function(e) {
                e.preventDefault();
                var id = $(this).attr("id-articulo");
                var boton = $(this)[0];
                boton.blur();

                if (confirm("¿Esta seguro que desea darle salida a la persona?")) {
                    $.ajax({
                        type: "POST",
                        url: "php/salida.php",
                        data: 'id_articulos='+id,
                        success: function(data){
                            alert(data, 1);
                            window.location.reload();
                        }
                    });
                }          
            });
        }
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
                        url: "php/buscarfecha.php",
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
    </body>
</html>
