

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
require_once '../function.php'; 

?>

<body>
  <?php
    
    $id = $_GET['id'];
    $cerrar = "logica/cerrar_sesion.php";
    $sql ="SELECT * FROM usuarios WHERE id_usuario =" . $id;
    $resultado = mysqli_query($conexion, $sql, $p);
    $p ="SELECT * FROM pyme";
  ?>


  <header id="header" class="header fixed-top d-flex align-items-center bg-black">
    <div class="d-flex align-items-center justify-content-between">
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a href="{% url 'prinadmin' %}" class="logo d-flex align-items-center">
            <img src="{% static 'Principal/img/admin/logo-ha.jpg' %}" alt="">
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
                    <img src="{{ f.fotoAsesora.url }}" alt="Profile" class="rounded-circle" />
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $filas['correo'] ?></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header ">
                        <h6 class=""><?php echo $filas['nombre'] ?> <?php echo $filas['apellidos'] ?></h6>
                        <span>Rol: Administrador</span>
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


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{% url 'prinadmin' %}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Paginas</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{% url 'inicio' %}">
          <i class="bi bi-house-door"></i><span>Pagina Inicio</span></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{% url 'generar_contrato' %}">
          <i class="bi bi-card-list"></i><span>Contratos</span></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Asesoras</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{% url 'registro_asesora' %}">
              <i class="bi bi-circle"></i><span>Registrar Asesora</span>
            </a>
          </li>
          <li>
            <a href="{% url 'aprobar_solicitud' %}">
              <i class="bi bi-circle"></i><span>Solicitud Asesora</span>
            </a>
          </li>
          <li>
            <a href="{% url 'editar_ase' %}">
              <i class="bi bi-circle"></i><span>Editar Asesora</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  <!-- Fin Sidebar-->

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
          <div class="row">

            <!-- Mejor evaluada -->
            <div class="col-lg-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><b>Asesora mejor evaluada</b></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-star text-warning"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{mejor_asesora_nombre}}</h6>
                      
                      <span class="text-muted small">Promedio:<b> {{mejor_promedio}} </b></span>
                      <br>
                      <span class="text-warning small pt-1 fw-bold">
                        {% if prom_entero == 0 %}
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          {% elif prom_entero == 1 %}
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          {% elif prom_entero == 2 %}
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          {% elif prom_entero == 3 %}
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          {% elif prom_entero == 4 %}
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          {% elif prom_entero == 5 %}
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          {% endif %}
                      </span>
                      <span class="text-muted small pt-2 ps-1">evaluación</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Fin Mejor evaluada -->

            <!-- Conteo clientes  -->
            <div class="col-xxl-4 col-md-4">
              
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> <b>Clientes</b> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Registrados</h6>
                      <span class="text-muted small pt-2 ps-1">Cantidad: <b>{{ conteo1 }}</b></span>
                      <br>
                      <span class="text-muted small pt-2 ps-1"> <b>En aumento</b> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Conteo Clientes -->

            <!-- Conteo Asesoras  -->
            <div class="col-xxl-4 col-md-4">
              
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> <b>Asesoras</b> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Contratadas</h6>
                      <span class="text-muted small pt-2 ps-1">Cantidad : <b>{{ conteo }}</b></span>
                      <br>
                      <span class="text-muted small pt-2 ps-1"> <b>incrementando</b> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Conteo Asesoras -->

            <!-- Tabla de asesoras -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title fw-bold">
                    Pymes <span>| Registradas</span>
                  </h5>

                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Sueldo</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php while($filas = mysqli_fetch_assoc($resultado)){ ?>
                      <tr>
                        <th scope="row" class="py-2 "><a href="#">34</a></th>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td>
                          <a href="#" class="text-primary fw-bold"><?php echo $filas['direccion'] ?></a>
                        </td>
                        <td><?php echo $filas['comision'] ?></td>
                        <td>
                          {% if a.disponibilidad == 'Disponible' %}
                          <span class="badge bg-success">Disponible</span>
                          {% elif a.disponibilidad == 'No disponible' %}
                          <span class="badge bg-danger">No disponible</span>
                          {% endif %}
                        </td>
                        <td class="text-center">
                          {% if a.disponibilidad == 'No disponible' %}
                          <a href="{% url 'habilitar' a.id_asesora %}" type="button" class="btn btn-success"
                            data-bs-toggle="modal" data-bs-target="#modal-hab-{{ forloop.counter }}">Habilitar
                            <span><i class="bi bi-check-circle"></i></span>
                          </a>

                          {% elif a.disponibilidad == 'Disponible' %}
                          <a href="{% url 'deshabilitar' a.id_asesora %}" type="button" class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#modal-des-{{ forloop.counter }}">Deshabilitar
                            <span><i class="bi bi-x-circle"></i></span></a>
                          
                        </td>
                      </tr>
                    <?php } ?>
                      <!-- Fin Tabla de asesoras -->

                      <!-- Modal asesora habilitada -->
                      <div class="modal fade" id="modal-hab-{{ forloop.counter }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Asesora
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                              <i class="fas fa-check-circle text-success pb-3" style="font-size: 5rem!important;"></i>
                              <h5 class="text-success">Asesora Habilitada.</h5>
                            </div>
                            <div class="modal-footer">
                              <a href="{% url 'habilitar' a.id_asesora %}"><button type="button"
                                  class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal asesora deshabilitada -->
                      <div class="modal fade" id="modal-des-{{ forloop.counter }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Asesora
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                              <i class="fas fa-times-circle text-danger pb-3" style="font-size: 5rem!important;"></i>
                              <h5 class="text-danger">Asesora Deshabilitada.</h5>
                            </div>
                            <div class="modal-footer">
                              <a href="{% url 'deshabilitar' a.id_asesora %}"><button type="button"
                                  class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Fin modal -->
                      {% endfor %}
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
                    Clientes <span>| Registrados</span>
                  </h5>

                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Info familia</th>
                        <th scope="col">Info mascotas</th>
                        <th scope="col" class="text-center">Fecha de registro</th>
                      </tr>
                    </thead>
                    <tbody>
                      {% for c in clientes %}
                      <tr>
                        <th scope="row" class="py-2 "><a href="#">{{ c.id_cliente }}</a></th>
                        <td>{{ c.id_usuario.nombres }}</td>
                        <td>
                          <a href="#" class="text-primary fw-bold">{{ c.id_usuario.direccion }}</a>
                        </td>
                        <td> {{ c.num_personas }}</td>
                        <td> {{ c.info_mascotas }} </td>
                        <td class="text-center"> {{ c.fecha_registro }}</td>
                      </tr>
                      
                      <!-- Fin Tabla de asesoras -->

                      {% endfor %}
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
      &copy; Copyright <strong><span>HomeAdviser</span></strong>. Todos los derechos reservados
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