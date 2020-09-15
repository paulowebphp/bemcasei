<?php

use Core\Maintenance;
//use Core\Rule;
use Core\PageDashboard;
use Core\Model\User;
use Core\Model\Plan;







$app->get( "/dashboard/termos-uso", function()
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



	

	$validate = User::validatePlanDashboard( $user );


	



	$plans = Plan::getPlansFullArray();


	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"terms", 
			
		[
			'user'=>$user->getValues(),
			'plans'=>$plans,
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route

















$app->get( "/dashboard/termos-lista", function()
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


	 

	$validate = User::validatePlanDashboard( $user );



	





	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"terms-list", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route




















$app->get( "/dashboard/politica-privacidade", function()
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




	$validate = User::validatePlanDashboard( $user );


	





	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"privacy", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route








?>