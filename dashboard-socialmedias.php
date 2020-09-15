<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\SocialMedia;
//use Core\Model\Plan;










$app->post( "/dashboard/social", function()
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

	


	$consort = new Consort();
	$consort->get((int)$user->getiduser());





	$desfacelink1 = Validate::validateURL($_POST['desfacelink1'], true);
	$desfacelink2 = Validate::validateURL($_POST['desfacelink2'], true);
	$desfacelink3 = Validate::validateURL($_POST['desfacelink3'], true);

	$desinstalink1 = Validate::validateURL($_POST['desinstalink1'], true);
	$desinstalink2 = Validate::validateURL($_POST['desinstalink2'], true);
	$desinstalink3 = Validate::validateURL($_POST['desinstalink3'], true);

	$desyoutubelink1 = Validate::validateURL($_POST['desyoutubelink1'], true);
	$desyoutubelink2 = Validate::validateURL($_POST['desyoutubelink2'], true);
	$desyoutubelink3 = Validate::validateURL($_POST['desyoutubelink3'], true);

	$destwitterlink1 = Validate::validateURL($_POST['destwitterlink1'], true);
	$destwitterlink2 = Validate::validateURL($_POST['destwitterlink2'], true);
	$destwitterlink3 = Validate::validateURL($_POST['destwitterlink3'], true);



	





	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());



	$socialmedia->setData([

		'idsocialmedia'=>$socialmedia->getidsocialmedia(),
		'iduser'=>$user->getiduser(),

		'desfacelink1'=>$desfacelink1,
		'desfacelink2'=>$desfacelink2,
		'desfacelink3'=>$desfacelink3,

		'desinstalink1'=>$desinstalink1,
		'desinstalink2'=>$desinstalink2,
		'desinstalink3'=>$desinstalink3,

		'desyoutubelink1'=>$desyoutubelink1,
		'desyoutubelink2'=>$desyoutubelink2,
		'desyoutubelink3'=>$desyoutubelink3,

		'destwitterlink1'=>$destwitterlink1,
		'destwitterlink2'=>$destwitterlink2,
		'destwitterlink3'=>$destwitterlink3

	]);//end setData





	$socialmedia->update();


	SocialMedia::setSuccess("Dados alterados");

	header('Location: /dashboard/social');
	exit;

});//END route




















$app->get( "/dashboard/social", function()
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


	$consort = new Consort();

	$consort->get((int)$user->getiduser());



	$socialmedia = new SocialMedia();

	$socialmedia->get((int)$user->getiduser());


	

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
		
		"socialmedias", 
		
		[
			
			'consort'=>$consort->getValues(),
			'user'=>$user->getValues(),
			'socialmedia'=>$socialmedia->getValues(),
			'validate'=>$validate,
			'success'=>SocialMedia::getSuccess(),
			'error'=>SocialMedia::getError()

		]
	
	);//end setTpl

});//END route
























?>