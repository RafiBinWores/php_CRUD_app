<?php
    include('database.php');
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `studentinfo` SET `student_id`='$student_id',`student_name`='$student_name',`student_email`='$student_email',`gender`='$gender' WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: index.php?msg=Updated Successfully");
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
        <div class="bg-color">
            <h2 class="text-center text-white py-3">Student Information</h2>
        </div>
    </header>

    <main>
        <div class="form-area container">
            <h3 class="text-center mt-5 mb-4 text-color">Edit Student Information</h3>

            <?php
                $sql = "SELECT * FROM `studentinfo` WHERE id = $id LIMIT 1";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
            ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Student ID</label>
                    <input type="tel" class="form-control" id="id" name="student_id" value="<?php echo $row['student_id'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="name" name="student_name" value="<?php echo $row['student_name'] ?>" required> 
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Student Email</label>
                    <input type="email" class="form-control" id="email" name="student_email" value="<?php echo $row['student_email'] ?>" required>
                </div>
                <div>
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
                        <option selected>Choose one</option>
                        <option value="Male" <?php echo($row ['gender']=='Male')? "selected":""; ?>>Male</option>
                        <option value="Female" <?php echo($row ['gender']=='Female')? "selected":""; ?>>Female</option>
                        <option value="Others" <?php echo($row ['gender']=='Others')? "selected":""; ?>>Others</option>
                      </select>
                </div>
                <div class="mt-4">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>