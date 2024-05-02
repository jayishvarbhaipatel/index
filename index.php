<?php require_once "./connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Table</title>

    <style>
        .image
        {
            height: 100px;
            width: 100px;
            border:4px solid skyblue;
            border-radius:40px;
            transition: transform 1.5s;
        }

        .image:hover
        {
            cursor:pointer;
            transform: scale(2.5);  
        }
    </style>
    
</head> 
<body>
    <center>
    <h2 style="background-color: lightblue">Students Data</h2>
    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a href="./form.php" class="btn btn-primary">Add New</a>
        </div>
        <div class="table-responsive">          
            <table class="table table-sm">
                <thead style="background-color:lightblue">
                    <tr>
                        <th>Sr No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>State</th>
                        <th>City</td>
                        <th>Gender</th>
                        <th>Username</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $query="SELECT * FROM `students`";
                        $result=mysqli_query($conn,$query);

                        $i=1;
                        if($result)
                        { 
                            while($data=mysqli_fetch_assoc($result))
                            {
                                if($data['gender'] == 1)
                                {
                                    $gender="Male";
                                    $gender="<span class='badge bg-primary'>Male</span>";
                                }
                                else
                                {
                                    $gender="Female";
                                    $gender="<span class='badge bg-danger'>Female</span>";
                                }
                                echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td><img class='image' src='uploads/".$data['filename']."'/></td>";
                                echo "<td>".$data['fname']. " ".$data['lname']."</td>";
                                echo "<td>".$data['email']."</td>";
                                echo "<td>".$data['Mo']."</td>";
                                echo "<td>".$data['state']."</td>";
                                echo "<td>".$data['city']."</td>";
                                echo "<td>".$gender."</td>";
                                echo "<td>".$data['uname']."</td>";
                                echo "<td><a href='javascript:void(0)' onclick='validation(".$data['id'].")' class='btn btn-danger'><i class='bi bi-trash3'></i></a></td>";
                                echo "<td><a href='./updateform.php?id=".$data['id']."'class='btn btn-primary'><i class='bi bi-pen'></i></a></td>";
                                echo "</tr>";
                        $i++;        
                            }
                        }
                        ?>
                </tbody>
                
        </div>
            </table>
    </div>
    </center>

    <script>
        function validation(id)     
        {
            var a = confirm("Do you want to delete Data ?");
            if(a)
            {
            window.location.href="delete.php?id="+id;
            alert("Data is Deleted");
            }
        }

    </script>
    
</body>
</html>