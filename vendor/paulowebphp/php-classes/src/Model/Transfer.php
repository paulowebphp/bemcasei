<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Rule;
use \Core\Model;
use \Core\Model\Cart;
use \Core\Model\Address;
use \Core\Model\Payment;
use \Moip\Moip;
use \Moip\Auth\BasicAuth;



class Transfer extends Model
{

	# Session
	const SESSION = "TransferSession";

	# Error - Success
	const SUCCESS = "Transfer-Success";
	const ERROR = "Transfer-Error";





	public function save()
	{
			

		$sql = new Sql();

		$results = $sql->select("


			CALL sp_transfers_save(

				:idtransfer,
				:iduser,
				:destransfercode,
				:intransferstatus,
				:destransferholdername,
				:desbanknumber,
				:desagencynumber,
				:desagencycheck,
				:desaccounttype,
				:desaccountnumber,
				:desaccountcheck,
				:vlamount
		

			)", 
			
			[

				
				':idtransfer'=>$this->getidtransfer(),
				':iduser'=>$this->getiduser(),
				':destransfercode'=>$this->getdestransfercode(),
				':intransferstatus'=>$this->getintransferstatus(),
				':destransferholdername'=>$this->getdestransferholdername(),
				':desbanknumber'=>$this->getdesbanknumber(),
				':desagencynumber'=>$this->getdesagencynumber(),
				':desagencycheck'=>$this->getdesagencycheck(),
				':desaccounttype'=>$this->getdesaccounttype(),
				':desaccountnumber'=>$this->getdesaccountnumber(),
				':desaccountcheck'=>$this->getdesaccountcheck(),
				':vlamount'=>$this->getvlamount()

			]
		
		);//end select


		//$results[0]['destransferholdername'] = utf8_encode($results[0]['destransferholdername']);



		



		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if


	}//END save




























	/*public function save()
	{
			

		$sql = new Sql();

		$results = $sql->select("


			CALL sp_transfers_save(

				:idtransfer,
				:iduser,
				:destransfercode,
				:intransferstatus,
				:destransferholdername,
				:desbanknumber,
				:desagencynumber,
				:desagencycheck,
				:desaccounttype,
				:desaccountnumber,
				:desaccountcheck,
				:vlamount
		

			)", 
			
			[

				
				':idtransfer'=>$this->getidtransfer(),
				':iduser'=>$this->getiduser(),
				':destransfercode'=>$this->getdestransfercode(),
				':intransferstatus'=>$this->getintransferstatus(),
				':destransferholdername'=>utf8_decode($this->getdestransferholdername()),
				':desbanknumber'=>$this->getdesbanknumber(),
				':desagencynumber'=>$this->getdesagencynumber(),
				':desagencycheck'=>$this->getdesagencycheck(),
				':desaccounttype'=>$this->getdesaccounttype(),
				':desaccountnumber'=>$this->getdesaccountnumber(),
				':desaccountcheck'=>$this->getdesaccountcheck(),
				':vlamount'=>$this->getvlamount()

			]
		
		);//end select


		//$results[0]['destransferholdername'] = utf8_encode($results[0]['destransferholdername']);



		



		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if


	}//END save*/















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_transfers
		    WHERE iduser = :iduser;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select




		if(count($results) > 0)
		{

			$this->setData($results);
		}//end if


	}//END get
































	public static function getSumCompleted( $iduser )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT SUM(a.amount) as sumamount, 
		    FROM tb_transfers a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    WHERE a.iduser = :iduser
            AND e.intransferstatus = 2;




		", 
			
			[

				':iduser'=>$iduser

			]

		);//end selec

		
		
		if(count($results) > 0)
		{

			return $results[0];


		}//end if
		else
		{

			return [

				'sumamount'=>0.00

			];

		}//en else


	}//END getPage

































	public static function getFromDestransfercode( $destransfercode )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_transfers a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_persons c ON c.idperson = b.idperson
		    INNER JOIN tb_consorts d ON b.iduser = d.iduser
		    WHERE a.destransfercode = :destransfercode
		    ORDER BY a.dtregister DESC
		    LIMIT 1;

			", 
			
			[

				':destransfercode'=>$destransfercode

			]
		
		);//end select



		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
				$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);
				
					
			}//end if


			return $results[0];
			
		}//end if
		else
		{

			return false;

		}



	}//END getFromDespaymentcode





















	public static function updateFromNotification( $idtransfer, $intransferstatus )
	{


		$sql = new Sql();

		$sql->query("

			UPDATE tb_transfers 
			SET intransferstatus = :intransferstatus,
			dtlastwebhook = NOW()
		    WHERE idtransfer = :idtransfer;

			", 
			
			[

				':idtransfer'=>$idtransfer,
				':intransferstatus'=>$intransferstatus

			]
		
		);//end query



		return true;


	}//END getFromDespaymentcode













	public static function setError( $msg )
	{

		$_SESSION[Transfer::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Transfer::ERROR]) && $_SESSION[Transfer::ERROR]) ? $_SESSION[Transfer::ERROR] : '';

		Transfer::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Transfer::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Transfer::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Transfer::SUCCESS]) && $_SESSION[Transfer::SUCCESS]) ? $_SESSION[Transfer::SUCCESS] : '';

		Transfer::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Transfer::SUCCESS] = NULL;

	}//END clearSuccess 





	








}//END class Transfer




 ?>