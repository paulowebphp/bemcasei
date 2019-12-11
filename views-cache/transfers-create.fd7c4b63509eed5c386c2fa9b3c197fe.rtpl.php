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




            <div class="col-md-9 col-12 dash-panel">



               <form method="post" action="/dashboard/transferencias/transferir-saldo">

                    <div class="row">
                    
                        <div class="col-12">

                            <div class="dash-title">
                                <h1>Transferir Saldo</h1>
                               
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




                    



                    <div class="row">
                        
                        <div class="col-md-9 dash-column">


                                



                            <div class="dash-input-row">

                                <label for="desbanknumber">Instituição Bancária</label>
                                <input type="text" class="form-control" id="desbanknumber" name="desbanknumber" value='<?php echo getBankName($bank["desbanknumber"]); ?>' disabled>

                            </div><!--dash-input-row-->






                            


                            <div class="dash-input-row input-half">

                                <label for="desaccounttype">Tipo de Conta</label>
                                <input type="text" class="form-control" id="desaccounttype" name="desaccounttype" value='<?php if( $bank["desaccounttype"] == 'CHECKING' ){ ?>Conta Corrente<?php }else{ ?>Conta Poupança<?php } ?>' disabled>

                            </div><!--dash-input-row-->






                            <div class="row dash-input-row row-2-columns account-row">



                                <div class="col-md-9">

                                    <label for="desagencynumber">Agência</label>

                                    <div id="desagencynumber">

                                        <input type="text" class="form-control" id="desagencynumber" name="desagencynumber" value="<?php echo htmlspecialchars( $bank["desagencynumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>

                                        
                                    </div><!--nrddd-->

                                </div><!--col-->



                                <div class="col-md-3">

                                    <label for="desagencycheck">Dígito Verificador</label>

                                    <div id="desagencycheck">

                                        <input type="text" class="form-control" id="desagencycheck" name="desagencycheck" value="<?php echo htmlspecialchars( $bank["desagencycheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                                        
                                    </div><!--nrphone-->

                                </div><!--col-->



                            </div><!--row-->










                            <div class="row dash-input-row row-2-columns account-row">



                                <div class="col-md-9">

                                    <label for="desaccountnumber">Número da Conta</label>

                                    <div id="desaccountnumber">

                                        <input type="text" class="form-control" id="desaccountnumber" name="desaccountnumber" value="<?php echo htmlspecialchars( $bank["desaccountnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>


                                        
                                    </div><!--nrddd-->

                                </div><!--col-->



                                <div class="col-md-3">

                                    <label for="desaccountcheck">Dígito Verificador</label>

                                    <div id="desaccountcheck">

                                        <input type="text" class="form-control" id="desaccountcheck" name="desaccountcheck" value="<?php echo htmlspecialchars( $bank["desaccountcheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                                        
                                    </div><!--nrphone-->

                                </div><!--col-->



                            </div><!--row-->


                            






                            <div class="dash-input-row">


                                <label for="vlamount">Valor a transferir</label>
                                <input type="number" min="2.50" step="0.01" class="form-control" id="vlamount" name="vlamount">


                            </div><!--dash-input-row-->





                       

                        </div><!--col-md-6-->







                        <div class="col-md-3">
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-6">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-success">Realizar Transferência</button>

                                <a href="/dashboard/transferencias" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->



                        <div class="col-md-6">

                            &nbsp;
                            
                        </div><!--col-->



                    </div><!--row-->



                </form>


              
            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>





