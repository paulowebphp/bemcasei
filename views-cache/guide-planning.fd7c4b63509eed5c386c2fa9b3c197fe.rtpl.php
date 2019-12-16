<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>


                <?php }elseif( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


         

              <div class="row main-title">
                
                <div class="col-10">
              

                  <div class="title">
                    
                    <h1>PLANEJAMENTO</h1>

                  </div> 


                </div><!--col-->


                <div id="print-wrapper" class="col-2">
                  
                  <a href="javascript:window.print();">

                    <img src="/res/images/print.png" alt="Imprimir">

                  </a> 

                </div><!--col-->


                <hr/>

              </div><!--row-->











              <div class="row paragraph">
      
                <div class="col-12">
                  
                  <div class="title">
                   
                    <strong>DEFINIÇÃO DA DATA DO CASAMENTO</strong>

                  </div>

                  <div class="blockquote">

                    <p>
                    
                      A data do casamento pode ser escolhida por questões:

                    </p>

                    <p>
                      <ul>
                        <li>Sentimentais: o dia em que começamos a namorar, o dia que nos conhecemos, o dia do primeiro beijo, dia do aniversário etc;</li>
                        <li>Financeiras: afinal, os meses mais concorridos para casar (como maio e setembro) são os mais caros;</li>
                        <li>Estratégicas: os noivos e noivas têm que se adaptar à realidade de que igrejas e casas de festas possuem uma agenda e que, nem sempre, estão disponíveis na data em que queremos.</li>
                      </ul>
                    </p>

                    <p>
                      
                      O ideal é que os noivos e as noivas procurem montar Planos A, B e C para decidirem a data, pensando, inclusive, no estilo de casamento que pretendem ter.

                    </p>

                    <p>
                      
                      Por exemplo, se os noivos ou noivas decidirem fazer um casamento em uma outra cidade, aproveitar feriadões é uma excelente escolha.

                    </p>

                    <p>
                      
                      Se quiserem fazer um casamento ao ar livre, o ideal é escolher um momento com menos propensão à chuva. Mesmo tendo tendas, sem chuva é bem melhor, né?

                    </p>

                    <p>
                      
                      Se quiserem fazer um casamento ao ar livre e durante à tarde, o mês de janeiro pode ser sacrificante por causa das altas temperaturas do período. 

                    </p>

                  </div>
                  
                </div><!--col-->

              </div><!--row-->














              <div class="row paragraph">
      
                <div class="col-12">
                  
                  <div class="title">
                   
                    <strong>ESCOLHA DO LOCAL PARA O CASAMENTO</strong>

                  </div>

                  <div class="blockquote">

                    <p>
                    
                      A escolha do local para o casamento deve ser feita com muito cuidado. É importante que o casal encontre no local um serviço que esteja a altura das suas expectativas.

                    </p>

                    <p>
                      
                      É importante também que o local esteja preparado para produzir e receber o casamento sonhado pelo casal. Do contrário, será furada total!

                    </p>

                    <p>
                      
                      Para ajudar, abaixo listamos alguns itens que devem ser checados pelos noivos e pelas noivas ao visitar locais para a realização da cerimônia:

                    </p>

                    <p>
                      <ul>
                        <li>Se o espaço se adapta ao estilo do casamento;</li>
                        <li>Qual é a capacidade total de pessoas;</li>
                        <li>Se o espaço é climatizado;</li>
                        <li>Se há acesso para convidados com necessidades especiais;</li>
                        <li>Se há estacionamento próprio ou no entorno do local;</li>
                        <li>Se existe serviço de manobrista;</li>
                        <li>Se existe gerador próprio (imagina se falta luz!);</li>
                        <li>Se o local é flexível quanto a horários e inclusão de serviços de terceiros;</li>
                        <li>Se a recepção e a cerimônia podem ser realizadas no mesmo espaço;</li>
                        <li>Se a estrutura está em boas condições físicas e de funcionamento;</li>
                        <li>Se o espaço é legalizado;</li>
                        <li>Se o atendimento foi atencioso e prestativo;</li>
                        <li>Se existem serviços diferenciados (como dia das noivas, buffet, decoração etc).</li>
                        </ul>
                    </p>

                  </div>
                  
                </div><!--col-->

              </div><!--row-->



















              <div class="row paragraph">
      
                <div class="col-12">
                  
                  <div class="title">
                   
                    <strong>AGENDAR O LOCAL</strong>

                  </div>

                  <div class="blockquote">

                    <p>
                    
                      Se vocês optaram por se casar na Igreja ou em um espaço religioso ou não, não esqueça de agendá-lo com bastante antecedência.

                    </p>

                    <p>Isso vale principalmente caso seja um lugar significativo para as noivas e para os noivos. Lembre-se que são vários casais que estão à procura de um lugar para celebrar a união.</p>


                    <p>
                                      
                      Não à toa, como falamos anteriormente, muitos casais acabam definindo a data do casamento a partir da disponibilidade do local em que desejam realizar a cerimônia.

                    </p>


                  </div>
                  
                </div><!--col-->

              </div><!--row-->





















              <div class="row paragraph">
      
                <div class="col-12">
                  
                  <div class="title">
                   
                    <strong>FAZER A LISTA DE CONVIDADOS</strong>

                  </div>

                  <div class="blockquote">

                    <p>
                    
                      A lista de convidados para um casamento consegue ser, ao mesmo tempo, algo muito fácil e muito difícil de ser feito.

                    </p>

                    <p>
                      
                      A diversão pode virar um verdadeiro caos, caso os noivos ou as noivas precisem cortar convidados por questões financeiras ou de espaço.

                    </p>

                    <p>
                      
                      Como estamos falando ao longo deste texto, é importante que o casamento seja mais coração do que razão, mas às vezes isso pode mudar.

                    </p>


                    <p>

                      É fácil encher páginas e páginas de nomes de pessoas queridas, que você gostaria que estivessem compartilhando um momento tão bom com você.

                    </p>

                    <p>
                      
                      No entanto, é impossível não pensar em questões como custos e espaço, trazendo a necessidade de uma redução de nomes.

                    </p>


                    <p>
                      
                      Mais uma vez: evite ao máximo convidar pessoas por obrigação ou “porque vai pegar mal não convidar”, mas sabemos que em alguns casos é difícil demais.

                    </p>

                    <p>É o caso típico sobre chefes, colegas de trabalho, parentes distantes e agregados de outros convidados.</p>



                    <p>
                      <ul>
                        <li>Chefe: se você tem um bom relacionamento com ela(e) e tem espaço para convite, não há porquê não fazê-lo. Da mesma forma, se o relacionamento não for lá tão bom, não há porquê convidar. No entanto, se você achar que o convite pode aproximá-los ou se a ausência do convite pode tornar o convívio pior, chame-o para a festa;</li>
                        <li>Colegas de trabalho: convide aqueles com quem você tem afinidade e que são queridos. Apenas uma dica: se você não for convidar o escritório inteiro, procure distribuir os convites fora do ambiente de trabalho. Mesmo que seja óbvio que você não é melhor amigo(a) de todos, o convite realizado apenas para alguns pode ser constrangedor para os outros;</li>
                        <li>Parentes distantes: vocês não se vêem há anos e, para ser honesto(a), você tem dúvidas se lembra do rosto da pessoa? Então, não há razão para convidar. Mas precisamos dizer uma coisa: por tradição, os pais dos noivos ou noivas têm um share sob a lista de convidados, isto é, eles podem convidar algumas pessoas. Se eles fizerem questão, convide os parentes distantes. O convite também é válido caso a ocasião sirva para firmar uma reaproximação da família ou marcar uma grande reunião;</li>
                        <li>Agregados de outros convidados: neste caso, o convite é muito válido se o seu convidado não pertencer a um grupo da sua vida. Ele pode ser uma pessoa que você conheceu de forma meio que ‘individual’, não se encaixando em ‘faculdade’, ‘escola’, ‘trabalho’ etc. Para que o mesmo não fique sozinho, não há mal algum em convidar alguém que lhe faça companhia. Se o seu orçamento, espaço ou paciência não permitirem, apenas não deixe a coisa se alastrar: do contrário, logo logo sua prima estará levando o namorado, o amigo do namorado e a namorada do amigo do namorado.</li>
                      </ul>
                    </p>

                  </div>
                  
                </div><!--col-->

              </div><!--row-->
























              <div class="row paragraph">
      
                <div class="col-12">
                  
                  <div class="title">
                   
                    <strong>DEFINIR UM ESTILO PRO CASAMENTO</strong>

                  </div>

                  <div class="blockquote">

                    <p>Existe uma forte e crescente tendência em que os noivos ou noivas decidem fugir do casamento tradicional.</p>

                    <p>Para as mentes mais criativas, a tendência é um verdadeiro deleite - aproveitando a ocasião para transformar o momento em algo único!</p>

                    <p>Casamentos ao ar livre, casamentos rústicos, casamentos pé na areia, mini-weddings, casamento no sítio, casamentos intimistas… O céu é o limite! E cada um tem seu charme.</p>


                    <p>Independente de estilo, é importante que o casamento tenha a cara e a alma do casal. Afinal, a união é delas e deles!</p>
                  
                  </div>
                  
                </div><!--col-->

              </div><!--row-->









            </div><!--col-->
        

      
        </div><!--row-->
    
    </div><!--container-->

</section>




