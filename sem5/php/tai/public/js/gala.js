function gallery() {
    galeria = "";
    for (var i = 1; i <= 9; i++)
        galeria += '<a class="d-flex col-0 col-sm-5 col-lg-4 m-auto p-0" href="assets/gallery/obraz' + i + '.JPG" data-lightbox="galeria"><img class="img-thumbnail m-1" src="assets/gallery/obraz' + i + '.JPG"alt="Photo' + i + '" /></a>';
    document.getElementById("galeria").innerHTML = galeria;
}

document.addEventListener('DOMContentLoaded', () => {
    gallery();
});