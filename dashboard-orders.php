<?php

use Core\Maintenance;
use Core\PageDashboard;
//use Core\Photo;
use Core\Rule;
use Core\Validate;
use Core\Wirecard;
use Core\Model\Account;
use Core\Model\Bank;
use Core\Model\Cart;
use Core\Model\Consort;
//use Core\Model\Gift;
use Core\Model\Order;
//use Core\Model\OrderStatus;
//use Core\Model\Plan;
//use Core\Model\Product;
use Core\Model\Transfer;
use Core\Model\User;















$app->get( "/dashboard/painel-financeiro/detalhes/:hash", function( $hash ) 
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





	$validate = User::validatePlanDashboard( $user );



	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		Account::setError(Rule::VALIDATE_ACCOUNT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	$idorder = Validate::getHash($hash);

	if( $idorder == '' )
	{

		Order::setError(Rule::VALIDATE_ID_HASH);
		header('Location: /dashboard/painel-financeiro');
		exit;

	}//end if



	

	$order = new Order();

	$order->getOrder((int)$idorder, (int)$user->getiduser());





	if ( !(int)$order->getidorder() > 0 )
	{
		# code...
		Order::setError('O parâmetro buscado não é válido');
		header('Location: /dashboard/painel-financeiro');
		exit;

	}//end if




	//var_dump(Order::getSuccess());
	//exit;

	$product = $order->getProducts();



	$cart = Cart::getProductsTotalsStatic($order->getidcart());

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

	$consort = new Consort();

	$consort->get((int)$user->getiduser());
		

	$page = new PageDashboard();
	
	$page->setTpl(
		


		"order-details", 
		
		[
			'user'=>$user->getValues(),
			'product'=>$product,
			'cart'=>$cart,
			'order'=>$order->getValues(),
			'consort'=>$consort->getValues(),
			'validate'=>$validate,
			'success'=>Order::getSuccess(),
			'error'=>Order::getError()

		]
	
	);//end setTpl
	
});//END route




























$app->get( "/dashboard/painel-financeiro", function()
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




	$validate = User::validatePlanDashboard( $user );





	if ( (int)$user->getincheckout() == 0 && (int)$user->getinplancontext() != 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if


	if ( (int)$user->getinplancontext() == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		header('Location: /dashboard/cadastrar');
		exit;
		
	}//end if



	if ( (int)$user->getinaccount() == 0 )
	{
		# code...
		Account::setError(Rule::VALIDATE_ACCOUNT);
		header('Location: /dashboard/cadastrar');
		exit;

	}//end if



	$account = new Account();

	$account->get($user->getiduser());

	
	




	$search = (isset($_GET['buscar'])) ? $_GET['buscar'] : "";

	$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;





	$order = new Order();




	if( $search != '' )
	{

		$results = $order->getPageSearch( 

			(int)$user->getiduser(),
			1,
			$search,
			$currentPage,
			Rule::ITENS_PER_PAGE 

		);//end getSearch

	}//end if
	else
	{
		
		$results = $order->getPage( 

			(int)$user->getiduser(),
			1,
			$currentPage,
			Rule::ITENS_PER_PAGE

		);//end getPage

	}//end else

	

	$order->setData($results['results']);


	


	$numOrders = $results['nrtotal'];


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

					'href'=>'/dashboard/painel-financeiro?'.http_build_query(
						
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

					'href'=>'/dashboard/painel-financeiro?'.http_build_query(
						
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






	
	$wirecard = new Wirecard();

	$balances = $wirecard->getBalances($account->getdesaccesstoken());

	


	$sumTotals = Order::getSumTotals((int)$user->getiduser());


	$sumAvailable = Order::getSumAvailable((int)$user->getiduser());
	

	$sumReversed = Order::getSumUnavailable((int)$user->getiduser(),8);

	
	$sumRefunded = Order::getSumUnavailable((int)$user->getiduser(),7);

	
	$sumCompleted = Transfer::getSumCompleted((int)$user->getiduser());



	






	$bank = new Bank();

	$bank->get((int)$user->getiduser());

	$checkBank = 0;

	if ( $bank->getdesbankcode() != '' )
	{

		$checkBank = 1;

	}//end if




	

	$page = new PageDashboard();

	$page->setTpl(
		


		"orders", 
		
		[
			'user'=>$user->getValues(),
			'balances'=>$balances,
			'search'=>$search,
			'pages'=>$pages,
			'numOrders'=>$numOrders,
			'sumTotals'=>$sumTotals,
			'sumAvailable'=>$sumAvailable,
			'sumReversed'=>$sumReversed,
			'sumRefunded'=>$sumRefunded,
			'sumCompleted'=>$sumCompleted,
			'order'=>$order->getValues(),
			'validate'=>$validate,
			'popover1'=>[0=>'', 1=>Rule::POPOVER_REGISTER_BANK_CONTENT],
			'checkBank'=>$checkBank,
			'success'=>Order::getSuccess(),
			'error'=>Order::getError()
			

		]
	
	);//end setTpl

});//END route








?>