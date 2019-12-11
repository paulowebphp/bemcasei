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


        

               <form id="dataBank" method="post" action="/dashboard/conta-bancaria">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Conta Bancária</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->



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
                                


                                <label class="input-group-text" for="desbanknumber">Instituição Bancária</label>


                                <select form="dataBank" id="desbanknumber" name="desbanknumber">

                                    <?php $counter1=-1;  if( isset($bankvalues) && ( is_array($bankvalues) || $bankvalues instanceof Traversable ) && sizeof($bankvalues) ) foreach( $bankvalues as $key1 => $value1 ){ $counter1++; ?>
                                        <option <?php if( $bankvalues["$counter1"]["value"] == $bank["desbanknumber"] ){ ?>selected<?php } ?> value="<?php echo htmlspecialchars( $bankvalues["$counter1"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $bankvalues["$counter1"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                    <?php } ?>

                                </select>


                            </div><!--dash-input-row-->









                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="desaccounttype">Tipo de Conta</label>

                                  </div><!--input-group-prepend-->

                                  <select form="dataBank" id="desaccounttype" name="desaccounttype" class="custom-select">

                                    <option <?php if( $bank["desaccounttype"] === 'SAVING' ){ ?>selected<?php } ?> value="SAVING">Conta Poupança</option>
                                    <option <?php if( $bank["desaccounttype"] === 'CHECKING' ){ ?>selected<?php } ?> value="CHECKING">Conta Corrente</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->









                            <div class="row dash-input-row row-2-columns account-row">



                                <div class="col-md-9">

                                    <label for="desagencynumber">Agência</label>

                                    <div id="desagencynumber">

                                        <input type="text" class="form-control" id="desagencynumber" name="desagencynumber" value="<?php echo htmlspecialchars( $bank["desagencynumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                        
                                    </div><!--nrddd-->

                                </div><!--col-->



                                <div class="col-md-3">

                                    <label for="desagencycheck">Dígito Verificador</label>

                                    <div id="desagencycheck">

                                        <input type="text" class="form-control" id="desagencycheck" name="desagencycheck" value="<?php echo htmlspecialchars( $bank["desagencycheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div><!--col-->



                            </div><!--row-->










                            <div class="row dash-input-row row-2-columns account-row">



                                <div class="col-md-9">

                                    <label for="desaccountnumber">Número da Conta</label>

                                    <div id="desaccountnumber">

                                        <input type="text" class="form-control" id="desaccountnumber" name="desaccountnumber" value="<?php echo htmlspecialchars( $bank["desaccountnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                                        
                                    </div><!--nrddd-->

                                </div><!--col-->



                                <div class="col-md-3">

                                    <label for="desaccountcheck">Dígito Verificador</label>

                                    <div id="desaccountcheck">

                                        <input type="text" class="form-control" id="desaccountcheck" name="desaccountcheck" value="<?php echo htmlspecialchars( $bank["desaccountcheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrphone-->

                                </div><!--col-->



                            </div><!--row-->







                            <div class="dash-input-row">
                                

                                <input type="hidden" class="form-control" id="idbank" name="idbank" value="<?php echo htmlspecialchars( $bank["idbank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->




                       

                        </div><!--col-md-6-->







                        <div class="col-md-3">
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-6">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/painel-financeiro" class="btn btn-danger">Voltar</a>

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





