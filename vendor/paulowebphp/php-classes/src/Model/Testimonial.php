<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;


class Testimonial extends Model
{

	# Session
	const SESSION = "TestimonialSession";

	# Error - Success
	const SUCCESS = "Testimonial-Success";
	const ERROR = "Testimonial-Error";







	

	public function update()
	{

		$sql = new Sql();

		

		


        if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_testimonials_update(
				               
	                :idtestimonial,
	                :iduser,
	                :instatus,
	                :insample,
	                :inrating,
	                :desdescription
                

				)", 
				
				[

					
					':idtestimonial'=>$this->getidtestimonial(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':insample'=>$this->getinsample(),
					':inrating'=>$this->getinrating(),
					':desdescription'=>utf8_decode($this->getdesdescription())

					
				]
	        
	            
	        );//end select
			

			$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_testimonials_update(
				               
	                :idtestimonial,
	                :iduser,
	                :instatus,
	                :insample,
	                :inrating,
	                :desdescription
                

				)", 
				
				[

					
					':idtestimonial'=>$this->getidtestimonial(),
					':iduser'=>$this->getiduser(),
					':instatus'=>$this->getinstatus(),
					':insample'=>$this->getinsample(),
					':inrating'=>$this->getinrating(),
					':desdescription'=>$this->getdesdescription()

					
				]
	        
	            
	        );//end select


	        


		}//end else


		
	

		if( count($results) > 0 )
		{

			//$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);

			$this->setData($results[0]);

		}//end if

        

	}//END save




















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_testimonials
		    WHERE iduser = :iduser
		    ORDER BY inrating DESC,
		    dtregister DESC;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select





		

		if(count($results) > 0)
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
			{

				$results[0]['desdescription'] = utf8_encode($results[0]['desdescription']);


			}//end if

			$this->setData($results[0]);

		}//end if


	}//END get






























	public function getSiteSamples( $limit = 15 )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT a.idtestimonial,
			a.instatus, 
			a.insample, 
			a.inrating, 
			a.desdescription,
			b.desdomain,
			c.desnick,
			d.desconsort,
			e.desbanner,
			f.dtwedding
			FROM tb_testimonials a
			INNER JOIN tb_users b ON a.iduser = b.iduser
			INNER JOIN tb_persons c ON b.idperson = c.idperson
			INNER JOIN tb_consorts d ON b.iduser = d.iduser
			INNER JOIN tb_customstyle e ON b.iduser = e.iduser
			INNER JOIN tb_weddings f ON b.iduser = f.iduser
			WHERE a.desdescription <> ''
			AND b.desdomain IS NOT NULL
			AND a.instatus = 1
			AND a.insample = 1
			ORDER BY a.inrating DESC,
			a.dtregister DESC
			LIMIT $limit;
		
			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select





		

		if(count($results) > 0)
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
			{

				foreach( $results as &$row )
				{
					$row['desnick'] = utf8_encode($row['desnick']);
					$row['desconsort'] = utf8_encode($row['desconsort']);
					$row['desdescription'] = utf8_encode($row['desdescription']);

				}//end foreach


			}//end if

			$this->setData($results[0]);

		}//end if


	}//END get


























	public static function setError( $msg )
	{

		$_SESSION[Testimonial::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Testimonial::ERROR]) && $_SESSION[Testimonial::ERROR]) ? $_SESSION[Testimonial::ERROR] : '';

		Testimonial::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Testimonial::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Testimonial::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Testimonial::SUCCESS]) && $_SESSION[Testimonial::SUCCESS]) ? $_SESSION[Testimonial::SUCCESS] : '';

		Testimonial::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Testimonial::SUCCESS] = NULL;

	}//END clearSuccess 





	








}//END class Testimonial




 ?>