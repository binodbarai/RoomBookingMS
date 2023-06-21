<?php
include('../db/connection.php');
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
?>
<a class="addimage1" href="addgallery.php"><div class="addimage">Add Image</div></a>
<h1>Gallery Photos</h1>

<table id="datatableid" border=1 rules="all">
    <thead>
        <tr>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $select = "SELECT * FROM galery_tbl";
        $result = mysqli_query($conn, $select);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                echo '
                <tr>
                    <td>'.$row['image'].'</td>
                    <td>
                        <div class="operation">
                            <a class="delete" href="delete_image.php?deleteid='.$row['id'].'">Delete</a>                            
                        </div>
                    </td>
                </tr>
                ';
            }
        }
    ?>
    </tbody>
</table>