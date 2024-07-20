function SumaFibo(){

    let a= 0;
    let b= 1;
    let c= 0;
    let trin= 1;

    process.stdout.write(a + ', ');
    process.stdout.write(b + ', ');

        while(c < 89){
        c= a +b;
        a = b;
        b = c;
        trin += c
        process.stdout.write(c + ', ');
        
    }

    process.stdout.write('y su suma es: ' + trin)
}

SumaFibo()