<?php
$i = 0;
$recycle_bin = "recycle_bin/";
$elements = $_POST['new_arr'];
$elements = explode(',', $elements);
for($i = 0; $i < count($elements); $i++){
    if($elements[$i] != null){
        $file_element = explode("/", $elements[$i]);
        copy($elements[$i], $recycle_bin . $file_element[count($file_element)-1]);
        unlink($elements[$i]);
    }
}

?>