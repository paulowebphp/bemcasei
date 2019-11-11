<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class SocialMedia extends Model
{

	# Session
	const SESSION = "SocialMediaSession";

	# Error - Success
	const SUCCESS = "SocialMedia-Success";
	const ERROR = "SocialMedia-Error";





    
    public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_socialmedias_update(
			               
                :idsocialmedia,
                :iduser,
                :desfacelink1,
                :desfacelink2,
                :desfacelink3,
                :desinstalink1,
                :desinstalink2,
                :desinstalink3,
                :desyoutubelink1,
                :desyoutubelink2,
                :desyoutubelink3,
                :destwitterlink1,
                :destwitterlink2,
                :destwitterlink3

			)", 
			
			[

				':idsocialmedia'=>$this->getidsocialmedia(),
				':iduser'=>$this->getiduser(),
				':desfacelink1'=>$this->getdesfacelink1(),
				':desfacelink2'=>$this->getdesfacelink2(),
				':desfacelink3'=>$this->getdesfacelink3(),
				':desinstalink1'=>$this->getdesinstalink1(),
				':desinstalink2'=>$this->getdesinstalink2(),
				':desinstalink3'=>$this->getdesinstalink3(),
				':desyoutubelink1'=>$this->getdesyoutubelink1(),
				':desyoutubelink2'=>$this->getdesyoutubelink2(),
				':desyoutubelink3'=>$this->getdesyoutubelink3(),
				':destwitterlink1'=>$this->getdestwitterlink1(),
				':destwitterlink2'=>$this->getdestwitterlink2(),
				':destwitterlink3'=>$this->getdestwitterlink3()
				
			]
        
            
        );//end select
		
		

		

		


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
			FROM tb_socialmedias
			WHERE iduser = :iduser
			

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if

	}//END getBestFriend









	public static function getSocialMediaArray( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_socialmedias
			WHERE iduser = :iduser
			

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		

		if( count($results) > 0 )
		{

			return $results[0];
			
		}//end if

	}//END getBestFriend





















	public static function setError( $msg )
	{

		$_SESSION[SocialMedia::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[SocialMedia::ERROR]) && $_SESSION[SocialMedia::ERROR]) ? $_SESSION[SocialMedia::ERROR] : '';

		SocialMedia::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[SocialMedia::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[SocialMedia::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[SocialMedia::SUCCESS]) && $_SESSION[SocialMedia::SUCCESS]) ? $_SESSION[SocialMedia::SUCCESS] : '';

		SocialMedia::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[SocialMedia::SUCCESS] = NULL;

	}//END clearSuccess 












}//END class SocialMedia




 ?>