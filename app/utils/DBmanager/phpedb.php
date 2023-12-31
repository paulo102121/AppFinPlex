<?php
namespace app\utils\DBmanager;
class database
{

	public $database=null;

	public $db="";

	private function error_page($error, $sql="")
	{
		debug_print_backtrace();
		exit("<meta charset=\"utf-8\"><br><br><center><h1>Error : ".$error."\n".$sql."</h1></center>");
	}

	public function connect($host="localhost",$user="root",$pass="herba2121")
	{
		try
		{
			$this->database=new PDO("mysql:host=$host;",$user,$pass);
			$this->database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->database->query('SET NAMES '.'utf8mb4');
		}
		catch(PDOException $e)
		{
			$this->database=null;
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function check()
	{
		if($this->database == null)
		{
			return false;
		}
		return true;
	}

	public function disconnect()
	{
		$this->database=null;
	}

	public function selectRaw($query)
	{
		try
		{
			$stmt = $this->database->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function selectsRaw($query)
	{
		try
		{
			$stmt = $this->database->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function query($query,$error=true)
	{
		try
		{
			$this->database->exec($query);
		}
		catch(PDOException $e)
		{
			if($error == true)
			{
				$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
			}
		}
	}

	public function create_database($name,$error=true)
	{
		try
		{
			$this->query("CREATE DATABASE ".$name." CHARACTER Set utf8 COLLATE utf8_general_ci;",$error);
		}
		catch(PDOException $e)
		{
			if($error == true)
			{
				$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
			}
		}
	}

	public function selects($table,$clause=[],$after="",$fields="*")
	{
		try
		{
			$sql = "SELECT ".$fields." FROM `".$this->db."`.`".$table."` ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ";
					if($operator == "IS" || $operator == "is") {
						$sql.=$value;
					}
					else {
						$sql.="? ";
					}
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=" ". $after." ";
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						if($value[0] == "is" || $value[0] == "IS") {
							continue;
						}
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
			//return $stmt->fetchAll();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function select($table,$clause=[],$after="", $fields="*")
	{
		try
		{
			$sql = "SELECT ".$fields." FROM `".$this->db."`.`".$table."` ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ";
					if($operator == "IS" || $operator == "is") {
						$sql.=$value;
					}
					else {
						$sql.="? ";
					}
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=" ". $after." ";
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						if($value[0] == "is" || $value[0] == "IS") {
							continue;
						}
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
			$data=$stmt->fetch(PDO::FETCH_ASSOC);
			if($data == null || $data == "") {
				return [];
			}
			return $data;
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function sum($table, $column, $clause=[]) {
		try
		{
			$sql = "select SUM(".$column.") FROM `".$this->db."`.`".$table."` ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ? ";
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
			return $stmt->fetchColumn(0);
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function count($table,$clause=[])
	{
		try
		{
			$sql = "select count(*) FROM `".$this->db."`.`".$table."` ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ";
					if($operator == "IS" || $operator == "is") {
						$sql.=$value;
					}
					else {
						$sql.="? ";
					}
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						if($value[0] == "is" || $value[0] == "IS") {
							continue;
						}
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
			return (int) $stmt->fetchColumn(0);
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function delete($table,$clause=[])
	{
		try
		{
			$sql = "DELETE FROM `".$this->db."`.`".$table."` ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ";
					if($operator == "IS" || $operator == "is") {
						$sql.=$value;
					}
					else {
						$sql.="? ";
					}
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						if($value[0] == "is" || $value[0] == "IS") {
							continue;
						}
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function insert($table,$values)
	{
		try
		{
			$sql = "INSERT INTO `".$this->db."`.`".$table."`(";
			$sql_values="";
			$current=0;
			$count=count($values);
			if(count($values) > 0)
			{
				foreach($values as $name=>$value)
				{
					$sql.=$name;
					$sql_values.=" ? ";
					if($current != $count-1){$sql.=",";$sql_values.=",";}
					$current++;
				}
			}
			$sql.=") VALUES (";
			$sql.=$sql_values;
			$sql.=");";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($values) > 0)
			{
				foreach($values as $name=>$value)
				{
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
			return $this->database->lastInsertId();
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}

	public function update($table,$clause,$values)
	{
		try
		{
			$sql = "UPDATE `".$this->db."`.`".$table."` SET ";
			$current=0;
			$count=count($values);
			if(count($values) > 0)
			{
				foreach($values as $name=>$value)
				{
					$sql.=$name . " = " . " ? ";
					if($current != $count-1){$sql.=",";}
					$current++;
				}
			}
			$sql.=" ";
			$current=0;
			$count=count($clause);
			if(count($clause) > 0)
			{
				$sql.=" WHERE ";
				foreach($clause as $name=>$value)
				{
					$operator="=";
					$do="and";
					if(is_array($value))
					{
						$operator=$value[0];
						$do=$value[1];
						$value=$value[2];
					}
					$sql.=$name . " ". $operator ." ";
					if($operator == "IS" || $operator == "is") {
						$sql.=$value;
					}
					else {
						$sql.="? ";
					}
					if($current != $count-1)
					{
						$sql.=" ".$do." ";
					}
					$current++;
				}
			}
			$sql.=";";
			$stmt = $this->database->prepare($sql);
			$current_all=1;
			if(count($values) > 0)
			{
				foreach($values as $name=>$value)
				{
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			if(count($clause) > 0)
			{
				foreach($clause as $name=>$value)
				{
					if(is_array($value))
					{
						if($value[0] == "is" || $value[0] == "IS") {
							continue;
						}
						$value=$value[2];
					}
					$stmt->bindValue($current_all,$value,PDO::PARAM_STR);
					$current_all++;
				}
			}
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			$this->error_page($e->getMessage(), isset($sql) ? $sql : null);
		}
	}
}
