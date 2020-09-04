<?php 

namespace Core;

use \Core\Model;
use \Core\Rule;
use \Core\DB\Sql;
use \Core\Model\Account;
use \Core\Model\Bank;
use \Core\Model\Order;
use \Core\Model\Payment;
use \Core\Model\PaymentStatus;
use \Core\Model\Plan;
use \Core\Model\User;
use \Moip\Moip;
use \Moip\Auth\OAuth;








class Wirecard extends Model
{


	private $wirecard_access_token;
	private $wirecard_primary_receiver;
	//private $wirecard_app;
	//private $wirecard_api_token;
	//private $wirecard_api_key;


	const SESSION_ERROR = "WirecardError";







	public function __construct()
	{

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
		{
			# BEM CASEI SANDBOX PJ
			#####################################################################
			$this->wirecard_access_token = 'd53f289e62344cd88ac90b20077f2513_v2';
			$this->wirecard_primary_receiver = 'MPA-89DC0863B0D3';
			//$this->wirecard_app = 'APP-335B0VPAUCEH';
			#####################################################################


		}//end if
		else
		{

			# BEM CASEI PRODUCTION PJ
			#####################################################################
			$this->wirecard_access_token = '75ea4315ea064f88a361fa3d0eaaf5e2_v2';
			$this->wirecard_primary_receiver = 'MPA-8E6DB57A5738';
			//$this->wirecard_app = 'APP-SOJRLP26BSJK';
			#####################################################################

		}//end else


	}//end construct






	//public function getWireca=rdAccessToken(){ return $this->wirecard_access_token; }//end getter
	//public function getWirecardPrimary=Receiver() { return $this->wirecard_primary_receiver; }//end getter
	//public function getWirecardApp(){ return $this->wirecard_app; }//end getter
	












	public function createAccount(

		$desname,
		$desemail,
		$dtbirth,
		$desdocument,
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
	  	$descountry,
	  	$hash = ''


	  	
	)
	{


		try 
		{


			/*echo '<pre>';
			echo '1:<br>';
			var_dump($desname);
			var_dump($desemail);
			var_dump($dtbirth);
			var_dump($desdocument);
			var_dump($nrcountryarea);
			var_dump($nrddd);
			var_dump($nrphone);
			var_dump($deszipcode);
			var_dump($desaddress);
			var_dump($desnumber);
			var_dump($descomplement);
			var_dump($desdistrict);		
			var_dump($descity);
			var_dump($desstate);
			var_dump($descountry);
			var_dump($hash);
			exit;*/

			


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_SANDBOX);


			}//end if
			else
			{


				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);


			}//end else





			

			$nameArray = explode(' ', $desname, 2);

			$firstName = $nameArray[0];
			$lastName = $nameArray[1];

			//$ddd = substr($nrphone, 0, 2);
			//$phone = substr($nrphone, 2, strlen($nrphone));


		
			  
		
			$account = $moip->accounts()
				->setName($firstName)
			  ->setLastName($lastName)
			  ->setEmail($desemail)
			  ->setBirthDate($dtbirth)
			  ->setTaxDocument($desdocument)
			  ->setType('MERCHANT')
			  ->setTransparentAccount(true)
			  ->setPhone($nrddd, $nrphone, $nrcountryarea)
			  ->addAlternativePhone($nrddd, $nrphone, $nrcountryarea)
			  ->addAddress($desaddress, 
			  	(int)$desnumber, 
			  	$desdistrict, 
			  	$descity, 
			  	$desstate, 
			  	$deszipcode, 
			  	$descomplement, 
			  	$descountry)
			  ->create();



			return [

				'desaccountcode'=>$account->getid(),
				'desaccesstoken'=>$account->getaccessToken(),
				'deschannelid'=>$account->getchannelId()

			];


			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{

		    //StatusCode 401
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::ACCOUNT_UNAUTHORIZED);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Account::setError(Rule::ACCOUNT_UNAUTHORIZED);
				header('Location: /cadastrar/'.$hash);
				exit;

		    }//end else

			



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::ACCOUNT_VALIDATION);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Account::setError(Rule::ACCOUNT_VALIDATION);
		    	//Account::setError(printf($e->__toString()));
				header('Location: /cadastrar/'.$hash);
				exit;

		    }//end else




		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::ACCOUNT_UNEXPECTED);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Account::setError(Rule::ACCOUNT_UNEXPECTED);
				header('Location: /cadastrar/'.$hash);
				exit;

		    }//end else



		}//end catch






		

	}//END createAccount









































































	public function createCustomer(
 	
	  	$desname,
		$desemail,
		$dtbirth,
		$intypedoc,
		$desdocument,
		$inpaymentmethod,
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
	  	$descardcode_year,
	  	$descardcode_number,
	  	$descardcode_cvc,
	  	$hash = ''

	)
	{





		
		try 
		{


			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_SANDBOX);


			}//end if
			else
			{


				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);


			}//end else



			
			/*
			echo "<pre>";
			var_dump($desname);
		var_dump($desemail);
		var_dump($dtbirth);
		var_dump($intypedoc);
		var_dump($desdocument);
		var_dump($inpaymentmethod);
		var_dump($nrcountryarea);
		var_dump($nrddd);
		var_dump($nrphone);
	  	var_dump($deszipcode); 
		var_dump($desaddress);
		var_dump($desnumber); 
	  	var_dump($descomplement);
	  	var_dump($desdistrict); 
	  	var_dump($descity); 
	  	var_dump($desstate);
	  	var_dump($desholdername);
	  	var_dump($descardcode_month);
	  	var_dump($descardcode_year);
	  	var_dump($descardcode_number);
	  	var_dump($descardcode_cvc);
	  	var_dump($hash);
	  	var_dump($this->wirecard_access_token);
		var_dump($this->wirecard_primary_receiver);
			exit;
			*/



			$customer = $moip->customers()->setOwnId( uniqid() )
				    ->setFullname( $desname )
				    ->setEmail( $desemail )
				    ->setBirthDate( $dtbirth )
				    ->setTaxDocument( $desdocument )
				    ->setPhone($nrddd, $nrphone)
				    ->addAddress( 'BILLING',
				        $desaddress, 
				        $desnumber,
				        $desdistrict, 
				        $descity, 
				        $desstate,
				        $deszipcode, 
				        $descomplement)
				    ->addAddress( 'SHIPPING',
				        $desaddress, 
				        $desnumber,
				        $desdistrict,
				        $descity, 
				        $desstate,
				        $deszipcode, 
				        $descomplement)
				    ->create();




			if( in_array((int)$inpaymentmethod, [1,2]) )
			{
				# code...
				$customerid = $customer->getid();


				$intypedoc = ((int)$intypedoc == 0)? 'CPF' : 'CNPJ';


					


				$customerCreditCard = $moip->customers()->creditCard()
				    ->setExpirationMonth( $descardcode_month )
				    ->setExpirationYear( $descardcode_year )
				    ->setNumber( $descardcode_number )
				    ->setCVC( $descardcode_cvc )
				    ->setFullName( $desholdername )
				    ->setBirthDate( $dtbirth )
				    ->setTaxDocument( $intypedoc, $desdocument )
				    ->setPhone( $nrcountryarea, $nrddd, $nrphone )
				    ->create( $customerid );

				    


				return [

					'descustomercode'=>$customerid,
					'descardcode'=>$customerCreditCard->getid(),
					'desbrand'=>$customerCreditCard->getbrand(),
					'infirst6'=>$customerCreditCard->getfirst6(),
					'inlast4'=>$customerCreditCard->getlast4()

				];


			}//end if
			else
			{	

				return [

					'descustomercode'=>$customer->getid(),
					'descardcode'=> null, 
					'desbrand'=> null,
					'infirst6'=> null, 
					'inlast4'=> null

				];


			}//end else
			

		

			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{

		    //StatusCode 401
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::CUSTOMER_UNAUTHORIZED);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else if( $uri[1] == 'checkout' )
		    {

		    	Payment::setError(Rule::CUSTOMER_UNAUTHORIZED);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else
		    else
		    {

		    	Payment::setError(Rule::CUSTOMER_UNAUTHORIZED);
				header('Location: /'.$uri[1].'/checkout');
				exit;

		    }//end else

			



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::CUSTOMER_VALIDATION);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else if( $uri[1] == 'checkout' )
		    {

		    	Payment::setError(Rule::CUSTOMER_VALIDATION);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else
		    else
		    {

		    	Payment::setError(Rule::CUSTOMER_VALIDATION);
				header('Location: /'.$uri[1].'/checkout');
				exit;

		    }//end else




		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

				if( $uri[2] == 'comprar-plano' )
				{

					Plan::setError(Rule::CUSTOMER_UNEXPECTED);
					header('Location: /dashboard/comprar-plano');
					exit;

				}//end if
				elseif( $uri[2] == 'upgrade' )
				{
					
					Plan::setError(Rule::CUSTOMER_UNEXPECTED);
					header('Location: /dashboard/upgrade');
					exit;

				}//end elseif
				elseif( $uri[2] == 'renovar' )
				{

					Plan::setError(Rule::CUSTOMER_UNEXPECTED);
					header('Location: /dashboard/renovar');
					exit;


				}//end else

		    }//end if
		    else if( $uri[1] == 'checkout' )
		    {

		    	Payment::setError(Rule::CUSTOMER_UNEXPECTED);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else
		    else
		    {

		    	Payment::setError(Rule::CUSTOMER_UNEXPECTED);
				header('Location: /'.$uri[1].'/checkout');
				exit;

		    }//end else



		}//end catch



	}//END createCustomer



































































	public function getPlan( $idcart )
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT b.idplan,b.iduser,b.inplancode,b.inmigration,b.inperiod,b.desplan,b.vlprice,b.dtbegin,b.dtend
			FROM tb_cartsitems a 
			INNER JOIN tb_plans b ON a.iditem = b.idplan
			INNER JOIN tb_carts c ON a.idcart = c.idcart
            WHERE a.initem = 0
			AND a.idcart = :idcart
			ORDER BY a.dtregister DESC
            LIMIT 1

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select


		



		if( count($results) > 0 )
		{
			
			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				$results[0]['desplan'] = utf8_encode($results[0]['desplan']);
					
				
			}//end if

			return $results[0];

			
		}//end if



	}//END getProducts






















































	public function payOrderPlan(

		$descustomercode,
		$idcart,
		$nrholdercountryarea,
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
	  	$inpaymentmethod,
	  	$nrinstallment,
	  	$descardcode_month,
	  	$descardcode_year,
	  	$descardcode_number,
	  	$descardcode_cvc,
	  	$hash = ''


	)
	{

		/*echo '<pre>';
		var_dump($descustomercode);
		var_dump($idcart);
		var_dump($nrholdercountryarea);
		var_dump($nrholderddd);
		var_dump($nrholderphone);
		var_dump($desholdername);
		var_dump($dtholderbirth);
		var_dump($inholdertypedoc);
		var_dump($desholderdocument);
		var_dump($desholderzipcode); 
		var_dump($desholderaddress);
		var_dump($desholdernumber); 
	  	var_dump($desholdercomplement);
	  	var_dump($desholderdistrict); 
	  	var_dump($desholdercity); 
	  	var_dump($desholderstate);
	  	var_dump($inpaymentmethod);
	  	var_dump($nrinstallment);
	  	var_dump($descardcode_month);
	  	var_dump($descardcode_year);
	  	var_dump($descardcode_number);
	  	var_dump($descardcode_cvc);
	  	var_dump($hash);
	  	exit;*/




		try
		{



			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_SANDBOX);


			}//end if
			else
			{


				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);


			}//end else







			$customer = $moip->customers()->get($descustomercode);








			//$nrholderddd = (int)substr($nrholderphone, 0, 2);
			//$nrholderphone = (int)substr($nrholderphone, 2, strlen($nrholderphone));

			$item = Wirecard::getPlan($idcart);

			


			$inholdertypedoc = ((int)$inholdertypedoc === 0) ? 'CPF' : 'CNPJ';




			$order = $moip->orders()->setOwnId( uniqid() );


			

			$order = $order->addItem( 

	        	$item['desplan'],
	            1,
	            Rule::SKU_PREFIX_PLAN.$item['idplan'],
	            (int)str_replace(".", "", $item['vlprice'])

	        );//end addItem




			$vlantecipation = Wirecard::getAntecipationValue($nrinstallment);

			

			if ( in_array((int)$inpaymentmethod, [1,2]) ) 
		    {
		    	# code...
		    	
		    	$processor = ($item['vlprice']*((0.0429)+$vlantecipation))+0.69;
		    	//$processor = number_format($processor, 2, ".","");


		    	$primary_liquid = $item['vlprice'] - (float)$processor;
   	
		    	

		    }//end if
		    else
		    {


		    	$processor = 3.49;
		    	$primary_liquid = $item['vlprice'] - $processor;




		    }//end else




		   
	    	$primary_liquid = number_format($primary_liquid, 2, ".","");
		    $processor = number_format($processor, 2, ".","");


			$vlseller = NULL;
			$vlmarketplace = $primary_liquid;
			$vlprocessor = $processor;






			$order = $order
		        ->setShippingAmount(0)
		        ->setCustomer($customer)
		        ->create();
		        



			if( in_array((int)$inpaymentmethod, [1,2]) )
			{	

				$holder = $moip->holders()->setFullname( $desholdername )
				    ->setBirthDate( $dtholderbirth )
				    ->setTaxDocument( $desholderdocument, $inholdertypedoc)
				    ->setPhone($nrholderddd, $nrholderddd, $nrholdercountryarea)
				    ->setAddress('BILLING', 
				    	$desholderaddress, 
				    	$desholdernumber, 
				    	$desholderdistrict, 
				    	$desholdercity, 
				    	$desholderstate, 
				    	$desholderzipcode, 
				    	$desholdercomplement
				);//end holder


				    
				
				$payment = $order->payments()->setCreditCard( $descardcode_month, 
					substr($descardcode_year, 2, strlen($descardcode_year)), 
					$descardcode_number, 
					$descardcode_cvc, 
					$holder )
					->setInstallmentCount($nrinstallment)
					->setStatementDescriptor(Rule::STATEMENT_DESCRIPTOR)
		    		->execute();


		    		

				$inpaymentstatus = PaymentStatus::getStatus($payment->getstatus());


	    	

		    	return [
						
						
					'desordercode'=>$order->getid(),
					'despaymentcode'=>$payment->getid(),
					'inpaymentstatus'=>$inpaymentstatus,
					'vltotal'=>$item['vlprice'],
					'vlseller'=>$vlseller,
					'vlmarketplace'=>$vlmarketplace,
					'vlprocessor'=>$vlprocessor,
					'vlantecipation'=>$vlantecipation,
					'deslinecode'=>null,
					'desprinthref'=>null
			
				];
		    	

			}//end if
			else
			{

				
				$logo_uri = 'https://bemcasei.com.br/res/images/logo/logo-main.png';;

				$expiration_date = new \DateTime('now + 5 day');

				$instruction_lines = ['A', 'A', 'A'];


				

				$payment = $order->payments()  
				    ->setBoleto($expiration_date, $logo_uri, $instruction_lines)
				    ->setStatementDescriptor(Rule::STATEMENT_DESCRIPTOR)
				    ->execute();


				/*echo '<pre>';
var_dump('1');
var_dump($logo_uri);
var_dump($expiration_date);
var_dump($instruction_lines);
var_dump($expiration_date->format('Y-m-d'));
var_dump($payment);
exit;*/


				$inpaymentstatus = PaymentStatus::getStatus($payment->getstatus());



		    	return [
						
						
					'desordercode'=>$order->getid(),
					'despaymentcode'=>$payment->getid(),
					'inpaymentstatus'=>$inpaymentstatus,
					'vltotal'=>$item['vlprice'],
					'vlseller'=>$vlseller,
					'vlmarketplace'=>$vlmarketplace,
					'vlprocessor'=>$vlprocessor,
					'vlantecipation'=>$vlantecipation,
					'deslinecode'=>$payment->getLineCodeBoleto(),
					'desprinthref'=>$payment->getHrefPrintBoleto()
			
				];


			}//end else


			
	    	


		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{

		    //StatusCode 401
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::PLAN_UNAUTHORIZED);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Payment::setError(Rule::PLAN_UNAUTHORIZED);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else

			



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::PLAN_VALIDATION);
		    	//printf($e->__toString());
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Payment::setError(Rule::PLAN_VALIDATION);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else




		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

		    if( $uri[1] == 'dashboard' )
		    {

		    	Payment::setError(Rule::PLAN_UNEXPECTED);
				header('Location: /dashboard/meu-plano');
				exit;

		    }//end if
		    else
		    {

		    	Payment::setError(Rule::PLAN_UNEXPECTED);
				header('Location: /checkout/'.$hash);
				exit;

		    }//end else



		}//end catch



	}//END payOrderPlan

















































	public function payOrderProducts(

		$desaccountcode,
		$descustomercode,
		$idcart,
		$nrholdercountryarea,
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
	  	$inpaymentmethod,
	  	$nrinstallment,
	  	$incharge,
	  	$descardcode_month,
	  	$descardcode_year,
	  	$descardcode_number,
	  	$descardcode_cvc


	)
	{


		/*echo '<pre>';
		var_dump($desaccountcode);
		var_dump($descustomercode);
		var_dump($idcart);
		var_dump($nrholdercountryarea);
		var_dump($nrholderddd);
		var_dump($nrholderphone);
		var_dump($desholdername);
		var_dump($dtholderbirth);
		var_dump($inholdertypedoc);
		var_dump($desholderdocument);
	  	var_dump($desholderzipcode); 
		var_dump($desholderaddress);
		var_dump($desholdernumber); 
	  	var_dump($desholdercomplement);
	  	var_dump($desholderdistrict); 
	  	var_dump($desholdercity); 
	  	var_dump($desholderstate);
	  	var_dump($inpaymentmethod);
	  	var_dump($nrinstallment);
	  	var_dump($incharge);
	  	var_dump($descardcode_month);
	  	var_dump($descardcode_year);
	  	var_dump($descardcode_number);
	  	var_dump($descardcode_cvc);
	  	exit;*/
		

		try 
		{	
				

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_SANDBOX);


			}//end if
			else
			{


				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);


			}//end else


			
			//$ddd = substr($nrphone, 0, 2);
			//$phone = substr($nrphone, 2, strlen($nrphone));

			$customer = $moip->customers()->get($descustomercode);

			
			
	
			//$sku = Rule::PLAN_SKU_PREFIX.$plan['insellercategory'].$idplan;

			$inholdertypedoc = ((int)$inholdertypedoc === 0) ? 'CPF' : 'CNPJ';
			


			$items = Wirecard::getProducts($idcart);

		
	  	
			

			$order = $moip->orders()->setOwnId( uniqid() );


			


			$interest = 0;

		    foreach($items as $item)
		    {

		    	$interestProduct = Wirecard::getInterest($item['vltotal'], $inpaymentmethod, $nrinstallment, $incharge);


		    	$interestProduct = number_format($interestProduct, 2, ".", "");


		        $order = $order->addItem( 

		        	$item['desproduct'],
		            (int)$item['nrqtd'],
		            Rule::SKU_PREFIX_PRODUCT.$item['idproduct'],
		            (int)str_replace(".", "", $interestProduct)

		        );//end addItem


		        
		        //$interestSubTotal = Wirecard::getInterest($item['vltotal'], $inpaymentmethod, $nrinstallment, $incharge);
		       
		    	//$interestSubTotal = number_format($interestSubTotal, 2, ".","");
	    
		        //$interest += $interestSubTotal;



		        $interest += ($interestProduct*$item['nrqtd']);


		    }//end foreach


			



		   	//$primary = (($interest*0.007)-0.69);
		    //$secondary = (($interest*0.993)+0.69);

		    $vlantecipation = Wirecard::getAntecipationValue($nrinstallment);


		    


		    if ( (int)$inpaymentmethod == 1 ) 
		    {
		    	# code...
		    	$primary = ($interest*0.007)-0.69;
		    	$secondary = ($interest*0.993)+0.69;
		    	
		    	$processor = ($interest*((0.0429)+$vlantecipation))+0.69;
		    	$secondary_liquid = (float)$secondary - (float)$processor;


		    }//end if
		    else
		    {
		    	

		    	$primary = ($interest*0.0499)-3.49;
		    	$secondary = ($interest*0.9501)+3.49;

		    	$processor = 3.49;
		    	$secondary_liquid = (float)$secondary - (float)$processor;
		    		    	

		    }//end else


		    $primary = number_format($primary,2,".","");
	    	$secondary = number_format($secondary,2,".","");

	    	$primary_handler = $primary;
	    	$primary_handler = number_format($primary_handler, 2, ".","");

	    	$secondary_liquid = number_format($secondary_liquid, 2, ".","");
	    	$processor = number_format($processor, 2, ".","");
	    	

		    $primary = (int)str_replace(".", "", $primary);
		    $secondary = (int)str_replace(".", "", $secondary);
		   
	    	
		    //$processor = number_format($processor, 2, ".","");
			$vlseller = $secondary_liquid;
			$vlmarketplace = $primary_handler;
			$vlprocessor = $processor;
		    
			
			
			
		   	
	   	
 			$order = $order
		        ->setShippingAmount(0)
		        ->setCustomer($customer)
		        ->addReceiver($this->wirecard_primary_receiver, 'PRIMARY', $primary, 0, false)
		        ->addReceiver($desaccountcode, 'SECONDARY', $secondary, 0, true)
		        ->create();

			
				

		    /*
		    $order = $order
		        ->setShippingAmount(0)
		        ->setCustomer($customer)
		        ->addReceiver(Rule::WIRECARD_PRIMARY_RECEIVER, 'PRIMARY', $primary, 0, false)
		        ->addReceiver($desaccountcode, 'SECONDARY', $secondary, 0, true)
		        ->create();
		        */

				

		     
	    
		     if( (int)$inpaymentmethod == 1 )
			{	

				$holder = $moip->holders()->setFullname( $desholdername )
				    ->setBirthDate( $dtholderbirth )
				    ->setTaxDocument( $desholderdocument, $inholdertypedoc)
				    ->setPhone($nrholderddd, $nrholderphone, $nrholdercountryarea)
				    ->setAddress('BILLING', 
				    	$desholderaddress, 
				    	$desholdernumber, 
				    	$desholderdistrict, 
				    	$desholdercity, 
				    	$desholderstate, 
				    	$desholderzipcode, 
				    	$desholdercomplement);//end holder

				    
				 
				
				$payment = $order->payments()->setCreditCard($descardcode_month, 
					substr($descardcode_year, 2, strlen($descardcode_year)), 
					$descardcode_number, 
					$descardcode_cvc, 
					$holder)
					->setInstallmentCount($nrinstallment)
					->setStatementDescriptor(Rule::STATEMENT_DESCRIPTOR)
		    		->execute();


		    	
		    		

				$inpaymentstatus = PaymentStatus::getStatus($payment->getstatus());
		    	

		    	return [
						
						
					'desordercode'=>$order->getid(),
					'despaymentcode'=>$payment->getid(),
					'inpaymentstatus'=>$inpaymentstatus,
					'vltotal'=>number_format($interest,2,".",""),
					'vlseller'=>$vlseller,
					'vlmarketplace'=>$vlmarketplace,
					'vlprocessor'=>$vlprocessor,
					'vlantecipation'=>$vlantecipation,
					'deslinecode'=>null,
					'desprinthref'=>null
			
				];
		    	

			}//end if
			else
			{

				$logo_uri = 'https://bemcasei.com.br/res/images/logo/logo-main.png';;

				$expiration_date = new \DateTime('now + 5 day');

				$instruction_lines = ['A', 'A', 'A'];

				$payment = $order->payments()  
				    ->setBoleto($expiration_date, $logo_uri, $instruction_lines)
				    ->setStatementDescriptor(Rule::STATEMENT_DESCRIPTOR)
				    ->execute();


				$inpaymentstatus = PaymentStatus::getStatus($payment->getstatus());


		    	return [
						
						
					'desordercode'=>$order->getid(),
					'despaymentcode'=>$payment->getid(),
					'inpaymentstatus'=>$inpaymentstatus,
					'vltotal'=>number_format($interest,2,".",""),
					'vlseller'=>$vlseller,
					'vlmarketplace'=>$vlmarketplace,
					'vlprocessor'=>$vlprocessor,
					'vlantecipation'=>$vlantecipation,
					'deslinecode'=>$payment->getLineCodeBoleto(),
					'desprinthref'=>$payment->getHrefPrintBoleto()
			
				];


			}//end else




	




		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{


		    //StatusCode 401
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

			Payment::setError(Rule::PRODUCT_UNAUTHORIZED);
			header('Location: /'.$uri[1].'/checkout');
			exit;



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

			Payment::setError(Rule::PRODUCT_VALIDATION);
			header('Location: /'.$uri[1].'/checkout');
			exit;



		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

			Payment::setError(Rule::PRODUCT_UNEXPECTED);
			header('Location: /'.$uri[1].'/checkout');
			exit;



		}//end catch


		


#catch (Exception $e)
#{
#	$uri = explode('/', $_SERVER["REQUEST_URI"]);
#
#	Payment::setError("Falha no pagamento: ".$e);
#	header('Location: /'.$uri[1].'/checkout');
#	exit;
#}//end catch




#Shipping é o valor do frete
#Addition é se quiser repassar mais algum valor, como por exemplo se quiser repassar as taxas Wirecard
#E Discount é um desconto, que pode ser um cupom desconto do seu lado por exemplo
#Se não for usar, é só deixar como 0
#Posso ajudar em algo mais?





	}//END payOrderProducts







































































	









	public static function getProducts( $idcart )
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsitems a 
			INNER JOIN tb_products b ON a.iditem = b.idproduct
			INNER JOIN tb_carts c ON a.idcart = c.idcart
			WHERE a.initem = 1
			AND a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct


			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select



		if( count($results) > 0 )
		{
			
			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					$row['desproduct'] = utf8_encode($row['desproduct']);

				}//end foreach


				
			}//end if

			return $results;

			
		}//end if



	}//END getProducts



























	/*public function getProducts( $idcart )
	{

		$sql = new Sql();

		$results = $sql->select("

		    SELECT b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension,
			COUNT(*) AS nrqtd,
			SUM(b.vlprice) as vltotal
			FROM tb_cartsproducts a 
			INNER JOIN tb_products b USING (idproduct)
			INNER JOIN tb_carts c ON a.idcart = c.idcart
			WHERE a.idcart = :idcart
			GROUP BY b.idproduct,b.iduser, b.incategory, b.desproduct,b.vlprice,b.desphoto,b.desextension
			ORDER BY b.desproduct

			", 
			
			[

				':idcart'=>$idcart

			]
		
		);//end select



		//$results[0]['desaddress'] = utf8_encode($results[0]['desaddress']);
		if( count($results) > 0 )
		{
			

			return $results;

			
		}//end if



	}//END getProducts*/










































	public static function getInterest( $value, $inpaymentmethod, $nrinstallment, $incharge )
	{
		

		if((int)$incharge == 0)
		{

			//Casal arca com tarifas

			if ((int)$inpaymentmethod == 1)
			{


				# code...
				switch ($nrinstallment) 
				{
					case '1':
						# code...
						return $value;

					case '2':
						# code...
						return ($value*0.9501)/0.9223;
						
						

					case '3':
						# code...
						return ($value*0.9501)/0.9089;
						


					case '4':
						# code...
						return ($value*0.9501)/0.8954;
						


					case '5':
						# code...
						return( $value*0.9501)/0.882;
						


					case '6':
						# code...
						return ($value*0.9501)/0.8685;
					
					
				}//end switch




			}//end if
			else
			{
				//boleto

				

				return $value;


			}//end else

		

		}//end if
		else
		{

			//Convidado arca com tarifas

			if ((int)$inpaymentmethod == 1)
			{


				# code...
				switch ($nrinstallment) 
				{
					case '1':
						# code...
						return $value/0.9501;


					case '2':
						# code...
						return $value/0.9223;
						


					case '3':
						# code...
						return $value/0.9089;
						


					case '4':
						# code...
						return $value/0.8954;
						


					case '5':
						# code...
						return $value/0.882;
						


					case '6':
						# code...
						return $value/0.8685;
						
					
					
				}//end switch




			}//end if
			else
			{
				//boleto
				return ($value/0.9501);


			}//end else



		}//end else



	}//END getInterest







































	/*public static function getInterest( $vlOrder, $inpaymentmethod, $nrinstallment, $incharge )
	{



		if((int)$incharge == 0)
		{

			//Casal arca com tarifas

			if ((int)$inpaymentmethod == 1)
			{


				# code...
				switch ($nrinstallment) 
				{
					case '1':
						# code...
						return $vlOrder;


					case '2':
						# code...
						return number_format((($vlOrder*0.9501)/0.9223), 2, ".", "");
						
						

					case '3':
						# code...
						return number_format((($vlOrder*0.9501)/0.9089), 2, ".", "");
						


					case '4':
						# code...
						return number_format((($vlOrder*0.9501)/0.8954), 2, ".", "");
						


					case '5':
						# code...
						return number_format((($vlOrder*0.9501)/0.882), 2, ".", "");
						


					case '6':
						# code...
						return number_format((($vlOrder*0.9501)/0.8685), 2, ".", "");
					
					
				}//end switch




			}//end if
			else
			{
				//boleto
				return $vlOrder;


			}//end else

		

		}//end if
		else
		{

			//Convidado arca com tarifas

			if ((int)$inpaymentmethod == 1)
			{


				# code...
				switch ($nrinstallment) 
				{
					case '1':
						# code...
						return number_format(($vlOrder/0.9501), 2, ".", "");


					case '2':
						# code...
						return number_format(($vlOrder/0.9223), 2, ".", "");
						


					case '3':
						# code...
						return number_format(($vlOrder/0.9089), 2, ".", "");
						


					case '4':
						# code...
						return number_format(($vlOrder/0.8954), 2, ".", "");
						


					case '5':
						# code...
						return number_format(($vlOrder/0.882), 2, ".", "");
						


					case '6':
						# code...
						return number_format(($vlOrder/0.8685), 2, ".", "");
						
					
					
				}//end switch




			}//end if
			else
			{
				//boleto
				return ($vlOrder+3.45);


			}//end else



		}//end else



	}//END getInterest*/











































	public static function getAntecipationValue( $nrinstallment )
	{

		switch ($nrinstallment) 
		{


			case '1':
				# code...
				return Rule::ANTECIPATION_1;



			case '2':
				# code...
				return Rule::ANTECIPATION_2;



			case '3':
				# code...
				return Rule::ANTECIPATION_3;



			case '4':
				# code...
				return Rule::ANTECIPATION_4;



			case '5':
				# code...
				return Rule::ANTECIPATION_5;



			case '6':
				# code...
				return Rule::ANTECIPATION_6;
			
			
		}//end switch



	}//END getAntecipationValue









	






























	public function getBalances( $desaccesstoken )
	{

				

		try 
		{


			



			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_SANDBOX);

			}//end if
			else
			{


				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_PRODUCTION);


			}//end else




	 		$balances = $moip->balances()->get();	

			

			$current = $balances->getcurrent()[0]->amount;
			$future = $balances->getfuture()[0]->amount;	
			$unavailable = $balances->getunavailable()[0]->amount;





			if( !$balances->getcurrent()[0]->amount == 0)
			{
			
				$lenghtCurrent = strlen($balances->getcurrent()[0]->amount);


				if ($lenghtCurrent >= 3)
				{
				 
					$current = substr_replace($current, ".", $lenghtCurrent-2).substr($current, $lenghtCurrent-2);

				}//end if
				else
				{

					$current = '0'. substr_replace($current, ".", $lenghtCurrent-2) . substr($current, $lenghtCurrent-2);

				}//end else
					
			}//ennd if
			






			if( !$balances->getfuture()[0]->amount == 0)
			{
				
				$lenghtFuture = strlen($balances->getfuture()[0]->amount);
				

				if ($lenghtFuture >= 3)
				{
				 
					$future = substr_replace($future, ".", $lenghtFuture-2).substr($future, $lenghtFuture-2);

				}//end if
				else
				{

					$future = '0'. substr_replace($future, ".", $lenghtFuture-2) . substr($future, $lenghtFuture-2);

				}//end else

			}//ennd if
			





			if( !$balances->getunavailable()[0]->amount == 0)
			{
				
				$lenghtUnavailable = strlen($balances->getunavailable()[0]->amount);
				

				if ($lenghtUnavailable >= 3)
				{
				 
					$unavailable = substr_replace($unavailable, ".", $lenghtUnavailable-2).substr($unavailable, $lenghtUnavailable-2);

				}//end if
				else
				{

					$unavailable = '0'. substr_replace($unavailable, ".", $lenghtUnavailable-2) . substr($unavailable, $lenghtUnavailable-2);

				}//end else

			}//ennd if
			

			
		
			

			return [

				'current'=>$current,
				'future'=>$future,
				'unavailable'=>$unavailable

			];//end return


			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{



		    //StatusCode 401
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);


		    if ( !isset($uri[2]) )
		    {
		    	# code...
		    	User::getError(Rule::GENERAL_UNAUTHORIZED);
				header('Location: /dashboard');
				exit;

		    }//end if
		    elseif( $uri[2] == 'conta-bancaria' )
		    {

		    	Order::getError(Rule::BANK_UNAUTHORIZED);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else
		    elseif( $uri[2] == 'transferencias' )
		    {

		    	Transfer::getError(Rule::TRANSFER_UNAUTHORIZED);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else

			



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

			if ( !isset($uri[2]) )
		    {
		    	# code...
		    	User::getError(Rule::GENERAL_VALIDATION);
				header('Location: /dashboard');
				exit;

		    }//end if
		    elseif( $uri[2] == 'conta-bancaria' )
		    {

		    	Order::getError(Rule::BANK_VALIDATION);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else
		    elseif( $uri[2] == 'transferencias' )
		    {

		    	Transfer::getError(Rule::TRANSFER_VALIDATION);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else



		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		    $uri = explode('/', $_SERVER["REQUEST_URI"]);

			if ( !isset($uri[2]) )
		    {
		    	# code...
		    	User::getError(Rule::GENERAL_UNEXPECTED);
				header('Location: /dashboard');
				exit;

		    }//end if
		    elseif( $uri[2] == 'conta-bancaria' )
		    {

		    	Order::getError(Rule::BANK_UNEXPECTED);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else
		    elseif( $uri[2] == 'transferencias' )
		    {

		    	Transfer::getError(Rule::TRANSFER_UNEXPECTED);
				header('Location: /dashboard/painel-financeiro');
				exit;

		    }//end else



		}//end catch



	}//END getBalances












































	public function createTransfer( $desaccesstoken, $desbankcode, $vlamount )
	{

		

		try 
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_SANDBOX);

			}//end if
			else
			{


				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_PRODUCTION);


			}//end else







			$vlamount = str_replace('.', '', $vlamount);


			$transfer = $moip->transfers()
		    ->setTransfersToBankAccount($vlamount, $desbankcode)
		    ->execute();
	    


	        return [

	        	'destransfercode'=>$transfer->getid()

	        ];




			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{



		    //StatusCode 401
		   	Transfer::setError(Rule::TRANSFER_UNAUTHORIZED);
			header('Location: /dashboard/transferencias');
			exit;



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		   	Transfer::setError(Rule::TRANSFER_VALIDATION);
			header('Location: /dashboard/transferencias');
			exit;



		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		   	Transfer::setError(Rule::TRANSFER_UNEXPECTED);
			header('Location: /dashboard/transferencias');
			exit;



		}//end catch



	}//END transfer















































	public function createBank(


		$desbanknumber,
		$desagencynumber,
		$desagencycheck,
		$desaccountnumber,
		$desaccountcheck,
		$desaccounttype,
		$desname,
		$desdocument,
		$intypedoc,
		$desaccesstoken,
		$desaccountcode


	)
	{

		try 
		{

			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_SANDBOX);

			}//end if
			else
			{


				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_PRODUCTION);


			}//end else



			$wirecardDesdocumentFormat = $desdocument;

			

			if( (int)$intypedoc === 0 )
			{

				$firstTerm = substr($desdocument, 0, 3);
				$secondTerm = substr($desdocument, 3, 3);
				$thirdTerm = substr($desdocument, 6, 3);
				$fourthTerm = substr($desdocument, 9, 2);


				$wirecardDesdocumentFormat = $firstTerm . '.' . 
				$secondTerm . '.' . 
				$thirdTerm . '-' . 
				$fourthTerm;

			}//end if

			$intypedoc = ((int)$intypedoc === 0)? 'CPF' : 'CNPJ';


				
			$bank_account = $moip->bankaccount()
	        ->setBankNumber($desbanknumber)
	        ->setAgencyNumber($desagencynumber)
	        ->setAgencyCheckNumber($desagencycheck)
	        ->setAccountNumber($desaccountnumber)
	        ->setAccountCheckNumber($desaccountcheck)
	        ->setType($desaccounttype)
	        ->setHolder($desname, $wirecardDesdocumentFormat, $intypedoc)
	        ->create($desaccountcode);


	        return $bank_account->getid();




			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{



		    //StatusCode 401
		   	Bank::setError(Rule::BANK_UNAUTHORIZED);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		   	Bank::setError(Rule::BANK_VALIDATION);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		   	Bank::setError(Rule::BANK_UNEXPECTED);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch



        /*if( !empty($bank_account->getid()) )
		{

			return $bank_account->getid();

		}//end if
		else
		{
			return false;

		}//end else*/



      

	}//END createBank






































	public function updateBank(


		$desbanknumber,
		$desagencynumber,
		$desagencycheck,
		$desaccountnumber,
		$desaccountcheck,
		$desaccounttype,
		$desname,
		$desdocument,
		$intypedoc,
		$desaccesstoken,
		$desbankcode


	)
	{


		try 
		{

			

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_SANDBOX);

			}//end if
			else
			{


				$moip = new Moip(new OAuth($desaccesstoken), Moip::ENDPOINT_PRODUCTION);


			}//end else



			$firstTerm = substr($desdocument, 0, 3);
			$secondTerm = substr($desdocument, 3, 3);
			$thirdTerm = substr($desdocument, 6, 3);
			$fourthTerm = substr($desdocument, 9, 2);


			$wirecardDesdocumentFormat = $firstTerm . '.' . 
			$secondTerm . '.' . 
			$thirdTerm . '-' . 
			$fourthTerm;

			$intypedoc = ((int)$intypedoc === 0)? 'CPF' : 'CNPJ';

			
			$bank_account = $moip->bankaccount()
	        ->setBankNumber($desbanknumber)
	        ->setAgencyNumber($desagencynumber)
	        ->setAgencyCheckNumber($desagencycheck)
	        ->setAccountNumber($desaccountnumber)
	        ->setAccountCheckNumber($desaccountcheck)
	        ->setType($desaccounttype)
	        ->setHolder($desname, $wirecardDesdocumentFormat, $intypedoc)
	        ->update($desbankcode);


	        

	        return [

				'desbankcode'=>$bank_account->getid(),
				'desbanknumber'=>$bank_account->getbankNumber(),
			    'desagencynumber'=>$bank_account->getagencyNumber(),
			    'desagencycheck'=>$bank_account->getagencyCheckNumber(),
			    'desaccounttype'=>$bank_account->gettype(),
			    'desaccountnumber'=>$bank_account->getaccountNumber(),
			    'desaccountcheck'=>$bank_account->getaccountCheckNumber()
			    
			];


			
		}//end try
		catch( \Moip\Exceptions\UnautorizedException $e )
		{



		    //StatusCode 401
		   	Bank::setError(Rule::BANK_UNAUTHORIZED);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch
		catch( \Moip\Exceptions\ValidationException $e )
		{



		    //StatusCode entre 400 e 499 (exceto 401)
		   	Bank::setError(Rule::BANK_VALIDATION);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch
		catch( \Moip\Exceptions\UnexpectedException $e )
		{



		    //StatusCode >= 500
		   	Bank::setError(Rule::BANK_UNEXPECTED);
			header('Location: /dashboard/conta-bancaria');
			exit;



		}//end catch

        

        /*if( !empty($bank_account->getid()) )
		{

			return [

				'desbankcode'=>$bank_account->getid(),
				'desbanknumber'=>$bank_account->getbankNumber(),
			    'desagencynumber'=>$bank_account->getagencyNumber(),
			    'desagencycheck'=>$bank_account->getagencyCheckNumber(),
			    'desaccounttype'=>$bank_account->gettype(),
			    'desaccountnumber'=>$bank_account->getaccountNumber(),
			    'desaccountcheck'=>$bank_account->getaccountCheckNumber()
			    
			];

		}//end if
		else
		{
			return false;

		}//end else*/



      

	}//END updateBank
































	public static function wirecardTestBasic()
	{

		//$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);

		//$account = $moip->accounts()->checkExistence("012.242.026-86");


		$token = 'TTMRNZSMP3DN61DLF6TNDQ6LTE9YO6AR';

		$key = 'TGOAWSHZ6013ZU2PPJWHOCGM9E9BLCR5UHDLNB94';

		

		//$keysInBase64 = base64_encode($token.':'.$key);
		$keysInBase64 = base64_encode(Rule::WIRECARD_API_TOKEN.':'.Rule::WIRECARD_API_KEY);

		echo '<pre>';
		var_dump($keysInBase64);
		exit;


		
	}//EBD wirecardTest




























	public function wirecardTestOAuth()
	{

		

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
			{

				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_SANDBOX);


			}//end if
			else
			{


				$moip = new Moip(new OAuth($this->wirecard_access_token), Moip::ENDPOINT_PRODUCTION);


			}//end else


		$customer = $moip->customers()->getOwnId('CUSTOM007')
		    ->setPhone(19, 99999999)
		    ->addAddress('BILLING',
		        'Rua de teste999', 1239999,
		        'Bairro999', 'Sao Paulo', 'SP',
		        '01234567', 99999999)
		    ->create();

				echo '<pre>';
				//var_dump($customer->getfundingInstrument()->creditCard->id);
		//var_dump($customer->getfundingInstrument()->creditCard->brand);
		//var_dump($customer->getfundingInstrument()->creditCard->first6);
		//var_dump($customer->getfundingInstrument()->creditCard->last4);
		//var_dump($customer->getshippingAddress()->zipCode);
		//var_dump($customer->getshippingAddress()->street);
		//var_dump($customer->getshippingAddress()->streetNumber);
		//var_dump($customer->getshippingAddress()->complement);
		//var_dump($customer->getshippingAddress()->city);
		//var_dump($customer->getshippingAddress()->district);
		//var_dump($customer->getshippingAddress()->state);
		var_dump($customer->getshippingAddress()->country);
		echo '<br><br><br><br>';
		var_dump($customer);
		exit;

	}//END wirecardTestOAuth




























	

	public static function setError( $msg )
	{

		$_SESSION[Wirecard::SESSION_ERROR] = $msg;


	}//END setMsgErro





	public static function getError()
	{

		$msg = (isset($_SESSION[Wirecard::SESSION_ERROR])) ? $_SESSION[Wirecard::SESSION_ERROR] : "";

		Wirecard::clearError();

		return $msg;

	}//END getMsgErro





	public static function clearError()
	{

		$_SESSION[Wirecard::SESSION_ERROR] = NULL;

	}//END clearMsgError





















}//END class Wirecard






 ?>