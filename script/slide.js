
    var proximo,anterior,index=1,imagens,id;
    window.onload = automatic;

        function automatic(){
            imagens = document.getElementsByClassName("imagens");
            proximo = document.getElementById("proximo");
            anterior = document.getElementById("anterior");
            id = setTimeout(automatic,4000);
            proximo.onclick = function(){
                clearTimeout(id);
                automatic();

            };
            anterior.onclick = function() {
                index-=2;
                clearTimeout(id);
                automatic();
            };
            console.log(index);
            if(index > imagens.length){
                index=1;
            }
            if(index < 1){
                index = imagens.length;
            }
            for (var i = 0; i < imagens.length; i++) {
                imagens[i].style.display = "none";
            }
            imagens[index-1].style.display="block";
            if(!isNaN(id)){ index++;}
        }

