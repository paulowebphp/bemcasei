<?php

use Core\PagePanel;
use Core\Maintenance;
use Core\Rule;
use Core\Model\Lead;














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