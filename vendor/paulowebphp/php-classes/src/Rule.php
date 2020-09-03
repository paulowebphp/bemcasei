<?php 

namespace Core;

use \Core\DB\Sql;
use \Core\Model;


class Rule extends Model
{



	//ENDPOINT_PRODUCTION
	//ENDPOINT_SANDBOX







	/*
	# BEM CASEI SANDBOX PJ
	#####################################################################
	const WIRECARD_ACCESS_TOKEN = 'd53f289e62344cd88ac90b20077f2513_v2';
	const WIRECARD_APP = 'APP-335B0VPAUCEH';
	const WIRECARD_API_TOKEN = 'GS8GYYWFHSZGTLW3TG1B008BV4QZONVA';
	const WIRECARD_API_KEY = '6G31U9JXDTUQSNZAL1KVDRX9BPUVHP984DD0SS0G';

	const WIRECARD_PRIMARY_RECEIVER = 'MPA-89DC0863B0D3';
	#####################################################################
	

	
	# BEM CASEI PRODUCTION PJ
	#####################################################################
	const WIRECARD_ACCESS_TOKEN = '75ea4315ea064f88a361fa3d0eaaf5e2_v2';
	const WIRECARD_APP = 'APP-SOJRLP26BSJK';
	const WIRECARD_API_TOKEN = 'DIEIVAFFUZJAW1A9I4Q3TJSQA2VEFYHW';
	const WIRECARD_API_KEY = 'AUOJOJGTTAVUXTF7WY9W5SDIQ14LFPOOXOSS3MHD';

	const WIRECARD_PRIMARY_RECEIVER = 'MPA-8E6DB57A5738';
	#####################################################################
	*/






	

	

	const CANONICAL_NAME = 'bemcasei1.com.br';

	const STATEMENT_DESCRIPTOR = 'Bem Casei';


	const COUPON_LENGTH = 8;
	const LEAD_PASSWORD_LENGTH = 6;




	const MKT_CARD_PERCENTAGE = 0.007;
	const MKT_CARD_FIXED = 0.69;
	const MKT_BOLETO_PERCENTAGE = 0.0499;
	const MKT_BOLETO_FIXED = 3.49;


	const PRO_CARD_PERCENTAGE = 0.0429;
	const PRO_CARD_FIXED = 0.69;
	const PRO_BOLETO = 3.49;


	const CARD_ANTECIPATION_PERIOD = 14;
	const BOLETO_ANTECIPATION_PERIOD = 2;



	const ANTECIPATION_1 = 0;
	const ANTECIPATION_2 = 0.0278;
	const ANTECIPATION_3 = 0.0412;
	const ANTECIPATION_4 = 0.0547;
	const ANTECIPATION_5 = 0.0681;
	const ANTECIPATION_6 = 0.0816;





	const TESTIMONIAL_INSAMPLE = 0;






	const SELLER_CATEGORY_PLAN = '10';
	const SKU_PREFIX_PLAN = 'PLAN-';
	const SKU_PREFIX_PRODUCT = 'PROD-';















	const DESCOUNTRY = "Brasil";
	const DESCOUNTRYCODE = "BRA";
	const NR_COUNTRY_AREA = 55;

	/**GENERAL */
	const ITENS_PER_PAGE = "10";

















	/**PHOTO UPLOAD*/
	const CODE_PRODUCTS = "11";
	
	const CODE_BESTFRIENDS = "22";
	const CODE_GIFTS = "33";
	const CODE_WEDDINGS = "44";
	const CODE_CONSORTS = "55";
	const CODE_PARTIES = "66";
	const CODE_EVENTS = "77";
	const CODE_ALBUNS = "88";
	const CODE_CUSTOMSTYLE = "99";







	/**RSPV upload*/
	const CODE_RSVP = "15";
	const DIRECTORY_RSVP = "rsvp";


	/***RSVP SEND***/
	const MAX_MAIL_SEND = 20;







	const DEFAULT_PHOTO = '0.jpg';
	const DEFAULT_PHOTO_EXTENSION = 'jpg';
	const DEFAULT_PHOTO_SIZE = '3180';



	const PHOTO_QUALITY = '70';
	const PHOTO_QUALITY_PNG = '6.3';


	const MAX_PHOTO_UPLOAD_SIZE = '1000000';

	const UPLOAD_MIME_TYPE = [

		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png',
		'text/csv',
		'application/vnd.ms-excel',

	];




	const UPLOAD_MIME_TYPE_RSVP = [

		'csv'

	];














	const PLAN_NAME_FREE = "Plano 10 Dias Free";
	const PLAN_NAME_BASIC = "Plano Basic";
	const PLAN_NAME_INTERMEDIATE = "Plano Classic";
	const PLAN_NAME_ADVANCED = "Plano Gold";


	const VOUCHER_INPERIOD = '6';
	const VOUCHER_INPLANCODE = '306';
	const VOUCHER_INPLANCONTEXT = '3';
	const VOUCHER_DESVLPRICE = '';













	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/

	const MAINTENANCE = 'Olá! Desculpe pelo transtorno, mas estamos fazendo uma manutenção no Banco de Dados e por isso nossos serviços estão indisponíveis até as 19:30h de hoje';

	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/
	/*********************************MAINTENANCE ***************************************/












	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/

	const EMAIL_PLAN = 'Compra de Plano';
	const EMAIL_PURCHASE = 'Compra de Plano';
	const EMAIL_RENEWAL = 'Você Renovou Seu Plano';
	const EMAIL_UPGRADE = 'Você Fez Um Upgrade No Seu Plano';
	const EMAIL_LEAD = 'Baixe o Seu E-book!';

	const EMAIL_PLAN_AUTHORIZED = 'Compra de Plano Confirmada';

	const EMAIL_PLAN_CANCELLED = 'Compra de Plano Cancelada';






	const EMAIL_PRODUCT_SELLER = 'Presente Recebido';

	const EMAIL_PRODUCT_BUYER = 'Compra de Presente';




	const EMAIL_PRODUCT_SELLER_AUTHORIZED = 'Presente Confirmado';

	const EMAIL_PRODUCT_BUYER_AUTHORIZED = 'Compra de Presente Confirmada';





	const EMAIL_PRODUCT_CANCELLED = 'Compra de Presente Cancelada';







	const EMAIL_RSVP_USER = 'Confirmação de Presença Recebida';

	const EMAIL_RSVP_GUEST = 'Confirmação de Presença Enviada';







	const EMAIL_MESSAGE_USER = 'Mensagem Recebida';

	const EMAIL_MESSAGE_GUEST = 'Mensagem Enviada';





	const EMAIL_PASSWORD_RECOVERY = 'Redefinir Senha';
	



	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/
	/*********************************EMAIL SUBJECTS ***************************************/




























	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/
	const CHECK_LOGIN_EXISTS = 'Este endereço de e-mail já está sendo usado por outro usuário | Caso seja seu e-mail, faça login no Bem Casei';

	const CHECK_LEAD_EXISTS = 'Este endereço de e-mail já foi usado  | Caso seja o seu e-mail, vá na sua Caixa de Entrada e clique no link recebido para fazer Login e baixar o E-book';


	const ERROR_RECAPTCHA = 'Clique no Recaptcha para prosseguir';
	const VALIDATE_RECAPTCHA = 'Não passou pelo Recaptcha | Por favor, tente novamente, se o erro persistir entre em contato com o suporte';


	const ERROR_PASSWORD = 'Preencha a senha';
	const PASSWORD_CONFIRM = 'Confirme a senha';
	const PASSWORD_DIVERGENCY = 'Você digitou duas senhas diferentes | Por favor, tente novamente';
	const VALIDATE_PASSWORD = 'A senha deve ter de 6 e 20 caracteres | Por favor, tente novamente';



	const VALIDATE_PLAN = 'Para ter acesso a esta página, você precisa ter um plano ativo | Vá no menu "Meu Plano" para adquirir um plano ou aguarde a confirmação do pagamento | Em caso de dúvida, contate o suporte';


	const VALIDATE_UPGRADE = 'Seu plano atual não permite fazer Upgrade | Vá no menu "Meu Plano" para adquirir ou renovar um plano';

	const VALIDATE_PLAN_FREE = 'Usuáris do Plano Free não têm acesso a esta rota';


	const VALIDATE_PLAN_PURCHASE_CODE = 'Este código de plano não é válido';
	
	const VALIDATE_PLAN_CONTEXT = 'Seu plano atual não te dá permissão para acessar esta página';



	const ERROR_REGISTER = 'Ocorreu um erro momentâneo, provavelmente devido à instabilidade na conexão de internet entre o nosso servidor e o seu dispositivo | Por favor, faça login na sua conta e você pode adquirir um plano na seção "Meu Plano" do seu Dashboard | Caso ainda assim o erro persista, entre em contato com o suporte';
	
	const VALIDATE_REGISTER = 'É necessário concluir seu registro no site antes de acessar essa página';


	const PLAN_WAIT_FOR_AUTHORIZATION = 'Aguarde a confirmação do pagamento pelo último plano | Previsão: até 2 dias corridos após o pagamento por cartão e até 4 dias úteis no caso de pagamento em Boleto';




	const VALIDATE_ID_HASH = 'O endereço da página que você tentou acessar está incorreto | Por favor, confira o endereço digitado e tente acessar novamente';


	const VALIDATE_RSVP_CONFIRMED = 'Este convidado já fez sua confirmação e, portanto, você não pode editá-lo | Se precisar alterar os seus dados recomendamos o seguinte procedimento: delete o convidado, recrie-o e peça para o mesmo fazer a confirmação de presença novamente no seu site';	


	const ERROR_NAME = 'Informe o seu nome completo';
	const VALIDATE_FULL_NAME = 'Este nome não parece ser completo';
	const VALIDATE_NAME = 'O seu nome não pode ser formado apenas com caracteres especiais | Tente novamente';





	const ERROR_EMAIL = 'Informe o seu e-mail';
	const VALIDATE_EMAIL = 'O e-mail parece estar num formato inválido | Tente novamente';







	







	const ERROR_CPF = 'Informe o CPF';
	const VALIDATE_CPF = 'Informe um CPF válido';





	const ERROR_DATE_BIRTH = 'Informe a data de nascimento';
	const VALIDATE_DATE_MAJORITY = 'Informe uma data de nascimento válida | É necessário ser maior de 18 anos para utilizar o site';
	const VALIDATE_DATE_PAST_TO_NOW = 'Informe uma data de nascimento válida | A data não pode ser maior que o dia de hoje';





	const ERROR_DDD = 'Informe o DDD';
	const VALIDATE_DDD = 'Informe um DDD válido | O DDD deve ter 2 digítos';






	const ERROR_PHONE = 'Informe o telefone ou celular';
	const VALIDATE_PHONE = 'Informe um telefone ou celular válido | O número deve ter 8 ou 9 dígitos';






 	const ERROR_ZIPCODE = 'Informe o CEP';
 	const VALIDATE_ZIPCODE = 'Informe um CEP válido';






 	const ERROR_ADDRESS = 'Informe o endereço';
 	const VALIDATE_ADDRESS = 'O endereço não pode ser formado apenas com caracteres especiais | Tente novamente';
 




 	const ERROR_NUMBER = 'Informe o número';
 	const VALIDATE_NUMBER = 'O número não deve conter letras e não pode ser formado apenas com caracteres especiais | Tente novamente';





 	const ERROR_DISTRICT = 'Informe o bairro';
 	const VALIDATE_DISTRICT = 'O nome do bairro não pode ser formado apenas com caracteres especiais | Tente novamente';



 	const ERROR_CITY = 'Selecione a Cidade';
 	const VALIDATE_CITY = 'Cidade não válida';

 	const ERROR_STATE = 'Selecione o Estado';
 	const VALIDATE_STATE = 'Estado não válido';



 	const ERROR_INTERMS = 'Marque o checkbox no fim da página se estiver de acordo com Termos de Uso, os Termos da Lista de Presentes Virtuais e a Política de Privacidade do Bem Casei';





	const VALIDATE_COUPON_EXISTS = 'Não existe um cupom com este código em nosso site | Tente digitar novamente, conferindo bem a sequência de números e letras do cupom';

	const CHECK_COUPON_IS_APPLIED = 'Sentimos muito, mas este cupom já foi utilizado por outro usuário e não tem mais validade';


	const CHECK_IS_VOUCHER = 'Não existe um cupom com este código em nosso site | Tente digitar novamente, conferindo bem a sequência de números e letras do cupom';




 	const ERROR_CUSTOMER_NAME = 'Informe o nome do titular do cartão de crédito';
 	const VALIDATE_CUSTOMER_NAME = 'O nome do titular do cartão de crédito não pode ser formado apenas com caracteres especiais | Tente novamente';





 	const ERROR_HOLDER_NAME = 'Informe o nome do titular tal como está impresso no cartão de crédito';
 	const VALIDATE_HOLDER_NAME = 'O nome do titular do cartão de crédito não pode ser formado apenas com caracteres especiais | Tente novamente';





 	const ERROR_CARD_NUMBER = 'Informe o número do cartão de crédito';
 	const VALIDATE_CARD_NUMBER = 'O número do cartão de crédito está inválido, o mesmo deve ter de 13 a 19 dígitos, dependendo da bandeira | Tente novamente';






 	const ERROR_CARD_MONTH = 'Informe o mês de validade do cartão de crédito';
 	const VALIDATE_CARD_MONTH = 'O mês de validade do cartão de crédito está inválido, o mesmo deve ter 2 dígitos | Tente novamente';





 	
 	const ERROR_CARD_YEAR = 'Informe o ano de validade do cartão de crédito';
 	const VALIDATE_CARD_YEAR = 'O ano de validade do cartão de crédito está inválido, o mesmo deve ter 4 dígitos | Tente novamente';






 	const ERROR_CARD_CVC = 'Informe o código de segurança do cartão de crédito';
 	const VALIDATE_CARD_CVC = 'O código de segurança do cartão de crédito está inválido, o mesmo deve ter 3 ou 4 dígitos | Tente novamente';







 	const GENERAL_ERROR = 'Ocorreu um erro momentâneo, provavelmente devido à instabilidade na conexão de internet entre o nosso servidor e o seu dispositivo | Por favor, tente novamente ou entre em contato com o suporte';


 	const VALIDATE_CHECKOUT_METHOD = 'Este método de pagamento não é válido';


	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/
	/********************************* SET ERROR ***************************************/





















	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/

	const CUSTOMER_UNAUTHORIZED = 'Houve uma falha de autenticação na geração do perfil da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const CUSTOMER_VALIDATION = 'Houve uma falha de validação na geração do perfil da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const CUSTOMER_UNEXPECTED = 'Houve uma falha inesperada na geração do perfil da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';










	const ACCOUNT_UNAUTHORIZED = 'Houve uma falha de autenticação na abertura da conta | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const ACCOUNT_VALIDATION = 'Houve uma falha de validação na abertura da conta | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const ACCOUNT_UNEXPECTED = 'Houve uma falha inesperada na abertura da conta | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';














	const PLAN_UNAUTHORIZED = 'Houve uma falha de autenticação na geração do plano da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const PLAN_VALIDATION = 'Houve uma falha de validação na geração do plano da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const PLAN_UNEXPECTED = 'Houve uma falha inesperada na geração do plano da conta | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';



















	const PRODUCT_UNAUTHORIZED = 'Houve uma falha de autenticação da conta do casal no pagamento do pedido | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const PRODUCT_VALIDATION = 'Houve uma falha de validação da conta do casal no pagamento do pedido | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const PRODUCT_UNEXPECTED = 'Houve uma falha inesperada no pagamento do pedido | Não se preocupe, nenhum valor foi cobrado do seu cartão | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';



















	const GENERAL_UNAUTHORIZED = 'Houve uma falha de autenticação da conta do casal, provavelmente devido a alguma instabilidade | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const GENERAL_VALIDATION = 'Houve uma falha de autenticação da conta do casal, provavelmente devido a alguma instabilidade | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const GENERAL_UNEXPECTED = 'Houve uma falha inesperada, provavelmente devido a alguma instabilidade | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';






















	const BANK_UNAUTHORIZED = 'Houve uma falha de autenticação da conta do casal na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const BANK_VALIDATION = 'Houve uma  falha de autenticação da conta do casal na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const BANK_UNEXPECTED = 'Houve uma falha inesperada na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';



















	const TRANSFER_UNAUTHORIZED = 'Houve uma falha de autenticação da conta do casal na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const TRANSFER_VALIDATION = 'Houve uma  falha de autenticação da conta do casal na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';


	const TRANSFER_UNEXPECTED = 'Houve uma falha inesperada na configuração da conta bancária | Não se preocupe, nenhum dado foi enviado | Por favor, tente novamente, se a falha persistir entre em contato com o suporte';





	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/
	/************************* SET ERROR WIRECAR ***************************/
	
























	/**SIZE TOTAL */

	const MAX_SIZE_TOTAL_FREE = "20000000";
	const MAX_SIZE_TOTAL_BASIC = "90000000";
	const MAX_SIZE_TOTAL_INTERMEDIATE = "160000000";
    const MAX_SIZE_TOTAL_ADVANCED = "100000000";











	
	/**BEST FRIENDS */

	const MAX_BESTFRIENDS_FREE = "3";
	const MAX_BESTFRIENDS_BASIC = "3";
	const MAX_BESTFRIENDS_INTERMEDIATE = "8";
    const MAX_BESTFRIENDS_ADVANCED = "1000";
	
	


    /**EVENTS */

    const MAX_EVENTS_FREE = "6";
	const MAX_EVENTS_BASIC = "6";
	const MAX_EVENTS_INTERMEDIATE = "20";
	const MAX_EVENTS_ADVANCED = "1000";
	
	



    /**STAKEHOLDERS */

    const MAX_STAKEHOLDERS_FREE = "3";
	const MAX_STAKEHOLDERS_BASIC = "3";
	const MAX_STAKEHOLDERS_INTERMEDIATE = "10";
	const MAX_STAKEHOLDERS_ADVANCED = "1000";
	



    /**RSVP */

    const MAX_RSVP_FREE = "500";
	const MAX_RSVP_BASIC = "500";
	const MAX_RSVP_INTERMEDIATE = "1000";
	const MAX_RSVP_ADVANCED = "1000";
	const MIN_ADULTS_AGE = '15';



    /**MESSAGES */

    const MAX_MESSAGES_FREE = "12";
	const MAX_MESSAGES_BASIC = "12";
	const MAX_MESSAGES_INTERMEDIATE = "60";
	const MAX_MESSAGES_ADVANCED = "1000";
	





	/**VIDEOS */

    const MAX_VIDEOS_FREE = "10";
	const MAX_VIDEOS_BASIC = "10";
	const MAX_VIDEOS_INTERMEDIATE = "20";
	const MAX_VIDEOS_ADVANCED = "30";





	/**IMAGES */

    const MAX_IMAGES_FREE = "10";
	const MAX_IMAGES_BASIC = "10";
	const MAX_IMAGES_INTERMEDIATE = "20";
	const MAX_IMAGES_ADVANCED = "30";






	/**PRODUCTS */

    const MAX_PRODUCTS_FREE = "1000";
	const MAX_PRODUCTS_BASIC = "1000";
	const MAX_PRODUCTS_INTERMEDIATE = "2000";
	const MAX_PRODUCTS_ADVANCED = "2000";





	# OUTER LISTS

    const MAX_OUTER_LISTS_FREE = "2";
	const MAX_OUTER_LISTS_BASIC = "2";
	const MAX_OUTER_LISTS_INTERMEDIATE = "10";
	const MAX_OUTER_LISTS_ADVANCED = "1000";




	const POPOVER_MAX_TITLE = 'Limite Atingido';
	const POPOVER_MAX_CONTENT = 'Você atingiu o limite para este recurso, dentro plano atual';


	const POPOVER_REGISTER_BANK_CONTENT = 'Para fazer uma transferência, é preciso antes cadastrar uma conta bancária';










	public static function getRule( $value )
	{
		switch ($value) 
		{
			case 'MAX_OUTER_LISTS_BASIC':
				# code...
				return Rule::MAX_OUTER_LISTS_BASIC;
				
			
			case 'MAX_OUTER_LISTS_INTERMEDIATE':
				# code...
				return Rule::MAX_OUTER_LISTS_INTERMEDIATE;
				


				case 'MAX_MESSAGES_BASIC':
				# code...
				return Rule::MAX_MESSAGES_BASIC;
				
			
			case 'MAX_MESSAGES_INTERMEDIATE':
				# code...
				return Rule::MAX_MESSAGES_INTERMEDIATE;
				




				case 'MAX_EVENTS_BASIC':
				# code...
				return Rule::MAX_EVENTS_BASIC;
				
			
			case 'MAX_EVENTS_INTERMEDIATE':
				# code...
				return Rule::MAX_EVENTS_INTERMEDIATE;
				





				case 'MAX_BESTFRIENDS_BASIC':
				# code...
				return Rule::MAX_BESTFRIENDS_BASIC;
				
			
			case 'MAX_BESTFRIENDS_INTERMEDIATE':
				# code...
				return Rule::MAX_BESTFRIENDS_INTERMEDIATE;
				



			case 'MAX_STAKEHOLDERS_BASIC':
				# code...
				return Rule::MAX_STAKEHOLDERS_BASIC;
				
			
			case 'MAX_STAKEHOLDERS_INTERMEDIATE':
				# code...
				return Rule::MAX_STAKEHOLDERS_INTERMEDIATE;
				





		}//end switch




	}//END getRule










	








}//END class Rule




 ?>