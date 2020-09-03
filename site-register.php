<?php

use \Core\Page;
use \Core\Rule;
use \Core\Validate;
//use \Core\Wirecard;
//use \Core\Mailer;
//use \Core\Model\Cart;
//use \Core\Model\Coupon;
//use \Core\Model\Address;
use \Core\Model\User;
//use \Core\Model\Consort;
//use \Core\Model\Party;
//use \Core\Model\Order;
//use \Core\Model\Payment;
//use \Core\Model\PaymentStatus;
//use \Core\Model\Account;
//use \Core\Model\Customer;
use \Core\Model\Plan;
//use \Core\Model\Wedding;
//use \Core\Model\InitialPage;
//use \Core\Model\Menu;
//use \Core\Model\RsvpConfig;
//use \Core\Model\ProductConfig;
//use \Core\Model\CustomStyle;
//use \Core\Model\Fee;
//use \Core\Model\SocialMedia;
//use \Core\Model\Bank;


















$app->get( "/planos", function()
{
	$plans = Plan::getPlansFullArray();

	$page = new Page();

	$page->setTpl(
		
		"plans",

		[

			'plans'=>$plans

		]
	
	);//end setTpl

});//END route























$app->get( "/criar-site-de-casamento", function()
{



	/*
	if ( isset($_GET['plano']) )
	{

		$plan = $_GET['plano'];

	}//end if
	else if( !isset($_GET['plano']) )
	{

		header('Location: /planos');
		exit;

	}//end else if
*/




	if ( 


		!isset($_GET['plano'])
		||
		$_GET['plano'] == ''

	)
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if



	if ( ( $inplancode = Validate::validateInplancode($_GET['plano']) ) === false )
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if









	

	$page = new Page();

	$page->setTpl(
		
		"register",

		[
			'inplancode'=>$inplancode,
			'errorRegister'=>User::getErrorRegister(),
			'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'']

		]
	
	);//end setTpl

});//END route

























$app->post( "/criar-site-de-casamento", function()
{


	$_SESSION['registerValues'] = $_POST;






	if ( 


		!isset($_POST['plano'])
		||
		$_POST['plano'] == ''

	)
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if



	if ( ( $inplancode = Validate::validateInplancode($_POST['plano']) ) === false )
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header("Location: /planos");
		exit;


	}//end if



	








	if( 
		
		!isset($_POST['name']) 
		|| 
		$_POST['name'] == ''
	)
	{

		User::setErrorRegister(Rule::ERROR_NAME);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if






	if( !Validate::validateFullName($_POST['name']) )
	{ 

		User::setErrorRegister(Rule::VALIDATE_FULL_NAME);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if






	if( !$desperson = Validate::validateString($_POST['name']) )
	{

		User::setErrorRegister(Rule::VALIDATE_NAME);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if













	if(
		
		!isset($_POST['email']) 
		|| 
		$_POST['email'] == ''
	)
	{

		User::setErrorRegister(Rule::ERROR_EMAIL);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if

	if( ($desemail = Validate::validateEmail($_POST['email'])) === false )
	{	
		
		User::setError(Rule::VALIDATE_EMAIL);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if
















	if(
		
		!isset($_POST['password']) 
		|| 
		$_POST['password'] == ''
		
	)
	{

		User::setErrorRegister(Rule::ERROR_PASSWORD);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if


	if( !Validate::validatePassword($_POST['password']) )
	{	
		
		User::setError(Rule::VALIDATE_PASSWORD);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if












	if(
		
		!isset($_POST['confirmation-register']) 
		|| 
		$_POST['confirmation-register'] == ''
		
	)
	{

		User::setErrorRegister(Rule::PASSWORD_CONFIRM);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if



	if(
		
		$_POST['confirmation-register'] != $_POST['password']
		
	)
	{

		User::setErrorRegister(Rule::PASSWORD_DIVERGENCY);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if






	/*if( User::checkLoginExists($_POST['email']) === true )
	{

		User::setErrorRegister(Rule::CHECK_LOGIN_EXISTS);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if*/



	


	/*if( ctype_graph($name) )
	{ 

		User::setErrorRegister("Este não parece ser um nome completo");
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if*/







	/*if (

		!isset($_POST['g-recaptcha-response'])
		||
		$_POST['g-recaptcha-response'] == ''

	)
	{
		# code...
		User::setErrorRegister(Rule::ERROR_RECAPTCHA);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if
	


	$recaptcha = User::getRecaptcha($_POST['g-recaptcha-response']);


	if ($recaptcha['success'] == false)
	{
		# code...
		User::setErrorRegister(Rule::VALIDATE_RECAPTCHA);
		header("Location: /criar-site-de-casamento?plano=".$inplancode);
		exit;

	}//end if*/

	
	


	$nameArray = explode(' ', $desperson);

	$desnick = $nameArray[0];

	$inplancontext = substr($inplancode, 0, 1);







	$user = new User();

	$user->setData([

		'deslogin'=>$desemail,
		'despassword'=>$_POST['password'],
		'desdomain'=>NULL,
		'inadmin'=>0,
		'inseller'=>1,
		'inregister'=>0,
		'inaccount'=>0,
		'inplancontext'=>$inplancontext,
		'inplan'=>$inplancode,
		'interms'=>0,
		'desipterms'=>NULL,
		'dtterms'=>NULL,
		'dtplanbegin'=>NULL,
		'dtplanend'=>NULL,
		'desperson'=>$desperson,
		'desnick'=>$desnick,
		'desemail'=>$desemail,
		'nrcountryarea'=>NULL,
		'nrddd'=>NULL,
		'nrphone'=>NULL,
		'intypedoc'=>0,
		'desdocument'=>NULL,
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION,
		'dtbirth'=>NULL


	]);//end setData

		

	$user->save();

	




	if( (int)$user->getiduser() > 0)
	{


		$user->setRegisterEntities();
		$user->setinregister('1');
		$user->update();


		
		if(isset($_SESSION['registerValues'])) unset($_SESSION['registerValues']);
		



		if( (int)$inplancode == 0 )
		{
			
			$_SESSION[User::SESSION] = NULL;

			$user->setToSession();
			//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

			header("Location: /dashboard");
			exit;

		}//end if
		else
		{	


			$hash = base64_encode($user->getiduser());

			header("Location: /cadastrar/".$hash);
			exit;

		}//end else


		


	}//end if

	

});//END route





























/*$app->get( "/state/city", function()
{
	
	
	if( !isset($_GET['idstate']) )
	{

		header('Location: /');
		exit;			

	}


	Address::getCitiesJson($_GET['idstate']);

	

});//END route

*/
































?>