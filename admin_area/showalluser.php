<form action="" method="post">
    <div class="searchbox">
        <input type="text" name="search"><input class="search" type="submit" value="Search">
    </div>
    <h1>All users</h1>
</form>
<table border=1 rules="all">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>phone</th>
        <th>Email</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
        $search = "%";
        if(isset($_POST['search'])){
            $search = $search.$_POST['search'];
        }
        $search.= "%";
        $select = "SELECT * FROM user_tbl where username like '".$search."'";
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
    ?>
</table>