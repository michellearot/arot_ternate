<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="style.css"> 

</head>
<body>


    <div class="container">
        <?php
        session_start();
        include("config.php");

      
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

     
            $query = "SELECT * FROM student_information WHERE id = $id";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
               
                ?>
                <h1> Student Details</h1>
                <ul>
                <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                <p><strong>Student ID:</strong> <?php echo $row['student_id']; ?></p>
                <p><strong>Full Name:</strong> <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?></p>
                <p><strong>Birthday:</strong> <?php echo $row['birthday']; ?></p>
                <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                <p><strong>Date Created:</strong> <?php echo $row['dateCreated']; ?></p> 
                <a href="index.php" class="btn btn-primary">Go Back</a>
                </ul>
                <?php
            } else {
                echo "Student info not found.";
                header("Location: index.php? msg=Successfully Deleted");
            }
        } else {
            echo "Invalid ID.";
        }
        ?>
    </div>

    <style>
       
       body {
           display: flex;
           justify-content: center;
           align-items: center; 
       }

       .container h1{
        font-size: 50px;
        align-items: center;  
        position: absolute;
       }

       .container ul{
        margin-top: 60%;
       }
      
       .container ul p{
        line-height: 50px;
        align-items: center;
        font-size: 20px;
        text-align: left;
       }

        .container a{
            background: #000;
            padding: 20px;
            border-radius: 20px;
            color: #fff;
            text-decoration: none;
            line-height: 50px;
        }      
   </style>

</body>
</html>