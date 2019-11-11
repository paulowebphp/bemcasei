<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Rule;
use Core\Model\User;
use Core\Model\Product;
use Core\Model\ProductConfig;
use Core\Model\Cart;
use Core\Model\CustomStyle;
use Core\Model\Menu;










$app->get( "/:desdomain/loja/:category", function( $desdomain, $category )
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






		$orderby = (isset($_GET['ordenar'])) ? $_GET['ordenar'] : "";

		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
		




		$product = new Product();





		if( $orderby != '' )
		{

			if (

				!Product::checkDirection($orderby)

			)
			{
				# code...
				Product::setError('Esta forma de ordenação não é válida');
				header('Location: /'.$user->getdesdomain().'/loja/'.$category);
				exit;

			}//end if




			//$results = $product->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);
			$results = $product->getCategoryOrderby((int)$user->getiduser(),$orderby,$category,$currentPage,Rule::ITENS_PER_PAGE,$category);
		

		}//end if
		else
		{
			
			$results = $product->getCategoryPage((int)$user->getiduser(),$category,$currentPage,Rule::ITENS_PER_PAGE);

		}//end else



		$product->setData($results['results']);







		$productconfig = new ProductConfig();

		$productconfig->get((int)$user->getiduser());







		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());



		$categories = Product::getCategoryFullArray();

		
		$category_name = Product::getCategoryName($category);
		

		$pages = [];



		if ( $orderby == '' )
		{
			# code...
			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/'.$desdomain.'/loja/'.$category.'?'.http_build_query(
							
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

						'href'=>'/'.$desdomain.'/loja/'.$category.'?'.http_build_query(
							
							[

								'ordenar'=>$orderby,
								'pagina'=>$x+1

							]
						
						),

						'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end else




	    
		/*for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/'.$desdomain.'/loja/'.$category.'?'.http_build_query(
						
						[

							'page'=>$x+1

						]
					
					),

				'text'=>$x+1

				]
			
			);//end array_push

		}//end for
	*/



		$page = new PageDomain();	
		
		$page->setTpl(
			
			$user->getidtemplate() . 
			DIRECTORY_SEPARATOR . "store-categories", 
			
			[
				'categories'=>$categories,
				'category'=>$category,
				'currentPage'=>$currentPage,
				'category_name'=>$category_name,
				'orderby'=>$orderby,
				'customstyle'=>$customstyle->getValues(),
				'productconfig'=>$productconfig->getValues(),
				'nrtotal'=>$results['nrtotal'],
				'pages'=>$pages,
				'user'=>$user->getValues(),
				'product'=>$product->getValues(),
				'success'=>Product::getSuccess(),
				'error'=>Product::getError()

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







































$app->get( "/:desdomain/loja", function( $desdomain )
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





		$orderby = (isset($_GET['ordenar'])) ? $_GET['ordenar'] : "";

		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
		




		$product = new Product();





		if( $orderby != '' )
		{

			if (

				!Product::checkDirection($orderby)

			) 
			{
				# code...
				Product::setError('Esta forma de ordenação não é válida');
				header('Location: /'.$user->getdesdomain().'/loja');
				exit;

			}//end if



			//$results = $product->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);
			$results = $product->getProductsOrderby((int)$user->getiduser(),$orderby,$currentPage,Rule::ITENS_PER_PAGE);
			


		}//end if
		else
		{
			
			$results = $product->getPageStore((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);

		}//end else



		$product->setData($results['results']);







		$productconfig = new ProductConfig();

		$productconfig->get((int)$user->getiduser());







		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());





		$categories = Product::getCategoryFullArray();

		

		

		$pages = [];


		if ( $orderby == '' )
		{
			# code...
			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/'.$desdomain.'/loja?'.http_build_query(
							
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

						'href'=>'/'.$desdomain.'/loja?'.http_build_query(
							
							[

								'ordenar'=>$orderby,
								'pagina'=>$x+1

							]
						
						),

						'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end if

	    
		/*for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/'.$desdomain.'/loja?'.http_build_query(
						
						[

							'page'=>$x+1

						]
					
					),

				'text'=>$x+1

				]
			
			);//end array_push

		}//end for*/




		$page = new PageDomain();	
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "store", 
			
			[
				'categories'=>$categories,
				'orderby'=>$orderby,
				'currentPage'=>$currentPage,

				'customstyle'=>$customstyle->getValues(),
				'productconfig'=>$productconfig->getValues(),
				'nrtotal'=>$results['nrtotal'],
				'pages'=>$pages,
				'user'=>$user->getValues(),
				'product'=>$product->getValues(),
				'success'=>Product::getSuccess(),
				'error'=>Product::getError()

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