

<!DOCTYPE html>
<html>
<head>
    
    <title>Registration Form</title>
   

</head>
<body>


  
    <?php
        
        $firstNameErr = $lastNameErr = $emailErr = $genderErr = $userNameErr = $passwordErr = $recoveryEmailErr = "";
        $firstName = $lastName = $email = $gender = $userName = $password = $recoveryEmail = "";

        if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
        {
            if(empty($_POST['fname'])) 
            {
                $firstNameErr = "";
            }
            else
            {
                $firstName = $_POST['fname'];
            }

            if(empty($_POST['lname'])) 
            {
                $lastNameErr = "";
            }
            else
            {
                $lastName = $_POST['lname'];
            }

            if(empty($_POST['email'])) 
            {
                $emailErr = "";
            }
            else
            {
                $email = $_POST['email'];
            }

         

            if(isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
                
                if ($gender == "Male")
                {
                    $gender = "Male";
                }
                else
                {
                    $gender = "Female";
                }


                
            }


            else {
                $genderErr = "";
            }


            if(empty($_POST['uname'])) 
            {
                $userNameErr = "Please Fill Up the UserName";
            }
            else
            {
                $userName = $_POST['uname'];
            }

            if(empty($_POST['password'])) 
            {
                $passwordErr = "Please Fill Up the Password";
            }
            else
            {
                $password = $_POST['password'];
            }

            if(empty($_POST['remail'])) 
            {
                $recoveryEmailErr = "Please Fill Up the Recovery Email";
            }
            else
            {
                $recoveryEmail = $_POST['remail'];
            }

            $arr=array('First Name' =>$firstName  ,'Last Name' =>$lastName  , 'Email' =>$email , 'Gender' =>$gender , 'UserName' =>$userName , 'Password' => $password  , 'Recovery Email' => $recoveryEmail);
           $json_encoded_text=json_encode($arr);
           $file=fopen("user1.txt","w");
           fwrite($file, $json_encoded_text);
           fclose($file);
        }


    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

       
                    <h2>Basic Information</h2>
                    <p>First Name</p>
                    <input type="text" name="fname" value="">
                    <p><?php echo $firstNameErr; ?></p>

                    <p>Last Name</p>
                    <input type="text" name="lname" value="">
                    <p><?php echo $lastNameErr; ?></p>

                    <p>Email</p>
                    <input type="email" name="email" id="" value="">
                    <p><?php echo $emailErr; ?></p>

        
                    <p>Gender</p>     
                    <input type="radio" name="gender" value="Male" >  Male 
                    <input type="radio" name="gender" value="Female" > Female
                    <p><?php echo $genderErr; ?></p>
            
                    <h2>User Account Information</h2>
          

                   <p>UserName</p>
                    <input type="text" name="uname" value="">
                    <p><?php echo $userNameErr; ?></p>

                    <p>Password</p>
                    <input type="password" name="password" value="">
                    <p><?php echo $passwordErr; ?></p>


                    <p>Recovery Email</p>
                    <input type="email" name="remail" value="">
                    <p><?php echo $recoveryEmailErr; ?></p>
                    <input type="submit" name="" value="Submit"> 
                    <input type="reset" name="" value="Reset">




    </form>

   
    
</body>
</html>