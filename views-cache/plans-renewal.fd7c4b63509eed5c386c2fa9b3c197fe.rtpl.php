<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


            <?php if( !$validate ){ ?>

				<?php if( $user["incheckout"] == 0 or $user["inaccount"] == 0 ){ ?>

					<?php require $this->checkTemplate("dashboard-menu-noorders");?>

				<?php }else{ ?>

					<?php require $this->checkTemplate("dashboard-menu-expirated");?>

				<?php } ?>

			<?php }elseif( $validate["incontext"] == 0 ){ ?>

				<?php require $this->checkTemplate("dashboard-menu-free");?>

			<?php }else{ ?>

				<?php require $this->checkTemplate("dashboard-menu");?>

			<?php } ?>
                

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


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
                        
                        <div class="col-md-12 dash-column">

                            <div class="dash-plans-title">
                                <h1>Renovação</h1>
                            </div>


                            <div id="plans">


                                <div id="renewal-box">

                                  <div class="plan">

                                    <h2 class="plan-title"><strong><?php echo htmlspecialchars( $inplan["1"]["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></h2> 
                                  
                                    <h3 class="plan-subtitle">Por Apenas</h3> 
                                    
                                    

                                    <div class="pricing">

                                      <div class="currency">

                                        <strong>6x</strong>
                                        <span class="plan-coin">R$</span>

                                      </div><!--currency-->
                                        
                                      <span id="plan2-vlinteger" class="price"><?php echo getValuePartial($inplan["1"]["vlprice"]/6,1); ?></span>
                                      <span id="plan2-vldecimal">,<?php echo getValuePartial($inplan["1"]["vlprice"]/6,0); ?></span> 

                                    </div><!--pricing-->



                                    <p>ou</p>
                                    <p class="plan-description"><span id="plan2-vlprice">R$ <?php echo formatPrice($inplan["1"]["vlprice"]); ?></span> pelo período de:</p>




                                    <select id="plan2" form="2" name="plano">
                                        <?php $counter1=-1;  if( isset($inplan) && ( is_array($inplan) || $inplan instanceof Traversable ) && sizeof($inplan) ) foreach( $inplan as $key1 => $value1 ){ $counter1++; ?>
                                            <option  value="<?php echo htmlspecialchars( $value1["inplancode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-inplancode="<?php echo htmlspecialchars( $value1["inplancode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlprice="<?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-vlinstallment='<?php echo roundValue($value1["vlprice"]/6); ?>' data-vlinteger='<?php echo getValuePartial($value1["vlprice"]/6,1); ?>' data-vldecimal='<?php echo getValuePartial($value1["vlprice"]/6,0); ?>'<?php if( $value1["inperiod"] == '3' ){ ?> selected="selected" <?php } ?>><?php echo htmlspecialchars( $value1["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["desperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - R$ <?php echo formatPrice($value1["vlprice"]); ?></option> 
                                        <?php } ?>
                                            
                                    </select>

                                    <form action="/dashboard/renovar/checkout" id="2">
                                        <button type="submit" class="plan-box-button">Comece já</button>
                                    </form>



                                </div><!--plan-->

                              </div><!--col-->
                              
                              





                            </div><!--row-->
                                        


                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->




            </div><!--col-->
        

        </div><!--row-->
    
    </div><!--container-->

</section>










