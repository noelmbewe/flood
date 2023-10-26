 <?php

class Login extends Dbh{
   
   protected  function getUser($uid, $pwd){
      $stmt = $this->connect()->prepare('SELECT dlhosPassword FROM admin0611 WHERE dhlos_username = ? OR dlhosEmail =?;');

        if (!$stmt->execute(array($uid, $pwd))) {
        
        $stmt = null;
        header("location ../index.php?error=stmtfailed");
        exit();
      }

      if ($stmt->rowCount() ==  0) {
        
        $stmt = null;
        header("location ../index.php?error=usernotfound");
        exit();
      }

      $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $checkPwd = password_verify($pwd, $pwdHashed[0]["dlhosPassword"]); 
      
      if ($checkPwd == false) {
        $stmt = null;
        header("location ../index.php?error=wrongpassword");
        exit();
      }elseif($checkPwd == true) {
         $stmt = $this->connect()->prepare('SELECT * FROM admin0611 WHERE dhlos_username = ? OR dlhosEmail = ? AND dlhosPassword = ?;');

      if (!$stmt->execute(array($uid, $uid, $pwd))) {
        
        $stmt = null;
        header("location ../index.php?error=stmtfailed");
        exit();
      }


      if ($stmt->rowCount() ==0) {
        
        $stmt = null;
        header("location ../index.php?error=usernotfound");
        exit();
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["userid"] = $user[0]["id"];
      $_SESSION["useruid"] = $user[0]["dhlos_username"];
      
      $stmt = null;


      }

      $stmt = null;


  }


}