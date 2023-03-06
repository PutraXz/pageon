<?php 
    include '../koneksi.php';
    $name = explode('/',  $_SERVER['REQUEST_URI']);
    $test = array("", "", "", "");
    $test = $name;
    // print_r($test);
    if($test[3] == 'wedding'){
        $get = $conn->query("select * from weddings inner join themes on themes.theme_id=weddings.theme_id where name_url='$test[4]'")->fetch_array();
        if($test[4] == $get['name_url']){
            include '../assets/theme/'.$get['name_theme'];
        }else{
            echo "
                <script>
                window.location.href='/wedding-native';
                </script>
            ";
        }
    }