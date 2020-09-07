<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Photo;
use Core\Model\User;
use Core\Model\Album;
//use Core\Model\Plan;





$app->get( "/dashboard/album/adicionar", function()
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

    /**$album = new Event();
    
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
		


		"albuns-create", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Album::getSuccess(),
			'error'=>Album::getError()
			

		]
	
	);//end setTpl

});//END route



























$app->post( "/dashboard/album/adicionar", function()
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



	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Album::setError("Preencha o Status da Imagem.");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Album::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if








	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		Album::setError("Preencha a posição da Imagem.");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		Album::setError("A posição deve estar entre 0 e 99");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if










	if(
		
		!isset($_POST['desalbum']) 
		|| 
		$_POST['desalbum'] === ''
		
	)
	{

		Album::setError("Preencha o nome da Imagem.");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if

	if( ( $desalbum = Validate::validateStringNumberSpecial($_POST['desalbum'], true, false) ) === false )
	{	
		

		Album::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if


























	if( $_FILES["file"]["error"] === '' )
	{
		Album::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if

	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Album::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/album/adicionar');
		exit;

	}//end if



	$userSizeTotal = Album::getSizeTotal((int)$user->getiduser());

	//$maxSizeTotal = Album::maxSizeTotal($user->getinplancontext());
	$maxSizeTotal = Album::maxSizeTotal($validate['inplancode']);


	


	if ( ((float)$_FILES["file"]["size"] + (float)$userSizeTotal['sizetotal']) > (float)$maxSizeTotal ) 
	{
		
		$sizetotal = ($userSizeTotal['sizetotal']/1000000);
		$sizetotal = number_format($sizetotal, 2, ",",".");

		$sizetotalKilobytes = number_format($userSizeTotal['sizetotal'],0, ",",".");

		$maxSizeTotal = ($maxSizeTotal/1000000);
		$maxSizeTotal = number_format($maxSizeTotal, 0);

		if( (int)$validate['inplancode'] == 3 )
		{

			Album::setError("Você está utilizando ".$sizetotal." MB (".$sizetotalKilobytes." KB). No momento temos ".$maxSizeTotal." MB disponíveis | Parece que o nosso servidor está muito cheio nos últimos dias e por isso não conseguimos fazer o upload da sua imagem | Tente novamente daqui a alguns instantes, se a falha persistir, por favor, entre em contato com nosso suporte para liberarmos espaço para você");
			header('Location: /dashboard/album/adicionar');
			exit;

		}//end if
		else
		{

			Album::setError("Esta imagem faz ultrapassar o seu limite máximo de espaço permitido | Você está utilizando ".$sizetotal." MB (".$sizetotalKilobytes." KB) de ".$maxSizeTotal." MB permitidos | Tente novamente com outra imagem menor ou faça um upgrade de plano para adquirir mais espaço");
			header('Location: /dashboard/album/adicionar');
			exit;

		}//end else

		


	}//end if





	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	//$descategory = Validate::validateStringWithAccent($_POST['descategory'], true);




	
	




	

	$album = new Album();

	

	$album->setData([

		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'inphotosize'=>Rule::DEFAULT_PHOTO_SIZE,
		'desalbum'=>$desalbum,
		'desdescription'=>$desdescription,
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

	]);//setData
	


	$album->update();


	if( $_FILES["file"]["name"] === "" )
	{

		//$album->setinphotosize(Rule::DEFAULT_PHOTO_SIZE);
		//$album->setdesphoto(Rule::DEFAULT_PHOTO);
		//$album->setdesextension(Rule::DEFAULT_PHOTO_EXTENSION);


		//$album->update();

		Album::setSuccess("Item criado com sucesso | Adicione uma imagem depois clicando em Editar");

		header('Location: /dashboard/album');
		exit;

	}//end if
	else
	{
		
		$photo = new Photo();

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$album->getiduser(),
			Rule::CODE_ALBUNS,
			$album->getidalbum(),
			0
			
			
		);//end setPhoto
		
		if( $basename['basename'] === false )
		{
	
			$album->delete();

			Album::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");


			//$album->setinphotosize(Rule::DEFAULT_PHOTO_SIZE);
			//$album->update();


			header('Location: /dashboard/album/adicionar');
			exit;

		}//end if
		else
		{

			$album->setdesphoto($basename['basename']);
			$album->setdesextension($basename['extension']);
			$album->setinphotosize($_FILES["file"]["size"]);

			
			$album->update();

			

		}//end else

	}//end else



	Album::setSuccess("Item criado");

	header('Location: /dashboard/album');
	exit;



});//END route





















$app->get( "/dashboard/album/:hash/deletar", function( $hash ) 
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


	$idalbum = Validate::getHash($hash);

	if( $idalbum == '' )
	{

		Album::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/album');
		exit;

	}//end if

	

	$album = new Album();

	$album->getAlbum((int)$idalbum);

	$album->delete();

	header('Location: /dashboard/album');
	exit;
	
});//END route





























$app->get( "/dashboard/album/:hash", function( $hash )
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

	$idalbum = Validate::getHash($hash);

	if( $idalbum == '' )
	{

		Album::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/album');
		exit;

	}//end if




    $album = new Album();
    
    $album->getAlbum((int)$idalbum);



    


   
	$page = new PageDashboard();

	$page->setTpl(
		


		"albuns-update", 
		
		[
			'user'=>$user->getValues(),
			'album'=>$album->getValues(),
			'validate'=>$validate,
			'success'=>Album::getSuccess(),
			'error'=>Album::getError()
			

		]
	
	);//end setTpl

});//END route




















$app->post( "/dashboard/album/:hash", function( $hash )
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






	$idalbum = Validate::getHash($hash);

	if( $idalbum == '' )
	{

		Album::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/album');
		exit;

	}//end if



	if(
		
		!isset($_POST['instatus']) 
		|| 
		$_POST['instatus'] === ''
		
	)
	{

		Album::setError("Preencha o Status da Imagem.");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if

	if( ($instatus = Validate::validateBoolean($_POST['instatus'])) === false )
	{	
		
		Album::setError("O status deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if








	if(
		
		!isset($_POST['inposition']) 
		|| 
		$_POST['inposition'] === ''
		
	)
	{

		Album::setError("Preencha a posição da Imagem.");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if

	if( ($inposition = Validate::validatePosition($_POST['inposition'])) === false )
	{	
		

		Album::setError("A posição deve estar entre 0 e 99");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if










	if(
		
		!isset($_POST['desalbum']) 
		|| 
		$_POST['desalbum'] === ''
		
	)
	{

		Album::setError("Preencha o nome da Imagem.");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if

	if( ( $desalbum = Validate::validateStringNumberSpecial($_POST['desalbum'], true, false) ) === false )
	{	
		

		Album::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if







	if( $_FILES["file"]["error"] === '' )
	{
		Album::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if

	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Album::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/album/'.$hash);
		exit;

	}//end if






	$desdescription = Validate::validateDescription($_POST['desdescription'], true);
	//$descategory = Validate::validateStringWithAccent($_POST['descategory'], true);
	
	







	$album = new Album();

	$album->getAlbum((int)$idalbum);

	$album->setData([

		'idalbum'=>$album->getidalbum(),
		'iduser'=>$user->getiduser(),
		'instatus'=>$instatus,
		'inposition'=>$inposition,
		'inphotosize'=>$album->getinphotosize(),
		'desalbum'=>$desalbum,
		'desdescription'=>$desdescription,
		'desphoto'=>$album->getdesphoto(),
		'desextension'=>$album->getdesextension()

	]);//setData

	

	$album->update();









	if( $_FILES["file"]["name"] !== "" )
	{

		$photo = new Photo();

		if( $album->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($album->getdesphoto(), Rule::CODE_ALBUNS);

		}//end if


		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$album->getiduser(),
			Rule::CODE_ALBUNS,
			$album->getidalbum(),
			0
			
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			Album::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/album/'.$hash);
			exit;

		}//end if
		else
		{
			
	
			$album->setdesphoto($basename['basename']);
			$album->setdesextension($basename['extension']);
			$album->setinphotosize($_FILES["file"]["size"]);
	
			$album->update();


		}//end else

	}//end if


	Album::setSuccess("Dados alterados");

	header('Location: /dashboard/album');
	exit;





});//END route














$app->get( "/dashboard/album", function()
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




	$album = new Album();

	if( $search != '' )
	{

		$results = $album->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $album->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else

    	

	$nrtotal = $results['nrtotal'];

	$album->setData($results['results']);

	$maxalbuns = Album::maxAlbuns($user->getinplan());

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

					'href'=>'/dashboard/album?'.http_build_query(
						
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

					'href'=>'/dashboard/album?'.http_build_query(
						
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
		


		"albuns", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxalbuns'=>$maxalbuns,
			'nrtotal'=>$nrtotal,
			'album'=>$album->getValues(),
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'validate'=>$validate,
			'success'=>Album::getSuccess(),
			'error'=>Album::getError()
			

		]
	
	);//end setTpl

});//END route





?>