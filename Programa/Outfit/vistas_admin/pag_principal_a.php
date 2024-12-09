

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

  <link rel="stylesheet" href="../Style/admin/pag_principal_a.css" />



</head>

<?php
$cerrar = "../logica/cerrar_sesion.php";
?>

<body>
  <?php
    require_once '../function.php';
    
    $id = $_GET['id'];
    
    $estado = isset($_GET['estado']) ? mysqli_real_escape_string($conexion, $_GET['estado']) : '';

    $sql_pyme = "SELECT * FROM pyme WHERE estado_afi =" . $id;
    $resultado2 = mysqli_query($conexion, $sql_pyme);

    $sql ="SELECT * FROM usuarios WHERE id_usuario =" . $id;
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

    $resultado_pyme2 = mysqli_query($conexion, $sql_pyme);
    $xd2 = mysqli_query($conexion, $sql);

    if ($resultado_pyme2 && mysqli_num_rows($resultado_pyme2) > 0) {
      // Obtén la ID de la PYME asociada
      $pyme = mysqli_fetch_assoc($resultado_pyme2);
      $id_pyme = $pyme['id_pyme'];
    
      // Consulta para obtener los productos de la PYME
      $ropa = "SELECT * FROM productos WHERE id_pyme = $id_pyme";
      $resultado4 = mysqli_query($conexion, $ropa);
    } else {
      $resultado4 = null; // No hay PYME asociada al usuario
    }

    
 
  ?>


  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a href="pag_principal_a.php?id=<?php echo htmlspecialchars($id); ?>" class="logo d-flex align-items-center">
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
              <?php while($filas = mysqli_fetch_assoc($resultado)){ ?>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="../img/icon.png" alt="Profile" class="rounded-circle" />
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $filas['correo'] ?></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header ">
                    <?php while($filas = mysqli_fetch_assoc($resultado2)){ ?>
                        <h6 class=""><?php echo $filas['nom_pyme']?></h6>
                        <span>Pyme</span>
                    <?php } ?>
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
                        <a class="dropdown-item d-flex align-items-center " href="<?php echo $cerrar?>">
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

   <!-- Titulo de pagina -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <!-- Fin titulo de pagina -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
         

            <!-- Fin Mejor evaluada -->

            <!-- Conteo clientes  -->
            <div class="col-xxl-6 col-md-6">
              
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> <b>Ventas</b> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Registradas</h6>
                      <span class="text-muted small pt-2 ps-1">Cantidad: <b>100</b></span>
                      <br>
                      <span class="text-muted small pt-2 ps-1"> <b>En aumento</b> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Conteo Clientes -->

    
          

            <!-- Tabla de asesoras -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title fw-bold">
                    Modelado <span>| Aprobación</span>
                  </h5>

                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Estado</th>
           
                      </tr>
                    </thead>
                    <tbody>
                    <?php while($filas = mysqli_fetch_assoc($resultado3)){ ?>
                      <tr>
                        <th scope="row" class="py-2 "><?php echo $filas['id_producto'] ?></th>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['talla'] ?></td>
                        <td>
                        <?php
                          if ($filas['estado'] == '2'){
                            echo '<span class="badge bg-success">Disponible</span>';

                          } elseif ($filas['estado'] == '1') {
                            echo '<span class="badge bg-danger">No disponible</span>';
                          }                        
                        ?>
                        </td>
                      
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>

            
                </div>
              </div>
            </div>

            <!-- Tabla de Clientes -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title fw-bold">
                    Prendas <span>| Registradas</span>
                  </h5>

                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Color</th>
                        <th scope="col">Publicación</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($gatito = mysqli_fetch_assoc($resultado4)){ ?>
                        <tr>
                          <td><?php echo $gatito['id_producto'] ?></td>
                          <td><?php echo $gatito['nombre'] ?></td>
                          <td>$<?php echo $gatito['precio'] ?></td>       
                          <td><?php echo $gatito['stock'] ?></td>
                          <td><?php echo $gatito['genero'] ?></td>
                          <td> <?php echo $gatito['color'] ?></td>
                          <td> <?php echo $gatito['fech_publicación'] ?></td>
                        </tr>  
                      <?php } ?>
                                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>



      </div>
    </section>
  </main>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>StyleHub</span></strong>. Todos los derechos reservados
    </div>

  </footer>
  <!-- ======= Fin Footer ======= -->

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
  <script src="../js/admin/main.js"></script>
  <script src="https://kit.fontawesome.com/dac10f1627.js" crossorigin="anonymous"></script>

</body>

</html>