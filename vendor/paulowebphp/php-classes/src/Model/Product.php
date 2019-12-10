<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;



class Product extends Model
{

	# Session
	const SESSION = "ProductSession";

	# Error - Success
	const SUCCESS = "Product-Success";
	const ERROR = "Product-Error";















	/*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_products_update(
					
				:idproduct,
				:iduser,
				:incategory,
				:desproduct, 
				:vlprice, 
				:desphoto,
				:desextension
				
			)", 
			
			[

				":idproduct"=>$this->getidproduct(),
				":iduser"=>$this->getiduser(),
				":incategory"=>$this->getincategory(),
				":desproduct"=>$this->getdesproduct(),
				":vlprice"=>$this->getvlprice(),
				":desphoto"=>$this->getdesphoto(),
				":desextension"=>$this->getdesextension()
				
			]
        
            
    	);//end select
			

		//$results[0]['desproduct'] = utf8_encode($results[0]['desproduct']);

		


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END update*/




























	public function update()
	{

		$sql = new Sql();

		

		


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_products_update(
						
					:idproduct,
					:iduser,
					:incategory,
					:desproduct, 
					:vlprice, 
					:desphoto,
					:desextension
					
				)", 
				
				[

					":idproduct"=>$this->getidproduct(),
					":iduser"=>$this->getiduser(),
					":incategory"=>$this->getincategory(),
					":desproduct"=>utf8_decode($this->getdesproduct()),
					":vlprice"=>$this->getvlprice(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension()
					
				]
	        
	            
	    	);//end select
				

			$results[0]['desproduct'] = utf8_encode($results[0]['desproduct']);
			
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_products_update(
						
					:idproduct,
					:iduser,
					:incategory,
					:desproduct, 
					:vlprice, 
					:desphoto,
					:desextension
					
				)", 
				
				[

					":idproduct"=>$this->getidproduct(),
					":iduser"=>$this->getiduser(),
					":incategory"=>$this->getincategory(),
					":desproduct"=>$this->getdesproduct(),
					":vlprice"=>$this->getvlprice(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension()
					
				]
	        
	            
	    	);//end select

	        


		}//end else


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END update















	public function getProduct( $idproduct )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_products
			WHERE idproduct = :idproduct
			

			", 
			
			[

				':idproduct'=>$idproduct

			]
		
		);//end select

		
		




		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desproduct'] = utf8_encode($results[0]['desproduct']);
					
			}//end if

		

			$this->setData($results[0]);
			
		}//end if

	}//END update
















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products
			WHERE iduser = :iduser
			ORDER BY dtregister DESC


			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			

			foreach( $results as &$row )
			{
				# code...		
				$row['desproduct'] = utf8_encode($row['desproduct']);

			}//end foreach
				
			
		}//end if






		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select




		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return


		

		/*if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

	}//END get






















	public function getNumProducts( $iduser )
	{


		$sql = new Sql();

			$results = $sql->select("

				SELECT COUNT(*) as nrtotal
				FROM tb_products
				WHERE iduser = :iduser;

			",

			[

				'iduser'=>$iduser

			]);//end select


			return $results[0]['nrtotal'];


	}//END getNumProducts














	public function getWithLimit( $iduser, $inplan )
	{

		$limit = $this->maxProducts($inplan);

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products
			WHERE iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT $limit

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			

			foreach( $results as &$row )
			{
				# code...		
				$row['desproduct'] = utf8_encode($row['desproduct']);

			}//end foreach
				
			
		}//end if




		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return


	}//END getWithLimit
















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products
			WHERE iduser = :iduser
			ORDER BY dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			

			foreach( $results as &$row )
			{
				# code...		
				$row['desproduct'] = utf8_encode($row['desproduct']);

			}//end foreach
				
			
		}//end if




		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

    }//END getPage




	











    public function getSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
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
			FROM tb_products
			WHERE iduser = :iduser AND desproduct LIKE :search
			ORDER BY dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			

			foreach( $results as &$row )
			{
				# code...		
				$row['desproduct'] = utf8_encode($row['desproduct']);

			}//end foreach
				
			
		}//end if




		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if */

		}//END getSearch





















		public static function checkDirection( $orderby )
		{



			if (


				in_array( $orderby, [

					'valor-menor',
					'valor-maior',
					'nome-a-z',
					'nome-z-a'
				
				])

			)
			{
				# code...
				return true;



			}//end if
			else
			{


				return false;


			}//end else


		}//END checkOrdination
			

















		public function getProductsOrderby( $iduser, $orderby, $page = 1, $itensPerPage = 10 )
		{

			$start = ($page - 1) * $itensPerPage;


			$orderby = explode('-', $orderby, 2);


			


			switch ( $orderby[0] ) 
			{
				case 'valor':
					# code...
					$field1 = 'vlprice';
					$field2 = 'desproduct';
					break;
				
				case 'nome':
					# code...
					$field1 = 'desproduct';
					$field2 = 'vlprice';
					break;

			}//end switch




			switch ( $orderby[1] ) 
			{
				case 'menor':
				case 'a-z':
					# code...
					$direction = 'ASC';
					break;
				
				case 'maior':
				case 'z-a':
					# code...
					$direction = 'DESC';
					break;

			}//end switch




			$sql = new Sql();

			$results = $sql->select("

				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_products
				WHERE iduser = :iduser
				ORDER BY $field1 $direction,
				$field2 ASC,
				dtregister DESC
				LIMIT $start, $itensPerPage;

				", 
				
				[

					':iduser'=>$iduser

				]
			
			);//end select


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desproduct'] = utf8_encode($row['desproduct']);

				}//end foreach
					
				
			}//end if




			$nrtotal = $sql->select("
			
				SELECT FOUND_ROWS() AS nrtotal;
				
			");//end select


			

			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

			];//end return


			

			/**if( count($results) > 0 )
			{

				$this->setData($results);
				
			}//end if */

		}//END getSearch

















			public function getPageStore( $iduser, $page = 1, $itensPerPage = 10 )
			{

				$start = ($page - 1) * $itensPerPage;

				$sql = new Sql();

				$results = $sql->select("

					SELECT SQL_CALC_FOUND_ROWS *
					FROM tb_products
					WHERE iduser = :iduser
					ORDER BY vlprice ASC,
					desproduct ASC,
					dtregister DESC
					LIMIT $start, $itensPerPage;

					", 
					
					[

						':iduser'=>$iduser

					]
				
				);//end select


				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desproduct'] = utf8_encode($row['desproduct']);

					}//end foreach
						
					
				}//end if




				$nrtotal = $sql->select("
				
					SELECT FOUND_ROWS() AS nrtotal;
					
				");//end select

				return [

					'results'=>$results,
					'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
					'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

				];//end return


				

				/**if( count($results) > 0 )
				{

					$this->setData($results);
					
				}//end if */

		    }//END getPage



































			public function getCategoryOrderby( $iduser, $orderby, $category, $page = 1, $itensPerPage = 10 )
			{

				$start = ($page - 1) * $itensPerPage;

				$orderby = explode('-', $orderby, 2);



				

				$incategory = Product::getCategoryCode($category);



				switch ( $orderby[0] ) 
				{
					case 'valor':
						# code...
						$field1 = 'vlprice';
						$field2 = 'desproduct';
						break;
					
					case 'nome':
						# code...
						$field1 = 'desproduct';
						$field2 = 'vlprice';
						break;

				}//end switch





				switch ( $orderby[1] ) 
				{
					case 'menor':
					case 'a-z':
						# code...
						$direction = 'ASC';
						break;
					
					case 'maior':
					case 'z-a':
						# code...
						$direction = 'DESC';
						break;

				}//end switch



				$sql = new Sql();

				$results = $sql->select("

					SELECT SQL_CALC_FOUND_ROWS *
					FROM tb_products
					WHERE iduser = :iduser
					AND incategory = :incategory
					ORDER BY $field1 $direction,
					$field2 ASC,
					dtregister DESC

					LIMIT $start, $itensPerPage;

					", 
					
					[

						':iduser'=>$iduser,
						':incategory'=>$incategory

					]
				
				);//end select


				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desproduct'] = utf8_encode($row['desproduct']);

					}//end foreach
						
					
				}//end if



				$nrtotal = $sql->select("
				
					SELECT FOUND_ROWS() AS nrtotal;
					
				");//end select

				return [

					'results'=>$results,
					'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
					'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

				];//end return


				

				/**if( count($results) > 0 )
				{

					$this->setData($results);
					
				}//end if */

			}//END getSearch










			public function getCategoryPage( $iduser, $category, $page = 1, $itensPerPage = 10 )
			{

				$start = ($page - 1) * $itensPerPage;

				$sql = new Sql();


				$incategory = Product::getCategoryCode($category);

				$results = $sql->select("

					SELECT SQL_CALC_FOUND_ROWS *
					FROM tb_products
					WHERE iduser = :iduser
					AND incategory = :incategory
					ORDER BY vlprice ASC,
					desproduct ASC,
					dtregister DESC
					LIMIT $start, $itensPerPage;

					", 
					
					[

						':iduser'=>$iduser,
						':incategory'=>$incategory

					]
				
				);//end select


				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desproduct'] = utf8_encode($row['desproduct']);

					}//end foreach
						
					
				}//end if




				$nrtotal = $sql->select("
				
					SELECT FOUND_ROWS() AS nrtotal;
					
				");//end select

				return [

					'results'=>$results,
					'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
					'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

				];//end return


				

				/**if( count($results) > 0 )
				{

					$this->setData($results);
					
				}//end if */

		    }//END getPage
			












		public function getFromURL( $desurl )
		{
			$sql = new Sql();

			$rows = $sql->select("

				SELECT * FROM tb_products 
				WHERE desurl = :desurl
				LIMIT 1;

				", 
				
				[

					':desurl'=>$desurl

				]
			
			);//end select


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desproduct'] = utf8_encode($results[0]['desproduct']);
					
			}//end if


			

			if( count($results) > 0 )
			{

				$this->setData($results[0]);
				
			}//end if

		}//END getFromURL











	public static function getCategoryFullArray()
	{


		return [


			'0'=>[ 

				'descategory'=>'Bar e Adega',
				'desurl'=>'bar-e-adega',
				'incategory'=>'11'

			],
			'1'=>[ 

				'descategory'=>'Cama, Mesa e Banho',
				'desurl'=>'cama-mesa-banho',
				'incategory'=>'12'

			],
			'2'=>[ 

				'descategory'=>'Cozinha',
				'desurl'=>'cozinha',
				'incategory'=>'13'

			],
			'3'=>[ 

				'descategory'=>'Eletrodomésticos',
				'desurl'=>'eletrodomesticos',
				'incategory'=>'14'

			],
			'4'=>[ 

				'descategory'=>'Eletrônicos',
				'desurl'=>'eletronicos',
				'incategory'=>'15'

			],
			'5'=>[ 

				'descategory'=>'Lua de Mel',
				'desurl'=>'lua-de-mel',
				'incategory'=>'16'

			],
			'6'=>[ 

				'descategory'=>'Móveis',
				'desurl'=>'moveis',
				'incategory'=>'17'

			]

		];



	}//end getCategoryFullArray














	public static function checkCategory( $value )
	{

		$array = Product::getCategoryFullArray();

		foreach ($array as $row)
		{
		
			# code...
			if( $row['desurl'] == $value )
			{
				return true;
				
			}//end if

		}//end foreach

		return false;
	

	}//END checkCategory









	public static function getCategory( $value )
	{

		$categoryArray = Product::getCategoryFullArray();

		

		switch ($value) 
		{
			case '11':
				# code...
				return $categoryArray[0]['descategory'];
			

			case '12':
				# code...
				return $categoryArray[1]['descategory'];


			case '13':
				# code...
				return $categoryArray[2]['descategory'];


			case '14':
				# code...
				return $categoryArray[3]['descategory'];


			case '15':
				# code...
				return $categoryArray[4]['descategory'];


			case '16':
				# code...
				return $categoryArray[5]['descategory'];


			case '17':
				# code...
				return $categoryArray[6]['descategory'];
		
		
		}//end switch



	}//end getCategory












	public static function getCategoryCode( $value )
	{


		$categoryArray = Product::getCategoryFullArray();


		

		switch ( $value ) 
		{
			case 'bar-e-adega':
				# code...
				return $categoryArray[0]['incategory'];
			

			case 'cama-mesa-banho':
				# code...
				return $categoryArray[1]['incategory'];


			case 'cozinha':
				# code...
				return $categoryArray[2]['incategory'];


			case 'eletrodomesticos':
				# code...
				return $categoryArray[3]['incategory'];


			case 'eletronicos':
				# code...
				return $categoryArray[4]['incategory'];


			case 'lua-de-mel':
				# code...
				return $categoryArray[5]['incategory'];


			case 'moveis':
				# code...
				return $categoryArray[6]['incategory'];
		
		
		}//end switch



	}//end getCategoryFullArray















	public static function getCategoryName( $value )
	{


		$categoryArray = Product::getCategoryFullArray();


		

		switch ( $value ) 
		{
			case 'bar-e-adega':
				# code...
				return $categoryArray[0]['descategory'];
			

			case 'cama-mesa-banho':
				# code...
				return $categoryArray[1]['descategory'];


			case 'cozinha':
				# code...
				return $categoryArray[2]['descategory'];


			case 'eletrodomesticos':
				# code...
				return $categoryArray[3]['descategory'];


			case 'eletronicos':
				# code...
				return $categoryArray[4]['descategory'];


			case 'lua-de-mel':
				# code...
				return $categoryArray[5]['descategory'];


			case 'moveis':
				# code...
				return $categoryArray[6]['descategory'];
		
		
		}//end switch



	}//end getCategoryFullArray









    public function maxProducts( $inplan )
	{

		switch( $inplan )
		{
			case '001':
				# code...
				return Rule::MAX_PRODUCTS_FREE;
				break;

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_PRODUCTS_BASIC;
				break;

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_PRODUCTS_INTERMEDIATE;
				break;

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_PRODUCTS_ADVANCED;
				break;
			
			default:
				# code...
				return Rule::MAX_PRODUCTS_FREE;
				break;

		}//end switch



	}//END maxEvents



















	public function getMaxProducts( $inplancontext )
	{

		switch( $inplancontext )
		{
			case '0':
				# code...
				return Rule::MAX_PRODUCTS_FREE;

			case '1':
				# code...
				return Rule::MAX_PRODUCTS_BASIC;

			case '2':
				# code...
				return Rule::MAX_PRODUCTS_INTERMEDIATE;

			case '3':
				# code...
				return Rule::MAX_PRODUCTS_ADVANCED;
			

		}//end switch



	}//END maxEvents















	# DELETE não recebe parâmetro porque espera-se que o objeto
	# já esteja carregado
	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_products
			WHERE idproduct = :idproduct
			
			",
			
			[

				':idproduct'=>$this->getidproduct()

			]
		
		);//end query

	}//END delete
	







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
				DIRECTORY_SEPARATOR . "products" . 
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







	public static function checkList( $list )
	{

		foreach ( $list as &$row )
		{
			# code...
			$p = new Product();

			$p->setData($row);

			$row = $p->getValues();

		}//end foreach

		return $list;

	}//END checkList






	/**public function save()
	{

		$sql = new Sql();

		$results = $sql->select("
		
			CALL sp_products_save(
				
				:idproduct,
				:iduser,
				:idgift,
				:inbought,
				:desproduct, 
				:vlprice, 
				:vlwidth, 
				:vlheight, 
				:vllength, 
				:vlweight, 
				:desurl
				
			)", 
			
			array(

				":idproduct"=>$this->getidproduct(),
				":iduser"=>$this->getiduser(),
				":idgift"=>$this->getidgift(),
				":inbought"=>$this->getinbought(),
				":desproduct"=>utf8_decode($this->getdesproduct()),
				":vlprice"=>$this->getvlprice(),
				":vlwidth"=>$this->getvlwidth(),
				":vlheight"=>$this->getvlheight(),
				":vllength"=>$this->getvllength(),
				":vlweight"=>$this->getvlweight(),
				":desurl"=>$this->getdesurl()

			)
		
		);//end array

		$this->setData($results[0]);

	}//END save */





	



	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
		
			SELECT * FROM tb_products 
			ORDER BY desproduct
			
		");//end select
		
	}//END listAll








	public static function setError( $msg )
	{

		$_SESSION[Product::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Product::ERROR]) && $_SESSION[Product::ERROR]) ? $_SESSION[Product::ERROR] : '';

		Product::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Product::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Product::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Product::SUCCESS]) && $_SESSION[Product::SUCCESS]) ? $_SESSION[Product::SUCCESS] : '';

		Product::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Product::SUCCESS] = NULL;

	}//END clearSuccess 









	public function toSession()
	{
		$_SESSION[Product::SESSION] = $this->getValues();

	}//END toSession







	public function getFromSession()
	{

		$this->setData($_SESSION[Product::SESSION]);

	}//END getFromSession











	/**public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}//END getValues */







	






	public function getCategories()
	{
		$sql = new Sql();

		return $sql->select("

			SELECT * FROM tb_categories a
			INNER JOIN tb_productscategories b
			ON a.idcategory = b.idcategory
			WHERE b.idproduct = :idproduct

			", 
			
			[

				':idproduct'=>$this->getidproduct()

			]
		
		);//end select

	}//END getCategories






	/**public static function getPage( $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			ORDER BY desproduct
			LIMIT $start, $itensPerPage;

		");//end select

		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return


	}//END getPage











	public static function getPageSearch( $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products
			WHERE desproduct LIKE :search
			ORDER BY desproduct
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':search'=>'%'.$search.'%'

			]
		
		);//end select

		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		return [

			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)

		];//end return


	}//END getPageSearch */





	/**public function getPage( 
		
		$iduser, 
		$inplan, 
		$page = 1, 
		$itensPerPage = Rule::ITENS_PER_PAGE 
		
	)
	{
		
		$itensPerPage_original = $itensPerPage;

		$maxLimit = $this->maxProducts($inplan);

		$module = $maxLimit % $itensPerPage;

		$start = ($page - 1) * $itensPerPage;
				
		if( 
			
			( ($page-1)*$itensPerPage )+$module == $maxLimit
			&&
			$module != 0

		)
		{

			$itensPerPage = $module;

		}//end if
	

		$sql = new Sql();

			$results = $sql->select("

				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_products
				WHERE iduser = :iduser
				ORDER BY dtregister DESC
				LIMIT $start, $itensPerPage;

				", 
				
				[

					':iduser'=>$iduser

				]
			
			);//end select


			foreach( $results as &$row )
			{
				# code...		
				$row['desproduct'] = utf8_encode($row['desproduct']);

			}//end foreach

			
			$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select

		if( $module === 0
				|| 
				isset($_GET)
		)
		{

			$pages = ceil($maxLimit / $itensPerPage_original);

		}//end if
		else
		{

			$pages = ceil($nrtotal[0]["nrtotal"] / $itensPerPage_original);

		}//end else


		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>$pages

		];//end return

	


	}//END getPage
	 */






}//END class Product





 ?>