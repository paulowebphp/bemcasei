<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
//use Core\Model\Wedding;
use Core\Model\CustomStyle;
//use Core\Model\Plan;















$app->post( "/dashboard/meu-template", function()
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
		
		!isset($_POST['idtemplate']) 
		|| 
		$_POST['idtemplate'] === ''
	)
	{

		CustomStyle::setError("Escolha o template");
		header('Location: /dashboard/meu-template');
		exit;
		
	}//end if

	if( !$idtemplate = Validate::validateTemplateId($_POST['idtemplate']) )
	{

		CustomStyle::setError("O ID do template só pode ser um número de 1 a 8, com 1 dígito");
		header('Location: /dashboard/meu-template');
		exit;

	}//end if

	//$customstyle = new CustomStyle();

	//$customstyle->setData($_POST);




	Customstyle::updateTemplate( $user->getiduser(), $_POST['idcustomstyle'], $_POST['idtemplate'] );

	CustomStyle::setSuccess("Dados alterados");

	header('Location: /dashboard/meu-template');
	exit;


});//END route














































$app->get( "/dashboard/meu-template", function()
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


	

	$customstyle = new CustomStyle();

	$customstyle->get((int)$user->getiduser());





	$templateInfoFullArray = CustomStyle::getTemplateInfoFullArray();


	$preview = CustomStyle::getTemplateInfo((int)$customstyle->getidtemplate());



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
		


		"template", 
		
		[
			'user'=>$user->getValues(),
			'templateInfoFullArray'=>$templateInfoFullArray,
			'preview'=>$preview,
			'validate'=>$validate,
			'customstyle'=>$customstyle->getValues(),
			'success'=>CustomStyle::getSuccess(),
			'error'=>CustomStyle::getError()
			

		]
	
	);//end setTpl

});//END route



























?>