/*
 * Escribe un programa que se encargue de comprobar si un número es o no primo.
 * Hecho esto, imprime los números primos entre 1 y 100.
 */

function EsPrimo() {
    
    for(let i = 1; i <= 100; i++) {
        let count = 0;
        
        for(let j = 1; j <= i; j++) {
            if(i % j === 0) {
            count++;
            }
        }
        
        if(count == 2) {
            console.log(i + ' Es primo');
        }else{
            console.log(i)
        }
    }
}

EsPrimo();
