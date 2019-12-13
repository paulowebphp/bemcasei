<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Video extends Model
{

	# Session
	const SESSION = "VideoSession";

	# Error - Success
	const SUCCESS = "Video-Success";
	const ERROR = "Video-Error";









    
    /*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_videos_update(
			               
                :idvideo,
                :iduser,
                :instatus,
                :inposition,
                :desvideo,
                :desdescription,
                :desurl,
                :desvideocode,
                :desphoto,
                :desextension

			)", 
			
			[

				':idvideo'=>$this->getidvideo(),
				':iduser'=>$this->getiduser(),
				':instatus'=>$this->getinstatus(),
				':inposition'=>$this->getinposition(),
				':desvideo'=>$this->getdesvideo(),
				':desdescription'=>$this->getdesdescription(),
				':desurl'=>$this->getdesurl(),
				':desvideocode'=>$this->getdesvideocode(),
				':desphoto'=>$this->getdesphoto(),
				':desextension'=>$this->getdesextension()
				
			]
        
            
        );//end select
        

        //$results[0]['desvideo'] = utf8_encode($results[0]['desvideo']);
        //$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
        //$results[0]['desurl'] = utf8_encode($results[0]['desurl']);



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

				CALL sp_videos_update(
				               
	                :idvideo,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desvideo,
	                :desdescription,
	                :desurl,
	                :desvideocode,
	                :desphoto,
	                :desextension

				)", 
				
				[

					':idvideo'=>$this->getidvideo(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desvideo'=>utf8_decode($this->getdesvideo()),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':desurl'=>$this->getdesurl(),
					':desvideocode'=>$this->getdesvideocode(),
					':desphoto'=>$this->getdesphoto(),
					':desextension'=>$this->getdesextension()
					
				]
	        
	            
	        );//end select
	        

	        $results[0]['desvideo'] = utf8_encode($results[0]['desvideo']);
	        $results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
	        //$results[0]['desurl'] = utf8_encode($results[0]['desurl']);
				
			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_videos_update(
				               
	                :idvideo,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desvideo,
	                :desdescription,
	                :desurl,
	                :desvideocode,
	                :desphoto,
	                :desextension

				)", 
				
				[

					':idvideo'=>$this->getidvideo(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desvideo'=>$this->getdesvideo(),
					':desdescription'=>$this->getdesdescription(),
					':desurl'=>$this->getdesurl(),
					':desvideocode'=>$this->getdesvideocode(),
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
















	public function getVideo( $idvideo )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_videos
			WHERE idvideo = :idvideo
			ORDER BY 
			inposition ASC,
			desvideo ASC,
			dtregister DESC

			", 
			
			[

				':idvideo'=>$idvideo

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				foreach( $results as &$row )
				{
					# code...		
					$row['desvideo'] = utf8_encode($row['desvideo']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if




			$this->setData($results[0]);
			
		}//end if

	}//END getEvent



















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_videos
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desvideo ASC,
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
					# code...		
					$row['desvideo'] = utf8_encode($row['desvideo']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if
			
		}//end if



		

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return




		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if*/




	}//END get





















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_videos
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desvideo ASC,
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
					# code...		
					$row['desvideo'] = utf8_encode($row['desvideo']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach
					
				
			}//end if

			
		}//end if




			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return




		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if*/

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
			FROM tb_videos
			WHERE iduser = :iduser AND desvideo LIKE :search
			ORDER BY 
			inposition ASC,
			desvideo ASC,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
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
					$row['desvideo'] = utf8_encode($row['desvideo']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach	
				
			}//end if
			
		}//end if







			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return




		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if*/

    }//END getSearch

















    public function getTemplatePage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_videos
			WHERE iduser = :iduser
			AND instatus = 1
			ORDER BY 
			inposition,
			desvideo,
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
					# code...		
					$row['desvideo'] = utf8_encode($row['desvideo']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach	
				
			}//end if
		
		}//end if


		
			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


		

		/**if( count($results) > 0 )
		{

			$this->setData($results);
			
		}//end if*/

    }//END getPage























    public static function getNumVideos( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT COUNT(*)
			FROM tb_videos
			WHERE iduser = :iduser;

		",

		[

			'iduser'=>$iduser


		]);//end select


		return count($results[0]);



	}//END getNumGifts

















    public static function maxVideos( $inplan )
	{

		switch( $inplan )
		{
			case '0':
			case '001':
				# code...
				return Rule::MAX_VIDEOS_FREE;

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_VIDEOS_BASIC;

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_VIDEOS_INTERMEDIATE;

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_VIDEOS_ADVANCED;
			
			default:
				# code...
				return Rule::MAX_VIDEOS_FREE;

		}//end switch



	}//END maxEvents



	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_videos
			WHERE idvideo = :idvideo
			
			",
			
			[

				':idvideo'=>$this->getidvideo()

			]
		
		);//end query

	}//END delete












	public static function setError( $msg )
	{

		$_SESSION[Video::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Video::ERROR]) && $_SESSION[Video::ERROR]) ? $_SESSION[Video::ERROR] : '';

		Video::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Video::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Video::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Video::SUCCESS]) && $_SESSION[Video::SUCCESS]) ? $_SESSION[Video::SUCCESS] : '';

		Video::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Video::SUCCESS] = NULL;

	}//END clearSuccess 








}//END class Video




 ?>