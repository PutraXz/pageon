<?php 
    $name = explode('/',  $_SERVER['REQUEST_URI']);
    $test = array("", "", "", "");
    $test = $name;
    if($test[2] == 'wedding'){
        if($test[3] == 'asd'){
            echo 'berhasil';
        }else{
            echo "
                <script>
                window.location.href='/slug';
                </script>
            ";
        }
    }