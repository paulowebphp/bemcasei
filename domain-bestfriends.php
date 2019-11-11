<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Mailer;
use Core\Model\User;
use Core\Model\Consort;
use Core\Model\CustomStyle;
use Core\Model\Menu;
use Core\Model\BestFriend;












$app->get( "/:desdomain/padrinhos-madrinhas", function( $desdomain )
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
		

		if ( (int)$menu->getinbestfriend() == 0 )
		{
			# code...
			header('Location: /'.$desdomain);
			exit;
			
		}//end if


		
		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());




		$bestfriend = new BestFriend();

		$results = $bestfriend->get((int)$user->getiduser());

		

		
		
		$page = new PageDomain();
		
		$page->setTpl(
			
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "bestfriends",
			
			[
				'bestfriend'=>$results['results'],
				'nrtotal'=>$results['nrtotal'],
				'customstyle'=>$customstyle->getValues(),
				'user'=>$user->getValues(),
				'error'=>BestFriend::getError()

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