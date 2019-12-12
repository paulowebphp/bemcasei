<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Photo;
use Core\Validate;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Plan;






$app->get( "/dashboard/meu-amor", function()
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


	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if




	$consort = new Consort();

	$consort->get((int)$user->getiduser());




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
		


		"consorts", 
		
		[
			'user'=>$user->getValues(),
			'consort'=>$consort->getValues(),
			'success'=>Consort::getSuccess(),
			'error'=>Consort::getError()
			

		]
	
	);//end setTpl

});//END route








$app->post( "/dashboard/meu-amor", function()
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



	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	if(
		
		!isset($_POST['desconsort']) 
		|| 
		$_POST['desconsort'] === ''
		
	){

		Consort::setError("Insira o Nome do Seu Amor");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if

	if( ( $desconsort = Validate::validateStringNumberSpecial($_POST['desconsort'], true, false)  ) === false )
	{

		Consort::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if





	

	
	if( ($desconsortemail = Validate::validateEmail($_POST['desconsortemail'], true)) === false )
	{	
		
		Consort::setError("O e-mail parece estar num formato inválido, tente novamente");
		header('Location: /dashboard/meu-amor');
		exit;

	}//end if


	

	$consort = new Consort();

	$consort->get((int)$user->getiduser());

	






	$consort->setData([


		'idconsort'=>$_POST['idconsort'],
		'iduser'=>$user->getiduser(),
		'desconsort'=>$desconsort,
		'desconsortemail'=>$desconsortemail,
		'desphoto'=>$consort->getdesphoto(),
		'desextension'=>$consort->getdesextension()

	]);//end setData

	//$_POST['iduser'] = $user->getiduser();

	//$consort->setData($_POST);

	//$consort->update();

	$consort->update();
	

	Consort::setSuccess("Dados alterados");

	header('Location: /dashboard/meu-amor');
	exit;



});//END route











?>