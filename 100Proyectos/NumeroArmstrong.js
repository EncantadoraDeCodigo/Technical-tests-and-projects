let number = '500';
let NumeroSeparado = number.split('');
let operador = 0;
let indice = NumeroSeparado.length;
let suma = 0;

function Narcisista(){
    for(let key in NumeroSeparado){
        operador = number[key] ** indice;
        suma += operador;
    };
    if(suma == number){
        console.log(number + ' Es un número narcisista')
    } else{
        console.log(number + ' No es un número narcisista')
    }
};
Narcisista();