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
               

                <?php }elseif( $validate["incontext"] == 0 or $validate["incheckout"] == 0 ){ ?>

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
                <div class="row centralizer">
                    <div class="col-md-8 col-12">
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
                <div class="row centralizer">
                    <div class="col-md-8 col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> 
                </div>  
                <?php } ?>






                













                <?php if( $nrtotal > 0 ){ ?>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Data da Compra</th>
                                        <th scope="col">Plano</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Período</th>
                                        <th scope="col">Data Inicial</th>
                                        <th scope="col">Data Final</th>
                                        <th scope="col"><span title="Forma de Pagamento">#</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter1=-1;  if( isset($planArray) && ( is_array($planArray) || $planArray instanceof Traversable ) && sizeof($planArray) ) foreach( $planArray as $key1 => $value1 ){ $counter1++; ?>
                                    <tr class='<?php echo getPaymentStatusClass($value1["inpaymentstatus"], $value1["inrefunded"]); ?>'>
                                        <th scope="row"><?php echo formatDate($value1["dtregister"]); ?></th>
                                        <td><?php echo htmlspecialchars( $value1["desplan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td>R$ <?php echo formatPrice($value1["vlprice"]); ?></td>
                                        <td><?php echo getPaymentStatus($value1["inpaymentstatus"]); ?></td>
                                        <td>
                                            <?php if( $value1["inmigration"] != 2 ){ ?>
                                                <?php if( $value1["inperiod"] > 1 ){ ?> <?php echo htmlspecialchars( $value1["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> meses <?php }else{ ?> <?php echo htmlspecialchars( $value1["inperiod"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mês <?php } ?>
                                            <?php }else{ ?>
                                                Upgrade
                                            <?php } ?>
                                        </td>
                                        <td><?php echo formatDate($value1["dtbegin"]); ?></td>
                                        <td><?php echo formatDate($value1["dtend"]); ?></td>
                                        <td>
                                            <?php if( $value1["inpaymentmethod"] == 1 or $value1["inpaymentmethod"] == 2 ){ ?>
                                                <span><i title="Cartão de Crédito" class="fa fa-credit-card"></i></span>
                                            <?php }elseif( $value1["inpaymentmethod"] == 0 ){ ?>
                                                <span><i title="Boleto" class="fa fa-barcode"></i></span>
                                            <?php }elseif( $value1["inpaymentmethod"] == 3 ){ ?>
                                                <span><i title="Voucher" class="fa fa-tag"></i></span>
                                                <?php }elseif( $value1["inpaymentmethod"] == 4 ){ ?>
                                            <span><i title="Plano Free" class="fa fa-bookmark"></i></span>
                                            <?php } ?>

                                            <?php if( checkBoletoPrintHref($value1["inpaymentmethod"],$value1["inpaymentstatus"]) ){ ?>  
                                                <a title="Reimprimir Boleto | O boleto abrirá dentro do site da Wirecard | Página totalmente segura, criptografada com HTTPS e com a garantia de uma dos maiores processadores de pagamento do país" target="_blank" href="<?php echo htmlspecialchars( $value1["desprinthref"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                                    <span><i class="fa fa-external-link"></i></span>
                                                </a>
                                            <?php }else{ ?>
                                                <span>&nbsp;</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php } ?>


                



                
                
                



                





                                                        
                            
                



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

