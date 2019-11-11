<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Rule;
use \Core\Model;
use \Moip\Moip;
use \Moip\Auth\OAuth;




class Customer extends Model
{

	const SESSION_ERROR = "CustomerError";

	



	

	/*public function save()
	{

		

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_customers_save(

				:idcustomer,
				:iduser,
				:descustomercode,
				:desname,
				:desemail,
				:nrcountryarea,
				:nrddd,
				:nrphone,
				:intypedoc,
				:desdocument,
			  	:deszipcode, 
				:desaddress,
				:desnumber, 
			  	:descomplement,
			  	:desdistrict, 
			  	:descity, 
			  	:desstate, 
			  	:descountry,
			  	:descardcode,
			  	:desbrand,
			  	:infirst6,
			  	:inlast4,
			  	:dtbirth


			);", 
			
			[

				':idcustomer'=>$this->getidcustomer(),
				':iduser'=>$this->getiduser(),
				':descustomercode'=>$this->getdescustomercode(),
				':desname'=>$this->getdesname(),
				':desemail'=>$this->getdesemail(),
				':nrcountryarea'=>$this->getnrcountryarea(),
				':nrddd'=>$this->getnrddd(),
				':nrphone'=>$this->getnrphone(),
				':intypedoc'=>$this->getintypedoc(),
				':desdocument'=>$this->getdesdocument(),
				':deszipcode'=>$this->getdeszipcode(),			
				':desaddress'=>$this->getdesaddress(),
				':desnumber'=>$this->getdesnumber(),			
				':descomplement'=>$this->getdescomplement(),
				':desdistrict'=>$this->getdesdistrict(),
				':descity'=>$this->getdescity(),
				':desstate'=>$this->getdesstate(),
				':descountry'=>$this->getdescountry(),
				':descardcode'=>$this->getdescardcode(),
				':desbrand'=>$this->getdesbrand(),
				':infirst6'=>$this->getinfirst6(),
				':inlast4'=>$this->getinlast4(),
				':dtbirth'=>$this->getdtbirth()

			]
		
		);//end select



		


		

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

				CALL sp_customers_save(

					:idcustomer,
					:iduser,
					:descustomercode,
					:desname,
					:desemail,
					:nrcountryarea,
					:nrddd,
					:nrphone,
					:intypedoc,
					:desdocument,
				  	:deszipcode, 
					:desaddress,
					:desnumber, 
				  	:descomplement,
				  	:desdistrict, 
				  	:descity, 
				  	:desstate, 
				  	:descountry,
				  	:descardcode,
				  	:desbrand,
				  	:infirst6,
				  	:inlast4,
				  	:dtbirth


				);", 
				
				[

					':idcustomer'=>$this->getidcustomer(),
					':iduser'=>$this->getiduser(),
					':descustomercode'=>$this->getdescustomercode(),
					':desname'=>utf8_decode($this->getdesname()),
					':desemail'=>$this->getdesemail(),
					':nrcountryarea'=>$this->getnrcountryarea(),
					':nrddd'=>$this->getnrddd(),
					':nrphone'=>$this->getnrphone(),
					':intypedoc'=>$this->getintypedoc(),
					':desdocument'=>$this->getdesdocument(),
					':deszipcode'=>$this->getdeszipcode(),			
					':desaddress'=>$this->getdesaddress(),
					':desnumber'=>$this->getdesnumber(),			
					':descomplement'=>$this->getdescomplement(),
					':desdistrict'=>$this->getdesdistrict(),
					':descity'=>$this->getdescity(),
					':desstate'=>$this->getdesstate(),
					':descountry'=>$this->getdescountry(),
					':descardcode'=>$this->getdescardcode(),
					':desbrand'=>$this->getdesbrand(),
					':infirst6'=>$this->getinfirst6(),
					':inlast4'=>$this->getinlast4(),
					':dtbirth'=>$this->getdtbirth()

				]
			
			);//end select
			
			$results[0]['desname'] = utf8_encode($results[0]['desname']);
			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_customers_save(

					:idcustomer,
					:iduser,
					:descustomercode,
					:desname,
					:desemail,
					:nrcountryarea,
					:nrddd,
					:nrphone,
					:intypedoc,
					:desdocument,
				  	:deszipcode, 
					:desaddress,
					:desnumber, 
				  	:descomplement,
				  	:desdistrict, 
				  	:descity, 
				  	:desstate, 
				  	:descountry,
				  	:descardcode,
				  	:desbrand,
				  	:infirst6,
				  	:inlast4,
				  	:dtbirth


				);", 
				
				[

					':idcustomer'=>$this->getidcustomer(),
					':iduser'=>$this->getiduser(),
					':descustomercode'=>$this->getdescustomercode(),
					':desname'=>$this->getdesname(),
					':desemail'=>$this->getdesemail(),
					':nrcountryarea'=>$this->getnrcountryarea(),
					':nrddd'=>$this->getnrddd(),
					':nrphone'=>$this->getnrphone(),
					':intypedoc'=>$this->getintypedoc(),
					':desdocument'=>$this->getdesdocument(),
					':deszipcode'=>$this->getdeszipcode(),			
					':desaddress'=>$this->getdesaddress(),
					':desnumber'=>$this->getdesnumber(),			
					':descomplement'=>$this->getdescomplement(),
					':desdistrict'=>$this->getdesdistrict(),
					':descity'=>$this->getdescity(),
					':desstate'=>$this->getdesstate(),
					':descountry'=>$this->getdescountry(),
					':descardcode'=>$this->getdescardcode(),
					':desbrand'=>$this->getdesbrand(),
					':infirst6'=>$this->getinfirst6(),
					':inlast4'=>$this->getinlast4(),
					':dtbirth'=>$this->getdtbirth()

				]
			
			);//end select


	        


		}//end else
				

		if( count($results[0]) > 0 )
		{

			$this->setData($results[0]);

		}//end if



	}//END save

















	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_customers a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister desc
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
				
					
			}//end if

			$this->setData($results[0]);
			
		}//end if

	}//END getAccount




















	public function getLast( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_customers a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister desc
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
				
					
			}//end if

			$this->setData($results[0]);
			
		}//end if

	}//END getAccount










	public function getCustomer( $idcustomer )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_customers a
		    INNER JOIN tb_users d ON c.iduser = d.iduser
		    WHERE idcustomer = pidcustomer;

			", 
			
			[

				':idcustomer'=>$idcustomer

			]
		
		);//end select

		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		//$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desname'] = utf8_encode($results[0]['desname']);
				
					
			}//end if

			$this->setData($results[0]);
			
		}//end if

	}//END get










	public function delete()
	{

		$sql = new Sql();

		$sql->query("

			DELETE FROM tb_customers
			WHERE idcustomer = :idcustomer

			", 
			
			[

				'idcustomer'=>$this->getidcustomer()

			]
		
		);//end query

	}//END delete





	

	public static function setError( $msg )
	{

		$_SESSION[Customer::SESSION_ERROR] = $msg;


	}//END setMsgErro





	public static function getError()
	{

		$msg = (isset($_SESSION[Customer::SESSION_ERROR])) ? $_SESSION[Customer::SESSION_ERROR] : "";

		Customer::clearError();

		return $msg;

	}//END getMsgErro





	public static function clearError()
	{

		$_SESSION[Customer::SESSION_ERROR] = NULL;

	}//END clearMsgError





}//END class Customer





 ?>