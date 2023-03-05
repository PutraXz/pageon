<?php 
    include '../koneksi.php';
    $name = explode('/',  $_SERVER['REQUEST_URI']);
    $test = array("", "", "", "");
    $test = $name;
    if($test[2] == 'wedding'){
        $get = $conn->query("select * from weddings")->fetch_array();
        if($test[3] == $get['name_url']){
            echo 'berhasil';
        }else{
            echo "
                <script>
                window.location.href='/slug';
                </script>
            ";
        }
    }