<?php
include("connection.php");


$id = $_GET['id'];


$sql = "SELECT * FROM emp WHERE id = $id";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 30%;
            margin-right: 30%;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 90%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>

<h2>Update Data</h2>

<form  method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" required>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

    <label for="c_code">Country Code:</label>
    <input type="text" id="c_code" name="c_code" value="<?php echo $row['c_code']; ?>" required>

    <label for="mobile_no">Mobile Number:</label>
    <input type="number" id="mobile_no" name="mobile_no" value="<?php echo $row['mobile_no']; ?>" required>
    
    
    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select>

    <label for="hobbie">Hobbies:</label>
    <input type="text" id="hobbie" name="hobbie" value="<?php echo $row['hobbie']; ?>" required>

    <label for="photo">Photo:</label>
    <input type="file" id="photo" name="photo">
    <br/><br/>
   <center> <input type="submit" value="UPDATE" name="update"></center>
</form>

</body>
</html>


<?php 
}


include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $c_code = $_POST['c_code'];
    $mobile_no = $_POST['mobile_no'];
    $gender = $_POST['gender'];
    $hobbie = $_POST['hobbie'];

    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

        $sql = "UPDATE emp SET fname=?, lname=?, email=?, c_code=?, mobile_no=?, gender=?, hobbie=?, photo=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssi", $fname, $lname, $email, $c_code, $mobile_no, $gender, $hobbie, $photo, $id);
    } else {
    
        $sql = "UPDATE emp SET fname=?, lname=?, email=?, c_code=?, mobile_no=?, gender=?, hobbie=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssi", $fname, $lname, $email, $c_code, $mobile_no, $gender, $hobbie, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
