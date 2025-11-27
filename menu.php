<html>
    <head>
        <title>AgroCaña</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
        <link rel="icon" type="png" href="iconos/logo.png"/>
        <link rel="stylesheet" type="text/css" href="estilos/menu.css"/>
        <script type="text/javascript" src="scripts/menu.js"></script>
    </head>
    <body onload="usuario()">
        <div class="menu">
            <div class="empresa">
                <img src="iconos/logo.png" alt="Logo AgroCaña" width="65" height="65" />
                <div>
                    <h1>AgroCaña Lara</h1>
                    <h2 name="titulo" style="color: #8B8383;">Cultivos de caña</h2>
                </div>
            </div>
            <div class="navegacion">
                <h2>Navegación</h2><br>
                <ul>
                    <li><button id="principal" onclick="principal()" style="background-color: #EAEAEA;"><img src="iconos/casa.png" width="15" height="15"/><p>Panel Principal</p></button><li>
                    <li><button id="cultivos" onclick="cultivos()"><img src="iconos/planta-negro.png" width="15" height="15"/><p>Cultivos</p></button><li>
                    <li><button id="finanzas" onclick="finanzas()"><img src="iconos/grafico-circular.png" width="15" height="15"/><p>Finanzas y Recursos</p></button><li>
                    <li><button id="personal" onclick="personal()"><img src="iconos/usuarios.png" width="15" height="15"/><p>Personal y Proveedores</p></button><li>
                    <li><button id="clientes" onclick="clientes()"><img src="iconos/cliente.png" width="15" height="15"/><p>Clientes y Pedidos</p></button><li>
                    <li><button id="envios" onclick="envios()"><img src="iconos/envio.png" width="15" height="15"/><p>Envíos y Logistica</p></button><li>
                </ul>
            </div>
            <div class="usuario">
                <div class="fondo-usuario">
                    <img src="iconos/usuario.png" width="25" height="25" id="perfil"/>
                </div>
                <p id="user">Usuario</p>
            </div>
        </div>
        <div class="pagina">
            <div class="titulo">
                <div><img src="iconos/tabla.png" width="auto" height="36"/> <p id="nombre">Panel Principal</p></div>
                <div>
                    <div class="fondo-usuario">
                        <img src="iconos/usuario.png" width="25" height="25" id="perfil"/>
                    </div>
                    <p class="usuario" id="user">Usuario</p>
                </div>
            </div>
            <div id="frame">
                <iframe src="Principal.html" width="100%" height="91.5%"></iframe>
            </div>
        </div>
    </body>
    <?php 
    session_start();

    if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

        include "conexion/conexion.php";

        $id = $_SESSION['id'];

        $sql = "SELECT `NOMBRE`, `APELLIDO_P`, `APELLIDO_M`, `TIPO`, `USER` FROM usuarios WHERE cve_usuario = '".$id."'";
        $resultado = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($resultado);
        echo '<script>
        window.usuariodata = ' . json_encode($usuario) .';
        </script>';
    } else {
        header("location: index.html");
    }
    ?>
</html>
