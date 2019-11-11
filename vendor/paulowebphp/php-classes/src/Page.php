<?php 

namespace Core;

use Rain\Tpl;

class Page
{

	private $tpl;

	private $options = [];

	private $defaults = [

		"header"=>true,
		"footer"=>true,
		"data"=>[]

	];//end $defaults





	public function __construct( $opts = array(), $tpl_dir = "/views/" )
	{
		# O ÚLTIMO ARRAY SEMPRE VAI SOBRESCREVER OS ANTERIORES

		
		$this->options = array_merge($this->defaults, $opts);

		// config
		$config = array(

			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false // set to false to improve the speed

		);//end array

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		if($this->options["header"] === true) $this->tpl->draw("header");

	}//END __construct()





	private function setData( $data = array() )
	{
		foreach ($data as $key => $value) 
		{

			$this->tpl->assign($key, $value);
		
		}//END foreach

	}//END setDAta





	public function setTpl( $name, $data = array(), $returnHTML = false )
	{
		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);

	}//END setTpl






	public function __destruct()
	{
		if($this->options["footer"] === true) $this->tpl->draw("footer");
		
	}//END __destruct








	public static function getSitePages()
	{

		return [

			'404',
			'quem-somos',
			'termos-uso',
			'termos-lista',
			'politica-privacidade',
			'checkout',
			'cadastrar',
			'site-casamento',
			'criar-site-de-casamento',
			'criar-site',
			'planos',
			'buscar',
			'lista-presentes',
			'tarifas-condicoes',
			'contato',
			'central-ajuda',
			'modelos-templates',
			'login',
			'logout',
			'recuperar-senha',
			'news',
			'api',
			'adm',
			'template',
			'voucher',
			'ticket',
			'481738admin',
			'd4c69b96d700',
			'5e9a6f6e1d62',
			'base',
			'admin',
			'dashboard',
			'dash',
			'painel-de-controle',
			'painel',
			'303',
			'address',
			'coupon',
			'email',
			'guia-de-casamento',
			'josepauloeanalucia',
			'josepauloeludmila',
			'josepauloerozianne'

		];


	}//end getSitePages







}#END class Page



 ?>