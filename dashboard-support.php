<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Model\User;
use Core\Model\Plan;







$app->get( "/dashboard/central-ajuda", function()
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
		
 

		"support", 
			
		[
			
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route













?>