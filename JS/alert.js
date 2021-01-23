const alert = document.createElement("div");

function divAlert(data, html) {
  data.forEach((module) => {
    const card = document.querySelector(`[id="module${module["id"]}"]`);
    const logo = card.querySelector("i");
    const para = card.querySelector("p");

    if (module["state"] == 1) {
      card.classList.replace("card-danger", "card-success");
      logo.classList.replace("fa-times-circle", "fa-check-circle");
      para.classList.replace("text-danger", "text-success");
      logo.nextSibling.textContent = " En marche";
    } else if (module["state"] == 0) {
      html += `<li class="li${module["id"]}">La température du module <strong>${module["name"]}</strong> est de <strong>${module["temperature"]}°C</strong></li>`;

      card.classList.replace("card-success", "card-danger");
      logo.classList.replace("fa-check-circle", "fa-times-circle");
      para.classList.replace("text-success", "text-danger");
      logo.nextSibling.textContent = " Arrêt";
    }
  });
  html += `</ul>`;

  return html;
}

function callback(data) {
  let flag = 0;
  let html = "";

  data.forEach((module) => {
    if (module["state"] == 0) flag = 1;
  });

  if (flag == 1) {
    html = `<h3>ATTENTION</h3><ul>`;
    alert.classList.add("alert", "alert-danger", "mt-4", "mb-5");
    alert.innerHTML = divAlert(data, html);
    container.insertBefore(alert, h1);
  }
}

function ajax() {
  $.get("SQL/alert.php", callback, "json");
}

$(document).ready(ajax);
setInterval(ajax, 1000);
