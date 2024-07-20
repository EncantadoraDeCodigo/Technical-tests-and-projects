
let Decimal = 450; 
let cociente = Decimal; 
let binario = ' '; 

function DecimalBinario(){
    while(cociente > 0){
        let residuo = cociente % 2; 
        binario = residuo + binario; 
        cociente = Math.floor(cociente / 2); 
    }
    
    console.log(binario); 
}

DecimalBinario();





/*
    dividirlo entre dos, anotando en una columna aparte el resto que 
    obtienes en cada una de las divisiones. Debes poner un 0 si el resultado de 
    la división es par y un 1 si el resultado de la división es impar.
*/