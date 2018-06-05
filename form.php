<?php
        $base_path = "files/";
        $prev_url = $_SERVER['HTTP_REFERER'];
        $url = parse_url($prev_url, PHP_URL_QUERY);
        if($url != null){
            $url_arr = explode("=", $url);
            $base_path = $url_arr[1] . "/";
        }
        $new_filename = strtolower($_FILES["upl_file"]["name"]);
        if(!move_uploaded_file($_FILES["upl_file"]["tmp_name"], $base_path . $new_filename)){
            echo "error";
        }
?>
<script>
    window.history.back();
</script>