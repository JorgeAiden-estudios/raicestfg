const registerForm = document.getElementById('registerForm');

// Manejo de Registro
registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const nombre = document.getElementById('registerNombre').value;
    const apellido = document.getElementById('registerApellido').value;
    const DNI = document.getElementById('registerDNI').value;
    const password = document.getElementById('registerPassword').value;
    var userType = "nulo";

    if (document.getElementById('registerAlumno').checked) {
        userType = document.getElementById('registerAlumno').value;
      }
    else if (document.getElementById('registerProfesor').checked) {
        userType = document.getElementById('registerProfesor').value;
      }

    const response = await fetch('../api/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ nombre, apellido, DNI, password, userType }),
    });

    const result = await response.json();
    alert(result.message || result.error);
});

