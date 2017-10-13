
function resetSenha() {
    var senha = document.getElementsByName('senha');
    for(var i=0;i<senha.length ;i++){
        senha[i].value="";
    }
}


function imgNotFound(img){
 	img.src = "img/icon/noImage.jpg";
 }


