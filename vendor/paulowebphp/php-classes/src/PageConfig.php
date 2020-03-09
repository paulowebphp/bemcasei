<?php 

namespace Core;


use \Core\Model;
use \Core\DB\Sql;





class PageConfig extends Model
{




	# Session
	const SESSION = "PageConfigSession";

	# Error - Success
	const SUCCESS = "PageConfig-Success";
	const ERROR = 'PageConfig-Error';





	//const METADESCRIPTION_MAIN = 'Bem Casei Site Casamento. Por Que Seguir o Comum? Use um Site de Casamento Diferenciado. Venha Conferir e Teste por 10 Dias Gratuitamente!';

	const METADESCRIPTION_MAIN = 'Por Que Seguir o Comum? Use um Site de Casamento Diferenciado e que sua família e seus convidados vão amar! Confira e faça um teste de 10 Dias Gratuitamente!';


	const PAGETITLE_MAIN = 'Bem Casei | Site de Casamento';







	public static function getSitePageConfigFullArray()
	{


		return [


			'index'=>[


				'pagetitle'=>PageConfig::PAGETITLE_MAIN,
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>0


			],

			'site-casamento'=>[

				'pagetitle'=>'Site de Casamento | Bem Casei',
				'metadescription'=>'Tenha um site de casamento com mais de 20 funcionalidades incríveis pra você configurar e enviar pra sua família e seus convidados! Confira!',
				'noindex'=>0


			],

			'lista-presentes'=>[

				'pagetitle'=>'Lista de Presentes | Bem Casei',
				'metadescription'=>'Receba Presentes em Dinheiro Para Usar Como Quiser! Os Saques São Gratuitos e nossa Lista é totalmente segura! Confira!',
				'noindex'=>0


			],

			'tarifas-condicoes'=>[

				'pagetitle'=>'Tarifas e Condições | Bem Casei',
				'metadescription'=>'Nossa Lista de Presentes Tem Ótimas Tarifas. E Você Escolhe Quem Arca Com Elas: Você ou o Convidado! Venha Conferir!',
				'noindex'=>0


			],

			'quem-somos'=>[

				'pagetitle'=>'Quem Somos | Bem Casei',
				'metadescription'=>'Por Que Seguir o Comum? Use um Site de Casamento Diferenciado. Visite-Nos Agora e Veja Você Mesmo!',
				'noindex'=>0


			],

			'modelos-templates'=>[

				'pagetitle'=>'Modelos de Templates | Bem Casei',
				'metadescription'=>'Encante Seus Amigos e Familiares Com Um Site Com Visual Diferenciado E De Bom Gosto. Confira Já!',
				'noindex'=>0


			],

			'criar-site'=>[

				'pagetitle'=>'Criar Site | Bem Casei',
				'metadescription'=>'Crie seu Site de Casamento Agora Mesmo! São Inúmeras Funcionalidades para Ajudar Você a Promover Este Evento Máximo em Sua Vida! Confira já!',
				'noindex'=>0


			],
			

			'planos'=>[

				'pagetitle'=>'Planos | Bem Casei',
				'metadescription'=>'Compare os planos do Bem Casei, ou faça um teste drive de 10 dias gratuitamente! Nossos preços e condições estão excelentes! Venha conferir!',
				'noindex'=>0


			],


			'politica-privacidade'=>[

				'pagetitle'=>'Política de Privacidade | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>0

			],


			
			'termos-uso'=>[

				'pagetitle'=>'Termos de Uso | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],


			'termos-lista'=>[

				'pagetitle'=>'Termos da Lista de Presentes Virtuais | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],



			'cadastrar'=>[

				'pagetitle'=>'Cadastrar | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1

			],


			'carrinho'=>[

				'pagetitle'=>'Carrinho | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],

			'checkout'=>[

				'pagetitle'=>'Checkout | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],

			'buscar'=>[

				'pagetitle'=>'Buscar | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],

			'login'=>[

				'pagetitle'=>'Login | Bem Casei',
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],

			'recuperar-senha'=>[

				'pagetitle'=>PageConfig::PAGETITLE_MAIN,
				'metadescription'=>PageConfig::METADESCRIPTION_MAIN,
				'noindex'=>1


			],


		];



	}//END getPagePageConfigFullArray

















	public static function getSitePageConfig( $page, $parameter )
	{


		$array = PageConfig::getSitePageConfigFullArray();

		

		if ( isset($array[$page]) ) 
		{
			# code...
			return $array[$page][$parameter];

		}//end if
		else
		{
			return $array['index'][$parameter];

		}//end else


	}//END getPageTitle
	










	public static function getDashPageConfigFullArray()
	{


		return [


			'index'=>[


				'pagetitle'=>'Início | Bem Casei'


			],


			'meus-dados'=>[

				'pagetitle'=>'Meus Dados | Bem Casei'
			],



			'meu-plano'=>[

				'pagetitle'=>'Meu Plano | Bem Casei'
			],

			'dominio'=>[

				'pagetitle'=>'Domínio | Bem Casei'
			],

			'meu-template'=>[

				'pagetitle'=>'Meu Template | Bem Casei'
			],

			'personalizar-site'=>[

				'pagetitle'=>'Personalizar Site | Bem Casei'
			],

			'menu'=>[

				'pagetitle'=>'Menu | Bem Casei'
			],

			'pagina-inicial'=>[

				'pagetitle'=>'Configurar Página Inicial | Bem Casei'
			],

			'presentes-virtuais'=>[

				'pagetitle'=>'Presentes Virtuais | Bem Casei'
			],

			'painel-financeiro'=>[

				'pagetitle'=>'Painel Financeiro | Bem Casei'
			],

			'transferencias'=>[

				'pagetitle'=>'Transferências | Bem Casei'
			],

			'conta-bancaria'=>[

				'pagetitle'=>'Conta Bancária | Bem Casei'
			],

			'meu-amor'=>[

				'pagetitle'=>'Meu Amor | Bem Casei'
			],

			'meu-casamento'=>[

				'pagetitle'=>'Meu Casamento | Bem Casei'
			],

			'festa-de-casamento'=>[

				'pagetitle'=>'Festa de Casamento | Bem Casei'
			],

			'padrinhos-madrinhas'=>[

				'pagetitle'=>'Padrinhos e Madrinhas | Bem Casei'
			],

			'guia-de-casamento'=>[

				'pagetitle'=>'Guia de Casamento | Bem Casei'
			],

			'rsvp'=>[

				'pagetitle'=>'RSVP | Bem Casei'
			],

			'mensagens'=>[

				'pagetitle'=>'Mensagens | Bem Casei'
			],

			'album'=>[

				'pagetitle'=>'Album | Bem Casei'
			],

			'videos'=>[

				'pagetitle'=>'Vídeos | Bem Casei'
			],

			'eventos'=>[

				'pagetitle'=>'Eventos | Bem Casei'
			],

			'fornecedores'=>[

				'pagetitle'=>'Fornecedores | Bem Casei'
			],

			'listas-de-fora'=>[

				'pagetitle'=>'Listas de Fora | Bem Casei'
			],

			'social'=>[

				'pagetitle'=>'Social | Bem Casei'
			],

			'tags-papelaria'=>[

				'pagetitle'=>'Tags e Papelaria | Bem Casei'
			],

			'termos-uso'=>[

				'pagetitle'=>'Termos de Uso | Bem Casei'
			],

			'termos-lista'=>[

				'pagetitle'=>'Termos da Lista de Presentes Virtuais | Bem Casei'
			],

			'politica-privacidade'=>[

				'pagetitle'=>'Política de Privacidade | Bem Casei'
			],

			'mudar-senha'=>[

				'pagetitle'=>'Meus Dados | Bem Casei'
			]

		];



	}//END getPagePageConfigFullArray

















	public static function getDashPageConfig( $page, $parameter )
	{


		$array = PageConfig::getDashPageConfigFullArray();

		

		if ( isset($array[$page]) ) 
		{
			# code...
			return $array[$page][$parameter];

		}//end if
		else
		{
			return $array['index'][$parameter];

		}//end else


	}//END getPageTitle
	




















	public static function getTemplatePageConfigFullArray()
	{


		return [


			'index'=>[


				'pagetitle'=>''


			],

			'casamento'=>[

				'pagetitle'=>'Casamento | '

			],

			'festa-de-casamento'=>[

				'pagetitle'=>'Festa de Casamento | '
			],


			'padrinhos-madrinhas'=>[

				'pagetitle'=>'Padrinhos e Madrinhas | '
			],

			'rsvp'=>[

				'pagetitle'=>'RSVP | '
			],

			'mural-mensagens'=>[

				'pagetitle'=>'Mural Mensagens | '
			],

			'loja'=>[

				'pagetitle'=>'Loja | '
			],

			'eventos'=>[

				'pagetitle'=>'Eventos | '
			],

			'album'=>[

				'pagetitle'=>'Album | '
			],

			'videoS'=>[

				'pagetitle'=>'Vídeos | '
			],

			'fornecedores'=>[

				'pagetitle'=>'Fornecedores | '
			],

			'listas-de-fora'=>[

				'pagetitle'=>'Listas de Fora | '
			]

		];



	}//END getPagePageConfigFullArray

















	public static function getTemplatePageConfig( $page, $parameter )
	{


		$array = PageConfig::getTemplatePageConfigFullArray();

		

		if ( isset($array[$page]) ) 
		{
			# code...
			return $array[$page][$parameter];

		}//end if
		else
		{
			return $array['index'][$parameter];

		}//end else


	}//END getPageTitle
	



















	public static function setError( $msg )
	{

		$_SESSION[PageConfig::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[PageConfig::ERROR]) && $_SESSION[PageConfig::ERROR]) ? $_SESSION[PageConfig::ERROR] : '';

		PageConfig::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[PageConfig::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[PageConfig::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[PageConfig::SUCCESS]) && $_SESSION[PageConfig::SUCCESS]) ? $_SESSION[PageConfig::SUCCESS] : '';

		PageConfig::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[PageConfig::SUCCESS] = NULL;

	}//END clearSuccess 











}//END class PageConfig




 ?>