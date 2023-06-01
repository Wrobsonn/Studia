let array = document.getElementsByClassName("delete");

for (let i = 0; i < array.length; i++) {
  array[i].addEventListener("click", () => {
    let orders = [];
    let newOrders = [];
    if (localStorage.getItem("orders")) {
      orders = JSON.parse(localStorage.getItem("orders"));
      console.log(orders)
    }

    for(let j = 0; j < orders.length; j++) {
      if(j != i) {
        newOrders.push(orders[j]);
      }
    }
    // console.log(orders.length )
    // for(let j = 0; j < orders.length; j++) {
    //   if(j % 2 == 0) {
    //     orders[j] += '}'
    //     orders[j] = orders[j].slice(1, orders[j].length)
    //     if(j != i) {
    //       newOrders.push(orders[j])
    //     }
    //   }
    //   console.log(orders[j])
    // }
    // console.log(newOrders)
    if(newOrders.length > 0) {
      localStorage.setItem("orders", JSON.stringify(newOrders));
    } else {
      localStorage.removeItem("orders");
    }
    window.location.reload();
  });
}
