<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="plans" class="site">

  <div class="container">




      <div class="row">
        

        <div class="plans-title col-md-12 bottom2">

          <h1>Planos para Site de Casamento</h1>
          <p>Confira nossos planos e Compare</p> 

        </div><!--col-->


      </div><!--row-->

        





        <div class="row">




          <div class="col-md-3">
            
            <div class="plan plan-free">

              <h2 class="plan-title"><strong>10 DIAS FREE</strong></h2>

              <h3 class="plan-subtitle">Aproveite!</h3> 

              <div class="pricing"> 

                <div class="currency"> 

                  <strong>&nbsp;</strong> 

                  <span class="plan-coin">R$</span> 

                </div><!--currency-->

                <span class="price">0</span> 

                <span>,00</span>

              </div><!--pricing-->

              <p>&nbsp;</p> 

              <b>&nbsp;</b> 



              <p class="plan-description"><strong>Nenhum</strong>  cartão será solicitado</p>




              <form action="/criar-site" id="0">
                        <input type="hidden" name="plano" value="0">
                         <button type="submit" class="plan-box-button">Teste por 10 dias</button>
                    </form>

            </div><!--plan-->

          </div><!--col-->




          <div class="col-md-3">
          
            <div class="plan">

                <h2 class="plan-title"><strong>BÁSICO</strong></h2>

                <h3 class="plan-subtitle">Enxuto</h3>



                <div class="pricing">

                  <div class="currency">

                    <strong>6x</strong>

                    <span class="plan-coin">R$</span> 

                  </div><!--currency-->

                  <span id="plan1-vlinteger" class="price"><?php echo getValuePartial($plans["103"]["vlprice"]/6,1); ?></span>
                  <span id="plan1-vldecimal">,<?php echo getValuePartial($plans["103"]["vlprice"]/6,0); ?></span> 

                </div><!--pricing-->



                <p>ou</p>
                <p class="plan-description"><span id="plan1-vlprice">R$ <?php echo formatPrice($plans["103"]["vlprice"]); ?></span> pelo período de:</p>



                
                <select id="plan1" form="1" name="plano">
                        <option value="103" data-nrinstallment="6" data-vlprice="<?php echo htmlspecialchars( $plans["103"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["103"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["103"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["103"]["vlprice"]/6,0); ?>' selected="selected">3 meses</option> 
                        <option value="104" data-nrinstallment="6" data-vlprice="<?php echo htmlspecialchars( $plans["104"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["104"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["104"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["104"]["vlprice"]/6,0); ?>'>4 meses</option> 
                        <option value="106" data-vlprice="<?php echo htmlspecialchars( $plans["106"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["106"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["106"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["106"]["vlprice"]/6,0); ?>'>6 meses</option> 
                        <option value="109" data-vlprice="<?php echo htmlspecialchars( $plans["109"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["109"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["109"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["109"]["vlprice"]/6,0); ?>'>9 meses</option> 
                        <option value="112" data-vlprice="<?php echo htmlspecialchars( $plans["112"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["112"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["112"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["112"]["vlprice"]/6,0); ?>'>12 meses</option>
                    </select>

                    <form action="/criar-site" id="1">
                      <button type="submit" class="plan-box-button">Comece já</button>
                    </form>




              </div><!--plan--> 
            
            </div><!--col-->









            <div class="col-md-3">

              <div class="plan">

                <h2 class="plan-title"><strong>CLÁSSICO</strong></h2> 
              
                <h3 class="plan-subtitle">Intermediário</h3> 
                
                

                <div class="pricing">

                  <div class="currency">

                    <strong>6x</strong>
                    <span class="plan-coin">R$</span>

                  </div><!--currency-->
                    
                  <span id="plan2-vlinteger" class="price"><?php echo getValuePartial($plans["203"]["vlprice"]/6,1); ?></span>
                  <span id="plan2-vldecimal">,<?php echo getValuePartial($plans["203"]["vlprice"]/6,0); ?></span> 

                </div><!--pricing-->



                <p>ou</p>
                <p class="plan-description"><span id="plan2-vlprice">R$ <?php echo formatPrice($plans["203"]["vlprice"]); ?></span> pelo período de:</p>




                <select id="plan2" form="2" name="plano">
                        <option value="203" data-vlprice="<?php echo htmlspecialchars( $plans["203"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["203"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["203"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["203"]["vlprice"]/6,0); ?>' selected="selected">3 meses</option> 
                        <option value="204" data-vlprice="<?php echo htmlspecialchars( $plans["204"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["204"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["204"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["204"]["vlprice"]/6,0); ?>'>4 meses</option> 
                        <option value="206" data-vlprice="<?php echo htmlspecialchars( $plans["206"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["206"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["206"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["206"]["vlprice"]/6,0); ?>'>6 meses</option> 
                        <option value="209" data-vlprice="<?php echo htmlspecialchars( $plans["209"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["209"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["209"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["209"]["vlprice"]/6,0); ?>'>9 meses</option> 
                        <option value="212" data-vlprice="<?php echo htmlspecialchars( $plans["212"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["212"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["212"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["212"]["vlprice"]/6,0); ?>'>12 meses</option>
                    </select>

                    <form action="/criar-site"id="2">
                        <button type="submit" class="plan-box-button">Comece já</button>
                    </form>



            </div><!--plan-->

          </div><!--col-->
          
          




          <div class="col-md-3">

            <div id="plan-advanced" class="plan"> 

              <h2 class="plan-title">

                <strong>GOLD</strong>

              </h2>

              <h3 class="plan-subtitle">Tudo incluso</h3> 

              <div class="pricing">

                  <div class="currency"> 

                    <strong>6x</strong> 
                    <span class="plan-coin">R$</span> 

                  </div><!--currency-->

                  <span id="plan3-vlinteger" class="price"><?php echo getValuePartial($plans["303"]["vlprice"]/6,1); ?></span>
                  <span id="plan3-vldecimal">,<?php echo getValuePartial($plans["303"]["vlprice"]/6,0); ?></span> 

                </div><!--pricing-->



                <p>ou</p>
                <p class="plan-description"><span id="plan3-vlprice">R$ <?php echo formatPrice($plans["303"]["vlprice"]); ?></span> pelo período de:</p>
              
              


              <select id="plan3" form="3" name="plano">
                        <option value="303" data-vlprice="<?php echo htmlspecialchars( $plans["303"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["303"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["303"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["303"]["vlprice"]/6,0); ?>' data-selected="selected">3 meses</option> 
                        <option value="304" data-vlprice="<?php echo htmlspecialchars( $plans["304"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["304"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["304"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["304"]["vlprice"]/6,0); ?>'>4 meses</option> 
                        <option value="306" data-vlprice="<?php echo htmlspecialchars( $plans["306"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["306"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["306"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["306"]["vlprice"]/6,0); ?>'>6 meses</option> 
                        <option value="309" data-vlprice="<?php echo htmlspecialchars( $plans["309"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["309"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["309"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["309"]["vlprice"]/6,0); ?>'>9 meses</option> 
                        <option value="312" data-vlprice="<?php echo htmlspecialchars( $plans["312"]["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($plans["312"]["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($plans["312"]["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($plans["312"]["vlprice"]/6,0); ?>'>12 meses</option>
                    </select>

                    <form action="/criar-site"id="3">
                        <button type="submit" id="plan-gold-button" class="plan-box-button">Comece já</button>
                    </form>






            </div><!--plan-->

          </div><!--col-->



      </div><!--row-->
      







      <div class="row comparison">
      




        <div class="col-md-3">
  
          <div class="comparison-plan"> <h3>10 Dias Free</h3>

            <p>Está em dúvidas sobre qual plano escolher? Teste o site gratuitamente por 10 dias, com todos os recursos liberados (exceto Loja Virtual). Confira a lista de todos os recursos abaixo.</p>

          </div><!--comparison-->

        </div><!--col-->





        <div class="col-md-3">

          <div class="comparison-plan"> 

            <h3>Plano Básico</h3>

            <p>O Plano Básico é indicado para os casais que desejam um site mais simples, contendo os recursos essenciais para divulgar o momento mais lindo de suas vidas.</p>

          </div><!--comparison-->

        </div><!--col-->







      <div class="col-md-3">


        <div class="comparison-plan">

          <h3>Plano Clássico</h3>

          <p>O Plano Clássico contém todos os recursos do Plano Básico, e adiciona outros que deixam seu site de casamento ainda mais sofisticado e elegante!</p>

        </div><!--comnparison-->

      </div><!---->





      <div class="col-md-3">

        <div class="comparison-plan">

          <h3>Plano Gold</h3>

          <p>O Plano Gold contém o pacote completo com todos os recursos do site, para que os casais possam divulgar seu casamento com toda a comodidade e vantagens que o Bem Casei oferece.</p>

        </div><!--comparison-->

      </div><!--col-->





    </div><!--row-->










  <div class="row table-header">

    <div class="col-md-6 col-5">
      
      <h5>Compare as funcionalidades</h5>      

    </div>


    <div class="col-2">
      
      <h5>Básico</h5>
    </div>

    <div class="col-2">
      
      <h5>Clássico</h5>
    </div>

    <div class="col-md-2 col-3">
      
      <h5>Gold</h5>
    </div>

  </div><!--row-->

  

  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Saques gratuitos</h4></strong>
      <span>Não pague nada para transferir seu dinheiro para sua conta</span>       

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->






  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Álbum de fotos</h4></strong> 
        <span>A história do Casal em imagens</span>      

    </div>


    <div class="col-2">
      
      <span >90 MB</span>
    </div>

    <div class="col-2">
      
      <span >160 MB</span>
    </div>

    <div class="col-md-2 col-3">
      
      <span>Ilimitado</span>
    </div>

  </div><!--row-->


<div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Páginas</h4></strong>
        <span>Personalize os títulos e conteúdos das suas páginas</span>     

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->













  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Confirmação de presença</h4></strong>
      <span>Receba sua lista de convidados de forma ágil</span>  

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->















  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Páginas</h4></strong>
        <span>Personalize os títulos e conteúdos das suas páginas</span>     

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->















  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Suporte por chat</h4></strong>
        <span>Chat ao vivo para te ajudar e tirar suas dúvidas</span>    

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->



















  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Templates</h4></strong> 
        <span>Templates modernos para você encantar seus convidados</span>   

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->












  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Lista de presentes</h4></strong>
        <span>Crie sua Loja Virtual com presentes personalizados</span>   

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->






  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Integração com Google Maps URL</h4></strong>
        <span>Ajude seus convidados a encontrar os eventos do seu casamento</span>  

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->









  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Contagem regressiva</h4></strong>
        <span>Rumo ao grande dia!</span>   

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->











  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Deixar páginas Visíveis ou Não visíveis</h4></strong>
        <span>Escolha quais páginas aparecem para os convidados</span>   

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->














  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Fontes personalizadas</h4></strong>
        <span>Estilize as fontes do seu site</span> 

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->


















  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Notificações por e-mail</h4></strong>
        <span>Fique por dentro de tudo o que acontece em seu site</span>   

    </div>


    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-2">
      
      <i class="fa fa-check"></i>
    </div>

    <div class="col-md-2 col-3">
      
      <i class="fa fa-check"></i>
    </div>

  </div><!--row-->











  <div class="row table-row2 centralizer centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Listas de Fora</h4></strong>
        <span>Divulgue as outras lojas em que você criou suas listas</span>   

    </div>


    <div class="col-2">
      
        <span><?php echo getRule('MAX_OUTER_LISTS_BASIC'); ?></span>
    </div>

    <div class="col-2">
      
      <span><?php echo getRule('MAX_OUTER_LISTS_INTERMEDIATE'); ?></span>
    </div>

    <div class="col-md-2 col-3">
      
      <span>Ilimitado</span>
    </div>

  </div><!--row-->

























  



















  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Padrinhos e Madrinhas</h4></strong>
        <span>Homenageie estas pessoas tão especiais para você</span>

    </div>


    <div class="col-2">
      
      <?php echo getRule('MAX_BESTFRIENDS_BASIC'); ?>
    </div>

    <div class="col-2">
      
      <?php echo getRule('MAX_BESTFRIENDS_INTERMEDIATE'); ?>
    </div>

    <div class="col-md-2 col-3">
      
      <span>Ilimitado</span>
    </div>

  </div><!--row-->













<div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Eventos</h4></strong>
          <span>Divulgue os detalhes de cada evento do seu casamento</span>

    </div>


    <div class="col-2">
      
      <?php echo getRule('MAX_EVENTS_BASIC'); ?>
    </div>

    <div class="col-2">
      
      <?php echo getRule('MAX_EVENTS_INTERMEDIATE'); ?>
    </div>

    <div class="col-md-2 col-3">
      
      <span>Ilimitado</span>
    </div>

  </div><!--row-->








  <div class="row table-row2 centralizer">

    <div class="col-md-6 col-5">
      
      <strong><h4>Fornecedores</h4></strong>
          <span>Divulgue os fornecedores que colaboraram com cada parte do casamento</span>

    </div>


    <div class="col-2">
      
      <?php echo getRule('MAX_STAKEHOLDERS_BASIC'); ?>
    </div>

    <div class="col-2">
      
      <?php echo getRule('MAX_STAKEHOLDERS_INTERMEDIATE'); ?>
    </div>

    <div class="col-md-2 col-3">
      
      <span>Ilimitado</span>
    </div>

  </div><!--row-->












  </div><!--container-->

</section>