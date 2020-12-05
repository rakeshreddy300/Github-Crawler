<?php
    include_once('connection.php');
    $sql = "select * from login";
    
    if($res = mysqli_query($con,$sql)){
        echo "<table class='table'>";
        echo "<tr><th>Username</th><th>Email</th><th>role</th><th>operation</th></tr>";
        while($row= mysqli_fetch_row($res)){
            echo "
                <tr>
                    <td class='{$row[0]}'>$row[0]</td>
                    <td class='{$row[2]}'>$row[2]</td>
                    <td class='{$row[3]}'>$row[3]</td>
                
            ";

            if($row[3] == 'user'){
                echo "<td><a href='javascript:deleteData(\"{$row[0]}\");'>Delete user</a></td>";
                echo "</tr>";
            }
            else{
                echo "<td>none</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

?>