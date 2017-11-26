
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

 function abaConfig(){
    var cont=0,interval;
     var conta = document.getElementById("conta-config");
    var aba = document.getElementById("open-aba-config");
    var menu = document.getElementById("menu");
    if(conta.style.width === "182px"){
        conta.style.width= "0";
        aba.style.backgroundImage= "url('../../lib/img/icon/arrow_right_white.png')";
        aba.style.left="0";
        hidMenu(menu);
     }
    else{
        conta.style.width="182px";
        aba.style.backgroundImage="url('../../lib/img/icon/arrow_left_white.png')";
        aba.style.left ="182px";
        showMenu(menu);
    }

 }

 function showMenu(menu){
     var cont=0,interval;
     interval = setInterval(function () {
         cont++;
         if (cont === 1) {
             menu.style.display = "block";
             clearInterval(interval);
         }
     },390);
 }

 function hidMenu(menu){
     menu.style.display="none";
 }



function calcular(){
     var preco,total=0;

     preco = document.getElementsByClassName("carrinhoPreco");

     for(var i = 0 ; i < preco.length ; i++){
       total += parseFloat(preco[i].innerHTML);
     }
    document.getElementById("preco-total").innerHTML= total.toString();
    document.getElementById("preco-total-input").value = total;
}



$(document).ready(function () {
    setTimeout(function () {
        $('#errologin').fadeOut(3000);
    },1500);
});
