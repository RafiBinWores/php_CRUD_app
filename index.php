<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="bg-color mb-5">
            <h2 class="text-center text-white py-3">Student Information</h2>
        </div>
    </header>

    <div class="container">
      <?php
      if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      ?>


        <a href="add-student.php" class="btn btn-success mb-3">Add Student</a>
        <table class="table table-borderless shadow p-3 mb-5 bg-body rounded">
            <thead class="shadow p-3 mb-5 bg-body rounded">  
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  include("database.php");
                  $sn = 1;
                  $sql = "SELECT * FROM `studentinfo`";
                  $res = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $row['student_id'] ?></td>
                      <td><?php echo $row['student_name'] ?></td>
                      <td><?php echo $row['student_email'] ?></td>
                      <td><?php echo $row['gender'] ?></td>
                      
                      <td>
                          <a href="edit-student.php?id=<?php echo $row ['id'] ?>" class="link-success"><i class="uil uil-edit fs-5 me-3"></i></a>
                          <a href="delete-student.php?id=<?php echo $row ['id'] ?>" class="link-danger"><i class="uil uil-trash-alt fs-5"></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                ?> 
          </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>