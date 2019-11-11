<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Rule;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Menu;
use Core\Model\Stakeholder;
use Core\Model\CustomStyle;


















$app->get( "/:desdomain/fornecedores", function( $desdomain )
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
		

		if ( (int)$menu->getinstakeholder() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if



		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;



		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());

		


		$stakeholder = new Stakeholder();

		//$results = $stakeholder->get((int)$user->getiduser());


		$results = $stakeholder->getTemplatePage((int)$user->getiduser(),$currentPage,Rule::ITENS_PER_PAGE);








		$nrtotal = $results['nrtotal'];



		










		$pages = [];	
	    

		for ( $x=0; $x < $results['pages']; $x++ )
		{ 
			# code...
			array_push(
				
				$pages, 
				
				[

					'href'=>'/'.$user->getdesdomain().'/fornecedores?'.http_build_query(
						
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
			DIRECTORY_SEPARATOR . "stakeholders",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'pages'=>$pages,
				'nrtotal'=>$results['nrtotal'],
				'user'=>$user->getValues(),
				'stakeholder'=>$results['results'],
				'error'=>Stakeholder::getError(),
				'success'=>Stakeholder::getSuccess()

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