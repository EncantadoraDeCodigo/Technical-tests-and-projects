
let a= 0;
let b= 1;
let c= 0;

function SumaFibonacci(){
    process.stdout.write(a + ' ');
    process.stdout.write(b + ' ');
    
    
    while(c < 6765){
        
        c = a + b;
        process.stdout.write(c + ' ');
        a= b;
        b =c;
    }

}

SumaFibonacci();