<?php 

namespace Core\Model;


//use \Core\Mailer;
use \Core\MailerPasswordRecovery;
//use \Core\Maintenance;
use \Core\Model;
use \Core\Rule;
use \Core\DB\Sql;
//use \Core\Model\Account;
use \Core\Model\Bank;
use \Core\Model\Consort;
use \Core\Model\CustomStyle;
use \Core\Model\InitialPage;
use \Core\Model\Menu;
use \Core\Model\Party;
use \Core\Model\Plan;
use \Core\Model\ProductConfig;
use \Core\Model\RsvpConfig;
use \Core\Model\SocialMedia;
use \Core\Model\Testimonial;
use \Core\Model\Wedding;



class User extends Model
{




	const SESSION = "bemcasei-user";

	# CHAVE DE ENCRIPTAÇÃO TEM QUE TER 16 CARACTERES
	const SECRET = "Paulowebphp_Secret";

	const ERROR = "bemcasei-user-error";

	const ERROR_REGISTER = "bemcasei-user-register";

	const SUCCESS = "bemcasei-user-success";



















	public static function getFromSession()
	{

		if( 

			isset($_SESSION[User::SESSION])
			&& 
			(int)$_SESSION[User::SESSION]['iduser'] > 0
		)
		{
	
			$user = new User();

			$user->setData($_SESSION[User::SESSION]);

			//$user->setdesperson(utf8_encode($user->getdesperson()));

	
			return $user;

		}//end if
		else
		{

			return false;

			
		}//end else


	}//END Method



	


	






	/*public static function getFromSession()
	{
		$user = new User();

		if( 

			isset($_SESSION[User::SESSION])
			&& 
			(int)$_SESSION[User::SESSION]['iduser'] > 0
		)
		{

			$user->setData($_SESSION[User::SESSION]);

		}//end if

		return $user;

	}//END Method*/









	# Apenas verifica se está logado, nada mais
	public static function checkLogin( $inadmin = true )
	{
		if(

			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			|| 
			!(int)$_SESSION[User::SESSION]["iduser"] > 0

		)
		{

			# Em qualquer das condições acima, não está logado
			return false;
	
		}//end if
		else
		{
			if(

				$inadmin === true 
				&& 
				(bool)$_SESSION[User::SESSION]['inadmin'] === true

			)
			{

				# Está logado e é administrador
				return true;

			}//end if
			else if( $inadmin === false )
			{
				
				# Está logado, mas não é administrador
				return true;

			}//end else if
			else
			{
				# Não é administrador, nem cliente, e não está logado
				return false;

			}//end else

		}//end else

	}//END Method











	/*
	# ANTES DA AULA 117
	public static function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users 
			WHERE deslogin = :LOGIN

			", array(

			":LOGIN"=>$login
		));

		if(count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}#END if

		$data = $results[0];

		if(password_verify($password, $data["despassword"]) === true)
		{
			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}

	}//END Method
	*/







	public function getFromHash( $hash )
	{

		$iduser = base64_decode($hash);



		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.iduser = :iduser
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":iduser"=>$iduser

			)//end array

		);//end select



		
		

		




		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
				
			}//end if


			$this->setData($results[0]);


		}//end if


	}//END Method


























	# AULA 117
	public static function login( $login, $password )
	{	

		
		
		


		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":LOGIN"=>$login

			)//end array

		);//end select

		
			
		
		
		

		if( count($results) === 0 )
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end if

		$data = $results[0];


		
		
		

		if( password_verify( $password, $data["despassword"] ) === true )
		{


			$user = new User();

				
				
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$data['desperson'] = utf8_encode($data['desperson']);
				$data['desnick'] = utf8_encode($data['desnick']);		
				
			}//end if

			$user->setData($data);



			if( 

				(int)$user->getinadmin() == 0
				&&
				(int)$user->getinregister() == 0
				&&
				(int)$user->getinplancontext() == 0

			)
			{	

				$user->setRegisterEntities();
				$user->setinregister(1);
				$user->update();

			}//end if


			
			$_SESSION[User::SESSION] = $user->getValues();

			return $user;
			
			

		}//end if
		else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end else


	}//END Method






























	/*
	public static function login( $login, $password )
	{	

		
		
		


		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":LOGIN"=>$login

			)//end array

		);//end select

		
			
		
		
		

		if( count($results) === 0 )
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end if

		$data = $results[0];


		
		
		

		if( password_verify( $password, $data["despassword"] ) === true )
		{
			


			if( 

				(int)$data['inadmin'] == 0
				&&
				(int)$data['inaccount'] == 0
				&&
				(int)$data['inplancontext'] != 0

			)
			{	

				$hash = base64_encode($data['iduser']);

				Account::setError('Finalize o seu cadastro');
				header('Location: /cadastrar/'.$hash);
				exit;

			}//end if
			else
			{


				$user = new User();

				
				
				if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
				{
					
					//$data['desperson'] = utf8_encode($data['desperson']);
					$data['desnick'] = utf8_encode($data['desnick']);		
					
				}//end if

				$user->setData($data);

				
				$_SESSION[User::SESSION] = $user->getValues();

				return $user;

			}//end if


			

		}//end if
		else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end else


	}//END Method
	*/








































	/*
	public static function login( $login, $password )
	{	


		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":LOGIN"=>$login

			)//end array

		);//end select

		
			
		
		
		

		if( count($results) === 0 )
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end if

		$data = $results[0];


		
		
		

		if( password_verify( $password, $data["despassword"] ) === true )
		{



			if( 

				(int)$data['inadmin'] == 0
				&&
				(int)$data['inaccount'] == 0

			)
			{	

				$hash = base64_encode($data['iduser']);

				Account::setError('Finalize o seu cadastro');
				header('Location: /cadastrar/'.$hash);
				exit;

			}//end if
			else
			{


				$user = new User();

				$data['desperson'] = utf8_encode($data['desperson']);
				$data['desnick'] = utf8_encode($data['desnick']);
				

				$user->setData($data);

				
				$_SESSION[User::SESSION] = $user->getValues();

				return $user;

			}//end if


			

		}//end if
		else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end else


	}//END Method
	*/
















	public static function loginAfterPlanPurchase( $login, $password )
	{
		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":LOGIN"=>$login

			)//end array

		);//end select



		

		if( count($results) === 0 )
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end if

		$data = $results[0];


		



		if( $password === $data["despassword"] )
		{



			$user = new User();

			


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$data['desperson'] = utf8_encode($data['desperson']);
				$data['desnick'] = utf8_encode($data['desnick']);
				
			}//end if
			

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;



		}//end if
		else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end else

	}//END Method



















	public static function getRecaptcha( $response )
	{

		
		$ch = curl_init();



		# CURLOPT_URL - Define a URL que será requisitada pelo cURL

		# CURLOPT_RETURNTRANSFER - Define o tipo de retorno que ocorrerá da requisição. Se definirmos TRUE ou 1, o retorno será uma string

		# CURLOPT_SSL_VERIFYPEER - Indica se ocorrerá a verificação dos peers durante a requisição. Se informarmos 0 ou FALSE, a verificação não ocorrerá

		/*curl_setopt( $ch, CURLOPT_HTTPHEADER, array (
	        "Content-Type: application/json",
	        "secret: 6Lenr7EUAAAAAPkp5iZlX15I1wG9RDCAQmBG1w6E",
	        "response: $response"
	    ));*/

	    

	    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

	    $fields = array(

	    	'secret' => '6LeBVMIUAAAAAGHZB5oHoT7S901nrW7DKf1pp5jx',
	    	'response'=> $response

		);

	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		# TRUE É PARA SERIALIZAR, PARA VIR COMO ARRAY E NÃO COMO OBJETO
		$data = json_decode( curl_exec($ch), true );

		# Necessito fechar com curl_close() por se tratar de um ponteiro de memória. Se não fechar, cada vez que der um REFRESH na página, no front ele irá criar mais um ponteiro e vai pesar na memória

		curl_close($ch);

		return $data;

		

	}//END Method







	








	/*public static function login( $login, $password )
	{
		

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b
			ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN
			ORDER BY a.dtregister DESC
			LIMIT 1;

			",  
			
			array(

				":LOGIN"=>$login

			)//end array

		);//end select

		
				

		

		if( count($results) === 0 )
		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end if

		$data = $results[0];


		

		if( password_verify( $password, $data["despassword"] ) === true )
		{
			$user = new User();

			# DEBUG	

			# $user->setiduser($data['iduser']);
			# var_dump($user);
			# exit;

			$data['desperson'] = utf8_encode($data['desperson']);

			$user->setData($data);

			# echo "<pre>";
			# var_dump($user);
			# exit;

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}//end if
		else

		{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}//end else

	}//END Method*/







	/* 
	# Antes da aula 117
	public static function verifyLogin($inadmin = true)
	{
		if(!User::checkLogin($inadmin))		
		{
			header("Location: /481738admin/login/");
			exit;

		}#END if verifyLogin

	}//END Method
	*/










	# Aula 117
	public static function verifyLogin( $inadmin = true )
	{


		if( !User::checkLogin($inadmin) )		
		{
			
			
			if( $inadmin )
			{

				header("Location: /481738admin/login");

			}//end if
			else
			{

				header("Location: /login");

			}//end else

			exit;

		}//end if

		

	}//END Method










	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
		
	}//END Method








	public function setToSession()
	{

		$_SESSION[User::SESSION] = $this->getValues();

	}//END Method










	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("

			SELECT * FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			ORDER BY b.desperson;

		");//end select
		
	}//END Method











	/*public function save()
	{
		$sql = new Sql();
		

		$results = $sql->select("

			CALL sp_users_save(
				
				:deslogin, 
				:despassword, 
				:desdomain, 
				:inadmin, 
				:inseller, 
				:inaccount, 
				:inplancontext, 
				:inplan,  
				:interms,
				:desipterms,
				:dtterms,
				:dtplanbegin, 
				:dtplanend,
				:desperson,
				:desnick,
				:desemail, 
				:nrcountryarea,
				:nrddd,
				:nrphone,
				:intypedoc, 
				:desdocument,
				:desphoto, 
				:desextension,
				:dtbirth
				
			)", 
			
			array(

				":deslogin"=>$this->getdeslogin(),
				":despassword"=>User::getPasswordHash($this->getdespassword()),
				":desdomain"=>$this->getdesdomain(),
				":inadmin"=>$this->getinadmin(),
				":inseller"=>$this->getinseller(),
				":inaccount"=>$this->getinaccount(),
				":inplancontext"=>$this->getinplancontext(),
				":inplan"=>$this->getinplan(),
				":interms"=>$this->getinterms(),
				":desipterms"=>$this->getdesipterms(),
				":dtterms"=>$this->getdtterms(),
				":dtplanbegin"=>$this->getdtplanbegin(),
				":dtplanend"=>$this->getdtplanend(),
				":desperson"=>$this->getdesperson(),
				":desnick"=>$this->getdesnick(),
				":desemail"=>$this->getdesemail(),
				":nrcountryarea"=>$this->getnrcountryarea(),
				":nrddd"=>$this->getnrddd(),
				":nrphone"=>$this->getnrphone(),
				":intypedoc"=>$this->getintypedoc(),
				":desdocument"=>$this->getdesdocument(),
				":desphoto"=>$this->getdesphoto(),
				":desextension"=>$this->getdesextension(),
				":dtbirth"=>$this->getdtbirth()
			
			)//end array

		);//end select


		//$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
		//$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
		//$results[0]['desdomain'] = utf8_encode($results[0]['desdomain']);

		
		


		if(count($results[0]) > 0)
		{

			$this->setData($results[0]);


		}//end if

	}//END Method*/



























	public function save()
	{
		$sql = new Sql();
		




		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_users_save(
					
					:deslogin, 
					:despassword, 
					:desdomain, 
					:inadmin, 
					:inseller, 
					:inregister, 
					:incheckout, 
					:inaccount,
					:inplancontext,
					:inplan,
					:instatus, 
					:inautostatus, 
					:interms,
					:desipterms,
					:dtterms,
					:desperson,
					:desnick,
					:desemail, 
					:nrcountryarea,
					:nrddd,
					:nrphone,
					:intypedoc, 
					:desdocument,
					:desphoto, 
					:desextension,
					:dtbirth
					
				)", 
				
				array(

					":deslogin"=>$this->getdeslogin(),
					":despassword"=>User::getPasswordHash($this->getdespassword()),
					":desdomain"=>$this->getdesdomain(),
					":inadmin"=>$this->getinadmin(),
					":inseller"=>$this->getinseller(),
					":inregister"=>$this->getinregister(),
					":incheckout"=>$this->getincheckout(),
					":inaccount"=>$this->getinaccount(),
					":inplancontext"=>$this->getinplancontext(),
					":inplan"=>$this->getinplan(),
					":instatus"=>$this->getinstatus(),
					":inautostatus"=>$this->getinautostatus(),
					":interms"=>$this->getinterms(),
					":desipterms"=>$this->getdesipterms(),
					":dtterms"=>$this->getdtterms(),
					":desperson"=>utf8_decode($this->getdesperson()),
					":desnick"=>utf8_decode($this->getdesnick()),
					":desemail"=>$this->getdesemail(),
					":nrcountryarea"=>$this->getnrcountryarea(),
					":nrddd"=>$this->getnrddd(),
					":nrphone"=>$this->getnrphone(),
					":intypedoc"=>$this->getintypedoc(),
					":desdocument"=>$this->getdesdocument(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension(),
					":dtbirth"=>$this->getdtbirth()
				
				)//end array

			);//end select


			$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
			$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
			//$results[0]['desdomain'] = utf8_encode($results[0]['desdomain']);
			
			
			

		}//end if
		else
		{


			$results = $sql->select("

				CALL sp_users_save(
					
					:deslogin, 
					:despassword, 
					:desdomain, 
					:inadmin, 
					:inseller, 
					:inregister, 
					:incheckout, 
					:inaccount, 
					:inplancontext, 
					:inplan, 
					:instatus, 
					:inautostatus, 
					:interms,
					:desipterms,
					:dtterms,
					:desperson,
					:desnick,
					:desemail, 
					:nrcountryarea,
					:nrddd,
					:nrphone,
					:intypedoc, 
					:desdocument,
					:desphoto, 
					:desextension,
					:dtbirth
					
				)", 
				
				array(

					":deslogin"=>$this->getdeslogin(),
					":despassword"=>User::getPasswordHash($this->getdespassword()),
					":desdomain"=>$this->getdesdomain(),
					":inadmin"=>$this->getinadmin(),
					":inseller"=>$this->getinseller(),
					":inregister"=>$this->getinregister(),
					":incheckout"=>$this->getincheckout(),
					":inaccount"=>$this->getinaccount(),
					":inplancontext"=>$this->getinplancontext(),
					":inplan"=>$this->getinplan(),
					":instatus"=>$this->getinstatus(),
					":inautostatus"=>$this->getinautostatus(),
					":interms"=>$this->getinterms(),
					":desipterms"=>$this->getdesipterms(),
					":dtterms"=>$this->getdtterms(),
					":desperson"=>$this->getdesperson(),
					":desnick"=>$this->getdesnick(),
					":desemail"=>$this->getdesemail(),
					":nrcountryarea"=>$this->getnrcountryarea(),
					":nrddd"=>$this->getnrddd(),
					":nrphone"=>$this->getnrphone(),
					":intypedoc"=>$this->getintypedoc(),
					":desdocument"=>$this->getdesdocument(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension(),
					":dtbirth"=>$this->getdtbirth()
				
				)//end array

			);//end select



			
	        


		}//end else


		
		


		if(count($results[0]) > 0)
		{

			$this->setData($results[0]);


		}//end if

	}//END Method



















	









	# Aula 117
	public function get( $iduser )
	{
		$sql = new Sql();

		$results = $sql->select("
		
			SELECT * FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.iduser = :iduser
			ORDER BY a.dtregister DESC
			LIMIT 1;


			
			", 
		
			array(

				":iduser"=>$iduser

			)//end array

		);//end select

				


		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				//$data['desperson'] = utf8_encode($data['desperson']);
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
				
			}//end if
			

			$this->setData($results[0]);


		}//end if

	}//END Method









	/*
	# Antes da aula 117
	public function get($iduser)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(

			":iduser"=>$iduser

		));

		$this->setData($results[0]);

	}//END Method
	*/









	/*public function update()
	{
		$sql = new Sql();

		$results = $sql->select("
		
			CALL sp_users_update(
				
				:iduser,
				:deslogin, 
				:despassword, 
				:desdomain, 
				:inadmin, 
				:inseller, 
				:inaccount,
				:inplancontext, 
				:inplan,  
				:interms,
				:desipterms,
				:dtterms,
				:dtplanbegin, 
				:dtplanend,
				:desperson,
				:desnick,
				:desemail, 
				:nrcountryarea, 
				:nrddd,
				:nrphone,
				:intypedoc, 
				:desdocument,
				:desphoto, 
				:desextension,
				:dtbirth
			
			)", 
			
			array(

				":iduser"=>$this->getiduser(),
				":deslogin"=>$this->getdeslogin(),
				":despassword"=>$this->getdespassword(),
				":desdomain"=>$this->getdesdomain(),
				":inadmin"=>$this->getinadmin(),
				":inseller"=>$this->getinseller(),
				":inaccount"=>$this->getinaccount(),
				":inplancontext"=>$this->getinplancontext(),
				":inplan"=>$this->getinplan(),
				":interms"=>$this->getinterms(),
				":desipterms"=>$this->getdesipterms(),
				":dtterms"=>$this->getdtterms(),
				":dtplanbegin"=>$this->getdtplanbegin(),
				":dtplanend"=>$this->getdtplanend(),
				":desperson"=>$this->getdesperson(),
				":desnick"=>$this->getdesnick(),
				":desemail"=>$this->getdesemail(),
				":nrcountryarea"=>$this->getnrcountryarea(),
				":nrddd"=>$this->getnrddd(),
				":nrphone"=>$this->getnrphone(),
				":intypedoc"=>$this->getintypedoc(),
				":desdocument"=>$this->getdesdocument(),
				":desphoto"=>$this->getdesphoto(),
				":desextension"=>$this->getdesextension(),
				":dtbirth"=>$this->getdtbirth()

			)//end array
		
		);//end select


		//$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
		//$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
		//$results[0]['desdomain'] = utf8_encode($results[0]['desdomain']);

		
	
		if(count($results[0]) > 0)
		{

			$this->setData($results[0]);


		}//end if
		



	}//END Method*/






























	public function update()
	{
		$sql = new Sql();

		



		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			
			$results = $sql->select("
		
				CALL sp_users_update(
					
					:iduser,
					:deslogin,
					:despassword, 
					:desdomain, 
					:inadmin, 
					:inseller, 
					:inregister,
					:incheckout,
					:inaccount,
					:inplancontext,
					:inplan,
					:instatus, 
					:inautostatus, 
					:interms,
					:desipterms,
					:dtterms,
					:desperson,
					:desnick,
					:desemail, 
					:nrcountryarea, 
					:nrddd,
					:nrphone,
					:intypedoc, 
					:desdocument,
					:desphoto, 
					:desextension,
					:dtbirth
				
				)", 
				
				array(

					":iduser"=>$this->getiduser(),
					":deslogin"=>$this->getdeslogin(),
					":despassword"=>$this->getdespassword(),
					":desdomain"=>$this->getdesdomain(),
					":inadmin"=>$this->getinadmin(),
					":inseller"=>$this->getinseller(),
					":inregister"=>$this->getinregister(),
					":incheckout"=>$this->getincheckout(),
					":inaccount"=>$this->getinaccount(),
					":inplancontext"=>$this->getinplancontext(),
					":inplan"=>$this->getinplan(),
					":instatus"=>$this->getinstatus(),
					":inautostatus"=>$this->getinautostatus(),
					":interms"=>$this->getinterms(),
					":desipterms"=>$this->getdesipterms(),
					":dtterms"=>$this->getdtterms(),
					":desperson"=>utf8_decode($this->getdesperson()),
					":desnick"=>utf8_decode($this->getdesnick()),
					":desemail"=>$this->getdesemail(),
					":nrcountryarea"=>$this->getnrcountryarea(),
					":nrddd"=>$this->getnrddd(),
					":nrphone"=>$this->getnrphone(),
					":intypedoc"=>$this->getintypedoc(),
					":desdocument"=>$this->getdesdocument(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension(),
					":dtbirth"=>$this->getdtbirth()

				)//end array
			
			);//end select



			



			$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
			$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
			//$results[0]['desdomain'] = utf8_encode($results[0]['desdomain']);

			
			

		}//end if
		else
		{


			
			$results = $sql->select("
		
				CALL sp_users_update(
					
					:iduser,
					:deslogin, 
					:despassword, 
					:desdomain, 
					:inadmin, 
					:inseller, 
					:inregister,
					:incheckout,
					:inaccount,
					:inplancontext,
					:inplan,
					:instatus, 
					:inautostatus, 
					:interms,
					:desipterms,
					:dtterms,
					:desperson,
					:desnick,
					:desemail, 
					:nrcountryarea, 
					:nrddd,
					:nrphone,
					:intypedoc, 
					:desdocument,
					:desphoto, 
					:desextension,
					:dtbirth
				
				)", 
				
				array(

					":iduser"=>$this->getiduser(),
					":deslogin"=>$this->getdeslogin(),
					":despassword"=>$this->getdespassword(),
					":desdomain"=>$this->getdesdomain(),
					":inadmin"=>$this->getinadmin(),
					":inseller"=>$this->getinseller(),
					":inregister"=>$this->getinregister(),
					":incheckout"=>$this->getincheckout(),
					":inaccount"=>$this->getinaccount(),
					":inplancontext"=>$this->getinplancontext(),
					":inplan"=>$this->getinplan(),
					":instatus"=>$this->getinstatus(),
					":inautostatus"=>$this->getinautostatus(),
					":interms"=>$this->getinterms(),
					":desipterms"=>$this->getdesipterms(),
					":dtterms"=>$this->getdtterms(),
					":desperson"=>$this->getdesperson(),
					":desnick"=>$this->getdesnick(),
					":desemail"=>$this->getdesemail(),
					":nrcountryarea"=>$this->getnrcountryarea(),
					":nrddd"=>$this->getnrddd(),
					":nrphone"=>$this->getnrphone(),
					":intypedoc"=>$this->getintypedoc(),
					":desdocument"=>$this->getdesdocument(),
					":desphoto"=>$this->getdesphoto(),
					":desextension"=>$this->getdesextension(),
					":dtbirth"=>$this->getdtbirth()

				)//end array
			
			);//end select

	        


		}//end else


		
	
		if(count($results[0]) > 0)
		{

			$this->setData($results[0]);


		}//end if
		



	}//END Method












	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			CALL sp_users_delete(:iduser)
		
			", 
		
			array(

				":iduser"=>$this->getiduser()
			
			)//end array
		
		);//end query

	}//END Method






	/*
	CREATE PROCEDURE `sp_users_delete`(
	piduser INT
	)
	BEGIN
	    
	    DECLARE vidperson INT;
	    
	    SET FOREIGN_KEY_CHECKS = 0;
	 
	    SELECT idperson INTO vidperson
	    FROM tb_users
	    WHERE iduser = piduser;
	 
	    DELETE FROM tb_persons WHERE idperson = vidperson;
	    
	    DELETE FROM tb_userspasswordsrecoveries WHERE iduser = piduser;
	    DELETE FROM tb_users WHERE iduser = piduser;
	    
	    SET FOREIGN_KEY_CHECKS = 1;
	    
	END
	*/







	public static function getForgot( $deslogin, $inadmin = true )
	{



		$sql = new Sql();


		
		$results = $sql->select("

			SELECT * FROM tb_users a
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.deslogin = :deslogin
			ORDER BY a.dtregister DESC
			LIMIT 1;

			", 
			
			array(

				":deslogin"=>$deslogin
		
			)//end array
		
		);//end select


		
		

		if( count($results) === 0 )
		{
			
			throw new \Exception("Não foi possível recuperar a senha");

		}//end if
		else
		{

			$data = $results[0];

			


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$data['desnick'] = utf8_encode($data['desnick']);
				$data['desperson'] = utf8_encode($data['desperson']);
				
			}//end if




			
			$results2 = $sql->select("
			
				CALL sp_userspasswordsrecoveries_create(:iduser, :desip)
				
				", 
				
				array(
					
					":iduser"=>$data['iduser'],
					":desip"=>$_SERVER['REMOTE_ADDR']

				)//end array
			
			);//end select


			

			
			
			if ( count($results2) === 0 )
			{

				throw new \Exception("Não foi possível recuperar a senha.");

			}//end if
			else
			{

				$dataRecovery = $results2[0];

			


				$iv = random_bytes( openssl_cipher_iv_length('AES-256-CBC') );
				
				

				

				$code = openssl_encrypt(
					
					$dataRecovery['idrecovery'], 

					'AES-256-CBC', 

					User::SECRET, 

					0, 

					$iv
				
				);//end openssl_encrypt



				
				$result = base64_encode($iv.$code);

	

				
				if( $inadmin === true ) 
				{

					$link = "https://bemcasei.com.br/481738admin/recuperar-senha/redefinir?code=$result";

				}//end if
				else
				{

					$link = "https://bemcasei.com.br/recuperar-senha/redefinir?code=$result";
				
				}//end else

			
				
				$mailer = new MailerPasswordRecovery(
					
					
					Rule::EMAIL_PASSWORD_RECOVERY,

					"forgot", 
					
					array(

						"name"=>$data['desperson'],
						"link"=>$link

					),

					$data['deslogin'],

					$data['desperson']
				
				);//end Mailer
				
				$mailer->send();
				
				# Aula 106 (28:16)
				// return $link;
				return $data;

			}//end else

		}//end else

	}//END Method









	/*public static function getForgot( $email, $inadmin = true )
	{
		$sql = new Sql();
		
		$results = $sql->select("

			SELECT * FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.desemail = :email;

			", 
			
			array(

				":email"=>$email
		
			)//end array
		
		);//end select

		if( count($results) === 0 )
		{
			
			throw new \Exception("Não foi possível recuperar a senha");

		}//end if
		else
		{

			$data = $results[0];
			
			$results2 = $sql->select("
			
				CALL sp_userspasswordsrecoveries_create(:iduser, :desip)
				
				", 
				
				array(
					
					":iduser"=>$data['iduser'],
					":desip"=>$_SERVER['REMOTE_ADDR']

				)//end array
			
			);//end select

			if ( count($results2) === 0 )
			{

				throw new \Exception("Não foi possível recuperar a senha.");

			}//end if
			else
			{

				$dataRecovery = $results2[0];
				
				$iv = random_bytes( openssl_cipher_iv_length('aes-256-cbc') );
				
				$code = openssl_encrypt(
					
					$dataRecovery['idrecovery'], 

					'aes-256-cbc', 

					User::SECRET, 

					0, 

					$iv
				
				);//end openssl_encrypt
				
				$result = base64_encode($iv.$code);
				
				if( $inadmin === true ) 
				{

					$link = "http://ecommerce_full.com.br/481738admin/forgot/reset?code=$result";

				}//end if
				else
				{

					$link = "http://ecommerce_full.com.br/forgot/reset?code=$result";
				
				}//end else

				$mailer = new Mailer(
					
					$data['desemail'], 
					$data['desperson'], 
					"Redefinir senha da Loja Virtual",
					# template do e-mail em si na /views/email/ e não da administração
					"forgot", 
					
					array(

						"name"=>$data['desperson'],
						"link"=>$link

					)//end array
				
				);//end Mailer
				
				$mailer->send();
				
				# Aula 106 (28:16)
				// return $link;
				return $data;

			}//end else

		}//end else

	}//END Method*/












	/*
	public static function getForgot($email, $inadmin = true)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.desemail = :email;
			", array(
				":email"=>$email
			));

		if(count($results) === 0)
		{
			throw new \Exception("Não foi possível recuperar a senha");
			
		}#end if
		else
		{
			$data = $results[0];

			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
				":iduser"=>$data["iduser"],
				":desip"=>$_SERVER["REMOTE_ADDR"],
			));

			if(count($results2) === 0)
			{
				throw new \Exception("Não foi possível recuperar a senha");
				
			}#end if
			else
			{
				$dataRecovery = $results2[0];

				/*	# DEPRECATED #
					base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, User::SECRET, $dataRecovery["idrecovery"], MCRYPT_MODE_ECB));
				

					$link = "http://www.hcodecommerce.com.br/481738admin/forgot/reset?code=$code";

					$mailer = new Mailer($data["desemail"], $data["desperson"], "Redefinir senha da Hcode Store", "forgot", array(
						"name"=>$data["desperson"],
						"link"=>$link
					));

					$mailer->send();

					return $data;
				

				$iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		        
		        $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', User::SECRET, 0, $iv);
		        
		        $result = base64_encode($iv.$code);
		        
		        if($inadmin === true)
		        {
		        	$link = "http://www.hcodecommerce.com.br/481738admin/forgot/reset?code=$result";
		        }#end if
		        else
		        {
		        	$link = "http://www.hcodecommerce.com.br/forgot/reset?code=$result";
		        }#end else
		        
		        $mailer = new Mailer($data['desemail'], $data['desperson'], "Redefinir senha da Hcode Store", "forgot", array(
		        	"name"=>$data['desperson'],
		            "link"=>$link
		        )); 
		        
		        $mailer->send();
		        
		        return $link;

			}#end else

		}#end else

	}//END Method
	*/







	public static function validForgotDecrypt( $code )
	{


	    $result = base64_decode($code);

	    
	    
			
	    
	    $code = mb_substr(
			
			$result, 

			openssl_cipher_iv_length('AES-256-CBC'),

			null, 

			'8bit'
		
		);//end mb_substr

	
		
	    $iv = mb_substr(
			
			$result, 

			0, 

			openssl_cipher_iv_length('AES-256-CBC'),

			'8bit'

		);//end mb_substr

	    	
		
	
		
	    $idrecovery = openssl_decrypt(
			
			$code, 

			'AES-256-CBC', 
			
			User::SECRET, 
			
			0,
			
			$iv
		
		);//end openssl_decrypt


		


	    $sql = new Sql();
	    
		$results = $sql->select("
		
	        SELECT * FROM tb_userspasswordsrecoveries a
	        INNER JOIN tb_users b ON a.iduser = b.iduser
	        INNER JOIN tb_persons c ON b.idperson = c.idperson
	        WHERE a.idrecovery = :idrecovery AND
	        a.dtrecovery IS NULL AND
			DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
			
			", 
			
			array(

	        	":idrecovery"=>$idrecovery

			)//end array
		
		);//end select



		
		
		
		 

	    if( count($results) === 0 )
	    {

			throw new \Exception("Não foi possível recuperar a senha");
			
	    }//end if
	    else
	    {

	    	if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);	
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);	
				
			}//end if



	    	return $results[0];

	    }//end else

	}//END Method








	public static function setForgotUsed( $idrecovery )
	{
		$sql = new Sql();

		$sql->query("
		
			UPDATE tb_userspasswordsrecoveries 
			SET dtrecovery = NOW()
			WHERE idrecovery = :idrecovery
			
			", 
			
			array(

				":idrecovery"=>$idrecovery

			)//end array
		
		);//end query

	}//END Method










	public function setPassword( $password )
	{
		$sql = new Sql();

		$sql->query("
		
			UPDATE tb_users 
			SET despassword = :password
			WHERE iduser = :iduser
			
			", 
			
			array(

				"password"=>$password,
				":iduser"=>$this->getiduser()

			)//end array
		
		);//end query

	}//END Method


























































	public function setRegisterEntities()
	{


		try 
		{


			//$user = new User();

			//$user->get((int)$iduser);





			
			if( (int)$this->getinplancontext() == 0 )
			{


				$timezone = new \DateTimeZone('America/Sao_Paulo');

				$dt_now = new \DateTime("now");

				$dt_now->setTimezone($timezone);
				


				$dt_free = new \DateTime("now + 10 day");

				$dt_free->setTimezone($timezone);

				

				$inplan = Plan::getPlanArray(0);











				$plan = new Plan();

				$plan->getFreePlan((int)$this->getiduser());

				$plan->setData([

					'iduser'=>$this->getiduser(),
					'inplancode'=>$inplan['inplancode'],
					'incontext'=>$inplan['inplancontext'],
					'inmigration'=>0,
					'inperiod'=>$inplan['inperiod'],
					'desplan'=>$inplan['desplan'],
					'vlprice'=>$inplan['vlprice'],
					'dtbegin'=>$dt_now->format('Y-m-d'),
					'dtend'=>$dt_free->format('Y-m-d')


				]);//end setData
				
				$plan->save();



				
				//$this->setdtplanbegin($dt_now->format('Y-m-d'));
				//$this->setdtplanend($dt_free->format('Y-m-d'));













				$cart = new Cart();

				$data = [

					'dessessionid'=>session_id(),
					'iduser'=>$this->getiduser(),
					'incartstatus'=>0,
					'incartitem'=>0

				];//end $data

				$cart->setData($data);

				$cart->update();


				







				$customer = new Customer();

				$customer->getLast((int)$this->getiduser());

				$customer->setData([

					'idcustomer'=>$customer->getidcustomer(),
					'iduser'=>$this->getiduser(),
					'descustomercode'=>null,
					'desname'=>null,
					'desemail'=>null,
					'nrcountryarea'=>null,
					'nrddd'=>null,
					'nrphone'=>null,
					'intypedoc'=>null,
					'desdocument'=>null,
					'deszipcode'=>null,
					'desaddress'=>null,
					'desnumber'=>null,
					'descomplement'=>null,
					'desdistrict'=>null,
					'descity'=>null,
					'desstate'=>null,
					'descountry'=>null,
					'descardcode'=>null,
					'desbrand'=>null,
					'infirst6'=>null,
					'inlast4'=>null,
					'dtbirth'=>null


				]);

				$customer->save();


				



			






				$cart->addItem( $plan->getidplan(), 0);






				/**Payment Method
				 * 0 - Boleto
				 * 1 - Own Card
				 * 2 - Third Part Card
				 * 3 - Voucher
				 * 4 - Free Plan
				 */

				$payment = new Payment();

				$payment->getLast((int)$this->getiduser());

				$payment->setData([
						
					'idpayment'=>$payment->getidpayment(),
					'iduser'=>$this->getiduser(),
					'despaymentcode'=>null,
					'inpaymentmethod'=>4,
					'nrinstallment'=>null,
					'inpaymentstatus'=>PaymentStatus::SETTLED,
					'incharge'=>null,
					'inrefunded'=>null,
					'deslinecode'=>null,
					'desprinthref'=>null,
					'desholdername'=>null,
					'nrholdercountryarea'=>null,
					'nrholderddd'=>null,
					'nrholderphone'=>null,
					'inholdertypedoc'=>null,
					'desholderdocument'=>null,
					'desholderzipcode'=>null,
					'desholderaddress'=>null,
					'desholdernumber'=>null,
					'desholdercomplement'=>null,
					'desholderdistrict'=>null,
					'desholdercity'=>null,
					'desholderstate'=>null,
					'dtholderbirth'=>null



				]);//end setData

				$payment->update();





				



				







				$fee = new Fee();
				
				$fee->getLast((int)$this->getiduser());

				$fee->setData([

					'idfee'=>$fee->getidfee(),
					'iduser'=>$this->getiduser(),
					'idpayment'=>$payment->getidpayment(),
					'vlmktpercentage'=>null,
					'vlmktfixed'=>null,
					'vlpropercentage'=>null,
					'vlprofixed'=>null,
					'vlantecipation'=>null,
					'nrantecipationperiod'=>null
					

				]);//end setData

				$fee->save();







				$cart->setincartstatus(1);
				$cart->update();
				//Cart::removeFromSession();




				






				$order = new Order();

				$order->getLast((int)$this->getiduser());

				$order->setData([

					'idorder'=>$order->getidorder(),
					'iduser'=>$this->getiduser(),
					'idcart'=>$cart->getidcart(),
					'idcustomer'=>$customer->getidcustomer(),
					'idpayment'=>$payment->getidpayment(),
					'idfee'=>$fee->getidfee(),
					'desordercode'=>null,
					'vltotal'=>$plan->getvlprice(),
					'vlseller'=>$plan->getvlprice(),
					'vlmarketplace'=>$plan->getvlprice(),
					'vlprocessor'=>$plan->getvlprice()

				]);//end setData

				$order->save();



			

			}//end if
			
			

			









			$customstyle = new CustomStyle();

			$customstyle->get((int)$this->getiduser());

			$customstyle->setData([

				'idcustomstyle'=>$customstyle->getidcustomstyle(),
				'iduser'=>$this->getiduser(),
				'idtemplate'=>1,
				'desbanner'=>'0.jpg',
				'desbannerextension'=>'jpg',

				'desbgcolorbanner'=>'03A9F4',
				'desbgcolorfooter'=>'03A9F4',
				'descolorfooter'=>'FFFFFF',
				'descolorfooterhover'=>'C7E8F7',

				'descolor1'=>'FFFFFF',
				'descolor2'=>'03A9F4',
				'descolortexthover'=>'03A9F4',
				'descolordate'=>'FFFFFF',
				'desfontfamilydate'=>'Norican',
				'desfontfamily1'=>'Norican',
				'desfontfamily2'=>'OpenSans',

				'inbgcolorgradient'=>0,
				'inbgcolorbutton'=>0,
				'inroundborderimage'=>1,
				'inbordersocial'=>1,
				'desborderimagesize'=>'12',
				'desborderradiusbutton'=>'20'


			]);//end setData

			$customstyle->update();











			
			$consort = new Consort();

			$consort->get((int)$this->getiduser());

			$consort->setData([

				'idconsort'=>$consort->getidconsort(),
				'iduser'=>$this->getiduser(),
				'desconsort'=>'Meu Amor',
				'desconsortemail'=>'',
				'desphoto'=>Rule::DEFAULT_PHOTO,
				'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

			]);//end setData
	

			$consort->update();
			

			






			
















			$timezone = new \DateTimeZone('America/Sao_Paulo');

			$dtwedding = new \DateTime("now + 1 year");

			$dtwedding->setTimezone($timezone);

			$wedding = new Wedding();

			$wedding->get((int)$this->getiduser());

			$wedding->setData([

				'idwedding'=>$wedding->getidwedding(),
				'iduser'=>$this->getiduser(),
				'dtwedding'=>$dtwedding->format('Y-m-d'),
				'tmwedding'=>'19:00',
				'desdescription'=>'',
				'descostume'=>'',
				'desdirections'=>'',
				'desaddress'=>'',
				'desnumber'=>'',
				'desdistrict'=>'',
				'descity'=>'',
				'desstate'=>'',
				'descountry'=>'',
				'desphoto'=>Rule::DEFAULT_PHOTO,
				'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION
				

			]);//end setData
		
			$wedding->update();










				

			













			$party = new Party();	

			$party->get((int)$this->getiduser());

			$party->setData([

				'idparty'=>$party->getidparty(),
				'iduser'=>$this->getiduser(),
				'dtparty'=>$dtwedding->format('Y-m-d'),
				'tmparty'=>'21:00',
				'desdescription'=>'',
				'descostume'=>'',
				'desdirections'=>'',
				'desaddress'=>'',
				'desnumber'=>'',
				'desdistrict'=>'',
				'descity'=>'',
				'desstate'=>'',
				'descountry'=>'',
				'desphoto'=>Rule::DEFAULT_PHOTO,
				'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION
				

			]);//end setData

			$party->update();









			

			
			



			$initialpage = new InitialPage();

			$initialpage->get((int)$this->getiduser());

			$initialpage->setData([

				'idinitialpage'=>$initialpage->getidinitialpage(),				
				'iduser'=>$this->getiduser(),
				'inparty'=>0,
				'inbestfriend'=>0,
				'inalbum'=>0

			]);//end setData

			$initialpage->update();

			




			



			$menu = new Menu();

			$menu->get((int)$this->getiduser());

			$menu->setData([

				'idmenu'=>$menu->getidmenu(),
				'iduser'=>$this->getiduser(),
				'inwedding'=>1,
				'inparty'=>1,
				'inbestfriend'=>1,
				'inrsvp'=>1,
				'inmessage'=>1,
				'instore'=>1,
				'inevent'=>1,
				'inalbum'=>1,
				'invideo'=>1,
				'instakeholder'=>1,
				'inouterlist'=>1

			]);//end setData
				
			$menu->update();




			

			





			$productconfig = new ProductConfig();

			$productconfig->get((int)$this->getiduser());

			$productconfig->setData([

				'idproductconfig'=>$productconfig->getidproductconfig(),
				'iduser'=>$this->getiduser(),
				'incharge'=>0


			]);//end setData

			$productconfig->update();






			

			





			$rsvpconfig = new RsvpConfig();

			$rsvpconfig->get((int)$this->getiduser());

			$desadultsdescription = 'Lembramos que nosso casamento é um evento apenas para adultos e, portanto, os convidados não deverão levar menores de '.Rule::MIN_ADULTS_AGE.' anos de idade';

			$rsvpconfig->setData([

				'idrsvpconfig'=>$rsvpconfig->getidrsvpconfig(),
				'iduser'=>$this->getiduser(),
				'inclosed'=>0,
				'inadultsconfig'=>0,
				'inmaxadultsconfig'=>10,
				'inchildren'=>1,
				'inchildrenconfig'=>0,
				'inmaxchildrenconfig'=>10,
				'inchildrenage'=>7,
				'desadultstitle'=>'Lembrete:',
				'desadultsdescription'=>$desadultsdescription

			]);//end setData

			$rsvpconfig->update();



			






			$socialmedia = new SocialMedia();

			$socialmedia->get((int)$this->getiduser());

			$socialmedia->setData([

				'idsocialmedia'=>$socialmedia->getidsocialmedia(),

				'iduser'=>$this->getiduser(),

				'desfacelink1'=>'',
				'desfacelink2'=>'',
				'desfacelink3'=>'',

				'desinstalink1'=>'',
				'desinstalink2'=>'',
				'desinstalink3'=>'',

				'desyoutubelink1'=>'',
				'desyoutubelink2'=>'',
				'desyoutubelink3'=>'',

				'destwitterlink1'=>'',
				'destwitterlink2'=>'',
				'destwitterlink3'=>''

			]);//end setData


			$socialmedia->update();






			























			$testimonial = new Testimonial();

			$testimonial->get((int)$this->getiduser());


			$testimonial->setData([

				'idtestimonial'=>$testimonial->getidtestimonial(),

				'iduser'=>$this->getiduser(),

				'instatus'=>1,
				'insample'=>0,
				'inrating'=>0,
				'desdescription'=>''

			]);//end setData


			$testimonial->update();

















			/*
			
			$account = new Account();

			$account->get((int)$this->getiduser());

			$account->setData([

				'idaccount'=>$account->getidaccount(),
				'iduser'=>$this->getiduser(),
				'desaccountcode'=>null,
				'desaccesstoken'=>null,
				'deschannelid'=>null,
				'desname'=>null,
				'desemail'=>null,
				'nrcountryarea'=>null,
				'nrddd'=>null,
				'nrphone'=>null,
				'intypedoc'=>null,
				'desdocument'=>null,
			  	'deszipcode' =>null,
				'desaddress'=>null,
				'desnumber' =>null,
			  	'descomplement'=>null,
			  	'desdistrict'=>null,
			  	'descity'=>null,
			  	'desstate'=>null,
			  	'descountry'=>null,
			  	'dtbirth'=>null

			]);//end setData

			$account->save();

			*/


			



			$address = new Address();

			$address->get((int)$this->getiduser());

			$address->setData([

				'idaddress'=>$address->getidaddress(),
				'iduser'=>$this->getiduser(),
				'deszipcode'=>null,
				'desaddress'=>null,
				'desnumber'=>null,
				'descomplement'=>null,
				'desdistrict'=>null,
				'idcity'=>null,
				'descity'=>null,
				'idstate'=>null,
				'desstate'=>null,
				'desstatecode'=>null,
				'descountry'=>null,
				'descountrycode'=>null


			]);//end setData

			$address->update();





















			$bank = new Bank();

			$bank->get((int)$this->getiduser());

			$bank->setData([

				'idbank'=>$bank->getidbank(),
				'iduser'=>$this->getiduser(),
				'desbankcode'=>null,
				'desbanknumber'=>null,
				'desagencynumber'=>null,
				'desagencycheck'=>null,
				'desaccounttype'=>null,
				'desaccountnumber'=>null,
				'desaccountcheck'=>null

			]);//setData

			$bank->update();





			return true;

			//$user->setdtplanbegin($dt_now->format('Y-m-d'));
			//$user->setdtplanend($dt_free->format('Y-m-d'));

			//$user->setinregister('1');

		
			//$user->update();



			
		}//end try
		catch ( \Exception $e )
		{


			/*if( 

				isset($cart->getidcart())
				&&
				isset($plan->getidplan())


			) 
			{

				$cart->removeItem($plan->idplan());
				$cart->delete();
				$plan->delete();

			}//end if
			elseif( $plan->getidplan() != null )
			{

				 $plan->delete();

			}//end elseif

			if( $customer->getidcustomer() != null ) $customer->delete();
			if( $payment->getidpayment() != null ) $payment->delete();
			if( $fee->getidfee() != null ) $fee->delete();
			if( $order->getidorder() != null ) $order->delete();*/


			if(isset($_SESSION[User::SESSION])) $_SESSION[User::SESSION] = NULL;


			User::setError(Rule::ERROR_REGISTER);
			header('Location: /login');
			exit;

			
		}//end catch




	}//END Method

































	public static function setError( $msg )
	{

		$_SESSION[User::ERROR] = $msg;

	}//END Method








	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}//END Method








	public static function clearError()
	{
		$_SESSION[User::ERROR] = NULL;

	}//END Method
	







	public static function setSuccess( $msg )
	{

		$_SESSION[User::SUCCESS] = $msg;

	}//END Method










	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}//END Method








	public static function clearSuccess()
	{
		$_SESSION[User::SUCCESS] = NULL;

	}//END Method










	public static function setErrorRegister( $msg )
	{
		$_SESSION[User::ERROR_REGISTER] = $msg;
		
	}//END Method








	public static function getErrorRegister()
	{
		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}//END Method








	public static function clearErrorRegister()
	{
		$_SESSION[User::ERROR_REGISTER] = NULL;
		
	}//END Method









	/*public static function checkLoginExists( $login )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users
			WHERE deslogin = :deslogin;

			", 
			
			[

				':deslogin'=>$login

			]
		
		);//end select

		# Colocar o 'count' entre parênteses equivale a um if.
		# If count count($results) > 0 , retorna TRUE
		# If count count($results) = 0 , retorna FALSE
		
		return ( count($results) > 0 );

	}//END Method*/






	public static function checkLoginExists( $login )
	{
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users
			WHERE deslogin = :deslogin;
			ORDER BY dtregister DESC
			LIMIT 1;

			", 
			
			[

				':deslogin'=>$login

			]
		
		);//end select

		

		# Colocar o 'count' entre parênteses equivale a um if.
		# If count count($results) > 0 , retorna TRUE
		# If count count($results) = 0 , retorna FALSE


		return ( count($results) > 0 );

		
		/*if ( count($results) > 0 ) 
		{
			# code...

			return $results[0];

		}//end if
		else
		{
			return false;
		}//end else*/

	}//END Method







	public function getFromUrl( $desdomain )
	{
		$sql = new Sql();

		$results = $sql->select("
		
			SELECT * FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.desdomain = :desdomain
			ORDER BY a.dtregister DESC
			LIMIT 1;
			
			", 
		
			array(

				":desdomain"=>$desdomain

			)//end array

		);//end select

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
					
				
			}//end if
			
		
			$this->setData($results[0]);

		}//end if
		
		

		


	}//END Method










	public static function checkDesdomain( $desdomain )
	{

		$sql = new Sql();

		$results = $sql->select("
		
			SELECT * FROM tb_users
			WHERE desdomain = :desdomain
			ORDER BY dtregister
			LIMIT 1;
			
			", 
		
			array(

				":desdomain"=>$desdomain

			)//end array

		);//end select


		

		return ( count($results) > 0 );

		
	}//END Method











	/*public function getFromUrl( $desdomain )
	{
		$sql = new Sql();

		$results = $sql->select("
		
			SELECT * FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)
			INNER JOIN tb_customstyle d ON a.iduser = d.iduser
			WHERE a.desdomain = :desdomain
			
			", 
		
			array(

				":desdomain"=>$desdomain

			)//end array

		);//end select

		if( count($results) > 0 )
		{

			$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
		
			$this->setData($results[0]);

		}//end if

		



	}//END Method*/










	/*public static function validatePlanEnd( $dtplanend )
	{


		if( $dtplanend != null )
		{

			//$timezone = new DateTimeZone('America/Sao_Paulo');

			$dt_now = new \DateTime('now');

			//$dt_now->setTimezone($timezone);

			$dt_plan_end = new \DateTime($dtplanend);

			//$dtplanend->setTimezone($timezone);

			


			if( $dt_plan_end > $dt_now )
			{
				return true;
			}//end if
			else
			{
				return false;
			}

			
			
		}//end if
		else
		{


			return false;

		}//end else


		


	}//Method*/




















	/*public static function validatePlan( $inpaymentstatus, $inpaymentmethod, $inplancontext, $dtplanend )
	{


	
		//$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);

		


		if( $dt_plan_end < $dt_now )
		{

			return false;

		}//end if
		else
		{

			if ((int)$inplancontext == 0)
			{
				# code...
				return false;

			}//end if
			else
			{


				//Pagamento com Cartão
				if( 

					in_array((int)$inpaymentmethod, [1,2])

				)
				{
					if( 

						(int)$inpaymentstatus == 1
						||
						(int)$inpaymentstatus == 2
						||
						(int)$inpaymentstatus == 3
						||
						(int)$inpaymentstatus == 4
						||
						(int)$inpaymentstatus == 5
						||
						(int)$inpaymentstatus == 9

					)
					{

						return true;

					}//end if
					else
					{

						return false;

					}//end else

				}//end if
				else
				{

					//Pagamento em Boleto
					if( 
		
						(int)$inpaymentstatus == 9

					)
					{

						return true;

					}//end if
					else
					{

						return false;

					}//end else


				}//end else


			}//end else

			
		}//end else

			
			
	
		


	}//Method*/









































	public static function validatePlan( $planArray )
	{

				
			
		//$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		//$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);


		
		
		

		if( (int)$planArray != 0 )
		{

			foreach ( $planArray as $row ) 
			{
				# code...
				
					

				//Pagamento com Cartão
				
				if (

					in_array((int)$row['inpaymentmethod'], [1,2,3])

				)
				{
					if( 

						(int)$row['inpaymentstatus'] == 1
						||
						(int)$row['inpaymentstatus'] == 2
						||
						(int)$row['inpaymentstatus'] == 3
						||
						(int)$row['inpaymentstatus'] == 4
						||
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now ) break;

						return $row;

					}//end if
					

				}//end if
				elseif( (int)$row['inpaymentmethod'] == 0 )
				{

					//Pagamento em Boleto
					if( 
		
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now  ) break;

						return $row;

					}//end if

				}//end else


			}//end foreach


			return false;


		}//end if
		else
		{

			
			return false;
			


		}//end else

			
			


	}//END Method



























































	//backup20200901
	/*
	public static function validatePlan( 
		
		$plans, 
		$inplancontext, 
		$incheckout, 
		$instatus, 
		$inautostatus 
	
	)
	{

				
			
		//$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		//$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);


		
		
		

		if( (int)$inautostatus == 0 )
		{

			return false;


		}//end if
		elseif( (int)$instatus == 0 )
		{

			return false;


		}//end if
		elseif ( (int)$incheckout == 0 ) 
		{
			# code...

			return true;

		}//end else
		elseif ( (int)$inplancontext == 0 ) 
		{
			# code...

			return true;

		}//end else
		else
		{

			

			foreach ( $plans['results'] as $row ) 
			{
				# code...
				
					

				//Pagamento com Cartão
				
				if (

					in_array((int)$row['inpaymentmethod'], [1,2,3])

				)
				{
					if( 

						(int)$row['inpaymentstatus'] == 1
						||
						(int)$row['inpaymentstatus'] == 2
						||
						(int)$row['inpaymentstatus'] == 3
						||
						(int)$row['inpaymentstatus'] == 4
						||
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now ) break;

						return $row;

					}//end if
					

				}//end if
				elseif( (int)$row['inpaymentmethod'] == 0 )
				{

					//Pagamento em Boleto
					if( 
		
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now  ) break;

						return $row;

					}//end if

				}//end else


			}//end foreach


			return false;


		}//end else

			
			


	}//END Method

	
	
	*/





























	






















	public static function validatePlanDashboard( $user )
	{

		//backup
		//$user = User::getFromSession();

		$plan = new Plan();

		$plan_handler = $plan->get((int)$user->getiduser());

		$planArray = [];

		if( (int)$plan_handler['nrtotal'] > 0 )
		{

			$planArray = $plan_handler['results'];

		}//end if



		return User::validatePlan( $planArray );



	}//END Method













































	//BACKUP
	/*
	 public static function validatePlanDashboard( $user )
	{

		//backup
		//$user = User::getFromSession();


		$plans = [];


		if( (int)$user->getinplancontext() != 0 )
		{

			$plan = new Plan();

			$plans = $plan->get((int)$user->getiduser());

		}//end if


		return User::validatePlan( $plans, $user->getinplancontext(), $user->getincheckout(), $user->getinstatus(), $user->getinautostatus() );



	}//END Method
	 */


















	//BACKUP
	/*
	public static function validatePlan( $inplancontext, $dtplanend, $plans )
	{

		
			
		//$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		//$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);

		


		if ( (int)$inplancontext == 0 ) 
		{
			# code...

			return true;

		}//end else
		else
		{

			foreach ( $plans['results'] as $row ) 
			{
				# code...
				


				//Pagamento com Cartão
				
				if (

					in_array((int)$row['inpaymentmethod'], [1,2,3])

				)
				{
					if( 

						(int)$row['inpaymentstatus'] == 1
						||
						(int)$row['inpaymentstatus'] == 2
						||
						(int)$row['inpaymentstatus'] == 3
						||
						(int)$row['inpaymentstatus'] == 4
						||
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now ) break;

						return true;

					}//end if
					

				}//end if
				elseif( (int)$row['inpaymentmethod'] == 0 )
				{

					//Pagamento em Boleto
					if( 
		
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now  ) break;

						return true;

					}//end if

				}//end else


			}//end foreach


			return false;


		}//end else

			
			


	}//Method
	*/































	/*
	public static function validatePlan( $inplancontext, $dtplanend, $plans )
	{

		
		
			
		//$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new \DateTime('now');

		//$dt_now->setTimezone($timezone);

		$dt_plan_end = new \DateTime($dtplanend);

		//$dtplanend->setTimezone($timezone);

		


		if( $dt_plan_end < $dt_now )
		{

			return false;

		}//end if
		elseif ( (int)$inplancontext == 0 ) 
		{
			# code...

			return true;

		}//end else
		else
		{

			foreach ( $plans['results'] as $row ) 
			{
				# code...
				


				//Pagamento com Cartão
				
				if (

					in_array((int)$row['inpaymentmethod'], [1,2,3])

				)
				{
					if( 

						(int)$row['inpaymentstatus'] == 1
						||
						(int)$row['inpaymentstatus'] == 2
						||
						(int)$row['inpaymentstatus'] == 3
						||
						(int)$row['inpaymentstatus'] == 4
						||
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now ) break;

						return true;

					}//end if
					

				}//end if
				elseif( (int)$row['inpaymentmethod'] == 0 )
				{

					//Pagamento em Boleto
					if( 
		
						(int)$row['inpaymentstatus'] == 5
						||
						(int)$row['inpaymentstatus'] == 9

					)
					{

						$dtend = new \DateTime($row['dtend']);

						if ( $dtend < $dt_now  ) break;

						return true;

					}//end if

				}//end else


			}//end foreach


			return false;


		}//end else

			
			


	}//Method
	*/




















	/*
	public static function validatePlanDashboard( $user )
	{

		//backup
		//$user = User::getFromSession();


		$plans = [];


		if( (int)$user->getinplancontext() != 0 )
		{

			$plan = new Plan();

			$plans = $plan->get((int)$user->getiduser());

		}//end if


		return User::validatePlan( $plans, $user->getinplancontext(), $user->getinautostatus() );



	}//end Method

	*/




























	//BACKUP
	/*
	public static function validatePlanDashboard( $user )
	{


		//$user = User::getFromSession();

		

		$plans = [];


		if( (int)$user->getinplancontext() != 0 )
		{

			$plan = new Plan();

			$plans = $plan->get((int)$user->getiduser());

		}//end if


		return User::validatePlan( $user->getinplancontext(), $user->getdtplanend(), $plans );



	}//end Method
	*/



























	




	/*public static function validatePlanFree( $inplancontext )
	{


		if( (int)$inplancontext != 0 )
		{
			
			return false;
							
			
		}//end if
		else
		{
			
			return true;

		}//end else


	}//Method*/










	




	public function getTemplate()
	{
		$template = '';

		switch( $this->getidtemplate() ) 
		{
			case '1':
				# code...
				$template = '1';
				break;
		
			case '2':
				# code...
				$template = '2';
				break;

			case '3':
				# code...
				$template = '3';
				break;


			case '4':
				# code...
				$template = '4';
				break;

			case '5':
				# code...
				$template = '5';
				break;
			
			

		}//end switch

		return $template;
		
	}//END Method



























	public static function checkUrlExists( $desdomain )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_users
			WHERE desdomain = :desdomain
			ORDER BY dtregister
			LIMIT 1;

			", 
			
			[

				':desdomain'=>$desdomain

			]
		
		);//end select



		

		# Colocar o 'count' entre parênteses equivale a um if.
		# If count count($results) > 0 , retorna TRUE
		# If count count($results) = 0 , retorna FALSE
		
		return ( count($results) > 0 );

	}//END Method













	public static function getPasswordHash( $password )
	{
		return password_hash(
			
			$password, 
			
			PASSWORD_DEFAULT, 
			
			[

				'cost'=>12

			]
		
		);//end password_hash

	}//END Method








	public function getOrders()
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_orders a
			INNER JOIN tb_carts b ON a.idcart = b.idcart
			INNER JOIN tb_users c ON a.iduser = d.iduser
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE a.iduser = :iduser

			", 
			
			[

				':iduser'=>$this->getiduser()

			]
		
		);//end select

		


		if ( count($results) > 0 ) 
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				foreach( $results as &$row )
				{
					# code...		
					$row['desperson'] = utf8_encode($row['desperson']);
					$row['desnick'] = utf8_encode($row['desnick']);
					

				}//end foreach
				
			}//end if


			return $results;


		}//end if

	}//END Method








	public static function getPage( $page = 1, $itensPerPage = 10 )
	{


		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			ORDER BY a.dtregister DESC
			LIMIT $start, $itensPerPage;

		");//end select



		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
		
		");//end select


		

		if ( count($results) > 0 )
		{
			# code...

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
				
			}//end if

		}//end if


		return [

			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage),
			'nrtotal'=>$resultTotal[0]["nrtotal"]

		];//end return




	}//END Method








	public static function getPageSearch( $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			WHERE b.desemail = :search OR b.desperson LIKE :searchlike OR a.deslogin LIKE :searchlike
			ORDER BY a.dtregister DESC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':searchlike'=>'%'.$search.'%',
				':search'=>$search

			]
		
		);//end select



		$resultTotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select




		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desperson'] = utf8_encode($results[0]['desperson']);
				$results[0]['desnick'] = utf8_encode($results[0]['desnick']);
				
			}//end if

		}//end if


		return [

			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage),
			'nrtotal'=>$resultTotal[0]["nrtotal"]

		];//end return


	}//END Method





















	public static function getSiteSearch( $search, $page = 1, $itensPerPage = 10 )
	{
		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
		{

			$search = utf8_decode($search);

		}//end if



		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();


		$results = $sql->select("

			SELECT a.desdomain,
			b.desperson,
			b.desnick,
			c.desconsort,
            d.dtwedding,
            e.descity,
            e.desstatecode,
            e.descountry,
            e.descountrycode,
            f.desbanner
			FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			INNER JOIN tb_consorts c ON a.iduser = c.iduser
			INNER JOIN tb_weddings d ON a.iduser = d.iduser
            INNER JOIN tb_addresses e ON a.iduser = e.iduser
            INNER JOIN tb_customstyle f ON a.iduser = f.iduser
			WHERE a.desdomain IS NOT NULL AND b.desperson LIKE :searchlike
			OR a.desdomain IS NOT NULL AND b.desnick LIKE :searchlike
			OR a.desdomain IS NOT NULL AND c.desconsort LIKE :searchlike
			ORDER BY b.desperson,
			a.dtregister DESC
			LIMIT $start, $itensPerPage;


			", 
			
			[

				':searchlike'=>'%'.$search.'%'
				//':search'=>$search

			]
		
		);//end select



		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select





		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				foreach ($results as &$row)
				{
					# code...
					$row['desperson'] = utf8_encode($row['desperson']);	
					$row['desnick'] = utf8_encode($row['desnick']);	
					$row['desconsort'] = utf8_encode($row['desconsort']);
					$row['descity'] = utf8_encode($row['descity']);

				}//end foreach
				
			}//end if

		}//end if


		return [

			'results'=>$results,
			'total'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return

			

	}//END Method






































	public static function getPageMailingSearch( $search, $page = 1, $itensPerPage = 10 )
	{
		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
		{

			$search = utf8_decode($search);

		}//end if



		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();


		$results = $sql->select("

			SELECT a.desdomain,
			b.desnick,
			c.desconsort,
            d.dtwedding,
            e.descity,
            e.desstatecode,
            e.descountry,
            e.descountrycode,
            f.desbanner
			FROM tb_users a 
			INNER JOIN tb_persons b ON a.idperson = b.idperson
			INNER JOIN tb_consorts c ON a.iduser = c.iduser
			INNER JOIN tb_weddings d ON a.iduser = d.iduser
            INNER JOIN tb_addresses e ON a.iduser = e.iduser
            INNER JOIN tb_customstyle f ON a.iduser = f.iduser
			WHERE a.desdomain IS NOT NULL AND b.desperson LIKE :searchlike
			OR a.desdomain IS NOT NULL AND b.desnick LIKE :searchlike
			OR a.desdomain IS NOT NULL AND c.desconsort LIKE :searchlike
			ORDER BY b.desperson,
			a.dtregister DESC
			LIMIT $start, $itensPerPage;


			", 
			
			[

				':searchlike'=>'%'.$search.'%'
				//':search'=>$search

			]
		
		);//end select



		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select





		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				foreach ($results as &$row)
				{
					# code...
					$row['desperson'] = utf8_encode($row['desperson']);	
					$row['desnick'] = utf8_encode($row['desnick']);	
					$row['desconsort'] = utf8_encode($row['desconsort']);
					$row['descity'] = utf8_encode($row['descity']);

				}//end foreach
				
			}//end if

		}//end if


		return [

			'results'=>$results,
			'total'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return

			

	}//END Method
















}//END Class






 ?>