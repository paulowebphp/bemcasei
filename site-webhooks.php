<?php 

use \Core\Mailer;
use \Core\Rule;
use \Core\Model\User;
use \Core\Model\Plan;
use \Core\Model\Order;
use \Core\Model\Payment;
use \Core\Model\PaymentStatus;
use \Core\Model\Transfer;
use \Core\Model\TransferStatus;







$app->post( '/aa0dd51316ba/webhook', function()
{

	$json = file_get_contents('php://input');

	$data = json_decode($json, true);


	
	
	

	$status = explode('.', $data['event']);








	if ( $status[0] == 'PAYMENT' )
	{

		# code...
		$instatus = PaymentStatus::getStatus( $status[1] );

		//$results = Payment::getFromDespaymentcode( $data['resource']['payment']['id'] );

		
		if( isset($data['resource']['payment']['id']) )
		{


			$results = Payment::getFromDespaymentcode( $data['resource']['payment']['id'] );


		}//end if
		elseif ( isset($data['resourceId']) )
		{


			# code...
			$results = Payment::getFromDespaymentcode( $data['resourceId'] );



		}//end elseif
		elseif ( isset($data['resource']['id']) ) 
		{


			# code...
			$results = Payment::getFromDespaymentcode( $data['resource']['id'] );



		}//end elseif
		

		/*echo '<pre>';
		var_dump($instatus);
		var_dump($results['inpaymentstatus']);
		var_dump((int)$instatus > (int)$results['inpaymentstatus']);
		exit;*/



		/*
		
		const CREATED = 1;
		const WAITING = 2;
		const IN_ANALYSIS = 3;
		const PRE_AUTHORIZED = 4;

		const AUTHORIZED = 5;
		const CANCELLED = 6;

		const REFUNDED = 7;
		const REVERSED = 8;
		
		const SETTLED = 9;

		*/



		if ( !$results == false )
		{
			# code...

			if ( 

				(in_array( (int)$instatus, [1,2,3,4,5,6,9] )
				&&
				(int)$instatus >= (int)$results['inpaymentstatus'])
				||
				in_array( (int)$instatus, [7,8] )
			)
			{
				# code...

				Payment::updateFromNotification( (int)$results['idpayment'], (int)$instatus );




				if ( (int)$results['initem'] == 1 )
				{
					//pagamentos em cartão
					if (


						(int)$instatus == 5
						&&
						(int)$results['inpaymentmethod'] == 0


					)
					{
						# code...
						$order = new Order();

						$order->getProductsByCart( (int)$results['idcart'] );


						$sellerMailer = new Mailer(
												
							
							Rule::EMAIL_PRODUCT_SELLER_AUTHORIZED,

							"payment-seller-boleto-success", 
							
							array(

								"results"=>$results,
								"order"=>$order->getValues()

							),

							$results['deslogin'],

							$results['desnick'], 

							$results['desconsortemail'],

							$results['desconsort']
						
						);//end Mailer
						





						$buyerMailer = new Mailer(
												
							
							Rule::EMAIL_PRODUCT_BUYER_AUTHORIZED,

							"payment-buyer-boleto-success", 
							
							array(

								"results"=>$results,
								"order"=>$order->getValues()

							),

							$results['desemail'],

							$results['desname']

						
						);//end Mailer




						$sellerMailer->send();
						
						$buyerMailer->send();



					}//end if
					elseif( (int)$instatus == 6 )
					{



						$order = new Order();

						$order->getProductsByCart( (int)$results['idcart'] );


						$sellerMailer = new Mailer(
								
							
							Rule::EMAIL_PRODUCT_CANCELLED,

							"payment-seller-cancelled", 
							
							array(

								"results"=>$results,
								"order"=>$order->getValues()

							),

							$results['deslogin'],

							$results['desnick'], 

							$results['desconsortemail'],

							$results['desconsort']
						
						);//end Mailer


						
				






						$buyerMailer = new Mailer(
											
							
							Rule::EMAIL_PRODUCT_CANCELLED,

							"payment-buyer-cancelled", 
							
							array(

								"results"=>$results,
								"order"=>$order->getValues()

							),

							$results['desemail'],

							$results['desname']
						
						);//end Mailer




						$sellerMailer->send();
						
						$buyerMailer->send();


					}//end else


				}//end if
				else
				{

					//pagamentos em boleto
					if (

						(int)$instatus == 5
						&&
						(int)$results['inpaymentmethod'] == 0

					)
					{
						# code...
						$plan = new Plan();

						$plan->getById($results['iditem']);



						$sellerMailer = new Mailer(
												
							
							Rule::EMAIL_PLAN_AUTHORIZED,

							"plan-boleto-success", 
							
							array(

								"results"=>$results,
								"plan"=>$plan->getValues()

							),

							$results['deslogin'],

							$results['desnick'], 

							$results['desconsortemail'],

							$results['desconsort']
						
						);//end Mailer
						
						
						$sellerMailer->send();



					}//end if
					elseif( (int)$instatus == 6 )
					{

						$plan = new Plan();

						$plan->getById($results['iditem']);



						$sellerMailer = new Mailer(
												
							Rule::EMAIL_PLAN_CANCELLED,

							"plan-cancelled", 
							
							array(

								"results"=>$results,
								"plan"=>$plan->getValues()

							),

							$results['deslogin'],

							$results['desnick'], 

							$results['desconsortemail'],

							$results['desconsort']
						
						);//end Mailer
						

						$sellerMailer->send();



					}//end else


				}//end else




				


			}//end if


		}//end if



	}//end if
	else if( $status[0] == 'TRANSFER' )
	{


		# code...
		$instatus = TransferStatus::getStatus( $status[1] );


		if ( isset($data['resourceId']) )
		{


			# code...
			$results = Transfer::getFromDestransfercode( $data['resourceId'] );



		}//end if
		elseif ( isset($data['resource']['id']) ) 
		{


			# code...
			$results = Transfer::getFromDestransfercode( $data['resource']['id'] );



		}//end elseif
		elseif( isset($data['resource']['transfer']['id']) )
		{


			$results = Transfer::getFromDestransfercode( $data['resource']['transfer']['id'] );


		}//end elseif



		/*echo '<pre>';
		var_dump($data);
		var_dump($instatus);
		var_dump($data['resource']['transfer']['entries'][0]['eventId']);
		var_dump($data['resource']['transfer']['id']);
		exit;*/
	


		if( 

			!$results == false 
			&& 
			(int)$instatus >= (int)$results['intransferstatus']

		)
		{

			Transfer::updateFromNotification( (int)$results['idtransfer'], (int)$instatus );


			/*echo '<pre>';
			var_dump($data);
			var_dump($data['event']);
			var_dump($data['resourceId'] );
			var_dump($data['resource']['id'] );
			var_dump($status[0]);
			var_dump($status[1]);
			echo '<br><br><br>';
			var_dump($instatus);
			echo '<br><br><br>';
			var_dump('Results', $results);
			exit;*/

			/*if (

				(int)$instatus == 3

			) 
			{
				# code...
	

				$sellerMailer = new Mailer(
										
					$results['deslogin'], 
					$results['desnick'], 
					"Amar Casar - Compra de Plano",
					# template do e-mail em si na /views/email/ e não da administração
					"plan-cancelled", 
					
					array(

						"results"=>$results

					),

					$results['desconsortemail']
				
				);//end Mailer
				
				$sellerMailer->send();


			}//end if*/






		}//end if	
		

	}//end else
	else
	{

		return false;

	}//end else




	unset($results);
	unset($instatus);
	unset($status);
	unset($data);
	unset($json);
	

	
	#$paymentData = 'Event: ' . $data['event'] . PHP_EOL;
	#$paymentData .= 'Payment: ' . $data['resource']['payment']['id'] . PHP_EOL;
	#$paymentData .= 'Order: ' . $data['resource']['payment']['_links']['order']['title'] . PHP_EOL;
	#$paymentData .= 'Account: ' . $data['resource']['payment']['receivers'][1]['moipAccount']['id'] . PHP_EOL;
	

	#$orderData = 'Event: ' . $data['event'] . PHP_EOL;
	#$orderData .= 'Order: ' . $data['resource']['order']['id'] . PHP_EOL;
	#$orderData .= 'Payment: ' . $data['resource']['order']['payments'][0]['id'] . PHP_EOL;
	#$orderData .= 'Customer: ' . $data['resource']['order']['customer']['id'] . PHP_EOL;
	#$orderData .= 'Account: ' . $data['resource']['order']['customer']['moipAccount']['id'] . PHP_EOL;
	#$orderData .= 'Sku: ' . $data['resource']['order']['ownId'] . PHP_EOL;


	#if(!is_dir($dirUploads)) mkdir($dirUploads);


	#$logOrder = fopen( 'input.txt', 'a+');//end fopen
	#fwrite($logOrder, date('d/m/Y H:i:s') .  "\r\n\n" . $orderData .  "\r\n\n\n\n");
	#fclose($logOrder);


});//END route






















/*
$app->post( '/api/webhook', function()
{

	$json = file_get_contents('php://input');

	$data = json_decode($json, true);


	
	
	

	$status = explode('.', $data['event']);




	if ( $status[0] == 'PAYMENT' )
	{

		# code...
		$instatus = PaymentStatus::getStatus( $status[1] );

		$results = Payment::getFromDespaymentcode( $data['resource']['payment']['id'] );



		


		if( 

			!$results == false 
			&& 
			(int)$instatus > (int)$results['inpaymentstatus'] 

		)
		{



			Payment::updateFromNotification( (int)$results['idpayment'], (int)$instatus );


			if( 


				(int)$instatus == 9
				&&
				(int)$results['initem'] == 0

			)
			{


				$plan = new Plan();

				$plan->getById($results['iditem']);

				$sellerMailer = new Mailer(
										
					$results['deslogin'], 
					$results['desnick'], 
					"Amar Casar - Compra de Plano",
					# template do e-mail em si na /views/email/ e não da administração
					"plan-settled", 
					
					array(

						"results"=>$results,
						"plan"=>$plan->getValues()

					),

					$results['desconsortemail']
				
				);//end Mailer
				
				$sellerMailer->send();


			}//end if




		}//end if




	}//end if
	else if( $status[0] == 'TRANSFER' )
	{
		
		# code...
		$instatus = TransferStatus::getStatus( $status[1] );

		$results = Transfer::getFromDestransfercode( $data['resource']['transfer']['id'] );



	


		if( 

			!$results == false 
			&& 
			(int)$instatus > (int)$results['intransferstatus']

		)
		{

			Transfer::updateFromNotification( (int)$results['idtransfer'], (int)$instatus );


		}//end if


		
		

	}//end else
	else
	{

		return false;

	}//end else




	unset($results);
	unset($instatus);
	unset($status);
	unset($data);
	unset($json);
	

	




});//END route
*/









?>