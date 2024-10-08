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
    <script>
        // Configuración básica de la escena
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0000);  // Fondo blanco

        const camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.1, 10);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Añadir iluminación a la escena
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);  // Luz ambiental suave
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);  // Luz direccional más intensa
        directionalLight.position.set(1, 1, 1).normalize();
        scene.add(directionalLight);

        // Cargar el modelo del maniquí (GLTF)
        const loader = new THREE.GLTFLoader();
        loader.load('Style/hombre/scene.gltf', function (gltf) {
            const mannequin = gltf.scene;
            mannequin.scale.set(3, 3, 3);  // Escalar si es necesario
            scene.add(mannequin);

            // Animación del maniquí
            function animate() {
                requestAnimationFrame(animate);

                // Rotación del maniquí
                mannequin.rotation.y += 0.01;

                renderer.render(scene, camera);
            }
            animate();
        }, undefined, function (error) {
            console.error('Error al cargar el modelo del maniquí:', error);
        });

        // Posición de la cámara
        camera.position.z = 5;

        // Ajustar el tamaño del canvas cuando la ventana cambia de tamaño
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>