<?php

use Core\Maintenance;
use Core\Page;
use Core\Rule;
use Core\PageDashboard;
use Core\Validate;
use Core\Model\User;
use Core\Model\Address;
use Core\Model\Plan;













$app->get( "/dashboard/dominio", function()
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

		
	//$user->get((int)$user->getiduser());


	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



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
		
		"domain", 
		
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()

		]
	
	);//end setTpl

});//END route























$app->post( "/dashboard/dominio", function()
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
		
		!isset($_POST['desdomain']) 
		|| 
		$_POST['desdomain'] === ''
	)
	{

		User::setError("Informe o domínio");
		header('Location: /dashboard/dominio');
		exit;
		
	}//end if



	if( !$desdomain = Validate::validateDomain($_POST['desdomain']) )
	{
		

		User::setError("O domínio deve conter letras minúsculas, números, hífen e underline e deve ter ao menos 3 dígitos");
		header('Location: /dashboard/dominio');
		exit;
	}//end if




	if( $desdomain == $user->getdesdomain() )
	{

		User::setError("Você já está usando este domínio");
		header('Location: /dashboard/dominio');
		exit;
		
	}//end if




	if( $desdomain != $user->getdesdomain() )
	{

		$pages = Page::getSitePages();


		if( in_array($desdomain, $pages) )
		{

			User::setError("Este domínio já está cadastrado");
			header('Location: /dashboard/dominio');
			exit;

		}//end if


		if( User::checkUrlExists($desdomain) == true )
		{

			User::setError("Este domínio já está cadastrado");
			header('Location: /dashboard/dominio');
			exit;

		}//end if



	}//end if


	


	$user->setdesdomain($desdomain);
	
	# Core colocou $user->save(); Aula 120
	$user->update();

	$user->setToSession();

	User::setSuccess("Dados alterados");

	header('Location: /dashboard/dominio');
	exit;





});//END route







?>