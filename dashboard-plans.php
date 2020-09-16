<?php

use Core\Maintenance;
use Core\PageDashboard;
//use Core\Photo;
//use Core\Rule;
//use Core\Wirecard;
use Core\Model\User;
use Core\Model\Plan;
use Core\Model\Payment;
//use Core\Model\Address;
//use Core\Model\Customer;
//use Core\Model\OrderPlan;







$app->get( "/dashboard/meu-plano", function()
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


	//$validate = User::validatePlanDashboard( $user );
	$validate = User::validatePlanDashboard( $user );


	/*
	echo '<pre>';
	var_dump($user);
	echo '************************************************************<br><br><br>';
	var_dump($validate);
	exit;
	*/
	

	$plan = new Plan();


	   
	//$regular_plan = $plan->getRegularPlan((int)$user->getiduser());

	

	//$results = $plan->getWithLimit((int)$user->getiduser(),(int)$user->getinplan());
	
	//$free_plan = $plan->getFreePlan((int)$user->getiduser());
	
	//$numplans = $results['nrtotal'];

	//if(isset($free_plan['results'])) $free_plan = $free_plan['results'];

	$plan_handler = $plan->get((int)$user->getiduser());

	$planArray = $plan_handler['results'];
	
	$nrtotal = $plan_handler['nrtotal'];
	
	


	/*
	echo '<pre>';
	var_dump($validate);
	echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>';
	var_dump($planArray);
	echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>';
	var_dump($nrtotal);
	exit;
	*/

	
	




	
	

	$page = new PageDashboard();

	$page->setTpl(
		
		"plans", 
		
		[
			'user'=>$user->getValues(),
			//'regular_plan'=>$regular_plan['results'],
			'planArray'=>$planArray,
			'nrtotal'=>$nrtotal,
			//'free_plan'=>$free_plan,
			'validate'=>$validate,
			'error'=>Payment::getError(),
			'success'=>Payment::getSuccess()
			

		]
	
	);//end setTpl

});//END route





?>