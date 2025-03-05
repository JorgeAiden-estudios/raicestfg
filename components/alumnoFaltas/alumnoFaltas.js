document.addEventListener('DOMContentLoaded', () => {
    const nombre = localStorage.getItem('nombre');
    const apellido = localStorage.getItem('apellido');
    const dni = localStorage.getItem('DNI');

    document.getElementById('nombre').textContent = nombre;
    document.getElementById('apellido').textContent = apellido;

    // Función para obtener y mostrar los detalles de las faltas
    async function obtenerFaltas() {
        try {
            const response = await fetch('/api/faltas.php');
            if (!response.ok) {
                throw new Error('Error al obtener las faltas');
            }
            const faltas = await response.json();
            const faltasContainer = document.getElementById('faltasContainer');
            faltasContainer.innerHTML = '';

            if (faltas.length > 0) {
                const list = document.createElement('ul');
                faltas.forEach(falta => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `Fecha: ${falta.fecha}, Hora: ${falta.hora}, Motivo: ${falta.motivo}`;
                    list.appendChild(listItem);
                });
                faltasContainer.appendChild(list);
            } else {
                faltasContainer.textContent = 'No tienes faltas.';
            }
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('faltasContainer').textContent = 'Error al cargar faltas';
        }
    }

    // Llamar a la función para obtener y mostrar los detalles de las faltas al cargar la página
    obtenerFaltas();
});