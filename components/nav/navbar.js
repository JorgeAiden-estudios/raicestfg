const 
    navbar_profes = document.getElementById("navbar-profesor"),
    navbar_alumno = document.getElementById("navbar-alumno"),
    navbar_invitado = document.getElementById("navbar-invitado"),
    navbar_logout = document.getElementById("logoutButton"),
    navbar_login = document.getElementById("login"),
    navbar_register = document.getElementById("registro");

function goToNewPage(page_url) {
    console.log(page_url);
    try {
        window.location.replace(page_url);        
    } catch (error) {
        window.location.replace('../../src/404.php');
    throw new Error("No se ha podido ir a la página");
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }

function navbarChanges(active) {
    //console.log("CAMBIANDO NAVBAR");
    //console.log(navbar_auth);
    //console.log(navbar_logout);
    //console.log(active);

    if(active == "alumno"){
        navbar_profes.hidden = true;
        navbar_alumno.hidden = false;
        navbar_invitado.hidden = true;

        navbar_login.hidden = true;
        navbar_register.hidden = true;
        navbar_logout.hidden = false;
    }
    else if (active == "profesor"){
        navbar_profes.hidden = false;
        navbar_alumno.hidden = true;
        navbar_invitado.hidden = true;

        navbar_login.hidden = true;
        navbar_register.hidden = true;
        navbar_logout.hidden = false;
    }
    else {
        navbar_profes.hidden = true;
        navbar_alumno.hidden = true;
        navbar_invitado.hidden = false;

        navbar_login.hidden = false;
        navbar_register.hidden = false;
        navbar_logout.hidden = true;
    }
}