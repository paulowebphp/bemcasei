<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Model\User;
use Core\Model\Cart;
use Core\Model\Product;
use Core\Model\ProductConfig;
use Core\Model\CustomStyle;
use Core\Model\Menu;





$app->get( "/:desdomain/carrinho/:idproduct/adicionar", function( $desdomain, $idproduct )
{

	
	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		

		$page = new Page();

		header($_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect");

		$page->setTpl(

				
			"307",

			[

				'error'=>User::getError()

			]
		
		);//end setTpl

		exit;

		
		
	}//end if
	elseif( User::checkDesdomain($desdomain) )
	{


		$user = new User();
	
		$user->getFromUrl($desdomain);


				





		$menu = new Menu();

		$menu->get((int)$user->getiduser());
		

		if ( (int)$menu->getinstore() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if


		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if

		
		$product = new Product();



		$cart = Cart::getFromSession();	

		//$product->getProduct((int)$idproduct);


		//$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1;

		/*for( $i = 0; $i < $qtd; $i++ )
		{
			
			$cart->addItem($idproduct, 1);

		}//end for*/


		

		$cart->addItem($idproduct, 1);

		$cart->getCalculateTotal();


		header("Location: /".$desdomain."/carrinho");
		exit;







	}//end if
	else
	{

		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl

		exit;


	}//end else





});//END route


















$app->get( "/:desdomain/carrinho/:idproduct/continuar", function( $desdomain, $idproduct )
{


	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		

		$page = new Page();

		header($_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect");

		$page->setTpl(

				
			"307",

			[

				'error'=>User::getError()

			]
		
		);//end setTpl

		exit;

		
		
	}//end if
	elseif( User::checkDesdomain($desdomain) )
	{



		$user = new User();

		$user->getFromUrl($desdomain);




		$menu = new Menu();

		$menu->get((int)$user->getiduser());
		

		if ( (int)$menu->getinstore() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if


		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if




		//$product = new Product();


		$cart = Cart::getFromSession();





		

		

		//$product->getProduct((int)$idproduct);


				

		
		$currentPage = (isset($_GET['currentPage'])) ? (int)$_GET['currentPage'] : 1;
		$orderby = (isset($_GET['orderby'])) ? $_GET['orderby'] : '';
		$category = (isset($_GET['category'])) ? $_GET['category'] : '';



		

		$cart->addItem($idproduct, 1);

		$cart->getCalculateTotal();


		if ($orderby != '') 
		{
			# code...
			if (

				!in_array( $orderby, [

				'valor-menor',
				'valor-maior',
				'nome-a-z',
				'nome-z-a'
				
				])

			) 
			{
				# code...
				Product::setError('Esta forma de ordenação não é válida');
				header('Location: /'.$desdomain.'/loja');
				exit;

			}//end if


		}//end if



		



		if ( $category == '' ) 
		{
			# code...
			if ($orderby == '' && (int)$currentPage == 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja');
				exit;

			}//end if
			elseif ($orderby != '' && (int)$currentPage == 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja?ordenar='.$orderby);
				exit;

			}//end elseif
			elseif ($orderby == '' && (int)$currentPage > 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja?pagina='.$currentPage);
				exit;

			}//end elseif
			elseif ($orderby != '' && (int)$currentPage > 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja?pagina='.$currentPage.'&ordenar='.$orderby);
				exit;

			}//end elseif
			else
			{
				# code...
				Product::setError('Informe uma forma de ordenação válida');
				header('Location: /'.$desdomain.'/loja');
				exit;

			}//end elseif



		}//end if
		else
		{	

			$results = Product::getCategoryFullArray();

			
			$counter = 0;
			
			foreach ( $results as $row ) 
			{
				# code...
				if ($row['desurl'] == $category)
				{
					# code...
					$counter += 1;

				}//end if

			}//end if

			if ( (int)$counter != 1 ) 
			{
				# code...
				Product::setError('Esta forma de ordenação não é válida');
				header('Location: /'.$desdomain.'/loja');
				exit;

			}//end if







			if ($orderby == '' && (int)$currentPage == 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja/'.$category);
				exit;

			}//end if
			elseif ($orderby != '' && (int)$currentPage == 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja/'.$category.'?ordenar='.$orderby);
				exit;

			}//end elseif
			elseif ($orderby == '' && (int)$currentPage > 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja/'.$category.'?pagina='.$currentPage);
				exit;

			}//end elseif
			elseif ($orderby != '' && (int)$currentPage > 1 ) 
			{
				# code...
				header('Location: /'.$desdomain.'/loja/'.$category.'?pagina='.$currentPage.'&ordenar='.$orderby);
				exit;

			}//end elseif
			else 
			{
				# code...
				Product::setError('Informe uma forma de ordenação válida');
				header('Location: /'.$desdomain.'/loja/'.$category);
				exit;

			}//end elseif


		}//end else








	}//end if
	else
	{

		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl

		exit;


	}//end else





});//END route


























/*$app->get( "/:desdomain/carrinho/:idproduct/adicionar", function( $desdomain, $idproduct )
{
	

	$product = new Product();

	$product->getProduct((int)$idproduct);

	$cart = Cart::getFromSession();			

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1;

	for( $i = 0; $i < $qtd; $i++ )
	{
		
		$cart->addProduct($product);


	}//end for

	header("Location: /".$desdomain."/carrinho");
	exit;

});//END route*/















$app->get( "/:desdomain/carrinho/:idproduct/minus", function( $desdomain, $idproduct )
{

	
	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		

		$page = new Page();

		header($_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect");

		$page->setTpl(

				
			"307",

			[

				'error'=>User::getError()

			]
		
		);//end setTpl

		exit;

		
		
	}//end if
	elseif( User::checkDesdomain($desdomain) )
	{


		$user = new User();
	
		$user->getFromUrl($desdomain);



		$menu = new Menu();

		$menu->get((int)$user->getiduser());
		

		if ( (int)$menu->getinstore() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if


		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if

		
		$product = new Product();

		$product->getProduct((int)$idproduct);

		$cart = Cart::getFromSession();


		$cart->removeItem($idproduct);

		$cart->getCalculateTotal();


		header("Location: /".$desdomain."/carrinho");
		exit;





	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else



});//END route







/*$app->get( "/:desdomain/carrinho/:idproduct/minus", function( $desdomain, $idproduct )
{

	$product = new Product();

	$product->getProduct((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product);

	header("Location: /".$desdomain."/carrinho");
	exit;

});//END route*/








$app->get( "/:desdomain/carrinho/:idproduct/remover", function( $desdomain, $idproduct )
{

	

	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		

		$page = new Page();

		header($_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect");

		$page->setTpl(

				
			"307",

			[

				'error'=>User::getError()

			]
		
		);//end setTpl

		exit;

		
		
	}//end if
	elseif( User::checkDesdomain($desdomain) )
	{


		$user = new User();
	
		$user->getFromUrl($desdomain);



		$menu = new Menu();

		$menu->get((int)$user->getiduser());
		

		if ( (int)$menu->getinstore() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if




		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if



		
		$product = new Product();

		$product->getProduct((int)$idproduct);

		$cart = Cart::getFromSession();

		$cart->removeItem($idproduct, true);

		$cart->getCalculateTotal();

		header("Location: /".$desdomain."/carrinho");
		exit;







	}//end if
	else
	{

		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl

		exit;


	}//end else






});//END route







/*$app->get( "/:desdomain/carrinho/:idproduct/remover", function( $desdomain, $idproduct )
{

	$product = new Product();

	$product->getProduct((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product, true);

	header("Location: /".$desdomain."/carrinho");
	exit;

});//END route*/


















$app->get( "/:desdomain/carrinho", function( $desdomain )
{


	if( Maintenance::checkMaintenance() )
	{	

		$maintenance = new Maintenance();

		$maintenance->getMaintenance();

		User::setError($maintenance->getdesdescription());
		

		$page = new Page();

		header($_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect");

		$page->setTpl(

				
			"307",

			[

				'error'=>User::getError()

			]
		
		);//end setTpl

		exit;

		
		
	}//end if
	elseif( User::checkDesdomain($desdomain) )
	{

		
		$user = new User();
	
		$user->getFromUrl($desdomain);


		

		$validate = User::validatePlanDashboard( $user );


		$menu = new Menu();

		$menu->get((int)$user->getiduser());
		

		if ( (int)$menu->getinstore() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if




		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if


		

		$cart = Cart::getFromSession();



		
		$productconfig = new ProductConfig();

		$productconfig->get((int)$user->getiduser());



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());


		



		$page = new PageDomain();

		$page->setTpl(
	        
	        $customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "cart", 
			
			[
				'customstyle'=>$customstyle->getValues(),
				'productconfig'=>$productconfig->getValues(),
				'totals'=>$cart->getProductsTotals(),
				'user'=>$user->getValues(),
				'cart'=>$cart->getValues(),
				'validate'=>$validate,
				'products'=>$cart->getProducts(),
				'error'=>Cart::getError(),
				'success'=>Cart::getSuccess(),

			]
		
		);//end setTpl







	}//end if
	else
	{

		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl

		exit;


	}//end else





});//END route







?>