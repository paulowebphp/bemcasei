<?php 

namespace Core\Model;


use \Core\Model;
use \Core\Rule;
use \Core\DB\Sql;
use \Core\Model\Address;
use \Core\Model\Cart;
//use \Core\Model\Payment;
//use \Moip\Moip;
//use \Moip\Auth\BasicAuth;



class Order extends Model
{




	# Session
	const SESSION = "OrderSession";

	# Error - Success
	const SUCCESS = "Order-Success";
	const ERROR = "Order-Error";
	
















	public function save()
	{
			

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_orders_save(

				:idorder,
				:iduser,
				:idcart,
				:idcustomer,
				:idpayment,
				:idfee,
				:desordercode,
				:vltotal,
				:vlseller,
				:vlmarketplace,
				:vlprocessor

			)", 
			
			[

				':idorder'=>$this->getidorder(),
				':iduser'=>$this->getiduser(),
				':idcart'=>$this->getidcart(),
				':idcustomer'=>$this->getidcustomer(),
				':idpayment'=>$this->getidpayment(),
				':idfee'=>$this->getidfee(),
				':desordercode'=>$this->getdesordercode(),
				':vltotal'=>$this->getvltotal(),
				':vlseller'=>$this->getvlseller(),
				':vlmarketplace'=>$this->getvlmarketplace(),
				':vlprocessor'=>$this->getvlprocessor()

			]
		
		);//end select


		

		


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
			{

				$results[0]['desconsort'] = utf8_encode($results[0]['desconsort']);
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
				$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
				$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
				$results[0]['descity'] = utf8_encode($results[0]['descity']);
				$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
				$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
				$results[0]['descountry'] = utf8_encode($results[0]['descountry']);

				$results[0]['desholdername'] = utf8_encode($results[0]['desholdername']);
				$results[0]['desholderaddress'] = utf8_encode($results[0]['desholderaddress']);
				$results[0]['desholdercomplement'] = utf8_encode($results[0]['desholdercomplement']);
				$results[0]['desholdercity'] = utf8_encode($results[0]['desholdercity']);
				$results[0]['desholderdistrict'] = utf8_encode($results[0]['desholderdistrict']);
				$results[0]['desholderstate'] = utf8_encode($results[0]['desholderstate']);
				$results[0]['descountry'] = utf8_encode($results[0]['descountry']);


			}//end if
	



			$this->setData($results[0]);

		}//end if


	}//END save


















	/*public function save()
	{
			

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_orders_save(

				:idorder,
				:iduser,
				:idcart,
				:idcustomer,
				:idpayment,
				:idfee,
				:desordercode,
				:vltotal,
				:vlseller,
				:vlmarketplace,
				:vlprocessor

			)", 
			
			[

				':idorder'=>$this->getidorder(),
				':iduser'=>$this->getiduser(),
				':idcart'=>$this->getidcart(),
				':idcustomer'=>$this->getidcustomer(),
				':idpayment'=>$this->getidpayment(),
				':idfee'=>$this->getidfee(),
				':desordercode'=>$this->getdesordercode(),
				':vltotal'=>$this->getvltotal(),
				':vlseller'=>$this->getvlseller(),
				':vlmarketplace'=>$this->getvlmarketplace(),
				':vlprocessor'=>$this->getvlprocessor()

			]
		
		);//end select


		$results[0]['desname'] = utf8_encode($results[0]['desname']);
		$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
		$results[0]['descity'] = utf8_encode($results[0]['descity']);
		$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
		$results[0]['desstate'] = utf8_encode($results[0]['desstate']);

		$results[0]['desholdername'] = utf8_encode($results[0]['desholdername']);
		$results[0]['desholderaddress'] = utf8_encode($results[0]['desholderaddress']);
		$results[0]['desholdercomplement'] = utf8_encode($results[0]['desholdercomplement']);
		$results[0]['desholdercity'] = utf8_encode($results[0]['desholdercity']);
		$results[0]['desholderdistrict'] = utf8_encode($results[0]['desholderdistrict']);
		$results[0]['desholderstate'] = utf8_encode($results[0]['desholderstate']);









		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if


	}//END save*/














	public function getProducts()
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsitems a 
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			INNER JOIN tb_carts c ON a.idcart = c.idcart
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select



		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		if( count($results) > 0 )
		{
			
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desproduct'] = utf8_encode($row['desproduct']);

				}//end foreach
					
				
			}//end if



			return $results;

			
		}//end if



	}//END getProducts


















	public function getProductsByCart( $idcart )
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsitems a 
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			INNER JOIN tb_carts c ON a.idcart = c.idcart
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select



		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desproduct'] = utf8_encode($row['desproduct']);

				}//end foreach
					
				
			}//end if
			

			$this->setData($results);

			
		}//end if



	}//END getProducts














	/*public function get( $iduser )
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

		$results[0]['desname'] = utf8_encode($results[0]['desname']);
		$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
		$results[0]['descity'] = utf8_encode($results[0]['descity']);
		$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);



		$numOrders = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$numOrders[0]["nrtotal"]

		];//end return


	}//END get*/







































	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_orders a
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    INNER JOIN tb_fees f ON a.idpayment = f.idpayment
		    WHERE a.iduser = :iduser
		    AND e.inpaymentstatus <> 6;

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
































	public function getLast( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("


		    SELECT * 
		    FROM tb_orders a
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






































	









	public function getOrder( $idorder, $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT * 
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    INNER JOIN tb_fees f ON a.idpayment = f.idpayment
		    WHERE a.idorder = :idorder
		    AND a.iduser = :iduser
		    ORDER BY a.dtregister DESC
		    LIMIT 1;

			", 
			
			[

				':idorder'=>$idorder,
				':iduser'=>$iduser

			]
		
		);//end select


				


		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desname'] = utf8_encode($row['desname']);

				}//end foreach
					
				
			}//end if

			$this->setData($results[0]);
			
		}//end if

	}//END getOrder


























	public static function getPage( $iduser, $initem, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    INNER JOIN tb_fees f ON a.idpayment = f.idpayment
		    WHERE a.iduser = :iduser
            AND c.incartitem = :initem
			AND e.inpaymentstatus <> 6
			ORDER BY a.dtregister DESC
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

		
		


		if ( count($results) > 0 )
		{

			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				

				foreach( $results as &$row )
				{
					$row['desname'] = utf8_encode($row['desname']);

				}//end foreach
					
				
			}//end if

			

			
		}//end if
 


		return [

			'results'=>$results,
			'nrtotal'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return





	}//END getPage
































	public static function getPageSearch( $iduser, $initem, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...
			$search = utf8_decode($search);

		}//end if
		

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    INNER JOIN tb_fees f ON a.idpayment = f.idpayment
		    WHERE a.iduser = :iduser
		    AND c.incartitem = :initem
		    AND e.inpaymentstatus <> 6
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

		




		if (count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desname'] = utf8_encode($row['desname']);

				}//end foreach
					
				
			}//end if
					
		}//end if


		return [

			'results'=>$results,
			'nrtotal'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return

			


	}//END getPageSearch



























































	










	public static function getSumTotals( $iduser, $initem = 1 )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT SUM(a.vltotal) as sumvltotal, 
			SUM(a.vlseller) as sumvlseller,
			SUM(a.vlmarketplace) as sumvlmarketplace,
			SUM(a.vlprocessor) as sumvlprocessor
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
            INNER JOIN tb_carts d ON a.idcart = d.idcart
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
		    AND d.incartitem = :initem
            AND e.inpaymentstatus <> 6;



		", 
			
			[

				':iduser'=>$iduser,
				':initem'=>$initem


			]

		);//end selec

		
		
		if(count($results) > 0)
		{
			return $results[0];

		}//end if
		else
		{

			return [

				'sumvltotal'=>0.00,
				'sumvlseller'=>0.00,
				'sumvlmarketplace'=>0.00,
				'sumvlprocessor'=>0.00

			];

		}//en else


	}//END getPage































	public static function getSumAvailable( $iduser, $initem = 1 )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT SUM(a.vltotal) as sumvltotal, 
			SUM(a.vlseller) as sumvlseller,
			SUM(a.vlmarketplace) as sumvlmarketplace,
			SUM(a.vlprocessor) as sumvlprocessor
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
            INNER JOIN tb_carts d ON a.idcart = d.idcart
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
		    AND d.incartitem = :initem
            AND e.inpaymentstatus NOT IN (6,7,8);




		", 
			
			[

				':iduser'=>$iduser,
				':initem'=>$initem

			]

		);//end selec

		
		
		if(count($results) > 0)
		{
			return $results[0];

		}//end if
		else
		{

			return [

				'sumvltotal'=>0.00,
				'sumvlseller'=>0.00,
				'sumvlmarketplace'=>0.00,
				'sumvlprocessor'=>0.00

			];

		}//en else


	}//END getPage






































	public static function getSumUnavailable( $iduser, $inpaymentstatus, $initem = 1 )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT SUM(a.vltotal) as sumvltotal, 
			SUM(a.vlseller) as sumvlseller,
			SUM(a.vlmarketplace) as sumvlmarketplace,
			SUM(a.vlprocessor) as sumvlprocessor
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
            INNER JOIN tb_carts d ON a.idcart = d.idcart
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
		    AND d.incartitem = :initem
		    AND e.inrefunded = 0
		    AND e.inpaymentstatus <> 6 AND e.inpaymentstatus = :inpaymentstatus;
            




		", 
			
			[

				':iduser'=>$iduser,
				':inpaymentstatus'=>$inpaymentstatus,
				':initem'=>$initem

			]

		);//end selec

		
		
		if(count($results) > 0)
		{
			return $results[0];

		}//end if
		else
		{

			return [

				'sumvltotal'=>0.00,
				'sumvlseller'=>0.00,
				'sumvlmarketplace'=>0.00,
				'sumvlprocessor'=>0.00

			];

		}//en else


	}//END getPage























































	/*public static function getSumOrder( $iduser, $status = 0 )
	{

		$sql = new Sql();


		
		if ( (int)$status == 1 ) 
		{
			# code...



			$results = $sql->select("

				SELECT SUM(a.vltotal) as sumvltotal, 
				SUM(a.vlseller) as sumvlseller,
				SUM(a.vlmarketplace) as sumvlmarketplace,
				SUM(a.vlprocessor) as sumvlprocessor
			    FROM tb_orders a
			    INNER JOIN tb_users b ON a.iduser = b.iduser
			    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
			    WHERE a.iduser = :iduser
	            AND e.inpaymentstatus NOT IN (6,7,8);


			", 
				
				[

					':iduser'=>$iduser

				]

			);//end selec



		}//end if
		elseif( (int)$status == 2 ) 
		{


			$results = $sql->select("

				SELECT SUM(a.vltotal) as sumvltotal, 
				SUM(a.vlseller) as sumvlseller,
				SUM(a.vlmarketplace) as sumvlmarketplace,
				SUM(a.vlprocessor) as sumvlprocessor
			    FROM tb_orders a
			    INNER JOIN tb_users b ON a.iduser = b.iduser
			    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
			    WHERE a.iduser = :iduser
	            AND e.inpaymentstatus <> 6 AND e.inpaymentstatus IN (7,8);


			", 
				
				[

					':iduser'=>$iduser

				]

			);//end selec


		}//end else
		elseif( (int)$status == 0 ) 
		{


			$results = $sql->select("

				SELECT SUM(a.vltotal) as sumvltotal, 
				SUM(a.vlseller) as sumvlseller,
				SUM(a.vlmarketplace) as sumvlmarketplace,
				SUM(a.vlprocessor) as sumvlprocessor
			    FROM tb_orders a
			    INNER JOIN tb_users b ON a.iduser = b.iduser
			    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
			    WHERE a.iduser = :iduser
	            AND e.inpaymentstatus <> 6;


			", 
				
				[

					':iduser'=>$iduser

				]

			);//end selec


		}//end else


		

		
		
		if(count($results) > 0)
		{
			return $results[0];

		}//end if


	}//END getPage
*/

























































	/*public static function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister DESC
			LIMIT $start, $itensPerPage;

		", 
			
			[

				':iduser'=>$iduser

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








	public static function getPageSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_orders a
		    INNER JOIN tb_users b ON a.iduser = b.iduser
		    INNER JOIN tb_carts c ON a.idcart = c.idcart
		    INNER JOIN tb_customers d ON a.idcustomer = d.idcustomer
		    INNER JOIN tb_payments e ON a.idpayment = e.idpayment
		    WHERE a.iduser = :iduser
			OR d.desname LIKE :search 
			ORDER BY a.dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%',
				':id'=>$search

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

*/





































	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_orders
			WHERE idorder = :idorder

			", 
			
			[

				'idorder'=>$this->getidorder()

			]
		
		);//end query

	}//END delete









		







	public function getCart()
	{

		$cart = new Cart();

		$cart->get((int)$this->getidcart());

		return $cart;
		
	}//END getCart











		public function toSession()
	{
		$_SESSION[Order::SESSION] = $this->getValues();

	}//END toSession













	public function getFromSession()
	{

		$this->setData($_SESSION[Order::SESSION]);

	}//END getFromSession












	public function getAddress()
	{

		$address = new Address();

		$address->setData($this->getValues());

		return $address;

	}//END getAddress





































	public static function setError( $msg )
	{

		$_SESSION[Order::ERROR] = $msg;

	}//END setError











	public static function getError()
	{

		$msg = (isset($_SESSION[Order::ERROR]) && $_SESSION[Order::ERROR]) ? $_SESSION[Order::ERROR] : '';

		Order::clearError();

		return $msg;

	}//END getError












	public static function clearError()
	{
		$_SESSION[Order::ERROR] = NULL;

	}//END clearError











	public static function setSuccess($msg)
	{

		$_SESSION[Order::SUCCESS] = $msg;

	}//END setSuccess









	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Order::SUCCESS]) && $_SESSION[Order::SUCCESS]) ? $_SESSION[Order::SUCCESS] : '';

		Order::clearSuccess();

		return $msg;

	}//END getSuccess










	public static function clearSuccess()
	{
		$_SESSION[Order::SUCCESS] = NULL;

	}//END clearSuccess 














}//END class Order




 ?>