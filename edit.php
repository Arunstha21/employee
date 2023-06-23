<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM emp_db WHERE emp_id = '$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
}

if(!$connection){
    echo "No Connection with Database";
}else{
    if(isset($_POST['submit'])){
        $empName = $_POST['empName'];
        $department = $_POST['department'];
        $location = $_POST['location'];
        $project = $_POST['project'];

        $query = "UPDATE emp_db SET empName = '$empName', department = '$department', location = '$location', project = '$project' WHERE emp_id = $id";
        echo "$query <br>";
        $res = mysqli_query($connection, $query);
        if($res){
            echo "Date Edited Succesfully !!";
            header("Location: emp_data.php");
            exit();
        }else {
            echo "Error in data Insert". mysqli_error($connection);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Data</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Full Name</label>
        <input type="text" name="empName" value="<?php echo $row['empName'] ?>"><br>
        <label for="">Department</label>
        <input type="text" name="department" value="<?php echo $row['department'] ?>"><br>
        <label for="">Location</label>
        <input type="text" name="location" value="<?php echo $row['location'] ?>"><br>
        <label for="">Project</label>
        <input type="text" name="project" value="<?php echo $row['project'] ?>"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>