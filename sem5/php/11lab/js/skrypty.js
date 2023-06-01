document.addEventListener('DOMContentLoaded', () => {
    var bonas = document.getElementById('onas');
    bonas.addEventListener("click", () => {
        console.log("Strona O nas");
        pokazOnas();
    });
    var bgaleria = document.getElementById('galeria');
    bgaleria.addEventListener("click", () => {
        console.log("Galeria zdjęć");
        pokazGalerie();
    });

    var bfromularz = document.getElementById('formularz');
    bgaleria.addEventListener("click", () => {
        console.log("formularz");
        pokazFormularz();
    });

    var bkontakt = document.getElementById('index');
    bgaleria.addEventListener("click", () => {
        console.log("Kontakt");
        pokazIndex();
    });


    //dodaj słuchaczy akcji do pozostałych przycisków w nawigacji
    // ...
});


function pokazOnas() {
    fetch("http://localhost/PHP_szablon_as/skrypty/onas.php")
    .then((response) => {
    if (response.status !== 200) {
    return Promise.reject('Coś poszło nie tak!');
    }
    return response.text();
    })
    .then((data) => {
    document.getElementById('main').innerHTML=data;
    })
    .catch((error) => {
    console.log(error);
    });
   }


   function pokazGalerie() {
    fetch("http://localhost/PHP_szablon_as/skrypty/galeria.php")
    .then((response) => {
    if (response.status !== 200) {
    return Promise.reject('Coś poszło nie tak!');
    }
    return response.text();
    })
    .then((data) => {
    document.getElementById('main').innerHTML=data;
    })
    .catch((error) => {
    console.log(error);
    });
   }
   


   function pokazFormularz() {
    fetch("http://localhost/PHP_szablon_as/skrypty/formularz.php")
    .then((response) => {
    if (response.status !== 200) {
    return Promise.reject('Coś poszło nie tak!');
    }
    return response.text();
    })
    .then((data) => {
    document.getElementById('main').innerHTML=data;
    })
    .catch((error) => {
    console.log(error);
    });
   }

   function pokazIndex() {
    fetch("http://localhost/PHP_szablon_as/skrypty/glowna.php")
    .then((response) => {
    if (response.status !== 200) {
    return Promise.reject('Coś poszło nie tak!');
    }
    return response.text();
    })
    .then((data) => {
    document.getElementById('main').innerHTML=data;
    })
    .catch((error) => {
    console.log(error);
    });
   }