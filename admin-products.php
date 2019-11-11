<?php 

use \Core\PageAdmin;
use \Core\Model\User;
use \Core\Model\Product;



$app->get( "/481738admin/products", function() 
{
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if( $search != '' )
	{

		$pagination = Product::getPageSearch($search, $page, 5);

	}//end if
	else
	{
		# Aula 126
		// $users = User::listAll();

		# Aula 126
		$pagination = Product::getPage($page, 5);

	}//end else


	$pages = [];

	for ( $x=0; $x < $pagination['pages']; $x++ )
	{ 
		# code...
		array_push(
			
			$pages, 
			
			[

				'href'=>'/481738admin/products?'.http_build_query(
					
					[

						'page'=>$x+1,
						'search'=>$search

					]
				
				),

			'text'=>$x+1

			]
		
		);//end array_push

	}//end for

	$page = new PageAdmin();

	$page->setTpl(
		
		"products", 
		
		[

			"products"=>$pagination['data'],
			"search"=>$search,
			"pages"=>$pages

		]
	
	);//end setTpl	
	
});//END route





$app->get( "/481738admin/products/create", function() 
{
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");	
	
});//END route







$app->post( "/481738admin/products/create", function() 
{
	User::verifyLogin();

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	header("Location: /481738admin/products");
	exit;
	
});//END route






$app->get( "/481738admin/products/:idproduct", function( $idproduct ) 
{
	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$page = new PageAdmin();

	$page->setTpl(
		
		"products-update", 
		
		[

			'product'=>$product->getValues()

		]
	
	);//end setTpl	
	
});//END route





$app->post( "/481738admin/products/:idproduct", function( $idproduct ) 
{
	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->setData($_POST);

	$product->save();

	//if($_FILES["file"]["name"] !== "") $product->setPhoto($_FILES["file"]);

	header('Location: /481738admin/presentes-virtuais');
	exit;
	
});//END route






$app->get( "/481738admin/products/:idproduct/delete", function( $idproduct ) 
{
	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->delete();

	header('Location: /481738admin/products');
	exit;
	
});//END route






 ?>