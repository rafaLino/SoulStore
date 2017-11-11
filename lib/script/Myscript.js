
function resetSenha() {
    var senha = document.getElementsByName('senha');
    for(var i=0;i<senha.length ;i++){
        senha[i].value="";
    }
}
function imgNotFound(img){
 	img.src = "img/icon/noImage.jpg";
 }

 function showContador(){
    var cont=0,box,interval;
    box = document.getElementsByClassName('box-cart')[0];
    box.style.display ="block";
    interval = setInterval(function () {
             cont++;
        if (cont === 5){
            box.style.display="none";
            clearInterval(interval);
               }
           },1000);

 }



