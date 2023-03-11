<?php
session_start();
session_destroy();
setcookie("login_computers", "", time() - 3600);
echo "
    <script>
        window.location.href='login';
    </script>
";