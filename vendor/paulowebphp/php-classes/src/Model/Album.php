<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Album extends Model
{

	# Session
	const SESSION = "AlbumSession";

	# Error - Success
	const SUCCESS = "Album-Success";
	const ERROR = "Album-Error";










	/*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_albuns_update(
			               
                :idalbum,
                :iduser,
                :instatus,
                :inposition,
                :inphotosize,
                :desalbum,
                :desdescription,
                :desphoto,
                :desextension

                

			)", 
			
			[

				':idalbum'=>$this->getidalbum(),
				':iduser'=>$this->getiduser(),
				':instatus'=>$this->getinstatus(),
				':inposition'=>$this->getinposition(),
				':inphotosize'=>$this->getinphotosize(),
				':desalbum'=>$this->getdesalbum(),
				':desdescription'=>$this->getdesdescription(),
				':desphoto'=>$this->getdesphoto(),
				':desextension'=>$this->getdesextension()
				
			]
        
            
        );//end select


		//$results[0]['desalbum'] = utf8_encode($results[0]['desalbum']);
		//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

	

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save*/



	





    
    public function update()
	{

		$sql = new Sql();

		

		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_albuns_update(
				               
	                :idalbum,
	                :iduser,
	                :instatus,
	                :inposition,
	                :inphotosize,
	                :desalbum,
	                :desdescription,
	                :desphoto,
	                :desextension

	                

				)", 
				
				[

					':idalbum'=>$this->getidalbum(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':inphotosize'=>$this->getinphotosize(),
					':desalbum'=>utf8_decode($this->getdesalbum()),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':desphoto'=>$this->getdesphoto(),
					':desextension'=>$this->getdesextension()
					
				]
	        
	            
	        );//end select


			$results[0]['desalbum'] = utf8_encode($results[0]['desalbum']);
			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_albuns_update(
				               
	                :idalbum,
	                :iduser,
	                :instatus,
	                :inposition,
	                :inphotosize,
	                :desalbum,
	                :desdescription,
	                :desphoto,
	                :desextension

	                

				)", 
				
				[

					':idalbum'=>$this->getidalbum(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':inphotosize'=>$this->getinphotosize(),
					':desalbum'=>$this->getdesalbum(),
					':desdescription'=>$this->getdesdescription(),
					':desphoto'=>$this->getdesphoto(),
					':desextension'=>$this->getdesextension()
					
				]
	        
	            
	        );//end select

	        


		}//end else

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save

















	public function getAlbum( $idalbum )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_albuns
			WHERE idalbum = :idalbum
			ORDER BY inposition,
			desalbum,
			dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idalbum'=>$idalbum

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				$results[0]['desalbum'] = utf8_encode($results[0]['desalbum']);
				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
					
				
			}//end if



			$this->setData($results[0]);
			
		}//end if

	}//END getEvent


















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_albuns
			WHERE iduser = :iduser
			ORDER BY inposition,
			desalbum,
			dtregister DESC

			", 
			
			[

				':iduser'=>$iduser

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
					$row['desalbum'] = utf8_encode($row['desalbum']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if
			
			
		}//end if




		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return



	}//END get















	public static function getSizeTotal( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			
			SELECT COUNT(*) AS nrqtd,
			SUM(inphotosize) AS sizetotal
			FROM tb_albuns
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

	}//END get















	public function getInitialPage( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_albuns
			WHERE iduser = :iduser
			AND instatus = 1
			ORDER BY inposition,
			desalbum,
			dtregister DESC
			LIMIT 4;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		



		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desalbum'] = utf8_encode($row['desalbum']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if



			return $results;
			
		}//end if  
		


	}//END get



















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_albuns
			WHERE iduser = :iduser
			ORDER BY inposition,
			desalbum,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

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
					$row['desalbum'] = utf8_encode($row['desalbum']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if


						
		}//end if



		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


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
			FROM tb_albuns
			WHERE iduser = :iduser AND desalbum LIKE :search
			ORDER BY inposition,
			desalbum,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'
				//':search'=>$search

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
					$row['desalbum'] = utf8_encode($row['desalbum']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if
	
		
		}//end if


		




		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return



    }//END getSearch













    public function getTemplatePage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_albuns
			WHERE iduser = :iduser
			AND instatus = 1
			ORDER BY inposition,
			desalbum,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

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
					$row['desalbum'] = utf8_encode($row['desalbum']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if
			
		}//end if



		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


			

    }//END getPage
















    public static function maxAlbuns( $inplan )
	{

		switch( $inplan )
		{
			case '0':
			case '001':
				# code...
				return Rule::MAX_IMAGES_FREE;

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_IMAGES_BASIC;

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_IMAGES_INTERMEDIATE;

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_IMAGES_ADVANCED;
			
			default:
				# code...
				return Rule::MAX_IMAGES_FREE;

		}//end switch



	}//END maxEvents













	public function maxSizeTotal( $inplancontext )
	{

		switch( $inplancontext )
		{
			case '0':
				# code...
				return Rule::MAX_SIZE_TOTAL_FREE;

			case '1':
				# code...
				return Rule::MAX_SIZE_TOTAL_BASIC;

			case '2':
				# code...
				return Rule::MAX_SIZE_TOTAL_INTERMEDIATE;

			case '3':
				# code...
				return Rule::MAX_SIZE_TOTAL_ADVANCED;
			
			default:
				# code...
				return Rule::MAX_SIZE_TOTAL_FREE;

		}//end switch



	}//END maxEvents



	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_albuns
			WHERE idalbum = :idalbum
			
			",
			
			[

				':idalbum'=>$this->getidalbum()

			]
		
		);//end query

	}//END delete








	public static function setError( $msg )
	{

		$_SESSION[Album::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Album::ERROR]) && $_SESSION[Album::ERROR]) ? $_SESSION[Album::ERROR] : '';

		Album::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Album::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Album::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Album::SUCCESS]) && $_SESSION[Album::SUCCESS]) ? $_SESSION[Album::SUCCESS] : '';

		Album::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Album::SUCCESS] = NULL;

	}//END clearSuccess 











}//END class Album




 ?>