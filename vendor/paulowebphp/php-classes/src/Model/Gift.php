<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;
use \Core\Model\Product;



class Gift extends Model
{

	# Session
	const SESSION = "GiftSession";

	# Error - Success
	const SUCCESS = "Gift-Success";
	const ERROR = "Gift-Error";







	public function getPage( $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_gifts
			ORDER BY incategory ASC
			LIMIT $start, $itensPerPage;

		");//end select


		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		



		
	

		if( count($results[0]) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desgift'] = utf8_encode($row['desgift']);

				}//end foreach
					
				
			}//end if



			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)
	
			];//end return
			
		}//end if
		else
		{
			return false;

		}//end else

    }//END getPage




	




    public function getSearch($search, $page = 1, $itensPerPage = 10 )
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
			FROM tb_gifts
			WHERE desgift LIKE :search
			ORDER BY incategory DESC
			LIMIT $start, $itensPerPage;


			", 
			
			[

				':search'=>'%'.$search.'%'

			]
		
		);//end select




		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		
		


		
		

		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desgift'] = utf8_encode($row['desgift']);

				}//end foreach
					
				
			}//end if



			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

			];//end return
			
		}//end if
		else
		{
			return false;

		}//end else



	}//END getSearch











































		public function getItemsOrderby( $orderby, $page = 1, $itensPerPage = 10 )
		{

			$start = ($page - 1) * $itensPerPage;


			$orderby = explode('-', $orderby, 2);


			


			switch ( $orderby[0] ) 
			{
				case 'valor':
					# code...
					$field1 = 'vlprice';
					$field2 = 'desgift';
					break;
				
				case 'nome':
					# code...
					$field1 = 'desgift';
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
				FROM tb_gifts
				ORDER BY $field1 $direction,
				$field2 ASC,
				dtregister DESC
				LIMIT $start, $itensPerPage;

			");//end select



			$nrtotal = $sql->select("
			
				SELECT FOUND_ROWS() AS nrtotal;
				
			");//end select





			


			

			if( count($results) > 0 )
			{

				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desgift'] = utf8_encode($row['desgift']);

					}//end foreach
						
					
				}//end if
				
			}//end if


		

			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

			];//end return



		}//END getItemsOrderby

















		public function getPageStore( $page = 1, $itensPerPage = 10 )
		{

			$start = ($page - 1) * $itensPerPage;

			$sql = new Sql();

			$results = $sql->select("

				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_gifts
				ORDER BY vlprice ASC,
				desgift ASC,
				dtregister DESC
				LIMIT $start, $itensPerPage;

			");//end select



			$nrtotal = $sql->select("
			
				SELECT FOUND_ROWS() AS nrtotal;
				
			");//end select





			


			

			if( count($results) > 0 )
			{

				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desgift'] = utf8_encode($row['desgift']);

					}//end foreach
						
					
				}//end if

			}//end if




			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

			];//end return





	    }//END getPage



































		public function getCategoryOrderby( $orderby, $category, $page = 1, $itensPerPage = 10 )
		{

			$start = ($page - 1) * $itensPerPage;

			$orderby = explode('-', $orderby, 2);



			

			$incategory = Product::getCategoryCode($category);



			switch ( $orderby[0] ) 
			{
				case 'valor':
					# code...
					$field1 = 'vlprice';
					$field2 = 'desgift';
					break;
				
				case 'nome':
					# code...
					$field1 = 'desgift';
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
				FROM tb_gifts
				WHERE incategory = :incategory
				ORDER BY $field1 $direction,
				$field2 ASC,
				dtregister DESC

				LIMIT $start, $itensPerPage;

				", 
				
				[

					':incategory'=>$incategory

				]
			
			);//end select



			$nrtotal = $sql->select("
			
				SELECT FOUND_ROWS() AS nrtotal;
				
			");//end select



			


			

			if( count($results) > 0 )
			{

				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					

					foreach( $results as &$row )
					{
						# code...		
						$row['desgift'] = utf8_encode($row['desgift']);

					}//end foreach
						
					
				}//end if
			
				
			}//end if



			return [

				'results'=>$results,
				'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
				'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

			];//end return





		}//END getSearch










			public function getCategoryPage( $category, $page = 1, $itensPerPage = 10 )
			{

				$start = ($page - 1) * $itensPerPage;

				$sql = new Sql();


				$incategory = Product::getCategoryCode($category);



				$results = $sql->select("

					SELECT SQL_CALC_FOUND_ROWS *
					FROM tb_gifts
					WHERE incategory = :incategory
					ORDER BY vlprice ASC,
					desgift ASC,
					dtregister DESC
					LIMIT $start, $itensPerPage;

					", 
					
					[

						':incategory'=>$incategory

					]
				
				);//end select




				$nrtotal = $sql->select("
				
					SELECT FOUND_ROWS() AS nrtotal;
					
				");//end select


				


				

				if( count($results) > 0 )
				{

					if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
					{
						

						foreach( $results as &$row )
						{
							# code...		
							$row['desgift'] = utf8_encode($row['desgift']);

						}//end foreach
							
						
					}//end if
					
				}//end if
				
										


				return [

					'results'=>$results,
					'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
					'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

				];//end return

				

		    }//END getPage
































		/*public static function getTemplateGift()
		{


			$sql = new Sql();

			$results = $sql->select("

				SELECT *
				FROM tb_gifts
				ORDER BY incategory ASC

			");//end select



			foreach( $results as &$row )
			{
				# code...		
				$row['desgift'] = utf8_encode($row['desgift']);

			}//end foreach

		

			if( count($results) > 0 )
			{

				return [

					'0'=>$results[3],
					'1'=>$results[6],
					'2'=>$results[13],
					'3'=>$results[17],
					'4'=>$results[20],
					'5'=>$results[39],
					'6'=>$results[44],
					'7'=>$results[55],
					'8'=>$results[60],
					'9'=>$results[71],
					'10'=>$results[80],
					'11'=>$results[88]
		
				];//end return
				
			}//end if
			



	    }//END getTemplatePage*/



















		public static function getNumGifts()
		{

			$sql = new Sql();

			$results = $sql->select("

				SELECT COUNT(*)
				FROM tb_gifts;

			");//end select


			if( count($results[0]) > 0 )
			{

				return $results[0];

			}//end if
			else
			{
				return false;
				
			}//end else



		}//END getNumGifts






    public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
		
			SELECT * FROM tb_gifts 
            ORDER BY incategory ASC
            LIMIT 15
			
		");//end select
		
	}//END listAll








    public function getGift( $idgift )
	{
        

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_gifts
			WHERE idgift = :idgift
			

			", 
			
			[

				':idgift'=>$idgift

			]
		
        );//end select
        

		
        
        
        
		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
					$row['desgift'] = utf8_encode($row['desgift']);

				}//end foreach
					
				
			}//end if

		

			$this->setData($results[0]);
			
		}//end if

    }//END getGift
    









	public static function setError( $msg )
	{

		$_SESSION[Gift::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Gift::ERROR]) && $_SESSION[Gift::ERROR]) ? $_SESSION[Gift::ERROR] : '';

		Gift::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Gift::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Gift::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Gift::SUCCESS]) && $_SESSION[Gift::SUCCESS]) ? $_SESSION[Gift::SUCCESS] : '';

		Gift::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Gift::SUCCESS] = NULL;

	}//END clearSuccess 









}//END class Gift





 ?>