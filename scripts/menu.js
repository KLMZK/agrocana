function principal() {
    document.querySelector("iframe").src = "Principal.html";
    quitarColores();
    document.getElementById("principal").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Panel Principal";
}
function cultivos() {
    document.querySelector("iframe").src = "Cultivos.html";
    quitarColores();
    document.getElementById("cultivos").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Cultivos";
}
function finanzas() {
    document.querySelector("iframe").src = "Finanzas.html";
    quitarColores();
    document.getElementById("finanzas").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Finanzas y Recursos";
}
function personal() {
    document.querySelector("iframe").src = "Personal.html";
    quitarColores();
    document.getElementById("personal").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Personal y Proveedores";
}
function clientes() {
    document.querySelector("iframe").src = "Clientes.html";
    quitarColores();
    document.getElementById("clientes").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Clientes y Pedidos";
}
function envios() {
    document.querySelector("iframe").src = "Envios.html";
    quitarColores();
    document.getElementById("envios").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Envíos y Logistica";
}
function reportes() {
    document.querySelector("iframe").src = "Reportes.html";
    quitarColores();
    document.getElementById("reportes").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Reportes";
}
function quitarColores() {
    const botones = document.querySelectorAll('button');
    botones.forEach(b => {
        b.style.backgroundColor = '';
    });
}