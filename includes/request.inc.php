<?php

  if(isset($_POST['submit']))
  {
      include_once 'dbh.inc.php';

      $name=$_POST['name'];
      $id=$_POST['id'];
      $blok=$_POST['blok'];



      if(empty($name)||empty($id)||empty($blok))
        {
          header("Location: ../index.php?request=empty");
          exit();
        }else
        {
          if(!preg_match("/^[a-zA-Z]*$/",$name))
          {
            header("Location: ../index.php?request=char");
            exit();
          }
          else{

            $sql="INSERT INTO users(user_id,user_name,user_blok) VALUES ('$id','$name','$blok');";
            mysqli_query($conn,$sql);

            header("Location: ../index.php?request=success");
            Print '<script>alert("SUBMITTED");</script>';
          }
        }

      }
        else
        {
          header("Location: ../index.php");
        }
