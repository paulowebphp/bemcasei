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