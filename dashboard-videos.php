<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Video;
use Core\Model\Plan;







$app->get( "/dashboard/videos/adicionar", function()
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






	$maxVideos = Video::maxVideos($validate['inplancode']);

	$numVideos = Video::getNumVideos((int)$user->getiduser());


	

	if( (int)$numVideos >= (int)$maxVideos )
	{	
		
		Video::setError("Você já atingiu o limite de videos do seu plano atual");
		header('Location: /dashboard/videos');
		exit;

	}//end if

	




	
	$page = new PageDashboard();

	$page->setTpl(
		

 
		"videos-create", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Video::getSuccess(),
			'error'=>Video::getError()
			

		]
	
	);//end setTpl

});//END route


































$app->post( "/dashboard/videos/adicionar", function()
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








	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Video::setError("Preencha o status do sideo");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Video::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if












	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		Video::setError("Preencha a posição do vídeo");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		Video::setError("A posição deve estar entre 1 e 99");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if

















	if(
		
		!isset($_POST['desvideo']) 
		|| 
		$_POST['desvideo'] === ''
		
	)
	{

		Video::setError("Preencha o nome do vídeo");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if

	if( ( $desvideo = Validate::validateStringNumberSpecial($_POST['desvideo'], true, false)  ) === false )
	{	
		

		Video::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if












	if(
		
		!isset($_POST['desurl']) 
		|| 
		$_POST['desurl'] === ''
		
	)
	{

		Video::setError("Preencha o endereço (url) do vídeo");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if


	if( !$desurl = Validate::validateVideoCode($_POST['desurl']) )
	{	
		
		Video::setError("A URL não parece estar num formato válido, tente novamente");
		header('Location: /dashboard/videos/adicionar');
		exit;

	}//end if



	



	$desdescription = Validate::validateDescription($_POST['desdescription'], true);



	



	

	



	$maxVideos = Video::maxVideos($validate['inplancode']);

	$numVideos = Video::getNumVideos((int)$user->getiduser());


	

	if( (int)$numVideos >= (int)$maxVideos )
	{	
		
		Video::setError("Você já atingiu o limite de videos do seu plano atual");
		header('Location: /dashboard/videos');
		exit;

	}//end if





	$video = new Video();


	$video->get((int)$user->getiduser());

	$video->setData([

		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'desvideo'=>$desvideo,
		'desdescription'=>$desdescription,
		'desurl'=>$desurl['desurl'],
		'desvideocode'=>$desurl['desvideocode'],
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

	]);//setData



	$video->update();

	Video::setSuccess("Dados alterados");

	header('Location: /dashboard/videos');
	exit;

});//END route


































$app->get( "/dashboard/videos/:hash/deletar", function( $hash ) 
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






	$idvideo = Validate::getHash($hash);

	if( $idvideo == '' )
	{

		Video::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/videos');
		exit;

	}//end if

	

	$video = new Video();

	$video->getVideo((int)$idvideo);

	$video->delete();

	header('Location: /dashboard/videos');
	exit;
	



});//END route























$app->get( "/dashboard/videos/:hash", function( $hash )
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





	$idvideo = Validate::getHash($hash);

	if( $idvideo == '' )
	{

		Video::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/videos');
		exit;

	}//end if



    $video = new Video();
    
    $video->getVideo((int)$idvideo);
   
	$page = new PageDashboard();

	$page->setTpl(
		

 
		"videos-update", 
		
		[
			'user'=>$user->getValues(),
			'video'=>$video->getValues(),
			'validate'=>$validate,
			'success'=>Video::getSuccess(),
			'error'=>Video::getError()
			

		]
	
	);//end setTpl

});//END route

















$app->post( "/dashboard/videos/:hash", function( $hash )
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

	


	


	$idvideo = Validate::getHash($hash);

	if( $idvideo == '' )
	{

		Video::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/videos');
		exit;

	}//end if







	if(
			
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Video::setError("Preencha o status do sideo");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Video::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if












	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		Video::setError("Preencha a posição do vídeo");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		Video::setError("A posição deve estar entre 1 e 99");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if

















	if(
		
		!isset($_POST['desvideo']) 
		|| 
		$_POST['desvideo'] === ''
		
	)
	{

		Video::setError("Preencha o nome do vídeo");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if

	if( ( $desvideo = Validate::validateStringNumberSpecial($_POST['desvideo'], true, false)  ) === false )
	{	
		

		Video::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if












	if(
		
		!isset($_POST['desurl']) 
		|| 
		$_POST['desurl'] === ''
		
	)
	{

		Video::setError("Preencha o endereço (url) do vídeo");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if


	if( !$desurl = Validate::validateVideoCode($_POST['desurl']) )
	{	
		
		Video::setError("A URL não parece estar num formato válido, tente novamente");
		header('Location: /dashboard/videos/'.$hash);
		exit;

	}//end if






	$desdescription = Validate::validateDescription($_POST['desdescription'], true);





	

	$video = new Video();

	$video->getVideo((int)$idvideo);

	$video->setData([

		'idvideo'=>$video->getidvideo(),
		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'desvideo'=>$desvideo,
		'desdescription'=>$desdescription,
		'desurl'=>$desurl['desurl'],
		'desvideocode'=>$desurl['desvideocode'],
		'desphoto'=>$video->getdesphoto(),
		'desextension'=>$video->getdesextension()

	]);//setData


		

	$video->update();

	Video::setSuccess("Dados alterados");

	header('Location: /dashboard/videos');
	exit;

});//END route



































$app->get( "/dashboard/videos", function()
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

	$video = new Video();

	if( $search != '' )
	{

		$results = $video->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $video->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else
    	

	$nrtotal = $results['nrtotal'];

	$video->setData($results['results']);

	//$maxvideos = $video->maxVideos($user->getinplan());
	$maxVideos = Video::maxVideos($validate['inplancode']);


	


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

					'href'=>'/dashboard/videos?'.http_build_query(
						
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

					'href'=>'/dashboard/videos?'.http_build_query(
						
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
		

 
		"videos", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxvideos'=>$maxVideos,
			'nrtotal'=>$nrtotal,
			'video'=>$video->getValues(),
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'validate'=>$validate,
			'success'=>Video::getSuccess(),
			'error'=>Video::getError()
			

		]
	
	);//end setTpl

});//END route









?>