<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $user["inaccount"] == 0 ){ ?>
<section class="dashboard">

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




            <div id="plans" class="col-md-9 col-12 dash-panel tablersw">



                    <?php if( $success != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    <?php } ?>

                    <?php if( $error != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    <?php } ?>



                      
                    <div class="row">
                      


                     

                      <div class="col-md-4">
                      
                        <div class="plan">

                            <h2 class="plan-title"><strong>BASIC</strong></h2>

                            <h3 class="plan-subtitle">Plano Basic</h3>



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

                                <form action="/dashboard/comprar-plano/cadastrar" id="1">
                                  <button type="submit" class="plan-box-button">Comece já</button>
                                </form>




                          </div><!--plan--> 
                        
                        </div><!--col-->









                        <div class="col-md-4">

                          <div class="plan">

                            <h2 class="plan-title"><strong>CLASSIC</strong></h2> 
                          
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

                                <form action="/dashboard/comprar-plano/cadastrar"id="2">
                                    <button type="submit" class="plan-box-button">Comece já</button>
                                </form>



                        </div><!--plan-->

                      </div><!--col-->
                      
                      




                      <div class="col-md-4">

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

                                <form action="/dashboard/comprar-plano/cadastrar"id="3">
                                    <button type="submit" id="plan-gold-button" class="plan-box-button">Comece já</button>
                                </form>






                        </div><!--plan-->

                      </div><!--col-->



                    </div><!--row-->
        
                    <div class="row comparison">
      




        

                      <div class="col-md-4">

                        <div class="comparison-plan"> 

                          <h3>Plano Basic</h3>

                          <p>O Plano Basic é indicado para os casais que desejam um site mais simples, contendo os recursos essenciais para divulgar o momento mais lindo de suas vidas.</p>

                        </div><!--comparison-->

                      </div><!--col-->







                    <div class="col-md-4">


                      <div class="comparison-plan">

                        <h3>Plano Classic</h3>

                        <p>O Plano Classic contém todos os recursos do Plano Basic, e adiciona outros que deixam seu site de casamento ainda mais sofisticado e elegante!</p>

                      </div><!--comnparison-->

                    </div><!---->





                    <div class="col-md-4">

                      <div class="comparison-plan">

                        <h3>Plano Gold</h3>

                        <p>O Plano Gold contém o pacote completo com todos os recursos do site, para que os casais possam divulgar seu casamento com toda a comodidade e vantagens que o Amar Casar oferece.</p>

                      </div><!--comparison-->

                    </div><!--col-->





                 </div><!--row-->


      
            </div><!--col-->
        

        </div><!--row-->
    
    </div><!--container-->

</section>
<?php }else{ ?>
<section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( !validatePlan() ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }elseif( validatePlanFree() ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div id="plans" class="col-md-9 col-12 dash-panel tablersw">



                    <?php if( $success != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    <?php } ?>

                    <?php if( $error != '' ){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div> 
                        </div>  
                    <?php } ?>



                      
                    <div class="row">
                      


                     

                      <div class="col-md-4">
                      
                        <div class="plan">

                            <h2 class="plan-title"><strong>BASIC</strong></h2>

                            <h3 class="plan-subtitle">Plano Basic</h3>



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

                                <form action="/dashboard/comprar-plano/checkout" id="1">
                                  <button type="submit" class="plan-box-button">Comece já</button>
                                </form>




                          </div><!--plan--> 
                        
                        </div><!--col-->









                        <div class="col-md-4">

                          <div class="plan">

                            <h2 class="plan-title"><strong>CLASSIC</strong></h2> 
                          
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

                                <form action="/dashboard/comprar-plano/checkout"id="2">
                                    <button type="submit" class="plan-box-button">Comece já</button>
                                </form>



                        </div><!--plan-->

                      </div><!--col-->
                      
                      




                      <div class="col-md-4">

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

                                <form action="/dashboard/comprar-plano/checkout"id="3">
                                    <button type="submit" id="plan-gold-button" class="plan-box-button">Comece já</button>
                                </form>






                        </div><!--plan-->

                      </div><!--col-->



                    </div><!--row-->
        
                    <div class="row comparison">
      




        

                      <div class="col-md-4">

                        <div class="comparison-plan"> 

                          <h3>Plano Basic</h3>

                          <p>O Plano Basic é indicado para os casais que desejam um site mais simples, contendo os recursos essenciais para divulgar o momento mais lindo de suas vidas.</p>

                        </div><!--comparison-->

                      </div><!--col-->







                    <div class="col-md-4">


                      <div class="comparison-plan">

                        <h3>Plano Classic</h3>

                        <p>O Plano Classic contém todos os recursos do Plano Basic, e adiciona outros que deixam seu site de casamento ainda mais sofisticado e elegante!</p>

                      </div><!--comnparison-->

                    </div><!---->





                    <div class="col-md-4">

                      <div class="comparison-plan">

                        <h3>Plano Gold</h3>

                        <p>O Plano Gold contém o pacote completo com todos os recursos do site, para que os casais possam divulgar seu casamento com toda a comodidade e vantagens que o Amar Casar oferece.</p>

                      </div><!--comparison-->

                    </div><!--col-->





                 </div><!--row-->


      
            </div><!--col-->
        

        </div><!--row-->
    
    </div><!--container-->

</section>
<?php } ?>