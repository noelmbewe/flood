<?php

class Signup extends Dbh{
   
   protected  function setUser($uid, $pwd, $email){
      $stmt = $this->connect()->prepare('INSERT INTO admin0611 (dhlos_username, dlhosPassword, dlhosEmail) VALUES (?,?,?);');
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
      if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
        
        $stmt = null;
        header("location ../index.php?error=stmtfailed");
        exit();
      }

      $stmt = null; 

  }

  

}