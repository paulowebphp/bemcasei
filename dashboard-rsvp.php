<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Rsvp;
use Core\Model\RsvpConfig;
use Core\Model\Plan;












$app->get("/dashboard/rsvp/download", function(){

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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	
	Rsvp::generateCsv( (int)$user->getiduser() );

});//END route














$app->get( "/dashboard/rsvp/confirmados", function() 
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$rsvp = new Rsvp();

	if( $search != '' )
	{

		$results = $rsvp->getConfirmedSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $rsvp->getConfirmedPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else
    


	$numConfirmed = $results['nrtotal'];

	$rsvp->setData($results['results']);

	//$maxRsvp = $rsvp->maxRsvp($user->getinplan());

	$pages = [];	
    
	for ( $x=0; $x < $results['pages']; $x++ )
	{ 
		# code...
		array_push(
			
			$pages, 
			
			[

				'href'=>'/dashboard/rsvp?'.http_build_query(
					
					[

						'page'=>$x+1

					]
				
				),

			'text'=>$x+1

			]
		
		);//end array_push

	}//end for





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
		
 
 
		"rsvp-confirmed", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			//'maxRsvp'=>$maxRsvp,
			'numConfirmed'=>$numConfirmed,
			'rsvp'=>$rsvp->getValues(),
			'success'=>Rsvp::getSuccess(),
			'error'=>Rsvp::getError()
			

		]
	
	);//end setTpl
	
});//END route

















$app->get( "/dashboard/rsvp/:hash/deletar", function( $hash ) 
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if






	$idrsvp = Validate::getHash($hash);

	if( $idrsvp == '' )
	{

		Rsvp::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/rsvp');
		exit;

	}//end if







	$rsvp = new Rsvp();

	$rsvp->getRsvp((int)$idrsvp);

	$rsvp->delete();

	header('Location: /dashboard/rsvp');
	exit;
	
});//END route




























$app->get( "/dashboard/rsvp/configurar", function()
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if





	




    $rsvpconfig = new RsvpConfig();
    
    $rsvpconfig->get((int)$user->getiduser());








	$page = new PageDashboard();

	$page->setTpl(
		
 
		"rsvp-config", 
		
		[
			'user'=>$user->getValues(),
			'rsvpconfig'=>$rsvpconfig->getValues(),
			'success'=>RsvpConfig::getSuccess(),
			'error'=>RsvpConfig::getError()
			

		]
	
	);//end setTpl

});//END route













$app->post( "/dashboard/rsvp/configurar", function()
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if








	if( 
		
		!isset($_POST['inclosed']) 
		|| 
		$_POST['inclosed'] === ''
		
	)
	{

		RsvpConfig::setError("Digite o Nome do Convidado");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if

	if( ($inclosed = Validate::validateBoolean($_POST['inclosed'])) === false )
	{	
		
		RsvpConfig::setError("O status da lista deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if




	if( 
		
		!isset($_POST['inadultsconfig']) 
		|| 
		$_POST['inadultsconfig'] === ''
		
	)
	{

		RsvpConfig::setError("Digite o Nome do Convidado");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if

	if( ($inadultsconfig = Validate::validateBoolean($_POST['inadultsconfig'])) === false )
	{	
		
		RsvpConfig::setError("O status da lista deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if







	if(
		
		!isset($_POST['inmaxadultsconfig']) 
		|| 
		$_POST['inmaxadultsconfig'] === ''
		
	)
	{

		RsvpConfig::setError("Digite a Quantidade Máxima de Adultos");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if

	if( ($inmaxadultsconfig = Validate::validateMaxRsvp($_POST['inmaxadultsconfig'])) === false )
	{	
		

		RsvpConfig::setError("A quantidade deve estar entre 0 e 99");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if








	if( 
		
		!isset($_POST['inchildren']) 
		|| 
		$_POST['inchildren'] === ''
		
	)
	{

		RsvpConfig::setError("Informe se permitirá crianças no evento");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if

	if( ($inchildren = Validate::validateBoolean($_POST['inchildren'])) === false )
	{	
		
		RsvpConfig::setError("O status de se será permitido crianças no evento deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header("Location: /dashboard/rsvp/configurar");
		exit;

	}//end if



	$rsvpconfig = new RsvpConfig();

	$rsvpconfig->get((int)$user->getiduser());

	
	/*echo '<pre>';
	var_dump($_POST);
	var_dump($inchildren);
	var_dump($rsvpconfig);
	var_dump((int)$inchildren == 1);
	exit;*/
	

	if (
		
		(int)$inchildren == 1
		&&
		(int)$rsvpconfig->getinchildren() == 1
	
	)
	{

		# code...
		if( 
		
			!isset($_POST['inchildrenconfig']) 
			|| 
			$_POST['inchildrenconfig'] === ''
			
		)
		{
	
			RsvpConfig::setError("Digite o Nome do Convidado");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if
	
		if( ($inchildrenconfig = Validate::validateBoolean($_POST['inchildrenconfig'])) === false )
		{	
			
			RsvpConfig::setError("O status da lista deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if
	
	
	
	
	
	
	
	
		if(
			
			!isset($_POST['inmaxchildrenconfig'])
			|| 
			$_POST['inmaxchildrenconfig'] === ''
			
		)
		{
	
			RsvpConfig::setError("Digite a Quantidade Máxima de Crianças");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if
	
		if( ($inmaxchildrenconfig = Validate::validateMaxRsvp($_POST['inmaxchildrenconfig'])) === false )
		{	
			
	
			RsvpConfig::setError("A quantidade deve estar entre 0 e 99");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if
	
	
	
	
	
	
	
	
	
		if(
			
			!isset($_POST['inchildrenage'])
			|| 
			$_POST['inchildrenage'] === ''
			
		)
		{
	
			RsvpConfig::setError("Digite a idade Máxima Considerado Criança para o Buffet");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if
	
		if( ($inchildrenage = Validate::validateChildrenAge($_POST['inchildrenage'])) === false )
		{	
			
	
			RsvpConfig::setError("A idade deve estar entre 0 e 21");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if




		$desadultstitle = $rsvpconfig->getdesadultstitle();
		$desadultsdescription = $rsvpconfig->getdesadultsdescription();


	}//end if
	elseif(

		(int)$inchildren == 0
		&&
		(int)$rsvpconfig->getinchildren() == 1

	)
	{


		$inchildrenconfig = $rsvpconfig->getinchildrenconfig();
		$inmaxchildrenconfig = $rsvpconfig->getinmaxchildrenconfig();
		$inchildrenage = $rsvpconfig->getinchildrenage();
		$desadultstitle = $rsvpconfig->getdesadultstitle();
		$desadultsdescription = $rsvpconfig->getdesadultsdescription();

	}//end elseif
	elseif(

		(int)$inchildren == 0
		&&
		(int)$rsvpconfig->getinchildren() == 0
	)
	{

		/*if(
			
			!isset($_POST['desadultsdescription'])
			|| 
			$_POST['desadultsdescription'] === ''
			
		)
		{
	
			RsvpConfig::setError("Preencha uma mensagem para os convidados, avisando-os de que não é indicado/permitido levar menores de ".Rule::MIN_ADULTS_AGE." anos de idade");
			header("Location: /dashboard/rsvp/configurar");
			exit;
	
		}//end if*/
		

		
		$desadultstitle = Validate::validateDescription($_POST['desadultstitle'],true);
		$desadultsdescription = Validate::validateDescription($_POST['desadultsdescription'],true);

		$inchildrenconfig = $rsvpconfig->getinchildrenconfig();
		$inmaxchildrenconfig = $rsvpconfig->getinmaxchildrenconfig();
		$inchildrenage = $rsvpconfig->getinchildrenage();


	}//end else
	elseif(

		(int)$inchildren == 1
		&&
		(int)$rsvpconfig->getinchildren() == 0

	)
	{

		

		$inchildrenconfig = $rsvpconfig->getinchildrenconfig();
		$inmaxchildrenconfig = $rsvpconfig->getinmaxchildrenconfig();
		$inchildrenage = $rsvpconfig->getinchildrenage();
		$desadultstitle = $rsvpconfig->getdesadultstitle();
		$desadultsdescription = $rsvpconfig->getdesadultsdescription();

	}//end elseif









	


	$rsvpconfig->setData([

		'idrsvpconfig'=>$_POST['idrsvpconfig'],
		'iduser'=>$user->getiduser(),
		'inclosed'=>$inclosed,
		'inadultsconfig'=>$inadultsconfig,
		'inmaxadultsconfig'=>$inmaxadultsconfig,
		'inchildren'=>$inchildren,
		'inchildrenconfig'=>$inchildrenconfig,
		'inmaxchildrenconfig'=>$inmaxchildrenconfig,
		'inchildrenage'=>$inchildrenage,
		'desadultstitle'=>$desadultstitle,
		'desadultsdescription'=>$desadultsdescription

	]);//setData





	$rsvpconfig->update();



	RsvpConfig::setSuccess("Dados alterados");

	header("Location: /dashboard/rsvp/configurar");
	exit;

	

});//END route























$app->get( "/dashboard/rsvp/adicionar", function()
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
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


	$rsvpconfig = new RsvpConfig();

	$rsvpconfig->get((int)$user->getiduser());

	
	$page = new PageDashboard();

	$page->setTpl(
		
 
 
		"rsvp-create", 
			
		[
			'user'=>$user->getValues(),
			'rsvpconfig'=>$rsvpconfig->getValues(),
			'success'=>Rsvp::getSuccess(),
			'error'=>Rsvp::getError()
			

		]
	
	);//end setTpl

});//END route
























$app->post( "/dashboard/rsvp/adicionar", function()
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if







	if(
		
		!isset($_POST['desguest']) 
		|| 
		$_POST['desguest'] === ''
		
	)
	{

		Rsvp::setError("Preencha nome do Convidado.");
		header('Location: /dashboard/rsvp/adicionar');
		exit;

	}//end if

	if( ( $desguest = Validate::validateStringNumberSpecial($_POST['desguest'], true, false)  ) === false )
	{

		Rsvp::setError("O nome do convidado não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/rsvp/adicionar');
		exit;

	}//end if






	

	if(
		
		!isset($_POST['inmaxadults']) 
		|| 
		$_POST['inmaxadults'] === ''
		
	)
	{

		Rsvp::setError("Preencha quantos convidados adultos no máximo o convidado poderá levar.");
		header('Location: /dashboard/rsvp/adicionar');
		exit;

	}//end if

	if( ($inmaxadults = Validate::validateMaxRsvp($_POST['inmaxadults'])) === false )
	{	
		

		Rsvp::setError("A quantidade deve estar entre 0 e 99");
		header('Location: /dashboard/rsvp/adicionar');
		exit;

	}//end if



	

	



	$rsvpconfig = new RsvpConfig();

	$rsvpconfig->get((int)$user->getiduser());






	if ( (int)$rsvpconfig->getinchildren() == 1 )
	{
		# code...
		if(
		
			!isset($_POST['inmaxchildren']) 
			|| 
			$_POST['inmaxchildren'] === ''
			
		)
		{
	
			Rsvp::setError("Preencha quantas crianças no máximo o convidado poderá levar");
			header('Location: /dashboard/rsvp/adicionar');
			exit;
	
		}//end if
	
		if( ($inmaxchildren = Validate::validateMaxRsvp($_POST['inmaxchildren'])) === false )
		{	
			
	
			Rsvp::setError("A quantidade deve ser entre 0 e 99");
			header('Location: /dashboard/rsvp/adicionar');
			exit;
	
		}//end if


	} else {
		# code...
		

		$inmaxchildren = 0;

	}//end else
	



	








	$rsvp = new Rsvp();

	//$rsvp->get((int)$user->getiduser());

	//$_POST['iduser'] = $user->getiduser();

    $rsvp->setData([

    	'iduser'=>$user->getiduser(),
    	'desguest'=>$desguest,
    	'desemail'=>NULL,
    	'nrphone'=>NULL,
    	'inconfirmed'=>0,
    	'inmaxadults'=>$inmaxadults,
    	'inadultsconfirmed'=>NULL,
    	'inmaxchildren'=>$inmaxchildren,
    	'inchildrenconfirmed'=>NULL,
    	'inchildrenageconfirmed'=>NULL,
    	'desadultsaccompanies'=>NULL,
    	'deschildrenaccompanies'=>NULL,
		'dtconfirmed'=>NULL

    ]);

   
	

    
	# Core colocou $user->save(); Aula 120
	$rsvp->update();

	Rsvp::setSuccess("Convidado criado");

	header('Location: /dashboard/rsvp');
	exit;

});//END route























$app->get( "/dashboard/rsvp/:hash", function( $hash )
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if






	$idrsvp = Validate::getHash($hash);

	if( $idrsvp == '' )
	{

		Rsvp::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/rsvp');
		exit;

	}//end if








    $rsvp = new Rsvp();
    
	$rsvp->getRsvp((int)$idrsvp);
	

	if( (int)$rsvp->getinconfirmed() == 1 )
	{

		Rsvp::setError(Rule::VALIDATE_RSVP_CONFIRMED);
		header('Location: /dashboard/rsvp');
		exit;

	}//end if

    

	$rsvpconfig = new RsvpConfig();

	$rsvpconfig->get((int)$user->getiduser());


	

	$page = new PageDashboard();

	$page->setTpl(
		
 
 
		"rsvp-update", 
		
		[
			'user'=>$user->getValues(),
			'rsvp'=>$rsvp->getValues(),
			'rsvpconfig'=>$rsvpconfig->getValues(),
			'success'=>Rsvp::getSuccess(),
			'error'=>Rsvp::getError()
			

		]
	
	);//end setTpl

});//END route

















$app->post( "/dashboard/rsvp/:hash", function( $hash )
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if


	

	$idrsvp = Validate::getHash($hash);

	if( $idrsvp == '' )
	{

		Rsvp::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/rsvp');
		exit;

	}//end if





	$rsvp = new Rsvp();

	$rsvp->getRsvp((int)$idrsvp);


	if( (int)$rsvp->getinconfirmed() == 1 )
	{

		Rsvp::setError(Rule::VALIDATE_RSVP_CONFIRMED);
		header('Location: /dashboard/rsvp');
		exit;

	}//end if



	





	if(
		
		!isset($_POST['desguest']) 
		|| 
		$_POST['desguest'] === ''
		
	)
	{

		Rsvp::setError("Preencha nome do Convidado.");
		header('Location: /dashboard/rsvp/'.$hash);
		exit;

	}//end if

	if( ( $desguest = Validate::validateStringNumberSpecial($_POST['desguest'], true, false)  ) === false )
	{

		Rsvp::setError("O nome do convidado não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/rsvp/'.$hash);
		exit;

	}//end if






	

	if(
		
		!isset($_POST['inmaxadults']) 
		|| 
		$_POST['inmaxadults'] === ''
		
	)
	{

		Rsvp::setError("Preencha quantos convidados adultos no máximo o convidado poderá levar.");
		header('Location: /dashboard/rsvp/'.$hash);
		exit;

	}//end if

	if( ($inmaxadults = Validate::validateMaxRsvp($_POST['inmaxadults'])) === false )
	{	
		

		Rsvp::setError("A quantidade deve estar entre 0 e 99");
		header('Location: /dashboard/rsvp/'.$hash);
		exit;

	}//end if



	



	$rsvpconfig = new RsvpConfig();

	$rsvpconfig->get((int)$user->getiduser());






	if ( (int)$rsvpconfig->getinchildren() == 1 )
	{

		if(
		
			!isset($_POST['inmaxchildren']) 
			|| 
			$_POST['inmaxchildren'] === ''
			
		)
		{
	
			Rsvp::setError("Preencha quantas crianças no máximo o convidado poderá levar");
			header('Location: /dashboard/rsvp/'.$hash);
			exit;
	
		}//end if
	
		if( ($inmaxchildren = Validate::validateMaxRsvp($_POST['inmaxchildren'])) === false )
		{	
			
	
			Rsvp::setError("A quantidade deve ser entre 0 e 99");
			header('Location: /dashboard/rsvp/'.$hash);
			exit;
	
		}//end if

	}//end if
	else
	{

		$inmaxchildren = $rsvp->getinmaxchildren();

	}//end else



	


	

	

	//$_POST['iduser'] = $user->getiduser();

    $rsvp->setData([

    	'idrsvp'=>$idrsvp,
    	'iduser'=>$user->getiduser(),
    	'desguest'=>$desguest,
    	'desemail'=>NULL,
    	'nrphone'=>NULL,
    	'inconfirmed'=>0,
    	'inmaxadults'=>$inmaxadults,
    	'inadultsconfirmed'=>NULL,
    	'inmaxchildren'=>$inmaxchildren,
    	'inchildrenconfirmed'=>NULL,
    	'inchildrenageconfirmed'=>NULL,
    	'desadultsaccompanies'=>NULL,
    	'deschildrenaccompanies'=>NULL,
		'dtconfirmed'=>NULL
		

    ]);//end setData






	$rsvp->update();

	Rsvp::setSuccess("Dados alterados");

	header('Location: /dashboard/rsvp');
	exit;

});//END route














$app->get( "/dashboard/rsvp", function()
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

	if ( !User::validatePlanDashboard( $user ) )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if

	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$rsvp = new Rsvp();

	if( $search != '' )
	{

		$results = $rsvp->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);



	}//end if
	else
	{
		
		$results = $rsvp->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);


	}//end else
    
    

	$nrtotal = $results['nrtotal'];

	$rsvp->setData($results['results']);

	$maxRsvp = $rsvp->maxRsvp($user->getinplan());

	$pages = [];	
    
	for ( $x=0; $x < $results['pages']; $x++ )
	{ 
		# code...
		array_push(
			
			$pages, 
			
			[

				'href'=>'/dashboard/rsvp?'.http_build_query(
					
					[

						'page'=>$x+1

					]
				
				),

			'text'=>$x+1

			]
		
		);//end array_push

	}//end for



	$rsvpconfig = new RsvpConfig();
    
    $rsvpconfig->get((int)$user->getiduser());


	

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
		
 
 
		"rsvp", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxRsvp'=>$maxRsvp,
			'nrtotal'=>$nrtotal,
			'rsvpconfig'=>$rsvpconfig->getValues(),
			'rsvp'=>$rsvp->getValues(),
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'success'=>Rsvp::getSuccess(),
			'error'=>Rsvp::getError()
			

		]
	
	);//end setTpl

});//END route





?>