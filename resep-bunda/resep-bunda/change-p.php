<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    include "db_conn.php";

if (
    isset($_POST['password']) && isset($_POST['new-password'])
    && isset($_POST['c-new-password'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $password = validate($_POST['password']);
    $newpassword = validate($_POST['new-password']);
    $cnewpassword = validate($_POST['c-new-password']);
 
        if (empty($password)) {
            header("Location: change_pass.php?error=old password is required");
            exit();
        }elseif(empty($newpassword)){
            header("Location: change_pass.php?error=new password is required");
            exit();
        }elseif($newpassword !== $cnewpassword){
            header("Location: change_pass.php?error=the confirmation password does not match");
            exit();
        }else{
            $password = md5($password);
            $newpassword = md5($newpassword);
            $id = $_SESSION['id'];

            $sql = "SELECT password FROM users WHERE id='$id' AND password='$password'";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $sql2 = "UPDATE users set password='$newpassword' WHERE id='$id'";

                mysqli_query($conn, $sql2);
                header("Location: change_pass.php?success=your password has been changed successfully");
                exit();
            }else{
                header("Location: change_pass.php?error=incorrect password");
                exit();
            }
        }
    }else {
    header("Location: home.php");
    exit();
    }
}else {
    header("Location: index.php");
    exit();
}
?>