<?php

use Core\Page;
use Core\Model\User;






$app->get( "/login", function()
{

	if( 

		isset($_SESSION[User::SESSION])
		&&
		$_SESSION[User::SESSION] !== null
		&&
		(int)$_SESSION[User::SESSION]['iduser'] > 0

	) 
	{

		header('Location: /dashboard');
		exit;	

	}//end if
	else
	{

		
		//User::verifyLogin(false);

		//$user = new User();

		//$user->setData($_SESSION[User::SESSION]);

		

		$page = new Page();

		$page->setTpl(
			
			"login", 
			
			[

				'error'=>User::getError(),
				'errorRegister'=>User::getErrorRegister()

			]
		
		);//end setTpl

	}//end else




	

});//END route




/*$app->get( "/login", function()
{

	if( 

		isset($_SESSION[User::SESSION])
		&&
		$_SESSION[User::SESSION] !== null
		&&
		(int)$_SESSION[User::SESSION]['iduser'] > 0
	) 
	{

		//User::verifyLogin(false);

		$user = new User();

		$user->setData($_SESSION[User::SESSION]);

		header('Location: /dashboard');
		exit;

	}//end if
	else
	{

		$page = new Page();

		$page->setTpl(
			
			"login", 
			
			[

				'error'=>User::getError(),
				'errorRegister'=>User::getErrorRegister()

			]
		
		);//end setTpl


	}//end else




	

});//END route*/







/*$app->get( "/login", function()
{

	$page = new Page();

	$page->setTpl(
		
		"login", 
		
		[

			'error'=>User::getError(),
			'errorRegister'=>User::getErrorRegister()

		]
	
	);//end setTpl

});//END route*/










/*$app->get( "/login", function()
{

	$page = new Page();

	$page->setTpl(
		
		"login", 
		
		[

			'error'=>User::getError(),
			'errorRegister'=>User::getErrorRegister(),
			'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']

		]
	
	);//end setTpl

});//END route*/







$app->post( "/login", function()
{
	
	try
	{

		User::login($_POST['login'], $_POST['password']);

	}//end try
	catch( Exception $e )
	{

		User::setError($e->getMessage());

	}//end catch

	header("Location: /dashboard");
	exit;


});//END route












$app->get( "/logout", function()
{

	User::logout();

	header("Location: /");
	exit;

});//END route











$app->get( "/recuperar-senha", function()
{

	$page = new Page();

	$page->setTpl(
		
		"forgot", 
		
		array(

			"error"=>User::getError()
		)
	
	);//end setTpl	

});//END route










$app->post( "/recuperar-senha", function()
{

	
	
	if ( 

		!isset($_POST["email"])
		||
		$_POST["email"] == ''
	)
	{
		# code...
		User::setError("Insira o e-mail");
		header("Location: /recuperar-senha");
		exit;
	}//end if



	# getForgot com parâmetro false para não usar link de verificação do admin
	//$user = User::getForgot($_POST["email"], false);
	User::getForgot($_POST["email"], false);

	header("Location: /recuperar-senha/verificar");
	exit;



});//END route












$app->get( "/recuperar-senha/verificar", function()
{

	$page = new Page();

	$page->setTpl("forgot-sent");	

});//END route











$app->get( "/recuperar-senha/redefinir", function()
{

	


	$user = User::validForgotDecrypt($_GET["code"]);

				

	$page = new Page();

	$page->setTpl(
		
		"forgot-reset", 
		
		array(

			"name"=>$user["desperson"],
			"code"=>$_GET["code"]
		)
	
	);//end setTpl

});//END route











$app->post( "/recuperar-senha/redefinir", function()
{

	


	$forgot = User::validForgotDecrypt($_POST["code"]);	

	


	User::setForgotUsed($forgot["idrecovery"]);

	

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = User::getPasswordHash($_POST["password"]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");

});//END route












/*$app->post( "/register", function()
{

	$_SESSION['registerValues'] = $_POST;



	if( 
		
		!isset($_POST['name']) 
		|| 
		$_POST['name'] == ''
	)
	{

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /login");
		exit;

	}//end if




	if(
		
		!isset($_POST['email']) 
		|| 
		$_POST['email'] == ''
	)
	{

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /login");
		exit;

	}//end if





	if(
		
		!isset($_POST['password']) 
		|| 
		$_POST['password'] == ''
		
	)
	{

		User::setErrorRegister("Preencha a senha.");
		header("Location: /login");
		exit;

	}//end if





	if( User::checkLoginExists($_POST['email']) === true )
	{

		User::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /login");
		exit;

	}//end if




	$user = new User();

	$user->setData([

		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>$_POST['phone']

	]);//end setData

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header('Location: /checkout');
	exit;

});//END route
*/








?>