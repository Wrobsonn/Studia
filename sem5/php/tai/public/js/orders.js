const ciasto = document.getElementById("ciastoSelect");
const mieso = document.getElementById("miesoSelect");
const checkbox = document.getElementsByClassName("sauceCheckbox");
const radios = document.getElementsByClassName("paymentRadio");
const uwagi = document.getElementById("uwagiText");

// walidacja formularza

let orders = [];
if (localStorage.getItem("orders")) {
  orders = JSON.parse(localStorage.getItem("orders"));
  console.log(orders)
}

function handleFormSubmit(event) {
 // event.preventDefault();

  let isValid = true;

  console.log(ciasto.selectedIndex)
  console.log(mieso.value)

  ciasto.classList.remove("is-invalid");
  ciasto.classList.add("is-valid");
  mieso.classList.remove("is-invalid");
  mieso.classList.add("is-valid");

  if (uwagi.value.length <= 0) {
    uwagi.classList.add("is-invalid");
    uwagi.classList.remove("is-valid");
    isValid = false;
  } else {
    uwagi.classList.remove("is-invalid");
    uwagi.classList.add("is-valid");
  }

  if (!anyCheckbox()) {
    for (let i = 0; i < checkbox.length; i++) {
      checkbox[i].classList.add("is-invalid");
      checkbox[i].classList.remove("is-valid");
    }
    isValid = false;
  } else {
    for (let i = 0; i < checkbox.length; i++) {
      checkbox[i].classList.remove("is-invalid");
      checkbox[i].classList.add("is-valid");
    }
  }

  if (!anyRadio()) {
    for (let i = 0; i < radios.length; i++) {
      radios[i].classList.add("is-invalid");
      cheradiosckbox[i].classList.remove("is-valid");
    }
    isValid = false;
  } else {
    for (let i = 0; i < radios.length; i++) {
      radios[i].classList.remove("is-invalid");
      radios[i].classList.add("is-valid");
    }
  }
  if (isValid) {
    let arr = [];
    let arr2 = '';
    for (let i = 0; i < checkbox.length; i++) {
      if (checkbox[i].type == "checkbox")
        if (checkbox[i].checked) arr.push(checkbox[i].value);
    }

    for (let i = 0; i < radios.length; i++) {
      if (radios[i].type == "radio")
        if (radios[i].checked) arr2 = radios[i].value;
    }
    let data = {
      ciasto: ciasto.value,
      mieso: mieso.value,
      sosy: arr,
      platnosc: arr2,
      uwagi: uwagi.value,
    };



    orders.push(data);
    localStorage.setItem("orders", JSON.stringify(orders));
  }

   window.location.reload();
}

function anyCheckbox() {
  for (let i = 0; i < checkbox.length; i++) {
    if (checkbox[i].type == "checkbox") if (checkbox[i].checked) return true;
  }
  return false;
}
function anyRadio() {
  for (let i = 0; i < radios.length; i++) {
    if (radios[i].type == "radio") if (radios[i].checked) return true;
  }
  return false;
}

//document.querySelector("form").addEventListener("submit", handleFormSubmit);
