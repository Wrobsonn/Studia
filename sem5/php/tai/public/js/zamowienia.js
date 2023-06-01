if (localStorage.getItem("orders") !== null) {
  let orders = JSON.parse(localStorage.getItem("orders"));
  for (let i = 0; i < orders.length; i++) {
    $("#orders").append(
      `<div class="order__card">
      <div>${orders[i].ciasto} ${orders[i].mieso} ${orders[i].sosy} ${orders[i].platnosc}</div>
      <div class="buttons">
          <button class="edit">V</button>
          <button class="delete">X</button>
      </div>
  </div>`
    );
  }
} else {
  $("#orders").append(
    `<div class="order__card__missing">
      <div>Brak zamówień</div>
    </div>`
  );
}