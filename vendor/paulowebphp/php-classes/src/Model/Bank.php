<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Model\Cart;
use \Core\Model\Address;
use \Core\Model\Payment;
use \Moip\Moip;
use \Moip\Auth\BasicAuth;



class Bank extends Model
{

	# Session
	const SESSION = "BankSession";

	# Error - Success
	const SUCCESS = "Bank-Success";
	const ERROR = "Bank-Error";





	public function update()
	{
			

		$sql = new Sql();

		



		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...

			$results = $sql->select("

			CALL sp_banks_update(

				:idbank,
				:iduser,
				:idaccount,
				:instatus,
				:desname,
				:desdocument,
				:desbankcode,
				:desbanknumber,
				:desagencynumber,
				:desagencycheck,
				:desaccounttype,
				:desaccountnumber,
				:desaccountcheck


				

			)", 
			
			[

				':idbank'=>$this->getidbank(),
				':iduser'=>$this->getiduser(),
				':idaccount'=>$this->getidaccount(),
				':instatus'=>$this->getinstatus(),
				':desname'=>$this->getdesname(),
				':desdocument'=>$this->getdesdocument(),
				':desbankcode'=>$this->getdesbankcode(),
				':desbanknumber'=>$this->getdesbanknumber(),
				':desagencynumber'=>$this->getdesagencynumber(),
				':desagencycheck'=>$this->getdesagencycheck(),
				':desaccounttype'=>$this->getdesaccounttype(),
				':desaccountnumber'=>$this->getdesaccountnumber(),
				':desaccountcheck'=>$this->getdesaccountcheck()

			]
		
		);//end select

			
			$results[0]['desname'] = utf8_encode($results[0]['desname']);
			


		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_banks_update(

					:idbank,
					:iduser,
					:idaccount,
					:instatus,
					:desname,
					:desdocument,
					:desbankcode,
					:desbanknumber,
					:desagencynumber,
					:desagencycheck,
					:desaccounttype,
					:desaccountnumber,
					:desaccountcheck


					

				)", 
				
				[

					':idbank'=>$this->getidbank(),
					':iduser'=>$this->getiduser(),
					':idaccount'=>$this->getidaccount(),
					':instatus'=>$this->getinstatus(),
					':desname'=>$this->getdesname(),
					':desdocument'=>$this->getdesdocument(),
					':desbankcode'=>$this->getdesbankcode(),
					':desbanknumber'=>$this->getdesbanknumber(),
					':desagencynumber'=>$this->getdesagencynumber(),
					':desagencycheck'=>$this->getdesagencycheck(),
					':desaccounttype'=>$this->getdesaccounttype(),
					':desaccountnumber'=>$this->getdesaccountnumber(),
					':desaccountcheck'=>$this->getdesaccountcheck()

				]
			
			);//end select

			

		}//end else






		

		


		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if


	}//END update

















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_banks a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister DESC
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		if(count($results) > 0)
		{

			$this->setData($results[0]);
		}//end if


	}//END get









	public static function chekBankExists( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_banks a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister DESC
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		if(count($results) > 0)
		{

			return true;


		}//end if
		else
		{



			return false;
		}//end else


	}//END get








	/*public function getOrder( $idorder )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_orders a
		    INNER JOIN tb_ordersstatus b ON a.idstatus = b.idstatus
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    INNER JOIN tb_addresses e ON a.idaddress = e.idaddress
		    INNER JOIN tb_payments f ON a.idorder = f.idorder
		    WHERE a.idorder = :idorder;

			", 
			
			[

				':idorder'=>$idorder

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if

	}//END getOrder*/









	/*public static function checkBankCodeExists( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_banks a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select



		if( count($results) === 0 )
		{

			return false;
			
		}//end if
		else
		{

			return $results[0];

		}



	}//END checkBankCodeExists*/








	public static function getBanksValues()
	{

		return [

			['value'=>'1','name'=>'001 - Banco do Brasil S.A.','shortname'=>'','shortname'=>'Banco do Brasil'],
            ['value'=>'3','name'=>'003 - Banco da Amazônia S.A.','shortname'=>'Banco da Amazônia'],
            ['value'=>'4','name'=>'004 - Banco do Nordeste do Brasil S.A. (BNB)','shortname'=>'BNB'],
            ['value'=>'21','name'=>'021 - Banco do Estado do Espírito Santo S.A. (BANESTES)','shortname'=>'BANESTES'],
            ['value'=>'25','name'=>'025 - Banco Alfa S.A.','shortname'=>'Banco Alfa'],
            ['value'=>'27','name'=>'027 - Banco do Estado de Santa Catarina S.A.','shortname'=>'Banco do Estado de Santa Catarina'],
            ['value'=>'33','name'=>'033 - Banco Santander S.A. (Santander Banespa)','shortname'=>'Santander Banespa'],
            ['value'=>'37','name'=>'037 - Banco do Estado do Pará S.A. (BANPARA)','shortname'=>'BANPARA'],
            ['value'=>'41','name'=>'041 - Banco do Estado do Rio Grande do Sul S.A. (BANRISUL)','shortname'=>'BANRISUL'],
            ['value'=>'47','name'=>'047 - Banco do Estado de Sergipe S.A. (BANESE)','shortname'=>'BANESE'],
            ['value'=>'63','name'=>'063 - Banco Ibi Banco Múltiplo S.A. (Banco Ibi)','shortname'=>'Banco Ibi'],
            ['value'=>'65','name'=>'065 - Lemon Bank Banco Múltiplo S.A.','shortname'=>'Lemon Bank Banco Múltiplo'],
            ['value'=>'69','name'=>'069 - BPN Brasil Banco Múltiplo S.A. (BPN)','shortname'=>'BPN Brasil Banco Múltiplo'],
            ['value'=>'70','name'=>'070 - Banco de Brasília S.A. (BRB)','shortname'=>'Banco de Brasília'],
            ['value'=>'77','name'=>'077 - Banco Intermedium S.A.','shortname'=>'Banco Intermedium'],
            ['value'=>'85','name'=>'085 - Cooperativa Central de Crédito Urbano (CECRED)','shortname'=>'CECRED'],
            ['value'=>'104','name'=>'104 - Caixa Econômica Federal','shortname'=>'Caixa Econômica Federal'],
            ['value'=>'107','name'=>'107 - Banco BBM S.A.','shortname'=>'Banco BBM'],
            ['value'=>'136','name'=>'136 - Confederação Nacional das Cooperativas Centrais (UNICRED)','shortname'=>'UNICRED'],
            ['value'=>'151','name'=>'151 - Banco Nossa Caixa S.A.','shortname'=>'Banco Nossa Caixa'],
            ['value'=>'208','name'=>'208 - Banco BTG Pactual S.A.','shortname'=>''],
            ['value'=>'212','name'=>'212 - Banco Original S.A.','shortname'=>'Banco BTG Pactual'],
            ['value'=>'215','name'=>'215 - Banco Acomercial e de Investimento Sudameris S.A. (SUDAMERIS)','shortname'=>'SUDAMERIS'],
            ['value'=>'229','name'=>'229 - Banco Cruzeiro do Sul S.A.','shortname'=>'Banco Cruzeiro do Sul'],
            ['value'=>'237','name'=>'237 - Banco Bradesco S.A.','shortname'=>'Banco Bradesco'],
            ['value'=>'252','name'=>'252 - Banco Fininvest S.A.','shortname'=>'Banco Fininvest'],
            ['value'=>'263','name'=>'263 - Banco Cacique S.A.','shortname'=>'Banco Cacique'],
            ['value'=>'318','name'=>'318 - Banco BMG S.A.','shortname'=>'Banco BMG'],
            ['value'=>'341','name'=>'341 - Banco Itaú S.A.','shortname'=>'Banco Itaú'],
            ['value'=>'356','name'=>'356 - Banco ABN AMRO Real S.A.','shortname'=>'Banco ABN AMRO Real'],
            ['value'=>'389','name'=>'389 - Banco Mercantil do Brasil S.A.','shortname'=>'Banco Mercantil do Brasil'],
            ['value'=>'399','name'=>'399 - HSBC Bank Brasil Banco Múltiplo S.A. ','shortname'=>'HSBC Bank'],
            ['value'=>'409','name'=>'409 - União de Bancos Brasileiros S.A. (UNIBANCO)','shortname'=>'UNIBANCO'],
            ['value'=>'422','name'=>'422 - Banco Safra S.A.','shortname'=>'Banco Safra'],
            ['value'=>'479','name'=>'479 - Banco Itaubank S.A.','shortname'=>'Itaubank S.A'],
            ['value'=>'623','name'=>'623 - Banco Panamericano S.A.','shortname'=>'Banco Panamericano'],
            ['value'=>'633','name'=>'633 - Banco Rendimento S.A.','shortname'=>'Banco Rendimento'],
            ['value'=>'655','name'=>'655 - Banco Votorantim S.A.','shortname'=>'Banco Votorantim'],
            ['value'=>'719','name'=>'719 - Banco Internacional do Funchal S.A. (BANIF)','shortname'=>'BANIF'],
            ['value'=>'745','name'=>'745 - Banco Citibank S.A.','shortname'=>'Banco Citibank'],
            ['value'=>'748','name'=>'748 - Banco Cooperativo Sicredi S.A.','shortname'=>'Sicredi'],
            ['value'=>'749','name'=>'749 - Banco Simples S.A.','shortname'=>'Banco Simples'],
            ['value'=>'756','name'=>'756 - Banco Cooperativo do Brasil S.A. (BANCOOB)','shortname'=>'BANCOOB']

		];

	}//END getBanksValues










	public static function setError( $msg )
	{

		$_SESSION[Bank::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Bank::ERROR]) && $_SESSION[Bank::ERROR]) ? $_SESSION[Bank::ERROR] : '';

		Bank::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Bank::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Bank::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Bank::SUCCESS]) && $_SESSION[Bank::SUCCESS]) ? $_SESSION[Bank::SUCCESS] : '';

		Bank::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Bank::SUCCESS] = NULL;

	}//END clearSuccess 





	








}//END class Bank




 ?>