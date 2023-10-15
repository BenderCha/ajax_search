<?php
    session_start();
    include "db.php";
    if (isset($_POST['input']))
    {
        $input = $_POST['input'];

        $search_query = "SELECT * FROM `users` WHERE name LIKE '{$input}%' OR email LIKE '{$input}%' OR mobile LIKE '{$input}%' OR country LIKE '{$input}%' LIMIT 3";
        $search_query_run = mysqli_query($db, $search_query);

        if (mysqli_num_rows($search_query_run) > 0) 
        { ?>
        <div class="col-lg-12">
            <div class="dbtable">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Country</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if ($search_query_run)
                                {
                                    while($row = mysqli_fetch_assoc($search_query_run))
                                    {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $mobile = $row['mobile'];
                                        $country = $row['country'];
                                        echo "<tr>";
                                        echo "<th>$id</th>";
                                        echo "<td>$name</td>";
                                        echo "<td>$email</td>";
                                        echo "<td>$mobile</td>";
                                        echo "<td>$country</td>";
                                        echo "<td><img src='https://i.ibb.co/6JRg5rk/505544.jpg' width='100'></td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <?php 
        } else { 
            echo "Bunday ma'lumot yoq"; 
        }
    }
?>
