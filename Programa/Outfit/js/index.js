window.addEventListener('scroll', function() {
    const heroImage = document.querySelector('.hero-image');
    const header = document.querySelector('.fixed-header');
    const logoLarge = document.getElementById('logo-large');
    const logoSmall = document.getElementById('logo-small');
    
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let windowHeight = window.innerHeight;

    // Desaparece la imagen de fondo a medida que el usuario hace scroll
    let newOpacity = 1 - (scrollTop / windowHeight);
    heroImage.style.opacity = Math.max(newOpacity, 0);

    // Si el usuario ha hecho suficiente scroll, mostrar el header y achicar el logo
    if (scrollTop > windowHeight / 2) {
        // Mostrar el header
        header.style.opacity = 1;
        logoSmall.style.display = 'block'; // Mostrar el logo pequeño

        // Mover y achicar el logo grande hacia el centro del header
        logoLarge.style.transform = 'translate(-50%, -200%) scale(0.5)';
        logoLarge.style.opacity = 0; // Esconde el logo grande
    } else {
        // El logo grande permanece en el centro de la imagen
        header.style.opacity = 0;
        logoSmall.style.display = 'none'; // Esconde el logo pequeño
        logoLarge.style.transform = 'translate(-50%, -50%) scale(1)';
        logoLarge.style.opacity = 1; // Mostrar el logo grande
    }
});

// Carrusel de imágenes de fondo
let currentImageIndex = 0;
const backgroundImages = [
    'img/prueba.jpg',   // Primera imagen
    'img/mujer_posando.jpg',  // Segunda imagen
    'img/foto_principal.jpg',   // Tercera imagen
];

const heroImage = document.querySelector('.hero-image');

// Cambiar la imagen de fondo con una transición suave
setInterval(() => {
    // Desvanecer la imagen actual
    heroImage.style.opacity = 0;

    // Esperar 1 segundo (el tiempo que dura la transición de opacidad) antes de cambiar la imagen
    setTimeout(() => {
        currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        heroImage.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;

        // Volver a mostrar la nueva imagen con la opacidad a 1
        heroImage.style.opacity = 1;
    }, 500);  // Tiempo en milisegundos (1000ms = 1 segundo) para sincronizar con la transición de opacidad
}, 5000); // Cambiar la imagen cada 5 segundos