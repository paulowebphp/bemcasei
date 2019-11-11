<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class OuterList extends Model
{

	# Session
	const SESSION = "OuterListSession";

	# Error - Success
	const SUCCESS = "OuterList-Success";
	const ERROR = "OuterList-Error";











    
    /*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_outerlists_update(
			               
                :idouterlist,
                :iduser,
                :instatus,
                :inposition,
                :desouterlist,
                :desdescription,
                :dessite,
                :deslocation,
                :nrphone

			)", 
			
			[

				':idouterlist'=>$this->getidouterlist(),
				':iduser'=>$this->getiduser(),
				':instatus'=>$this->getinstatus(),
				':inposition'=>$this->getinposition(),
				':desouterlist'=>$this->getdesouterlist(),
				':desdescription'=>$this->getdesdescription(),
				':dessite'=>$this->getdessite(),
				':deslocation'=>$this->getdeslocation(),
				':nrphone'=>$this->getnrphone()
				
			]
        
            
        );//end select



		//$results[0]['desouterlist'] = utf8_encode($results[0]['desouterlist']);
		//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
		//$results[0]['dessite'] = utf8_encode($results[0]['dessite']);
		//$results[0]['deslocation'] = utf8_encode($results[0]['deslocation']);


       
		

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

				CALL sp_outerlists_update(
				               
	                :idouterlist,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desouterlist,
	                :desdescription,
	                :dessite,
	                :deslocation,
	                :nrphone

				)", 
				
				[

					':idouterlist'=>$this->getidouterlist(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desouterlist'=>utf8_decode($this->getdesouterlist()),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':dessite'=>utf8_decode($this->getdessite()),
					':deslocation'=>utf8_decode($this->getdeslocation()),
					':nrphone'=>$this->getnrphone()
					
				]
	        
	            
	        );//end select



			$results[0]['desouterlist'] = utf8_encode($results[0]['desouterlist']);
			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
			$results[0]['dessite'] = utf8_encode($results[0]['dessite']);
			$results[0]['deslocation'] = utf8_encode($results[0]['deslocation']);

			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_outerlists_update(
				               
	                :idouterlist,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desouterlist,
	                :desdescription,
	                :dessite,
	                :deslocation,
	                :nrphone

				)", 
				
				[

					':idouterlist'=>$this->getidouterlist(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desouterlist'=>$this->getdesouterlist(),
					':desdescription'=>$this->getdesdescription(),
					':dessite'=>$this->getdessite(),
					':deslocation'=>$this->getdeslocation(),
					':nrphone'=>$this->getnrphone()
					
				]
	        
	            
	        );//end select

	        


		}//end else
       
		

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save














	public function getOuterList( $idouterlist )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_outerlists
			WHERE idouterlist = :idouterlist
			ORDER BY 
			inposition ASC,
			desouterlist ASC,
			dtregister DESC

			", 
			
			[

				':idouterlist'=>$idouterlist

			]
		
		);//end select

		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desouterlist'] = utf8_encode($results[0]['desouterlist']);
				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
				$results[0]['dessite'] = utf8_encode($results[0]['dessite']);
				$results[0]['deslocation'] = utf8_encode($results[0]['deslocation']);
					
			}//end if

			$this->setData($results[0]);
			
		}//end if


	}//END getEvent




















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_outerlists
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desouterlist ASC,
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
					$row['desouterlist'] = utf8_encode($row['desouterlist']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

				}//end foreach
					
				
			}//end if
			
		}//end if

			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return



	}//END get
















	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_outerlists
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desouterlist ASC,
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
					$row['desouterlist'] = utf8_encode($row['desouterlist']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

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

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_outerlists
			WHERE iduser = :iduser AND desouterlist LIKE :search
			ORDER BY 
			inposition ASC,
			desouterlist ASC,
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
					$row['desouterlist'] = utf8_encode($row['desouterlist']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

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
			FROM tb_outerlists
			WHERE iduser = :iduser
			AND instatus = 1
			ORDER BY 
			inposition ASC,
			desouterlist ASC,
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
					$row['desouterlist'] = utf8_encode($row['desouterlist']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

				}//end foreach
					
				
			}//end if
			
		}//end if

		

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return





    }//END getPage





















    public function maxOuterLists( $inplan )
	{

		switch( $inplan )
		{
			case '001':
				# code...
				return Rule::MAX_OUTER_LISTS_FREE;
				break;

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_OUTER_LISTS_BASIC;
				break;

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_OUTER_LISTS_INTERMEDIATE;
				break;

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_OUTER_LISTS_ADVANCED;
				break;
			
			default:
				# code...
				return Rule::MAX_OUTER_LISTS_FREE;
				break;

		}//end switch



	}//END maxEvents



	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_outerlists
			WHERE idouterlist = :idouterlist
			
			",
			
			[

				':idouterlist'=>$this->getidouterlist()

			]
		
		);//end query

	}//END delete










	public static function setError( $msg )
	{

		$_SESSION[OuterList::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[OuterList::ERROR]) && $_SESSION[OuterList::ERROR]) ? $_SESSION[OuterList::ERROR] : '';

		OuterList::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[OuterList::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[OuterList::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[OuterList::SUCCESS]) && $_SESSION[OuterList::SUCCESS]) ? $_SESSION[OuterList::SUCCESS] : '';

		OuterList::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[OuterList::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class OuterList




 ?>