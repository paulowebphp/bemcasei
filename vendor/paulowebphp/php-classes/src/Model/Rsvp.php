<?php 

namespace Core\Model;


use \Core\DB\Sql;
use \Core\Model;
use \Core\Rule;
use \Core\Validate;




class Rsvp extends Model
{





	# Session
	const SESSION = "RsvpSession";

	# Error - Success
	const SUCCESS = "Rsvp-Success";
	const ERROR = "Rsvp-Error";









	

    
    /*public function update()
	{

		$sql = new Sql();

		
		$results = $sql->select("

			CALL sp_rsvp_update(
			               
                :idrsvp,
                :iduser,
                :desguest,
                :desemail,
                :nrphone,
                :inconfirmed,
                :inmaxadults,
                :inadultsconfirmed,
                :inmaxchildren,
                :inchildrenconfirmed,
                :desadultsaccompanies,
                :dtconfirmed




			)", 
			
			[

				':idrsvp'=>$this->getidrsvp(),
				':iduser'=>$this->getiduser(),
				':desguest'=>$this->getdesguest(),
				':desemail'=>$this->getdesemail(),
				':nrphone'=>$this->getnrphone(),
				':inconfirmed'=>$this->getinconfirmed(),
				':inmaxadults'=>$this->getinmaxadults(),
				':inadultsconfirmed'=>$this->getinadultsconfirmed(),
				':inmaxchildren'=>$this->getinmaxchildren(),
				':inchildrenconfirmed'=>$this->getinchildrenconfirmed(),
				':desadultsaccompanies'=>$this->getdesadultsaccompanies(),
				':dtconfirmed'=>$this->getdtconfirmed()
				
			]
        
            
        );//end select


		////$results[0]['desguest'] = utf8_encode($results[0]['desguest']);
		//$results[0]['desadultsaccompanies'] = utf8_encode($results[0]['desadultsaccompanies']);
	  
		
	

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

        }//end if
        
       

	}//END save*/



























	public function update()
	{

		$sql = new Sql();

		
		


		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
		{
			# code...

			$results = $sql->select("

				CALL sp_rsvp_update(
				               
	                :idrsvp,
	                :iduser,
	                :desguest,
	                :desemail,
	                :nrphone,
	                :inconfirmed,
	                :inmaxadults,
	                :inadultsconfirmed,
	                :inmaxchildren,
	                :inchildrenconfirmed,
	                :inchildrenageconfirmed,
	                :inchildrenconfigconfirmed,
	                :desadultsaccompanies,
	                :deschildrenaccompanies,
	                :dtconfirmed




				)", 
				
				[

					':idrsvp'=>$this->getidrsvp(),
					':iduser'=>$this->getiduser(),
					':desguest'=>utf8_decode($this->getdesguest()),
					':desemail'=>$this->getdesemail(),
					':nrphone'=>$this->getnrphone(),
					':inconfirmed'=>$this->getinconfirmed(),
					':inmaxadults'=>$this->getinmaxadults(),
					':inadultsconfirmed'=>$this->getinadultsconfirmed(),
					':inmaxchildren'=>$this->getinmaxchildren(),
					':inchildrenconfirmed'=>$this->getinchildrenconfirmed(),
					':inchildrenageconfirmed'=>$this->getinchildrenageconfirmed(),
					':inchildrenconfigconfirmed'=>$this->getinchildrenconfigconfirmed(),
					':desadultsaccompanies'=>utf8_decode($this->getdesadultsaccompanies()),
					':deschildrenaccompanies'=>utf8_decode($this->getdeschildrenaccompanies()),
					':dtconfirmed'=>$this->getdtconfirmed()
					
				]
	        
	            
	        );//end select


			$results[0]['desguest'] = utf8_encode($results[0]['desguest']);
			$results[0]['desadultsaccompanies'] = utf8_encode($results[0]['desadultsaccompanies']);
			$results[0]['deschildrenaccompanies'] = utf8_encode($results[0]['deschildrenaccompanies']);

			
			
			

		}//end if
		else
		{


			
			$results = $sql->select("

				CALL sp_rsvp_update(
				               
	                :idrsvp,
	                :iduser,
	                :desguest,
	                :desemail,
	                :nrphone,
	                :inconfirmed,
	                :inmaxadults,
	                :inadultsconfirmed,
	                :inmaxchildren,
	                :inchildrenconfirmed,
	                :inchildrenageconfirmed,
	                :inchildrenconfigconfirmed,
	                :desadultsaccompanies,
	                :deschildrenaccompanies,
	                :dtconfirmed




				)", 
				
				[

					':idrsvp'=>$this->getidrsvp(),
					':iduser'=>$this->getiduser(),
					':desguest'=>$this->getdesguest(),
					':desemail'=>$this->getdesemail(),
					':nrphone'=>$this->getnrphone(),
					':inconfirmed'=>$this->getinconfirmed(),
					':inmaxadults'=>$this->getinmaxadults(),
					':inadultsconfirmed'=>$this->getinadultsconfirmed(),
					':inmaxchildren'=>$this->getinmaxchildren(),
					':inchildrenconfirmed'=>$this->getinchildrenconfirmed(),
					':inchildrenageconfirmed'=>$this->getinchildrenageconfirmed(),
					':inchildrenconfigconfirmed'=>$this->getinchildrenconfigconfirmed(),
					':desadultsaccompanies'=>$this->getdesadultsaccompanies(),
					':deschildrenaccompanies'=>$this->getdeschildrenaccompanies(),
					':dtconfirmed'=>$this->getdtconfirmed()
					
				]
	        
	            
	        );//end select

	        


		}//end else



	

		if( count($results) > 0 )
		{

			$this->setData($results[0]);

        }//end if
        
       

	}//END save










	public function getRsvp( $idrsvp )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_rsvp
			WHERE idrsvp = :idrsvp

			", 
			
			[

				':idrsvp'=>$idrsvp

			]
		
		);//end select


		


		


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desguest'] = utf8_encode($results[0]['desguest']);
				$results[0]['desadultsaccompanies'] = utf8_encode($results[0]['desadultsaccompanies']);
				$results[0]['deschildrenaccompanies'] = utf8_encode($results[0]['deschildrenaccompanies']);
				
			}//end if


			$this->setData($results[0]);
			
		}//end if




	}//END getEvent













    
	public function get( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE iduser = :iduser
            ORDER BY desguest ASC

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		
		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select



		if ( count($results) > 0 )
		{
			# code...
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{


				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if

		}//end if


		

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"]

		];//end return



		

	}//END get











	public function getConfirmed( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE inconfirmed = 1
            AND iduser = :iduser
            ORDER BY desguest ASC

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		$nrtotal = $sql->select("
			
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		
		return (int)$nrtotal[0]["nrtotal"];
				

	}//END getConfirmed













	public function getPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE iduser = :iduser
            ORDER BY desguest ASC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select


		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select



		


		

		if( count($results) > 0 )
		{


			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if
			
		}//end if

			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return



    }//END getPage
    









    public function getSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...
			$search = utf8_decode($search);

		}//end if



		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE iduser = :iduser AND desguest LIKE :search
            ORDER BY desguest ASC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select


		
		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		


		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if

		}//end if

		


			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return




    }//END getSearch














    public static function checkDesguestExists( $iduser, $search )
	{

		
		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  )
		{

			$search = utf8_decode($search);

		}//end if

		
		
		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_rsvp
            WHERE iduser = :iduser 
            AND desguest = :search

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>$search

			]
		
		);//end select

		

		# Colocar o 'count' entre parênteses equivale a um if.
		# If count count($results) > 0 , retorna TRUE
		# If count count($results) = 0 , retorna FALSE


		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desguest'] = utf8_encode($results[0]['desguest']);
				$results[0]['desadultsaccompanies'] = utf8_encode($results[0]['desadultsaccompanies']);
				$results[0]['deschildrenaccompanies'] = utf8_encode($results[0]['deschildrenaccompanies']);
				
			}//end if

			return $results[0];

		}//end if
		else
		{
			return false;

		}//end else
		

	}//END checkDesguestExists















	/*public function getFromHash( $hash )
	{

		$idrsvp = base64_decode($hash);



		$sql = new Sql();

		$results = $sql->select("

			SELECT * FROM tb_rsvp 
			WHERE idrsvp = :idrsvp

			",  
			
			[

				":idrsvp"=>$idrsvp

			]

		);//end select

		
		
		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				
				$results[0]['desguest'] = utf8_encode($results[0]['desguest']);
				$results[0]['desadultsaccompanies'] = utf8_encode($results[0]['desadultsaccompanies']);
				
			}//end if



			$this->setData($results[0]);


		}//end if


	}//END getFromHash*/












	public static function generateCsv( $iduser )
    {
        
        header("Content-type: application/csv");   
        header("Content-Disposition: attachment; filename=Confirmados.csv");
        header("Pragma: no-cache"); 


		//$rsvpconfig = new RsvpConfig();

		//$rsvpconfig->get((int)$iduser);

		

		$sql = new Sql();

		$results = $sql->select("


				SELECT a.desguest as 'Convidado',
				a.desemail as 'Email', 
				a.nrphone as 'Telefone', 
				a.inadultsconfirmed as 'Qtd_Adultos',
				a.desadultsaccompanies as 'Nomes_Adultos',
				a.inchildrenconfigconfirmed as 'Permitido_Criancas',
				a.inchildrenageconfirmed as 'Idade_Limite_Crianca',
				a.inchildrenconfirmed as 'Qtd_Criancas',
				a.deschildrenaccompanies as 'Nomes_Criancas',
				a.dtconfirmed as 'Data_Confirmacao'
				FROM tb_rsvp a
				INNER JOIN tb_users b ON a.iduser = b.iduser
				WHERE a.inconfirmed = 1
				AND a.iduser = :iduser
				ORDER BY a.desguest ASC


				",

				[

					'iduser'=>$iduser
				]

			);//end select

        

		



        if ( count($results) > 0 )
        {
        	# code...
			/*
			
			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if
			
			*/


			$out = fopen( 'php://output', 'w' );

	        if( $out )
	        {


				$head = array_keys($results[0]);
				
				fputcsv( $out, $head, ';' );
				

	            foreach ( $results as $row ) 
	            {
					$row['Permitido_Criancas'] = $row['Permitido_Criancas'] == 1 ? 'Sim' : 'Nao';
	                fputcsv( $out, $row, ';' );

	            }//end foreach

	            fclose( $out );

	        }//end if



        }//end if

 
        

    }//end generateCsv



























	public static function uploadRsvpList( 
		
		$file, 
		$iduser,
		$entity_code,
		$entity_directory,
		$validate


	)
	{



	
		$extension = explode('.', $file['name']);

		$extension = end($extension);

		$extension = strtolower($extension);


		//$mimeTypeAllowed = Rule::UPLOAD_MIME_TYPE;

		$basename = $iduser .
		"." .
		$extension;

		//$entity_directory = $this->getDirectoryName($entity_code);



		$filename = $_SERVER['DOCUMENT_ROOT'] . 
		DIRECTORY_SEPARATOR . "uploads" . 
		DIRECTORY_SEPARATOR . $entity_directory.
		DIRECTORY_SEPARATOR .
		$basename;


		/*
		
		echo '<pre>';
		var_dump($file);
		var_dump($entity_code);
		var_dump($iduser);
		var_dump($extension);
		var_dump($basename);
		var_dump($entity_directory);
		var_dump(!in_array($file['type'], Rule::UPLOAD_MIME_TYPE));
		exit;

		*/

		if( !in_array($extension, Rule::UPLOAD_MIME_TYPE_RSVP) )
		{

			$basename = false;

		}//end else if 
		elseif( move_uploaded_file( $file["tmp_name"], $filename ) )
		{

			/*
			
			echo '<pre>';
			var_dump($file);
			var_dump($entity_code);
			var_dump($iduser);
			var_dump($extension);
			var_dump($basename);
			var_dump($entity_directory);
			var_dump(!in_array($file['type'], Rule::UPLOAD_MIME_TYPE));
			exit;
			exit;
			*/


			$file_handler = fopen( $filename, 'r');

			$rsvp_handler = [];


			while( !feof( $file_handler ) )
			{

				//Pega os dados da linha
				$line = fgets($file_handler, 1024);

				$line = preg_replace('/,/', ';', $line);

				$data = explode(';', $line);

				$array_handler = [];

				foreach ($data as $key => $term)
				{
					# code...
					//if( $term == '' ) continue;

					$term = trim($term);
					
					$term = strtolower($term);

					$term = ucwords($term);

					if( (int)$key == 0 )
					{
						$key = 'desguest';

					}//end if
					elseif((int)$key == 1)
					{

						$key = 'inmaxadults';
					}//end elseif
					elseif((int)$key == 2)
					{

						$key = 'inmaxchildren';

					}//end else

					//echo '<pre>';
					//var_dump($data);
					//var_dump($term);
					//var_dump($key);
					//exit;

					$array_handler[$key] = $term;




					//array_push($array_handler, $term);

				}//end foreach

				//if($array_handler[0]) continue;

				//array_pop($array_handler);
				array_push($rsvp_handler, $array_handler);

			}//end while


			array_shift($rsvp_handler);
			array_pop($rsvp_handler);

				
			//echo '<pre>';
			//var_dump($rsvp_handler);
			//var_dump(count($rsvp_handler));
			//exit;


			//echo '<pre>';	
			//var_dump($rsvp_handler);

			fclose( $file_handler );
			unlink( $filename );



			foreach ( $rsvp_handler as $guest ) 
			{
				# code...
				if ( Rsvp::checkDesguestExists( $iduser, $guest['desguest'] ) ) 
				{
					# code...

					Rsvp::setError("O convidado \"" . $guest['desguest'] . "\" está sendo adicionado de forma duplicada | Por favor, verifique sua Lista e tente novamente, deletando ou alterando o nome deste convidado | Caso o erro persista, entre em contato como suporte");
					header('Location: /dashboard/rsvp/upload');
					exit;

				}//end if


			}//end foreach



			Rsvp::saveRsvpList( 

				$iduser,
				$rsvp_handler,
				$validate

			);

			

		}//end else if
		else
		{
			$basename = false;
			
		}//end else

		return [

			'basename'=>$basename,
			'extension'=>$extension

		];//end return

	}//END uploadRsvpList





























	public static function saveRsvpList(

		$iduser,
		$rsvp_handler,
		$validate

	)
	{


		//echo '<pre>';	
		//var_dump($iduser);
		//var_dump($rsvp_handler);
		//exit;




		$rsvpconfig = new RsvpConfig();
		$rsvpconfig->get((int)$iduser);

		$inmaxadults = 0;
		$inmaxchildren = 0;



		foreach ($rsvp_handler as $guest) 
		{
			# code...




			if( ($inmaxadults = Validate::validateMaxRsvp($guest['inmaxadults'])) === false )
			{	
				

				Rsvp::setError("A quantidade deve estar entre 0 e 99");
				header('Location: /dashboard/rsvp/adicionar');
				exit;

			}//end if



			//echo '<pre>';
			//var_dump($rsvpconfig->getinchildren());
			//var_dump(!isset($guest['inmaxchildren']) || $guest['inmaxchildren'] === '');
			//var_dump($guest);
			//exit;



			if ( (int)$rsvpconfig->getinchildren() == 1 )
			{
				# code...
				if(
				
					!isset($guest['inmaxchildren']) 
					|| 
					$guest['inmaxchildren'] === ''
					
				)
				{
			
					Rsvp::setError("Preencha quantas crianças no máximo o convidado poderá levar");
					header('Location: /dashboard/rsvp/upload');
					exit;
			
				}//end if
			
				if( ($inmaxchildren = Validate::validateMaxRsvp($guest['inmaxchildren'])) === false )
				{	
					
			
					Rsvp::setError("A quantidade deve ser entre 0 e 99");
					header('Location: /dashboard/rsvp/upload');
					exit;
			
				}//end if


			}//enf if


		}//end foreach













		$maxRsvp = Rsvp::maxRsvp($validate['inplancode']);

		//pode ser substituído pelo get(), getPage() ou getSearch()
		$numRsvp = Rsvp::getNumRsvp((int)$iduser);

		$countRsvpList = count($rsvp_handler);



		//echo '<pre>';
		//var_dump($maxRsvp);
		//var_dump($numRsvp);
		//var_dump($countRsvpList);
		//var_dump(( (int)$numRsvp + (int)$countRsvpList ) >= (int)$maxRsvp);
		//exit;




		if( ( (int)$numRsvp + (int)$countRsvpList ) >= (int)$maxRsvp )
		{	
			
			Rsvp::setError("Você já atingiu o limite de convidados do seu plano atual");
			header('Location: /dashboard/rsvp');
			exit;

		}//end if










		foreach ($rsvp_handler as $guest)
		{


			$rsvp = new Rsvp();

			$rsvp->setData([

		    	'iduser'=>$iduser,
		    	'desguest'=>$guest['desguest'],
		    	'desemail'=>NULL,
		    	'nrphone'=>NULL,
		    	'inconfirmed'=>0,
		    	'inmaxadults'=>$guest['inmaxadults'],
		    	'inadultsconfirmed'=>NULL,
		    	'inmaxchildren'=>$guest['inmaxchildren'],
		    	'inchildrenconfirmed'=>NULL,
		    	'inchildrenageconfirmed'=>NULL,
		    	'desadultsaccompanies'=>NULL,
		    	'deschildrenaccompanies'=>NULL,
				'dtconfirmed'=>NULL

		    ]);

		    $rsvp->update();


		}//end foreach



		Rsvp::setSuccess("Lista criada");

		header('Location: /dashboard/rsvp');
		exit;




	}//END saveRsvpList 
































    public function getConfirmedPage( $iduser, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE inconfirmed = 1
            AND iduser = :iduser
            ORDER BY desguest ASC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser

			]
		
		);//end select



		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		


		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if
			
		}//end if

			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return




    }//END getConfirmedPage
    





















    public function getConfirmedSearch( $iduser, $search, $page = 1, $itensPerPage = 10 )
	{

		$start = ($page - 1) * $itensPerPage;

		if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME )
		{
			# code...
			$search = utf8_decode($search);

		}//end if

		

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rsvp
            WHERE inconfirmed = 1
            AND iduser = :iduser
            AND desguest LIKE :search
            ORDER BY desguest ASC
			LIMIT $start, $itensPerPage;

			", 
			
			[

				':iduser'=>$iduser,
				':search'=>'%'.$search.'%'

			]
		
		);//end select




		$nrtotal = $sql->select("
		
			SELECT FOUND_ROWS() AS nrtotal;
			
		");//end select


		


		

		if( count($results) > 0 )
		{

			if ( $_SERVER['HTTP_HOST'] == Rule::CANONICAL_NAME  ) 
			{
				

				foreach( $results as &$row )
				{
					# code...		
		            $row['desguest'] = utf8_encode($row['desguest']);
		            $row['desadultsaccompanies'] = utf8_encode($row['desadultsaccompanies']);
		            $row['deschildrenaccompanies'] = utf8_encode($row['deschildrenaccompanies']);

				}//end foreach
					
				
			}//end if
		
		}//end if

			
			

		return [

			'results'=>$results,
			'nrtotal'=>(int)$nrtotal[0]["nrtotal"],
			'pages'=>ceil($nrtotal[0]["nrtotal"] / $itensPerPage)

		];//end return


			

    }//END getConfirmedSearch





























    public static function getNumRsvp( $iduser )
	{

		$sql = new Sql();

		$results = $sql->select("

			SELECT COUNT(*)
			FROM tb_rsvp
			WHERE iduser = :iduser;

		",

		[

			'iduser'=>$iduser


		]);//end select


		return count($results[0]);



	}//END getNumGifts























    public static function maxRsvp( $inplan )
	{

		switch( $inplan )
		{
			case '0':
			case '001':
				# code...
				return Rule::MAX_RSVP_FREE;
				

			case '101':
			case '103':
			case '104':
			case '106':
			case '109':
			case '112':
				# code...
				return Rule::MAX_RSVP_BASIC;
				

			case '203':
			case '204':
			case '206':
			case '209':
			case '212':
				# code...
				return Rule::MAX_RSVP_INTERMEDIATE;
				

			case '303':
			case '304':
			case '306':
			case '309':
			case '312':
				# code...
				return Rule::MAX_RSVP_ADVANCED;
				
			
			default:
				# code...
				return Rule::MAX_RSVP_FREE;
				

		}//end switch



	}//END maxEvents



	




	




	public function delete()
	{
		$sql = new Sql();

		$sql->query("
		
			DELETE FROM tb_rsvp
			WHERE idrsvp = :idrsvp
			
			",
			
			[

				':idrsvp'=>$this->getidrsvp()

			]
		
		);//end query

	}//END delete












	public static function setError( $msg )
	{

		$_SESSION[Rsvp::ERROR] = $msg;

	}//END setError









	public static function getError()
	{

		$msg = (isset($_SESSION[Rsvp::ERROR]) && $_SESSION[Rsvp::ERROR]) ? $_SESSION[Rsvp::ERROR] : '';

		Rsvp::clearError();

		return $msg;

	}//END getError







	public static function clearError()
	{
		$_SESSION[Rsvp::ERROR] = NULL;

	}//END clearError








	public static function setSuccess($msg)
	{

		$_SESSION[Rsvp::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Rsvp::SUCCESS]) && $_SESSION[Rsvp::SUCCESS]) ? $_SESSION[Rsvp::SUCCESS] : '';

		Rsvp::clearSuccess();

		return $msg;

	}//END getSuccess







	public static function clearSuccess()
	{
		$_SESSION[Rsvp::SUCCESS] = NULL;

	}//END clearSuccess 
















}//END class Rsvp




 ?>