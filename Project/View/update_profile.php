<?php
   session_start();
    if (count($_SESSION) === 0) {
        header("Location: ../Controller/signout.php");
    }
    include('../Controller/profileAction.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/edit_profile.css">
        <script src="js/footer.js" defer></script>
    <script src="js/edit_profile.js" defer></script>
    <title>Update Profile</title>
</head>
<body> 
    <?php
        include('inc/header.php');
    ?>
    <form name="registration" action="../Controller/update_profileAction.php" method="POST" onsubmit="return validation(this);">
        <div class="img">
         <div class="option">
            <h1 class="hedding">Update Profile</h1>
            <div class="border">
        <table>
            <tr>
                <td class="label">Enter First Name</td>
                <td>
                    <input type="text"class="input-box" name="fname" id="fname" placeholder="Enter First Name Here" ><br>
                    <span class="error" id="fnameErr"></span>
                    <span class="error"><?php if(isset($_COOKIE["fnameErr"])) { 
                        echo $_COOKIE["fnameErr"]; 
                      }
                    ?></span>
                
                </td>
            </tr>
            <tr>
                <td class="label">Enter Last Name</td>
                <td>
                    <input type="text"class="input-box" name="lname" id="lname" placeholder="Enter Last Name Here"><br>
                    <span class="error" id="lnameErr"></span>
                     <span class="error"><?php if(isset($_COOKIE["lnameErr"])) { 
                        echo $_COOKIE["lnameErr"]; 
                      }
                    ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Enter Email</td>
                <td>
                    <input type="text"class="input-box"  name="mail" id="mail" placeholder="Enter E-mail Id Here"><br>
                    <span class="error" id="mailErr"></span>
                    <span class="error"> <?php if(isset($_COOKIE["mailErr"])) { 
                        echo $_COOKIE["mailErr"]; 
                      }
                    ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Fixed User_Name</td>
                <td>
                    <input type="text"class="input-box" name="username" id="username" value="<?php echo $User_Name ;?>" readonly ><br>
                     <span class="error" id="userErr"></span>
                      <span class="error"><?php if(isset($_COOKIE["userErr"])) { 
                        echo $_COOKIE["userErr"]; 
                      }
                    ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Enter Password</td>
                <td>
                    <input type="password"class="input-box" name="pass" id="pass" placeholder="Enter Password Here" onInput="checkpassword()"><br>
                     <span class="error"><span id="passErr"></span>
                    <?php if(isset($_COOKIE["passErr"])) { 
                        echo $_COOKIE["passErr"]; 
                      }
                    ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Enter_Confirm_Password</td>
                <td>
                    <input type="password"class="input-box" name="cpass" id="cpass"placeholder="Confirm Password Here" ><br>
                     <span class="error" id="cpassErr"></span>
                     <span class="error"><?php if(isset($_COOKIE["cpassErr"])) { 
                        echo $_COOKIE["cpassErr"]; 
                      }
                    ?></span>
                </td>
            </tr>
            <tr>
                <td><input type="reset"class="submit" name="clear" value="Clear Form"></td>
                <td>
                    <input type="submit"class="button" name="submit" id="submit" value="Update">
                </td>
            </tr>           
        </table>
        </div>
    </div>
        </div>
    </form>

    <?php
        include('inc/footer.php');
    ?>
</body>
</html>