<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\OuterList;
//use Core\Model\Plan;







$app->get( "/dashboard/listas-de-fora/adicionar", function()
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


	$maxOuterLists = OuterList::maxOuterLists($validate['inplancode']);


	//pode ser substituído pelo get(), getPage() ou getSearch()
	$numOuterLists = OuterList::getNumOuterLists((int)$user->getiduser());


	

	if( (int)$numOuterLists >= (int)$maxOuterLists )
	{	
		
		User::setError("Você já atingiu o limite de listas de fora do seu plano atual");
		header('Location: /dashboard');
		exit;

	}//end if



    /**$Event = new Event();
    
	$Event->get((int)$user->getiduser());

	$Event->setData(); */



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
		
 
 
		"outerlists-create", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>OuterList::getSuccess(),
			'error'=>OuterList::getError()
			

		]
	
	);//end setTpl

});//END route


























$app->post( "/dashboard/listas-de-fora/adicionar", function()
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



	$maxOuterLists = OuterList::maxOuterLists($validate['inplancode']);


	//pode ser substituído pelo get(), getPage() ou getSearch()
	$numOuterLists = OuterList::getNumOuterLists((int)$user->getiduser());


	

	if( (int)$numOuterLists >= (int)$maxOuterLists )
	{	
		
		User::setError("Você já atingiu o limite de listas de fora do seu plano atual");
		header('Location: /dashboard');
		exit;

	}//end if






	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		OuterList::setError("Preencha o Status da Lista");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		OuterList::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if








	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		OuterList::setError("Preencha a posição da Lista");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		OuterList::setError("A posição deve estar entre 0 e 99");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if









	if(
		
		!isset($_POST['desouterlist']) 
		|| 
		$_POST['desouterlist'] === ''
		
	)
	{

		OuterList::setError("Preencha o título da Lista");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if


	if( ( $desouterlist = Validate::validateStringNumberSpecial($_POST['desouterlist'], true, false)  ) === false )
	{	
		

		OuterList::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if	












	if(
			
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		OuterList::setError("Preencha o telefone da Lista");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if

	if( !$nrphone = Validate::validateLongPhone($_POST['nrphone']) )
	{	
		
		OuterList::setError("O telefone não pode ser formado apenas com caracteres especiais e deve ter de 8 a 9 caracteres, tente novamente");
		header('Location: /dashboard/listas-de-fora/adicionar');;
		exit;

	}//end if



















	if(
		
		!isset($_POST['dessite']) 
		|| 
		$_POST['dessite'] === ''
		
	)
	{

		OuterList::setError("Preencha o Site da Lista");
		header('Location: /dashboard/listas-de-fora/adicionar');
		exit;

	}//end if

	if( !$dessite = Validate::validateURL($_POST['dessite']) )
	{	
		
		OuterList::setError("A URL não parece estar num formato válido, tente novamente");
		header('Location: /dashboard/listas-de-fora/adicionar');;
		exit;

	}//end if










	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	$deslocation = Validate::validateStringWithAccent($_POST['deslocation'], true);





	
	

	$outerlist = new OuterList();

	//$outerlist->get((int)$user->getiduser());





	$outerlist->setData([

		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'desouterlist'=>$desouterlist,
		'desdescription'=>$desdescription,
		'dessite'=>$dessite,
		'deslocation'=>$deslocation,
		'nrphone'=>$nrphone
		
	]);//setData




	$outerlist->update();

	OuterList::setSuccess("Dados alterados");

	header('Location: /dashboard/listas-de-fora');
	exit;

});//END route






















$app->get( "/dashboard/listas-de-fora/:hash/deletar", function( $hash ) 
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


	$idouterlist = Validate::getHash($hash);

	if( $idouterlist == '' )
	{

		OuterList::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/listas-de-fora');
		exit;

	}//end if




	$outerlist = new OuterList();

	$outerlist->getOuterList((int)$idouterlist);

	$outerlist->delete();

	header('Location: /dashboard/listas-de-fora');
	exit;
	
});//END route











$app->get( "/dashboard/listas-de-fora/:hash", function( $hash )
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



	$idouterlist = Validate::getHash($hash);

	if( $idouterlist == '' )
	{

		OuterList::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/listas-de-fora');
		exit;

	}//end if





    $outerlist = new OuterList();
    
    $outerlist->getOuterList((int)$idouterlist);




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
		
 
 
		"outerlists-update", 
		
		[
			'user'=>$user->getValues(),
			'outerlist'=>$outerlist->getValues(),
			'validate'=>$validate,
			'success'=>OuterList::getSuccess(),
			'error'=>OuterList::getError()
			

		]
	
	);//end setTpl

});//END route























$app->post( "/dashboard/listas-de-fora/:hash", function( $hash )
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



	$idouterlist = Validate::getHash($hash);

	if( $idouterlist == '' )
	{

		OuterList::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/listas-de-fora');
		exit;

	}//end if



	





	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		OuterList::setError("Preencha o Status da Lista");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		OuterList::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if








	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		OuterList::setError("Preencha a posição da Lista");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		OuterList::setError("A posição deve estar entre 0 e 99");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if









	if(
		
		!isset($_POST['desouterlist']) 
		|| 
		$_POST['desouterlist'] === ''
		
	)
	{

		OuterList::setError("Preencha o título da Lista");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if


	if( ( $desouterlist = Validate::validateStringNumberSpecial($_POST['desouterlist'], true, false)  ) === false )
	{	
		

		OuterList::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if	












	if(
			
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		OuterList::setError("Preencha o telefone da Lista");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if

	if( !$nrphone = Validate::validateLongPhone($_POST['nrphone']) )
	{	
		
		OuterList::setError("O telefone não pode ser formado apenas com caracteres especiais e deve ter de 8 a 9 caracteres, tente novamente");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if



















	if(
		
		!isset($_POST['dessite']) 
		|| 
		$_POST['dessite'] === ''
		
	)
	{

		OuterList::setError("Preencha o Site da Lista");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if

	if( !$dessite = Validate::validateURL($_POST['dessite']) )
	{	
		
		OuterList::setError("A URL não parece estar num formato válido, tente novamente");
		header('Location: /dashboard/listas-de-fora/'.$hash);
		exit;

	}//end if










	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	$deslocation = Validate::validateStringWithAccent($_POST['deslocation'], true);






	$user = User::getFromSession();

	$outerlist = new OuterList();

	$outerlist->getOuterList((int)$idouterlist);



	$outerlist->setData([

		'idouterlist'=>$outerlist->getidouterlist(),
		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'desouterlist'=>$desouterlist,
		'desdescription'=>$desdescription,
		'dessite'=>$dessite,
		'deslocation'=>$deslocation,
		'nrphone'=>$nrphone
		
	]);//setData

	

	# Core colocou $user->save(); Aula 120
	$outerlist->update();

	OuterList::setSuccess("Dados alterados");

	header('Location: /dashboard/listas-de-fora');
	exit;

});//END route


























$app->get( "/dashboard/listas-de-fora", function()
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

	$outerlist = new OuterList();

	if( $search != '' )
	{

		$results = $outerlist->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $outerlist->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else


    	

	$nrtotal = $results['nrtotal'];

	$outerlist->setData($results['results']);

	$maxouterlists = OuterList::maxOuterLists($user->getinplan());

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

					'href'=>'/dashboard/listas-de-fora?'.http_build_query(
						
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

					'href'=>'/dashboard/listas-de-fora?'.http_build_query(
						
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
		
 
 
		"outerlists", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxouterlists'=>$maxouterlists,
			'nrtotal'=>$nrtotal,
			'outerlist'=>$outerlist->getValues(),
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'validate'=>$validate,
			'success'=>OuterList::getSuccess(),
			'error'=>OuterList::getError()
			

		]
	
	);//end setTpl

});//END route









?>