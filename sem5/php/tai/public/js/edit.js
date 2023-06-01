let triggers = document.getElementsByClassName("edit");
const toastLive = document.getElementById('liveToast')

const ciasto2 = document.getElementById('ciastoSelect')
const mieso2 = document.getElementById('miesoSelect')
const sosy2 = document.getElementById('sosyCheckbox')
const platnosci2 = document.getElementById('platnosciRadio')

const btn = document.getElementById('przycisk')

for (let i = 0; i < triggers.length; i++) {
  triggers[i].addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLive)
    toast.show()
    btn.addEventListener("onclick", updateOrder(i))
  })
}

function updateOrder(i) {
  let orders = [];
  let newOrders = [];
  if (localStorage.getItem("orders")) {
    orders = localStorage.getItem("orders").split("}");
  }
  for (let j = 0; j < orders.length; j++) {
    if (j % 2 == 0) {
      orders[j] += '}'
      orders[j] = orders[j].slice(1, orders[j].length)
      if (j != i) {
        newOrders.push(orders[j])
      } else {
        let arr = [];
        let arr2 = [];
        for (let i = 0; i < checkbox.length; i++) {
          if (checkbox[i].type == "checkbox")
            if (checkbox[i].checked) arr.push(checkbox[i].value);
        }

        for (let i = 0; i < radios.length; i++) {
          if (radios[i].type == "radio")
            if (radios[i].checked) arr2.push(radios[i].value);
        }

        let data = {
          ciasto: ciasto2.value,
          mieso: mieso2.value,
          sosy: arr,
          platnosc: arr2,
        };

        newOrders.push(data);
      }
    }
  }
  console.log(newOrders)
  if (newOrders.length > 0) {
    localStorage.setItem("orders", JSON.stringify(newOrders));
  } else {
    localStorage.removeItem("orders");
  }
  //window.location.reload();
}