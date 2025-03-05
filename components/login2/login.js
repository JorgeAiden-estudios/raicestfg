const
  loginAlumno = document.getElementById('loginAlumno'),
  loginProfesor = document.getElementById('loginProfesor');

function goToNewPage(page_url) {
    console.log(page_url);
    try {
        window.location.replace(page_url);        
    } catch (error) {
        window.location.replace('../../src/404.php');
    throw new Error("No se ha podido ir a la página");
    }
}
  
// Manejo de Login Alumno
loginAlumno.addEventListener('click', async (event) => {
    event.preventDefault();
    const DNI = document.getElementById('loginDNI').value;
    const password = document.getElementById('loginPassword').value;
    const userType = "alumno";

    const response = await fetch('../api/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ DNI, password, userType })
    });

    const result = await response.json();
    console.log(result);
    if (result.userId) {
        localStorage.setItem('userId', result.userId);
        localStorage.setItem('userType', userType);
        localStorage.setItem('nombre', result.nombre);
        localStorage.setItem('apellido', result.apellido);
        localStorage.setItem('DNI', result.DNI);
        alert(result.message);
        goToNewPage("../src/alumno.php");
    } else {
        alert(result.error);
    }
});

// Manejo de Login Profesor
loginProfesor.addEventListener('click', async (event) => {
  event.preventDefault();
  const DNI = document.getElementById('loginDNI').value;
  const password = document.getElementById('loginPassword').value;
  const userType = "profesor";

  const response = await fetch('../api/login.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ DNI, password, userType }),
  });

  const result = await response.json();
  if (result.userId) {
      localStorage.setItem('userId', result.userId); // Almacena el ID de usuario
      localStorage.setItem('userType', userType); // Almacena el TIPO de usuario
    }else{
      console.log("Usuario no encontrado");
    }
  if (result.message) {
    alert(result.message);
    //Ir a la página correspondiente para profe
     goToNewPage("../src/profesor.php");
    } else {
      alert(result.error);
    }
});

