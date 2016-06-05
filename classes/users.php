<?php
class Users {
 	
	 private $db;

	 public function __construct($database) 
	 {
	    $this->db = $database;
	 }	
	 
	  public function day() 
	  {
	     date_default_timezone_set('Africa/Cairo');
         $day = date("Y-m-d");
		 return($day);
	  }
	  
	    public function user_exists($user_id) {
	
		$query = $this->db->prepare("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id`= ?");
		$query->bindValue(1, $user_id);
	
		try{
			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		 catch (PDOException $e)
		 {
			die($e->getMessage());
		}
	}
			
	 
	
	
	    public function addUser($user_id , $user_name,$user_email, $user_fname, $user_lname, $user_gender, $user_age, $user_country,$user_friendscount){
		
		$status  = 1;
		$creation_date  = $this->day();
		$query 	= $this->db->prepare("INSERT INTO `users` (`user_id`,`user_name`,`user_email`, `user_fname`, `user_lname`, `user_gender`,`user_age`, `user_country`, `user_friendscount`, `status`,`creation_date`) 
		                              VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
	 
	    $query->bindValue(1, $user_id);
		$query->bindValue(2, $user_name);
		$query->bindValue(3, $user_email);
		$query->bindValue(4, $user_fname);
		$query->bindValue(5, $user_lname);
		$query->bindValue(6, $user_gender);
		$query->bindValue(7, $user_age);
		$query->bindValue(8, $user_country);
		$query->bindValue(9, $user_friendscount);
		$query->bindValue(10, $status);
		$query->bindValue(11, $creation_date);
	 
		try{
			$query->execute();
			return $this->db->lastInsertId();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
	
	
	  public function addLang($user_id , $lang){
		
		$status  = 1;
		$creation_date  = $this->day();
		$query 	= $this->db->prepare("INSERT INTO `langauge` (`user_id`,`lang`) 
		                              VALUES ( ?, ?) ");
	 
	    $query->bindValue(1, $user_id);
		$query->bindValue(2, $lang);
		try{
			$query->execute();

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
	

	public function login($user_id) {

   $query = $this->db->prepare("SELECT  `id` FROM `users` 
		                        WHERE `user_id` = ? ");								 
		$query->bindValue(1, $user_id);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			$id   				 = $data['id'];
				return $id;

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	
	}

	public function userData($user_id) {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $user_id);

		try{
			$query->execute();
			return $query->fetch();
		   }
		   
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
	
	public function userLang($user_id) {

		$query = $this->db->prepare("SELECT * FROM `langauge` WHERE `user_id`= ?");
		$query->bindValue(1, $user_id);

		try{
			$query->execute();
			return $query->fetch();
		   }
		   
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
	  	  	 
    	public function get_count() {

	$query = $this->db->prepare("SELECT count('id')  from `users` ");
		
		try{
			$query->execute();
		   }
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchColumn();
	}         
             
	public function get_users() {

	$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `id` DESC ");
		
		try{
			$query->execute();
		   }
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
    
    
    	public function admin_login($username, $password) {

   $query = $this->db->prepare("SELECT  `id`, `name`, `password` FROM `admin` 
		                        WHERE `name` = ? AND `password` = ? ");								 
		$query->bindValue(1, $username);
		$query->bindValue(2, $password);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			$id   				 = $data['id'];
			$stored_name 	    = $data['name'];
			$stored_password 	= $data['password'];
			
			
			if($stored_password === ($password) && $stored_name === ($username)){
				
				return $id;	
			}
			else
			{
				return false;	
			}

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	
	}
    
       	public function admin_check_password($password) {
       	    echo $password;


   $query = $this->db->prepare("SELECT   `password` FROM `admin` 
		                        WHERE  `password` = ? ");								 
		
		$query->bindValue(1, $password);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			$stored_password 	= $data['password'];
			
			
			if($stored_password === ($password)){
				
				return true ;	
			}
			else
			{
				return false;	
			}

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	
	}
    
    	public function get_admin() {

	$query = $this->db->prepare("SELECT * FROM `admin` ");
		
		try{
			$query->execute();
		   }
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetch();
	}
    
       public function update_admin_name($username) {

      
        $query = $this->db->prepare("UPDATE  `admin` SET  `name` =  ?
		                                                   WHERE  `id` = 1 ");
        $query->bindValue(1, $username);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
       public function update_admin_pic($pc) {

        
        $query = $this->db->prepare("UPDATE  `admin` SET  `pic` =  ?
		                                                   WHERE  `id` = 1 ");
        $query->bindValue(1, $pc);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
         public function update_admin_password($password) {

        $modified_date = $this->day();
        $query = $this->db->prepare("UPDATE  `admin` SET  `password` =  ?
		                                                   WHERE  `id` = 1 ");
        $query->bindValue(1, $password);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
      public function update_user_login($id , $friendscount) {

        $modified_date = $this->day();
        $time = date("Y-m-d H:i:s");

        $query = $this->db->prepare("UPDATE  `users` SET  `user_friendscount` =  ? ,  `last_login_date` =  ?
		                                                   WHERE  `id` = ? ");
        $query->bindValue(1, $friendscount);
           $query->bindValue(2, $time);
             $query->bindValue(3, $id);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
    
    
       
      public function update_user($id , $gender ,$fname   ,$lname   , $country  , $age ,$lang  ){

        $query = $this->db->prepare("UPDATE  `users` SET  `user_gender` =  ? ,  `user_fname` =  ?,
        `user_lname` =  ? ,  `user_country` =  ? , `user_age` =  ? , `lang` =  ? WHERE  `id` = ? ");
       
        $query->bindValue(1, $gender);
        $query->bindValue(2, $fname);
        $query->bindValue(3, $lname);
        $query->bindValue(4, $country);
        $query->bindValue(5, $age);
          $query->bindValue(6, $lang);
         $query->bindValue(7, $id);
       
        

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
    
     public function update_instagram($id ,$followers  ){

        $query = $this->db->prepare("UPDATE  `users` SET  `instagram_followers` =  ?  WHERE  `id` = ? ");
       
        $query->bindValue(1, $followers);
      
         $query->bindValue(2, $id);
       
        

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
           public function update_linkedin($id ,$followers  ){

        $query = $this->db->prepare("UPDATE  `users` SET  `linkedin_followers` =  ?  WHERE  `id` = ? ");
       
        $query->bindValue(1, $followers);
      
         $query->bindValue(2, $id);
       
        

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
       public function update_twitter($id ,$followers  ){

        $query = $this->db->prepare("UPDATE  `users` SET  `twitter_followers` =  ?  WHERE  `id` = ? ");
       
        $query->bindValue(1, $followers);
      
         $query->bindValue(2, $id);
       
        

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
    
    public function update_pinterest($id ,$followers  ){
    
        $query = $this->db->prepare("UPDATE  `users` SET  `pinterest_followers` =  ?  WHERE  `id` = ? ");
       
        $query->bindValue(1, $followers);
      
         $query->bindValue(2, $id);
       
        

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
    
    
    
    
	
	public function del_users() {
		$query = $this->db->prepare("DELETE FROM users WHERE id =  13" );
		$query->execute();
	}

}