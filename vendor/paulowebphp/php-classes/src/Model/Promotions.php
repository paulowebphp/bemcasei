<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;




class Promotions extends Model
{

	# Session
	const SESSION = "PromotionsSession";

	# Error - Success
	const SUCCESS = "Promotions-Success";
	const ERROR = "Promotions-Error";











	/*public function save()
	{

		$sql = new Sql();

		

		$results = $sql->select("

			CALL sp_leads_save(
			               
                :idlead,
                :desname,
                :desemail,
                :desip

			)", 
			
			[

				':idlead'=>$this->getidlead(),
				':desname'=>$this->getdesname(),
				':desemail'=>$this->getdesemail(),
				':desip'=>$this->getdesip()
				
			]
        
            
        );//end select
		


		//$results[0]['desname'] = utf8_encode($results[0]['desname']);
	
		


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if
		

		

	}//END save*/




    









    public function save()
	{

		$sql = new Sql();

		

		
	
		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_leads_save(
				               
	                :idlead,
	                :desname,
	                :desemail,
	                :desip

				)", 
				
				[

					':idlead'=>$this->getidlead(),
					':desname'=>utf8_encode($this->getdesname()),
					':desemail'=>$this->getdesemail(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select
			


			$results[0]['desname'] = utf8_encode($results[0]['desname']);
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_leads_save(
				               
	                :idlead,
	                :desname,
	                :desemail,
	                :desip

				)", 
				
				[

					':idlead'=>$this->getidlead(),
					':desname'=>$this->getdesname(),
					':desemail'=>$this->getdesemail(),
					':desip'=>$this->getdesip()
					
				]
	        
	            
	        );//end select

	        


		}//end else


		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if
		

		

	}//END save



























	public static function checkLead( $desemail )
	{



		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_leads
			WHERE desemail = :desemail
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':desemail'=>$desemail

			]
		
		);//end select



		return ( count($results) > 0 );


	}//END checkLead



































	public function getLead( $idlead )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_leads
			WHERE idlead = :idlead
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':idlead'=>$idlead

			]
		
		);//end select


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
					
			}//end if


			$this->setData($results[0]);
			
		}//end if

	}//END getEvent












































	public static function getAlbum( $idtemplate, $initialpage = false )
	{	


		$fullArray = [


			'1'=>[

				'0'=>[


					'desphoto'=>'photo1.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>'Myra Fotografia'
					

				],

				'1'=>[


					'desphoto'=>'photo2.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],


				'2'=>[


					'desphoto'=>'photo3.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'3'=>[


					'desphoto'=>'photo4.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],



				'4'=>[


					'desphoto'=>'photo5.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],


				

				'5'=>[


					'desphoto'=>'photo6.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],



				'6'=>[


					'desphoto'=>'photo7.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'7'=>[


					'desphoto'=>'photo8.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'8'=>[


					'desphoto'=>'photo9.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'9'=>[


					'desphoto'=>'photo10.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'10'=>[


					'desphoto'=>'photo11.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'11'=>[


					'desphoto'=>'photo13.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				],

				'12'=>[


					'desphoto'=>'photo14.jpg',
					'desalbum'=>'Myra Fotografia',
					'desdescription'=>''

				]

			]//end template


		];//end fullArray




		return $fullArray[1];

		
		


	}//END getTemplateNames
















































	public static function listAll()
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
			FROM tb_leads 
			ORDER BY dtregister DESC;

		");//end select


		if (count($results) > 0 ) 
		{
			# code...

			if ($_SERVER['HTTP_HOST'] != Rule::CANONICAL_NAME )
			{
				# code...
				foreach ($results as &$row) 
				{
					# code...
					$row['desname'] = utf8_decode($row['desname']);

				}//end foreach

			}//end if
			


			return $results;
			
		}//end if
		
	}//END listAll




























	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_leads
			WHERE idlead = :idlead
			
			",
			
			[

				':idlead'=>$this->getidlead()

			]
		
		);//end query

	}//END delete




























	public static function setError( $msg )
	{

		$_SESSION[Promotions::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Promotions::ERROR]) && $_SESSION[Promotions::ERROR]) ? $_SESSION[Promotions::ERROR] : '';

		Promotions::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Promotions::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Promotions::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Promotions::SUCCESS]) && $_SESSION[Promotions::SUCCESS]) ? $_SESSION[Promotions::SUCCESS] : '';

		Promotions::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Promotions::SUCCESS] = NULL;

	}//END clearSuccess 













}//END class Promotions




 ?>