const prompt = require('prompt-sync')();
let user = prompt('Dígite la palabra: ')
let palabra = user.split('');

let abecedario = {
    a: 'A',
    b: 'B',
    c: 'C',
    d: 'D',
    e: 'E',
    f: 'F',
    g: 'G',
    h: 'H',
    i: 'I',
    j: 'J',
    k: 'K',
    l: 'L',
    m: 'M',
    n: 'N',
    o: 'O',
    p: 'P',
    q: 'Q',
    r: 'R',
    s: 'S',
    t: 'T',
    u: 'U',
    v: 'V',
    w: 'W',
    x: 'X',
    y: 'Y',
    z: 'Z'
};

function EnMayuscula(){
    let PrimeraPosicion = user[0];

        if(abecedario[PrimeraPosicion]){
            PrimeraPosicion = abecedario[PrimeraPosicion];
        
    }
    console.log('La palabra con mayuscula en la primer letra es: ' + PrimeraPosicion + user.slice(1));
};
EnMayuscula();
