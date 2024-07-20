/*let counter = 0;
let counterMes = 0;
let counterAno = 0;*/
let str1 = '30/6/2024';
let str2 = '1/2/2040';
let strSpace = str1.split('/');
let str2Space = str2.split('/');
let str1Indice = parseInt(strSpace[0]);  
let str2Indice = parseInt(str2Space[0]);
let mes1 = parseInt(strSpace[1]);        
let mes2 = parseInt(str2Space[1]);       
let ano1 = parseInt(strSpace[2]);        
let ano2 = parseInt(str2Space[2]);       

function CuantosDias() {
    let TotalFecha1 = str1Indice + mes1 * 30 + ano1 * 365;
    let TotalFecha2 = str2Indice + mes2 * 30 + ano2 * 365;

    let diferenciaDias = Math.abs(TotalFecha1 - TotalFecha2);
    console.log('Hay ' + diferenciaDias + ' día/s');
};

CuantosDias();


    /*if(str1Indice > str2Indice){
        for(let i = str2Indice; i < str1Indice; i++){
            counter++;
        }
        console.log('Hay ' + counter + ' día/s')
    } 
    else if(str1Indice < str2Indice){
        for(let i = str1Indice; i < str2Indice; i++){
            counter++;
        }
        console.log('Hay ' + counter + ' día/s')
    } else if(counterMes == 0){
        console.log('Las fechas están en el mismo día')
    }

    if(mes1 > mes2){
        for(let i = mes2; i < mes1; i++){
            counterMes++;
        } console.log('Hay ' + counterMes + ' mese/s')
    } else if(mes1 < mes2){
        for(let i = mes1; i < mes2; i++){
            counterMes++;
        } console.log('Hay ' + counterMes + ' mese/s')
    } else if(counterMes == 0){
        console.log('Las fechas están en el mismo mes')
    }

    if(ano1 > ano2){
        for(let i = ano2; i < ano1; i++){
            counterAno++;
        } console.log('Hay ' + counterAno+ ' año/s')
    } else if(ano1 < ano2){
        for(let i = ano1; i < ano2; i++){
            counterAno++;
        } console.log('Hay ' + counterMes + ' mese/s')
    } else if(ano1 == ano2){
        console.log('Las fechas están en el mismo año')
    }*/



    
    
