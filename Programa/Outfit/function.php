<?php
declare(strict_types=1); // <- a nivel de archivo y arriba del todo
// Creacion de conexion con la BD
require_once 'conexion.php';

function render_template(string $template, string $css_file = 'index.css')
{
  $css_path = "Style/$css_file";
  require "Template/$template.php";
}
