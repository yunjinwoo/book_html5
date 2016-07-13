var removePrefix = (function(){
    //변수를 선언합니다
    var prefixes = ['webkit','ms','moz','o'];

    //첫 글자를 대문자로 만드는 함수
    var capitalize = function(name){
        return name.substr(0, 1).toUpperCase() + name.substr(1);
    }

    //  프리픽스 제거 함수
    return function(object, name){
        prefixes.forEach(function( prefix ){
            console.log( name, prefix + capitalize(name) );
          //  console.log(  object[prefix + capitalize(name)]);
            object[name] = object[name] || object[prefix + capitalize(name)];
        });
    }
})();