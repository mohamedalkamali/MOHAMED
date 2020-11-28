<?php   
@session_start();
if(isset($_SESSION['username']))
{
header('Location:login1.html'); 
die();
}
?>
<?php
if($_POST or @$_GET)
{
    if(isset($_POST['Login']) and $_POST['Login']=="Login")
    {
        
        
  
        try 
        {
            $valid=new validator();
            $rules=array("username"=>"checkString");
            if($valid->validate($_POST, $rules)){
                $username=$_POST['username'];
            $password=$_POST['password'];
            }
            $login=new login($username,$password);
            if($mydata=$login->Data())
            {
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['name']=$mydata['name'];
               header('Location:./login1.html');
            }
            else 
                echo '<script>alert("خطأ في اسم المستخدم او كلمة المرور");</script>';
            }
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
   
}
?>

