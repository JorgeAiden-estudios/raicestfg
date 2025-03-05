document.addEventListener('DOMContentLoaded', () => {
    const nombre = localStorage.getItem('nombre');
    const apellido = localStorage.getItem('apellido');
    const dni = localStorage.getItem('DNI');

    document.getElementById('nombre').textContent = nombre;
    document.getElementById('apellido').textContent = apellido;

    // Función para obtener y mostrar los profesores
    async function obtenerProfesores() {
        try {
            const response = await fetch('/api/alumnoProfesor.php');
            if (!response.ok) {
                throw new Error('Error al obtener los profesores');
            }
            const profesores = await response.json();
            const profesoresContainer = document.getElementById('profesoresContainer');
            profesoresContainer.innerHTML = '';

            if (profesores.length > 0) {
                const list = document.createElement('ul');
                profesores.forEach(profesor => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `Nombre: ${profesor.nombre} ${profesor.apellido}, DNI: ${profesor.DNI}`;
                    list.appendChild(listItem);
                });
                profesoresContainer.appendChild(list);
            } else {
                profesoresContainer.textContent = 'No tienes profesores.';
            }
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('profesoresContainer').textContent = 'Error al cargar profesores';
        }
    }

    // Llamar a la función para obtener y mostrar los profesores al cargar la página
    obtenerProfesores();
});