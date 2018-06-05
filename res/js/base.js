document.getElementById("btn_add_file").addEventListener("click", function(){
    document.getElementById("upl_file").click();
});
document.getElementById("upl_file").addEventListener("change", function(){
    document.getElementById("upl_form").submit();
});
