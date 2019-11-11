<?php 

namespace Core;


use \Core\Model;
use \Core\Rule;
use \Core\DB\Sql;





class Maintenance extends Model
{

	# Session
	const SESSION = "MaintenanceSession";

	# Error - Success
	const SUCCESS = "Maintenance-Success";
	const ERROR = 'Maintenance-Error';



	/*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_maintenance_update(
			               
                :idmaintenance,
                :instatus,
                :desdescription

			)", 
			
			[

				':idmaintenance'=>$this->getidmaintenance(),
				':instatus'=>$this->getinstatus(),
				':desdescription'=>$this->getdesdescription()
				
			]
        
            
        );//end select



	

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save*/




	

	public function update()
	{

		$sql = new Sql();




		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...
			$results = $sql->select("

				CALL sp_maintenance_update(
				               
	                :idmaintenance,
	                :instatus,
	                :desdescription

				)", 
				
				[

					':idmaintenance'=>$this->getidmaintenance(),
					':instatus'=>$this->getinstatus(),
					':desdescription'=>utf8_decode($this->getdesdescription())
					
				]
	        
	            
	        );//end select


			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);


		}//end if
		else
		{



			$results = $sql->select("

				CALL sp_maintenance_update(
				               
	                :idmaintenance,
	                :instatus,
	                :desdescription

				)", 
				
				[

					':idmaintenance'=>$this->getidmaintenance(),
					':instatus'=>$this->getinstatus(),
					':desdescription'=>$this->getdesdescription()
					
				]
	        
	            
	        );//end select


		}//end else

		

		



	

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save

















	public static function checkMaintenance():bool
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_maintenance
			ORDER BY dtregister
			LIMIT 1;

		");//end select


		

		
		if( (int)$results[0]['instatus'] == 0 )
		{

			return false;
			
		}//end if
		{

			return true;

		}//end else

	}//END getEvent






















	public function getMaintenance()
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_maintenance
			ORDER BY dtregister
			LIMIT 1;

		");//end select



		





		
		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				foreach ($results as &$row)
				{
					# code...
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach

			}//end if

		

			$this->setData($results[0]);
			
		}//end if

	}//END getEvent









	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_maintenance

		");//end select


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...
			foreach ($results as &$row)
			{
				# code...
				$row['desdescription'] = utf8_encode($row['desdescription']);

			}//end foreach

		}//end if


		return $results;

	}//END listAll










	public static function setError( $msg )
	{

		$_SESSION[Maintenance::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Maintenance::ERROR]) && $_SESSION[Maintenance::ERROR]) ? $_SESSION[Maintenance::ERROR] : '';

		Maintenance::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Maintenance::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Maintenance::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Maintenance::SUCCESS]) && $_SESSION[Maintenance::SUCCESS]) ? $_SESSION[Maintenance::SUCCESS] : '';

		Maintenance::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Maintenance::SUCCESS] = NULL;

	}//END clearSuccess 











}//END class Maintenance




 ?>