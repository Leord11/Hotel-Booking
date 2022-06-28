var i = 0;
var images = [];
var time = 3000;

images[0] = './img/carousel-3.jpg' ;
images[1] = './img/carousel-2.jpg';
images[2] = './img/carousel-1.jpg';
images[3] = './img/carousel-5.jpg';

function changeImg() {
    document.slides.src = images[i];

    if( i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }

    setTimeout("changeImg()",time);
}

window.onload = changeImg;