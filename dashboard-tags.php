<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Model\User;
use Core\Model\Tag;
use Core\Model\Plan;









$app->get( "/dashboard/tags-papelaria", function() 
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





	$tag = new Tag();

	$tag->getTags();



	

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


	if ( (int)$user->getinplancontext() > 0 )
	{
		# code...
		$page = new PageDashboard();
	
		$page->setTpl(
			

			"tags", 
			
			[
				'user'=>$user->getValues(),
				'tag'=>$tag->getValues(),
				'validate'=>$validate,
				'success'=>Tag::getSuccess(),
				'error'=>Tag::getError()

			]
		
		);//end setTpl


	}//end if
	else
	{


		$page = new PageDashboard();
	
		$page->setTpl(
			

			"tags-free",
			
			[
				'user'=>$user->getValues(),
				'tag'=>$tag->getValues(),
				'validate'=>$validate,
				'success'=>Tag::getSuccess(),
				'error'=>Tag::getError()

			]
		
		);//end setTpl


	}//end else


	
	
});//END route












?>