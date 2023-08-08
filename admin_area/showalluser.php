<?php
include('../db/connection.php');
if(!isset($_SESSION['userLoggedIn'])){
    header('location:login.php');
}
?>
<h1>All users</h1>
<table id="datatableid" border=1 rules="all">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $select = "SELECT * FROM user_tbl";
        $result = mysqli_query($conn, $select);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>
                        <div class="operation">
                            <a class="edit" href="update.php?updateid='.$row['id'].'">Edit/Update</a>
                            <a class="delete" href="delete.php?deleteid='.$row['id'].'">Delete</a>                            
                        </div>
                    </td>
                </tr>
                ';
            }
        }
        //closing the connection
        mysqli_close($conn);
    ?>
    </tbody>
</table>