<?php

use Core\Maintenance;
use Core\Rule;
use Core\PageDashboard;
use Core\Model\User;
use Core\Model\Tag;
//use Core\Model\Plan;









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


	

	if ( ( $validate = User::validatePlanDashboard( $user ) ) === false )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if


	


	$tag = new Tag();

	$tag->getTags();



	

	if($validate)
	{	




		if ( (int)$validate['incontext'] > 0 )
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


	}//end if
	else
	{


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



	}//end if


	


	
	
});//END route












?>