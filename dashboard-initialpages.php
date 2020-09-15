<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\InitialPage;
//use Core\Model\Plan;













$app->post( "/dashboard/pagina-inicial", function()
{

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		header("Location: /login");
		exit;
		
	}//end if






	User::verifyLogin(false);

	$user = User::getFromSession();




	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	




	if( 
		
		!isset($_POST['inparty']) 
		|| 
		$_POST['inparty'] === ''
	)
	{

		InitialPage::setError("Informe o inparty");
		header('Location: /dashboard/pagina-inicial');
		exit;
		
	}//end if

	if( ($inparty = Validate::validateBoolean($_POST['inparty'])) === false )
	{	
		
		InitialPage::setError("O status inparty deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/pagina-inicial');
		exit;

	}//end if






	if( 
		
		!isset($_POST['inbestfriend']) 
		|| 
		$_POST['inbestfriend'] === ''
	)
	{

		InitialPage::setError("Informe o inbestfriend");
		header('Location: /dashboard/pagina-inicial');
		exit;
		
	}//end if


	if( ($inbestfriend = Validate::validateBoolean($_POST['inbestfriend'])) === false )
	{	
		
		InitialPage::setError("O status inbestfriend deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/pagina-inicial');
		exit;

	}//end if







	if( 
		
		!isset($_POST['inalbum']) 
		|| 
		$_POST['inalbum'] === ''
	)
	{

		InitialPage::setError("Informe o inalbum");
		header('Location: /dashboard/pagina-inicial');
		exit;
		
	}//end if

	if( ($inalbum = Validate::validateBoolean($_POST['inalbum'])) === false )
	{	
		
		InitialPage::setError("O status inalbum deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/pagina-inicial');
		exit;

	}//end if










	$initialpage = new InitialPage();

	$initialpage->setData([

		'idinitialpage'=>$_POST['idinitialpage'],
		'iduser'=>$user->getiduser(),
		'inparty'=>$inparty,
		'inbestfriend'=>$inbestfriend,
		'inalbum'=>$inalbum

	]);//end setData




	$initialpage->update();

	//$user->setData($_POST);

	InitialPage::setSuccess("Dados alterados");

	header('Location: /dashboard/pagina-inicial');
	exit;

});//END route































$app->get( "/dashboard/pagina-inicial", function()
{

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		header("Location: /login");
		exit;
		
	}//end if






	User::verifyLogin(false);

	$user = User::getFromSession();





	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	

		
	//$user->get((int)$user->getiduser());

	$initialpage = new InitialPage();

	$initialpage->get((int)$user->getiduser());




	/*$plan = new Plan();


	if( (int)$user->getinplancontext() == 0 )
	{

		$plan->setinpaymentstatus('0');
		$plan->setinpaymentmethod('0');

	}//end if
	else
	{

		$plans = $plan->get((int)$user->getiduser());

		$plan->setinpaymentstatus($plans['results'][0]['inpaymentstatus']);
		$plan->setinpaymentmethod($plans['results'][0]['inpaymentmethod']);

	}//end else*/





	$page = new PageDashboard();

	$page->setTpl(
		
		"initialpages", 
		
		[	
			'user'=>$user->getValues(),
			'initialpage'=>$initialpage->getValues(),
			'validate'=>$validate,
			'success'=>InitialPage::getSuccess(),
			'error'=>InitialPage::getError()

		]
	
	);//end setTpl

});//END route






























?>