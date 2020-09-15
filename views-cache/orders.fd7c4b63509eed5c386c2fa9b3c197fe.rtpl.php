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

                        <a href="/dashboard/painel-financeiro">
                            <div class="dash-title">
                                <h1>Painel Financeiro</h1>
                            </div>
                        </a>

                    </div>

                </div>






                








                <div class="row">

                    <div class="col-12">

                        <div class="button-header">

                            <a href="/dashboard/sua-carteira">
                                <button>
                                    Sua Carteira
                                </button>
                            </a>


                            <?php if( $checkBank == 1 ){ ?>
                     
                            <a href="/dashboard/transferencias">
                                <button>
                                    Transferências
                                </button>
                            </a>

                            <?php }else{ ?>

                            <button id="popover1" class="disabled-links pointer-none" data-toggle="popover" data-placement="bottom" data-content="<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Transferências
                            </button>

                            <?php } ?>

                         
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






                <?php if( $sumReversed["sumvltotal"] == 0 and $sumReversed["sumvltotal"] == 0 and $balances["unavailable"] == 0 ){ ?>


                <div class="row account-panel">

                    
                    <div class="col-12">




                        <div class="account-box account-box3">
                        
                            <div class="account-box1">



                                <div class="row centralizer">
                                    
                                    <div class="col-3">


                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($sumTotals["sumvltotal"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Total dos Presentes</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->





                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>- R$ <?php echo formatPrice($sumTotals["sumvlprocessor"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Tarifas Bancárias</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->




                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>- R$ <?php echo formatPrice($sumAvailable["sumvlmarketplace"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Taxa Amar Casar</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->





                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value3">
                                                <span>R$ <?php echo formatPrice($sumAvailable["sumvlseller"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Valor Recebido</span>
                                                
                                            </div>
                                        </div><!--row1-->

                                    </div>

                    

                                </div><!--row-->


                                



                            </div>

                            <div class="account-box2">
                                
                           
                                
                                <div class="row balances">





                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($balances["future"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Saldo Futuro</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->







                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value3">
                                                <span>R$ <?php echo formatPrice($balances["current"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Saldo Disponível</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->


                                    



                                    



                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($sumCompleted["sumamount"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Transferido</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->



                                </div><!--row-->


                              
                            

                            </div><!--account-box-->


                        </div>
                        

                    </div><!--col-->
                    

                </div><!--row-->


                <?php }else{ ?>



                <div class="row account-panel">

                    
                    <div class="col-8">




                        <div class="account-box account-box3">
                        
                            <div class="account-box1">



                                <div class="row centralizer">
                                    
                                    <div class="col-3">


                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($sumTotals["sumvltotal"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Total dos Presentes</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->





                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>- R$ <?php echo formatPrice($sumTotals["sumvlprocessor"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Tarifas Bancárias</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->




                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>- R$ <?php echo formatPrice($sumAvailable["sumvlmarketplace"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Taxa Bem Casei</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->





                                    <div class="col-3">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value3">
                                                <span>R$ <?php echo formatPrice($sumAvailable["sumvlseller"]); ?></span>
                                            </div>

                                            <div class="card-dash-header3">

                                                <hr>
                                                <span>Valor Recebido</span>
                                                
                                            </div>
                                        </div><!--row1-->

                                    </div>

                    

                                </div><!--row-->


                                



                            </div>

                            <div class="account-box2">
                                
                           
                                
                                <div class="row balances">





                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($balances["future"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Saldo Futuro</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->







                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value3">
                                                <span>R$ <?php echo formatPrice($balances["current"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Saldo Disponível</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->


                                    



                                    



                                    <div class="col-4">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($sumCompleted["sumamount"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Transferido</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->



                                </div><!--row-->


                              
                            

                            </div><!--account-box-->


                        </div>
                        

                    </div><!--col-->



                    <div class="col-4">




                        <div class="account-box account-box3">
                        
                            <div class="account-box1">



                                <div class="row centralizer">
                                    
     

                                    <div class="col-6">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>R$ <?php echo formatPrice($balances["unavailable"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Saldo Bloqueado</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->


                                    <div class="col-6">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content value2">
                                                <span>R$ <?php echo formatPrice($sumRefunded["sumvlprocessor"]+$sumRefunded["sumvlseller"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Total Estornado</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->




                                </div><!--row-->


                                



                            </div>

                            <div class="account-box2">
                                
                           
                                
                                <div class="row balances centralizer">




                                    <div class="col-6">
                                        
                                        <div class="row1">
                                            
                                            <div class="card-dash-content">
                                                <span>R$ <?php echo formatPrice($sumRefunded["sumvlprocessor"]+$sumRefunded["sumvlseller"]); ?></span>
                                            </div>

                                            <div class="card-dash-header">

                                                <hr>
                                                <span>Reembolsado</span>
                                                
                                            </div>

                                        </div><!--row1-->

                                    </div><!--col-->



                                </div><!--row-->


                              
                            

                            </div><!--account-box-->


                        </div>
                        


                    </div><!--col-->
                    

                </div><!--row-->



                <?php } ?>



            



                



                




                <?php $counter1=-1;  if( isset($order) && ( is_array($order) || $order instanceof Traversable ) && sizeof($order) ) foreach( $order as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash centralizer">


                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                             <div class="card-dash-content">
                                <span><?php echo formatDate($value1["dtregister"]); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Data</span>
                            </div>

                        </div>


                    </div>




                        
                    <div class="col-md-3 col-12">

                        <div class="card-dash-field">


                             <div class="card-dash-content">
                                <span><?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Quem presenteou</span>
                            </div>

                        </div>


                    </div>
                        
                            
                    <div class="col-md-1 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content">
                                <span><?php echo getPaymentStatus($value1["inpaymentstatus"]); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Status</span>
                                
                            </div>


                        </div>

                        
                    </div>







                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content">
                                <span>R$ <?php echo formatPrice($value1["vltotal"]); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Valor Total</span>
                                
                            </div>


                        </div>

                        
                    </div>











                             
                            


                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content current">
                                <span>R$ <?php echo formatPrice($value1["vlseller"]); ?></span>
                            </div>

                            <div class="card-dash-header">

                                <hr>
                                <span>Valor Recebido</span>
                                
                            </div>


                        </div>

                        
                    </div>
                            




                    <div class="col-md-2 col-12">
                        
                        <div class="card-dash-field">




                                <a href='/dashboard/painel-financeiro/detalhes/<?php echo setHash($value1["idorder"]); ?>'>

                                    <button>Detalhes</button>

                                </a>
                                


                                                           
                            </div><!--card-buttons-wrappe-->

                    </div>







       
                </div>
                <?php }elseif( !$order and $search != '' ){ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum item foi encontrado
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum presente foi recebido ainda
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/painel-financeiro">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/painel-financeiro">
                                            <button type="button" class="btn btn-default">

                                                <i class="fa fa-undo"></i>

                                            </button>
                                        </a>
                                        
                                        <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                        <div class="input-group-btn">

                                            <button type="submit" class="btn btn-default">

                                                <i class="fa fa-search"></i>

                                            </button>

                                        </div><!--input-group-btn--->

                                    </div><!--input-group-->

                                </form>
                                
                            </div><!--search-->

                        </div><!--col-->





                        <div class="col-md-9 col-12">

                            <div class="pagination">
                                
                                <ul>
                                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                                        <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>                             
                                                               
                                    <?php } ?>
                                </ul>

                            </div>

                        </div><!--col-->





                        

                    </div><!--row-->





























            </div><!--col-->
        

      
        </div><!--row-->
    
    </div><!--container-->

</section>

