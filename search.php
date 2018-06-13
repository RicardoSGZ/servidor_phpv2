<?php include("base.php");?>
        <main class="container-fluid">
            <div class="row mt-1">
                <h5>Búsqueda:</h5>
            </div>
            <div class="row justify-content-start mt-2">
<?php
    $search_file = $_GET['fs'];
    $pattern = "/(" . $search_file . ")/i";
    $directory = 'files/';
    $images = [];
    $folders = [];
    $videos = [];
    $other_files = [];
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    $it->rewind();
    while($it->valid()) {
        if (!$it->isDot()) {
            $file = $it->key();
            if(preg_match($pattern, $file) == 1){
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
        }
        $it->next();
    }
    foreach($folders as $folder){
        echo "<div class='col-6 col-sm-2'><a id='fold_link' href='index.php?f=" . $folder . "'>
        <img class='img-thumbnail' src='res/imgs/folder.svg'/>
        <h5 class='text-center'>" . basename($folder) . "</h4></a>
    </div>";
    }
    foreach($images as $image){
        echo "<div class='col-6 col-sm-2'><a href='" . $image . "'>
        <img class='img-thumbnail' src='res/imgs/image.svg'/>
        <h5 class='text-center text-truncate'>" . basename($image) . "</h4></a>
    </div>";
    }
    foreach($videos as $video){
        echo "<div class='col-6 col-sm-2'><a href='" . $video . "'>
        <img class='img-thumbnail' src='res/imgs/file.svg'/>
        <h5 class='text-center text-truncate'>" . basename($video) . "</h4></a>
    </div>";
    }
    foreach($other_files as $other_file){
        echo "<div class='col-6 col-sm-2'><a href='" . $other_file . "'>
        <img class='img-thumbnail' src='res/imgs/file.svg'/>
        <h5 class='text-center text-truncate'>" . basename($other_file) . "</h4></a>
    </div>";
    }
?>
            </div>
        <?php include("fin.php"); ?>
