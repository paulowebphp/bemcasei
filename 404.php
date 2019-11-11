<?php 

use \Core\Page;



$app->get( "/404", function()
{



	$page = new Page();

		
	$page->setTpl(

			
		"404"
	
	);//end setTpl

    

});//END route



?>