<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Message;
use Core\Model\Menu;
use Core\Model\Party;
use Core\Model\CustomStyle;











$app->get( "/:desdomain/festa-de-casamento", function( $desdomain )
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

		

		if ( (int)$menu->getinparty() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if




		$party = new party();

		$party->get((int)$user->getiduser());




		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());





		


		
		
		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "party",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'user'=>$user->getValues(),
				'party'=>$party->getValues(),
				'error'=>Party::getError()

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