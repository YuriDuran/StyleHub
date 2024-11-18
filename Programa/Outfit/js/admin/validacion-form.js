// function validarFormulario() {
//     const nombre = document.getElementById("nombre").value;
//     const apellido = document.getElementById("apellido").value;
//     const rut = document.getElementById("rut").value;
//     const edad = document.getElementById("edad").value;
//     const correo = document.getElementById("correo").value;
//     const telefono = document.getElementById("telefono").value;

//     // Validar el nombre
//     if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/.test(nombre)) {
//         alert("El nombre debe tener al menos 3 caracteres");
//         return false;
//     }

//     // Validar el apellido
//     if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/.test(apellido)) {
//         alert("El apellido debe tener al menos 3 caracteres");
//         return false;
//     }

//     // Validar el RUT
//     if (!/^\d{1,2}\d{3}\d{3}-[\dkK]{1}$/.test(rut)) {
//         alert("El RUT debe tener un formato válido (Ej: 12345678-9)");
//         return false;
//     }

//     // Validar la edad
//     if (!/^\d{2}$/.test(edad)) {
//         alert("La edad debe tener dos dígitos");
//         return false;
//     }

//     if (edad.value < 18) {
//         alert('Debes ser mayor de 18 años para enviar este formulario.');
//         return false;
//     }

//     // Validar el correo
//     if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(correo)) {
//         alert("El correo debe tener un formato válido (Ej: nombre@ejemplo.com)");
//         return false;
//     }

//     // Validar el teléfono
//     if (!/^\d{9}$/.test(telefono)) {
//         alert("El teléfono debe tener 9 dígitos");
//         return false;
//     }

//     return true;

// }

// // Obtén una referencia al campo de entrada y al contenedor de la imagen
// const inputImage = document.getElementById('inputImage');
// const imageContainer = document.getElementById('imageContainer');

// // Agrega un evento para capturar el cambio en el campo de entrada de archivo
// inputImage.addEventListener('change', function () {
//     // Verifica si se seleccionó un archivo
//     if (inputImage.files && inputImage.files[0]) {
//         // Crea un objeto FileReader
//         const reader = new FileReader();

//         // Define la función que se ejecutará cuando se cargue la imagen
//         reader.onload = function (e) {
//             // Crea un elemento de imagen y establece su atributo src en la imagen cargada
//             const image = document.createElement('img');
//             image.src = e.target.result;

//             // Agrega la imagen al contenedor
//             imageContainer.innerHTML = '';
//             imageContainer.appendChild(image);

//             image.style.maxWidth = '150px';
//             image.style.maxHeight = '150px';
//             alert('la foto excede el tamaño, se ajustara automáticamente.')
//             return false;
//         };

//         // Lee el archivo seleccionado como una URL de datos
//         reader.readAsDataURL(inputImage.files[0]);
//     }
// });

/*validacion form*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');




const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo (NOSE OCUPA por ahora 0 preguntas plis ta de emergencia grasia.)
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/, // 8 a 16 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{9}$/, //  9 numeros.
    edad: /^\d{1,3}$/,
    rut: /^[0-9]{7,8}[-]{1}[0-9Kk]{1}$/,
    nacionalidad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,

}
const campos = {
    nombre: false,
    ap1: false,
    numero: false,
    email: false,
    password: false,
    edad: false,
    rut: false,
    nacionalidad: false,
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case"direccion":
            validarDireccion();
            break;
        case"nacionalidad":
            validarCampo(expresiones.nacionalidad, e.target, 'nacionalidad');
            break;
        
        case"rut":
            validarCampo(expresiones.rut, e.target, 'rut');
            break;

        case"edad":
            validarCampo(expresiones.edad, e.target, 'edad');
            validarEdad();
            break;

        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;

        case "apellido1":
            validarCampo(expresiones.nombre, e.target, 'ap1');
            break;

        case "numero":
            validarCampo(expresiones.telefono, e.target, 'numero');
            break;

        case "email":
            validarCampo(expresiones.correo, e.target, 'email');
            break;

        case "con1":
            validarCampo(expresiones.password, e.target, 'password');
            validarPassword2();
            break;

        case "con2":
            validarPassword2();
            break;

    }

}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;

    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}

const validarPassword2 = () => {
    const inputCon1 = document.getElementById('con1');
    const inputCon2 = document.getElementById('con2');

    if (inputCon1.value !== inputCon2.value) {
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos['password'] = false;
    } else {
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos['password'] = true;
    }
}

const validarEdad = () => {
    const inputEdad = document.getElementById('edad');
    const edad = parseInt(inputEdad.value);

    if (isNaN(edad) || edad <= 17) {
        document.getElementById('grupo__edad').classList.add('formulario__grupo-incorrecto');
        document.getElementById('grupo__edad').classList.remove('formulario__grupo-correcto');
        document.querySelector('#grupo__edad i').classList.add('fa-times-circle');
        document.querySelector('#grupo__edad i').classList.remove('fa-check-circle');
        document.querySelector('#grupo__edad .formulario__input-error').classList.add('formulario__input-error-activo');
        campos.edad = false;
    } else {
        document.getElementById('grupo__edad').classList.remove('formulario__grupo-incorrecto');
        document.getElementById('grupo__edad').classList.add('formulario__grupo-correcto');
        document.querySelector('#grupo__edad i').classList.remove('fa-times-circle');
        document.querySelector('#grupo__edad i').classList.add('fa-check-circle');
        document.querySelector('#grupo__edad .formulario__input-error').classList.remove('formulario__input-error-activo');
        campos.edad = true;
    }
};


const validarDireccion = () => {
    const inputDireccion = document.getElementById('direccion');
    const direccion = inputDireccion.value.trim();

    if (direccion === '') {
        document.getElementById('grupo__direccion').classList.add('formulario__grupo-incorrecto');
        document.getElementById('grupo__direccion').classList.remove('formulario__grupo-correcto');
        document.querySelector('#grupo__direccion i').classList.add('fa-times-circle');
        document.querySelector('#grupo__direccion i').classList.remove('fa-check-circle');
        document.querySelector('#grupo__direccion .formulario__input-error').classList.add('formulario__input-error-activo');
        campos.direccion = false;
    } else if (!/^[\w\s,.\-#\/]+$/.test(direccion)) {
        document.getElementById('grupo__direccion').classList.add('formulario__grupo-incorrecto');
        document.getElementById('grupo__direccion').classList.remove('formulario__grupo-correcto');
        document.querySelector('#grupo__direccion i').classList.add('fa-times-circle');
        document.querySelector('#grupo__direccion i').classList.remove('fa-check-circle');
        document.querySelector('#grupo__direccion .formulario__input-error').classList.add('formulario__input-error-activo');
        campos.direccion = false;
    } else {
        document.getElementById('grupo__direccion').classList.remove('formulario__grupo-incorrecto');
        document.getElementById('grupo__direccion').classList.add('formulario__grupo-correcto');
        document.querySelector('#grupo__direccion i').classList.remove('fa-times-circle');
        document.querySelector('#grupo__direccion i').classList.add('fa-check-circle');
        document.querySelector('#grupo__direccion .formulario__input-error').classList.remove('formulario__input-error-activo');
        campos.direccion = true;
    }
};


inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});


formulario.addEventListener('submit', (e) => {



    const terminos = document.getElementById('terminos');
    if (campos.nombre && campos.ap1 && campos.email && campos.password && terminos.checked) {
        formulario();

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        }, 5000)



        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        })
    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});






