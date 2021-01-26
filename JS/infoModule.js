const container = document.querySelector(".container");
const h1 = document.querySelector("h1");
const row = document.querySelector(".row");
const btns = document.querySelectorAll("button[id]");
const info = document.createElement("div");
const selects = document.querySelectorAll("select");

// Retourne un HTML contenant les informations sélectionnées dans la liste à choix multiple
function arraySelect(id, data) {
  let option;
  let html = "";

  html += `<h3>${data["name"].toUpperCase()}</h3><ul>`;
  for (let i = 0; i < selects[id].options.length; i++) {
    if (selects[id].options[i].selected === true) {
      option = selects[id].options[i].value;

      if (option === "temperature") {
        html += `<li>Température : ${data[option]}°C</li>`;
      } else if (option === "operating_time") {
        html += `<li>Durée de fonctionnement : ${data[option]}s</li>`;
      } else if (option === "number_of_data_sent") {
        html += `<li>Nombre de données envoyées : ${data[option]}</li>`;
      }
    }
  }
  html += `</ul>`;

  return html;
}

function callback2(data) {
  btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const idBtn = btn.id;

      h1.classList.replace("mb-5", "mb-3");
      info.classList.add("alert", "alert-info", "mt-4", "mb-5");
      info.innerHTML = arraySelect(idBtn, data[idBtn]);
      container.insertBefore(info, row);
    });
  });
}

function ajax2() {
  $.get("SQL/alert.php", callback2, "json");
}

$(document).ready(ajax2);
setInterval(ajax2, 1000);
