
var btn2 = document.getElementById("alert");
btn2.addEventListener("click",()=>{
    btn2.classList.remove("mostrar");
    btn2.classList.add("ocultar");
});

function verificarPasswords(){
    btn2.classList.remove("mostrar");
    btn2.classList.add("ocultar");
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    if(pass1.value!=pass2.value){
        btn2.classList.remove("ocultar");
        btn2.classList.add("mostrar");
        return false;
    }
  
}