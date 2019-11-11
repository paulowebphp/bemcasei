<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard dashboard-index">

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





                    

                <div class="row resume-row">
                    
                    <div class="col-md-6 resume-wrapper">

                        <div class="resume-box">

                            

                            <div class="resume-content">
                                <h2><?php echo htmlspecialchars( $rsvp_confirmed, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>

                                <?php if( $rsvp_confirmed == 1 ){ ?>
                                    <h6>Presença</h6><h6>Confirmada</h6>
                                <?php }else{ ?>
                                    <h6>Presenças</h6><h6>Confirmadas</h6>
                                <?php } ?>
                            </div>

                        </div>

                    </div><!--col-lg-3-->




                    <div class="col-md-6 resume-wrapper">

                        <div class="resume-box">

                            

                            <div class="resume-content">
                                <h2><?php echo htmlspecialchars( $message, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>

                                <?php if( $message == 1 ){ ?>
                                    <h6>Mensagem</h6>
                                    <h6>Recebida</h6>
                                <?php }else{ ?>
                                    <h6>Mensagens</h6>
                                    <h6>Recebidas</h6>
                                <?php } ?>
                            </div>



                        </div>

                    </div><!--col-lg-3-->


                </div><!--row-->



                






            </div><!--col-->
        


      
        </div><!--row-->
    
    </div><!--container-->

</section>

