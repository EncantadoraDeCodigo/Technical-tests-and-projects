
//Sirve unicamente para evaluar si los caracteres abiertos también están cerrados


let expresion = '{ [ a * ( c + d ] ) - 5 }'; 
let space =expresion.split('')


function Balanceado(){
    let counter= 0;
        if(space[key] == '{' || space[key] == '[' || space[key] == '(' || space[key] == '}' || space[key] == ']' || space[key] == ')'){
            counter++;
        }
    
    if(counter == 6){
        console.log('La expresión ' + expresion + ' está balanceada')
    } else{
        console.log('La expresión ' + expresion + ' no está balanceada')
    }
        
};

Balanceado()



/*let i = user.length - 1; i >= 0; i--*/