/*
 * Crea una única función (importante que sólo sea una) que sea capaz
 * de calcular y retornar el área de un polígono.
 * - La función recibirá por parámetro sólo UN polígono a la vez.
 * - Los polígonos soportados serán Triángulo, Cuadrado y Rectángulo.
 * - Imprime el cálculo del área de un polígono de cada tipo.
 * Área = (a x p)/2
 */

let Triangule= { tipo: 'Triangulo', Altura: 2, Base: 3};
let square = { tipo: 'Square', Lado: 3, Lado: 3};
let Reactangule= { tipo: 'Rectangule', Altura: 2, Base: 3};

function AreaPoligono(Poligono){
    let area;
    if(Poligono.tipo == 'Triangulo'){
        area = (Poligono.Base * Poligono.Altura)/2
        console.log(area);
    } else if( Poligono.tipo == 'Square'){
        area = Poligono.Lado * Poligono.Lado;
        console.log(area);
    } else{
        area = Poligono.Base * Poligono.Altura;
        console.log(area);
    }

};
AreaPoligono(Triangule);
AreaPoligono(square);
AreaPoligono(Reactangule);
//Cada llamada pasa un objeto con los datos necesarios del polígono correspondiente, permitiendo que la función realice los cálculos y muestre el resultado adecuado para cada caso.