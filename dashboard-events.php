<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Photo;
use Core\Validate;
use Core\Model\User;
use Core\Model\Event;
use Core\Model\Address;
//use Core\Model\Plan;











$app->get( "/dashboard/eventos/adicionar", function()
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


	

    /**$Event = new Event();
    
	$Event->get((int)$user->getiduser());

	$Event->setData(); */





	$maxEvents = Event::maxEvents($validate['inplancode']);


	//pode ser substituído pelo get(), getPage() ou getSearch()
	$numEvents = Event::getNumEvents((int)$user->getiduser());


	

	if( (int)$numEvents >= (int)$maxEvents )
	{	
		
		User::setError("Você já atingiu o limite de eventos do seu plano atual");
		header('Location: /dashboard');
		exit;

	}//end if






	
	$page = new PageDashboard();

	$page->setTpl(
		
 

		"events-create", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Event::getSuccess(),
			'error'=>Event::getError()
			

		]
	
	);//end setTpl

});//END route
























$app->post( "/dashboard/eventos/adicionar", function()
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


	



	$maxEvents = Event::maxEvents($validate['inplancode']);


	//pode ser substituído pelo get(), getPage() ou getSearch()
	$numEvents = Event::getNumEvents((int)$user->getiduser());


	

	if( (int)$numEvents >= (int)$maxEvents )
	{	
		
		User::setError("Você já atingiu o limite de eventos do seu plano atual");
		header('Location: /dashboard');
		exit;

	}//end if




	
	



	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Event::setError("Preencha o status do evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if


	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Event::setError("O status da lista deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if







		if(
		
		!isset($_POST['dtevent']) 
		|| 
		$_POST['dtevent'] === ''
		
	)
	{

		Event::setError("Preencha a data do evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( !$dtevent = Validate::validateDate($_POST['dtevent'], 1) )
	{

		Event::setError("Informe uma data válida");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if










	if(
		
		!isset($_POST['tmevent']) 
		|| 
		$_POST['tmevent'] === ''
		
	){

		Event::setError("Insira o horário do evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( !$tmevent = Validate::validateTime($_POST['tmevent']) )
	{	
		

		Event::setError("Informe uma hora válida");
		header('Location: /dashboard/eventos/adicionar');;
		exit;

	}//end if














	if(
		
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		Event::setError("Preencha o telefone do evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if


	if( !$nrphone = Validate::validateLongPhone($_POST['nrphone']) )
	{

		Event::setError("Informe um telefone ou celular válido");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if






















	if(
		
		!isset($_POST['desevent']) 
		|| 
		$_POST['desevent'] === ''
		
	)
	{

		Event::setError("Preencha o nome do Evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( ( $desevent = Validate::validateStringNumberSpecial($_POST['desevent'], true, false)  ) === false )
	{

		Event::setError("O nome do evento não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if


























	if(
		
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Event::setError("Preencha o Local do Evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'], true, false)  ) === false )
	{

		Event::setError("O seu endereço não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if







	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Event::setError("Preencha o Local do Evento");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Event::setError("Informe o seu nome apenas com números");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if






	if(
		
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Event::setError("Preencha a cidade");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( ( $descity = Validate::validateString($_POST['descity'], true, false)  ) === false )
	{

		Event::setError("A cidade não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if












	if(
		
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Event::setError("Preencha o estado");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if

	if( ( $desstate = Validate::validateString($_POST['desstate'], true, false)  ) === false )
	{

		Event::setError("O estado não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if



	
	






	if( $_FILES["file"]["error"] === '' )
	{
		Event::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if






	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Event::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/eventos/adicionar');
		exit;

	}//end if











	$descountry = Validate::validateString($_POST['descountry'], true,true);
	$desdistrict = Validate::validateStringNumber($_POST['desdistrict'], true,true);

	$desdirections = Validate::validateDescription($_POST['desdirections'], true);
	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	



	
	

	$event = new Event();


	//$_POST['iduser'] = $user->getiduser();
	//$_POST['descountry'] = Rule::DESCOUNTRY;
	//$_POST['nrcountryarea'] = Rule::NR_COUNTRY_AREA;
	//$_POST['nrddd'] = $_POST['nrddd'];
	//$_POST['nrphone'] = (int)$_POST['nrphone'];
	//$_POST['desphoto'] = '0.jpg';
	//$_POST['desextension'] = 'jpg';
	


	$event->setData([


		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'dtevent'=>$dtevent,
		'tmevent'=>$tmevent,
		'nrphone'=>$nrphone,
		'desevent'=>$desevent,
		'desdescription'=>$desdescription,
		'desdirections'=>$desdirections,
		'desaddress'=>$desaddress,
		'desnumber'=>$desnumber,
		'desdistrict'=>$desdistrict,
		'descity'=>$descity,
		'desstate'=>$desstate,
		'descountry'=>$descountry,
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

	]);//setData

		

	
	$event->update();



	if( $_FILES["file"]["name"] === "" )
	{


		//$event->setdesphoto(Rule::DEFAULT_PHOTO);
		//$event->setdesextension(Rule::DEFAULT_PHOTO_EXTENSION);

		//$event->update();

		Event::setSuccess("Item criado com sucesso | Adicione uma imagem depois clicando em Editar");

		header('Location: /dashboard/eventos');
		exit;

	}//end if
	else
	{
		
		$photo = new Photo();

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$event->getiduser(),
			Rule::CODE_EVENTS,
			$event->getidevent(),
			2
			
			
		);//end setPhoto
		
		if( $basename['basename'] === false )
		{
	
			$event->delete();

			Event::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");

			header('Location: /dashboard/eventos/adicionar');
			exit;

		}//end if
		else
		{

			$event->setdesphoto($basename['basename']);
			$event->setdesextension($basename['extension']);
	
			$event->update();

			Event::setSuccess("Item criado");

			header('Location: /dashboard/eventos');
			exit;

		}//end else
			

	}//end else





});//END route




















$app->get( "/dashboard/eventos/:hash/deletar", function( $hash ) 
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



	





	$idevent = Validate::getHash($hash);

	if( $idevent == '' )
	{

		Event::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/eventos');
		exit;

	}//end if



	

	$event = new Event();
	

	$event->getEvent((int)$idevent);

	$event->delete();

	header('Location: /dashboard/eventos');
	exit;
	
});//END route
















$app->get( "/dashboard/eventos/:hash", function( $hash )
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

	



	$idevent = Validate::getHash($hash);

	if( $idevent == '' )
	{

		Event::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/eventos');
		exit;

	}//end if




    $event = new Event();
    
    $event->getEvent((int)$idevent);

    $state = Address::listAllStates();

	$city = Address::listAllCitiesByState((int)$event->getidstate());





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
		
 

		"events-update", 
		
		[
			'state'=>$state,
			'city'=>$city,
			'user'=>$user->getValues(),
			'event'=>$event->getValues(),
			'validate'=>$validate,
			'success'=>Event::getSuccess(),
			'error'=>Event::getError()
			

		]
	
	);//end setTpl

});//END route




















$app->post( "/dashboard/eventos/:hash", function( $hash )
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


	


	$idevent = Validate::getHash($hash);

	if( $idevent == '' )
	{

		Event::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/eventos');
		exit;

	}//end if


	



	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Event::setError("Preencha o status do evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if


	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Event::setError("O status da lista deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if








		if(
		
		!isset($_POST['dtevent']) 
		|| 
		$_POST['dtevent'] === ''
		
	)
	{

		Event::setError("Preencha a data do evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( !$dtevent = Validate::validateDate($_POST['dtevent'], 1) )
	{

		Event::setError("Informe uma data válida");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if










	if(
		
		!isset($_POST['tmevent']) 
		|| 
		$_POST['tmevent'] === ''
		
	){

		Event::setError("Insira o horário do evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( !$tmevent = Validate::validateTime($_POST['tmevent']) )
	{	
		

		Event::setError("Informe uma hora válida");
		header('Location: /dashboard/eventos/'.$hash);;
		exit;

	}//end if














	if(
		
		!isset($_POST['nrphone']) 
		|| 
		$_POST['nrphone'] === ''
		
	)
	{

		Event::setError("Preencha o telefone do evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if


	if( !$nrphone = Validate::validateLongPhone($_POST['nrphone']) )
	{

		Event::setError("Informe um telefone ou celular válido");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if






















	if(
		
		!isset($_POST['desevent']) 
		|| 
		$_POST['desevent'] === ''
		
	)
	{

		Event::setError("Preencha o nome do Evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( ( $desevent = Validate::validateStringNumberSpecial($_POST['desevent'], true, false)  ) === false )
	{

		Event::setError("O nome do evento não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if


























	if(
		
		!isset($_POST['desaddress']) 
		|| 
		$_POST['desaddress'] === ''
		
	)
	{

		Event::setError("Preencha o Local do Evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress'], true, false) ) === false )
	{

		Event::setError("O seu endereço não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if







	if(
		
		!isset($_POST['desnumber']) 
		|| 
		$_POST['desnumber'] === ''
		
	)
	{

		Event::setError("Preencha o Local do Evento");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
	{

		Event::setError("Informe o seu nome apenas com números");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if






	if(
		
		!isset($_POST['descity']) 
		|| 
		$_POST['descity'] === ''
		
	)
	{

		Event::setError("Preencha a cidade");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( ( $descity = Validate::validateString($_POST['descity'], true, false) ) === false )
	{

		Event::setError("A cidade não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if












	if(
		
		!isset($_POST['desstate']) 
		|| 
		$_POST['desstate'] === ''
		
	)
	{

		Event::setError("Preencha o estado");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if

	if( ( $desstate = Validate::validateString($_POST['desstate'], true, false) ) === false )
	{

		Event::setError("O estado não deve conter apenas caracteres especiais, nem pode ser vazio, tente novamente");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if











	if( $_FILES["file"]["error"] === '' )
	{
		Event::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if




	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Event::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/eventos/'.$hash);
		exit;

	}//end if




	$descountry = Validate::validateString($_POST['descountry'], true, true);
	$desdistrict = Validate::validateStringNumber($_POST['desdistrict'], true, true);


	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	$desdirections = Validate::validateDescription($_POST['desdirections'], true);


	


	




	$event = new Event();

	$event->getEvent((int)$idevent);

	



	$event->setData([

		'idevent'=>$event->getidevent(),
		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'dtevent'=>$dtevent,
		'tmevent'=>$tmevent,
		'nrphone'=>$nrphone,
		'desevent'=>$desevent,
		'desdescription'=>$desdescription,
		'desdirections'=>$desdirections,
		'desaddress'=>$desaddress,
		'desnumber'=>$desnumber,
		'desdistrict'=>$desdistrict,
		'descity'=>$descity,
		'desstate'=>$desstate,
		'descountry'=>$descountry,
		'desphoto'=>$event->getdesphoto(),
		'desextension'=>$event->getdesextension()

	]);//setData







	$event->update();






	if( $_FILES["file"]["name"] !== "" )
	{

		$photo = new Photo();

		if( $event->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($event->getdesphoto(), Rule::CODE_EVENTS);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$event->getiduser(),
			Rule::CODE_EVENTS,
			$event->getidevent(),
			2
			
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			Event::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/eventos/'.$hash);
			exit;

		}//end if
		else
		{
			
	
			$event->setdesphoto($basename['basename']);
			$event->setdesextension($basename['extension']);
	
			$event->update();

		}//end else

	}//end if





	Event::setSuccess("Item alterado");

	header('Location: /dashboard/eventos');
	exit;

});//END route






















$app->get( "/dashboard/eventos", function()
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


	

	

	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

	$event = new Event();


	

	if( $search != '' )
	{

		$results = $event->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $event->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else
    	

	

	$nrtotal = $results['nrtotal'];

	$event->setData($results['results']);

	$maxEvents = Event::maxEvents($user->getinplan());

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

					'href'=>'/dashboard/eventos?'.http_build_query(
						
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

					'href'=>'/dashboard/eventos?'.http_build_query(
						
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





	

	$page = new PageDashboard();

	$page->setTpl(
		
 

		"events", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxEvents'=>$maxEvents,
			'nrtotal'=>$nrtotal,
			'event'=>$event->getValues(),
			'validate'=>$validate,
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'success'=>Event::getSuccess(),
			'error'=>Event::getError()
			

		]
	
	);//end setTpl

});//END route














?>