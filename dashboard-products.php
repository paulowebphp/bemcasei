<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Validate;
use Core\Photo;
use Core\Model\User;
use Core\Model\Product;
use Core\Model\ProductConfig;
use Core\Model\Gift;
use Core\Model\Plan;










$app->get( "/dashboard/presentes-virtuais/configurar", function()
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





	$productconfig = new ProductConfig();

	$productconfig->get((int)$user->getiduser());


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
		


		"products-config", 
			
		[

			'productconfig'=>$productconfig->getValues(),
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Product::getSuccess(),
			'error'=>Product::getError()
			

		]
	
	);//end setTpl

});//END route






















$app->post( "/dashboard/presentes-virtuais/configurar", function()
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
		
		!isset($_POST['incharge']) 
		|| 
		$_POST['incharge'] === ''
		
	)
	{

		ProductConfig::setError("Insira o status de quem vai arcar com as tarifas");
		header("Location: /dashboard/presentes-virtuais/configurar");
		exit;

	}//end if

	if( ($incharge = Validate::validateBoolean($_POST['incharge'])) === false )
	{	
		
		ProductConfig::setError("A opção deve conter apenas 0 ou 1 e não pode ser formado apenas com caracteres especiais, tente novamente");
		header("Location: /dashboard/presentes-virtuais/configurar");
		exit;

	}//end if



		


	
	$productconfig = new ProductConfig();


	$productconfig->setData([

		'idproductconfig'=>$_POST['idproductconfig'],
		'iduser'=>$user->getiduser(),
		'incharge'=>$incharge

	]);//setData



	$productconfig->update();



	ProductConfig::setSuccess("Dados alterados");

	header("Location: /dashboard/presentes-virtuais/configurar");
	exit;





});//END route





















$app->get( "/dashboard/presentes-virtuais/adicionar", function()
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






	$product = new Product();
    
	//$results = $product->get((int)$user->getiduser());
	
	//$nrtotal = $results['nrtotal'];

	//$product->setData($results['results']);

	//$maxProducts = $product->maxProducts($user->getinplan());

	/*
	if( $nrtotal >= $maxProducts )
	{

		Product::setError("Você já atingiu o limite máximo de Presentes Virtuais | Em caso de dúvida, entre em contato com o Suporte");
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if
	*/

	$numProducts = Product::getNumProducts((int)$user->getiduser());
	$maxProducts = Product::getMaxProducts($validate['inplancode']);

	//$maxProducts = Product::maxProducts($validate['inplancode']);

	if( (int)$numProducts >= (int)$maxProducts )
	{

		Product::setError("Você já atingiu o limite máximo de Presentes Virtuais | Em caso de dúvida, entre em contato com o Suporte");
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if
	





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
		


		"products-create", 
			
		[
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'success'=>Product::getSuccess(),
			'error'=>Product::getError()
			

		]
	
	);//end setTpl

});//END route






















$app->post( "/dashboard/presentes-virtuais/adicionar", function()
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
		
		!isset($_POST['desproduct']) 
		|| 
		$_POST['desproduct'] === ''
		
	)
	{

		Product::setError("Preencha o nome do presente virtual");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if


	if( ( $desproduct = Validate::validateStringNumber($_POST['desproduct'], true, false)  ) === false )
	{	
		

		Product::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if	










	if(
		
		!isset($_POST['incategory']) 
		|| 
		$_POST['incategory'] === ''
		
	)
	{

		Product::setError("Preencha a categoria do presente virtual");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if

	if( !$incategory = Validate::validateProductCategory($_POST['incategory']) )
	{	
		

		Product::setError("A categoria deve ser um número de 11 a 17, tente novamente");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if	






	if(
		
		!isset($_POST['vlprice']) 
		|| 
		$_POST['vlprice'] === ''
		
	)
	{

		Product::setError("Preencha o valor do presente virtual");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if

	if( ($vlprice = Validate::validatePrice($_POST['vlprice'])) === false )
	{	
		

		Product::setError("O valor do presente deve ser entre R$ 100,00 e R$ 2.000,00");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if







	if( $_FILES["file"]["error"] === '' )
	{
		Product::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if

	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Product::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}







	

	$product = new Product();




	$numProducts = Product::getNumProducts((int)$user->getiduser());
	$maxProducts = Product::getMaxProducts($validate['inplancode']);

	//$maxProducts = Product::maxProducts($validate['inplancode']);

	if( (int)$numProducts >= (int)$maxProducts )
	{

		Product::setError("Você já atingiu o limite máximo de Presentes Virtuais | Em caso de dúvida, entre em contato com o Suporte");
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if





	$product->setData([

		'iduser'=>$user->getiduser(),
		'incategory'=>$incategory,
		'desproduct'=>$desproduct,
		'vlprice'=>$vlprice,
		'desphoto'=>Rule::DEFAULT_PHOTO,
		'desextension'=>Rule::DEFAULT_PHOTO_EXTENSION

	]);//setData


	$product->update();




	if( $_FILES["file"]["name"] === "" )
	{

		//$product->setdesphoto(Rule::DEFAULT_PHOTO);
		//$product->setdesextension(Rule::DEFAULT_PHOTO_EXTENSION);

		//$product->update();

		Product::setSuccess("Item criado com sucesso | Adicione uma imagem depois clicando em Editar");

		header('Location: /dashboard/presentes-virtuais/adicionar');
		exit;

	}//end if
	else
	{
		
		$photo = new Photo();

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$product->getiduser(),
			Rule::CODE_PRODUCTS,
			$product->getidproduct(),
			0
			
			
		);//end setPhoto
		
		if( $basename['basename'] === false )
		{
	
			$product->delete();

			Product::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");

			header('Location: /dashboard/presentes-virtuais');
			exit;

		}//end if
		else
		{

			$product->setdesphoto($basename['basename']);
			$product->setdesextension($basename['extension']);
	
			$product->update();

			Product::setSuccess("Item criado");

			header('Location: /dashboard/presentes-virtuais');
			exit;

		}//end else
			

	}//end else

});//END route




















$app->get( "/dashboard/presentes-virtuais/:hash/deletar", function( $hash ) 
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



	$idproduct = Validate::getHash($hash);

	if( $idproduct == '' )
	{

		Product::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if




	$product = new Product();

	$product->getProduct((int)$idproduct);

	$product->delete();

	$product->deletePhoto($product->getdesphoto());

	header('Location: /dashboard/presentes-virtuais');
	exit;
	
});//END route































$app->get( "/dashboard/lista-pronta/adicionar", function()
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






	if( !isset($_GET['presente']) )
	{
		
		Product::setError("A URL que você tentou acessar não existe, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/lista-pronta');
		exit;
	}

	

	//$idgift = $_GET['presente'];

	$idgift = Validate::getHash($_GET['presente']);

	if( $idgift == '' )
	{

		Product::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/album');
		exit;

	}//end if




   
	$numGifts = Gift::getNumGifts();

	if( $idgift < 1 || $idgift > $numGifts )
	{
		
		Product::setError("A URL que você tentou acessar não existe, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/lista-pronta');
		exit;

	}//end if


	$product = new Product();

	//$numProducts = $product->getNumProducts((int)$user->getiduser());
	//$maxProducts = $product->getMaxProducts((int)$user->getinplancontext());


	$numProducts = Product::getNumProducts((int)$user->getiduser());
	$maxProducts = Product::getMaxProducts($validate['inplancode']);


	if( (int)$numProducts >= (int)$maxProducts )
	{
		
		Product::setError("Você não pode adicionar mais presentes, pois já chegou no limite do seu plano");
		header('Location: /dashboard/lista-pronta');
		exit;

	}//end if



	$gift = new Gift();
   
	$gift->getGift((int)$idgift);


	$product->setiduser($user->getiduser());
	$product->setincategory($gift->getincategory());
	$product->setdesproduct($gift->getdesgift());
	$product->setvlprice($gift->getvlprice());
	$product->setdesextension($gift->getdesextension());

	$product->update();

	

	$photo = new Photo();


	$basename = $photo->copyPhoto( 
		
		$gift->getdesphoto(), 
		$user->getiduser(), 
		Rule::CODE_GIFTS, 
		$product->getidproduct(), 
		$product->getdesextension(),
		Rule::CODE_PRODUCTS
		
	);//end copyPhoto
	
	$product->setdesphoto($basename);

	$product->update();

	Product::setSuccess("Item criado");

	header('Location: /dashboard/presentes-virtuais');
	exit;

});//END route























$app->get( "/dashboard/lista-pronta", function()
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







	$product = new Product();

	//$numProducts = $product->getNumProducts((int)$user->getiduser());
	//$maxProducts = $product->getMaxProducts((int)$user->getinplancontext());


	$numProducts = Product::getNumProducts((int)$user->getiduser());
	$maxProducts = Product::getMaxProducts($validate['inplancode']);


	if( (int)$numProducts >= (int)$maxProducts )
	{
		
		Product::setError("Você não pode adicionar mais presentes, pois já chegou no limite do seu plano");
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if




	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
   
	$gift = new Gift();

	if( $search != '' )
	{

		$results = $gift->getSearch($search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $gift->getPage($currentPage,Rule::ITENS_PER_PAGE);

	}//end else

	
	$gift->setData($results['results']);

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

					'href'=>'/dashboard/lista-pronta?'.http_build_query(
						
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

					'href'=>'/dashboard/lista-pronta?'.http_build_query(
						
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
		


		"products-gifts", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'gift'=>$gift->getValues(),
			'validate'=>$validate,
			'success'=>Product::getSuccess(),
			'error'=>Product::getError()
			

		]
	
	);//end setTpl

});//END route



























$app->get( "/dashboard/presentes-virtuais/:hash", function( $hash )
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




	$idproduct = Validate::getHash($hash);

	if( $idproduct == '' )
	{

		Product::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if






    $product = new Product();
    
    $product->getProduct((int)$idproduct);




  


   
	$page = new PageDashboard();

	$page->setTpl(
		


		"products-update", 
		
		[
			'user'=>$user->getValues(),
			'product'=>$product->getValues(),
			'validate'=>$validate,
			'success'=>Product::getSuccess(),
			'error'=>Product::getError()
			

		]
	
	);//end setTpl

});//END route
























$app->post( "/dashboard/presentes-virtuais/:hash", function( $hash )
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





	$idproduct = Validate::getHash($hash);

	if( $idproduct == '' )
	{

		Product::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/presentes-virtuais');
		exit;

	}//end if




	



	if(
		
		!isset($_POST['desproduct']) 
		|| 
		$_POST['desproduct'] === ''
		
	)
	{

		Product::setError("Preencha o nome do presente virtual");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if

	

	if( ( $desproduct = Validate::validateStringNumber($_POST['desproduct'], true, false)  ) === false )
	{	
		

		Product::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if	










	if(
		
		!isset($_POST['incategory']) 
		|| 
		$_POST['incategory'] === ''
		
	)
	{

		Product::setError("Preencha a categoria do presente virtual");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if

	if( !$incategory = Validate::validateProductCategory($_POST['incategory']) )
	{	
		

		Product::setError("A categoria deve ser um número de 1 a 7, tente novamente");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if	






	if(
		
		!isset($_POST['vlprice']) 
		|| 
		$_POST['vlprice'] === ''
		
	)
	{

		Product::setError("Preencha o valor do presente virtual");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if

	if( ($vlprice = Validate::validatePrice($_POST['vlprice'])) === false )
	{	
		

		Product::setError("O valor do presente deve ser entre R$ 100,00 e R$ 2.000,00");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if






	









	if( $_FILES["file"]["error"] === '' )
	{
		Product::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}//end if

	if( $_FILES["file"]["size"] > Rule::MAX_PHOTO_UPLOAD_SIZE )
	{

		Product::setError("Só é possível fazer upload de arquivos de até ".(Rule::MAX_PHOTO_UPLOAD_SIZE/1000000)."MB");
		header('Location: /dashboard/presentes-virtuais/'.$hash);
		exit;

	}



	





	

	$product = new Product();

	$product->getProduct((int)$idproduct);

	$product->setData([

		'idproduct'=>$idproduct,
		'iduser'=>$user->getiduser(),
		'incategory'=>$incategory,
		'desproduct'=>$desproduct,
		'vlprice'=>$vlprice,
		'desphoto'=>$product->getdesphoto(),
		'desextension'=>$product->getdesextension()

	]);//setData

	
    
	$product->update();





	if( $_FILES["file"]["name"] !== "" )
	{
		$photo = new Photo();

		if( $product->getdesphoto() != Rule::DEFAULT_PHOTO )
		{

			$photo->deletePhoto($product->getdesphoto(), Rule::CODE_PRODUCTS);

		}//end if

		$basename = $photo->setPhoto(
			
			$_FILES["file"], 
			$product->getiduser(),
			Rule::CODE_PRODUCTS,
			$product->getidproduct(),
			0
			
		
		);//end setPhoto


		if( $basename['basename'] === false )
		{
			Product::setError("Falha no envio da imagem, tente novamente | Se a falha persistir, tente enviar outra imagem ou entre em contato com o suporte");
			header('Location: /dashboard/presentes-virtuais/'.$hash);
			exit;

		}//end if
		else
		{
	
			$product->setdesphoto($basename['basename']);
			$product->setdesextension($basename['extension']);
	
			$product->update();

		}//end else

	}//end if


	Product::setSuccess("Item alterado");

	header('Location: /dashboard/presentes-virtuais');
	exit;


});//END route































$app->get( "/dashboard/presentes-virtuais", function()
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

	$product = new Product();

	if( $search != '' )
	{

		$results = $product->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);

	}//end if
	else
	{
		
		$results = $product->getPage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

	}//end else


	$product->setData($results['results']);

	$nrtotal = $results['nrtotal'];

	$maxProducts = Product::maxProducts($validate['inplancode']);

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

					'href'=>'/dashboard/presentes-virtuais?'.http_build_query(
						
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

					'href'=>'/dashboard/presentes-virtuais?'.http_build_query(
						
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
		


		"products", 
		
		[
			'user'=>$user->getValues(),
			'search'=>$search,
			'pages'=>$pages,
			'maxProducts'=>$maxProducts,
			'nrtotal'=>$nrtotal,
			'product'=>$product->getValues(),
			'popover1'=>[0=>Rule::POPOVER_MAX_TITLE, 1=>Rule::POPOVER_MAX_CONTENT],
			'validate'=>$validate,
			'success'=>Product::getSuccess(),
			'error'=>Product::getError()
			

		]
	
	);//end setTpl

});//END route





?>