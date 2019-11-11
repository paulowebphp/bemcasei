<?php 

use \Core\PageEmail;
use \Core\Model\User;
use \Core\Model\Consort;
use \Core\Model\Message;
use \Core\Model\Order;
use \Core\Model\Plan;
use \Core\Model\Product;






$app->get( '/email', function()
{
	
	$user = new User();

	$user->setdesnick('Jose');

	$consort = new Consort();

	$consort->setdesconsort('Maria');
	$consort->setdesemail('');

	$order = new Order();


	$order->setdesname('Jose222');
	$order->setdespaymentcode('PAY-123654789132');
	$order->setnrphone('31-32143214');
	$order->setdesemail('jose@gmail.com');
	$order->setinpaymentmethod(0);
	$order->setdtregister('2019-10-10');
	$order->setnrinstallment(1);
	$order->setdtregister('2019-10-10');
	$order->setdesprinthref('https://fat32.com.br');
	$order->setincharge(1);
	$order->setvltotal('200.00');



	$message = new Message();

	$message->setdesmessage('Marco');
	$message->setdesemail('jp@jp.jp');
	$message->setdesdescription('Descirp cription');
	$message->setdtregister('2020/02/02');



	$plan = new Plan();

	$plan->setdesplan('Plano Basic');
	$plan->setinperiod('6');
	$plan->setvlprice('120.00');
	$plan->setdtregister('2020/02/02');

	$product = new Product();

	$product->setData([

		'0'=>[

			'desproduct'=>'Kit Caipirinha',
			'vltotal'=>'100.00'


		],
		'1'=>[

			'desproduct'=>'Kit Caipirinha',
			'vltotal'=>'200.00'


		],
		'2'=>[

			'desproduct'=>'Kit Caipirinha',
			'vltotal'=>'300.00'


		]

	]);





	$page = new PageEmail();

	$page->setTpl(
		
		"payment-customer",

		[
			'order'=>$order->getValues(),
			'product'=>$product->getValues(),
			'name'=>'JosePaulo',
			'link'=>'',
			'user'=>$user->getValues(),
			'consort'=>$consort->getValues()

		]
	
	);//end setTpl

});//END route











?>