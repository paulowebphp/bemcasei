<?php 

use \Core\Page;
use \Core\PagePromotions;
use \Core\Validate;
use \Core\Mailer;
use \Core\Model\Lead;
use \Core\Model\Promotions;
use \Core\Wirecard;
//use \Core\Model\Category;
//use \Core\Model\Cart;
//use \Core\Model\Address;
//use \Core\Model\User;
//use \Core\Model\Order;
//use \Core\Model\OrderStatus;












$app->get( '/promocao', function()
{


	$album = Promotions::getAlbum(1, true);

	$page = new PagePromotions();

	$page->setTpl(
		
		"index",

		[

			'album'=>$album
		]
	
	);//end setTpl

});//END route

















?>