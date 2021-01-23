const simulationBtn = document.querySelector("a[href='SQL/simulation.php']");
const stopBtn = document.createElement("button");

const simulation = () => {
  $.get("SQL/simulation.php");
};

simulationBtn.addEventListener("click", (e) => {
  e.preventDefault();
  simulationBtn.innerHTML = "Simulation en cours...";

  const simu = setInterval(simulation, 1000);

  stopBtn.setAttribute("onclick", `stopSimulation(${simu})`);
  stopBtn.classList.add("btn", "btn-danger", "mt-3");
  stopBtn.innerHTML = "Stop";
  $(stopBtn).insertAfter(simulationBtn);
});

function stopSimulation(simu) {
  clearInterval(simu);
  simulationBtn.innerHTML = "Lancer La Simulation";
}
