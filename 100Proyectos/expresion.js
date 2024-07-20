let expresion = '[ a {  * ( c + d ) ] - 5 }';
let space = expresion.split('');

function Balanceado() {
    let maleta = [];
    let balanceado = true;

    for (let i = 0; i < space.length; i++) {
        let char = space[i];

        if (space[i]=== '{' || space[i] === '[' || space[i] === '(') {
            maleta.push(space[i]);
        } 
        
        if (space[i] === '}' || space[i] === ']' || space[i] === ')') {
            if (maleta.length === 0) {
                balanceado = false;
                break;
            }

        let lastOpen = maleta.pop();

            if ((space[i] === '}' && lastOpen !== '{') ||
                (space[i] === ']' && lastOpen !== '[') ||
                (space[i]=== ')' && lastOpen !== '(')) {
                balanceado = false;
                break;
            }
        }
    }
    if (maleta.length !== 0) {
        balanceado = false;
    }

    if (balanceado) {
        console.log('La expresión ' + expresion + ' está balanceada');
    } else {
        console.log('La expresión ' + expresion + ' no está balanceada');
    }
}

Balanceado();



























































/*let expresion = '{ [ a * ( c + d ) ]  - 5 }';
let space = expresion.split('');
let open = ['{', '[', '('];
let close = ['}', ']', ')'];

function Balanceado() {
    let openCount = 0;
    let closeCount = 0;
    let balanceado = true;
    let i = 0;

    for (let key in space) {
        if (space[key] === '{' || space[key] === '[' || space[key] === '(') {
            openCount++;
            if (space[key] === '{') i = 0;
            else if (space[key] === '[') i = 1;
            else if (space[key] === '(') i = 2;
        }
        if (space[key] === '}' || space[key] === ']' || space[key] === ')') {
            closeCount++;
            if ((space[key] === '}' && i === 0) ||
                (space[key]=== ']' && i === 1) ||
                (space[key] === ')' && i === 2)) {
                balanceado = true;
                break;
            }
        }

        if (closeCount > openCount) {
            balanceado = false;
            break;
        }
    }

    if (balanceado && openCount === closeCount) {
        console.log('La expresión ' + expresion + ' está balanceada');
    } else {
        console.log('La expresión ' + expresion + ' no está balanceada');
    }
}

Balanceado();*/






