<form action="" method="post">
    <div class="searchbox">
        <input type="text" name="search"><input class="search" type="submit" value="Search">
    </div>
    <h1>All Rooms</h1>
</form>

<table border=1 rules="all">
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Room Image</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
            $search = "%";
            if(isset($_POST['search'])){
                $search = $search.$_POST['search'];
            }
            $search.= "%";
            $select = "SELECT * FROM rooms_tbl where room_number like '".$search."'";
            $result = mysqli_query($conn, $select);
        
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                        <td>'.$row['room_number'].'</td>
                        <td>'.$row['room_type'].'</td>
                        <td><img src="uploadedImages/'.$row['room_image'].'" width="100"></td>
                        <td>'.$row['capacity'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['room_status'].'</td>
                        <td>
                            <div class="operation">
                                <a class="edit" href="update_room.php?updateid='.$row['room_number'].'">Edit/Update</a>
                                <a class="delete" href="delete.php?deleteid='.$row['room_number'].'">Delete</a>                            
                            </div>
                        </td>
                    </tr>
                    ';
                }
            }
        ?>
    </table>