<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;
use \Core\Model\Cart;
use \Core\Model\Address;
use \Core\Model\Payment;




class Fee extends Model
{




	# Session
	const SESSION = "FeeSession";

	# Error - Success
	const SUCCESS = "Fee-Success";
	const ERROR = "Fee-Error";
	








	public function save()
	{
			

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_fees_save(

				:idfee,
				:iduser,
				:idpayment,
				:vlmktpercentage,
				:vlmktfixed,
				:vlpropercentage,
				:vlprofixed,
				:vlantecipation,
				:nrantecipationperiod

			)", 
			
			[

				':idfee'=>$this->getidfee(),
				':iduser'=>$this->getiduser(),
				':idpayment'=>$this->getidpayment(),
				':vlmktpercentage'=>$this->getvlmktpercentage(),
				':vlmktfixed'=>$this->getvlmktfixed(),
				':vlpropercentage'=>$this->getvlpropercentage(),
				':vlprofixed'=>$this->getvlprofixed(),
				':vlantecipation'=>$this->getvlantecipation(),
				':nrantecipationperiod'=>$this->getnrantecipationperiod()

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

			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_orders a
		    INNER JOIN tb_ordersstatus b ON a.idstatus = b.idstatus
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    INNER JOIN tb_addresses e ON a.idaddress = e.idaddress
		    INNER JOIN tb_payments f ON a.idorder = f.idorder
		    WHERE a.iduser = :iduser;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		//$results[0]['desname'] = utf8_encode($results[0]['desname']);
		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);



		$numOrders = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$numOrders[0]["nrtotal"]

		];//end return


	}//END get









	public static function getPage( $iduser, $initem, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
            INNER JOIN tb_cartsitems h ON a.idcart = h.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
            AND h.initem = :initem
		    ORDER BY a.dtregister DESC;
			LIMIT $start, $itensPerPage;




		", 
			
			[

				':iduser'=>$iduser,
				':initem'=>$initem

			]

		);//end selec


		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		


		return [

			'results'=>$results,
			'nrtotal'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return


	}//END getPage








	public static function getPageSearch( $iduser, $initem, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_cartsitems h ON a.idcart = h.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
		    AND h.initem = :initem
			AND d.desname LIKE :search 
			ORDER BY a.dtregister DESC
			LIMIT $start, $itensPerPage;


			", 
			
			[

				':iduser'=>$iduser,
				':initem'=>$initem,
				':search'=>'%'.$search.'%'

			]
		
		);//end select

		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return


	}//END getPageSearch









	public function getLast( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("


		    SELECT * 
		    FROM tb_fees a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister desc
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if


	}//end if






	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_fees
			WHERE idfee = :idfee

			", 
			
			[

				'idfee'=>$this->getidfee()

			]
		
		);//end query

	}//END delete




	public static function setError( $msg )
	{

		$_SESSION[Fee::ERROR] = $msg;

	}//END setError











	public static function getError()
	{

		$msg = (isset($_SESSION[Fee::ERROR]) && $_SESSION[Fee::ERROR]) ? $_SESSION[Fee::ERROR] : '';

		Fee::clearError();

		return $msg;

	}//END getError












	public static function clearError()
	{
		$_SESSION[Fee::ERROR] = NULL;

	}//END clearError











	public static function setSuccess($msg)
	{

		$_SESSION[Fee::SUCCESS] = $msg;

	}//END setSuccess









	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Fee::SUCCESS]) && $_SESSION[Fee::SUCCESS]) ? $_SESSION[Fee::SUCCESS] : '';

		Fee::clearSuccess();

		return $msg;

	}//END getSuccess










	public static function clearSuccess()
	{
		$_SESSION[Fee::SUCCESS] = NULL;

	}//END clearSuccess 














}//END class Fee




 ?>