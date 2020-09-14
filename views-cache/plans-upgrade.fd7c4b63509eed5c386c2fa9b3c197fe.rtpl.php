<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


              <?php if( $user["inplancontext"] == 0 ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-free");?>

            
            <?php }elseif( $user["incheckout"] == 0 ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-nocheckout");?>
            

            <?php }elseif( !$validate ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-expirated");?>
            

            <?php }else{ ?>

                <?php require $this->checkTemplate("dashboard-menu");?>

            <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel tablersw conteudo-upgrade">

              

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
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 planos plano-basico">
                <table class="table table-bordered" plano="2">
                  <thead>
                    <th>Basic</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="description_rsw">Perfeito para quem quer um site com as funcionalidades básicas, mas importantes como:</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Presentes virtuais</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Confirmação de presença</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 3 Padrinhos e Madrinhas</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 3 Fornecedores</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 6 Eventos</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <?php if( $validate["incontext"] == 1  ){ ?> 

                          <span class="seu-plano-atual">Seu plano Atual</span> 

                        <?php }elseif( $validate["incontext"] == 2 ){ ?> 

                          <span class="seu-plano-atual">Plano Indisponível</span>

                        <?php } ?>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 planos plano-classico">
                <table class="table table-bordered" plano="3">
                  <thead>
                    <th>Classic</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="description_rsw">Funcionalidades clássicas para divulgar seu casamento, todos os recursos do Plano Basic e mais alguns como:</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Presentes virtuais</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Confirmação de presença</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 8 Padrinhos e Madrinhas</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 10 Fornecedores</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Até 20 Eventos</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    
                    
                      
                      <?php if( $validate["incontext"] == 1  ){ ?>
                        <tr>
                          <td>Por Apenas</td>
                        </tr>
                        <tr>
                          <td><span class="upgrade-price">R$ <?php echo formatPrice($inplan["0"]["vlprice"]); ?></span></td>
                        </tr>
                        
                        <tr>  
                          <td>
                            <form action="/dashboard/upgrade/checkout" id="2">
                                <input type="hidden" name="plano" value="2<?php echo htmlspecialchars( $sufix, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <button class="plan-upgrade-button" type="submit">Plano Classic</button>
                            </form>
                          </td>
                        </tr>
                      <?php }elseif( $validate["incontext"] == 2 ){ ?>
                        <tr>
                          <td>
                            <span class="seu-plano-atual">Seu Plano Atual</span>
                          </td>
                        </tr>
                      <?php } ?>
                      




                    
                               
                  </tbody>
                </table>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 planos plano-gold">
                <table class="table table-bordered" plano="4">
                  <thead>
                    <th>Gold</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="description_rsw">Plano completo e avançado com todos os recursos e vantagens que o Amar Casar oferece ao Casal</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Presentes virtuais</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Confirmação de presença</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Padrinhos e Madrinhas Ilimitados</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Forencedores Ilimitados</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-check" style="color:green"></i> Eventos Ilimitados</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    
                    <?php if( ($validate["incontext"] == 1) or ($validate["incontext"] == 2) ){ ?>
                      <tr>
                        <td>Por Apenas</td>
                      </tr>
                      <tr>
                        <td><span class="upgrade-price">R$ <?php echo formatPrice($inplan["1"]["vlprice"]); ?></span></td>
                      </tr>
                        
                      <tr>
                        <td> 
                          <form action="/dashboard/upgrade/checkout"id="3">
                              <input type="hidden" name="plano" value="3<?php echo htmlspecialchars( $sufix, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <button class="plan-upgrade-button" type="submit">Plano Gold</button>
                          </form>
                        </td>
                      </tr>
                    <?php } ?> 
                      
                    
                  </tbody>
                </table>
              </div>

              </div><!--row-->

            </div><!--col-->
    
    </div><!--container-->

</section>

