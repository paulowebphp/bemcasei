<?php

use Core\PagePanel;
use Core\Maintenance;
//use Core\Rule;
use Core\Model\Lead;













$app->get( "/painel/mudar-senha", function()
{

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		Lead::setError($maintenance->getdesdescription());
		header("Location: /painel/login");
		exit;
		
	}//end if


	




	Lead::verifyLogin();

	$lead = Lead::getFromSession();




	//$validate = User::validatePlanDashboard( $user );


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




	$page = new PagePanel();

	$page->setTpl(
		

	 
		"panel-change-password", 
		
		[
			'lead'=>$lead->getValues(),
			'error'=>Lead::getError(),
			'success'=>Lead::getSuccess()

		]
	
	);//end setTpl

});//END route























$app->post( "/painel/mudar-senha", function()
{

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		Lead::setError($maintenance->getdesdescription());
		header("Location: /painel/login");
		exit;
		
	}//end if



	Lead::verifyLogin();

	$lead = Lead::getFromSession();

	if( 
		
		!isset($_POST['current_pass']) 
		|| 
		$_POST['current_pass'] === ''
		
	)
	{

		Lead::setError("Digite sua senha atual");
		header("Location: /painel/mudar-senha");
		exit;

	}//end if


	if(
		
		!isset($_POST['new_pass']) 
		|| 
		$_POST['new_pass'] === ''
		
	)
	{

		Lead::setError("Digite a senha nova");
		header("Location: /painel/mudar-senha");
		exit;

	}//end if


	if(
		
		!isset($_POST['new_pass_confirm'])
		|| 
		$_POST['new_pass_confirm'] === ''
		
	)
	{

		Lead::setError("Confirme a nova senha");
		header("Location: /painel/mudar-senha");
		exit;

	}//end if

	if( !($_POST['new_pass'] === $_POST['new_pass_confirm']) )
	{

		Lead::setError("A senhas novas digitadas são diferentes | Digite novamente");
		header("Location: /painel/mudar-senha");
		exit;		

	}//end if


	if( $_POST['current_pass'] === $_POST['new_pass'] )
	{

		Lead::setError("A sua nova senha deve ser diferente da atual | Por favor, preencha novamente");
		header("Location: /painel/mudar-senha");
		exit;		

	}//end if

	

	if( !password_verify( $_POST['current_pass'], $lead->getdespassword() ) )
	{

		Lead::setError("A senha atual inserida está inválida | Por favor, preencha novamente");
		header("Location: /painel/mudar-senha");
		exit;			

	}//end if


	//$new_pass = Lead::getPasswordHash($_POST['new_pass']);

	//$lead->setdespassword($new_pass);



	$lead->setdespassword($_POST['new_pass']);
	
	if((int)$lead->getinpasswordchange() == 0) $lead->setinpasswordchange(1);

	$lead->update();

	$lead->setToSession();

	Lead::setSuccess("Senha alterada");

	header("Location: /painel");
	exit;

});//END route

















$app->get( "/painel", function()
{
	

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		

		Lead::setError($maintenance->getdesdescription());
		header("Location: /painel/login");
		exit;
		
	}//end if



	

	

	Lead::verifyLogin();

	$lead = Lead::getFromSession();


	/*
	
	echo '<pre>';
	var_dump($_SESSION);
	var_dump(Lead::checkLogin());
	var_dump($lead->getValues());
	exit;
	
	*/

	//$validate = Lead::validatePlanDashboard( $user );


	


	
	





	$page = new PagePanel();


	

	$page->setTpl(
		

	 
		"index", 
		
		[

			'lead'=>$lead->getValues(),
			'success'=>Lead::getSuccess(),
			'error'=>Lead::getError()

		]
	
	);//end setTpl

});//END route









?>