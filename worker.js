/**
 * Created by jinwoo on 2016-05-21.
 */
function fibonacci(number){
    if( number < 2 ){
        return number;
    }else{
        return fibonacci(number-2) + fibonacci(number-1);
    }
}

onmessage = function(event){

    console.log( 'in js' );

    postMessage(event.data +":"+ fibonacci(event.data));
}