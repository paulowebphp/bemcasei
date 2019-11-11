<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\Message;
use Core\Model\Wedding;
use Core\Model\CustomStyle;


















$app->get( "/:desdomain/casamento", function( $desdomain )
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




		$wedding = new Wedding();

		$wedding->get((int)$user->getiduser());




		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());
		


		
		
		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "wedding",
			
			[
				'customstyle'=>$customstyle->getValues(),
				'user'=>$user->getValues(),
				'wedding'=>$wedding->getValues(),
				'error'=>Wedding::getError()

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