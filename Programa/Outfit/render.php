<?php
require_once 'function.php';
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
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Añadir iluminación
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);

        // Cargar el modelo del maniquí
        const loader = new THREE.GLTFLoader();
        let mannequin;
        loader.load('Style/hombre/scene.gltf', function (gltf) {
            mannequin = gltf.scene;
            mannequin.scale.set(1, 1, 1);
            mannequin.position.y = -1;  // Asegurar que el maniquí esté en la posición correcta
            scene.add(mannequin);
        });

        // Control de la cámara
        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        camera.position.set(0, 2, 5);
        controls.update();

        // Crear el mundo físico con Cannon.js
        const world = new CANNON.World();
        world.gravity.set(0, -9.807, 0);  // Gravedad hacia abajo

        // Crear un material para el maniquí
        const mannequinMaterial = new CANNON.Material('mannequinMaterial');

        // Crear un cuerpo rígido para el maniquí (para colisiones)
        const mannequinBody = new CANNON.Body({
            mass: 1,
            position: new CANNON.Vec3(0, 1, 0)
        });

        mannequinBody.addShape(new CANNON.Box(new CANNON.Vec3(0.5, 1, 0.25))); // Ajustar según el modelo del maniquí
        world.addBody(mannequinBody);

        // Simulación de la polera (aumentar resolución y ajustar parámetros)
        const clothWidth = 9;  // Mayor resolución para mayor detalle
        const clothHeight = 15; 
        const particleSpacing = 0.06;  // Espaciado más pequeño para un ajuste más detallado
        const particles = [];

        // Crear las partículas de la polera
        for (let i = 0; i < clothWidth; i++) {
            for (let j = 0; j < clothHeight; j++) {
                const mass = j === 0 ? 0 : 0.05;  // La primera fila tiene masa 0 para que esté fija
                const particle = new CANNON.Body({
                    mass: mass,
                    position: new CANNON.Vec3(i * particleSpacing, 1 + j * particleSpacing, 0),
                    shape: new CANNON.Sphere(0.01)  // Partículas pequeñas para mayor precisión
                });
                world.addBody(particle);
                particles.push(particle);
            }
        }

        // Conectar las partículas con resortes (simulación de tela)
        function connectParticles(p1, p2) {
            const distance = p1.position.distanceTo(p2.position);
            const stiffness = 0.2;  // Ajustar la rigidez de los resortes
            const constraint = new CANNON.DistanceConstraint(p1, p2, distance, stiffness); 
            world.addConstraint(constraint);
        }

        // Conectar las partículas para la estructura de la polera
        for (let i = 0; i < clothWidth; i++) {
            for (let j = 0; j < clothHeight; j++) {
                if (i < clothWidth - 1) {
                    connectParticles(particles[i + j * clothWidth], particles[i + 1 + j * clothWidth]);
                }
                if (j < clothHeight - 1) {
                    connectParticles(particles[i + j * clothWidth], particles[i + (j + 1) * clothWidth]);
                }
            }
        }

        // Fijar la primera fila de partículas al maniquí para que la polera esté ajustada
        for (let i = 0; i < clothWidth; i++) {
            const lockConstraint = new CANNON.LockConstraint(particles[i], mannequinBody);
            world.addConstraint(lockConstraint);
        }

        // Crear la malla visual para la polera en Three.js
        const clothGeometry = new THREE.BufferGeometry();
        const positions = new Float32Array(clothWidth * clothHeight * 3);

        for (let i = 0; i < clothWidth; i++) {
            for (let j = 0; j < clothHeight; j++) {
                const index = (i + j * clothWidth) * 3;
                positions[index] = i * particleSpacing;
                positions[index + 1] = 1 + j * particleSpacing;
                positions[index + 2] = 0;
            }
        }

        clothGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        const clothMaterial = new THREE.MeshBasicMaterial({ color: 0xe51a4c, wireframe: true });  // Polera negra
        const clothMesh = new THREE.Mesh(clothGeometry, clothMaterial);
        clothMesh.position.set(-0.25, -1.3, -0.1);  // Ajustar la posición en el maniquí
        scene.add(clothMesh);

        // Función para actualizar la malla de la polera
        function updateClothMesh() {
            const positions = clothGeometry.attributes.position.array;
            for (let i = 0; i < clothWidth; i++) {
                for (let j = 0; j < clothHeight; j++) {
                    const index = (i + j * clothWidth) * 3;
                    const particle = particles[i + j * clothWidth];
                    positions[index] = particle.position.x;
                    positions[index + 1] = particle.position.y;
                    positions[index + 2] = particle.position.z;
                }
            }
            clothGeometry.attributes.position.needsUpdate = true;
        }

        // Loop de renderizado y física
        function animate() {
            requestAnimationFrame(animate);

            // Avanzar la simulación física
            world.step(1 / 60);

            // Actualizar la malla de la polera
            updateClothMesh();

            // Renderizar la escena
            renderer.render(scene, camera);
        }

        animate();
    </script>
</body>
