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
    '/img/prueba.jpg',   // Primera imagen
    '/img/fondoo.jpeg',  // Segunda imagen
    '/img/foto_principal.jpg'   // Tercera imagen
];

// Asegúrate de que 'heroImage' se obtiene después de que el DOM está completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    const heroImage = document.querySelector('.hero-image');

    // Cambiar la imagen de fondo cada 2 segundos
    setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        heroImage.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
    }, 5000); // 2000ms = 2 segundos
});