<?php
    include('database.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM `studentinfo` WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        if($res){
            header("Location: index.php?msg=Student Record Deleted Successfully");
        }
        else{
            echo "failed :". mysqli_error($conn);
        }
    }
?>