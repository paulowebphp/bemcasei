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











                <div class="row">
                    
                    <div class="col-12">

                        <div class="dash-title">
                            <h1>Presente Recebido</h1>
                        </div>

                    </div>

                </div>







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









                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:30px;" class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col" colspan="2">Presente</th>
                                        <th class="text-center" scope="col">Valor</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>.</th>
                                        <td class="text-center" colspan="2"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td class="text-center">R$ <?php echo formatPrice(getInterest($value1["vltotal"],'1','1',$order["incharge"])); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-right" scope="col">Total</th>
                                        <th class="text-center" scope="col">R$ <?php echo formatPrice(getInterest($cart["vlprice"],'1','1',$order["incharge"])); ?></th>
                                    </tr>
                                    <?php if( $order["nrinstallment"] == 1 ){ ?>
                                    <tr>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-right" scope="col">Parcelado em <?php echo htmlspecialchars( $order["nrinstallment"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vezes de R$ <?php echo formatPrice($order["vltotal"]/$order["nrinstallment"]); ?></th>
                                        <th class="text-right" scope="col">Total Parcelado</th>
                                        <th class="text-center" scope="col">R$ <?php echo formatPrice($order["vltotal"]); ?></th>

                                    </tr>
                                    <?php } ?>


                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>





















                <div class="row">
                    
                    <div class="col-md-6 col-12">

                        
                        <div class="card-payment-reverse">
                            
                            <div class="body-row order-info row">

                            <div class="col-12">
                                
                                <h5><span>Data da Compra:</span> <?php echo formatDate($order["dtregister"]); ?></h5>

                            </div>

                        </div><!--big-body-row-->




                        <div class="body-row order-info row">

                            <div class="col-12">
                                
                                <h5><span>ID Pagamento:</span>  <?php echo htmlspecialchars( $order["despaymentcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                            </div>

                        </div><!--big-body-row-->



                        <div class="body-row order-info row">

                            <div class="col-12">
                                
                                <h5><span>Comprador:</span>  <?php echo htmlspecialchars( $order["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                            </div>

                        </div><!--big-body-row-->



                        <div class="body-row order-info row">

                            <div class="col-12">
                                
                                <h5><span>Telefone:</span>  <?php echo htmlspecialchars( $order["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $order["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                            </div>

                        </div><!--big-body-row-->



                        <div class="body-row order-info row">

                            <div class="col-12">
                                
                                <h5><span>E-mail:</span>  <?php echo htmlspecialchars( $order["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                            </div>

                        </div><!--big-body-row-->

                        </div>

                    </div><!--col-->



                    <div class="col-md-6 col-12">

                        
                        <div class="card-payment">
                            
                            <div class="body-row order-info row">

                                <div class="col-12 value1">
                                    
                                    <h5><span>Valor do Presente: </span>R$ <?php echo formatPrice($order["vltotal"]); ?> <?php if( $order["nrinstallment"] > 1 ){ ?> <small>(parcelado em <?php echo htmlspecialchars( $order["nrinstallment"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vezes)</small> <?php } ?></h5>

                                </div>

                            </div><!--big-body-row-->




                            



                            <div class="body-row order-info value2 row">

                                <div class="col-12">
                                    
                                    <h5><span>Taxas Totais: </span> - R$ <?php echo formatPrice($order["vlprocessor"]+$order["vlmarketplace"]); ?></h5>

                                </div>

                            </div><!--big-body-row-->

                            


                            <div class="body-row order-info value3 row">

                                <div class="col-12">
                                    
                                    <h5><span>Valor Recebido: </span> R$ <?php echo formatPrice($order["vlseller"]); ?></h5>

                                </div>

                            </div><!--big-body-row-->


                            <?php if( $order["nrinstallment"] > 1 ){ ?>
                            <div class="body-row order-info obs row">

                                <div class="col-12">
                                    
                                    <h6><span>Observação: </span> Para esta transação foi cobrado uma taxa total de <?php echo formatTax($order["vlmktpercentage"]+$order["vlantecipation"]+$order["vlpropercentage"]); ?>%; sendo <?php echo formatTax($order["vlmktpercentage"]+$order["vlpropercentage"]); ?>% de Tarifas Bancárias + Taxa Amar Casar; e <?php echo formatTax($order["vlantecipation"]); ?>% de Tarifa de Antecipação relativa ao parcelamento em <?php echo htmlspecialchars( $order["nrinstallment"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vezes</h6>

                                </div>

                            </div><!--big-body-row-->
                            <?php } ?>

                            


                        </div><!--card-payment-->

                    </div><!--col-->



                </div><!--row-->




                <div class="body-footer order-info row">

                    <div class="col-12">
                        
                        <div id="payment">
                            <button type="submit" value="Imprimir" class="btn btn-secondary" onclick="window.print()">Imprimir</button>
                            <a href="/dashboard/painel-financeiro" class="btn btn-danger">Voltar</a>


                        </div>

                    </div>

                </div><!--big-body-row-->
                          

                




            </div><!--col-->
        

      
        </div><!--row-->
    
    </div><!--container-->

</section>

