<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Rule;
use Core\Validate;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Message;
use Core\Model\Menu;
use Core\Model\CustomStyle;









$app->get( "/:desdomain/mural-mensagens/:hash/mensagem-enviada", function( $desdomain, $hash )
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
		

		if ( (int)$menu->getinmessage() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if





		
		$idmessage = Validate::getHash($hash);

		if ( $idmessage == '' )
		{
			# code...
			Message::setError(Rule::VALIDATE_ID_HASH);
			header("Location: /".$desdomain."/mural-mensagens");
			exit;
			
		}//end if




		$message = new Message();

		//$message->getFromHash($hash);
		$message->getMessage((int)$idmessage);

		


		$consort = new Consort();

		$consort->get((int)$user->getiduser());



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());
		


		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "message-sent",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'consort'=>$consort->getValues(),
				'user'=>$user->getValues(),
				'message'=>$message->getValues(),
				'error'=>Message::getError(),
				'success'=>Message::getSuccess()

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

















$app->post( "/:desdomain/mural-mensagens/enviar", function( $desdomain )
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
		

		if ( (int)$menu->getinmessage() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if





		if( 
			
			!isset($_POST['desmessage']) 
			|| 
			$_POST['desmessage'] == ''
		)
		{

			Message::setError("Preencha o seu nome");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if

		if( ( $desmessage = Validate::validateStringWithAccent($_POST['desmessage']) ) === false )
		{	
			

			Message::setError("O nome não pode ser formado apenas com caracteres especiais, tente novamente");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if	







		if( 
			
			!isset($_POST['desemail']) 
			|| 
			$_POST['desemail'] == ''
		)
		{

			Message::setError("Preencha o seu e-mail.");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if

		if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
		{	
			
			Message::setError("O e-mail parece estar num formato inválido, tente novamente");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if





		if( 
			
			!isset($_POST['desdescription']) 
			|| 
			$_POST['desdescription'] == ''
		)
		{

			Message::setError("Escreve a mensagem a ser enviada");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if

		if( ( $desdescription = Validate::validateDescription($_POST['desdescription']) ) === false )
		{	
			

			Message::setError("A mensagem não pode ser formada apenas com caracteres especiais, tente novamente");
			header("Location: /".$user->getdesdomain()."/mural-mensagens/enviar");
			exit;

		}//end if	









		$message = new Message();

		$message->setData([

			'iduser'=>$user->getiduser(),
			'instatus'=>0,
			'desmessage'=>$desmessage,
			'desemail'=>$desemail,
			'desdescription'=>$desdescription

		]);


			
		$message->update();

		




		if( (int)$message->getidmessage() > 0)
		{


			$consort = new Consort();

			$consort->get((int)$user->getiduser());




			$userMailer = new Mailer(
						
				 
				Rule::EMAIL_MESSAGE_USER,

				"message-user", 
				
				array(

					"user"=>$user->getValues(),
					"message"=>$message->getValues(),
					"consort"=>$consort->getValues()

				),

				$user->getdeslogin(), 
				
				$user->getdesperson(),

				$consort->getdesconsortemail(),
				
				$consort->getdesconsort()
			
			);//end Mailer








			$guestMailer = new Mailer(
						
				
				
				Rule::EMAIL_MESSAGE_GUEST,

				"message-guest", 
				
				array(

					"user"=>$user->getValues(),
					"consort"=>$consort->getValues(),
					"message"=>$message->getValues()

				),

				$message->getdesemail(),

				$message->getdesmessage()
			
			);//end Mailer
			
			



		
			$userMailer->send();

			$guestMailer->send();
		





			$hash = base64_encode($message->getidmessage());

			//Message::setSuccess('Muito obrigado por enviar sua mensagem | Quando o casal aceitar, ela aparecerá no Mural');
			header('Location: /'.$user->getdesdomain().'/mural-mensagens/'.$hash.'/mensagem-enviada');
			exit;	

		}//end else







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


























$app->get( "/:desdomain/mural-mensagens/enviar", function( $desdomain )
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
		

		if ( (int)$menu->getinmessage() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if

		

		$consort = new Consort();

		$consort->get((int)$user->getiduser());


		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());
		

		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "message-create",
			
			[
				'customstyle'=>$customstyle->getValues(),	
				'consort'=>$consort->getValues(),	
				'user'=>$user->getValues(),
				'error'=>Message::getError(),
				'success'=>Message::getSuccess()

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
























$app->get( "/:desdomain/mural-mensagens", function( $desdomain )
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
		

		if ( (int)$menu->getinmessage() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if



		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());





		




		$message = new Message();

		$results = $message->getTemplatePage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);






		$nrtotal = $results['nrtotal'];


		/*if ( $results['nrtotal'] == 0 )
		{

			$results['results'] = [

				'desdescription'=>'',
				'desmessage'=>'',
				'dtregister'=>''

			];

		}//end if*/




		

		

		$pages = [];	
	    

		for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/'.$user->getdesdomain().'/mural-mensagens?'.http_build_query(
						
						[

							'pagina'=>$x+1

						]
					
					),

				'text'=>$x+1

				]
			
			);//end array_push

		}//end for




		
		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "message",
			
			[
				'pages'=>$pages,
				'customstyle'=>$customstyle->getValues(),
				'nrtotal'=>$nrtotal,
				'user'=>$user->getValues(),
				'message'=>$results['results'],
				'error'=>Message::getError(),
				'success'=>Message::getSuccess()

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