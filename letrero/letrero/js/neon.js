function ConvertirNeon(){
    if(document.getElementById("dpdFuentes").value==''){
        alert("Debes seleccionar una fuente");
        return 0;
    }
    var colorTextoNeon = document.getElementById("txtColor").value;
    document.getElementById("txtLetreroNeon").style.fontFamily =document.getElementById("dpdFuentes").value;
    document.getElementById("txtLetreroNeon").style.color = "black"
    document.getElementById("txtLetreroNeon").style.textShadow ="0 0 25px rgba(0,0,0,5) , 0 0 5px rgba(0,0,0,1) , 0 0 2px rgba(0,0,0,1) , 0 0 35px "+ colorTextoNeon +" , 0 0 35px "+ colorTextoNeon+" , 0 0 35px "+ colorTextoNeon+" , 0 0 35px "+colorTextoNeon;
    document.getElementById("txtLetreroNeon").innerHTML= document.getElementById("txtLetrero").value;

}

