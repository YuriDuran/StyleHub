<?php
require_once 'function.php';
require 'conexion.php';

// Obtener las IDs de los productos seleccionados
$ids_productos = isset($_GET['productos']) ? $_GET['productos'] : [];

// Inicializar arreglos para almacenar los productos
$poleras = [];
$pantalones = [];

// Validar que se hayan seleccionado productos
if (count($ids_productos) > 0) {
    // Consulta para obtener poleras y camisas
    $query_poleras = "SELECT modelo, id_categoria FROM productos WHERE id_producto IN (" . implode(',', array_map('intval', $ids_productos)) . ") AND id_categoria IN (1, 2)"; // 1: Polera, 2: Camisa
    $resultado_poleras = $conexion->query($query_poleras);
    
    while ($fila = $resultado_poleras->fetch_assoc()) {
        $poleras[] = $fila; // Almacenar poleras
    }

    // Consulta para obtener pantalones y shorts
    $query_pantalones = "SELECT modelo, id_categoria FROM productos WHERE id_producto IN (" . implode(',', array_map('intval', $ids_productos)) . ") AND id_categoria IN (3, 5)"; // 3: Pantalon, 5: Short
    $resultado_pantalones = $conexion->query($query_pantalones);
    
    while ($fila = $resultado_pantalones->fetch_assoc()) {
        $pantalones[] = $fila; // Almacenar pantalones
    }
}

// Lógica para posicionar las prendas

?>
<?php render_template('head'); ?>



<body>
    <div class="container-fluid">
        <!-- Aquí se encuentra el header de la página -->
        <?php render_template('Header'); ?>

        <main>
        </main>

        <!-- Aquí se encuentra el footer de la página -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cannon.js/0.6.2/cannon.min.js"></script>

    <script>
    // Crear la escena y la cámara
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    scene.background = new THREE.Color('#aab7c9');
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // Añadir iluminación
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.7);
    scene.add(ambientLight);

    // Cargar modelos de poleras
    <?php foreach ($poleras as $item): ?>
        const loaderPolera = new THREE.GLTFLoader();
        loaderPolera.load('<?php echo $item['modelo']; ?>', function(gltf) {
            const polera = gltf.scene;
            polera.scale.set(1.6, 1.6, 1.6);
            polera.position.y = 1; // Posición para la polera
            scene.add(polera);
        }, undefined, function(error) {
            console.error('Error cargando el modelo de polera:', error);
        });
    <?php endforeach; ?>

    // Cargar modelos de pantalones
    <?php foreach ($pantalones as $item): ?>
        const loaderPantalon = new THREE.GLTFLoader();
        loaderPantalon.load('<?php echo $item['modelo']; ?>', function(gltf) {
            const pantalon = gltf.scene;
            pantalon.scale.set(2.0, 2.0, 2.0);
            pantalon.position.y = -2,5; // Posición para el pantalón
            scene.add(pantalon);
        }, undefined, function(error) {
            console.error('Error cargando el modelo de pantalón:', error);
        });
    <?php endforeach; ?>

    // Control de la cámara
    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    camera.position.set(0, 2, 5);
    controls.update();

    // Función de animación
    function animate() {
        requestAnimationFrame(animate);
        renderer.render(scene, camera);
    }

    animate();
    </script>

</body>