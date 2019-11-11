<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Consort extends Model
{

	# Session
	const SESSION = "ConsortSession";

	# Error - Success
	const SUCCESS = "Consort-Success";
	const ERROR = "Consort-Error";





    
    /*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_consorts_update(
			               
                :idconsort,
                :iduser,
                :desconsort,
                :desconsortemail,
                :desphoto,
                :desextension

			)", 
			
			[

				':idconsort'=>$this->getidconsort(),
				':iduser'=>$this->getiduser(),
				':desconsort'=>$this->getdesconsort(),
				':desconsortemail'=>$this->getdesconsortemail(),
				':desphoto'=>$this->getdesphoto(),
				':desextension'=>$this->getdesextension()
				
			]
        
            
        );//end select
		
		

		//$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);

		
	

		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if

		

	}//END save*/



















	public function update()
	{

		$sql = new Sql();

		

		

		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

			CALL sp_consorts_update(
			               
                :idconsort,
                :iduser,
                :desconsort,
                :desconsortemail,
                :desphoto,
                :desextension

			)", 
			
			[

				':idconsort'=>$this->getidconsort(),
				':iduser'=>$this->getiduser(),
				':desconsort'=>utf8_decode($this->getdesconsort()),
				':desconsortemail'=>$this->getdesconsortemail(),
				':desphoto'=>$this->getdesphoto(),
				':desextension'=>$this->getdesextension()
				
			]
        
            
        );//end select
		
		

		$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_consorts_update(
				               
	                :idconsort,
	                :iduser,
	                :desconsort,
	                :desconsortemail,
	                :desphoto,
	                :desextension

				)", 
				
				[

					':idconsort'=>$this->getidconsort(),
					':iduser'=>$this->getiduser(),
					':desconsort'=>$this->getdesconsort(),
					':desconsortemail'=>$this->getdesconsortemail(),
					':desphoto'=>$this->getdesphoto(),
					':desextension'=>$this->getdesextension()
					
				]
	        
	            
	        );//end select

	        


		}//end else

	

		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if

		

	}//END save









	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_consorts
			WHERE iduser = :iduser

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		//$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);

		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);
					
			}//end if

			$this->setData($results[0]);
			
		}//end if


	}//END get


















	


	public function deletePhoto( $basename )
	{
		try 
		{
			//code...
			if( 
			
				$basename != '0.jpg'
				||
				$basename != ''
				||
				!is_null($basename)
			
			)
			{
		
	
				$filename = $_SERVER['DOCUMENT_ROOT'] . 
				DIRECTORY_SEPARATOR . "uploads" . 
				DIRECTORY_SEPARATOR . "images" . 
				DIRECTORY_SEPARATOR . 
				$basename;
				
				unlink( $filename );
	
				return true;
	
			}//end if

		}//end try
		catch (\Throwable $th) 
		{
			//throw $th;
			return false;

		}//end catch

	}//END delete












	public static function setError( $msg )
	{

		$_SESSION[Consort::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Consort::ERROR]) && $_SESSION[Consort::ERROR]) ? $_SESSION[Consort::ERROR] : '';

		Consort::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Consort::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Consort::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Consort::SUCCESS]) && $_SESSION[Consort::SUCCESS]) ? $_SESSION[Consort::SUCCESS] : '';

		Consort::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Consort::SUCCESS] = NULL;

	}//END clearSuccess 















}//END class Consort




 ?>