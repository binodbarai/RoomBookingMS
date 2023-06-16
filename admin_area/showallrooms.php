
<h1>All Rooms</h1>
<table id="datatableid" border="1" rules="all">
    <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Room Image</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
           
            $select = "SELECT * FROM rooms_tbl";
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
                                <a class="delete" href="delete_room.php?deleteid='.$row['room_number'].'">Delete</a>                            
                            </div>
                        </td>
                    </tr>
                    ';
                }
            }
        ?>
    </tbody>
    </table>