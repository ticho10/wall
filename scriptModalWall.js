var modal = document.getElementById('myModal');

var img = document.getElementsByClassName("myImg");
console.log(img);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
for(var i = 0; i < img.length; i++){
    img[i].onclick = function(){
        document.body.classList.add('disableScroll');
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
    document.body.classList.remove('disableScroll');
};