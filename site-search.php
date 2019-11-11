<?php 

use \Core\Page;
use \Core\Rule;
use \Core\Validate;
use \Core\Model\User;






$app->get( '/buscar', function()
{
	
	$user = new User();

	//$search = (isset($_GET['quaesitum'])) ? $_GET['quaesitum'] : "";

	$currentPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$pages = [];

	$results_handler = 0;

	if(

		isset($_GET['quaesitum'])
		&&
		$_GET['quaesitum'] != ''

	)
	{


		if( ( $search = Validate::validateQuaesitum($_GET['quaesitum']) ) === false )
		{

			User::setError("O termo buscado não pode ser formado apenas com caracteres especiais, ou não se trata de um e-mail válido | Por favor, tente novamente");
			header('Location: /buscar');
			exit;

		}//end if


		$results = $user->getPageMailingSearch($search,$currentPage,Rule::ITENS_PER_PAGE);


		


		if ( (int)$results['results'] > 0 )
		{
			# code...

			$user->setData($results['results']);

			$results_handler = 2;


			for ( $x=0; $x < $results['pages']; $x++ )
			{ 
				# code...
				array_push(
					
					$pages, 
					
					[

						'href'=>'/buscar?'.http_build_query(
							
							[

								'page'=>$x+1

							]
						
						),

					'text'=>$x+1

					]
				
				);//end array_push

			}//end for

		}//end if
		else
		{

			$results_handler = 1;

		}//end else
	    
		

	}//end if


		



	$page = new Page();

	$page->setTpl(
		
		"search",

		[
			'results_handler'=>$results_handler,
			'user'=>$user->getValues(),
			'pages'=>$pages,
			'error'=>User::getError(),

		]
	
	);//end setTpl



});//END route








?>