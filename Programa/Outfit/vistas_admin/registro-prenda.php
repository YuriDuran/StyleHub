<?php
require_once '../function.php'; 

// Consulta para obtener las categorías
$query = "SELECT id_categoria, nombre_categoria FROM categorias";
$resultado2 = $conexion->query($query);

$cerrar = "../logica/cerrar_sesion.php";

$id = $_GET['id'];
$sql_pyme = "SELECT * FROM pyme WHERE estado_afi =" . $id;
$resultado3 = mysqli_query($conexion, $sql_pyme);
$sql ="SELECT * FROM usuarios WHERE id_usuario =" . $id;
$resultado = mysqli_query($conexion, $sql);

$xd = mysqli_query($conexion, $sql);
?>



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

<body>

    <header id="header" class="header fixed-top d-flex align-items-center bg-black">
        <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <a href="{% url 'prinadmin' %}" class="logo d-flex align-items-center">
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
                        <img src="{{ f.fotoAsesora.url }}" alt="Profile" class="rounded-circle" />
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
                <a class="nav-link collapsed" href="{% url 'prinadmin' %}">
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
                        <a href="{% url 'aprobar_solicitud' %}">
                        <i class="bi bi-circle"></i><span>Solicitud</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'editar_ase' %}">
                        <i class="bi bi-circle"></i><span>Editar Prenda</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>


    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Asesoras</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Asesoras</a></li>
                    <li class="breadcrumb-item active">Registro Asesora</li>
                </ol>
            </nav>
        </div>


        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Formulario de Registro</h5>
                            <hr class="mt-0">


                            <form action="../logica/cargar_product.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Nombre del prodcuto -->
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre del producto</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    </div>
                                    <!-- Categoria del producto -->
                                    <div class="col-md-6">
                                        <label for="categoria" class="form-label">Categoria del producto</label>
                                        <select name="categoria" id="categoria" class="form-select" required>
                                            <option value="">Elegir categoría...</option>
                                            <?php
                                            // Llenar el select con las categorías
                                            while ($fila = $resultado2->fetch_assoc()) {
                                                echo "<option value='" . $fila['id_categoria'] . "'>" . $fila['nombre_categoria'] . "</option>";
                                            }
                                            ?>
                                            <?php
                                            mysqli_close($conexion);
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Precio del producto -->
                                    <div class="col-md-6">
                                        <label for="precio" class="form-label">Precio del producto</label>
                                        <input type="number" id="precio" name="precio" class="form-control" step="0.01" required>
                                    </div>
                                    <!-- Color del producto -->
                                    <div class="col-md-6">
                                        <label for="color" class="form-label">Color del producto</label>
                                        <select name="color" id="color" class="form-select" required>
                                            <option value="">Elegir color...</option>
                                            <option value="Blanco">Blanco</option>
                                            <option value="Negro">Negro</option>
                                            <option value="Rojo">Rojo</option>
                                            <option value="Amarillo">Amarillo</option>
                                            <option value="Azul">Azul</option>
                                            <option value="Verde">Verde</option>
                                            <option value="Naranjo">Naranjo</option>
                                            <option value="Morado">Morado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="stock" class="form-label">stock del producto</label>
                                        <input type="number" id="stock" name="stock" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="talla" class="form-label">Talla del producto</label>
                                        <input type="text" id="talla" name="talla" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="genero" class="form-label">Genero del producto</label>
                                        <select name="genero" id="genero" class="form-select" required>
                                            <option value="">Elegir genero...</option>
                                            <option value="mujer">Mujer</option>
                                            <option value="hombre">Hombre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <?php while($filas = mysqli_fetch_assoc($resultado3)){ ?>
                                            <label for="id_pyme" class="form-label">ID PYME</label>
                                            <input type="text" id="id_pyme" name="id_pyme" class="form-control" placeholder="<?php echo $filas['id_pyme']?>" value="<?php echo $filas['id_pyme']; ?>" readonly required>
                                        <?php } ?>
    
                                                    

                                    </div>
                                    <div class="col-md-2">
                                        <?php while($sos = mysqli_fetch_assoc($xd)){ ?>
                                            <label for="id" class="form-label">ID PYME</label>
                                            <input type="text" id="id" name="id" class="form-control" placeholder="<?php echo $sos['id_usuario']?>" value="<?php echo $sos['id_usuario']; ?>" readonly required>
                                        <?php } ?>
    
                                                    

                                    </div>
                                    

                                    <!-- Descripcion del producto -->
                                    <div class="col-md-12">
                                        <label for="descripcion" class="form-label">Descripcion</label>
                                        <textarea name="descripcion" id="descripcion" placeholder="Ingrese una breve descripcion del producto" class="form-control" required></textarea>
                                    </div>
                                    <!-- Informacion del formulario -->
                                    <div class="col-md-12 mt-4">
                                        <p>En este apartado se le solicita subir 4 fotos de la prenda a publicar en nuestra pagina. Esto para poder nosotros procesar esta prenda para el mdoelado por eso se solicitan imagenes frontales, costados y trasero</p>
                                    </div>
                                    <!-- Carga de todas las fotos del producto -->
                                    <div class="col-md-12">
                                        <label class="form-label" for="imagenF">Cargar foto frontal</label>
                                        <input type="file" class="form-control" id="imagenF" name="imagenF" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="imagenD">Cargar foto lado derecho</label>
                                        <input type="file" class="form-control" id="imagenD" name="imagenD" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="imagenI">Cargar foto lado izquierdo</label>
                                        <input type="file" class="form-control" id="imagenI" name="imagenI" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="imagenT">Cargar foto trasero</label>
                                        <input type="file" class="form-control" id="imagenT" name="imagenT" required>
                                    </div>

                                    <div class="col-md-12 text-center Cboton" >
                                        <button type="submit" style=" margin-top: 20px;" class="btn btn-dark">Registrar producto</button>
                                    </div>
                                </div>


                            </form>
                          
                                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>HomeAdviser</span></strong>. Todos los derechos reservados
        </div>

    </footer>



    <script>
        // Obtener el contenedor de los mensajes
        var messagesContainer = document.getElementById("messages-container");

        // Mostrar los mensajes durante 5 segundos (5000 milisegundos)
        setTimeout(function () {
            messagesContainer.style.display = "none";
        }, 5000);
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{% static 'Principal/js/admin/apexcharts.min.js' %}"></script>
    <script src="{% static 'Principal/js/admin/bootstrap.bundle.min.js' %}"></script>
    <script src="{% static 'Principal/js/admin/chart.umd.js' %}"></script>
    <script src="{% static 'Principal/js/admin/echarts.min.js'  %}"></script>
    <script src="{% static 'Principal/js/admin/quill.min.js' %}"></script>
    <script src="{% static 'Principal/js/admin/simple-datatables.js' %}"></script>
    <script src="{% static 'Principal/js/admin/tinymce.min.js' %}"></script>
    <script src="{% static 'Principal/js/admin/validate.js' %}"></script>
    <script src="{% static 'Principal/js/admin/validacion-form.js' %}"></script>
    <script src="{% static 'Principal/js/admin/main.js' %}"></script>
    <script src="https://kit.fontawesome.com/dac10f1627.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
        integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script>
        // Obtener el contenedor de los mensajes
        var messagesContainer = document.getElementById("messages-container");

        // Mostrar los mensajes durante 5 segundos (5000 milisegundos)
        setTimeout(function () {
            messagesContainer.style.display = "none";
        }, 1000000);
    </script>
</body>

</html>