<?php
    include 'connect.php';
    $query = "SELECT * FROM `emp_db`";
    $result = mysqli_query($connection, $query);

    if(isset($_POST['delete'])){
        $deleteid = $_POST['delete'];
        $deleteQuery = "DELETE FROM `emp_db` WHERE emp_id='$deleteid'";
        $deleteResult = mysqli_query($connection, $deleteQuery);
        if($deleteResult){
            echo "Employee data delete successfull !!";

            header("Refresh:0");
        }else{
            echo "Error deleting record: " . mysqli_error($connection);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <style>
        table, th, td { 
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Employee Data</h1>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Full Name</th>
                <th>Department</th>
                <th>Location</th>
                <th>project</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" .$row['emp_id']. "</td>";
                    echo "<td>" .$row['empName']. "</td>";
                    echo "<td>" .$row['department']. "</td>";
                    echo "<td>" .$row['location']. "</td>";
                    echo "<td>" .$row['project']. "</td>";
                    echo "<td><a href='edit.php?id=".$row['emp_id']."'>Edit</a> </td>";
                    echo '<td><form action="" method="POST"><button type="submit" name="delete" value="'.$row['emp_id'].'">Delete</button></form> </td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <h3><a href='index.html'>Insert new employee data</a></h3>
</body>
</html>
