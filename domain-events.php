<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Rule;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Message;
use Core\Model\Event;
use Core\Model\CustomStyle;
use Core\Model\Menu;















$app->get( "/:desdomain/eventos", function( $desdomain )
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
		

		if ( (int)$menu->getinevent() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if




		

		$event = new Event();

		//$results = $events->get((int)$user->getiduser());





		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;


		


		
		$results = $event->getTemplatePage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);









		$nrtotal = $results['nrtotal'];





		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());



		$timezone = new DateTimeZone('America/Sao_Paulo');

		$dt_now = new DateTime("now");

		$dt_now->setTimezone($timezone);










		$pages = [];	
	    

		for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/'.$user->getdesdomain().'/eventos?'.http_build_query(
						
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
			DIRECTORY_SEPARATOR . "events",
			
			[
				'dt_now'=>$dt_now->format('Y-m-d'),
				'customstyle'=>$customstyle->getValues(),
				'pages'=>$pages,
				'nrtotal'=>$nrtotal,
				'user'=>$user->getValues(),
				'event'=>$results['results'],
				'error'=>Event::getError()

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