function principal() {
    document.querySelector("iframe").src = "Principal.html";
    quitarColores();
    document.getElementById("principal").style.backgroundColor = "#EAEAEA";
}
function cultivos() {
    document.querySelector("iframe").src = "Cultivos.html";
    quitarColores();
    document.getElementById("cultivos").style.backgroundColor = "#EAEAEA";
}
function finanzas() {
    document.querySelector("iframe").src = "Finanzas.html";
    quitarColores();
    document.getElementById("finanzas").style.backgroundColor = "#EAEAEA";
}
function personal() {
    document.querySelector("iframe").src = "Personal.html";
    quitarColores();
    document.getElementById("personal").style.backgroundColor = "#EAEAEA";
}
function clientes() {
    document.querySelector("iframe").src = "Clientes.html";
    quitarColores();
    document.getElementById("clientes").style.backgroundColor = "#EAEAEA";
}
function envios() {
    document.querySelector("iframe").src = "Envios.html";
    quitarColores();
    document.getElementById("envios").style.backgroundColor = "#EAEAEA";
}
function reportes() {
    document.querySelector("iframe").src = "Reportes.html";
    quitarColores();
    document.getElementById("reportes").style.backgroundColor = "#EAEAEA";
}
function quitarColores() {
    const botones = document.querySelectorAll('button');
    botones.forEach(b => {
        b.style.backgroundColor = '';
    });
}