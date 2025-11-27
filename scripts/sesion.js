fetch("php/sesion.php")
.then(res => res.json())
.then(data => {
    if(data.sesion == 0){
        window.location.href = "index.html";
    }
})