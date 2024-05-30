<?php
    include('bdcon.php');

    if (isset($_POST['update'])) {
       
        $postid = $_POST['postid'];
        $description = $_POST['description'];
        $skills = $_POST['skills'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $location = $_POST['location'];
        $title = $_POST['title'];

       
        $query = "UPDATE post SET postdescription='$description', skills='$skills', price='$price', 
                  category='$category', postlocation='$location', posttitle='$title' WHERE postid='$postid'";
        $result = mysqli_query($con, $query);

        if ($result) {
            
            header("Location: /source-code/buyer.php");
            exit();
        } else {
            
            header("Location: /source-code/editpost.php?postid=$postid&error=true");
            exit();
        }
    }
?>
