<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

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




            <div class="col-md-9 col-12">







                <div class="row">
                    
                    <div class="col-12">

                        <div class="dash-title">
                            <h1>Transferências</h1>
                           
                        </div>

                    </div>


                </div>







                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/transferencias/transferir-saldo">
                                <button>
                                    Transferir Saldo para Conta Bancária
                                </button>
                            </a>

                            <a href="/dashboard/painel-financeiro">
                                <button>
                                    Voltar
                                </button>
                            </a>
                     
                        </div>

                    </div>

                </div>




            



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







                <?php $counter1=-1;  if( isset($transfer) && ( is_array($transfer) || $transfer instanceof Traversable ) && sizeof($transfer) ) foreach( $transfer as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">

                    <div class="col-md-10 col-12">
                        


                        <div class="row card-dash-row1">
                            



                            <div class="col-md-4 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["destransfercode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header">
                                        <hr>
                                        <span>Transferência</span>
                                    </div>

                                </div><!--card-dash-field-->


                            </div><!--col-->
                        






                            <div class="col-md-5 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desbanknumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Instituição</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->





                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desagencynumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["desagencycheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Agência</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->

                           




                        </div><!--row-->








                        <div class="row card-dash-row2">




                           





                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desaccountnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["desaccountcheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Conta</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->












                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span>R$ <?php echo formatPrice($value1["vlamount"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Valor</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                            




                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["intransferstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Status</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->









                            









                            







                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDateTimeWithSeconds($value1["dtregister"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->







                        </div><!--row-->




                    </div><!--col-->






                    <div class="col-md-2 col-12 card-dash-row3">
                        

                        <div class="card-dash-field">


                            <a href="/dashboard/transferencias/<?php echo htmlspecialchars( $value1["idtransfer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                <button>Detalhes</button>

                            </a>
                            


                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->




                </div><!--row-->


























                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhuma transferência foi realizada
                        </div>
                    </div>
                </div>
                <?php } ?>






                                                      
                            
  
            


            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

