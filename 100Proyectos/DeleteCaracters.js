let stringUno = 'lmbcst';
let stringDos = 'kablm';
let sepa = stringUno.split('');
let sepa2 = stringDos.split('');
let all = [];

function Delete() {
    all.push(...sepa, ...sepa2); 

    for (let i = 0; i < sepa.length; i++) {
        for (let j = 0; j < sepa2.length; j++) {
            if (sepa[i] === sepa2[j]) {
                while (all.includes(sepa[i])) {
                    let ParaEliminar = all.indexOf(sepa[i]);
                    if (ParaEliminar!== -1) {
                        all.splice(ParaEliminar, 1);
                    }
                }
            }
        }
    }
    /*let out1= (all.splice(0, 2));
    console.log('La salida uno contien: ' + out1)

    let out2 = (all.splice(0.2))
    console.log('La salida dos contiene: ' + out2)*/
    
    let out1 = all.filter(caracterUno=> sepa.includes(caracterUno));
    let out2 = all.filter(caracterDos=> sepa2.includes(caracterDos));

    console.log('La salida uno contiene: ' + out1.join(''));
    console.log('La salida dos contiene: ' + out2.join(''));
}

Delete();




