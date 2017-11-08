

    var index=1;

         function automaticSlide(){
            var imagens = document.getElementsByClassName("imagens");
            var proximo = document.getElementById("proximo");
            var anterior = document.getElementById("anterior");

            proximo.onclick = function(){
                clearTimeout(id);
                    automaticSlide();
            };
            anterior.onclick = function() {
                index-=2;
                clearTimeout(id);
                automaticSlide();
            };
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
                index++;
            id = setTimeout(automaticSlide,4000);
        }

                window.onload = automaticSlide;
