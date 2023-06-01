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
    var bformularz = document.getElementById('formularz');
    bformularz.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("Formularz");
        pokazFormularz();
    });
    $(document).ready(function () {
            $(document).on("click",".submit", function () {
                let nazw = $("#nazw").val();
                let wiek = $("#wiek").val();
                let kraj = $("#kraj option:selected").val();
                let mail = $("#mail").val();

                let jezyki = [];
                $("input:checkbox[name=jezyki]:checked").each(function () {
                    jezyki.push($(this).val());
                });

                let zaplata = $("input[name='zaplata']:checked").val();
              
                $.ajax(
                        {
                            url: "skrypty/formularz.php",
                            method: "POST",
                            data: {
                                nazw,
                                wiek,
                                kraj,
                                mail,
                                jezyki,
                                zaplata,
                                button: this.value,
                                buttonName: this.name
                            },
                            success: function (response) {
                                
                                $("#response").html(response);
       
                                
                            },
                            dataType: "text",
                        }
                );
            });
        

    });
        var bglowna = document.getElementById('glowna');
        bglowna.addEventListener("click", () => {
        console.log("Glowna");
        pokazGlowna();
        });
        
});

function pokazOnas() {
    fetch("http://localhost/11.1lab/skrypty/onas.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}
function pokazGalerie() {
    fetch("http://localhost/11.1lab/skrypty/galeria.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}

function pokazFormularz() {
    fetch("http://localhost/11.1lab/skrypty/formularz.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}

function pokazGlowna() {
    fetch("http://localhost/11.1lab/skrypty/glowna.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}
       //dodaj funkcje do obsługi kolejnych akci
