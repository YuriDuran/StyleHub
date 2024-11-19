<?php

declare(strict_types=1); // <- a nivel de archivo y arriba del todo
// Creacion de conexion con la BD
require_once 'conexion.php';

function render_template(string $template, string $css_file = 'index.css')
{
  $css_path = "Style/$css_file";
  require "Template/$template.php";
}


function validarAdmin(string $template)
{
  session_start();

  if (!isset($_SESSION['tip_usuario'])) {
    echo '
    <script>
    alert("Acceso denegado. No se ha iniciado sesión.");
    location.href = "inicio_sesion.php"
    </script>
    ';  
  }

  if ($_SESSION['tip_usuario'] == '3') {
    echo '
    <script>
    alert("Acceso autorizado");
    location.href = "' . $template . '
    </script>
    ';
  } else {
    echo '
    <script>
    alert("Acceso denegado. Solo los administradores pueden acceder.");
    location.href = "index.php"
    </script>
    ';  
  }
}
