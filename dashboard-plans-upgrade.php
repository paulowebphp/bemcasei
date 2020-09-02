<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Photo;
use Core\Rule;
use Core\Wirecard;
use Core\Validate;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Plan;
use Core\Model\Cart;
use Core\Model\Payment;
use Core\Model\PaymentStatus;
use Core\Model\Address;
use Core\Model\Customer;
use Core\Model\Order;
use Core\Model\Consort;
use Core\Model\Fee;








$app->get( "/dashboard/upgrade/checkout", function()
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







	if ( !in_array((int)$validate['incontext'], [1,2]) )
	{
		# code...
		Payment::setError(Rule::VALIDATE_UPGRADE);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if





	//$plans = Plan::getPlansFullArray();




	$lastplan = Plan::getLastPlan((int)$user->getiduser());




	$sufix = substr($validate['inplancode'], 1, 2);

	$inplanUpgrade = Plan::getPlanArrayUpgrade($validate['incontext'], $sufix);



	
	$counter = 0;

	foreach ($inplanUpgrade as $row ) 
	{
		# code...
		
		if ( (int)$_GET['plano'] == (int)$row['inplancode'] ) 
		{
			# code...
			$counter++;
			break;

		}//end if


	}//ennd foreach



	if ( $counter == 0 )
	{
		# code...
		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/upgrade');
		exit;

	}//end if



	

	if ( 


		isset($_GET['plano'])
		&&
		Validate::validateInplancode($_GET['plano'])
		&&
		(int)$_GET['plano'] != 0


	)
	{

		# code...
		if (


			!in_array((int)$lastplan['inpaymentstatus'], [0,1,2,3,4])
			&&
			(int)$lastplan['inpaymentmethod'] != 0

		)
		{
			# code...

			$plan = $_GET['plano'];


		}//end if
		else
		{

			Plan::setError(Rule::PLAN_WAIT_FOR_AUTHORIZATION);
			header('Location: /dashboard/upgrade');
			exit;

		}//end else



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/upgrade');
		exit;

	}//end else if






	/*$payment = new Payment();

	if( !$payment->getdesholderaddress() ) $payment->setdesholderaddress('');
	if( !$payment->getdesemail() ) $payment->setdesemail('');
	if( !$payment->getdesholdernumber() ) $payment->setdesholdernumber('');
	if( !$payment->getdesholdercomplement() ) $payment->setdesholdercomplement('');
	if( !$payment->getdesholderdistrict() ) $payment->setdesholderdistrict('');
	if( !$payment->getdesholdercity() ) $payment->setdesholdercity('');
	if( !$payment->getdesholderstate() ) $payment->setdesholderstate('');
	if( !$payment->getdesholderzipcode() ) $payment->setdesholderzipcode('');
	if( !$payment->getinholdertypedoc() ) $payment->setinholdertypedoc('');
	if( !$payment->getdesholderdocument() ) $payment->setdesholderdocument('');
	if( !$payment->getdtholderbirth() ) $payment->setdtholderbirth('');
	if( !$payment->getnrholderddd() ) $payment->setnrholderddd('');
	if( !$payment->getnrholderphone() ) $payment->setnrholderphone('');
	if( !$payment->getdesholdername() ) $payment->setdesholdername('');
	if( !$payment->getdescardcode_number() ) $payment->setdescardcode_number('');
	if( !$payment->getdescardcode_month() ) $payment->setdescardcode_month('');
	if( !$payment->getdescardcode_year() ) $payment->setdescardcode_year('');
	if( !$payment->getdescardcode_cvc() ) $payment->setdescardcode_cvc('');*/



	$inplan = Plan::getPlanArray($plan);




	//$address = new Address();

	//$lastAddressPlan = Address::getLastAddressPlan($user->getiduser());




	


	$page = new PageDashboard();

	$page->setTpl(
		
		"plans-upgrade-checkout",

		[
			'user'=>$user->getValues(),
			//'payment'=>$payment->getValues(),
			//'plan'=>$plan,
			'inplan'=>$inplan,
			'validate'=>$validate,
			'error'=>Payment::getError(),
			'success'=>Payment::getSuccess(),
			'planUpgradeValues'=> (isset($_SESSION["planUpgradeValues"])) ? $_SESSION["planUpgradeValues"] : ['desholderdocument'=>'', 'nrholderddd'=>'', 'nrholderphone'=>'', 'dtholderbirth'=>'', 'zipcode'=>'', 'desholderaddress'=>'', 'desholdernumber'=>'', 'desholdercomplement'=>'', 'desholderdistrict'=>'', 'desholderstate'=>'', 'desholdercity'=>'']


		]
	
	);//end setTpl

});//END route














$app->post( "/dashboard/upgrade/checkout", function()
{

	$_SESSION['planUpgradeValues'] = $_POST;





	if ( 

		isset($_POST['checkout-own-card']) 
		||
		isset($_POST['checkout-boleto'])

	) 
	{
		# code...
		$_SESSION['planUpgradeValues']['dtholderbirth'] = '';
		$_SESSION['planUpgradeValues']['desholderaddress'] = '';
		$_SESSION['planUpgradeValues']['desholderdocument'] = '';
		$_SESSION['planUpgradeValues']['desholdernumber'] = '';
		$_SESSION['planUpgradeValues']['desholdercomplement'] = '';
		$_SESSION['planUpgradeValues']['desholderdistrict'] = '';
		$_SESSION['planUpgradeValues']['desholderstate'] = '';
		$_SESSION['planUpgradeValues']['desholdercity'] = '';
		$_SESSION['planUpgradeValues']['nrholderddd'] = '';
		$_SESSION['planUpgradeValues']['nrholderphone'] = '';
		$_SESSION['planUpgradeValues']['zipcode'] = '';
	

	}//end if
	



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







	if ( !in_array((int)$validate['incontext'], [1,2]) )
	{
		# code...
		Payment::setError(Rule::VALIDATE_UPGRADE);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if







	/*if ( 


		!isset($_POST['inplancode'])
		||
		(int)$_POST['inplancode'] == 0
		||
		!Validate::validateInplancode($_POST['inplancode'])
		||
		!in_array((int)$_GET['plano'], $inplanUpgrade)

	)
	{

		Payment::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
		exit;



	}//end if*/







	$lastplan = Plan::getLastPlan((int)$user->getiduser());




	$sufix = substr($validate['inplancode'], 1, 2);

	$inplanUpgrade = Plan::getPlanArrayUpgrade($validate['incontext'], $sufix);















	$counter = 0;

	foreach ($inplanUpgrade as $row ) 
	{
		# code...
		
		if ( (int)$_POST['inplancode'] == (int)$row['inplancode'] ) 
		{
			# code...
			$counter++;
			break;

		}//end if


	}//ennd foreach



	if ( $counter == 0 )
	{
		# code...
		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		eader('Location: /dashboard/upgrade');
		exit;

	}//end if

	






	if ( 


		isset($_POST['inplancode'])
		&&
		Validate::validateInplancode($_POST['inplancode'])
		&&
		(int)$_POST['inplancode'] != 0


	)
	{

		# code...
		if (


			!in_array((int)$lastplan['inpaymentstatus'], [0,1,2,3,4])
			&&
			(int)$lastplan['inpaymentmethod'] != 0

		)
		{
			# code...

			$plan = $_POST['inplancode'];


		}//end if
		else
		{

			Plan::setError(Rule::PLAN_WAIT_FOR_AUTHORIZATION);
			header('Location: /dashboard/upgrade');
			exit;

		}//end else



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/upgrade');
		exit;

	}//end else if








	$address = new Address();

	$address->get((int)$user->getiduser());


	


	$payment = new Payment();


	


	
	if( 

		isset($_POST['checkout-boleto'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-boleto'],0)

	)
	{



		/*$_POST['nrholderddd'] = $user->getnrholderddd();
		$_POST['nrholderphone'] = $user->getnrholderphone();
		$_POST['desholdername'] = $user->getdesholdername();
		$_POST['dtholderbirth'] = $user->getdtholderbirth();
		$_POST['inholdertypedoc'] = $user->getinholdertypedoc();
		$_POST['desholderdocument'] = $user->getdesholderdocument();
		$_POST['zipcode'] = $address->getdeszipcode();
		$_POST['desholderaddress'] = $address->getdesholderaddress();
		$_POST['desholdernumber'] = $address->getdesholdernumber();
		$_POST['desholdercomplement'] = $address->getdesholdercomplement();
		$_POST['desholderdistrict'] = $address->getdesholderdistrict();
		$_POST['desholdercity'] = $address->getdesholdercity();
		$_POST['desholderstate'] = $address->getdesholderstate();*/

		/*$inholdertypedoc = $user->getintypedoc();
		$desholderdocument = $user->getdesdocument();
		$nrholderddd = $user->getnrddd();
		$nrholderphone = $user->getnrphone();
		$dtholderbirth = $user->getdtbirth();
		
		$deszipcode = $address->getdeszipcode();
		$desholderaddress = $address->getdesaddress();
		$desholdernumber = $address->getdesnumber();
		$desholdercomplement = $address->getdescomplement();
		$desholderdistrict = $address->getdesdistrict();
		$desholdercity = $address->getdescity();
		$desholderstate = $address->getdesstate();*/


		$inholdertypedoc = null;
		$desholderdocument = null;
		$nrholderddd = null;
		$nrholderphone = null;
		$dtholderbirth = null;
		
		$desholderzipcode = null;
		$desholderaddress = null;
		$desholdernumber = null;
		$desholdercomplement = null;
		$desholderdistrict = null;
		$desholdercity = null;
		$desholderstate = null;

		$desholdername = null;
		$descardcode_number = null;
		$descardcode_month = null;
		$descardcode_year = null;
		$descardcode_cvc = null;

		$payment->setinpaymentmethod('0');
		$payment->setnrinstallment('1');






	}//end if
	elseif( 

		isset($_POST['checkout-third-part-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-third-part-card'],1)

	)
	{






		if(
			
			!isset($_POST['desholderdocument']) 
			|| 
			$_POST['desholderdocument'] === ''
			
		)
		{

	
			Payment::setError(Rule::ERROR_CPF);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholderdocument = Validate::validateDocument(0, $_POST['desholderdocument']) )
		{

			Payment::setError(Rule::VALIDATE_CPF);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if
		











		if(
			
			!isset($_POST['nrholderddd']) 
			|| 
			$_POST['nrholderddd'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DDD);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		if( !$nrholderddd = Validate::validateDDD($_POST['nrholderddd']) )
		{

			Payment::setError(Rule::VALIDATE_DDD);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if






		if(
			
			!isset($_POST['nrholderphone']) 
			|| 
			$_POST['nrholderphone'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_PHONE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		


		if( !$nrholderphone = Validate::validatePhone($_POST['nrholderphone']) )
		{

			Payment::setError(Rule::VALIDATE_PHONE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if














		if(
			
			!isset($_POST['dtholderbirth']) 
			|| 
			$_POST['dtholderbirth'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DATE_BIRTH);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$dtholderbirth = Validate::validateDate($_POST['dtholderbirth'], 0) )
		{

			Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if










		if( 
		
			!isset($_POST['zipcode']) 
			|| 
			$_POST['zipcode'] === ''
		)
		{

			Payment::setError(Rule::ERROR_ZIPCODE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;
			
		}//end if


		if( !$desholderzipcode = Validate::validateCEP($_POST['zipcode']) )
		{

			Payment::setError(Rule::VALIDATE_ZIPCODE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if












		if(
			!isset($_POST['desholderaddress']) 
			|| 
			$_POST['desholderaddress'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_ADDRESS);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholderaddress = Validate::validateStringNumber($_POST['desholderaddress']) )
		{

			Payment::setError(Rule::VALIDATE_ADDRESS);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if












		

		if(
			
			!isset($_POST['desholdernumber']) 
			|| 
			$_POST['desholdernumber'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholdernumber = Validate::validateNumber($_POST['desholdernumber']) )
		{

			Payment::setError(Rule::VALIDATE_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if











		if(
			
			!isset($_POST['desholderdistrict']) 
			|| 
			$_POST['desholderdistrict'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DISTRICT);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholderdistrict = Validate::validateStringNumber($_POST['desholderdistrict']) )
		{

			Payment::setError(Rule::VALIDATE_DISTRICT);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if








		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if












		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_HOLDER_NAME);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			Payment::setError(Rule::VALIDATE_HOLDER_NAME);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if











		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_MONTH);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_MONTH);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if











		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_YEAR);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_YEAR);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if









		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_CVC);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_CVC);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if




		if(
				
			!isset($_POST['desholdercity']) 
			|| 
			$_POST['desholdercity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['desholdercity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		$desholdercity = $cityArray['descity'];









		if(
				
			!isset($_POST['desholderstate']) 
			|| 
			$_POST['desholderstate'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_STATE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desholderstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if


		
		$desholderstate = $stateArray['desstatecode'];







		
		$desholdercomplement = Validate::validateStringNumber($_POST['desholdercomplement'], false, true);

		//$inholdertypedoc = $_POST['inholdertypedoc'];
		$inholdertypedoc = 0;






		$payment->setinpaymentmethod('1');
		$payment->setnrinstallment($_POST['installment']);







	}//end else if
	elseif( 

		isset($_POST['checkout-own-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-own-card'],2)

	)
	{






		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_NUMBER);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if







		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_HOLDER_NAME);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			Payment::setError(Rule::VALIDATE_HOLDER_NAME);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if










		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_MONTH);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_MONTH);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if









		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_YEAR);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_YEAR);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if












		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_CVC);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_CVC);
			header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if









		/*$_POST['nrholderddd'] = $user->getnrddd();
		$_POST['nrholderphone'] = $user->getnrphone();
		$_POST['desholdername'] = $user->getdesperson();
		$_POST['dtholderbirth'] = $user->getdtbirth();
		$_POST['inholdertypedoc'] = $user->getintypedoc();
		$_POST['desholderdocument'] = $user->getdesdocument();
		$_POST['zipcode'] = $address->getdeszipcode();
		$_POST['desholderaddress'] = $address->getdesaddress();
		$_POST['desholdernumber'] = $address->getdesnumber();
		$_POST['desholdercomplement'] = $address->getdescomplement();
		$_POST['desholderdistrict'] = $address->getdesdistrict();
		$_POST['desholdercity'] = $address->getdescity();
		$_POST['desholderstate'] = $address->getdesstate();*/
		

		$inholdertypedoc = $user->getintypedoc();
		$desholderdocument = $user->getdesdocument();
		$nrholderddd = $user->getnrddd();
		$nrholderphone = $user->getnrphone();
		$dtholderbirth = $user->getdtbirth();
		
		$desholderzipcode = $address->getdeszipcode();
		$desholderaddress = $address->getdesaddress();
		$desholdernumber = $address->getdesnumber();
		$desholdercomplement = $address->getdescomplement();
		$desholderdistrict = $address->getdesdistrict();
		$desholdercity = $address->getdescity();

		$desholderstate = $address->getdesstatecode();

		//$desholdername = $_POST['desholdername'];
		//$descardcode_number = $_POST['descardcode_number'];
		//$descardcode_month = $_POST['descardcode_month'];
		//$descardcode_year = $_POST['descardcode_year'];
		//$descardcode_number = $_POST['descardcode_number'];

		$payment->setinpaymentmethod('2');
		$payment->setnrinstallment($_POST['installment']);


	}//end elseif
	else
	{

		Payment::setError(Rule::VALIDATE_CHECKOUT_METHOD);
		header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
		exit;

	}//end else


	/*echo "<pre>";
	var_dump($inholdertypedoc);
	var_dump($desholderdocument);
	var_dump($nrholderddd);
	var_dump($nrholderphone);
	var_dump($dtholderbirth);
	
	var_dump($desholderzipcode);
	var_dump($desholderaddress);
	var_dump($desholdernumber);
	var_dump($desholdercomplement);
	var_dump($desholderdistrict);
	var_dump($desholdercity);
	
	var_dump($desholdername);
	var_dump($descardcode_number);
	var_dump($descardcode_month);
	var_dump($descardcode_year);
	var_dump($descardcode_number);

	exit;*/



	$cart = new Cart();

	$data = [

		'dessessionid'=>session_id(),
		'iduser'=>$user->getiduser(),
		'incartstatus'=>0

	];//end $data


	$cart->setData($data);

	$cart->update();





	//$account = new Account();
	//$account->get((int)$user->getiduser());






	
	$wirecard = new Wirecard();

	//$account = new Account();
	//$account->get((int)$user->getiduser());

	$wirecardCustomerData = $wirecard->createCustomer(

		$user->getdesperson(),
		$user->getdesemail(),
		$user->getdtbirth(),
		$user->getintypedoc(),
		$user->getdesdocument(),
		$payment->getinpaymentmethod(),
		$user->getnrcountryarea(),
		$user->getnrddd(),
		$user->getnrphone(),
		$address->getdeszipcode(),
		$address->getdesaddress(),
		$address->getdesnumber(),
		$address->getdescomplement(),
		$address->getdesdistrict(),
		$address->getdescity(),
		$address->getdesstatecode(),
		$desholdername,
		$descardcode_month,
		(int)$descardcode_year,
		$descardcode_number,
		$descardcode_cvc

	);//END createCustomer







	$customer = new Customer();

	try
	{

		$customer->setData([

			'iduser'=>$user->getiduser(),
			'descustomercode'=>$wirecardCustomerData['descustomercode'],
			'desname'=>$user->getdesperson(),
			'desemail'=>$user->getdesemail(),
			'nrcountryarea'=>$user->getnrcountryarea(),
			'nrddd'=>$user->getnrddd(),
			'nrphone'=>$user->getnrphone(),
			'intypedoc'=>$user->getintypedoc(),
			'desdocument'=>$user->getdesdocument(),
			'deszipcode'=>$address->getdeszipcode(),
			'desaddress'=>$address->getdesaddress(),
			'desnumber'=>$address->getdesnumber(),
			'descomplement'=>$address->getdescomplement(),
			'desdistrict'=>$address->getdesdistrict(),
			'descity'=>$address->getdescity(),
			'desstate'=>$address->getdesstatecode(),
			'descountry'=>$address->getdescountrycode(),
			'descardcode'=>$wirecardCustomerData['descardcode'],
			'desbrand'=>$wirecardCustomerData['desbrand'],
			'infirst6'=>$wirecardCustomerData['infirst6'],
			'inlast4'=>$wirecardCustomerData['inlast4'],
			'dtbirth'=>$user->getdtbirth()

		]);//end setData

		

		$customer->save();
		
	}//end try
	catch ( \Exception $e )
	{

		Payment::setError(Rule::GENERAL_ERROR);
		header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
		exit;
		
	}//end catch




	
	$plan = new Plan();

	$lastplan = $plan->getLastPlanPurchased((int)$user->getiduser());

	$inplan = Plan::getPlanArray($_POST['inplancode']);

	$timezone = new DateTimeZone('America/Sao_Paulo');

	$dt_now = new DateTime('now');

	$dt_now->setTimezone($timezone);




	$plan->setData([

		'iduser'=>$user->getiduser(),
		'inplancode'=>$inplan['inplancode'],
		'incontext'=>$inplan['inplancontext'],
		'inmigration'=>2,
		'inperiod'=>$inplan['inperiod'],
		'desplan'=>$inplan['desplan'],
		'vlprice'=>$inplan['vlprice'],
		'dtbegin'=>$dt_now->format('Y-m-d'),
		'dtend'=>$lastplan['dtend']

	]);//end setData



	$plan->save();



	$cart->addItem( $plan->getidplan(), 0);


				


	$wirecardPaymentData = $wirecard->payOrderPlan(

		$customer->getdescustomercode(),
		$cart->getidcart(),
		Rule::NR_COUNTRY_AREA,
		$nrholderddd,
		$nrholderphone,
		$desholdername,
		$dtholderbirth,
		$inholdertypedoc,
		$desholderdocument,
		$desholderzipcode,
		$desholderaddress,
		$desholdernumber,
		$desholdercomplement,
		$desholderdistrict,
		$desholdercity,
		$desholderstate,
		$payment->getinpaymentmethod(),
		$payment->getnrinstallment(),
		$descardcode_month,
		$descardcode_year,
		$descardcode_number,
		$descardcode_cvc

	);//end wirecardPaymentData




		

	try
	{


		$payment->setData([

			'iduser'=>$user->getiduser(),
			'despaymentcode'=>$wirecardPaymentData['despaymentcode'],
			'inpaymentstatus'=>$wirecardPaymentData['inpaymentstatus'],
			'incharge'=>0,
			'inrefunded'=>0,
			'inpaymentmethod'=>$payment->getinpaymentmethod(),
			'nrinstallment'=>$payment->getnrinstallment(),
			'deslinecode'=>$wirecardPaymentData['deslinecode'],
			'desprinthref'=>$wirecardPaymentData['desprinthref'],
			'desholdername'=>$desholdername,
			'nrholdercountryarea'=>Rule::NR_COUNTRY_AREA,
			'nrholderddd'=>$nrholderddd,
			'nrholderphone'=>$nrholderphone,
			'inholdertypedoc'=>$inholdertypedoc,
			'desholderdocument'=>$desholderdocument,
			'desholderzipcode'=>$desholderzipcode,
			'desholderaddress'=>$desholderaddress,
			'desholdernumber'=>$desholdernumber,
			'desholdercomplement'=>$desholdercomplement,
			'desholderdistrict'=>$desholderdistrict,
			'desholdercity'=>$desholdercity,
			'desholderstate'=>$desholderstate,
			'dtholderbirth'=>$dtholderbirth

		]);//end setData

		

		$payment->update();
		
	}//end try
	catch ( \Exception $e )
	{


		Payment::setError(Rule::GENERAL_ERROR);
		header('Location: /dashboard/upgrade/checkout?plano='.$_POST['inplancode']);
		exit;
		
	}//end catch







	if( in_array((int)$payment->getinpaymentmethod(), [1,2]) )
	{

		//$vlmktpercentage = Rule::MKT_CARD_PERCENTAGE;
		//$vlmktfixed = Rule::MKT_CARD_FIXED;
		
		$vlpropercentage = Rule::PRO_CARD_PERCENTAGE;
		$vlprofixed = Rule::PRO_CARD_FIXED;
		$nrantecipationperiod = Rule::CARD_ANTECIPATION_PERIOD;

	}//end if
	else
	{

		//$vlmktpercentage = Rule::MKT_BOLETO_PERCENTAGE;
		//$vlmktfixed = Rule::MKT_BOLETO_FIXED;
		$vlpropercentage = NULL;
		$vlprofixed = Rule::PRO_BOLETO;
		$nrantecipationperiod = Rule::BOLETO_ANTECIPATION_PERIOD;

	}//end else



	//$vlantecipation = Wirecard::getAntecipationValue($payment->getnrinstallment());

	

	$fee = new Fee();

	$fee->setData([

		'iduser'=>$user->getiduser(),
		'idpayment'=>$payment->getidpayment(),
		'vlmktpercentage'=>NULL,
		'vlmktfixed'=>NULL,
		'vlpropercentage'=>$vlpropercentage,
		'vlprofixed'=>$vlprofixed,
		'vlantecipation'=>$wirecardPaymentData['vlantecipation'],
		'nrantecipationperiod'=>$nrantecipationperiod
		

	]);//end setData


	$fee->save();




	$cart->setincartstatus('1');
	$cart->update();
	Cart::removeFromSession();





	
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
		# code...
		$userMailer = new Mailer(
				
			Rule::EMAIL_PLAN,

			"plan", 
			
			array(

				"user"=>$user->getValues(),
				"plan"=>$plan->getValues(),
				"order"=>$order->getValues(),
				"consort"=>$consort->getValues()

			),

			$user->getdeslogin(),

			$user->getdesnick(),

			$consort->getdesconsortemail(),

			$consort->getdesconsort()

		
		);//end Mailer

	}//end if
	else
	{


		$userMailer = new Mailer(
				
			Rule::EMAIL_PLAN,

			"plan-boleto", 
			
			array(

				"user"=>$user->getValues(),
				"plan"=>$plan->getValues(),
				"order"=>$order->getValues(),
				"consort"=>$consort->getValues()

			),

			$user->getdeslogin(),

			$user->getdesnick(),

			$consort->getdesconsortemail(),

			$consort->getdesconsort()

		
		);//end Mailer


	}//end else

	
	$userMailer->send();


	//$plan->updateLastPlanDtEnd($lastplan['idplan'], $user->getiduser(), $plan->getdtbegin());

	

	//$user->setinplancontext($inplan['inplancontext']);
	//$user->setinplan($plan->getinplancode());
	//$user->setdtplanend($plan->getdtend());

	
	//$user->update();
	$user->setToSession();


	if(isset($_SESSION['planUpgradeValues'])) unset($_SESSION['planUpgradeValues']);


	Payment::setSuccess('Upgrade de Plano realizado');
	
	//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

	header("Location: /dashboard/meu-plano");
	exit;



});//END route















$app->get( "/dashboard/upgrade", function()
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







	if ( !in_array((int)$validate['incontext'], [1,2]) )
	{
		# code...
		Payment::setError(Rule::VALIDATE_UPGRADE);
		header('Location: /dashboard/meu-plano');
		exit;

	}//end if




	

	//$plan = new Plan();

	//$plan = substr($validate['inplancode'], 0, 1);
	$sufix = substr($validate['inplancode'], 1, 2);

	$inplan = Plan::getPlanArrayUpgrade($validate['incontext'], $sufix);


	

	/*$plan = new Plan();


	if( (int)$validate['incontext'] == 0 )
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
		
 		"plans-upgrade", 
		
		[
			'inplan'=>$inplan,
			'sufix'=>$sufix,
			'user'=>$user->getValues(),
			'validate'=>$validate,
			'error'=>Plan::getError(),
			'success'=>Plan::getSuccess()
			

		]
	
	);//end setTpl

});//END route










?>