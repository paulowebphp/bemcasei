<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Moip\Moip;
use \Moip\Auth\OAuth;




class Account extends Model
{

	const SESSION_ERROR = "AccountError";
	const SUCCESS = 'AccountSuccess';
	



	

	/*public function save()
	{

		

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_accounts_save(

				:idaccount,
				:iduser,
				:desaccountcode,
				:desaccesstoken,
				:deschannelid,
				:desname,
				:desemail,
				:nrcountryarea,
				:nrddd,
				:nrphone,
				:intypedoc,
				:desdocument,
			  	:deszipcode, 
				:desaddress,
				:desnumber, 
			  	:descomplement,
			  	:desdistrict, 
			  	:descity, 
			  	:desstate, 
			  	:descountry, 
			  	:dtbirth

			);", 
			
			[

				':idaccount'=>$this->getidaccount(),
				':iduser'=>$this->getiduser(),
				':desaccountcode'=>$this->getdesaccountcode(),
				':desaccesstoken'=>$this->getdesaccesstoken(),
				':deschannelid'=>$this->getdeschannelid(),
				':desname'=>$this->getdesname(),
				':desemail'=>$this->getdesemail(),
				':nrcountryarea'=>$this->getnrcountryarea(),
				':nrddd'=>$this->getnrddd(),
				':nrphone'=>$this->getnrphone(),
				':intypedoc'=>$this->getintypedoc(),
				':desdocument'=>$this->getdesdocument(),
				':deszipcode'=>$this->getdeszipcode(),			
				':desaddress'=>$this->getdesaddress(),
				':desnumber'=>$this->getdesnumber(),			
				':descomplement'=>$this->getdescomplement(),
				':desdistrict'=>$this->getdesdistrict(),
				':descity'=>$this->getdescity(),
				':desstate'=>$this->getdesstate(),
				':descountry'=>$this->getdescountry(),
				':dtbirth'=>$this->getdtbirth()

			]
		
		);//end select

		
		//$results[0]['desname'] = utf8_encode($results[0]['desname']);
		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desstate'] = utf8_encode($results[0]['desstate']);


		


		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if



	}//END save*/





























	public function save()
	{

		

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_accounts_save(

				:idaccount,
				:iduser,
				:desaccountcode,
				:desaccesstoken,
				:deschannelid,
				:desname,
				:desemail,
				:nrcountryarea,
				:nrddd,
				:nrphone,
				:intypedoc,
				:desdocument,
			  	:deszipcode, 
				:desaddress,
				:desnumber, 
			  	:descomplement,
			  	:desdistrict, 
			  	:descity, 
			  	:desstate, 
			  	:descountry, 
			  	:dtbirth

			);", 
			
			[

				':idaccount'=>$this->getidaccount(),
				':iduser'=>$this->getiduser(),
				':desaccountcode'=>$this->getdesaccountcode(),
				':desaccesstoken'=>$this->getdesaccesstoken(),
				':deschannelid'=>$this->getdeschannelid(),
				':desname'=>utf8_decode($this->getdesname()),
				':desemail'=>$this->getdesemail(),
				':nrcountryarea'=>$this->getnrcountryarea(),
				':nrddd'=>$this->getnrddd(),
				':nrphone'=>$this->getnrphone(),
				':intypedoc'=>$this->getintypedoc(),
				':desdocument'=>$this->getdesdocument(),
				':deszipcode'=>$this->getdeszipcode(),			
				':desaddress'=>utf8_decode($this->getdesaddress()),
				':desnumber'=>$this->getdesnumber(),			
				':descomplement'=>utf8_decode($this->getdescomplement()),
				':desdistrict'=>utf8_decode($this->getdesdistrict()),
				':descity'=>utf8_decode($this->getdescity()),
				':desstate'=>utf8_decode($this->getdesstate()),
				':descountry'=>$this->getdescountry(),
				':dtbirth'=>$this->getdtbirth()

			]
		
		);//end select

		
		//$results[0]['desname'] = utf8_encode($results[0]['desname']);
		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desstate'] = utf8_encode($results[0]['desstate']);


		


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
		    FROM tb_accounts a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister desc
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			//$results[0]['desname'] = utf8_encode($results[0]['desname']);
			//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
			//$results[0]['descity'] = utf8_encode($results[0]['descity']);
			//$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
			//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
			//$results[0]['descountry'] = utf8_encode($results[0]['descountry']);


			$this->setData($results[0]);

			
		}//end if
		

	}//END getAccount






























	public function getAccount( $ipdayment )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_payments a
		    INNER JOIN tb_users d ON c.iduser = d.iduser
		    WHERE ipdayment = pipdayment;

			", 
			
			[

				':ipdayment'=>$ipdayment

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if

	}//END get





	

	public static function setError( $msg )
	{

		$_SESSION[Account::SESSION_ERROR] = $msg;


	}//END setMsgErro





	public static function getError()
	{

		$msg = (isset($_SESSION[Account::SESSION_ERROR])) ? $_SESSION[Account::SESSION_ERROR] : "";

		Account::clearError();

		return $msg;

	}//END getMsgErro





	public static function clearError()
	{

		$_SESSION[Account::SESSION_ERROR] = NULL;

	}//END clearMsgError












	public static function setSuccess( $msg )
	{

		$_SESSION[Account::SUCCESS] = $msg;

	}//END setSuccess










	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Account::SUCCESS]) && $_SESSION[Account::SUCCESS]) ? $_SESSION[Account::SUCCESS] : '';

		Account::clearSuccess();

		return $msg;

	}//END getSuccess








	public static function clearSuccess()
	{
		$_SESSION[Account::SUCCESS] = NULL;

	}//END clearSuccess










}//END class Account





 ?>