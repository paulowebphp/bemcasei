<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;




class InitialPage extends Model
{




	# Session
	const SESSION = "InitialPageSession";

	# Error - Success
	const SUCCESS = "InitialPage-Success";
	const ERROR = "InitialPage-Error";







    
    public function update()
	{

		$sql = new Sql();
		
       
		$results = $sql->select("

			CALL sp_initialpages_update(

				:idinitialpage,
				:iduser,
                :inparty,
                :inbestfriend,
				:inalbum

			)", 
			
			[

				':idinitialpage'=>$this->getidinitialpage(),
				':iduser'=>$this->getiduser(),
				':inparty'=>$this->getinparty(),
				':inbestfriend'=>$this->getinbestfriend(),
				':inalbum'=>$this->getinalbum()

			]
		
		);//end select



		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save












	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_initialpages
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

	}//END get











	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("

			SELECT * FROM tb_weddings

		");//end select

	}//END listAll











	public static function setError( $msg )
	{

		$_SESSION[InitialPage::ERROR] = $msg;

	}//END setError












	public static function getError()
	{

		$msg = (isset($_SESSION[InitialPage::ERROR]) && $_SESSION[InitialPage::ERROR]) ? $_SESSION[InitialPage::ERROR] : '';

		InitialPage::clearError();

		return $msg;

	}//END getError











	public static function clearError()
	{
		$_SESSION[InitialPage::ERROR] = NULL;

	}//END clearError











	public static function setSuccess($msg)
	{

		$_SESSION[InitialPage::SUCCESS] = $msg;

	}//END setSuccess











	public static function getSuccess()
	{

		$msg = (isset($_SESSION[InitialPage::SUCCESS]) && $_SESSION[InitialPage::SUCCESS]) ? $_SESSION[InitialPage::SUCCESS] : '';

		InitialPage::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[InitialPage::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class InitialPage









 ?>