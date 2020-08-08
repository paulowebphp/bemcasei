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




            <div class="col-md-9 col-12">






                <?php if( expirationDate($validate["dtend"]) ){ ?>
                <div class="row">
                    
                    <div class="col-12">

                        <div class="dash-title">
                            <h1>Meu Plano</h1>

                            

                                <div class="expiration-info">
                                    <span>Olá, <strong><?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, seu plano atual termina em <?php echo formatDate($validate["dtend"]); ?></span>
                                </div>
                        </div>

                    </div>


                </div>
                <?php } ?>








        




                <?php if( !$validate ){ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/comprar-plano">
                                <button>
                                    Comprar um plano
                                </button>
                            </a>
                     
                        </div>

                    </div>

                </div>
               

                <?php }elseif( $user["inplancontext"] == 0 ){ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/comprar-plano">
                                <button>
                                    Comprar um plano
                                </button>
                            </a>
                     
                        </div>

                    </div>

                </div>

                <?php }elseif( $validate["incontext"] != '3' and $validate["incontext"] != '0' ){ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/renovar">
                                <button>
                                    Fazer Renovação
                                </button>
                            </a>

                            <a href="/dashboard/upgrade">
                                <button>
                                    Fazer Upgrade
                                </button>
                            </a>
                     
                        </div>


                    </div>

                </div>

                <?php }else{ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/renovar">
                                <button>
                                    Fazer Renovação
                                </button>
                            </a>

                                                 
                        </div>


                    </div>

                </div>

                <?php } ?>































            



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






                













































                <?php $counter1=-1;  if( isset($regular_plan) && ( is_array($regular_plan) || $regular_plan instanceof Traversable ) && sizeof($regular_plan) ) foreach( $regular_plan as $key1 => $value1 ){ $counter1++; ?>
                <div class='row card-dash <?php echo getPaymentStatusClass($value1["inpaymentstatus"], $value1["inrefunded"]); ?>'>

                    <div class="col-12">
                        


                        <div class="row card-dash-row1">






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($value1["dtregister"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data da Compra</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            



                                                    






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Plano</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->












                            






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span>
                                            R$ <?php echo formatPrice($value1["vlprice"]); ?>
                                        </span>
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
                                        <span><?php echo getPaymentStatus($value1["inpaymentstatus"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Status</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                        </div><!--row-->




                        <div class="row card-dash-row2">



                            


                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span>

                                            <?php if( $value1["inmigration"] != 2 ){ ?>
                                                <?php if( $value1["inperiod"] > 1 ){ ?> <?php echo htmlspecialchars( $value1["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> meses <?php }else{ ?> <?php echo htmlspecialchars( $value1["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mês <?php } ?>
                                            <?php }else{ ?>
                                                Upgrade
                                            <?php } ?>

                                        </span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Período</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            
                            

                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($value1["dtbegin"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data Inicial</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($value1["dtend"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data Final</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->




                            <?php if( checkBoletoPrintHref($value1["inpaymentmethod"],$value1["inpaymentstatus"]) ){ ?>
                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <a title="O boleto abrirá dentro do site da Wirecard, mas fique tranquilo! A página é criptografada com HTTPS e totalmente segura, com a garantia de uma dos maiores processadores de pagamento do país" target="_blank" href="<?php echo htmlspecialchars( $value1["desprinthref"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                            <span>Reimprimir Boleto na Wirecard</span>
                                        </a>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span><i class="fa fa-lock"></i> Link Seguro</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            <?php }else{ ?>
                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    &nbsp;


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            <?php } ?>







                        </div><!--row-->




                    </div><!--col-->






                    






                </div><!--row-->
                <?php } ?>




































































                <?php if( $free_plan ){ ?>
                <div class="row card-dash">

                    <div class="col-12">
                        


                        <div class="row card-dash-row1">








                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($free_plan["dtregister"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data da Compra</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            



                                               






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $free_plan["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Plano</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->












                            






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span>
                                            R$ <?php echo formatPrice($free_plan["vlprice"]); ?>
                                        </span>
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
                                        <span>Autorizado</span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Status</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                        </div><!--row-->




                        <div class="row card-dash-row2">




                             


                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span>
                                            <?php echo htmlspecialchars( $free_plan["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> dias
                                        </span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Período</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->
                            
                            

                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($free_plan["dtbegin"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data Inicial</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($free_plan["dtend"]); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data Final</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    &nbsp;


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->




                            







                        </div><!--row-->




                    </div><!--col-->





                    </div><!--col-->





                </div><!--row-->
                <?php } ?>






                                                        
                            
                



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

