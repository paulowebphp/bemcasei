<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Menu;
//use Core\Model\Plan;








$app->post( "/dashboard/menu", function()
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

		Menu::setError("Informe o inparty");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inparty = Validate::validateBoolean($_POST['inparty'])) === false )
	{	
		
		Menu::setError("O inparty deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if










	if( 
		
		!isset($_POST['inbestfriend']) 
		|| 
		$_POST['inbestfriend'] === ''
	)
	{

		Menu::setError("Informe o inbestfriend");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inbestfriend = Validate::validateBoolean($_POST['inbestfriend'])) === false )
	{	
		
		Menu::setError("O inbestfriend deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if









	if( 
		
		!isset($_POST['inrsvp']) 
		|| 
		$_POST['inrsvp'] === ''
	)
	{

		Menu::setError("Informe o inrsvp");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inrsvp = Validate::validateBoolean($_POST['inrsvp'])) === false )
	{	
		
		Menu::setError("O inrsvp deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if









	if( 
		
		!isset($_POST['inmessage']) 
		|| 
		$_POST['inmessage'] === ''
	)
	{

		Menu::setError("Informe o inmessage");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inmessage = Validate::validateBoolean($_POST['inmessage'])) === false )
	{	
		
		Menu::setError("O inmessage deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if










	if( 
		
		!isset($_POST['instore']) 
		|| 
		$_POST['instore'] === ''
	)
	{

		Menu::setError("Informe o instore");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if


	if( ($instore = Validate::validateBoolean($_POST['instore'])) === false )
	{	
		
		Menu::setError("O instore deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if











	if( 
		
		!isset($_POST['inevent']) 
		|| 
		$_POST['inevent'] === ''
	)
	{

		Menu::setError("Informe o inevent");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if


	if( ($inevent = Validate::validateBoolean($_POST['inevent'])) === false )
	{	
		
		Menu::setError("O inevent deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if










	if( 
		
		!isset($_POST['inalbum']) 
		|| 
		$_POST['inalbum'] === ''
	)
	{

		Menu::setError("Informe o inalbum");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inalbum = Validate::validateBoolean($_POST['inalbum'])) === false )
	{	
		
		Menu::setError("O inalbum deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if









	if( 
		
		!isset($_POST['invideo']) 
		|| 
		$_POST['invideo'] === ''
	)
	{

		Menu::setError("Informe a invideo");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($invideo = Validate::validateBoolean($_POST['invideo'])) === false )
	{	
		
		Menu::setError("O invideo deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if









	if( 
		
		!isset($_POST['instakeholder']) 
		|| 
		$_POST['instakeholder'] === ''
	)
	{

		Menu::setError("Informe o instakeholder");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if


	if( ($instakeholder = Validate::validateBoolean($_POST['instakeholder'])) === false )
	{	
		
		Menu::setError("O instakeholder deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if











	if( 
		
		!isset($_POST['inouterlist']) 
		|| 
		$_POST['inouterlist'] === ''
	)
	{

		Menu::setError("Informe o inouterlist");
		header('Location: /dashboard/menu');
		exit;
		
	}//end if

	if( ($inouterlist = Validate::validateBoolean($_POST['inouterlist'])) === false )
	{	
		
		Menu::setError("O inouterlist deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/menu');
		exit;

	}//end if





	$menu = new Menu();

	$menu->setData([

		'idmenu'=>$_POST['idmenu'],
		'iduser'=>$user->getiduser(),
		'inparty'=>$inparty,
		'inbestfriend'=>$inbestfriend,
		'inrsvp'=>$inrsvp,
		'inmessage'=>$inmessage,
		'instore'=>$instore,
		'inevent'=>$inevent,
		'inalbum'=>$inalbum,
		'invideo'=>$invideo,
		'instakeholder'=>$instakeholder,
		'inouterlist'=>$inouterlist

	]);//end setData



		



	$menu->update();

	//$user->setData($_POST);

	Menu::setSuccess("Dados alterados");

	header('Location: /dashboard/menu');
	exit;

});//END route














































$app->get( "/dashboard/menu", function()
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

	$menu = new Menu();

	$menu->get((int)$user->getiduser());




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

	}//end else
	*/




	$page = new PageDashboard();

	$page->setTpl(
		
		"menus", 
		
		[
			'user'=>$user->getValues(),
			'menu'=>$menu->getValues(),
			'validate'=>$validate,
			'success'=>Menu::getSuccess(),
			'error'=>Menu::getError()

		]
	
	);//end setTpl

});//END route






























?>