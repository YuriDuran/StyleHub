<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Informacion General</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="../Style/admin/bootstrap.min.css" rel="stylesheet">
    <link href="../Style/admin/bootstrap-icons.css" rel="stylesheet">
    <link href="../Style/admin/boxicons.min.css" rel="stylesheet">
    <link href="../Style/admin/quill.snow.css" rel="stylesheet">
    <link href="../Style/admin/quill.bubble.css" rel="stylesheet">
    <link href="../Style/admin/remixicon.css" rel="stylesheet">
    <link href="../Style/admin/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../Style/admin/pag_principal_a.css" />



</head>

<?php

$cerrar = "../logica/cerrar_sesion.php";

?>


<body>
    <?php
    require_once '../function.php';

    $id = $_GET['id'];
    $query = "SELECT id_pyme FROM pyme";

    $sql_pyme = "SELECT * FROM pyme WHERE estado_afi =" . $id;
    $resultado2 = mysqli_query($conexion, $sql_pyme);

    $sql = "SELECT * FROM usuarios WHERE id_usuario =" . $id;
    $resultado = mysqli_query($conexion, $sql);

    $resultado_pyme = mysqli_query($conexion, $sql_pyme);
    $xd = mysqli_query($conexion, $sql);

    if ($resultado_pyme && mysqli_num_rows($resultado_pyme) > 0) {
        // Obtén la ID de la PYME asociada
        $pyme = mysqli_fetch_assoc($resultado_pyme);
        $id_pyme = $pyme['id_pyme'];

        // Consulta para obtener los productos de la PYME
        $ropa = "SELECT * FROM productos WHERE id_pyme = $id_pyme";
        $resultado3 = mysqli_query($conexion, $ropa);
    } else {
        $resultado3 = null; // No hay PYME asociada al usuario
    }

    ?>


    <header id="header" class="header fixed-top d-flex align-items-center ">
        <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <a hhref="pag_principal_a.php?id=<?php echo htmlspecialchars($id); ?>" class="logo d-flex align-items-center">
                <img src="index.php" alt="">
                <span class="d-none d-lg-block tit-logo">Style<span class="text-blank tit-logo">Hub</span></span>
            </a>

        </div>


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>



                <li class="nav-item dropdown pe-3">
                    <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../img/icon.png" alt="Profile" class="rounded-circle" />
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $filas['correo'] ?></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header ">
                                <h6 class=""><?php echo $filas['nombre'] ?> <?php echo $filas['apellidos'] ?></h6>
                                <span>Pyme</span>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center " href="https://api.whatsapp.com/send/?phone=56921908673&text=Hola+tengo+dudas.&type=phone_number&app_absent=0">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Necesitas Ayuda?</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center " href="<?php echo $cerrar ?>">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Cerrar Sesión</span>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </li>

            </ul>
        </nav>

    </header>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="pag_principal_a.php?id=<?php echo htmlspecialchars($id); ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Paginas</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="pag_principal_a.php?id=<?php echo htmlspecialchars($id); ?>">
                    <i class="bi bi-house-door"></i><span>Pagina Inicio</span></i>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="pedidos_p.php?id=<?php echo htmlspecialchars($id); ?>">
                <i class="bi bi-bag-check"></i><span>Pedidos</span></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Prendas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="registro-prenda.php?id=<?php echo htmlspecialchars($id); ?>">
                            <i class="bi bi-circle"></i><span>Registrar</span>
                        </a>
                    </li>
                    <li>
                        <a href="editar_prenda.php?id=<?php echo htmlspecialchars($id); ?>">
                            <i class="bi bi-circle"></i><span>Editar Prenda</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>


    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Prendas / Editar y Eliminar</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Prendas</a></li>
                    <li class="breadcrumb-item active">Editar prendas</li>
                </ol>
            </nav>
            <div class="col-md-1">
                <?php while ($sos = mysqli_fetch_assoc($xd)) { ?>
                    <label for="id" class="form-label"></label>
                    <input type="hidden" id="id" name="id" class="form-control" placeholder="<?php echo $sos['id_usuario'] ?>" value="<?php echo $sos['id_usuario']; ?>" readonly required>
                <?php } ?>
            </div>
        </div>

        <section class="section dashboard">

            <h2>Prendas Registradas</h2>

            <div class="container marketing">

                <div class="row">
                    <div class="col-md-4 ">

                    </div>

                    <div class="col-md-4 text-center">
                        <p><a class="btn btn-secondary botones" style="background-color: rgb(116, 80, 44);"
                                href="registro-prenda.php?id=<?php echo htmlspecialchars($id); ?>">Añadir Prenda
                            </a></p>
                    </div>

                    <div class="col-md-4 ">

                    </div>
                </div>


            </div>
            <div class="row" style="padding: 10px 0;">
                <div class="col-12">
                    <div class="row">
                        <?php while ($filas = mysqli_fetch_assoc($resultado3)) { ?>
                            <div class="col-md-3">
                                <div class="card" style="height: 100%; width: 100%; margin: 5px px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark "><b>Prenda: </b><?php echo $filas['nombre'] ?> </h5>
                                        <img class="bd-placeholder-img card-img-top bordej" width="100px" height="200px"
                                            src="../  " role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                            fill="#eceeef" dy=".3em"></text>
                                        </img>
                                        <p class="card-text text-center"><b>Tipo:</b> </p>
                                        <p class="card-text text-center"><b>Estado:</b> </p>
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <a class="btn btn-secondary" style="background-color: rgb(116, 80, 44);"
                                                    href="vista_edit.php?id=<?php echo htmlspecialchars($filas['id_producto']); ?>&id_usuario=<?php echo htmlspecialchars($id); ?>">Editar ✏️</a>
                                            </div>

                                            <div class="col-md-6 text-center">
                                                <a class="btn btn-secondary" style="background-color: #000;"
                                                    onclick="alerta_eliminar(<?php echo $filas['id_producto']; ?>)">Borrar 🧹</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>HomeAdviser</span></strong>. Todos los derechos reservados
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../js/admin/apexcharts.min.js"></script>
    <script src="../js/admin/bootstrap.bundle.min.js"></script>
    <script src="../js/admin/chart.umd.js"></script>
    <script src="../js/admin/echarts.min.js"></script>
    <script src="../js/admin/quill.min.js"></script>
    <script src="../js/admin/simple-datatables.js"></script>
    <script src="../js/admin/tinymce.min.js"></script>
    <script src="../js/admin/validate.js"></script>
    <script src="../js/admin/validacion-form.js"></script>
    <script src="../js/admin/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>