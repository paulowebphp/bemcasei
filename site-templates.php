<?php 

use \Core\Rule;
use \Core\Page;
use \Core\PageTemplate;
use \Core\Model\Template;
use \Core\Model\CustomStyle;
use \Core\Model\Product;
use \Core\Model\Gift;















$app->get( '/template/:idtemplate/casamento', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{




		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$wedding = Template::getWedding($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "wedding",

			[

				'customstyle'=>$customstyle,
				'wedding'=>$wedding


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route















$app->get( '/template/:idtemplate/festa-de-casamento', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$party = Template::getParty($idtemplate);




		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "party",

			[

				'customstyle'=>$customstyle,
				'party'=>$party


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route












$app->get( '/template/:idtemplate/padrinhos-madrinhas', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$bestfriend = Template::getBestFriend($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "bestfriends",

			[

				'customstyle'=>$customstyle,
				'bestfriend'=>$bestfriend

			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route










$app->get( '/template/:idtemplate/rsvp', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );




		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "rsvp",

			[

				'customstyle'=>$customstyle


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route
















$app->get( '/template/:idtemplate/mural-mensagens', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$message = Template::getMessage($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "message",

			[

				'customstyle'=>$customstyle,
				'message'=>$message


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route
























$app->get( '/template/:idtemplate/eventos', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{

		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$event = Template::getEvent($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "events",

			[

				'customstyle'=>$customstyle,
				'event'=>$event


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route

































$app->get( '/template/:idtemplate/album', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$album = Template::getAlbum( $idtemplate );

		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );


		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "album",

			[

				'customstyle'=>$customstyle,
				'album'=>$album


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route


























$app->get( '/template/:idtemplate/videos', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$video = Template::getVideo($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "videos",

			[

				'customstyle'=>$customstyle,
				'video'=>$video

			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route


















$app->get( '/template/:idtemplate/fornecedores', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


	


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$stakeholder = Template::getStakeholder($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "stakeholders",

			[

				'customstyle'=>$customstyle,
				'stakeholder'=>$stakeholder

			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route
























$app->get( '/template/:idtemplate/listas-de-fora', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


	

		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$outerlist = Template::getOuterList($idtemplate);



		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "outerlists",

			[

				'customstyle'=>$customstyle,
				'outerlist'=>$outerlist


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route




































/*$app->get( '/template/:idtemplate/loja', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{


		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		//$gift = Gift::getTemplateGift();

		

		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "store",

			[

				'customstyle'=>$customstyle,
				'gift'=>$gift


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route*/







































$app->get( '/template/:idtemplate/loja/:category', function( $idtemplate, $category )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{



		$orderby = (isset($_GET['ordenar'])) ? $_GET['ordenar'] : "";

		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;










		$gift = new Gift();





		if( $orderby != '' )
		{

			if (

				!in_array( $orderby, [

				'valor-menor',
				'valor-maior',
				'nome-a-z',
				'nome-z-a'
				
				])

			) 
			{
				# code...
				Gift::setError('Esta forma de ordenação não é válida');
				header('Location: /template/'.$idtemplate.'/loja/'.$category);
				exit;

			}//end if




			//$results = $product->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);
			$results = $gift->getCategoryOrderby($orderby,$category,$currentPage,Rule::ITENS_PER_PAGE,$category);
		

		}//end if
		else
		{
			
			$results = $gift->getCategoryPage($category,$currentPage,Rule::ITENS_PER_PAGE);

		}//end else





		$gift->setData($results['results']);





		





		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		//$gift = Gift::getTemplateGift();











		$categories = Product::getCategoryFullArray();

		$category_name = Product::getCategoryName($category);

	

		$pages = [];



		if ( $orderby == '' )
		{
			# code...
			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/template/'.$idtemplate.'/loja/'.$category.'?'.http_build_query(
							
							[

								'pagina'=>$x+1

							]
						
						),

					'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end if
		else
		{

			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/template/'.$idtemplate.'/loja/'.$category.'?'.http_build_query(
							
							[

								'ordenar'=>$orderby,
								'pagina'=>$x+1

							]
						
						),

						'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end else






		

		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "store-categories",

			[

				'customstyle'=>$customstyle,
				'gift'=>$gift->getValues(),
				'categories'=>$categories,
				'category'=>$category,
				'category_name'=>$category_name,
				'orderby'=>$orderby,
				'nrtotal'=>$results['nrtotal'],
				'pages'=>$pages,
				'success'=>Gift::getSuccess(),
				'error'=>Gift::getError()


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route



















































































































$app->get( '/template/:idtemplate/loja', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5


	)
	{



		$orderby = (isset($_GET['ordenar'])) ? $_GET['ordenar'] : "";

		$currentPage = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;










		$gift = new Gift();





		if( $orderby != '' )
		{

			if (

				!in_array( $orderby, [

				'valor-menor',
				'valor-maior',
				'nome-a-z',
				'nome-z-a'
				
				])

			) 
			{
				# code...
				Gift::setError('Esta forma de ordenação não é válida');
				header('Location: /template/'.$idtemplate.'/loja');
				exit;

			}//end if



			//$results = $product->getSearch((int)$user->getiduser(),$search,$currentPage,Rule::ITENS_PER_PAGE);
			$results = $gift->getItemsOrderby($orderby,$currentPage,Rule::ITENS_PER_PAGE);
			


		}//end if
		else
		{
			
			$results = $gift->getPageStore($currentPage,Rule::ITENS_PER_PAGE);

		}//end else





		$gift->setData($results['results']);





		





		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		//$gift = Gift::getTemplateGift();











		$categories = Product::getCategoryFullArray();

	

	

		$pages = [];


		if ( $orderby == '' )
		{
			# code...
			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/template/'.$idtemplate.'/loja?'.http_build_query(
							
							[

								'pagina'=>$x+1

							]
						
						),

					'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end if
		else
		{

			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/template/'.$idtemplate.'/loja?'.http_build_query(
							
							[

								'ordenar'=>$orderby,
								'pagina'=>$x+1

							]
						
						),

						'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end if






		

		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "store",

			[

				'customstyle'=>$customstyle,
				'gift'=>$gift->getValues(),
				'categories'=>$categories,
				'orderby'=>$orderby,
				'nrtotal'=>$results['nrtotal'],
				'pages'=>$pages,
				'success'=>Gift::getSuccess(),
				'error'=>Gift::getError()


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else

});//END route












































$app->get( '/template/:idtemplate', function( $idtemplate )
{



	if( 


		(int)$idtemplate >= 1
		&&
		(int)$idtemplate <= 5
		&&
		is_numeric($idtemplate)


	)
	{



		$customstyle = CustomStyle::getTemplateStyle( $idtemplate );

		$customstyle['desbanner'] = Template::getDesbanner( $idtemplate );

		$wedding = Template::getWedding($idtemplate);
		$party = Template::getParty($idtemplate);
		$bestfriend = Template::getBestFriend($idtemplate, true);
		$album = Template::getAlbum($idtemplate, true);


		$page = new PageTemplate();

		
		$page->setTpl(

				
			$idtemplate . 
			DIRECTORY_SEPARATOR . "index",

			[

				'customstyle'=>$customstyle,
				'wedding'=>$wedding,
				'party'=>$party,
				'bestfriend'=>$bestfriend,
				'album'=>$album


			]
		
		);//end setTpl


	}//end if
	else
	{

		$page = new Page();

		
		$page->setTpl(

				
			"404"
		
		);//end setTpl


	}//end else
	

	


});//END route
















































?>