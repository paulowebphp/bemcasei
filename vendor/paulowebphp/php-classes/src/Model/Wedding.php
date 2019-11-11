<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Wedding extends Model
{

	# Session
	const SESSION = "WeddingSession";

	# Error - Success
	const SUCCESS = "Wedding-Success";
	const ERROR = "Wedding-Error";





    
    /*public function update()
	{

		$sql = new Sql();
		
       
		$results = $sql->select("

			CALL sp_weddings_update(

				:idwedding,
				:iduser,
				:dtwedding,
				:tmwedding,
				:desdescription,
				:descostume,
				:desdirections,
				:desaddress,
				:desnumber,
				:desdistrict,
				:descity,
				:desstate,
				:descountry,
				:desphoto,
				:desextension


			)", 
			
			[

				':idwedding'=>$this->getidwedding(),
				':iduser'=>$this->getiduser(),
				':dtwedding'=>$this->getdtwedding(),
				':tmwedding'=>$this->gettmwedding(),
				':desdescription'=>$this->getdesdescription(),
				':descostume'=>$this->getdescostume(),
				':desdirections'=>$this->getdesdirections(),
				':desaddress'=>$this->getdesaddress(),
				':desnumber'=>$this->getdesnumber(),
				':desdistrict'=>$this->getdesdistrict(),
				':descity'=>$this->getdescity(),
				':desstate'=>$this->getdesstate(),
				':descountry'=>$this->getdescountry(),
				':desphoto'=>$this->getdesphoto(),
				':desextension'=>$this->getdesextension()

			]
		
		);//end select


		//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
		//$results[0]['descostume'] = utf8_encode($results[0]['descostume']);
		//$results[0]['desdirections'] = utf8_encode($results[0]['desdirections']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
		//$results[0]['descountry'] = utf8_encode($results[0]['descountry']);


		


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

				CALL sp_weddings_update(

					:idwedding,
					:iduser,
					:dtwedding,
					:tmwedding,
					:desdescription,
					:descostume,
					:desdirections,
					:desaddress,
					:desnumber,
					:desdistrict,
					:descity,
					:desstate,
					:descountry,
					:desphoto,
					:desextension


				)", 
				
				[

					':idwedding'=>$this->getidwedding(),
					':iduser'=>$this->getiduser(),
					':dtwedding'=>$this->getdtwedding(),
					':tmwedding'=>$this->gettmwedding(),
					':desdescription'=>utf8_decode($this->getdesdescription()),
					':descostume'=>utf8_decode($this->getdescostume()),
					':desdirections'=>utf8_decode($this->getdesdirections()),
					':desaddress'=>utf8_decode($this->getdesaddress()),
					':desnumber'=>$this->getdesnumber(),
					':desdistrict'=>utf8_decode($this->getdesdistrict()),
					':descity'=>utf8_decode($this->getdescity()),
					':desstate'=>utf8_decode($this->getdesstate()),
					':descountry'=>utf8_decode($this->getdescountry()),
					':desphoto'=>$this->getdesphoto(),
					':desextension'=>$this->getdesextension()

				]
			
			);//end select


			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
			$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
			$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
			$results[0]['descostume'] = utf8_encode($results[0]['descostume']);
			$results[0]['desdirections'] = utf8_encode($results[0]['desdirections']);
			$results[0]['descity'] = utf8_encode($results[0]['descity']);
			$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
			$results[0]['descountry'] = utf8_encode($results[0]['descountry']);
			
			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_weddings_update(

					:idwedding,
					:iduser,
					:dtwedding,
					:tmwedding,
					:desdescription,
					:descostume,
					:desdirections,
					:desaddress,
					:desnumber,
					:desdistrict,
					:descity,
					:desstate,
					:descountry,
					:desphoto,
					:desextension


				)", 
				
				[

					':idwedding'=>$this->getidwedding(),
					':iduser'=>$this->getiduser(),
					':dtwedding'=>$this->getdtwedding(),
					':tmwedding'=>$this->gettmwedding(),
					':desdescription'=>$this->getdesdescription(),
					':descostume'=>$this->getdescostume(),
					':desdirections'=>$this->getdesdirections(),
					':desaddress'=>$this->getdesaddress(),
					':desnumber'=>$this->getdesnumber(),
					':desdistrict'=>$this->getdesdistrict(),
					':descity'=>$this->getdescity(),
					':desstate'=>$this->getdesstate(),
					':descountry'=>$this->getdescountry(),
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











	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_weddings
			WHERE iduser = :iduser

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


	
		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);
				$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
				$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
				$results[0]['descostume'] = utf8_encode($results[0]['descostume']);
				$results[0]['desdirections'] = utf8_encode($results[0]['desdirections']);
				$results[0]['descity'] = utf8_encode($results[0]['descity']);
				$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
				$results[0]['descountry'] = utf8_encode($results[0]['descountry']);
				
			}//end if




			$this->setData($results[0]);
			
		}//end if

	}//END get







	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("

			SELECT * FROM tb_weddings

		");//end select

	}//END listAll







	public static function setError( $msg )
	{

		$_SESSION[Wedding::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Wedding::ERROR]) && $_SESSION[Wedding::ERROR]) ? $_SESSION[Wedding::ERROR] : '';

		Wedding::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Wedding::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Wedding::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Wedding::SUCCESS]) && $_SESSION[Wedding::SUCCESS]) ? $_SESSION[Wedding::SUCCESS] : '';

		Wedding::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Wedding::SUCCESS] = NULL;

	}//END clearSuccess 










}//END class Wedding




?>