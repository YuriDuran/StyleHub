<?php
require_once 'function.php'
?>
<?php render_template('head'); ?>

<body>
    <div class="container-fluid">
        <!--Aqui se encuentra el header de la pagina -->
        <?php render_template('Header'); ?>

        <main>

        </main>

        <!--Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128/examples/js/controls/OrbitControls.js"></script>
    <script>
        // Configuración básica de la escena
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0000);  // Fondo blanco

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Añadir iluminación a la escena
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);  // Luz ambiental suave
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.3);  // Luz direccional más intensa
        directionalLight.position.set(1, 1, 1).normalize();
        scene.add(directionalLight);

        // Cargar el modelo del maniquí
        const loader = new THREE.GLTFLoader();
        let mannequin, shirt;

        loader.load('Style/hombre/scene.gltf', function (gltf) {
            mannequin = gltf.scene;
            mannequin.scale.set(1, 1, 1);  // Ajustar la escala del maniquí si es necesario
            scene.add(mannequin);

            // Después de cargar el maniquí, cargar la polera
            loader.load('Style/polera/scene.gltf', function (gltfShirt) {
                shirt = gltfShirt.scene;
                shirt.scale.set(1, 1, 1);  // Ajustar la escala de la polera si es necesario

                // Ajustar la posición y rotación de la polera para que encaje en el maniquí
                shirt.position.set(0, 0, 0);  // Ajustar si es necesario
                shirt.rotation.set(0, 0, 0);  // Ajustar si es necesario

                mannequin.add(shirt);  // Añadir la polera al maniquí
            }, undefined, function (error) {
                console.error('Error al cargar la polera:', error);
            });
        }, undefined, function (error) {
            console.error('Error al cargar el maniquí:', error);
        });

        // Posición de la cámara
        camera.position.z = 5;

        // Crear controles de órbita
        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableZoom = true; //permitir zoom
        controls.enablePan = true; //permitir mover en eje x y y

        // Ajustar el tamaño del canvas cuando la ventana cambia de tamaño
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
     </script>
</body>