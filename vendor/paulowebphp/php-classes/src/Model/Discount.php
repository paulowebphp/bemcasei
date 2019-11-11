<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Discount extends Model
{

	# Session
	const SESSION = "DiscountSession";

	# Error - Success
	const SUCCESS = "Discount-Success";
	const ERROR = "Discount-Error";



	const MIN_LENGTH = 6;






    
    public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_discounts_update(
			               
                :iddiscount,
                :inscope,
                :instatus,
                :intype,
                :vlpercentage,
                :vlinverse,
                :vlfixed,
                :dtexpire

                

			)", 
			
			[

				
				':iddiscount'=>$this->getiddiscount(),
				':inscope'=>$this->getinscope(),
				':instatus'=>$this->getinstatus(),
				':intype'=>$this->getintype(),
				':vlpercentage'=>$this->getvlpercentage(),
				':vlinverse'=>$this->getvlinverse(),
				':vlfixed'=>$this->getvlfixed(),
				':dtexpire'=>$this->getdtexpire()
				
			]
        
            
        );//end select


		
	

		if( count($results) > 0 )
		{


			$this->setData($results[0]);

		}//end if

        

	}//END save






















	public function getDiscount( $iddiscount )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_discounts
			WHERE iddiscount = :iddiscount
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':iddiscount'=>$iddiscount

			]
		
		);//end select


		if( count($results) > 0 )
		{


			$this->setData($results[0]);
			
		}//end if

	}//END getEvent






































































	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_discounts
			ORDER BY dtregister DESC

		");//end select



		 /**SELECT FOUND_ROWS() NÃO FUNCIONA PARA MYSQL 5.X  */

		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return


		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if  */

	}//END get





















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_discounts
			ORDER BY dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select



		/** SELECT FOUND_ROWS() NÃO FUNCIONA PARA MYSQL 5.X */
		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

    }//END getPage












    




    public function getSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_discounts
			WHERE iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select


		/** SELECT FOUND_ROWS() NÃO FUNCIONA PARA MYSQL 5.X */
		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

    }//END getSearch























    public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("

			SELECT * 
			FROM tb_discounts 
			ORDER BY dtregister DESC;

		");//end select
		
	}//END listAll



















	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_discounts
			WHERE iddiscount = :iddiscount
			
			",
			
			[

				':iddiscount'=>$this->getiddiscount()

			]
		
		);//end query

	}//END delete








	public static function setError( $msg )
	{

		$_SESSION[Discount::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Discount::ERROR]) && $_SESSION[Discount::ERROR]) ? $_SESSION[Discount::ERROR] : '';

		Discount::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Discount::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Discount::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Discount::SUCCESS]) && $_SESSION[Discount::SUCCESS]) ? $_SESSION[Discount::SUCCESS] : '';

		Discount::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Discount::SUCCESS] = NULL;

	}//END clearSuccess 











}//END class Discount




 ?>