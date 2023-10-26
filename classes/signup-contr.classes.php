<?php

class SignupContr extends Signup {

	private $uid;
	private $pwd;
	private $pwdRepeat;
	private $email;

	public function __construct($uid, $pwd, $pwdRepeat, $email){

		$this->uid = $uid;
		$this->pwd = $pwd;
		$this->pwdRepeat = $pwdRepeat;
		$this->email = $email;

	}

	public function signupUser(){
		

		

		if ($this->pwdMatch() == false) {
			header("location: ../index.php?error=passwordnotmatch");
			exit();
		}

		

		$this->setUser($this->uid, $this->pwd, $this->email);

	}  

	

	

	private function pwdMatch(){
		$result;
		if ($this->pwd !== $this->pwdRepeat) {
			$result = false;
		}else{
			$result = true;
		}
		return $result;
	}

	







}