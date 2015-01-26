<?php
 //for other general functionalities...
class General{
private $db;

 public function __construct($database){
  
   $this->db=$database;


}

public function posts($f)
{
$query = $this->db->prepare("SELECT * FROM posts WHERE Id = '$f' && postTitle != ' ' ORDER BY postID DESC LIMIT 5");
	//$query->bindValue(1, $admin_id);
	//$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";
	
	try{

        $query->execute();
        return $query->fetchAll();
		 
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}

public function member($f)
{
	$query = $this->db->prepare("SELECT * FROM `member` where Id ='$f'");
	
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

public function score($f)
{
	$query = $this->db->prepare("SELECT * FROM score  WHERE Id =  '$f' ORDER BY score_id DESC LIMIT 1");
	
	try{
		
		$query->execute();
		$data = $query->fetch();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

public function cricscore($f)
{
	$query = $this->db->prepare("SELECT * FROM posts  WHERE Id =  '$f' && postTitle =' ' ORDER BY postID DESC LIMIT 1");
	
	try{
		
		$query->execute();
		$data = $query->fetch();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}
public function gallery($f)

{

		$query = $this->db->prepare("SELECT * FROM `upload` where Id ='$f'");
		try{
				
				
				// $data = $query->fetch();
				
		$query->execute();
		$data = $query->fetchAll();
		return $data;
			
			}catch(PDOException $e){
			
				die($e->getMessage());
			}
}


public function dashboard($id)
{
	$query = $this->db->prepare("SELECT * FROM comments WHERE Id=$id ORDER BY comment_id DESC LIMIT 8 ");
	//$query->bindValue(1, $admin_id);
	//$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";
	
	try{

        $query->execute();
        return $query->fetchAll();
		
    
		//return ($query->execute());
		 
    
    
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}
public function team($team_id)
{
	$query =$this->db->prepare("SELECT Team FROM Teams WHERE Id='$team_id' ");
	try{
	$query->execute();
	return $query->fetch();

	}catch(PDOException $e){
		die($e->getMessage());
	}
}
}
?>
