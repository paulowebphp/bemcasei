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




            <div class="col-md-9 col-12 dash-panel">





                <div class="row">
                
                    <div class="col-12">
                        
                        <div class="payment-warn dash-input-row width70">
                            
                            <h1>Olá, <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?><h1>

                        </div>

                        <div class="payment-warn dash-input-row">
                            
                            <h3>Preencha com seus dados pessoais</h3>

                        </div>


                        <div class="payment-warn dash-input-row">
                            
                            <h4 id="desdocument-warn">O CPF utilizado aqui deve ser o mesmo da conta bancária que irá receber os valores<br><small>(<a target="_blank" href="/termos-lista#bancos">Ver bancos aceitos</a>)</small></h4>

                        </div>


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







                  <form id="dash-form" action="/dashboard/comprar-plano/cadastrar" method="post">

                    <input type="hidden" name="plano" value="<?php echo htmlspecialchars( $inplancode, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <div class="row">
                        
                        <div class="col-md-6 dash-column">
                            

                           <div class="dash-input-row">

                                <input class="disabled" type="text" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Nome" name="desperson" class="form-control" disabled>

                            </div><!--dash-input-row-->


                            <div class="dash-input-row">

                                <input class="disabled" type="text" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="E-mail" name="desemail" class="form-control" disabled>

                            </div><!--dash-input-row-->


                            <div class="dash-input-row">

                                <input type="text" placeholder="CPF" name="desdocument" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                            <div class="dash-input-row row">

                                <div class="col-md-3 col-4 width40">

                                    <input type="text" placeholder="DDD" name="nrddd" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->



                                <div class="col-md-9 col-8 width60">

                                    <input type="text" placeholder="Telefone" name="nrphone" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->

                            </div><!--row-->







                            <div class="dash-input-row row">

                                <div class="col-md-3 col-4 width30">
                                    
                                    <label for="payment_birth_1">Nascimento:</label>
                                    
                                </div><!--col-->



                                <div class="col-md-9 col-8 width70">

                                    <input type="date" placeholder="Nascimento" name="dtbirth" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->

                            </div><!--row-->


                            
                            





                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            

                            <div class="dash-input-row">
                    
                                <input type="text" placeholder="CEP apenas com números" name="zipcode" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Número" name="desnumber" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Complemento (opcional)" name="descomplement" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Bairro" name="desdistrict" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>

                                



                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">
                                
                                    <label for="state">Estado</label>
                                
                                    <select id="state" form="dash-form" name="desstate">

                                        <?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
                                            <option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?>

                                        
                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->





                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">

                                    <label for="city">Cidade</label>
                                
                                    <select id="city" form="dash-form" name="descity">

                                        <?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
                                            <option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 

                                        <?php } ?>

                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->

                           
                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-12">

                            <div class="body-footer">
                    
                                <input type="submit" value="Continuar" id="button1" name="button1">
                                
                            </div>


                            <div class="dash-input-row buttons-wrapper1">
                                    
                                <input type="checkbox" class="input-text" id="interms-check" name="interms" value="1">
                                <div id="interms-text" for="interms-check">Li e Concordo com os <a href="/termos-uso">Termos de Uso</a>, os <a href="/termos-lista">Termos da Lista de Presentes Virtuais</a> e a <a href="/politica-privacidade">Política de Privacidade</a>.</div>

                            </div>                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>


