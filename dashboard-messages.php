<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Message;
//use Core\Model\Plan;






$app->get( "/dashboard/mensagens/:hash/aprovar", function( $hash )
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


	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	$idmessage = Validate::getHash($hash);

	if( $idmessage == '' )
	{

		Message::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/mensagens');
		exit;

	}//end if






    $message = new Message();
    
    $message->getMessage((int)$idmessage);




    $message->aproveMessage();

	header("Location: /dashboard/mensagens");
	exit;
   
	/*$page = new PageDashboard();

	$page->setTpl(
		
		"messages-update", 
		
		[

			'message'=>$message->getValues(),
			'success'=>Message::getSuccess(),
			'error'=>Message::getError()
			

		]
	
	);//end setTpl*/

});//END route
























$app->get( "/dashboard/mensagens/:hash/moderar", function( $hash )
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


	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	$idmessage = Validate::getHash($hash);

	if( $idmessage == '' )
	{

		Message::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/mensagens');
		exit;

	}//end if




    $message = new Message();
    
    $message->getMessage((int)$idmessage);

    $message->moderateMessage();

	header("Location: /dashboard/mensagens");
	exit;
   
	/*$page = new PageDashboard();

	$page->setTpl(
		
		"messages-update", 
		
		[

			'message'=>$message->getValues(),
			'success'=>Message::getSuccess(),
			'error'=>Message::getError()
			

		]
	
	);//end setTpl*/

});//END route



























$app->get( "/dashboard/mensagens/:hash/deletar", function( $hash ) 
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



	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	$idmessage = Validate::getHash($hash);

	if( $idmessage == '' )
	{

		Message::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/mensagens');
		exit;

	}//end if





	$message = new Message();

	$message->getMessage((int)$idmessage);

	$message->delete();

	header('Location: /dashboard/mensagens');
	exit;
	
});//END route

































$app->get( "/dashboard/mensagens", function()
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


	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	

	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

	

	$message = new Message();

	if( $search != '' )
	{

		$results = $message->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $message->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else
        
    


	$nrtotal = $results['nrtotal'];

	$message->setData($results['results']);

	//$maxMessages = $message->maxMessages($user->getinplan());

	$pages = [];	
    
	




	if ( $search == '' )
	{
		# code...
		for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/dashboard/mensagens?'.http_build_query(
						
						[

							'pagina'=>$x+1

						]
					
					),

				'text'=>$x+1

				]
			
			);//end array_push

		}//end for

	}//end if
	else
	{

		for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/dashboard/mensagens?'.http_build_query(
						
						[

							'buscar'=>$search,
							'pagina'=>$x+1

						]
					
					),

					'text'=>$x+1

				]
			
			);//end array_push

		}//end for

	}//end else





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
		


		"messages", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'validate'=>$validate,
			//'maxMessages'=>$maxMessages,
			'nrtotal'=>$nrtotal,
			'message'=>$message->getValues(),
			'success'=>Message::getSuccess(),
			'error'=>Message::getError()
			

		]
	
	);//end setTpl

});//END route





?>