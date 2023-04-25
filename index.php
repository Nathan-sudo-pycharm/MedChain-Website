<?php
$con =mysqli_connect("localhost","root","","image");


    if(isset($_POST['upload'])){
    $file=$_FILES['image']['name'];
    $query="INSERT INTO upload(image) VALUES ('$file')";
    $res=mysqli_query($con,$query);
    if($res){
        move_uploaded_file($_FILES['image']['tmp_name'],"$file");
    }
}
    
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Login</h3>
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="form-control">
                        <input type="submit" name="upload" value="Upload" class="btn btn-success my-3">
                    </form>
            </div>

            <div class="col-md-6">
                    <h3 class="text-center">Displayed Image</h3>

                    <?php
                        $sel="SELECT * FROM upload";
                        $que=mysqli_query($con,$sel);


                        $output="";
                        if(mysqli_num_rows($que)<1){
                            $output.="<h3 class='text-center'>No image Uploaded</h3>";
                        }
                        
                            while($row=mysqli_fetch_assoc($que)){
                                $image=$row['image'];
                                $output.="<img src=' ".$row['image']." ' class='my-3' style='width:400px; height:400px'>";
                            }
                        ?>
                       
            </div>
    </div>
</body>
</html>