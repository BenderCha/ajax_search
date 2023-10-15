<?php
    $db = mysqli_connect("localhost","root","","ajaxsearch");
    if (!$db)
    {
        echo "Bazaga ulanmadi".mysqli_error();
    }
?>