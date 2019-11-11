<?php 

namespace Core\DB;

use \Core\Rule;


class Sql {


	/*
	# LOCALHOST
	##############################
	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_amarcasarv3";
	##############################
	*/

	/*
	# HOSTGATOR
	##################################
	const HOSTNAME = "162.241.2.229";
	const USERNAME = "amarca35_user";
	const PASSWORD = "We0@2vtPAzB4";
	const DBNAME = "amarca35_db_amarcasar";
	##################################
	*/


	private $hostname;
	private $username;
	private $password;
	private $dbname;


	private $conn;



	public function __construct()
	{





		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{

			# LOCALHOST
			##############################
			$this->hostname = "127.0.0.1";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "db_amarcasarv3";
			##############################


		}//end if
		else
		{	

			# HOSTGATOR
			##############################
			$this->hostname = "162.241.2.229";
			$this->username = "amarca35_user";
			$this->password = "We0@2vtPAzB4";
			$this->dbname = "amarca35_db_amarcasar";
			##############################


		}//end else



		$this->conn = new \PDO(

			"mysql:dbname=".$this->dbname.";host=".$this->hostname, 
			$this->username,
			$this->password

		);//end PDO



		/*$this->conn = new \PDO(

			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD

		);//end PDO*/

	}//END __construct()





	private function setParams( $statement, $parameters = array() )
	{

		foreach ( $parameters as $key => $value )
		{
			
			$this->bindParam($statement, $key, $value);

		}//end foreach

	}//END setParams






	private function bindParam( $statement, $key, $value )
	{

		$statement->bindParam($key, $value);

	}//END bindParam








	public function query( $rawQuery, $params = array() )
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}//END query





	public function select( $rawQuery, $params = array() )
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}//END select






}//END class Sql



?>