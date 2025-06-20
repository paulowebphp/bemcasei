<?php

use Core\Maintenance;
use Core\PageDashboard;
use Core\Rule;
use Core\Wirecard;
use Core\Validate;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Plan;
use Core\Model\Payment;
//use Core\Model\PaymentStatus;
use Core\Model\Address;
use Core\Model\Customer;
use Core\Model\Order;
use Core\Model\Cart;
use Core\Model\Consort;
use Core\Model\Fee;


















































$app->post( "/dashboard/renovar/checkout", function()
{


	$_SESSION['planRenewalValues'] = $_POST;



	//$method = 'cartao-proprio';

	
	


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


	/*
	if ( (int)$validate['incontext'] == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	*/



	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if


	}//end if
	









	/*
	if ( 


		!isset($_POST['inplancode'])
		||
		(int)$_POST['inplancode'] == 0
		||
		!Validate::validateInplancode($_POST['inplancode'])

	)
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
		exit;



	}//end if
	*/

	$plan = new Plan();

	$lastplan0 = $plan->getLastPlan((int)$user->getiduser());

	


	if ( 


		isset($_POST['inplancode'])
		&&
		Validate::validateInplancode($_POST['inplancode'])
		&&
		(int)$_POST['inplancode'] != 0


	)
	{

		

		if (


			in_array((int)$lastplan0['inpaymentstatus'], [5,9])


		)
		{

			$planRenewalCodeValidate = false;

			$planRenewalArray = Plan::getPlanArrayRenewal( $lastplan0['incontext'] );

			

			foreach ($planRenewalArray as $row) 
			{

				if($row['inplancode'] == $_POST['inplancode'])
				{

					$planRenewalCodeValidate = true;

				}//end if

			}//end foreach

			if($planRenewalCodeValidate)
			{

				$inplancode = $_POST['inplancode'];

			}//end if
			else
			{

				Plan::setError('O código e plano que você está tentando usar não é válido');
				header('Location: /dashboard/renovar');
				exit;

			}//end else


		}//end if
		else
		{

			Plan::setError(Rule::PLAN_WAIT_FOR_AUTHORIZATION);
			header('Location: /dashboard/renovar');
			exit;

		}//end else



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/renovar');
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

		/*
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

		*/












		

		if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
		{

			Payment::setError(Rule::ERROR_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if








		if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
		{

			
			Payment::setError(Rule::VALIDATE_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		



		
		if(
			
			!isset($_POST['desdocument']) 
			|| 
			$_POST['desdocument'] === ''
			
		)
		{


			Payment::setError(Rule::ERROR_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


		}//end if

		if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
		{

			Payment::setError(Rule::VALIDATE_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if











		if(
			
			!isset($_POST['nrddd']) 
			|| 
			$_POST['nrddd'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if












		if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
		{

			Payment::setError(Rule::VALIDATE_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if














		if(
			
			!isset($_POST['nrphone']) 
			|| 
			$_POST['nrphone'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		







		if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
		{

			Payment::setError(Rule::VALIDATE_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if














		if(
			
			!isset($_POST['dtbirth']) 
			|| 
			$_POST['dtbirth'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DATE_BIRTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$dtbirth = Validate::validateDate($_POST['dtbirth'], 0) )
		{

			Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if










		if( 
		
			!isset($_POST['deszipcode']) 
			|| 
			$_POST['deszipcode'] === ''
		)
		{

			Payment::setError(Rule::ERROR_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


			
		}//end if


		if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
		{
			Payment::setError(Rule::VALIDATE_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;
		}//end if












		if(
			!isset($_POST['desaddress']) 
			|| 
			$_POST['desaddress'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desaddress = Validate::validateStringNumber($_POST['desaddress']) )
		{

			Payment::setError(Rule::VALIDATE_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		

		if(
			
			!isset($_POST['desnumber']) 
			|| 
			$_POST['desnumber'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
		{

			Payment::setError(Rule::VALIDATE_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['desdistrict']) 
			|| 
			$_POST['desdistrict'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desdistrict = Validate::validateStringNumber($_POST['desdistrict']) )
		{

			Payment::setError(Rule::VALIDATE_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if
        



        if(
				
			!isset($_POST['descity']) 
			|| 
			$_POST['descity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['descity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
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
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if


		
		$desstate = $stateArray['desstatecode'];



		$desholdername = null;
		$descardcode_number = null;
		$descardcode_month = null;
		$descardcode_year = null;
		$descardcode_cvc = null;

		
		
		$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);

		$intypedoc = 0;




		$payment->setinpaymentmethod(0);
		$payment->setnrinstallment(1);





















	}//end if
	elseif(  

		isset($_POST['checkout-third-part-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-third-part-card'],1)

	)
	{






		
		if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
		{

			
			Payment::setError(Rule::ERROR_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if








		if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
		{

			
			Payment::setError(Rule::VALIDATE_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if







		if(
			
			!isset($_POST['desdocument']) 
			|| 
			$_POST['desdocument'] === ''
			
		)
		{


			Payment::setError(Rule::ERROR_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


		}//end if

		if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
		{

			Payment::setError(Rule::VALIDATE_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if
		











		if(
			
			!isset($_POST['nrddd']) 
			|| 
			$_POST['nrddd'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
		{

			Payment::setError(Rule::VALIDATE_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if














		if(
			
			!isset($_POST['nrphone']) 
			|| 
			$_POST['nrphone'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		







		if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
		{

			Payment::setError(Rule::VALIDATE_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if














		if(
			
			!isset($_POST['dtbirth']) 
			|| 
			$_POST['dtbirth'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DATE_BIRTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$dtbirth = Validate::validateDate($_POST['dtbirth'], 0) )
		{

			Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if










		if( 
		
			!isset($_POST['deszipcode']) 
			|| 
			$_POST['deszipcode'] === ''
		)
		{

			Payment::setError(Rule::ERROR_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


			
		}//end if


		if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
		{

			Payment::setError(Rule::VALIDATE_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		if(
			!isset($_POST['desaddress']) 
			|| 
			$_POST['desaddress'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desaddress = Validate::validateStringNumber($_POST['desaddress']) )
		{

			Payment::setError(Rule::VALIDATE_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		

		if(
			
			!isset($_POST['desnumber']) 
			|| 
			$_POST['desnumber'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
		{

			Payment::setError(Rule::VALIDATE_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['desdistrict']) 
			|| 
			$_POST['desdistrict'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desdistrict = Validate::validateStringNumber($_POST['desdistrict']) )
		{

			Payment::setError(Rule::VALIDATE_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if








		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


		}//end if












		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_HOLDER_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			Payment::setError(Rule::VALIDATE_HOLDER_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_MONTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_MONTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{
			Payment::setError(Rule::ERROR_CARD_YEAR);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_YEAR);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if









		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_CVC);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_CVC);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if









		



		if(
				
			!isset($_POST['descity']) 
			|| 
			$_POST['descity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['descity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if

		$descity = $cityArray['descity'];







		if(
				
			!isset($_POST['desstate']) 
			|| 
			$_POST['desstate'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_STATE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if


		
		$desstate = $stateArray['desstatecode'];


		









		
		$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);

		$intypedoc = 0;






		$payment->setinpaymentmethod(1);
		$payment->setnrinstallment($_POST['installment']);








		




	}//end else if
	elseif( 

		isset($_POST['checkout-own-card'])
		&&
		Validate::validateCheckoutMethod($_POST['checkout-own-card'],2)

	)
	{






		

		if(	!isset($_POST['desname']) || $_POST['desname'] == '' )
		{
			
			Payment::setError(Rule::ERROR_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if








		if( ( $desname = Validate::validateStringUcwords($_POST['desname'], true, false) ) === false )
		{

			
			Payment::setError(Rule::VALIDATE_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if









		if(
			
			!isset($_POST['desdocument']) 
			|| 
			$_POST['desdocument'] === ''
			
		)
		{


			Payment::setError(Rule::ERROR_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


		}//end if

		if( !$desdocument = Validate::validateDocument(0, $_POST['desdocument']) )
		{

			Payment::setError(Rule::VALIDATE_CPF);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;

		}//end if
		











		if(
			
			!isset($_POST['nrddd']) 
			|| 
			$_POST['nrddd'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		if( !$nrddd = Validate::validateDDD($_POST['nrddd']) )
		{

			Payment::setError(Rule::VALIDATE_DDD);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if














		if(
			
			!isset($_POST['nrphone']) 
			|| 
			$_POST['nrphone'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		







		if( !$nrphone = Validate::validatePhone($_POST['nrphone']) )
		{

			Payment::setError(Rule::VALIDATE_PHONE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if














		if(
			
			!isset($_POST['dtbirth']) 
			|| 
			$_POST['dtbirth'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DATE_BIRTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$dtbirth = Validate::validateDate($_POST['dtbirth'], 0) )
		{

			Payment::setError(Rule::VALIDATE_DATE_PAST_TO_NOW);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if










		if( 
		
			!isset($_POST['deszipcode']) 
			|| 
			$_POST['deszipcode'] === ''
		)
		{

			Payment::setError(Rule::ERROR_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


			
		}//end if


		if( !$deszipcode = Validate::validateCEP($_POST['deszipcode']) )
		{

			Payment::setError(Rule::VALIDATE_ZIPCODE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		if(
			!isset($_POST['desaddress']) 
			|| 
			$_POST['desaddress'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desaddress = Validate::validateStringNumber($_POST['desaddress']) )
		{

			Payment::setError(Rule::VALIDATE_ADDRESS);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if












		

		if(
			
			!isset($_POST['desnumber']) 
			|| 
			$_POST['desnumber'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$desnumber = Validate::validateNumber($_POST['desnumber']) )
		{

			Payment::setError(Rule::VALIDATE_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['desdistrict']) 
			|| 
			$_POST['desdistrict'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if




		if( !$desdistrict = Validate::validateStringNumber($_POST['desdistrict']) )
		{

			Payment::setError(Rule::VALIDATE_DISTRICT);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if








		if(
		
			!isset($_POST['descardcode_number']) 
			|| 
			$_POST['descardcode_number'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if





		if( !$descardcode_number = Validate::validateCardNumber($_POST['descardcode_number']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_NUMBER);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;


		}//end if












		if(
			
			!isset($_POST['desholdername']) 
			|| 
			$_POST['desholdername'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_HOLDER_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if




		if( !$desholdername = Validate::validateCardName($_POST['desholdername']) )
		{

			Payment::setError(Rule::VALIDATE_HOLDER_NAME);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['descardcode_month']) 
			|| 
			$_POST['descardcode_month'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_MONTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_month = Validate::validateMonth($_POST['descardcode_month']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_MONTH);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if











		if(
			
			!isset($_POST['descardcode_year']) 
			|| 
			$_POST['descardcode_year'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_YEAR);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_year = Validate::validateYear($_POST['descardcode_year']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_YEAR);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if









		if(
			
			!isset($_POST['descardcode_cvc']) 
			|| 
			$_POST['descardcode_cvc'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CARD_CVC);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if

		if( !$descardcode_cvc = Validate::validateCvc($_POST['descardcode_cvc']) )
		{

			Payment::setError(Rule::VALIDATE_CARD_CVC);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
			exit;



		}//end if









		



		if(
				
			!isset($_POST['descity']) 
			|| 
			$_POST['descity'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if



		if ( ( $cityArray = Address::getCity($_POST['descity']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_CITY);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if

		$descity = $cityArray['descity'];







		if(
				
			!isset($_POST['desstate']) 
			|| 
			$_POST['desstate'] === ''
			
		)
		{

			Payment::setError(Rule::ERROR_STATE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if



		if ( ( $stateArray = Address::getState($_POST['desstate']) ) === false ) 
		{
			# code...
			Payment::setError(Rule::VALIDATE_STATE);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);			exit;

		}//end if


		
		$desstate = $stateArray['desstatecode'];


		




		
		$descomplement = Validate::validateStringNumber($_POST['descomplement'], false, true);

		$intypedoc = 0;












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
		
		/*

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

		$desholderstate = $address->getdesstate();


		*/

		//$desholdername = $_POST['desholdername'];
		//$descardcode_number = $_POST['descardcode_number'];
		//$descardcode_month = $_POST['descardcode_month'];
		//$descardcode_year = $_POST['descardcode_year'];
		//$descardcode_number = $_POST['descardcode_number'];

		$payment->setinpaymentmethod(2);
		$payment->setnrinstallment($_POST['installment']);



	

	}//end elseif
	else
	{

		Payment::setError(Rule::VALIDATE_CHECKOUT_METHOD);
		header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
		exit;

	}//end else


	$nrcountryarea = Rule::NR_COUNTRY_AREA;
	$descountrycode = Rule::DESCOUNTRYCODE;



	/*
	echo "<pre>";
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

	exit;
	*/


	$cart = new Cart();

	$data = [

		'dessessionid'=>session_id(),
		'iduser'=>$user->getiduser(),
		'incartstatus'=>0,
		'incartitem'=>0

	];//end $data


	$cart->setData($data);

	$cart->update();

	$cart->setToSession();



	//$account = new Account();
	//$account->get((int)$user->getiduser());






	
	$wirecard = new Wirecard();

	//$account = new Account();
	//$account->get((int)$user->getiduser());

	$wirecardCustomerData = $wirecard->createCustomer(

		$desname,
		$user->getdesemail(),
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
		$desholdername,
		$descardcode_month,
		(int)$descardcode_year,
		$descardcode_number,
		$descardcode_cvc


	);//END createCustomer


	/*echo '<pre>';
	var_dump($wirecardCustomerData);
	var_dump($address);
	exit;*/


	$customer = new Customer();

	try 
	{

		$customer->setData([


			'iduser'=>$user->getiduser(),
			'descustomercode'=>$wirecardCustomerData['descustomercode'],
			'desname'=>$desname,
			'desemail'=>$user->getdesemail(),
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
	catch ( \Exception $e) 
	{

		Payment::setError(Rule::GENERAL_ERROR);
		header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
		exit;
		
	}//end catch




	

	//$plan = new Plan();

	$lastplan = $plan->getLastPlanPurchased($user->getiduser());

	
	$inplan = Plan::getPlanArray($_POST['inplancode']);

	

	$dtbegin = new DateTime($lastplan['dtend'] ." + 1 day");

	//$dtbegin->format('Y-m-d');

	$dtend = new DateTime($dtbegin->format('Y-m-d') . ' +'. $inplan['inperiod'] .' month');



	//$dtend->format('Y-m-d');



	$plan->setData([

		'iduser'=>$user->getiduser(),
		'inplancode'=>$inplan['inplancode'],
		'incontext'=>$inplan['inplancontext'],
		'inmigration'=>1,
		'inperiod'=>$inplan['inperiod'],
		'desplan'=>$inplan['desplan'],
		'vlprice'=>$inplan['vlprice'],
		'dtbegin'=>$dtbegin->format('Y-m-d'),
		'dtend'=>$dtend->format('Y-m-d')

	]);//end setData

	





	$plan->save();



	


	$cart->addItem( $plan->getidplan(), 0);


		


	$wirecardPaymentData = $wirecard->payOrderPlan(

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
		$descardcode_month,
		$descardcode_year,
		$descardcode_number,
		$descardcode_cvc

	);//end payPlan





		

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
		
	}//en try 
	catch ( \Exception $e ) 
	{

		Payment::setError(Rule::GENERAL_ERROR);
			header('Location: /dashboard/renovar/checkout?plano='.$_POST['inplancode']);
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








	# code...
	$cart->setincartstatus(1);
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
	
	$email_renewal = utf8_decode(Rule::EMAIL_RENEWAL);



	if ( (int)$payment->getinpaymentmethod() != 0 )
	{

		


		$userMailer = new Mailer(
				
			$email_renewal,

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
				
			$email_renewal,

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


	$user->setinplan($plan->getinplancode());
	//$user->setdtplanend($plan->getdtend());


	
	$user->update();
	$user->setToSession();




	if(isset($_SESSION['planRenewalValues'])) unset($_SESSION['planRenewalValues']);


	Payment::setSuccess('Renovação de Plano realizada');
	
	//User::loginAfterPlanPurchase($user->getdeslogin(), $user->getdespassword());

	header("Location: /dashboard/meu-plano");
	exit;
	



});//END route































































































$app->get( "/dashboard/renovar/checkout", function()
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


	/*
	if ( (int)$validate['incontext'] == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	*/



	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if


	}//end if
	




	

	

	


	//$plans = Plan::getPlansFullArray();


	$plan = new Plan();

	$lastplan = $plan->getLastPlan((int)$user->getiduser());
	




	

	


	

	if ( 


		isset($_GET['plano'])
		&&
		Validate::validateInplancode($_GET['plano'])
		&&
		(int)$_GET['plano'] != 0


	)
	{

		

		if (


			in_array((int)$lastplan['inpaymentstatus'], [5,9])


		)
		{

			$planRenewalCodeValidate = false;

			$planRenewalArray = Plan::getPlanArrayRenewal( $lastplan['incontext'] );


			foreach ($planRenewalArray as $row) 
			{

				if($row['inplancode'] == $_GET['plano'])
				{

					$planRenewalCodeValidate = true;

				}//end if

			}//end foreach

			if($planRenewalCodeValidate)
			{

				$plan = $_GET['plano'];

			}//end if
			else
			{

				Plan::setError('O código e plano que você está tentando usar não é válido');
				header('Location: /dashboard/renovar');
				exit;

			}//end else


		}//end if
		else
		{

			Plan::setError(Rule::PLAN_WAIT_FOR_AUTHORIZATION);
			header('Location: /dashboard/renovar');
			exit;

		}//end else



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/renovar');
		exit;

	}//end else if





	/*
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
			header('Location: /dashboard/renovar');
			exit;

		}//end else



	}//end if
	else
	{

		Plan::setError(Rule::VALIDATE_PLAN_PURCHASE_CODE);
		header('Location: /dashboard/renovar');
		exit;

	}//end else if
	*/








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

	

	$address = new Address();

	$address->get((int)$user->getiduser());









	$state = Address::listAllStates();






	

	$city = [];

	if ( (int)$address->getidstate() > 0 ) 
	{
		# code...
		$city = Address::listAllCitiesByState((int)$address->getidstate());

	}//end if
	else
	{

		$city = Address::listAllCitiesByState(1);

		

	}//end else

	


	$city2 = [];
	

	if ( isset($_SESSION["planRenewalValues"]) ) 
	{
		# code...
		$city2 = Address::listAllCitiesByState($_SESSION["planRenewalValues"]['desstate']);

	}//end if
	else
	{

		$city2 = Address::listAllCitiesByState(1);
	

	}//end else





	




	$page = new PageDashboard();

	$page->setTpl(
		
		"plans-renewal-checkout",

		[
			'user'=>$user->getValues(),
			'address'=>$address->getValues(),
			//'payment'=>$payment->getValues(),
			'state'=>$state,
			'city'=>$city,
			'city2'=>$city2,
			'inplan'=>$inplan,
			'validate'=>$validate,
			'error'=>Payment::getError(),
			'success'=>Payment::getError(),
			'planRenewalValues'=> (isset($_SESSION["planRenewalValues"])) ? $_SESSION["planRenewalValues"] : ['desname'=>'','desemail'=>'','desdocument'=>'', 'nrddd'=>'', 'nrphone'=>'', 'dtbirth'=>'', 'deszipcode'=>'', 'desaddress'=>'', 'desnumber'=>'', 'descomplement'=>'', 'desdistrict'=>'', 'desstate'=>'', 'descity'=>'']

		]
	
	);//end setTpl






});//END route




































































$app->get( "/dashboard/renovar", function()
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


	/*
	if ( (int)$validate['incontext'] == 0 )
	{
		# code...
		User::setError(Rule::VALIDATE_PLAN);
		header('Location: /dashboard');
		exit;

	}//end if
	*/



	if($validate)
	{	

		if( (int)$validate['incontext'] == 0 )
		{

			Payment::setError(Rule::VALIDATE_PLAN);
			header('Location: /dashboard/meu-plano');
			exit;

		}//end if


	}//end if
	












	   
	//$inplan = Plan::getPlanArrayRenewal( $user->getinplancontext() );
	
	$inplan = Plan::getPlanArrayRenewal( $validate['incontext'] );




	




	$page = new PageDashboard();

	$page->setTpl(
		
 		"plans-renewal", 
		
		[
			'user'=>$user->getValues(),
			//'user'=>$user->getValues(),
			'validate'=>$validate,
			'inplan'=>$inplan,
			'success'=>Plan::getSuccess(),		
			'error'=>Plan::getError()		

		]
	
	);//end setTpl

});//END route























?>