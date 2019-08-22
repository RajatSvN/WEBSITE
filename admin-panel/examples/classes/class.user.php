<?php

include('class.password.php');

class User extends Password{

    private $dbc;

	function __construct($dbc){
		parent::__construct();

		$this->_db = $dbc;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

	private function get_user_hash($email){

		try {

			$stmt = $this->_db->prepare('SELECT id, email, pass FROM users WHERE email = :email');
			$stmt->execute(array('email' => $email));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}


	public function login($email,$password){

		$user = $this->get_user_hash($email);

		if($this->password_verify($password,$user['pass']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['id'] = $user['id'];
		    $_SESSION['email'] = $user['email'];
		    return true;
		}
	}


	public function logout(){
		session_destroy();
	}

}


?>
