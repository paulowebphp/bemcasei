<?php 

namespace Core\Model;

use \Core\Model;
use \Core\Model\Gift;



class Template extends Model
{

	# Session
	const SESSION = "TemplateSession";

	# Error - Success
	const SUCCESS = "Template-Success";
	const ERROR = "Template-Error";







	public static function getTemplateNames( $idtemplate )
	{

		$names = [


			'1'=>[

				'0'=>'Sabrina',
				'1'=>'Estevão'

			],


			'2'=>[

				'0'=>'Vera',
				'1'=>'Gustavo'

			],


			'3'=>[

				'0'=>'Eliza',
				'1'=>'Norberto'

			],


			'4'=>[

				'0'=>'Ana Lúcia',
				'1'=>'Paulo'

			],


			'5'=>[

				'0'=>'Karine',
				'1'=>'Diego'

			]


		];

		return $names[$idtemplate];

	}//END getTemplateNames


























	public static function getDesbanner( $idtemplate )
	{

		$fullArray = [


			'1'=>'photo32.jpg',
			'2'=>'photo33.jpg',
			'3'=>'photo34.jpg',
			'4'=>'photo31.jpg',
			'5'=>'photo30.jpg'


		];//end fullArray

		
		return $fullArray[$idtemplate];

		//return $fullArray[$idtemplate];


	}//END getTemplateNames



































































	public static function getWedding( $idtemplate )
	{


		$timezone = new \DateTimeZone('America/Sao_Paulo');

		$date = new \DateTime("now + 3 month");

		$date->setTimezone($timezone);




		$fullArray = [


			'1'=>[

				'desphoto'=>'photo5.jpg',
				'dtwedding'=>$date->format('Y-m-d'),
				'tmwedding'=>'19:30',
				'desdescription'=>"Queridos, chegou a grande hora! A hora que, há dois anos, a gente nem imaginava, mas que agora já estamos contando cada segundo e imaginando cada minuto dessa festa com vocês.\n\nA cada volta que o relógio dá, mais certeza temos: nossa felicidade é imensa e faz o calendário andar a passos rápidos. Nosso coração anda aos pulos, da mesma forma que estaríamos, se nossas pernas não doessem depois!\n\nEstamos esperando vocês para vibrar muito com o nossa união e soltar balões coloridos e dançar muito depois que nosso primeiro beijo depois do famoso \"sim\" acontecer. Só vem!",
				'descostume'=>'Tradicional - terno, sapatos lustrosos, cabelo penteado, vestido longo e salto alto',
				'desaddress'=>'Praça da Sé',
				'desnumber'=>'',
				'desdistrict'=>'Sé',
				'descity'=>'Sao Paulo',
				'desstate'=>'SP',
				'descountry'=>'',
				'desdirections'=>'Centro; Perto do Corpo de Bombeiros e do Theatro Municiapl; Acesso pela Av. Tiradentes'

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END  



































	public static function getParty( $idtemplate )
	{


		$timezone = new \DateTimeZone('America/Sao_Paulo');

		$date = new \DateTime("now + 3 month");

		$date->setTimezone($timezone);




		$fullArray = [


			'1'=>[

				'desphoto'=>'photo13.jpg',
				'dtparty'=>$date->format('Y-m-d'),
				'tmparty'=>'22:00',
				'desdescription'=>"Vem que vem! Vai ter tudo que realmente importa em uma festa de casamento: bolo, docinho, comida boa, muita bebida, gente chorando com discurso, música até o sol raiar e… já falei bebida?\n\n Pode deixar que o kit ressaca está por conta do casal. Chinelo para levar a festa até o fim? Vai ter também! Tudo que você precisa trazer é a vontade de comemorar esse dia com a gente. De resto a gente dá um jeito.",
				'descostume'=>'Tradicional - terno, sapatos lustrosos, cabelo penteado, vestido longo e salto alto',
				'desaddress'=>'Av. Pedro Álvares Cabral',
				'desnumber'=>'',
				'desdistrict'=>'Vila Mariana',
				'descity'=>'Sao Paulo',
				'desstate'=>'SP',
				'descountry'=>'',
				'desdirections'=>'Zona Sul; Perto da IBM Brasil; Acesso pela 23 de Maio'

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getParty

























































	public static function getEvent( $idtemplate )
	{


		$timezone = new \DateTimeZone('America/Sao_Paulo');

		$date0 = new \DateTime("now + 1 day");

		$date0->setTimezone($timezone);


		$date1 = new \DateTime("now + 3 week");

		//$date1->setTimezone($timezone);


		$date2 = new \DateTime("now + 6 week");

		//$date2->setTimezone($timezone);


		$date3 = new \DateTime("now + 9 week");

		//$date3->setTimezone($timezone);



		$fullArray = [


			'1'=>[


				'0'=>[


					
					'desphoto'=>'photo4.jpg',
					'desevent'=>'Festa de Noivado',
					'desdescription'=>'Depois de três anos de espera, nada mais justo que ter todos vocês aqui conosco para celebrar o início da nossa união (oficial, com papel assinado, coisa séria mesmo). Venham cheios de amor no coração, felicidade no rosto e disposição para beber champagne até o sol raiar!',
					'dtevent'=>$date0->format('Y-m-d'),
					'tmevent'=>'19:30',
					'nrphone'=>'00-99888-7766',
					'desaddress'=>'Av. Pedro Álvares Cabral',
					'desnumber'=>'',
					'desdistrict'=>'Vila Mariana',
					'descity'=>'Sao Paulo',
					'desstate'=>'SP',
					'descountry'=>'',
					'desdirections'=>'Zona Sul; Perto da IBM Brasil; Acesso pela 23 de Maio'

				],

				'1'=>[


					'desphoto'=>'photo9.jpg',
					'desevent'=>'Chá da Casa Nova',
					'desdescription'=>'Posso usar ditados aqui? Pois, você sabe, quem casa quer casa! E para deixar a nossa linda e pronta para receber todos vocês em um futuro bem próximo, estamos marcando nosso Chá da Casa Nova. Vocês já têm a listinha do que pensamos, mas podem trazer outras coisas que acharem legais, além de muita energia positiva. Beijo!',
					'dtevent'=>$date1->format('Y-m-d'),
					'tmevent'=>'19:30',
					'nrphone'=>'00-3330-3330',
					'desaddress'=>'Rua do Futuro',
					'desnumber'=>'959',
					'desdistrict'=>'Bairro das Graças',
					'descity'=>'Recife',
					'desstate'=>'Pernambuco',
					'descountry'=>'',
					'desdirections'=>'Próximo ao Shopping Plaza Casa Forte e do Colégio Damas'

				],

				


				'2'=>[


					
					'desphoto'=>'photo10.jpg',
					'desevent'=>'Chá de Barnela',
					'desdescription'=>'Uma das melhores partes de casar é ter várias festas para a gente se encontrar e ganhar presentes (mas o amor e união também é importante, galera!). Que tal me ajudar a compor AQUELE armário sensacional de roupas íntimas para lá de sensuais, bonitas e que dão orgulho em vestir? Não dá pra casar com roupa íntima sem elástico, né?!',
					'dtevent'=>$date2->format('Y-m-d'),
					'tmevent'=>'15:00',
					'nrphone'=>'00-3330-3330',
					'desaddress'=>'Rua Murtinho Nobre',
					'desnumber'=>'93',
					'desdistrict'=>'Santa Teresa',
					'descity'=>'Rio de Janeiro',
					'desstate'=>'RJ',
					'descountry'=>'',
					'desdirections'=>'Próximo ao Glória; Perto do Museu Casa de Benjamin Constant'

				],


				'3'=>[


					
					'desphoto'=>'photo11.jpg',
					'desevent'=>'Despedida de Solteira(o)',
					'desdescription'=>'Os astros lá no céu estão sorrindo para a gente! E para comemorar, nada melhor que uma festa no melhor estilo despedida de solteira(o) que esse país já viu. Vamos deixar que a alegria tome conta da gente, como se fosse Carnaval. Vamos dançar, vamos rir e viver como se não houvesse amanhã. Só vem!',
					'dtevent'=>$date3->format('Y-m-d'),
					'tmevent'=>'21:00',
					'nrphone'=>'00-99888-7766',
					'desaddress'=>'Rua Padre Chagas',
					'desnumber'=>'1',
					'desdistrict'=>'Moinhos de Vento',
					'descity'=>'Curitiba',
					'desstate'=>'Paraná',
					'descountry'=>'',
					'desdirections'=>'Bairro Moinhos de Vento; Entre o Parque e o Hospital'

				],

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getEvents












































	public static function getAlbum( $idtemplate, $initialpage = false )
	{	


		$fullArray = [


			'1'=>[

				'0'=>[


					'desphoto'=>'photo22.jpg',
					'desalbum'=>'O dia que nos conhecemos',
					'desdescription'=>'Na festa no apartamento do Luca, inesquecível!'

				],

				'1'=>[


					'desphoto'=>'photo2.jpg',
					'desalbum'=>'Muito amor na causa',
					'desdescription'=>'A paixão que daí se seguiu foi avassaladora entre nós'

				],


				'2'=>[


					'desphoto'=>'photo14.jpg',
					'desalbum'=>'Verão em Paraty com a galera da Facul',
					'desdescription'=>'Esse dia foi louco'

				],

				'3'=>[


					'desphoto'=>'photo17.jpg',
					'desalbum'=>'Formatura',
					'desdescription'=>'Lembranças incríveis desse dia de tantas conquistas para nós'

				],



				'4'=>[


					'desphoto'=>'photo25.jpg',
					'desalbum'=>'Nos protestos também tem amor',
					'desdescription'=>'Sempre andando lado a lado, lutando por um Brasil melhor'

				],


				

				'5'=>[


					'desphoto'=>'photo16.jpg',
					'desalbum'=>'A caminho da roça',
					'desdescription'=>'Indo pra roça em Minas, no primeiro carro que compramos'

				],



				'6'=>[


					'desphoto'=>'photo18.jpg',
					'desalbum'=>'Fotografia e Mergulho',
					'desdescription'=>'Adoramos unir nossas duas atuais maiores paixões'

				],

				'7'=>[


					'desphoto'=>'photo21.jpg',
					'desalbum'=>'Nossos passeios de bike',
					'desdescription'=>'Nossos passeios de bike, tão agradáveis que nunca sairão da lembrança!'

				],

				'8'=>[


					'desphoto'=>'photo8.jpg',
					'desalbum'=>'Aniversário do Johny',
					'desdescription'=>'Aniversário do nosso querido Johny, sempre agarrado com a gente!'

				],

				'9'=>[


					'desphoto'=>'photo19.jpg',
					'desalbum'=>'Viagem pra Tailândia',
					'desdescription'=>'A viagem mais louca que já fizemos em nossa vida!'

				],

				'10'=>[


					'desphoto'=>'photo20.jpg',
					'desalbum'=>'Mais Paraty',
					'desdescription'=>'Ah, esse lugar! Amamos demais!'

				]

			]//end template


		];//end fullArray




		if ( $initialpage == true ) 
		{
			# code...
			return array_slice($fullArray[1], 0, 3);

		}//end if
		else
		{


			return $fullArray[1];

			//return $fullArray[$idtemplate];

		}//end else

		
		


	}//END getTemplateNames





















	










	public static function getVideo( $idtemplate )
	{

		$fullArray = [


			'1'=>[

				'0'=>[


					'desvideo'=>'Mania de você - Rita Lee',
					'desdescription'=>'Lembrando do primeiro show que fomos juntos, foi dessa diva absoluta! Inesquecível!',
					'desvideocode'=>'j5XF9YBuVnQ',
					'desurl'=>'youtube.com/watch?v=j5XF9YBuVnQ'

				],

				'1'=>[


					'desvideo'=>'Perfect - Ed Sheeran',
					'desdescription'=>'A razão pela qual nos conhecemos: Ed Sheeran!',
					'desvideocode'=>'2Vv-BfVoq4g',
					'desurl'=>'youtube.com/watch?v=2Vv-BfVoq4g'

				],

				'2'=>[


					'desvideo'=>'You Are Always On My Mind - Elvis Presley',
					'desdescription'=>'Sempre que escuto essa música, lembro de nós! Porque você literalmente sempre, sempre está na minha mente!',
					'desvideocode'=>'u9sRJ-eOHnc',
					'desurl'=>'youtube.com/watch?v=u9sRJ-eOHnc'

				],

				'3'=>[


					'desvideo'=>'Viva la Vida - Coldplay',
					'desdescription'=>'Foi durante essa música que a gente se olhou pela primeira vez, e você veio até mim com aquele sorriso enigmático e...... o resto é história! Te amo!',
					'desvideocode'=>'27xybIXe0Fk',
					'desurl'=>'youtube.com/watch?v=27xybIXe0Fk'

				],

				'4'=>[


					'desvideo'=>'Velha Infância - Tribalistas',
					'desdescription'=>'Essa música marco tantos momentos! Ao escutá-la passa um filme na minha cabeça!',
					'desvideocode'=>'zwqrmEMB0wc',
					'desurl'=>'youtube.com/watch?v=zwqrmEMB0wc'

				],

				'5'=>[


					'desvideo'=>'Sentimental - Los Hermanos',
					'desdescription'=>'Fico muito sentimental quando penso em você!',
					'desvideocode'=>'n2nMv-eULfg',
					'desurl'=>'https://www.youtube.com/watch?v=n2nMv-eULfg'

				]

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getVideo
















	public static function getBestFriend( $idtemplate, $initialpage = false )
	{

		$fullArray = [


			'1'=>[

				'0'=>[


					'desphoto'=>'photo27.jpg',
					'desbestfriend'=>'Marcela',
					'desdescription'=>'Já foi vizinha, já foi amiga da escola, de infância, de adolescência, e da cidade que deixei para trás. Hoje é a amiga que não troco por nada, NADA, nem pelo single autografado da Madonna. NADA!'

				],

				'1'=>[


					'desphoto'=>'photo23.jpg',
					'desbestfriend'=>'Augusto',
					'desdescription'=>'Do trabalho para viagens, para minha casa e para a vida. Sem o  Augusto não teria aprendido nem a mexer no Excel e nem a ver o mundo da forma singela que ele enxerga. Inspiração profissional, pessoal e um amigo que levaria para todos os lugares.'

				],

				'2'=>[


					'desphoto'=>'photo28.jpg',
					'desbestfriend'=>'Vitor',
					'desdescription'=>'Gente, antigamente eu era apaixonada por ele! Sabe aquele boy lindo, cheiroso, inteligente e que está sempre ali por você? Sim, é raro, mas existe, e o nome dele é Vitor. Troquei de paixão, mas meu amor por ele continua!'

				],

				'3'=>[


					'desphoto'=>'photo26.jpg',
					'desbestfriend'=>'Cecilia',
					'desdescription'=>'Mulher incrível, que fincou a própria bandeira no mundo. Dona de um sorriso infantil e de maneiras despojadas. Mostra a todos que a união mais incomum pode ser a mais fantástica. Indispensável para um chopp, para horas ao telefone e para um abraço apertado'

				]

			]//end template


		];//end fullArray



		if ( $initialpage == true ) 
		{
			# code...
			return array_slice($fullArray[1], 0, 3);

		}//end if
		else
		{


			return $fullArray[1];

			//return $fullArray[$idtemplate];

		}//end else

		
		


	}//END getTemplateNames











































































	public static function getMessage ($idtemplate )
	{


		$timezone = new \DateTimeZone('America/Sao_Paulo');

		$date0 = new \DateTime("now - 1 day");

		$date0->setTimezone($timezone);


		$date1 = new \DateTime("now - 3 day");

		//$date1->setTimezone($timezone);


		$date2 = new \DateTime("now - 1 week");

		//$date2->setTimezone($timezone);


		$date3 = new \DateTime("now - 2 week");

		//$date3->setTimezone($timezone);





		$fullArray = [


			'1'=>[

				'0'=>[


					'desmessage'=>'Cristóvão Albino',
					'desdescription'=>'Amo vocês mais do que amo misto quente! Que a felicidade seja recorrente e que possamos comemorar nossas conquistas hoje e sempre :)',
					'dtregister'=>$date0->format('Y-m-d')

				],

				

				'1'=>[


					'desmessage'=>'Agatha Pinheiro',
					'desdescription'=>'Amar é mesmo tudo! E poder ver a união de duas pessoas tão especiais é uma sensação ímpar. Impossível traduzir em palavras tudo que estou sentindo nesse momento. Então, de forma simples e do coração, desejo a vocês muitas felicidades, saúde, união e menos disputas para saber quem lava a louça. Amo vocês!',
					'dtregister'=>$date1->format('Y-m-d')

				],

				'2'=>[


					'desmessage'=>'Haroldo Rodrigues',
					'desdescription'=>'A felicidade existe toda vez que olho para vocês. É lindo ver um amor construído com tanto companheirismo, troca e gratidão. Olhando para vocês, acredito que o mundo pode ser infinitamente melhor. Tudo de bom!',
					'dtregister'=>$date2->format('Y-m-d')

				],

				'3'=>[


					'desmessage'=>'Jéssica Muller',
					'desdescription'=>'Ainda lembro quando todos nós nos vimos pela primeira vez. Jamais imaginaria que acabaria aqui, prestes a ver o casamento de vocês. E, olha, que surpresa boa! Logo aparece um sorriso para mostrar tudo aquilo que sinto: felicidade, orgulho e muito amor por vocês. Sejam felizes! O resto a gente corre atrás.',
					'dtregister'=>$date3->format('Y-m-d')

				]

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getMessage
























	public static function getOuterList( $idtemplate )
	{

		$fullArray = [


			'1'=>[

				'0'=>[


					'desouterlist'=>'Lista da Fafá',
					'desdescription'=>'Lá tem de tudo, tudo mesmo: de coisinhas para a cozinha até livros. Você pode procurar pelo nosso nome ou digitar o código 34581, fazer sua compra e mandar entregar diretamente para a gente.',
					'dessite'=>'www.lissstasdafafa.com.br',
					'nrphone'=>'00-3330-3330',
					'deslocation'=>'Rua Padre Chagas, 1 - Moinhos de Vento - Curitiba, Paraná'

				],

				'1'=>[


					'desouterlist'=>'Alemanhas.com',
					'desdescription'=>'Você pode comprar online e mandar entregar no nosso endereço, usando o código 450091. Tem coisas para mobiliar a casa inteira e ainda vendem vários mimos, já que sabemos que você ama paparicar a gente!',
					'dessite'=>'www.alemagna11.net.br',
					'nrphone'=>'-',
					'deslocation'=>'-'

				],

				'2'=>[


					'desouterlist'=>'Loja do Silva',
					'desdescription'=>'Se você liga para a gente em um sábado, sabe que ou estamos em casa ou na Loja do Silva. Deixamos nossa lista no balcão. É só ir lá, pedir e comprar alguma coisa bem legal e bonita para nossa casa.',
					'dessite'=>'-',
					'nrphone'=>'00-3330-3330',
					'deslocation'=>'Rua Murtinho Nobre, 93 - Santa Teresa - Rio de Janeiro, RJ'

				],

				'3'=>[


					'desouterlist'=>'Farah Home Dpto',
					'desdescription'=>'Quem não tem vontade de entrar nessa loja e chamá-la de lar? Pois é, tudo lá é bom, tudo lá é bonito e tudo ficaria lindo aqui do nosso lado. Para comprar algo da nossa lista, é só ir até o balcão de atendimento e dizer nosso nome.',
					'dessite'=>'-',
					'nrphone'=>'00-3330-3330',
					'deslocation'=>'Rua do Futuro, 959 - Bairro das Graças - Recife - Pernambuco'

				],

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getOuterList



























	public static function getStakeholder( $idtemplate )
	{

		$fullArray = [


			'1'=>[

				'0'=>[


					'desstakeholder'=>'Buffet Unicórnio',
					'descategory'=>'Comida',
					'desdescription'=>'Um buffet tão bom, que dizem que a gente não existe! Confira nossos sabores e experiências para acreditar que tudo que é bom pode ser ainda melhor.',
					'dessite'=>'www.buffetunicorn.net.br',
					'nrphone'=>'00-9988-7766',
					'deslocation'=>'Rua do Futuro, 959 - Bairro das Graças - Recife - Pernambuco',
					'desemail'=>'vendas@buffetunicorn.net.br'

				],

				'1'=>[


					'desstakeholder'=>'Fotógrafo Ricardo Martins',
					'descategory'=>'Fotografia',
					'desdescription'=>'Eternizar momentos é a nossa especialidade. Conte conosco para traduzir emoções em imagens e fazer reviver lembranças!',
					'dessite'=>'www.fotografiaricmart.com.br',
					'nrphone'=>'00-9988-7766',
					'deslocation'=>'Rua Murtinho Nobre, 93 - Santa Teresa - Rio de Janeiro, RJ',
					'desemail'=>'contato@fotografiaricmart.com.br'

				],


				'2'=>[


					'desstakeholder'=>'Docinhos Coloridos',
					'descategory'=>'Doces',
					'desdescription'=>'Quem não ama doces, simplesmente não experimentou um bom de verdade. Nossa proposta é levar sabor e estilos únicos para sua festa!',
					'dessite'=>'www.docincolorin.com.br',
					'nrphone'=>'00-9988-7766',
					'deslocation'=>'Rua Padre Chagas, 1 - Moinhos de Vento - Curitiba, Paraná',
					'desemail'=>'vendas@docincolorin.com.br'

				],


				'3'=>[


					'desstakeholder'=>'Arco Trajes Finos',
					'descategory'=>'Roupas',
					'desdescription'=>'Roupas são mais do que tecidos, é aquilo que veste nosso corpo, nossa alma e transmite a mensagem que queremos passar para o mundo. Aqui você encontra excelência e qualidade!',
					'dessite'=>'www.trajesarcf.com.br',
					'nrphone'=>'00-9988-7766',
					'deslocation'=>'Av. Pedro Álvares Cabral - Vila Mariana - São Paulo - SP',
					'desemail'=>'contato@trajesarcf.com.br'

				],

			]//end template


		];//end fullArray

		
		return $fullArray[1];

		//return $fullArray[$idtemplate];


	}//END getStakeholder


















	public static function setError( $msg )
	{

		$_SESSION[Template::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Template::ERROR]) && $_SESSION[Template::ERROR]) ? $_SESSION[Template::ERROR] : '';

		Template::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Template::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Template::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Template::SUCCESS]) && $_SESSION[Template::SUCCESS]) ? $_SESSION[Template::SUCCESS] : '';

		Template::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Template::SUCCESS] = NULL;

	}//END clearSuccess 









}//END class Template





 ?>