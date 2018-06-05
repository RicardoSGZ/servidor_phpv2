<?php include("base.php");?>
        <main class="container-fluid">
            <div class="row mt-1">
                <div class="col-sm-10">
                    <ul id="navegacion" class="list-inline">
                        <?php
                            $navegacion ="<li class='list-inline-item'><a href='/nube'>Mi unidad</a></li>";
                                if(isset($_GET["f"])){
                                    $f_original = $_GET["f"];
                                    $arr = explode("/",$f_original);
                                    $arr_ori = explode("/", $f_original);
                                    array_shift($arr);
                                    $links = "";
                                    for($i = 0; $i < count($arr); $i++){
                                        $links .= $arr_ori[$i] . "/";
                                        $navegacion .= " <li class='list-inline-item'>&gt;</li>
                                        <li class='list-inline-item'><a href='index.php?f=" . $links . $arr[$i] . "'>" . $arr[$i] . "</a></li>";
                                    }
                                    echo $navegacion;
                                }else{
                                    echo $navegacion;
                                }
                        ?>
                    </ul>
                </div>
                <div class="col-6 col-sm-2">
                    <form method="post" action="form.php" id="upl_form" enctype="multipart/form-data">
                        <input type="file" name="upl_file" id="upl_file" hidden/>
                        <button id="btn_add_file" type="button" class="btn btn-primary w-100">Subir archivo</button>
                    </form>
                </div>
            </div>
            <?php
            function muestra($base_path){
                $files = scandir($base_path);
                $images = [];
                $folders = [];
                $videos = [];
                $other_files = [];
                foreach ($files as $file){
                    if(strpos($file, "jpg") || strpos($file, "JPG") || strpos($file, "png")){
                        array_push($images, $file);
                    }else if(strcmp($file, ".") == 0 || strcmp($file, "..") == 0){
                    }else if(strpos($file, "mp4") || strpos($file, "avi")){
                        array_push($videos, $file);
                    }else if(preg_match('/\.[A-Za-z0-9]/', $file)){
                        array_push($other_files, $file);
                    }else{
                        array_push($folders, $file);
                    }	
                }
                foreach($folders as $folder){
                    echo "<div class='col-6 col-sm-2'><a id='fold_link' href='index.php?f=" . $base_path . $folder . "'>
                    <img class='img-thumbnail' src='res/imgs/folder.svg'/>
                    <h5 class='text-center'>" . $folder . "</h4></a>
                </div>";
                }
                foreach($images as $image){
                    echo "<div class='col-6 col-sm-2'><a href='" . $base_path . $image . "'>
                    <img class='img-thumbnail' src='res/imgs/image.svg'/>
                    <h5 class='text-center text-truncate'>" . $image . "</h4></a>
                </div>";
                }
                foreach($videos as $video){
                    echo "<div class='col-6 col-sm-2'><a href='" . $base_path . $video . "'>
                    <img class='img-thumbnail' src='res/imgs/file.svg'/>
                    <h5 class='text-center text-truncate'>" . $video . "</h4></a>
                </div>";
                }
                foreach($other_files as $other_file){
                    echo "<div class='col-6 col-sm-2'><a href='" . $base_path . $other_file . "'>
                    <img class='img-thumbnail' src='res/imgs/file.svg'/>
                    <h5 class='text-center text-truncate'>" . $other_file . "</h4></a>
                </div>";
                }
            }
            ?>
            <div class="row justify-content-start mt-2">
            <?php
                if(isset($_GET["f"])){
                    $f = $_GET["f"] . "/";
                    muestra($f);  
                }else{
                    muestra("files/");
                } 
            ?>
            </div>
        <?php include("fin.php"); ?>
