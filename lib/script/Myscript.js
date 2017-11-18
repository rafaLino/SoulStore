
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


 function showAba(aba){
     var tabcliente,tabproduto,abacliente,abaproduto,addprod;
     tabcliente = document.getElementById("tabela-cliente");
     tabproduto = document.getElementById("tabela-produto");
     abacliente = document.getElementById("aba-title-cliente");
     abaproduto = document.getElementById("aba-title-produto");
     addprod = document.getElementById("adicionar-produto");
     if(aba==="cliente"){
         tabcliente.style.display = "block";
         tabproduto.style.display = "none";
         abacliente.classList.add("active");
         abaproduto.classList.remove("active");
         addprod.style.display="none";
     }
     else{
         tabcliente.style.display = "none";
         tabproduto.style.display = "block";
         abacliente.classList.remove("active");
         abaproduto.classList.add("active");
         addprod.style.display="block";
     }

 }


function calcular(){
     var produto,quant,tamanho,total=0;
     tamanho = document.getElementById("tabela-carrinho").getElementsByTagName("td").length;
     produto = document.getElementsByClassName("preco");
     quant = document.getElementsByClassName("quantidade-prod");

    for(var i = 0; i < tamanho; i++){
        total += parseFloat(produto[i]) * parseFloat(quant[i]);
    }

    document.getElementById("preco-total").innerHTML= total.toString();

}

$(document).ready(function () {
    setTimeout(function () {
        $('#errologin').fadeOut(3000);
    },1500);
});

