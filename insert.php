<?php
    include 'connect.php';
    if(!$connection){
        echo "No connection Established with Database";
    }else{
        if(isset($_POST['submit'])){
            $empName = $_POST['empName'];
            $department = $_POST['department'];
            $location = $_POST['location'];
            $project = $_POST['project'];

            $query = "INSERT INTO emp_db(empName, department, location, project) VALUES ('$empName', '$department', '$location', '$project')";
            echo "$query <br>";
            $res = mysqli_query($connection, $query);
            echo "$res <br>";

            if($res){
                echo "Data Inserted <br>";
                echo "<h3><a href='emp_data.php'>List Employee</a></h3>";
                echo "<h3><a href='index.html'>Insert new employee data</a></h3>";
            }else{
                echo "Error in Data Insert <br>". mysqli_error($connection);
            }
        }
    }
?>
