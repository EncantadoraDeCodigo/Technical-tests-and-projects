
// JavaScript para mostrar el modal al cargar la página
document.addEventListener("DOMContentLoaded", function() {
  var modal = document.getElementById("modal");
  modal.style.display = "block"; // Mostrar el modal al cargar la página
});

// JavaScript para activar el juego cuando se hace clic en el botón "Comencemos"
document.getElementById("comencemosBtn").addEventListener("click", function() {
  var modal = document.getElementById("modal");
  modal.style.display = "none"; 
  hacerTablero();
});




hacerTablero();

function hacerTablero() {
  let seleccionadas = []
  //   imagenesTarjeta();
  let imagenes = [
    "/img/parejas-008.png",
    "/img/parejas-007.png",
    "/img/parejas-006.png",
    "/img/parejas-005.png",
    "/img/parejas-004.png",
    "/img/parejas-003.png",
    "/img/parejas-002.png",
    "/img/parejas-001.png",
    "/img/parejas-008.png",
    "/img/parejas-007.png",
    "/img/parejas-006.png",
    "/img/parejas-005.png",
    "/img/parejas-004.png",
    "/img/parejas-003.png",
    "/img/parejas-002.png",
    "/img/parejas-001.png",
  ];

  let tablero = document.getElementById("area-tarjeta");
  let tarjetas = [];
  for (let i = 0; i < 16; i++) {
    tarjetas.push(`<div id="area-tarjeta"  onclick="alHacerClick(${i})"><div class="tarjeta" id="tarjeta${i}">
      <div class="cara trasera" id= "trasera${i}" style="background-image: url('${imagenes[i]}')"></div>
      <div class="cara superior"></div>
      </div>
      </div>`);
  }
  tarjetas.sort(() => Math.random() - 0.5);
  tablero.innerHTML = tarjetas.join(" ");
}
/*Cada vez que se haga una seleccion a una tarjeta se le agraga ese indice a al tarjeta
let seleccionada */

let seleccionadas = [];

function alHacerClick(i) {
  let tarjeta = document.getElementById("tarjeta" + i);
  let trasera = document.getElementById("trasera" + i);

  if (tarjeta.style.transform !== "rotateY(180deg)") {
    tarjeta.style.transform = "rotateY(180deg)";
    seleccionadas.push(i);
  }

  if (seleccionadas.length === 2) {
    setTimeout(() => {
      let trasera1 = document.getElementById("trasera" + seleccionadas[0]);
      let trasera2 = document.getElementById("trasera" + seleccionadas[1]);

      if (trasera1.style.backgroundImage === trasera2.style.backgroundImage) {
        // Mantener las tarjetas volteadas si las imágenes coinciden
        seleccionadas = [];
      } else {
        let tarjeta1 = document.getElementById("tarjeta" + seleccionadas[0]);
        let tarjeta2 = document.getElementById("tarjeta" + seleccionadas[1]);
        tarjeta1.style.transform = "rotateY(0deg)";
        tarjeta2.style.transform = "rotateY(0deg)";
      }
      // Reiniciar la lista de selección después de verificar
      seleccionadas = [];
    }, 1000);
  }
}






