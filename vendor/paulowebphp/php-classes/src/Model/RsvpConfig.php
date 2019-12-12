<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class RsvpConfig extends Model
{

	# Session
	const SESSION = "RsvpConfigSession";

	# Error - Success
	const SUCCESS = "RsvpConfig-Success";
	const ERROR = "RsvpConfig-Error";





    
    public function update()
	{

		$sql = new Sql();

		
		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...
			$results = $sql->select("

				CALL sp_rsvpconfig_update(
							
					:idrsvpconfig,
					:iduser,
					:inclosed,
					:inadultsconfig,
					:inmaxadultsconfig,
					:inchildren,
					:inchildrenconfig,
					:inmaxchildrenconfig,
					:inchildrenage,
					:desadultstitle,
					:desadultsdescription


				)", 
				
				[

					':idrsvpconfig'=>$this->getidrsvpconfig(),
					':iduser'=>$this->getiduser(),
					':inclosed'=>$this->getinclosed(),
					':inadultsconfig'=>$this->getinadultsconfig(),
					':inmaxadultsconfig'=>$this->getinmaxadultsconfig(),
					':inchildren'=>$this->getinchildren(),
					':inchildrenconfig'=>$this->getinchildrenconfig(),
					':inmaxchildrenconfig'=>$this->getinmaxchildrenconfig(),
					':inchildrenage'=>$this->getinchildrenage(),
					':desadultstitle'=>utf8_decode($this->getdesadultstitle()),
					':desadultsdescription'=>utf8_decode($this->getdesadultsdescription())
					
				]
			
				
			);//end select

			$results[0]['desadultstitle'] = utf8_encode($results[0]['desadultstitle']);
			$results[0]['desadultsdescription'] = utf8_encode($results[0]['desadultsdescription']);

		
		}//end if
		else
		{

			$results = $sql->select("

				CALL sp_rsvpconfig_update(
							
					:idrsvpconfig,
					:iduser,
					:inclosed,
					:inadultsconfig,
					:inmaxadultsconfig,
					:inchildren,
					:inchildrenconfig,
					:inmaxchildrenconfig,
					:inchildrenage,
					:desadultstitle,
					:desadultsdescription


				)", 
				
				[

					':idrsvpconfig'=>$this->getidrsvpconfig(),
					':iduser'=>$this->getiduser(),
					':inclosed'=>$this->getinclosed(),
					':inadultsconfig'=>$this->getinadultsconfig(),
					':inmaxadultsconfig'=>$this->getinmaxadultsconfig(),
					':inchildren'=>$this->getinchildren(),
					':inchildrenconfig'=>$this->getinchildrenconfig(),
					':inmaxchildrenconfig'=>$this->getinmaxchildrenconfig(),
					':inchildrenage'=>$this->getinchildrenage(),
					':desadultstitle'=>$this->getdesadultstitle(),
					':desadultsdescription'=>$this->getdesadultsdescription()
					
				]
			
				
			);//end select
		

		}//end else


		
		


 
		if( count($results) > 0 )
		{

			$this->setData($results[0]);

        }//end if
        
       

	}//END save









    
	public function get( $iduser )
	{

		$sql = new Sql();

		
		$results = $sql->select("

			SELECT  *
			FROM tb_rsvpconfig
			WHERE iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		



		
			

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{
				# code...
				$results[0]['desadultstitle'] = utf8_encode($results[0]['desadultstitle']);
				$results[0]['desadultsdescription'] = utf8_encode($results[0]['desadultsdescription']);
				
			}//end if

			$this->setData($results[0]);
			
		}//end if 

	}//END get






	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_rsvpconfig
			WHERE idrsvpconfig = :idrsvpconfig
			
			",
			
			[

				':idrsvpconfig'=>$this->getidrsvpconfig()

			]
		
		);//end query

	}//END delete












	public static function setError( $msg )
	{

		$_SESSION[RsvpConfig::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[RsvpConfig::ERROR]) && $_SESSION[RsvpConfig::ERROR]) ? $_SESSION[RsvpConfig::ERROR] : '';

		RsvpConfig::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[RsvpConfig::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[RsvpConfig::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[RsvpConfig::SUCCESS]) && $_SESSION[RsvpConfig::SUCCESS]) ? $_SESSION[RsvpConfig::SUCCESS] : '';

		RsvpConfig::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[RsvpConfig::SUCCESS] = NULL;

	}//END clearSuccess 









	public function toSession()
	{
		$_SESSION[RsvpConfig::SESSION] = $this->getValues();

	}//END toSession







	public function getFromSession()
	{

		$this->setData($_SESSION[RsvpConfig::SESSION]);

	}//END getFromSession











}//END class RsvpConfig




 ?>