function principal() {
    document.querySelector("iframe").src = "Principal.html";
    quitarColores();
    document.getElementById("principal").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Panel Principal";
}
function cultivos() {
    document.querySelector("iframe").src = "Cultivos-CultivosRegistrados.html";
    quitarColores();
    document.getElementById("cultivos").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Cultivos";
}
function finanzas() {
    document.querySelector("iframe").src = "FinanzasyRecursos-Presupuesto.html";
    quitarColores();
    document.getElementById("finanzas").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Finanzas y Recursos";
}
function personal() {
    document.querySelector("iframe").src = "PersonalyProveedores-Trabajadores.html";
    quitarColores();
    document.getElementById("personal").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Personal y Proveedores";
}
function clientes() {
    document.querySelector("iframe").src = "ClientesyPedidos-GestionClientes.html";
    quitarColores();
    document.getElementById("clientes").style.backgroundColor = "#EAEAEA";
    document.getElementById("nombre").innerText = "Clientes y Pedidos";
}
function envios() {
    document.querySelector("iframe").src = "EnviosyLogistica.html";
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
function usuario() {
    var datos = window.usuariodata;
    document.querySelectorAll('#user').forEach(p => {
        p.textContent = datos[4];
    })
    document.querySelectorAll('#perfil').forEach(p => {
        p.src = "perfil/" + datos[0] + datos[1] + datos[2] + ".jpg";
        p.style.width = "32px";
        p.style.height = "32px";
    })
}