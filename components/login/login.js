const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const dni = document.getElementById('DNI').value;
    const password = document.getElementById('CLAVE_P').value;
    const role = document.querySelector('input[name="role"]:checked').value; // Obtener el rol seleccionado

    const response = await fetch('authenticate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ dni, password, role }),
    });

    const result = await response.json();
    const mensajeDiv = document.getElementById('MENSAJE');
    if (result.message) {
        mensajeDiv.style.color = 'green';
        mensajeDiv.innerText = result.message;
        if (result.rol === 'alumno') {
            window.location.href = 'pagina_alumno.php';
        } else if (result.rol === 'profesor') {
            window.location.href = 'pagina_profesor.php';
        }
    } else if (result.error) {
        mensajeDiv.style.color = 'red';
        mensajeDiv.innerText = result.error;
    }
});