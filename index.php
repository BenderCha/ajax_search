<?php
    session_start();
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Ajax Search - CodingBender</title>

</head>
<body>
    <div class="wrapper">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="margin_auto mb-3">
                        <form method="POST" class="mb-5">
                            <input type="search" class="form-control" id="ajaxsearch" placeholder="Nimani izlaymiz?">
                        </form>
                        <button class="btn btn-primary"><a href="add.php" class="text-light">Add</a></button>
                    </div>
                    
                </div>
                <?php
                    if (isset($_SESSION['status']))
                    {
                        echo "<div class='alert alert-info'>".$_SESSION['status']."</div>";
                        unset($_SESSION['status']);
                    }
                ?>
                <div id="search_live"></div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#ajaxsearch").keyup(function()
            {
                var input = $(this).val();
                if (input != "")
                {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {input:input},
                        success:function(data)
                        {
                            $("#search_live").html(data);
                        }
                    });    
                } else {
                    $("#search_live").css("display","none");
                }
            });
        });
    </script>
</body>
</html>