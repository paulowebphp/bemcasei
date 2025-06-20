<?php 

use \Core\PageAdmin;
use \Core\Model\User;
use \Core\Model\Category;
use \Core\Model\Product;







$app->get( "/481738admin/categories", function() 
{
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if( $search != '' )
	{

		$pagination = Category::getPageSearch($search, $page, 2);

	}//end if
	else
	{
		# Aula 126
		// $users = User::listAll();

		# Aula 126
		$pagination = Category::getPage($page, 2);

	}//end else


	$pages = [];

	for( $x=0; $x < $pagination['pages']; $x++ )
	{ 
		# code...
		array_push(
			
			$pages, 
			
			[

				'href'=>'/481738admin/categories?'.http_build_query(
				[

					'page'=>$x+1,
					'search'=>$search

				]),
				
				'text'=>$x+1

			]
		
		);//end array_push

	}//end for

	$page = new PageAdmin();

	$page->setTpl(
		
		"categories", 
		
		array(

			"categories"=>$pagination['data'],
			"search"=>$search,
			"pages"=>$pages

		)
	
	);//end setTpl
	
});//END route







$app->get( "/481738admin/categories/create", function() 
{
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("categories-create");
	
});//END route







$app->post( "/481738admin/categories/create", function() 
{
	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header('Location: /481738admin/categories');
	exit;
	
});//END route







$app->get( "/481738admin/categories/:idcategory/delete", function( $idcategory ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header('Location: /481738admin/categories');
	exit;
	
});//END route







$app->get( "/481738admin/categories/:idcategory", function( $idcategory ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl(
		
		"categories-update", 
		
		[

			'category'=>$category->getValues()

		]
	
	);//end setTpl
	
});//END route







$app->post( "/481738admin/categories/:idcategory", function( $idcategory ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header('Location: /481738admin/categories');
	exit;
	
});//END route







$app->get( "/481738admin/categories/:idcategory/products", function( $idcategory ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl(
		
		"categories-products", 
		
		[

			'category'=>$category->getValues(),
			'productsRelated'=>$category->getProducts(),
			'productsNotRelated'=>$category->getProducts(false)

		]
	
	);//end setTpl	
	
});//END route






$app->get( "/481738admin/categories/:idcategory/products/:idproduct/add", function( $idcategory, $idproduct ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Product();

	$product->get((int)$idproduct);

	$category->addProduct($product);

	header("Location: /481738admin/categories/".$idcategory."/products");
	exit;
	
});//END route







$app->get( "/481738admin/categories/:idcategory/products/:idproduct/remove", function( $idcategory, $idproduct ) 
{
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Product();

	$product->get((int)$idproduct);

	$category->removeProduct($product);

	header("Location: /481738admin/categories/".$idcategory."/products");
	exit;
	
});//END route







 ?>