
//modales
const container = document.getElementById('main-content');
const boxes = container.querySelectorAll('.box-flip');
const modalPares = document.getElementById('modal-pares')
const modalStart = document.getElementById('modalStart')
const footerModalFinal = document.getElementById('footer-modal-final')
const logoFinal = document.getElementById('logo-final')
const textoPares = document.getElementById('texto-pares')
const tituloPares = document.getElementById('titulo-pares')
const btnStart = document.getElementById('btn-start')
//Siluetas
const maria = document.getElementById('maria')
const baltazar = document.getElementById('baltazar')
const gaspar = document.getElementById('gaspar')
const jesus = document.getElementById('jesus')
const jose = document.getElementById('jose')
const melchor = document.getElementById('melchor')
const pastor = document.getElementById('pastor')
const mulaBuey = document.getElementById('mula-buey')
//Audios
const audioIntro = document.getElementById('Aintro')
const audioCorrecta = document.getElementById('Acorrecta')
const audioIncorrecta = document.getElementById('Aincorrecta')
const audioFinal = document.getElementById('Afinal')
const audioBaltazar = document.getElementById('Abaltazar')
const audioGaspar = document.getElementById('Agaspar')
const audioJesus = document.getElementById('Ajesus')
const audioJose = document.getElementById('Ajose')
const audioMaria = document.getElementById('Amaria')
const audioMelchor = document.getElementById('Amelchor')
const audioMula = document.getElementById('Amula')
const audioPastor = document.getElementById('Apastor')

//datos curiosos
const datosCuriosos = ["Los pesebres tienen sus raíces en la Europa medieval, donde se representaba el nacimiento de Jesucristo con figuras de madera o arcilla.",
    "Se dice que el primer pesebre fue creado por San Francisco de Asís en 1223 en Greccio, Italia. San Francisco quería recrear el nacimiento de Jesús para mostrar a la gente la humildad del Salvador.",
    "En algunos lugares, especialmente en Europa, se realizan representaciones vivientes del pesebre durante la temporada navideña, con personas actuando como los personajes bíblicos.",
    "Los pesebres varían en estilo y diseño según la región y la cultura.Algunos son muy detallados, mientras que otros son más simples.",
    "Además de María, José y el Niño Jesús, los pesebres pueden incluir una variedad de figuras adicionales, como los Reyes Magos, pastores, animales y ángeles.",
    "A lo largo de los años, se han utilizado una amplia gama de materiales para crear pesebres, desde madera y cerámica hasta tela y papel maché.",
    "La tradición del pesebre se ha extendido por todo el mundo y es una parte importante de las celebraciones navideñas en muchas culturas, incluidas las latinoamericanas y las europeas.",
   "Con el tiempo, los pesebres han evolucionado y ahora también pueden encontrarse en formas más modernas, como representaciones digitales o pesebres hechos con materiales reciclados.",
   "Felicidades por completar tu pesebre. Que la Navidad traiga paz, amor y bendiciones a tu hogar."]
    
//controladores
let counterFinal = 0

//desordenar cartas
logoFinal.classList.add('modal-hidden')
footerModalFinal.classList.add('modal-hidden')

function Randomizer(boxes) {
    for (let i = boxes.length; i > 0; i--) {
        let j = Math.floor(Math.random() * i);
        container.insertBefore(boxes[j], boxes[i + 1]);
    }
}

window.addEventListener('DOMContentLoaded', Randomizer(boxes));


//girar cartas

const boxFlips = document.getElementsByClassName('box-flip');
let counter = 0
let prevTarget;


for (let flip of boxFlips) {

    

    flip.addEventListener('click', (e) => {

        if (counter === 0 && !flip.classList.contains('flipped')) {
            flip.classList.add('flipped')
            prevTarget = flip
            counter++
        }

        else if (counter === 1 && !flip.classList.contains('flipped')) { //carta correcta

            if (prevTarget.innerText === flip.innerText) {

                audioCorrecta.play()
                flip.classList.add('flipped')
                counterFinal++
                counter = 0

                textoPares.innerText = datosCuriosos[counterFinal]

                setTimeout(() => {

                    modalPares.classList.remove('modal-hidden')

                    if (counterFinal >= 8) {//modal final
                        tituloPares.innerText = "¡Armaste tu Pesebre!"
                        textoPares.innerText = datosCuriosos[8]
                        btnStart.innerText = "¡De nuevo!"
                        btnStart.onclick = ()=>{
                            location.reload()
                        }
                        logoFinal.classList.remove('modal-hidden')
                        footerModalFinal.classList.remove('modal-hidden')
                    }
                }, 500)

                setTimeout(() => {

                    if (flip.innerText == 'front-A') {
                        maria.classList.add('caida')

                        if (counterFinal == 8) {
                        audioFinal.play()}

                        else {
                            audioMaria.play()
                        }
                    }

                    if (flip.innerText == 'front-B') {
                        jose.classList.add('caida')

                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioJose.play()
                            }
                    }

                    if (flip.innerText == 'front-C') {
                        jesus.classList.add('caida')
                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioJesus.play()
                            }
                    }

                    if (flip.innerText == 'front-D') {
                        melchor.classList.add('caida')

                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioMelchor.play()
                            }
                    }

                    if (flip.innerText == 'front-E') {
                        gaspar.classList.add('caida')
                        
                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioGaspar.play()
                            }
                    }

                    if (flip.innerText == 'front-F') {
                        baltazar.classList.add('caida')
                        
                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioBaltazar.play()
                            }
                    }

                    if (flip.innerText == 'front-G') {
                        pastor.classList.add('caida')
                        
                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioPastor.play()
                            }
                    }

                    if (flip.innerText == 'front-H') {
                        mulaBuey.classList.add('caida')
                        
                        if (counterFinal == 8) {
                            audioFinal.play()}
    
                            else {
                                audioMula.play()
                            }
                    }

                }, 1000)
            }

            else {//carta incorrecta
                audioIncorrecta.play()
                flip.classList.add('flipped')
                setTimeout(() => {
                    flip.classList.remove('flipped')
                    prevTarget.classList.remove('flipped')
                }, 400)
                counter = 0
            }
        }

        console.log(prevTarget.innerText)
        console.log(flip.innerText)

        console.log(prevTarget.innerText == flip.innerText)

    });
}

function removeModalStart() {
    modalStart.classList.add('modal-hidden')
    audioIntro.play()
}

function removeModalPares() {
    modalPares.classList.add('modal-hidden')
}