document.addEventListener('DOMContentLoaded', () => {
    const nombre = localStorage.getItem('nombre');
    const apellido = localStorage.getItem('apellido');
    const dni = localStorage.getItem('DNI');

    document.getElementById('nombre').textContent = nombre;
    document.getElementById('apellido').textContent = apellido;
    document.getElementById('dni').textContent = dni;

    
});