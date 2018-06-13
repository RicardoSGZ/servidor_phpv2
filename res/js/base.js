var arr = [];
document.getElementById("btn_add_file").addEventListener("click", function(){
    document.getElementById("upl_file").click();
});
document.getElementById("upl_file").addEventListener("change", function(){
    document.getElementById("upl_form").submit();
});
function showDelBtn(index){
    var check = document.getElementsByClassName("select");
    if(check[index].checked == true){
        document.getElementById("div_add").setAttribute("class", "col-6 col-sm-2");
        document.getElementById("file_options").style.display="block";
        arr[index] = check[index].value;
    }else{
        arr[index] = null;
    }
    var n = 0;
    for(var i = 0; i < arr.length; i++){
        if(arr[i] != null){
            n++;
        }
    }if(n == 0){
        document.getElementById("div_add").setAttribute("class", "col-6 col-sm-2 offset-sm-2");
        document.getElementById("file_options").style.display="none";
    }
}


document.getElementById("btn_del_file").addEventListener("click", function(){
    var confirmation = confirm("¿Desea enviar estos archivos a la papelera?");
    if(confirmation == true){
        var new_arr = arr.join(',');
        $.post('del.php', {new_arr: new_arr});
        alert("Archivo/s enviado/s a la papelera");
        location.reload();
    }else{
        alert("Borrado cancelado");
    }
   
    
});
