<?php

use Core\Maintenance;
use Core\Page;
use Core\PageDomain;
use Core\Model\User;
use Core\Model\CustomStyle;
use Core\Model\Consort;
use Core\Model\Wedding;
use Core\Model\Party;
use Core\Model\BestFriend;
use Core\Model\Menu;
use Core\Model\Video;
use Core\Model\Album;
use Core\Model\InitialPage;










$app->get( "/:desdomain", function( $desdomain )
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





		$customstyle = new CustomStyle();

		$customstyle->get((int)$user->getiduser());
		




		$consort = new Consort();

		$consort->get((int)$user->getiduser());





		$wedding = new Wedding();

		$wedding->get((int)$user->getiduser());
		






		$party = new Party();

		$party->get((int)$user->getiduser());






		$bestfriend = new BestFriend();

		$besfriend_handler = $bestfriend->getInitialPage((int)$user->getiduser());







		$menu = new Menu();

		$menu->get((int)$user->getiduser());






		$album = new Album();

		$album_handler = $album->getInitialPage((int)$user->getiduser());



		




		$initialpage = new InitialPage();

		$initialpage->get((int)$user->getiduser());



		/*echo "<pre>";
		var_dump($user);
		var_dump($customstyle);
		var_dump($consort);
		var_dump($wedding);
		var_dump($party);
		var_dump($besfriend_handler);
		var_dump($menu);
		var_dump($album_handler);
		var_dump($initialpage);
		exit;*/

		$page = new PageDomain();

		
		$page->setTpl(

				
			$customstyle->getidtemplate() . 
			DIRECTORY_SEPARATOR . "index",
			
			[

				'album'=>$album_handler,
				'initialpage'=>$initialpage->getValues(),
				'menu'=>$menu->getValues(),
				'bestfriend'=>$besfriend_handler,
				'party'=>$party->getValues(),
				'wedding'=>$wedding->getValues(),
				'consort'=>$consort->getValues(),
				'customstyle'=>$customstyle->getValues(),
				'user'=>$user->getValues(),
				'error'=>User::getError()

			]
		
		);//end setTpl

	}//end if
	else
	{
		
		

		//header('HTTP/1.0 404 Not Found');

		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

		//header("Status: 404 Not Found");

		//$_SERVER['REDIRECT_STATUS'] = 404;

		//http_response_code(404);

		//header('Location: /404');
		//exit;

		$page = new Page();
		
		//require_once( $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'views'. DIRECTORY_SEPARATOR.'404.html' );//require_once
		
		//$handle = curl_init($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'views'.DIRECTORY_SEPARATOR.'404.html');

		//curl_exec($handle);


		//$page->setTpl("404");//end setTpl

		$page->setTpl(

				
			"404"
		
		);//end setTpl

		exit;

		

	}//end else




    

});//END route













































?>