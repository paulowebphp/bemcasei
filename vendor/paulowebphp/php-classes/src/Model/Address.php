<?php 

namespace Core\Model;

use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;





class Address extends Model
{

	const SESSION_ERROR = "AddressError";
	


	public static function getCEP( $nrcep )
	{

		$nrcep = str_replace("-", "", $nrcep);



		$ch = curl_init();



		# CURLOPT_URL - Define a URL que será requisitada pelo cURL

		# CURLOPT_RETURNTRANSFER - Define o tipo de retorno que ocorrerá da requisição. Se definirmos TRUE ou 1, o retorno será uma string

		# CURLOPT_SSL_VERIFYPEER - Indica se ocorrerá a verificação dos peers durante a requisição. Se informarmos 0 ou FALSE, a verificação não ocorrerá

		curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/$nrcep/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		# TRUE É PARA SERIALIZAR, PARA VIR COMO ARRAY E NÃO COMO OBJETO
		$data = json_decode( curl_exec($ch), true );

		# Necessito fechar com curl_close() por se tratar de um ponteiro de memória. Se não fechar, cada vez que der um REFRESH na página, no front ele irá criar mais um ponteiro e vai pesar na memória

		curl_close($ch);


		return $data;

		

	}//END getCEP






	public function loadFromCEP( $nrcep )
	{

		$data = Address::getCEP($nrcep);

			
		if( 

			isset($data['logradouro']) 
			&&
			$data['logradouro']

		)
		{
			$this->setdesaddress($data['logradouro']);
			//$this->setdesholderaddress($data['logradouro']);
			$this->setdescomplement($data['complemento']);
			//$this->setdesholdercomplement($data['complemento']);
			$this->setdescity($data['localidade']);
			//$this->setdesholdercity($data['localidade']);
			$this->setdesstate($data['uf']);
			//$this->setdesholderstate($data['uf']);
			//$this->setdescountry('Brasil');
			//$this->setdesholdercountry('Brasil');
			$this->setdeszipcode($nrcep);
			//$this->setdesholderzipcode($nrcep);
			$this->setdesdistrict($data['bairro']);
			//$this->setdesholderdistrict($data['bairro']);



		}//end if

	}//END loadFromCEP










	public static function listAllStates()
	{

		$sql = new Sql();

		$results = $sql->select("


			SELECT * FROM tb_states;

		");//end select


		/*foreach( $results as &$row )
		{
			# code...		
			$row['desstate'] = utf8_encode($row['desstate']);

		}//end foreach*/


		


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				foreach ($results as &$row)
				{
					# code...
					$row['desstate'] = utf8_encode($row['desstate']);

				}//end foreach

			}//end if

			return $results;

		}//end if


	}//END listAllStates








	










	public static function listAllCitiesByState( $idstate )
	{

		$sql = new Sql();

		$results = $sql->select("


			SELECT * FROM tb_cities
			WHERE idstate = :idstate;

		",

		[

			'idstate'=>$idstate

		]);//end select




		/*foreach( $results as &$row )
		{
			# code...		
			$row['descity'] = utf8_encode($row['descity']);

		}//end foreach*/


		


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				foreach ($results as &$row)
				{
					# code...
					$row['descity'] = utf8_encode($row['descity']);

				}//end foreach

			}//end if



			return $results;

		}//end if


	}//END listAllCitiesByState











	public static function getCitiesJson( $idstate )
	{

		$sql = new Sql();

		$results = $sql->select("


			SELECT * FROM tb_cities
			WHERE idstate = :idstate;

		",

		[

			'idstate'=>$idstate

		]);//end select


				

		/*foreach( $results as &$row )
		{
			# code...		
			$row['descity'] = utf8_encode($row['descity']);

		}//end foreach*/


		



		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				foreach ($results as &$row)
				{
					# code...
					$row['descity'] = utf8_encode($row['descity']);

				}//end foreach

			}//end if



			echo json_encode($results);

		}//end if


	}//END getCitiesJson











	







	public static function getState( $idstate )
	{

		$sql = new Sql();

		$results = $sql->select("


			SELECT * FROM tb_states
			WHERE idstate = :idstate
			LIMIT 1;

		",

		[

			'idstate'=>$idstate

		]);//end select


		//$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
		//$results[0]['desstatecode'] = utf8_encode($results[0]['desstatecode']);
		

		

		if( count($results[0]) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				$results[0]['desstate'] = utf8_encode($results[0]['desstate']);

			}//end if




			return $results[0];

		}//end if
		else
		{

			return false;

		}//end else


	}//END getState



















	public static function getCity( $idcity )
	{

		$sql = new Sql();

		$results = $sql->select("


			SELECT * FROM tb_cities
			WHERE idcity = :idcity
			LIMIT 1;

		",

		[

			'idcity'=>$idcity

		]);//end select

		//$results[0]['descity'] = utf8_encode($results[0]['descity']);
		

		

		if( count($results) > 0 )
		{

			
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				$results[0]['descity'] = utf8_encode($results[0]['descity']);

			}//end if

			



			return $results[0];

		}//end if
		else
		{

			return false;

		}//end else


	}//END getCity












	/*

function getStateCode( $idstate )
{

	switch( (int)$idstate ) 
	{

		case 1:
			# code...
			return 'AC';

		case 2:
			# code...
			return 'AL';

		case 3:
			# code...
			return 'AM';


		case 4:
			# code...
			return 'AP';

		case 5:
			# code...
			return 'BA';

		case 6:
			# code...
			return 'CE';

		
		case 7:
			# code...
			return 'DF';

		case 8:
			# code...
			return 'ES';

		case 9:
			# code...
			return 'GO';

		
		case 10:
			# code...
			return 'MA';

		case 11:
			# code...
			return 'MG';

		case 12:
			# code...
			return 'MS';

		case 13:
			# code...
			return 'MT';

		case 14:
			# code...
			return 'PA';

		case 15:
			# code...
			return 'PB';

		case 16:
			# code...
			return 'PE';

		case 17:
			# code...
			return 'PI';

		case 18:
			# code...
			return 'PR';

		
		case 19:
			# code...
			return 'RJ';

		case 20:
			# code...
			return 'RN';

		case 21:
			# code...
			return 'RO';

		case 22:
			# code...
			return 'RR';

		case 23:
			# code...
			return 'RS';

		case 24:
			# code...
			return 'SC';

		case 25:
			# code...
			return 'SE';

		case 26:
			# code...
			return 'SP';

		case 27:
			# code...
			return 'TO';

		
		
	}//end switch


}//END getStateCode


*/













	/*public function update()
	{

		

		$sql = new Sql();

		$results = $sql->select("

			CALL sp_addresses_update(

				:idaddress,
				:iduser,
	            :deszipcode, 
				:desaddress,
	            :desnumber,
	            :descomplement,
	            :desdistrict,
	            :idcity,
	            :descity,
	            :idstate,
	            :desstate,
	            :desstatecode,
	            :descountry,
	            :descountrycode


			);", 
			
			[

				':idaddress'=>$this->getidaddress(),
				':iduser'=>$this->getiduser(),
				':deszipcode'=>$this->getdeszipcode(),
				':desaddress'=>$this->getdesaddress(),
				':desnumber'=>$this->getdesnumber(),
				':descomplement'=>$this->getdescomplement(),
				':desdistrict'=>$this->getdesdistrict(),
				':idcity'=>$this->getidcity(),
				':descity'=>$this->getdescity(),
				':idstate'=>$this->getidstate(),
				':desstate'=>$this->getdesstate(),
				':desstatecode'=>$this->getdesstatecode(),
				':descountry'=>$this->getdescountry(),
				':descountrycode'=>$this->getdescountrycode()

			]
		
		);//end select

		


		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

	}//END save*/







	








	public function update()
	{

		
		$sql = new Sql();
	


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...

			$results = $sql->select("

				CALL sp_addresses_update(

					:idaddress,
					:iduser,
		            :deszipcode, 
					:desaddress,
		            :desnumber,
		            :descomplement,
		            :desdistrict,
		            :idcity,
		            :descity,
		            :idstate,
		            :desstate,
		            :desstatecode,
		            :descountry,
		            :descountrycode


				);", 
				
				[

					':idaddress'=>$this->getidaddress(),
					':iduser'=>$this->getiduser(),
					':deszipcode'=>$this->getdeszipcode(),
					':desaddress'=>utf8_decode($this->getdesaddress()),
					':desnumber'=>$this->getdesnumber(),
					':descomplement'=>utf8_decode($this->getdescomplement()),
					':desdistrict'=>$this->getdesdistrict(),
					':idcity'=>$this->getidcity(),
					':descity'=>utf8_decode($this->getdescity()),
					':idstate'=>$this->getidstate(),
					':desstate'=>utf8_decode($this->getdesstate()),
					':desstatecode'=>utf8_decode($this->getdesstatecode()),
					':descountry'=>utf8_decode($this->getdescountry()),
					':descountrycode'=>utf8_decode($this->getdescountrycode())

				]
			
			);//end select


			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
				$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
				$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
				$results[0]['descity'] = utf8_encode($results[0]['descity']);
				$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
				$results[0]['desstatecode'] = utf8_encode($results[0]['desstatecode']);
				$results[0]['descountry'] = utf8_encode($results[0]['descountry']);
				$results[0]['descountrycode'] = utf8_encode($results[0]['descountrycode']);

			}//end if


		}//end if
		else
		{



			$results = $sql->select("

				CALL sp_addresses_update(

					:idaddress,
					:iduser,
		            :deszipcode, 
					:desaddress,
		            :desnumber,
		            :descomplement,
		            :desdistrict,
		            :idcity,
		            :descity,
		            :idstate,
		            :desstate,
		            :desstatecode,
		            :descountry,
		            :descountrycode


				);", 
				
				[

					':idaddress'=>$this->getidaddress(),
					':iduser'=>$this->getiduser(),
					':deszipcode'=>$this->getdeszipcode(),
					':desaddress'=>$this->getdesaddress(),
					':desnumber'=>$this->getdesnumber(),
					':descomplement'=>$this->getdescomplement(),
					':desdistrict'=>$this->getdesdistrict(),
					':idcity'=>$this->getidcity(),
					':descity'=>$this->getdescity(),
					':idstate'=>$this->getidstate(),
					':desstate'=>$this->getdesstate(),
					':desstatecode'=>$this->getdesstatecode(),
					':descountry'=>$this->getdescountry(),
					':descountrycode'=>$this->getdescountrycode()

				]
			
			);//end select


		}//end else




		


		if( count($results) > 0 )
		{

			$this->setData($results[0]);

		}//end if

	}//END save*/











	public function get( $iduser )
	{

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * 
		    FROM tb_addresses a
		    INNER JOIN tb_users d ON a.iduser = d.iduser
		    WHERE a.iduser = :iduser
		    ORDER BY a.dtregister DESC
		    LIMIT 1;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select

		


		

		
				
		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				# code...
				$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
				$results[0]['descomplement'] = utf8_encode($results[0]['descomplement']);
				$results[0]['desdistrict'] = utf8_encode($results[0]['desdistrict']);
				$results[0]['descity'] = utf8_encode($results[0]['descity']);
				$results[0]['desstate'] = utf8_encode($results[0]['desstate']);
				$results[0]['desstatecode'] = utf8_encode($results[0]['desstatecode']);
				$results[0]['descountry'] = utf8_encode($results[0]['descountry']);
				$results[0]['descountrycode'] = utf8_encode($results[0]['descountrycode']);

			}//end if


			$this->setData($results[0]);

		
		}//end if
		


	}//END get



	










	

	public static function setError( $msg )
	{

		$_SESSION[Address::SESSION_ERROR] = $msg;


	}//END setMsgErro





	public static function getError()
	{

		$msg = (isset($_SESSION[Address::SESSION_ERROR])) ? $_SESSION[Address::SESSION_ERROR] : "";

		Address::clearError();

		return $msg;

	}//END getMsgErro





	public static function clearError()
	{

		$_SESSION[Address::SESSION_ERROR] = NULL;

	}//END clearMsgError






}//END class Address





 ?>