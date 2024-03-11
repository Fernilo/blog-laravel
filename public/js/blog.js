window.addEventListener("load" , function() {
    document.getElementById("texto").addEventListener("keyup" , function(){
        if(document.getElementById("texto").value.length >= 3) {
            fetch('/post/buscador?texto='+document.getElementById("texto").value, {
                method:'get'
            })
            .then(response => response.text())
            .then(html => {console.log(html)
                resultadosDiv = document.getElementById("resultados");
                resultadosDiv.innerHTML = "";
                resultadosDiv.innerHTML += html
            })
            .catch(error => console.log(error))
        } else {
            document.getElementById("resultados").innerHTML = "";
        }
    });
})