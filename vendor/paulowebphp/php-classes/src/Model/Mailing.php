<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Mailing extends Model
{

	# Session
	const SESSION = "MailingSession";

	# Error - Success
	const SUCCESS = "Mailing-Success";
	const ERROR = "Mailing-Error";











	/*public function save()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_mailing_save(
			               
                :idmailing,
                :desname,
                :desemail,
                :desip

			)", 
			
			[

				':idmailing'=>$this->getidmailing(),
				':desname'=>$this->getdesname(),
				':desemail'=>$this->getdesemail(),
				':desip'=>$this->getdesip()
				
			]
        
            
        );//end select
		


		//$results[0]['desname'] = utf8_encode($results[0]['desname']);
	
		


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if
		

		

	}//END save*/




    









    public function save()
	{

		$sql = new Sql();

		

		
	
		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_mailing_save(
				               
	                :idmailing,
	                :desname,
	                :desemail,
	                :desip

				)", 
				
				[

					':idmailing'=>$this->getidmailing(),
					':desname'=>utf8_encode($this->getdesname()),
					':desemail'=>$this->getdesemail(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select
			


			$results[0]['desname'] = utf8_encode($results[0]['desname']);
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_mailing_save(
				               
	                :idmailing,
	                :desname,
	                :desemail,
	                :desip

				)", 
				
				[

					':idmailing'=>$this->getidmailing(),
					':desname'=>$this->getdesname(),
					':desemail'=>$this->getdesemail(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select

	        


		}//end else


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if
		

		

	}//END save



























	public static function checkMailing( $desemail )
	{



		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_mailing
			WHERE desemail = :desemail
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':desemail'=>$desemail

			]
		
		);//end select



		return ( count($results) > 0 );


	}//END checkMailing



































	public function getMailing( $idmailing )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_mailing
			WHERE idmailing = :idmailing
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idmailing'=>$idmailing

			]
		
		);//end select


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
					
			}//end if


			$this->setData($results[0]);
			
		}//end if

	}//END getEvent























	public static function listAll()
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
			FROM tb_mailing 
			ORDER BY dtregister DESC;

		");//end select


		if (count($results) > 0 ) 
		{
			# code...

			if ($_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME )
			{
				# code...
				foreach ($results as &$row) 
				{
					# code...
					$row['desname'] = utf8_decode($row['desname']);

				}//end foreach

			}//end if
			


			return $results;
			
		}//end if
		
	}//END listAll




























	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_mailing
			WHERE idmailing = :idmailing
			
			",
			
			[

				':idmailing'=>$this->getidmailing()

			]
		
		);//end query

	}//END delete




























	public static function setError( $msg )
	{

		$_SESSION[Mailing::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Mailing::ERROR]) && $_SESSION[Mailing::ERROR]) ? $_SESSION[Mailing::ERROR] : '';

		Mailing::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Mailing::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Mailing::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Mailing::SUCCESS]) && $_SESSION[Mailing::SUCCESS]) ? $_SESSION[Mailing::SUCCESS] : '';

		Mailing::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Mailing::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class Mailing




 ?>