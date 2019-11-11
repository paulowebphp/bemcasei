<?php

use Core\Maintenance;
use Core\Rule;
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



	$plans = Plan::getPlansFullArray();


	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"terms", 
			
		[
			'user'=>$user->getValues(),
			'plans'=>$plans,
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
		
 

		"terms-list", 
			
		[
			'user'=>$user->getValues(),
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
		
 

		"privacy", 
			
		[
			'user'=>$user->getValues(),
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route








?>