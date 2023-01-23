window.addEventListener("load" , function() {
    document.getElementById("texto").addEventListener("keyup" , function(){
        if(document.getElementById("texto").value.length >= 3) {
            fetch('/post/buscador?texto='+document.getElementById("texto").value, {
                method:'get'
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById("resultados").innerHTML += html
            })
            .catch(error => console.log(error))
        } else {
            document.getElementById("resultados").innerHTML = "";
        }
    });
})