// validaciones.js: validaciones del lado del cliente (archivo independiente)
// Cada campo lleva data-tipo="numero" o "texto", y data-min / data-max cuando aplica.
// Se llama con: onclick="return validar()"

function marcar(campo, mensaje) {
    var aviso = campo.parentElement.querySelector('.invalid-feedback');
    if (mensaje === '') {
        campo.classList.remove('is-invalid');
        campo.classList.add('is-valid');
        if (aviso) aviso.textContent = '';
        return true;
    }
    campo.classList.remove('is-valid');
    campo.classList.add('is-invalid');
    if (aviso) aviso.textContent = mensaje;
    return false;
}

function validarCampo(campo) {
    var valor = campo.value.trim();
    var tipo = campo.getAttribute('data-tipo');
    if (tipo === 'texto') {
        // Solo letras y espacios, de 3 a 60 caracteres
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{3,60}$/.test(valor)) return marcar(campo, 'Escribe el nombre completo (solo letras, mínimo 3).');
        return marcar(campo, '');
    }
    if (tipo === 'entero') {
        if (!/^[0-9]+$/.test(valor)) return marcar(campo, 'Escribe un número entero, sin signos ni decimales.');
    } else if (tipo === 'decimal') {
        if (!/^[0-9]+(\.[0-9]{1,2})?$/.test(valor)) return marcar(campo, 'Escribe un número válido (máximo 2 decimales).');
    } else if (tipo === 'lista') {
        if (valor === '') return marcar(campo, 'Elige una opción.');
        return marcar(campo, '');
    }
    var min = parseFloat(campo.getAttribute('data-min'));
    var max = parseFloat(campo.getAttribute('data-max'));
    var numero = parseFloat(valor);
    if (numero < min || numero > max) return marcar(campo, 'El valor debe estar entre ' + min + ' y ' + max + '.');
    return marcar(campo, '');
}

function validar() {
    var campos = document.querySelectorAll('[data-tipo]');
    var todoBien = true;
    for (var i = 0; i < campos.length; i++) {
        if (!validarCampo(campos[i])) todoBien = false;
    }
    return todoBien; // true = el formulario viaja al archivo PHP
}
