<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Model\User;
//use Core\Model\Plan;







$app->get( "/dashboard/guia-de-casamento/noivado", function()
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






	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if





	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-engagement", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route












$app->get( "/dashboard/guia-de-casamento/padrinhos-madrinhas", function()
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

	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if





	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-bestfriends", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route


























$app->get( "/dashboard/guia-de-casamento/planejamento", function()
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

	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if





	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-planning", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route






















$app->get( "/dashboard/guia-de-casamento/eventos", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if




	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-events", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route





















$app->get( "/dashboard/guia-de-casamento/listas", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if




	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-lists", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route































$app->get( "/dashboard/guia-de-casamento/cerimonial", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if




	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-cerimonial", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route
























$app->get( "/dashboard/guia-de-casamento/buffet", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if



	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-buffet", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route



































$app->get( "/dashboard/guia-de-casamento/roupa", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if



	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-dressup", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route



















$app->get( "/dashboard/guia-de-casamento/fotos", function()
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


	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if






	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-album", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route





























$app->get( "/dashboard/guia-de-casamento/ensaios", function()
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

	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if






	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-assays", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route
























$app->get( "/dashboard/guia-de-casamento/lua-de-mel", function()
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

	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			User::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard');
			exit;

		}//end if


	}//end if


	



	



	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"guide-honey-moon", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>User::getSuccess(),
			'error'=>User::getError()
			

		]
	
	);//end setTpl

});//END route









?>