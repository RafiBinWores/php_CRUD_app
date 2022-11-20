<?php
    include('database.php');

    if(isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `studentinfo`(`id`, `student_id`, `student_name`, `student_email`, `phone`, `gender`) VALUES (NULL,'$student_id','$student_name','$student_email','$phone','$gender')";

        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: index.php?msg=Added Successfully");
        }
        else{
            echo "failed :". mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD App</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="bg-color mb-5 text-center">
            <a href="index.php" class="text-center text-white py-3 fs-1 text-decoration-none">Student Information</a>
        </div>
    </header>

    <main>
        <div class="form-area container">
            <h3 class="text-center mt-4 mb-4 text-color">Add Student Information</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Student ID</label>
                    <input type="tel" class="form-control" id="id" name="student_id" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="name" name="student_name" required> 
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Student Email</label>
                    <input type="email" class="form-control" id="email" name="student_email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone No</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div>
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
                        <option selected>Choose one</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                      </select>
                </div>
                <div class="mt-4 mb-5">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>