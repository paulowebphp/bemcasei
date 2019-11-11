<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;



class ProductConfig extends Model
{

	# Session
	const SESSION = "ProductConfigSession";

	# Error - Success
	const SUCCESS = "ProductConfig-Success";
	const ERROR = "ProductConfig-Error";







	public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_productsconfig_update(
					
				:idproductconfig,
				:iduser,
				:incharge
				
			)", 
			
			[

				":idproductconfig"=>$this->getidproductconfig(),
				":iduser"=>$this->getiduser(),
				":incharge"=>$this->getincharge()
				
			]
        
            
    	);//end select
			

		


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END update












	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_productsconfig
			WHERE iduser = :iduser
			ORDER BY dtregister DESC


			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if 

	}//END get










	public static function setError( $msg )
	{

		$_SESSION[ProductConfig::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[ProductConfig::ERROR]) && $_SESSION[ProductConfig::ERROR]) ? $_SESSION[ProductConfig::ERROR] : '';

		ProductConfig::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[ProductConfig::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[ProductConfig::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[ProductConfig::SUCCESS]) && $_SESSION[ProductConfig::SUCCESS]) ? $_SESSION[ProductConfig::SUCCESS] : '';

		ProductConfig::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[ProductConfig::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class ProductConfig





 ?>