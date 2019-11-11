<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Stakeholder extends Model
{

	# Session
	const SESSION = "StakeholderSession";

	# Error - Success
	const SUCCESS = "Stakeholder-Success";
	const ERROR = "Stakeholder-Error";















	/*public function update()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_stakeholdersupdate_save(
			               
                :idstakeholder,
                :iduser,
                :instatus,
                :inposition,
                :desstakeholder,
                :desdescription,
                :descategory,
                :deslocation,
                :desemail,
                :dessite,
                :nrphone

			)", 
			
			[

				':idstakeholder'=>$this->getidstakeholder(),
				':iduser'=>$this->getiduser(),
				':instatus'=>$this->getinstatus(),
				':inposition'=>$this->getinposition(),
				':desstakeholder'=>$this->getdesstakeholder(),
				':desdescription'=>$this->getdesdescription(),
				':descategory'=>$this->getdescategory(),
				':deslocation'=>$this->getdeslocation(),
				':desemail'=>$this->getdesemail(),
				':dessite'=>$this->getdessite(),
				':nrphone'=>$this->getnrphone()
				
			]
        
            
        );//end select
        

		//$results[0]['desstakeholder'] = utf8_encode($results[0]['desstakeholder']);
		//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
		//$results[0]['descategory'] = utf8_encode($results[0]['descategory']);
		//$results[0]['deslocation'] = utf8_encode($results[0]['deslocation']);
		//$results[0]['desemail'] = utf8_encode($results[0]['desemail']);
		//$results[0]['dessite'] = utf8_encode($results[0]['dessite']);






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

				CALL sp_stakeholdersupdate_save(
				               
	                :idstakeholder,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desstakeholder,
	                :desdescription,
	                :descategory,
	                :deslocation,
	                :desemail,
	                :dessite,
	                :nrphone

				)", 
				
				[

					':idstakeholder'=>$this->getidstakeholder(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desstakeholder'=>utf8_decode($this->getdesstakeholder()),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':descategory'=>utf8_decode($this->getdescategory()),
					':deslocation'=>utf8_decode($this->getdeslocation()),
					':desemail'=>$this->getdesemail(),
					':dessite'=>$this->getdessite(),
					':nrphone'=>$this->getnrphone()
					
				]
	        
	            
	        );//end select
	        
			$results[0]['desstakeholder'] = utf8_encode($results[0]['desstakeholder']);
			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
			$results[0]['descategory'] = utf8_encode($results[0]['descategory']);
			$results[0]['deslocation'] = utf8_encode($results[0]['deslocation']);
			$results[0]['desemail'] = utf8_encode($results[0]['desemail']);
			$results[0]['dessite'] = utf8_encode($results[0]['dessite']);
			
			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_stakeholdersupdate_save(
				               
	                :idstakeholder,
	                :iduser,
	                :instatus,
	                :inposition,
	                :desstakeholder,
	                :desdescription,
	                :descategory,
	                :deslocation,
	                :desemail,
	                :dessite,
	                :nrphone

				)", 
				
				[

					':idstakeholder'=>$this->getidstakeholder(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':inposition'=>$this->getinposition(),
					':desstakeholder'=>$this->getdesstakeholder(),
					':desdescription'=>$this->getdesdescription(),
					':descategory'=>$this->getdescategory(),
					':deslocation'=>$this->getdeslocation(),
					':desemail'=>$this->getdesemail(),
					':dessite'=>$this->getdessite(),
					':nrphone'=>$this->getnrphone()
					
				]
	        
	            
	        );//end select


	        


		}//end else

		

	



		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

        

	}//END save












	public function getStakeholder( $idstakeholder )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_stakeholders
			WHERE idstakeholder = :idstakeholder
			ORDER BY 
			inposition ASC,
			desstakeholder ASC,
			dtregister DESC

			", 
			
			[

				':idstakeholder'=>$idstakeholder

			]
		
		);//end select

		


		



		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				foreach( $results as &$row )
				{
					# code...		
					$row['desstakeholder'] = utf8_encode($row['desstakeholder']);
					$row['descategory'] = utf8_encode($row['descategory']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

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
			FROM tb_stakeholders
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desstakeholder ASC,
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

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME ) 
			{
				# code...

				foreach( $results as &$row )
				{
					# code...		
					$row['desstakeholder'] = utf8_encode($row['desstakeholder']);
					$row['descategory'] = utf8_encode($row['descategory']);
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
			FROM tb_stakeholders
			WHERE iduser = :iduser
			ORDER BY 
			inposition ASC,
			desstakeholder ASC,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		

		$numStakeholder = $sql->select("
		
			SELECT FOUND_ROWS() AS numstakeholders;
			
		");//end select




		


		

		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...

				foreach( $results as &$row )
				{
					# code...		
					$row['desstakeholder'] = utf8_encode($row['desstakeholder']);
					$row['descategory'] = utf8_encode($row['descategory']);
					$row['deslocation'] = utf8_encode($row['deslocation']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['dessite'] = utf8_encode($row['dessite']);

				}//end foreach
				

			}//end if

		}//end if


			

		return [

			'results'=>$results,
			'numstakeholders'=>(int)$numStakeholder[0]["numstakeholders"],
			'pages'=>ceil($numStakeholder[0]["numstakeholders"] / $itensPerPage)

		];//end return





    }//END getPage
    














    public function getSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_stakeholders
			WHERE iduser = :iduser AND desstakeholder LIKE :search
			ORDER BY 
			inposition ASC,
			desstakeholder ASC,
			dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select




		$numStakeholders = $sql->select("
		
			SELECT FOUND_ROWS() AS numstakeholders;
			
		");//end select




		

		


		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME ) 
			{
				# code...

				foreach( $results as &$row )
				{
					# code...		
					$row['desevent'] = utf8_encode($row['desevent']);
					$row['desdescription'] = utf8_encode($row['desdescription']);
					$row['deslocation'] = utf8_encode($row['deslocation']);

				}//end foreach
				

			}//end if
			
		}//end if



			

		return [

			'results'=>$results,
			'numstakeholders'=>(int)$numStakeholders[0]["numstakeholders"],
			'pages'=>ceil($numStakeholders[0]["numstakeholders"] / $itensPerPage)

		];//end return




    }//END getSearch















    public function getTemplatePage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_stakeholders
			WHERE iduser = :iduser
			AND instatus = 1
			ORDER BY 
			inposition ASC,
			desstakeholder ASC,
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

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME ) 
			{
				# code...

				foreach( $results as &$row )
				{
					# code...		
					$row['desstakeholder'] = utf8_encode($row['desstakeholder']);
					$row['descategory'] = utf8_encode($row['descategory']);
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














    public function maxStakeholders( $inplan )
	{

		switch( $inplan )
		{
			case '001':
				# code...
				return Rule::MAX_STAKEHOLDERS_FREE;
				break;

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_STAKEHOLDERS_BASIC;
				break;

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_STAKEHOLDERS_INTERMEDIATE;
				break;

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_STAKEHOLDERS_ADVANCED;
				break;
			
			default:
				# code...
				return Rule::MAX_STAKEHOLDERS_FREE;
				break;

		}//end switch



	}//END maxEvents



	

	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_stakeholders
			WHERE idstakeholder = :idstakeholder
			
			",
			
			[

				':idstakeholder'=>$this->getidstakeholder()

			]
		
		);//end query

	}//END delete











	public static function setError( $msg )
	{

		$_SESSION[Stakeholder::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Stakeholder::ERROR]) && $_SESSION[Stakeholder::ERROR]) ? $_SESSION[Stakeholder::ERROR] : '';

		Stakeholder::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Stakeholder::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Stakeholder::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Stakeholder::SUCCESS]) && $_SESSION[Stakeholder::SUCCESS]) ? $_SESSION[Stakeholder::SUCCESS] : '';

		Stakeholder::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Stakeholder::SUCCESS] = NULL;

	}//END clearSuccess 









	public function toSession()
	{
		$_SESSION[Stakeholder::SESSION] = $this->getValues();

	}//END toSession







	public function getFromSession()
	{

		$this->setData($_SESSION[Stakeholder::SESSION]);

	}//END getFromSession











}//END class Stakeholder




 ?>