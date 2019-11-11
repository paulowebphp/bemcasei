<?php 

use \Core\Page;
use \Core\PageSupport;
use \Core\Model\Plan;







$app->get( '/site-casamento', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"site-features"
	
	);//end setTpl

});//END route




$app->get( '/lista-presentes', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"gifts-list"
	
	);//end setTpl

});//END route






$app->get( '/tarifas-condicoes', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"taxes-conditions"
	
	);//end setTpl

});//END route






$app->get( '/termos-lista', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"terms-list"
	
	);//end setTpl

});//END route





$app->get( '/modelos-templates', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"templates-models"
	
	);//end setTpl

});//END route






$app->get( '/termos-uso', function()
{

	$plan = Plan::getPlansFullArray();
	

	$page = new Page();

	$page->setTpl(
		
		"terms",

		[

			'plan'=>$plan

		]
	
	);//end setTpl

});//END route





$app->get( '/politica-privacidade', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"privacy"
	
	);//end setTpl

});//END route









$app->get( '/quem-somos', function()
{
	

	$page = new Page();

	$page->setTpl(
		
		"about"
	
	);//end setTpl

});//END route









$app->get( '/central-ajuda', function()
{
	

	$page = new PageSupport();

	$page->setTpl(
		
		"support"
	
	);//end setTpl

	
});//END route











?>