<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Mailer;
use \Core\Wirecard;
use \Core\Model\User;
use \Core\Model\Product;




class Cart extends Model
{

	const SESSION = "Cart";

	const SESSION_ERROR = "Error-Cart";
	const SUCCESS = "Product-Success";

	
	

	public static function getFromSession()
	{	

		if(!isset($_SESSION[Cart::SESSION]) || !isset($_SESSION[Cart::SESSION]["idcart"]) ) $_SESSION[Cart::SESSION]["idcart"] = 0;


		$user = new User();
		
		$uri = explode('/', $_SERVER["REQUEST_URI"]);
		
		$user->getFromUrl($uri[1]);
		
		$cart = new Cart();

		if(

			//isset($_SESSION[Cart::SESSION]) 
			//&& 
			(int)$_SESSION[Cart::SESSION]["idcart"] > 0
			&&
			(int)$_SESSION[Cart::SESSION]["iduser"] === (int)$user->getiduser()
			&&
			(int)$_SESSION[Cart::SESSION]["incartstatus"] === 0

			
		)
		{
		
			
			# Recupera o carrinho que já existe
			//$cart->get((int)$_SESSION[Cart::SESSION]["idcart"]);
			$cart->getUserCart((int)$_SESSION[Cart::SESSION]["idcart"],(int)$_SESSION[Cart::SESSION]["iduser"]);

			

		}//end if
		else
		{
		
			# Tenta carregar o carrinho a partir do session_id(), se conseguir, pula o if
			$cart->getFromSessionID((int)$user->getiduser());


			# Verifica se conseguiu carregar o carrinho
			if( !(int)$cart->getidcart() > 0 )
			{

				$data = [

					'dessessionid'=>session_id(),
					'iduser'=>$user->getiduser(),
					'incartstatus'=>0

				];//end $data

				$cart->setData($data);

				$cart->update();
				
				$cart->setToSession();


			}//end if

		}//end else	

		return $cart;

	}//END getFromSession








	/*public static function getFromSession()
	{


		if(!isset($_SESSION[Cart::SESSION]) || !isset($_SESSION[Cart::SESSION]["idcart"]) ) $_SESSION[Cart::SESSION]["idcart"] = 0;

		$user = new User();
		
		$uri = explode('/', $_SERVER["REQUEST_URI"]);
		
		$user->getFromUrl($uri[1]);
		
		$cart = new Cart();

		if(

			//isset($_SESSION[Cart::SESSION]) 
			//&& 
			(int)$_SESSION[Cart::SESSION]["idcart"] > 0
			&&
			(int)$_SESSION[Cart::SESSION]["iduser"] === (int)$user->getiduser()
			&&
			(int)$_SESSION[Cart::SESSION]["incartstatus"] === 0

			
		)
		{
		
			
			# Recupera o carrinho que já existe
			//$cart->get((int)$_SESSION[Cart::SESSION]["idcart"]);
			$cart->getUserCart((int)$_SESSION[Cart::SESSION]["idcart"],(int)$_SESSION[Cart::SESSION]["iduser"]);

			

		}//end if
		else
		{
		
			# Tenta carregar o carrinho a partir do session_id(), se conseguir, pula o if
			$cart->getFromSessionID((int)$user->getiduser());


			# Verifica se conseguiu carregar o carrinho
			if( !(int)$cart->getidcart() > 0 )
			{

				$data = [

					'dessessionid'=>session_id(),
					'iduser'=>$user->getiduser(),
					'incartstatus'=>0

				];//end $data

				
				$cart->setData($data);

				$cart->save();
				
				$cart->setToSession();



			}//end if

		}//end else

		

		return $cart;

	}//END getFromSession*/






	public function setToSession()
	{

		$_SESSION[Cart::SESSION] = $this->getValues();

	}//END setToSession






	/**public static function getFromSession()
	{
		


		$cart = new Cart();


		if(

			isset($_SESSION[Cart::SESSION]) 
			&& 
			(int)$_SESSION[Cart::SESSION]["idcart"] > 0
			
		)
		{
			

			# Recupera o carrinho que já existe
			$cart->get((int)$_SESSION[Cart::SESSION]["idcart"]);



		}//end if
		else
		{

			# Tenta carregar o carrinho a partir do session_id(), se conseguir, pula o if
			$cart->getFromSessionID();

			# Verifica se conseguiu carregar o carrinho
			if( !(int)$cart->getidcart() > 0 )
			{
				$data = [

					'dessessionid'=>session_id()

				];//end $data
				
				$user = new User();

				$uri = explode('/', $_SERVER["REQUEST_URI"]);

				$user->getFromUrl($uri[1]);

				$data['iduser'] = $user->getiduser();

				$cart->setData($data);

				$cart->save();

				$cart->setToSession();

			}//end if

		}//end else

		return $cart;

	}//END getFromSession */


	




	public function update()
	{
		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_carts_update(

				:idcart, 
				:dessessionid, 
				:iduser,
				:incartstatus

			)", 
			
			[

				':idcart'=>$this->getidcart(), 
				':dessessionid'=>$this->getdessessionid(), 
				':iduser'=>$this->getiduser(),
				':incartstatus'=>$this->getincartstatus()

			]
		
		);//end select

		
		if(count($results) > 0)
		{

			$this->setData($results[0]);

		}//end if

		
	}//END update






	





	/**public static function getFromSession()
	{
		$cart = new Cart();



		if(

			!isset($_SESSION[Cart::SESSION])
			
		)
		{

			$cart->getFromSessionID();

			# Verifica se conseguiu carregar o carrinho
			if( !(int)$cart->getidcart() > 0 )
			{
				$data = [

					'dessessionid'=>session_id()

				];//end $data
				
				$user = new User();

				$uri = explode('/', $_SERVER["REQUEST_URI"]);

				$user->getFromUrl($uri[1]);

				$data['iduser'] = $user->getiduser();

				$cart->setData($data);

				$cart->save();

				$cart->setToSession();

			}//end if

		}//end if
		else
		{

			# Tenta carregar o carrinho a partir do session_id(), se conseguir, pula o if
			

		}//end else

		return $cart;

	}//END getFromSession
 */







	public function getFromSessionID( $iduser )
	{


		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_carts 
			WHERE dessessionid = :dessessionid
			AND iduser = :iduser
			AND incartstatus = 0;

			", 
			[

				':dessessionid'=>session_id(),
				':iduser'=>$iduser

			]
		
		);//end select

		if( count($results) > 0 )
		{

			$this->setData($results[0]);
			
		}//end if

	}//END getFromSessionID










	public function getUserCart( $idcart, $iduser )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_carts 
			WHERE idcart = :idcart
			AND iduser = :iduser
			AND incartstatus = 0;

			", 
			
			[

				':idcart'=>$idcart,
				':iduser'=>$iduser

			]
		
		);//end select

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

	}//END getUserCart






	/**public function get( $idcart )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_carts 
			WHERE idcart = :idcart;

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

	}//END get */








	/*public function addItem( $idcart, $iditem, $initem )
	{
		

		$sql = new Sql();

		$sql->query("

			INSERT INTO tb_cartsitems (idcart, iditem, initem) 
			VALUES(:idcart, :iditem, :initem)

			", 
			
			[

				':idcart'=>$idcart,
				':iditem'=>$iditem,
				':initem'=>$initem

			]
		
		);//end query


		

	}//END addProduct
*/








	public function addItem( $iditem, $initem )
	{


		$sql = new Sql();


		if ( (int)$initem == 0 )
		{


			# code...
			$sql->query("

				INSERT INTO tb_cartsitems (idcart, iditem, initem) 
				VALUES(:idcart, :iditem, :initem)

				", 
				
				[

					':idcart'=>$this->getidcart(),
					':iditem'=>$iditem,
					':initem'=>$initem

				]
			
			);//end query



		}//end if
		else
		{


			if( !Cart::checkItem( $this->getidcart(), $iditem) )
			{


				
				$sql->query("

					INSERT INTO tb_cartsitems (idcart, iditem, initem) 
					VALUES(:idcart, :iditem, :initem)

					", 
					
					[

						':idcart'=>$this->getidcart(),
						':iditem'=>$iditem,
						':initem'=>$initem

					]
				
				);//end query


			}//end if


		}//end else


				
		

		
		

	}//END addItem























	public function addContinueItem( $idcart, $iditem, $initem, $desdomain = '' )
	{


				


		if( !Cart::checkItem( $idcart, $iditem) )
		{


			$sql = new Sql();


			$sql->query("

				INSERT INTO tb_cartsitems (idcart, iditem, initem) 
				VALUES(:idcart, :iditem, :initem)

				", 
				
				[

					':idcart'=>$idcart,
					':iditem'=>$iditem,
					':initem'=>$initem

				]
			
			);//end query



		}//end if
		else
		{


			Product::setError("Este Presente já foi adicionado ao carrinho | Por favor, escolha outro");
			header('Location: /'.$desdomain.'/loja');
			exit;


		}//end else



		

		

	}//END addProduct



















	public static function checkItem( $idcart, $iditem )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT b.idproduct,b.iduser, b.desproduct,b.vlprice
			FROM tb_cartsitems a
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.desproduct,b.vlprice

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select


		


		foreach ($results as $row )
		{
			# code...

			if( (int)$row['idproduct'] === (int)$iditem )
			{

				return true;

			}//end if


		}//end foreach


		return false;


	}//END getProducts













	/*public function addItem( $iditem, $initem )
	{
		

		$sql = new Sql();

		$sql->query("

			INSERT INTO tb_cartsitems (idcart, iditem, initem) 
			VALUES(:idcart, :iditem, :initem)

			", 
			
			[

				':idcart'=>$this->getidcart(),
				':iditem'=>$iditem,
				':initem'=>$initem

			]
		
		);//end query

		

	}//END addProduct*/











	/*public function addProduct( Product $product )
	{
		

		$sql = new Sql();

		$sql->query("

			INSERT INTO tb_cartsproducts (idcart, idproduct) 
			VALUES(:idcart, :idproduct)

			", 
			
			[

				':idcart'=>$this->getidcart(),
				':idproduct'=>$product->getidproduct()

			]
		
		);//end query

		$this->getCalculateTotal();

		

	}//END addProduct
	*/







	public function removeItem( $iditem, $all = false )
	{

			

		try
		{


			$sql = new Sql();

			if( $all )
			{
				$sql->query("

					DELETE FROM tb_cartsitems
					WHERE idcart = :idcart
					AND iditem = :iditem

					", 
					
					[

						':idcart'=>$this->getidcart(),
						':iditem'=>$iditem

					]
				
				);//end query

			}//end if
			else
			{
				$sql->query("

					DELETE FROM tb_cartsitems
					WHERE idcart = :idcart
					AND iditem = :iditem 
					LIMIT 1;

					", 
					
					[

						':idcart'=>$this->getidcart(),
						':iditem'=>$iditem

					]
				
				);//end query

			}//end else

			//$this->getCalculateTotal();
			
		}//end try 
		catch ( \Exception $e ) 
		{

			return false;
			
		}//end catch

	}//END removeProduct









	/*public function removeProduct( Product $product, $all = false )
	{

			

		$sql = new Sql();

		if( $all )
		{
			$sql->query("

				DELETE FROM tb_cartsproducts
				WHERE idcart = :idcart
				AND idproduct = :idproduct

				", 
				
				[

					':idcart'=>$this->getidcart(),
					':idproduct'=>$product->getidproduct()

				]
			
			);//end query

		}//end if
		else
		{
			$sql->query("

				DELETE FROM tb_cartsproducts
				WHERE idcart = :idcart
				AND idproduct = :idproduct 
				LIMIT 1;

				", 
				
				[

					':idcart'=>$this->getidcart(),
					':idproduct'=>$product->getidproduct()

				]
			
			);//end query

		}//end else

		$this->getCalculateTotal();

	}//END removeProduct*/









	/**public function removeProduct( Product $product, $all = false )
	{

		$sql = new Sql();

		if( $all )
		{
			$sql->query("

				UPDATE tb_cartsproducts 
				SET dtremoved = NOW() 
				WHERE idcart = :idcart 
				AND idproduct = :idproduct 
				AND dtremoved IS NULL

				", 
				
				[

					':idcart'=>$this->getidcart(),
					':idproduct'=>$product->getidproduct()

				]
			
			);//end query

		}//end if
		else
		{
			$sql->query("

				UPDATE tb_cartsproducts 
				SET dtremoved = NOW() 
				WHERE idcart = :idcart 
				AND idproduct = :idproduct 
				AND dtremoved IS NULL 
				LIMIT 1;

				", 
				
				[

					':idcart'=>$this->getidcart(),
					':idproduct'=>$product->getidproduct()

				]
			
			);//end query

		}//end else

		$this->getCalculateTotal();

	}//END removeProduct */










	public function getInterestTotal( $inpaymentmethod, $nrinstallment, $incharge )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vlprice
			FROM tb_cartsitems a
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select


		
		
		$interest = 0;

		foreach ($results as $row) 
		{
			# code...
			$interestProduct = Wirecard::getInterest( $row['vlprice'], $inpaymentmethod, $nrinstallment, $incharge );


			$interestProduct = number_format($interestProduct, 2, ".", "");

		
			$interest += $interestProduct*$row['nrqtd'];


		}//end foreach


		return $interest;



	}//END getInterestTotal















	public function getProducts()
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsitems a
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select

		# Verifica o desphoto (gambiarra)
		//return Product::checkList($rows);

		return $results;



	}//END getProducts







	/*public function getProducts()
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsproducts a 
			INNER JOIN tb_products b USING (idproduct) 
			WHERE a.idcart = :idcart AND a.dtremoved IS NULL
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select

		# Verifica o desphoto (gambiarra)
		//return Product::checkList($rows);

		return $results;



	}//END getProducts*/







	public function getProductsTotals()
	{

		

		$sql = new Sql();

		$results = $sql->select("

				SELECT 
				SUM(vlprice) AS vlprice,
				COUNT(*) AS nrqtd
				FROM tb_products a
				INNER JOIN tb_cartsitems b ON a.idproduct = b.iditem
				WHERE b.initem = 1
				AND b.idcart = :idcart;

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			return $results[0];

		}//end if
		else
		{

			return [];

		}//end else

	}//END getProductsTotal






















	public static function getProductsTotalsStatic( $idcart )
	{
		$sql = new Sql();

		$results = $sql->select("

				SELECT 
				SUM(vlprice) AS vlprice,
				COUNT(*) AS nrqtd
				FROM tb_products a
				INNER JOIN tb_cartsitems b ON a.idproduct = b.iditem
				WHERE b.initem = 1
				AND b.idcart = :idcart;

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			return $results[0];

		}//end if
		

	}//END getProductsTotal








	/*public function getProductsTotals()
	{
		$sql = new Sql();

		$results = $sql->select("

				SELECT 
				SUM(vlprice) AS vlprice,
				COUNT(*) AS nrqtd
				FROM tb_products a
				INNER JOIN tb_cartsproducts b
				ON a.idproduct = b.idproduct
				WHERE b.idcart = :idcart;

			", 
			
			[

				':idcart'=>$this->getidcart()

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			return $results[0];

		}//end if
		else
		{

			return [];

		}//end else

	}//END getProductsTotal*/





	






	public function getCalculateTotal()
	{

		//$this->updateFreight();

		$totals = $this->getProductsTotals();


		# Soma dos produtos
		//$this->setvlsubtotal($totals['vlprice']);

		# Soma dos produtos + valor do frete
		$this->setvltotal($totals['vlprice']);

		

	}//END getCalculateTotal









	public static function formatValueToDecimal( $value )
	{

		$value = str_replace('.', '', $value);

		return str_replace(',', '.', $value);

	}//END formatValueToDecimal










	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_carts
			WHERE idcart = :idcart

			", 
			
			[

				'idcart'=>$this->getidcart()

			]
		
		);//end query

	}//END delete









	public static function setError( $msg )
	{

		$_SESSION[Cart::SESSION_ERROR] = $msg;


	}//END setMsgErro






	
	public static function getError()
	{

		$msg = (isset($_SESSION[Cart::SESSION_ERROR])) ? $_SESSION[Cart::SESSION_ERROR] : "";

		Cart::clearError();

		return $msg;

	}//END getMsgErro






	public static function clearError()
	{

		$_SESSION[Cart::SESSION_ERROR] = NULL;

	}//END clearMsgError









	public static function setSuccess($msg)
	{

		$_SESSION[Cart::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Cart::SUCCESS]) && $_SESSION[Cart::SUCCESS]) ? $_SESSION[Cart::SUCCESS] : '';

		Cart::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Cart::SUCCESS] = NULL;

	}//END clearSuccess 










	public function getValues()
	{

		$this->getCalculateTotal();

		return parent::getValues();

	}//END getValues







	

	public static function removeFromSession()
	{


    	$_SESSION[Cart::SESSION] = NULL;


    	
	}//END removeFromSession







}//END class Cart




 ?>