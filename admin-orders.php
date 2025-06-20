<?php 

use \Core\PageAdmin;
use \Core\Model\User;
use \Core\Model\Order;
use \Core\Model\OrderStatus;



$app->get( "/481738admin/orders/:idorder/status", function( $idorder ) 
{
	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	//var_dump(Order::getSuccess());
	//exit;

	$page = new PageAdmin();
	
	$page->setTpl(
		
		"order-status", 
		
		[

			'order'=>$order->getValues(),
			'status'=>OrderStatus::listAll(),
			'msgSuccess'=>Order::getSuccess(),
			'msgError'=>Order::getError()

		]
	
	);//end setTpl
	
});//END route







$app->post( "/481738admin/orders/:idorder/status", function( $idorder ) 
{
	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	if(
		
		!isset($_POST['idstatus']) 
		|| 
		!(int)$_POST['idstatus'] > 0 
		
	)
	{

		Order::setError("Informe o status atual");

		header("Location: /481738admin/orders/".$idorder."/status");
		exit;

	}//end if

	if(
		
		$_POST['idstatus'] === $order->getidstatus()
		
		
	)
	{

		Order::setError("Informe o status atual");

		header("Location: /481738admin/orders/".$idorder."/status");
		exit;

	}//end if

	$order->setidstatus((int)$_POST['idstatus']);

	$order->save();

	Order::setSuccess("Status atualizado");

	header("Location: /481738admin/orders/".$idorder."/status");
	exit;
	
});//END route







$app->get( "/481738admin/orders/:idorder/delete", function( $idorder ) 
{
	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$order->delete();

	header("Location: /481738admin/orders");
	exit;
	
});//END route






$app->get("/481738admin/orders/:idorder", function( $idorder ) 
{
	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$cart = $order->getCart();

	$page = new PageAdmin();
	
	$page->setTpl(
		
		"order", 
		
		[

			'order'=>$order->getValues(),
			'cart'=>$cart->getValues(),
			'products'=>$cart->getProducts()

		]
	
	);//end setTpl
	
});//END route







$app->get( "/481738admin/orders", function() 
{
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if( $search != '' )
	{

		$pagination = Order::getPageSearch($search, $page, 5);

	}//end if
	else
	{
		# Aula 126
		// $users = User::listAll();

		# Aula 126
		$pagination = Order::getPage($page, 5);

	}//end else


	$pages = [];

	for( $x=0; $x < $pagination['pages']; $x++ )
	{ 
		# code...
		array_push(
			
			$pages, 
			
			[

				'href'=>'/481738admin/orders?'.http_build_query([

					'page'=>$x+1,
					'search'=>$search

				]),

				'text'=>$x+1

			]
		
		);//end array_push

	}#end for

	$page = new PageAdmin();
	
	$page->setTpl(
		
		"orders", 
		
		[

			"orders"=>$pagination['data'],
			"search"=>$search,
			"pages"=>$pages

		]
	
	);//end setTpl
	
});//END route







 ?>