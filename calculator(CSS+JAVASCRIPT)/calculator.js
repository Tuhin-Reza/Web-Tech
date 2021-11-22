function DeleteMe() {
    document.getElementById("Display").value = "" ;  
}
function calculator(NewValue){
    document.getElementById("Display").value += NewValue; 
}
function Answer() {
    var a = document.getElementById("Display").value ;
    var b = eval(a);
    if (typeof b === "undefined") {    
    }else{
        document.getElementById("Display").value = b;
    }
}
 
    