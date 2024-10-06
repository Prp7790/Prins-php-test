<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("connection.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $c_code = $_POST['c_code'];
    $mobile_no = $_POST['mobile_no'];
    $addr= $_POST['addr'];
    $gender = $_POST['gender'];
    $hobbie = implode(", ", $_POST['hobbie']);
    
   
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_folder = "uploads/" . basename($photo);
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($photo, PATHINFO_EXTENSION);

    
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true); 
    }

    if (in_array($file_extension, $allowed_extensions)) {
        if (move_uploaded_file($photo_tmp, $photo_folder)) {
            $sql = "INSERT INTO emp (fname, lname, email, c_code, mobile_no, addr, gender, hobbie, photo) 
                    VALUES ('$fname', '$lname', '$email', '$c_code', '$mobile_no', '$addr', '$gender', '$hobbie', '$photo')";
        
            mysqli_query($con, $sql);
        } else {
            echo "Failed to upload photo.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
       
        
        .photo-upload {
            padding: 10px 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="number"], textarea {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            width: 98%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"], input[type="checkbox"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: orange;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: green;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Employee</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>First Name:</label>
            <input type="text" name="fname" required>

            <label>Last Name:</label>
            <input type="text" name="lname" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Country Code:</label>
            <select name="c_code" required>
                <option value="+91">+91 India</option>
                <option value="+1">+1 USA</option>
                <option value="+86">+86 China</option>
                
            </select>

            <label>Mobile Number:</label>
            <input type="number" name="mobile_no" required>

            <label>Address:</label>
            <textarea name="addr" rows="4" required></textarea>

            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female
            <input type="radio" name="gender" value="other" required> other

            <label>Hobbies:</label>
            <input type="checkbox" name="hobbie[]" value="Dance"> Dance
            <input type="checkbox" name="hobbie[]" value="Shopping">Shopping
            <input type="checkbox" name="hobbie[]" value="Painting"> Painting
            <input type="checkbox" name="hobbie[]" value="Photography"> Photography
            

            <div class="photo-upload">
                <label>Photo:</label>
                <input type="file" name="photo" accept="image/*" required>
            </div>

            <center><input type="submit" value="SAVE DATA"></center>
        </form>
    </div>
    <style>
    h2{
        text-align :center;
        
    }
    h4{
        text-align: right;

    }
    table{
        width: 98%;
        margin : 20px;
    }
      </style>

    <h2>Employee List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Gender</th>
        <th>Hobbies</th>
        <th>Photo</th>
        <th>Created Date</th>
        <th>Update</th>
        <th>Delete</th>

    </tr>

    <?php
       include("connection.php");

       $sql = "SELECT * FROM emp ";
       $result = mysqli_query($con, $sql);
 
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['c_code']} {$row['mobile_no']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['hobbie']}</td>
                <td><img src='uploads/{$row['photo']}' width='50'></td>
                <td>{$row['date']}</td>
                <td >
                    <a href='update.php?id={$row['id']}' >Update</a></td>
                  <td >   <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>



</body>
</html>
