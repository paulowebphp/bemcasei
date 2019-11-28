<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Mailer;
use Core\Rule;
use Core\Validate;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Rsvp;
use Core\Model\Menu;
use Core\Model\RsvpConfig;
use Core\Model\CustomStyle;









$app->get( "/:desdomain/rsvp/confirmacao/:hash/presenca-confirmada", function( $desdomain, $hash )
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
		

		if ( (int)$menu->getinrsvp() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if







		$idrsvp = Validate::getHash($hash);

		if ( $idrsvp === false )
		{
			# code...
			Rsvp::setError(Rule::VALIDATE_ID_HASH);
			header("Location: /".$user->getdesdomain()."/rsvp");
			exit;
			
		}//end if



		$rsvp = new Rsvp();

		//$rsvp->getFromHash($hash);
		
		$rsvp->getRsvp((int)$idrsvp);




		
		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());


		


		$consort = new Consort();

		$consort->get((int)$user->getiduser());



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());




		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());





		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "rsvp-confirmed",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'rsvpconfig'=>$rsvpconfig->getValues(),
				'hash'=>$hash,
				'consort'=>$consort->getValues(),
				'rsvpconfig'=>$rsvpconfig->getValues(),
				'rsvp'=>$rsvp->getValues(),
				'user'=>$user->getValues(),
				'error'=>Rsvp::getError(),
				'success'=>Rsvp::getSuccess()

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





























$app->post( "/:desdomain/rsvp/confirmacao/:hash", function( $desdomain, $hash )
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
		

		if ( (int)$menu->getinrsvp() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if






		$idrsvp = Validate::getHash($hash);

		if ( $idrsvp == '' )
		{
			# code...
			Rsvp::setError(Rule::VALIDATE_ID_HASH);
			header("Location: /".$desdomain."/rsvp");
			exit;
			
		}//end if





		$rsvp = new Rsvp();

		$rsvp->getRsvp((int)$idrsvp);


		if ( (int)$rsvp->getinconfirmed() == 1 ) 
		{
			# code...
			$timezone = new \DateTimeZone('America/Sao_Paulo');

			$dtconfirmed = new \DateTime($rsvp->getdtconfirmed());
			
			$dtconfirmed->setTimezone($timezone);



			Rsvp::setError("Você já realizou sua confirmação de presença em ".$dtconfirmed->format('d/m/Y')." | Entre em contato com o casal, pois somente o mesmo pode corrigir uma confirmação já realizada");
			header("Location: /".$user->getdesdomain()."/rsvp");
			exit;


		}//end if






		if( 
			
			!isset($_POST['nrphone']) 
			|| 
			$_POST['nrphone'] == ''
		)
		{

			Rsvp::setError("Preencha o seu telefone ou celular, com DDD");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if

		if( !$nrphone = Validate::validateLongPhone($_POST['nrphone']) )
		{

			Rsvp::setError("Informe um telefone ou celular válido | O DDD deve ter 2 dígitos | O telefone ou celular deve ter 8 ou 9 dígitos");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if







		if( 
			
			!isset($_POST['desemail']) 
			|| 
			$_POST['desemail'] == ''
		)
		{

			Rsvp::setError("Preencha o seu e-mail");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if

		if( ($desemail = Validate::validateEmail($_POST['desemail'])) === false )
		{	
			
			Rsvp::setError("O e-mail parece estar num formato inválido | Por favor, tente novamente");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if






		if( 
			
			!isset($_POST['inadultsconfirmed']) 
			|| 
			$_POST['inadultsconfirmed'] == ''
		)
		{

			Rsvp::setError("Confirme o número de acompanhantes adultos");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if

		if( ($inadultsconfirmed = Validate::validateMaxRsvp($_POST['inadultsconfirmed'])) === false )
		{	
			

			Rsvp::setError("A quantidade deve ser formada apenas por números e não pode conter caracteres especiais | Tente novamente");
			header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
			exit;

		}//end if


		





		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());






		



		


		if ( (int)$rsvpconfig->getinadultsconfig() == 0 ) 
		{
			# code...
			if ( (int)$inadultsconfirmed > (int)$rsvp->getinmaxadults() ) {
				# code...
				Rsvp::setError("A quantidade de adultos deve ser menor ou igual a ".$rsvp->getinmaxadults());
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;
			}//end if


		

		}//end if
		else
		{

			if ( (int)$inadultsconfirmed > (int)$rsvpconfig->getinmaxadultsconfig() ) {
				# code...
				Rsvp::setError("A quantidade de adultos deve ser menor ou igual a ".$rsvpconfig->getinmaxadultsconfig());
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;
			}//end if
			
			$rsvp->setinmaxadults((int)$rsvpconfig->getinmaxadultsconfig());

		}//end else









		if( (int)$inadultsconfirmed != 0 )
		{


			if( 
			
				!isset($_POST['desadultsaccompanies']) 
				|| 
				$_POST['desadultsaccompanies'] == ''
			)
			{

				Rsvp::setError("Preencha o nome dos acompanhantes adultos");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;

			}//end if


			$adults_handler = Validate::validateRsvpAccompanies($_POST['desadultsaccompanies']);

			if ( $adults_handler === false ) 
			{
				# code...
				Rsvp::setError("Preencha o nome dos acompanhantes adultos | O nome dos acompanhantes adultos não pode conter apenas caracteres especiais | Por favor, tente novamente");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;

			}//end if

			$desadultsaccompanies = $adults_handler['desaccompanies'];

			$adultsArrayCount = $adults_handler['accompaniesArrayCount'];

			//$adultsArray = explode(';', $desadultsaccompanies);

			
			/*echo '<pre>';
var_dump($_POST);
var_dump($adults_handler);
var_dump($adultsArrayCount);
var_dump($desadultsaccompanies);
var_dump($inadultsconfirmed);

exit;*/


			if( (int)$adultsArrayCount < (int)$inadultsconfirmed )
			{
				Rsvp::setError("A quantidade de nomes de adultos informados foi menor do que a quantidade que o convidado declarou que levaria | Por favor, corrija e tente novamente");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;

			}//end if
			elseif( (int)$adultsArrayCount > (int)$inadultsconfirmed )
			{	

				Rsvp::setError("A quantidade de nomes de adultos informados foi maior do que a quantidade que o convidado declarou que levaria | Por favor, corrija e tente novamente");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;

			}//end if



		}//end if
		else
		{


			if( 
			
				isset($_POST['desadultsaccompanies']) 
				|| 
				$_POST['desadultsaccompanies'] != ''
			)
			{

				Rsvp::setError("Você informou que não haverá acompanhantes adultos, mas preencheu seus nomes | Verifique novamente, e informe a quantidade correta de acompanhantes adults");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;

			}//end if


			$desadultsaccompanies = '';

		}//end else





		





		if( (int)$rsvpconfig->getinchildren() == 1 )
		{



			if( 
			
				!isset($_POST['inchildrenconfirmed']) 
				|| 
				$_POST['inchildrenconfirmed'] == ''
			)
			{
	
				Rsvp::setError("Confirme o número de acompanhantes crianças");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;
	
			}//end if
	
			if( ($inchildrenconfirmed = Validate::validateMaxRsvp($_POST['inchildrenconfirmed'])) === false )
			{	
				
	
				Rsvp::setError("A quantidade deve ser formada apenas por números e não pode conter caracteres especiais | Tente novamente");
				header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
				exit;
	
			}//end if
	
	
			
	
	
	
	
			if ( (int)$rsvpconfig->getinchildrenconfig() == 0 ) 
			{
				# code...
				if ( (int)$inchildrenconfirmed > (int)$rsvp->getinmaxchildren() ) {
					# code...
					Rsvp::setError("A quantidade de crianças deve ser menor ou igual a ".$rsvp->getinmaxchildren());
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
				}//end if
				
	
			}//end if
			else
			{
	
				if ( (int)$inchildrenconfirmed > (int)$rsvpconfig->getinmaxchildrenconfig() ) {
					# code...
					Rsvp::setError("A quantidade de crianças deve ser menor ou igual a ".$rsvpconfig->getinmaxchildrenconfig());
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
				}//end if
				
				$rsvp->setinmaxchildren((int)$rsvpconfig->getinmaxchildrenconfig());
	
			}//end else
	
			
			
			
	
			if( (int)$inchildrenconfirmed != 0 )
			{
	
	
				if( 
				
					!isset($_POST['deschildrenaccompanies']) 
					|| 
					$_POST['deschildrenaccompanies'] == ''
				)
				{
	
					Rsvp::setError("Preencha o nome dos acompanhantes crianças");
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
	
				}//end if
	
				
	
				$children_handler = Validate::validateRsvpAccompanies($_POST['deschildrenaccompanies']);
	
				if ( $children_handler === false ) 
				{
					# code...
					Rsvp::setError("Preencha o nome dos acompanhantes crianças | O nome dos acompanhantes crianças não pode conter apenas caracteres especiais | Por favor, tente novamente");
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
	
				}//end if
	
				$deschildrenaccompanies = $children_handler['desaccompanies'];
	
				$childrenArrayCount = $children_handler['accompaniesArrayCount'];
	
	
				
	
				//$childrenArray = explode(';', $deschildrenaccompanies);
	/*echo '<pre>';
				var_dump($_POST);
var_dump($children_handler);
var_dump($childrenArrayCount);
var_dump($deschildrenaccompanies);
var_dump($inchildrenconfirmed);
exit;*/
	
				if( (int)$childrenArrayCount < (int)$inchildrenconfirmed )
				{
					Rsvp::setError("A quantidade de nomes de crianças informadas foi menor do que a quantidade que o convidado declarou que levaria | Por favor, corrija e tente novamente");
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
	
				}//end if
				elseif( (int)$childrenArrayCount > (int)$inchildrenconfirmed )
				{	
	
					Rsvp::setError("A quantidade de nomes de crianças informadas foi maior do que a quantidade que o convidado declarou que levaria | Por favor, corrija e tente novamente");
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
	
				}//end if
	
	
	
	
			}//end if
			else
			{
	
	
				if( 
				
					isset($_POST['deschildrenaccompanies']) 
					|| 
					$_POST['deschildrenaccompanies'] != ''
				)
				{
	
					Rsvp::setError("Você informou que não haverá acompanhantes crianças, mas preencheu seus nomes | Verifique novamente, e informe a quantidade correta de acompanhantes crianças");
					header("Location: /".$user->getdesdomain()."/rsvp/confirmacao/".$hash);
					exit;
	
				}//end if
	
	
				$deschildrenaccompanies = '';
	
			}//end else

		}//end if
		else
		{	

			$inchildrenconfirmed = 0;
			$deschildrenaccompanies = '';

			$rsvp->setinmaxchildren(0);

			$rsvpconfig->setinchildrenage(0);

		}//end else
















		$timezone = new \DateTimeZone('America/Sao_Paulo');

		$dtconfirmed = new \DateTime("now");

		$dtconfirmed->setTimezone($timezone);







		$rsvp->setData([

			'idrsvp'=>$rsvp->getidrsvp(),
			'iduser'=>$user->getiduser(),
			'desguest'=>$rsvp->getdesguest(),
			'desemail'=>$desemail,
			'nrphone'=>$nrphone,
			'inconfirmed'=>1,
			'inmaxadults'=>$rsvp->getinmaxadults(),
			'inadultsconfirmed'=>$inadultsconfirmed,
			'inmaxchildren'=>$rsvp->getinmaxchildren(),
			'inchildrenconfirmed'=>$inchildrenconfirmed,
			'inchildrenageconfirmed'=>$rsvpconfig->getinchildrenage(),
			'inchildrenconfigconfirmed'=>$rsvpconfig->getinchildren(),
			'desadultsaccompanies'=>$desadultsaccompanies,
			'deschildrenaccompanies'=>$deschildrenaccompanies,
			'dtconfirmed'=>$dtconfirmed->format('Y-m-d')

		]);

		

		$rsvp->update();

		

		if( (int)$rsvp->getidrsvp() > 0 )
		{
			

			$consort = new Consort();

			$consort->get((int)$user->getiduser());


			$userMailer = new Mailer(
						
				 
				Rule::EMAIL_RSVP_USER,

				"rsvp-user", 
				
				array(

					"user"=>$user->getValues(),
					"rsvp"=>$rsvp->getValues(),
					"rsvpconfig"=>$rsvpconfig->getValues(),
					"consort"=>$consort->getValues()

				),

				$user->getdeslogin(), 
				
				$user->getdesperson(),

				$consort->getdesconsortemail(),
				
				$consort->getdesconsort()
			
			);//end Mailer







			$guestMailer = new Mailer(
							

				Rule::EMAIL_RSVP_GUEST,

				"rsvp-guest", 
				
				array(

					"user"=>$user->getValues(),
					"rsvp"=>$rsvp->getValues(),
					"rsvpconfig"=>$rsvpconfig->getValues(),
					"consort"=>$consort->getValues()
					

				),

				$rsvp->getdesemail(),

				$rsvp->getdesguest()
			
			);//end Mailer





			$userMailer->send();

			$guestMailer->send();




			

			header('Location: /'.$user->getdesdomain().'/rsvp/confirmacao/'.$hash.'/presenca-confirmada');
			exit;



		}//end if







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





































$app->get( "/:desdomain/rsvp/confirmacao/:hash", function( $desdomain, $hash )
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
		

		if ( (int)$menu->getinrsvp() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if




		$idrsvp = Validate::getHash($hash);

		if ( $idrsvp == '' )
		{
			# code...
			Rsvp::setError(Rule::VALIDATE_ID_HASH);
			header("Location: /".$desdomain."/rsvp");
			exit;
			
		}//end if
		




		$rsvp = new Rsvp();

		$rsvp->getRsvp((int)$idrsvp);




		if ( (int)$rsvp->getinconfirmed() == 1 ) 
		{
			# code...
			$timezone = new \DateTimeZone('America/Sao_Paulo');

			$dtconfirmed = new \DateTime($rsvp->getdtconfirmed());
			
			$dtconfirmed->setTimezone($timezone);



			Rsvp::setError("Você já realizou sua confirmação de presença em ".$dtconfirmed->format('d/m/Y')." | Entre em contato com o casal, pois somente o mesmo pode corrigir uma confirmação já realizada");
			header("Location: /".$user->getdesdomain()."/rsvp");
			exit;


		}//end if
		
		

		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());

		

		$consort = new Consort();

		$consort->get((int)$user->getiduser());



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());



		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());



		



		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "rsvp-confirmation",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'rsvpconfig'=>$rsvpconfig->getValues(),
				'hash'=>$hash,
				'consort'=>$consort->getValues(),
				'rsvpconfig'=>$rsvpconfig->getValues(),
				'rsvp'=>$rsvp->getValues(),
				'user'=>$user->getValues(),
				'error'=>Rsvp::getError(),
				'success'=>Rsvp::getSuccess()

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


































$app->post( "/:desdomain/rsvp", function( $desdomain )
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
		

		if ( (int)$menu->getinrsvp() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if

		

		


		if( 
			
			!isset($_POST['desguest']) 
			|| 
			$_POST['desguest'] == ''
		)
		{

			Rsvp::setError("Preencha o seu nome.");
			header("Location: /".$user->getdesdomain()."/rsvp");
			exit;

		}//end if





		$dataRsvp = Rsvp::checkDesguestExists($user->getiduser(), $_POST['desguest']);




		if( $dataRsvp === false )
		{

			Rsvp::setError("Não consta este nome na lista! | Por favor, verifique a ortografia e tente novamente");
			header("Location: /".$user->getdesdomain()."/rsvp");
			exit;

		}//end if
		else
		{

			if ( (int)$dataRsvp['inconfirmed'] == 0) {
				# code...
				$hash = base64_encode($dataRsvp['idrsvp']);

				header('Location: /'.$user->getdesdomain().'/rsvp/confirmacao/'.$hash);
				exit;

			}//end if
			else
			{

				


				$timezone = new \DateTimeZone('America/Sao_Paulo');

				$dtconfirmed = new \DateTime($dataRsvp['dtconfirmed']);
				
				$dtconfirmed->setTimezone($timezone);



				Rsvp::setError("Você já realizou sua confirmação de presença em ".$dtconfirmed->format('d/m/Y')." | Entre em contato com o casal, pois somente o mesmo pode corrigir uma confirmação já realizada");
				header("Location: /".$user->getdesdomain()."/rsvp");
				exit;


			}//end else



			

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


































$app->get( "/:desdomain/rsvp", function( $desdomain )
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
		

		if ( (int)$menu->getinrsvp() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if

		



		$consort = new Consort();

		$consort->get((int)$user->getiduser());



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());


		

		$rsvpconfig = new RsvpConfig();

		$rsvpconfig->get((int)$user->getiduser());



		

		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "rsvp",
			
			[

				'customstyle'=>$customstyle->getValues(),
				'rsvpconfig'=>$rsvpconfig->getValues(),
				'consort'=>$consort->getValues(),
				'user'=>$user->getValues(),
				'error'=>Rsvp::getError(),
				'success'=>Rsvp::getSuccess()

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