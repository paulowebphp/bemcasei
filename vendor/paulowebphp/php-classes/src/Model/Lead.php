<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Lead extends Model
{

	# Session
	const SESSION = "LeadSession";

	# Error - Success
	const SUCCESS = "Lead-Success";
	const ERROR = "Lead-Error";











	/*public function save()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_leads_save(
			               
                :idlead,
                :desname,
                :desemail,
                :desip

			)", 
			
			[

				':idlead'=>$this->getidlead(),
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




    









    public function update()
	{



		$sql = new Sql();


		
	
		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_leads_update(
				               
	                :idlead,
	                :instatus,
	                :desname,
	                :desemail,
	                :despassword,
	                :desoriginalpassword,
	                :nrddd,
	                :nrphone,
	                :desip

				)", 
				
				[

					':idlead'=>$this->getidlead(),
					':instatus'=>$this->getinstatus(),
					':desname'=>utf8_encode($this->getdesname()),
					':desemail'=>$this->getdesemail(),
					':despassword'=>Lead::getPasswordHash($this->getdespassword()),
					':desoriginalpassword'=>base64_encode($this->getdesoriginalpassword()),
					':nrddd'=>$this->getnrddd(),
					':nrphone'=>$this->getnrphone(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select



			/*

			echo '<pre>';
	        var_dump($this);
	        var_dump(Lead::getPasswordHash($this->getdespassword()));
	        var_dump(base64_encode($this->getdesoriginalpassword()));
	        var_dump($results);
	        
	        exit;

	        */


			$results[0]['desname'] = utf8_encode($results[0]['desname']);
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_leads_update(
				               
	                :idlead,
	                :instatus,
	                :desname,
	                :desemail,
	                :despassword,
	                :desoriginalpassword,
	                :nrddd,
	                :nrphone,
	                :desip

				)", 
				
				[

					':idlead'=>$this->getidlead(),
					':instatus'=>$this->getinstatus(),
					':desname'=>utf8_encode($this->getdesname()),
					':desemail'=>$this->getdesemail(),
					':despassword'=>CodeFactory::getPasswordHash($this->getdespassword()),
					':desoriginalpassword'=>base64_encode($this->getdesoriginalpassword()),
					':nrddd'=>$this->getnrddd(),
					':nrphone'=>$this->getnrphone(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select

	        


		}//end else


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if
		

		

	}//END save













	public static function getPasswordHash( $password )
    {
        return password_hash(
            
            $password, 
            
            PASSWORD_DEFAULT, 
            
            [

                'cost'=>12

            ]
        
        );//end password_hash

    }//END getPasswordHash













	public static function checkLeadExists( $desemail )
	{



		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_leads
			WHERE desemail = :desemail
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':desemail'=>$desemail

			]
		
		);//end select



		return ( count($results) > 0 );


	}//END checkLeadExists



































	public function getLead( $idlead )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_leads
			WHERE idlead = :idlead
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idlead'=>$idlead

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
			FROM tb_leads 
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
		
			DELETE FROM tb_leads
			WHERE idlead = :idlead
			
			",
			
			[

				':idlead'=>$this->getidlead()

			]
		
		);//end query

	}//END delete




























	public static function setError( $msg )
	{

		$_SESSION[Lead::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Lead::ERROR]) && $_SESSION[Lead::ERROR]) ? $_SESSION[Lead::ERROR] : '';

		Lead::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Lead::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Lead::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Lead::SUCCESS]) && $_SESSION[Lead::SUCCESS]) ? $_SESSION[Lead::SUCCESS] : '';

		Lead::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Lead::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class Lead




 ?>