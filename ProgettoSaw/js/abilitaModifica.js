var ripristina = document.getElementById("ripristina");

function abilitaModifica(inputId, containerId) {
  var input = document.getElementById(inputId);
  var container = document.getElementById(containerId);

  if (input.disabled) {
    if(inputId=="pass"){
        input.type ="text";
        input.value ="";
    }
    input.disabled = false;
    container.style.boxShadow = "0px 10px 10px -5px #7ED957";
    ripristina.style.display = "block";
  } else {
    if(inputId=="pass"){
        if(input.value==""){
            input.value = "password1234";
        }
        input.type ="password";  
    }
    input.disabled = true;
    container.style.boxShadow = "none";
    ripristina.style.display = "none";
  }
}
