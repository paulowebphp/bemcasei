<?php

use Core\Maintenance;
use Core\Page;
use \Core\PageDomain;
use \Core\Wirecard;
use \Core\Rule;
use \Core\Validate;
use \Core\Mailer;
use \Core\Model\User;
use \Core\Model\Cart;
use \Core\Model\Product;
use \Core\Model\ProductConfig;
use \Core\Model\Address;
use \Core\Model\Order;
//use \Core\Model\OrderStatus;
use \Core\Model\Payment;
use \Core\Model\Customer;
use \Core\Model\Consort;
use \Core\Model\Account;
use \Core\Model\Fee;
use Core\Model\Menu;
use \Core\Model\CustomStyle;














$app->get( "/:desdomain/presente/:hash", function( $desdomain, $hash )
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
		

		
		$idorder = Validate::getHash($hash);



		if ( $idorder == '' )
		{
			# code...
			Payment::setError(Rule::VALIDATE_ID_HASH);
			header('Location: /checkout/'.$hash);
			exit;

		}//end if





		$consort = new Consort();

		$consort->get($user->getiduser());






		$order = new Order();

		$order->getOrder((int)$idorder, (int)$user->getiduser());



		if (!(int)$order->getidorder() > 0)
		{
			# code...
			Product::setError('O parâmetro buscado não é válido para este casal');
			header('Location: /'.$user->getdesdomain().'/loja');
			exit;

		}//end if


		$product = $order->getProducts();




		$cart = Cart::getProductsTotalsStatic($order->getidcart());



		//$productconfig = new ProductConfig();

		//$productconfig->get((int)$user->getiduser());





		
		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());

		


		$page = new PageDomain();

		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "payment",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'consort'=>$consort->getValues(),
				'product'=>$product,
				'user'=>$user->getValues(),
				'order'=>$order->getValues(),
				'validate'=>$validate,
				//'productconfig'=>$productconfig->getValues(),
				'cart'=>$cart,
				'error'=>$order->getError()

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































































$app->post( "/:desdomain/checkout", function( $desdomain )
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



		
		$_SESSION['domainCheckoutValues'] = $_POST;



		

		




		/*if ( isset($_POST['checkout-own-card']) ) 
		{
			# code...
			$_SESSION['domainCheckoutValues']['dtholderbirth'] = '';
			$_SESSION['domainCheckoutValues']['desholderaddress'] = '';
			$_SESSION['domainCheckoutValues']['desholderdocument'] = '';
			$_SESSION['domainCheckoutValues']['desholdernumber'] = '';
			$_SESSION['domainCheckoutValues']['desholdercomplement'] = '';
			$_SESSION['domainCheckoutValues']['desholderdistrict'] = '';
			$_SESSION['domainCheckoutValues']['desholderstate'] = '';
			$_SESSION['domainCheckoutValues']['desholdercity'] = '';
			$_SESSION['domainCheckoutValues']['nrholderddd'] = '';
			$_SESSION['domainCheckoutValues']['nrholderphone'] = '';
			$_SESSION['domainCheckoutValues']['zipcode'] = '';
		

		}//end if
		elseif ( isset($_POST['checkout-boleto']) ) 
		{
			# code...
			$_SESSION['domainCheckoutValues']['dtholderbirth'] = '';
			$_SESSION['domainCheckoutValues']['desholderaddress'] = '';
			$_SESSION['domainCheckoutValues']['desholderdocument'] = '';
			$_SESSION['domainCheckoutValues']['desholdernumber'] = '';
			$_SESSION['domainCheckoutValues']['desholdercomplement'] = '';
			$_SESSION['domainCheckoutValues']['desholderdistrict'] = '';
			$_SESSION['domainCheckoutValues']['desholderstate'] = '';
			$_SESSION['domainCheckoutValues']['desholdercity'] = '';
			$_SESSION['domainCheckoutValues']['nrholderddd'] = '';
			$_SESSION['domainCheckoutValues']['nrholderphone'] = '';
			$_SESSION['domainCheckoutValues']['zipcode'] = '';

			$method = 'boleto';

		}//end if
		else
		{

			$method = 'cartao-terceiro';

		}//end else*/






		
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



		//$address = new Address();

		//$address->get((int)$user->getiduser());





		if ( (int)$user->getinplancontext() == 0 )
		{
			# code...
			header('Location: /'.$desdomain.'/loja');
			exit;
			
		}//end if



		$payment = new Payment();






		if( 

			isset($_POST['checkout-boleto'])
			&&
			Validate::validateCheckoutMethod($_POST['checkout-boleto'],0)

		)
		{




			if( !isset($_POST['desname']) || $_POST['desname'] === '' )
			{
				Payment::setError(Rule::ERROR_CUSTOMER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;
			}//end if



			if( ( $desname = Validate::validateStringUcwords($_POST['desname'],true,false) ) === false )
			{
				Payment::setError(Rule::VALIDATE_CUSTOMER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;
			}//end if









			if(
				
				!isset($_POST['desemail']) 
				|| 
				$_POST['desemail'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_EMAIL);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
			{	
				
				User::setError(Rule::VALIDATE_EMAIL);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



















			if(
				
				!isset($_POST['desdocument']) 
				|| 
				$_POST['desdocument'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CPF);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
			{

				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if
			











			if(
				
				!isset($_POST['nrddd']) 
				|| 
				$_POST['nrddd'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DDD);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if






			if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
			{

				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if






			if(
				
				!isset($_POST['nrphone']) 
				|| 
				$_POST['nrphone'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_PHONE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			


			if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
			{

				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if














			if(
				
				!isset($_POST['dtbirth']) 
				|| 
				$_POST['dtbirth'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DATE_BIRTH);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if






			if( !$dtbirth = Validate::validateDate($_POST['dtbirth'], 0) )
			{

				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if










			if( 
			
				!isset($_POST['deszipcode']) 
				|| 
				$_POST['deszipcode'] === ''
			)
			{

				Payment::setError(Rule::ERROR_ZIPCODE);
				header('Location: /'.$desdomain.'/checkout');
				exit;
				
			}//end if







			if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
			{

				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if












			if(
				!isset($_POST['desaddress']) 
				|| 
				$_POST['desaddress'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_ADDRESS);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress']) ) === false )
			{

				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if












			

			if(
				
				!isset($_POST['desnumber']) 
				|| 
				$_POST['desnumber'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
			{

				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if








			

			if(
				
				!isset($_POST['desdistrict']) 
				|| 
				$_POST['desdistrict'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DISTRICT);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( ( $desdistrict = Validate::validateStringNumber($_POST['desdistrict']) ) === false )
			{

				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if













			if(
				
				!isset($_POST['descity']) 
				|| 
				$_POST['descity'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CITY);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if ( ( $cityArray = Address::getCity($_POST['descity']) ) === false ) 
			{
				# code...
				Payment::setError(Rule::VALIDATE_CITY);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			$descity = $cityArray['descity'];





















			if(
					
				!isset($_POST['desstate']) 
				|| 
				$_POST['desstate'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_STATE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if ( ( $stateArray = Address::getState($_POST['desstate']) ) === false ) 
			{
				# code...
				Payment::setError(Rule::VALIDATE_STATE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if


			
			$desstate = $stateArray['desstatecode'];












			$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);
			$intypedoc = 0;

			

			$desholdername = $desname;
			$descardcode_number = null;
			$descardcode_month = null;
			$descardcode_year = null;
			$descardcode_cvc = null;

			$payment->setinpaymentmethod(0);
			$payment->setnrinstallment(1);
















		}//end if
		elseif( 

			isset($_POST['checkout-third-part-card'])
			&&
			Validate::validateCheckoutMethod($_POST['checkout-third-part-card'],1)

		)
		{

			
			




			if(
				
				!isset($_POST['desname']) 
				|| 
				$_POST['desname'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CUSTOMER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( ( $desname = Validate::validateStringUcwords($_POST['desname'],true,false) ) === false )
			{

				Payment::setError(Rule::VALIDATE_CUSTOMER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if












			if(
				
				!isset($_POST['desemail']) 
				|| 
				$_POST['desemail'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_EMAIL);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
			{	
				
				User::setError(Rule::VALIDATE_EMAIL);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if













			






			if(
				
				!isset($_POST['desdocument']) 
				|| 
				$_POST['desdocument'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CPF);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
			{

				Payment::setError(Rule::VALIDATE_CPF);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if
			











			if(
				
				!isset($_POST['nrddd']) 
				|| 
				$_POST['nrddd'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DDD);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if






			if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
			{

				Payment::setError(Rule::VALIDATE_DDD);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if









			if(
				
				!isset($_POST['nrphone']) 
				|| 
				$_POST['nrphone'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_PHONE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if




			







			if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
			{

				Payment::setError(Rule::VALIDATE_PHONE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if














			if(
				
				!isset($_POST['dtbirth']) 
				|| 
				$_POST['dtbirth'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DATE_BIRTH);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$dtbirth = Validate::validateDate($_POST['dtbirth'], 0) )
			{

				Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if










			if( 
			
				!isset($_POST['deszipcode']) 
				|| 
				$_POST['deszipcode'] === ''
			)
			{

				Payment::setError(Rule::ERROR_ZIPCODE);
				header('Location: /'.$desdomain.'/checkout');
				exit;
				
			}//end if


			if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
			{

				Payment::setError(Rule::VALIDATE_ZIPCODE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if











			if(
				!isset($_POST['desaddress']) 
				|| 
				$_POST['desaddress'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_ADDRESS);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( ( $desaddress = Validate::validateStringNumber($_POST['desaddress']) ) === false )
			{

				Payment::setError(Rule::VALIDATE_ADDRESS);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if












			

			if(
				
				!isset($_POST['desnumber']) 
				|| 
				$_POST['desnumber'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
			{

				Payment::setError(Rule::VALIDATE_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if








			  

			if(
				
				!isset($_POST['desdistrict']) 
				|| 
				$_POST['desdistrict'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_DISTRICT);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( ( $desdistrict = Validate::validateStringNumber($_POST['desdistrict']) ) === false )
			{

				Payment::setError(Rule::VALIDATE_DISTRICT);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if








			if(
			
				!isset($_POST['descardcode_number']) 
				|| 
				$_POST['descardcode_number'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CARD_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
			{

				Payment::setError(Rule::VALIDATE_CARD_NUMBER);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if












			if(
				
				!isset($_POST['desholdername']) 
				|| 
				$_POST['desholdername'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_HOLDER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
			{

				Payment::setError(Rule::VALIDATE_HOLDER_NAME);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if











			if(
				
				!isset($_POST['descardcode_month']) 
				|| 
				$_POST['descardcode_month'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CARD_MONTH);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
			{

				Payment::setError(Rule::VALIDATE_CARD_MONTH);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if











			if(
				
				!isset($_POST['descardcode_year']) 
				|| 
				$_POST['descardcode_year'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CARD_YEAR);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
			{

				Payment::setError(Rule::VALIDATE_CARD_YEAR);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if









			if(
				
				!isset($_POST['descardcode_cvc']) 
				|| 
				$_POST['descardcode_cvc'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CARD_CVC);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
			{

				Payment::setError(Rule::VALIDATE_CARD_CVC);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if









			if(
				
				!isset($_POST['descity']) 
				|| 
				$_POST['descity'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_CITY);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if ( ( $cityArray = Address::getCity($_POST['descity']) ) === false ) 
			{
				# code...
				Payment::setError(Rule::VALIDATE_CITY);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if

			$descity = $cityArray['descity'];









			if(
					
				!isset($_POST['desstate']) 
				|| 
				$_POST['desstate'] === ''
				
			)
			{

				Payment::setError(Rule::ERROR_STATE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if



			if ( ( $stateArray = Address::getState($_POST['desstate']) ) === false ) 
			{
				# code...
				Payment::setError(Rule::VALIDATE_STATE);
				header('Location: /'.$desdomain.'/checkout');
				exit;

			}//end if


			
			$desstate = $stateArray['desstatecode'];





			$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);
			$intypedoc = 0;

			


			$payment->setinpaymentmethod(1);
			$payment->setnrinstallment($_POST['installment']);



		}//end else if
		else
		{

			Payment::setError(Rule::VALIDATE_CHECKOUT_METHOD);
			header('Location: /'.$desdomain.'/checkout');
			exit;

		}//end else

			$nrcountryarea = Rule::NR_COUNTRY_AREA;
			$descountrycode = Rule::DESCOUNTRYCODE;

			/*echo "<pre>";
			var_dump($desname);
			var_dump($desemail);
			var_dump($dtholderbirth);
			var_dump($inholdertypedoc);
			var_dump($desholderdocument);
			var_dump($payment->getinpaymentmethod());
			var_dump($nrholderddd);
			var_dump($nrholderphone);
		  	var_dump($desholderzipcode);
			var_dump($desholderaddress);
			var_dump($desholdernumber);
		  	var_dump($desholdercomplement);
		  	var_dump($desholderdistrict);
		  	var_dump($desholdercity);
		  	var_dump($desholderstate);
		  	var_dump($descardcode_month);
		  	var_dump($descardcode_year);
		  	var_dump($descardcode_number);
		  	var_dump($descardcode_cvc);
		  		exit;*/
				

		$cart = Cart::getFromSession();

		$cart->getCalculateTotal();



		

		$wirecard = new Wirecard();

		$wirecardCustomerData = $wirecard->createCustomer(

			$desname,
			$desemail,
			$dtbirth,
			$intypedoc,
			$desdocument,
			$payment->getinpaymentmethod(),
			$nrcountryarea,
			$nrddd,
			$nrphone,
		  	$deszipcode,
			$desaddress,
			$desnumber,
		  	$descomplement,
		  	$desdistrict,
		  	$descity,
			$desstate,
			$desname,
		  	$descardcode_month,
		  	$descardcode_year,
		  	$descardcode_number,
		  	$descardcode_cvc

		);//end createCustomer









		$customer = new Customer();

		try
		{

			$customer->setData([

				'iduser'=>$user->getiduser(),
				'descustomercode'=>$wirecardCustomerData['descustomercode'],
				'desname'=>$desname,
				'desemail'=>$desemail,
				'nrcountryarea'=>$nrcountryarea,
				'nrddd'=>$nrddd,
				'nrphone'=>$nrphone,
				'intypedoc'=>$intypedoc,
				'desdocument'=>$desdocument,
			  	'deszipcode'=>$deszipcode,
				'desaddress'=>$desaddress,
				'desnumber'=>$desnumber,
			  	'descomplement'=>$descomplement,
			  	'desdistrict'=>$desdistrict,
			  	'descity'=>$descity,
			  	'desstate'=>$desstate,
			  	'descountry'=>$descountrycode,
				'descardcode'=>$wirecardCustomerData['descardcode'],
				'desbrand'=>$wirecardCustomerData['desbrand'],
				'infirst6'=>$wirecardCustomerData['infirst6'],
				'inlast4'=>$wirecardCustomerData['inlast4'],
				'dtbirth'=>$dtbirth

			]);//end setData
			

			$customer->save();
			
		}//end try
		catch ( \Exception $e )
		{

			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /'.$desdomain.'/checkout');
			exit;
			
		}//end catch


		



		
		$account = new Account();

		$account->get((int)$user->getiduser());

		


		$productconfig = new ProductConfig();

		$productconfig->get((int)$user->getiduser());


			





		$wirecardPaymentData = $wirecard->payOrderProducts(

			$account->getdesaccountcode(),
			$customer->getdescustomercode(),
			$cart->getidcart(),
			$nrcountryarea,
			$nrddd,
			$nrphone,
			$desname,
			$dtbirth,
			$intypedoc,
			$desdocument,
			$deszipcode,
			$desaddress,
			$desnumber,
			$descomplement,
			$desdistrict,
			$descity,
			$desstate,
			$payment->getinpaymentmethod(),
			$payment->getnrinstallment(),
			$productconfig->getincharge(),
			$descardcode_month,
			$descardcode_year,
			$descardcode_number,
			$descardcode_cvc

		);//end payOrder

		

	
		

		try 
		{

			$payment->setData([

				'iduser'=>$user->getiduser(),
				'despaymentcode'=>$wirecardPaymentData['despaymentcode'],
				'inpaymentstatus'=>$wirecardPaymentData['inpaymentstatus'],
				'inpaymentmethod'=>$payment->getinpaymentmethod(),
				'incharge'=>$productconfig->getincharge(),
				'inrefunded'=>0,
				'nrinstallment'=>$payment->getnrinstallment(),
				'deslinecode'=>$wirecardPaymentData['deslinecode'],
				'desprinthref'=>$wirecardPaymentData['desprinthref'],
				'desholdername'=>$desname,
				'nrholdercountryarea'=>$nrcountryarea,
				'nrholderddd'=>$nrddd,
				'nrholderphone'=>$nrphone,
				'inholdertypedoc'=>$intypedoc,
				'desholderdocument'=>$desdocument,
				'desholderzipcode'=>$deszipcode,
				'desholderaddress'=>$desaddress,
				'desholdernumber'=>$desnumber,
				'desholdercomplement'=>$descomplement,
				'desholderdistrict'=>$desdistrict,
				'desholdercity'=>$descity,
				'desholderstate'=>$desstate,
				'dtholderbirth'=>$dtbirth


			]);//end setData


			$payment->update();
			
		}//end try 
		catch ( \Exception $e ) 
		{

			Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /'.$desdomain.'/checkout');
			exit;
			
		}//end catch


		




		if( (int)$payment->getinpaymentmethod() == 1)
		{

			$vlmktpercentage = Rule::MKT_CARD_PERCENTAGE;
			$vlmktfixed = Rule::MKT_CARD_FIXED;
			$vlpropercentage = Rule::PRO_CARD_PERCENTAGE;
			$vlprofixed = Rule::PRO_CARD_FIXED;
			$nrantecipationperiod = Rule::CARD_ANTECIPATION_PERIOD;

		}//end if
		else
		{

			$vlmktpercentage = Rule::MKT_BOLETO_PERCENTAGE;
			$vlmktfixed = Rule::MKT_BOLETO_FIXED;
			$vlpropercentage = NULL;
			$vlprofixed = Rule::PRO_BOLETO;
			$nrantecipationperiod = Rule::BOLETO_ANTECIPATION_PERIOD;

		}//end else



		//$vlantecipation = Wirecard::getAntecipationValue($payment->getnrinstallment());

		
		$fee = new Fee();

		$fee->setData([

			'iduser'=>$user->getiduser(),
			'idpayment'=>$payment->getidpayment(),
			'vlmktpercentage'=>$vlmktpercentage,
			'vlmktfixed'=>$vlmktfixed,
			'vlpropercentage'=>$vlpropercentage,
			'vlprofixed'=>$vlprofixed,
			'vlantecipation'=>$wirecardPaymentData['vlantecipation'],
			'nrantecipationperiod'=>$nrantecipationperiod
			

		]);//end setData

		

		
		$fee->save();


		



		$order = new Order();

		$order->setData([

			'iduser'=>$user->getiduser(),
			'idcart'=>$cart->getidcart(),
			'idcustomer'=>$customer->getidcustomer(),
			'idpayment'=>$payment->getidpayment(),
			'idfee'=>$fee->getidfee(),
			'desordercode'=>$wirecardPaymentData['desordercode'],
			'vltotal'=>$wirecardPaymentData['vltotal'],
			'vlseller'=>$wirecardPaymentData['vlseller'],
			'vlmarketplace'=>$wirecardPaymentData['vlmarketplace'],
			'vlprocessor'=>$wirecardPaymentData['vlprocessor']

		]);//end setData


		
		$order->save();


			



		$consort = new Consort();

		$consort->get((int)$user->getiduser());



		if ( (int)$payment->getinpaymentmethod() != 0 )
		{

			//pagamento em cartão

			$sellerMailer = new Mailer(
							
				
				Rule::EMAIL_PRODUCT_SELLER,

				"payment-seller", 
				
				array(

					"user"=>$user->getValues(),
					"product"=>$order->getProducts(),
					"order"=>$order->getValues(),
					"consort"=>$consort->getValues()

				),

				$user->getdeslogin(),

				$user->getdesnick(),

				$consort->getdesconsortemail(),

				$consort->getdesconsort()
			
			);//end Mailer





			$customerMailer = new Mailer(
						
				
				Rule::EMAIL_PRODUCT_BUYER,

				"payment-buyer",
				
				array(

					"user"=>$user->getValues(),
					"product"=>$order->getProducts(),
					"order"=>$order->getValues(),
					"consort"=>$consort->getValues()

				),

				$desemail,

				$desname
			
			);//end Mailer

		

		}//end if
		else
		{

			//pagamento em boleto
			$sellerMailer = new Mailer(
							
				
				Rule::EMAIL_PRODUCT_SELLER,

				"payment-seller-boleto", 
				
				array(

					"user"=>$user->getValues(),
					"product"=>$order->getProducts(),
					"order"=>$order->getValues(),
					"consort"=>$consort->getValues()

				),

				$user->getdeslogin(),

				$user->getdesnick(),

				$consort->getdesconsortemail(),

				$consort->getdesconsort()
			
			);//end Mailer





			$customerMailer = new Mailer(
						
				
				Rule::EMAIL_PRODUCT_BUYER,

				"payment-buyer-boleto",
				
				array(

					"user"=>$user->getValues(),
					"product"=>$order->getProducts(),
					"order"=>$order->getValues(),
					"consort"=>$consort->getValues()

				),

				$desemail,

				$desname
			
			);//end Mailer


		}//end else



		$sellerMailer->send();
			
		$customerMailer->send();





		$cart->setincartstatus(1);

		$cart->update();

		Cart::removeFromSession();



		if(isset($_SESSION['domainCheckoutValues'])) unset($_SESSION['domainCheckoutValues']);



		$idorder = Validate::setHash($order->getidorder());

		header("Location: /".$user->getdesdomain()."/presente/".$idorder);
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






















































$app->get( "/:desdomain/checkout", function( $desdomain )
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

		$cart = Cart::getFromSession();





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



		$productconfig = new ProductConfig();

		$productconfig->get((int)$user->getiduser());






		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());






		$state = Address::listAllStates();

		$city = [];

		/**$_POST["domainCheckoutValues"] = NULL;
		unset($_SESSION["domainCheckoutValues"]); */

		if ( isset($_SESSION["domainCheckoutValues"]) ) 
		{
			# code...
			$city = Address::listAllCitiesByState($_SESSION["domainCheckoutValues"]['desstate']);

		}//end if
		else
		{

			$city = Address::listAllCitiesByState(1);
		

		}//end else

		

		
		$page = new PageDomain();

		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "checkout", 
			
			[

				'state'=>$state,
				'city'=>$city,
				'customstyle'=>$customstyle->getValues(),
				'productconfig'=>$productconfig->getValues(),
				'user'=>$user->getValues(),
				'cart'=>$cart->getValues(),
				'products'=>$cart->getProducts(),
				'validate'=>$validate,
				'error'=>Payment::getError(),
				'success'=>Payment::getSuccess(),
				'domainCheckoutValues'=> (isset($_SESSION["domainCheckoutValues"])) ? $_SESSION["domainCheckoutValues"] : ['desname'=>'','desemail'=>'','desdocument'=>'', 'nrddd'=>'', 'nrphone'=>'', 'dtbirth'=>'', 'deszipcode'=>'', 'desaddress'=>'', 'desnumber'=>'', 'descomplement'=>'', 'desdistrict'=>'', 'desstate'=>'', 'descity'=>'']

				
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