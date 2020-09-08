<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


            <?php if( $user["inplancontext"] == 0 ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-free");?>

            
            <?php }elseif( $user["incheckout"] == 0 ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-nocheckout");?>
            

            <?php }elseif( !$validate ){ ?>

                <?php require $this->checkTemplate("dashboard-menu-expirated");?>
            

            <?php }else{ ?>

                <?php require $this->checkTemplate("dashboard-menu");?>

            <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">





                <div class="row">
                
                    <div class="col-12">
                        
                        <div class="payment-warn">
                            
                            <h3>Para abrir sua Loja de Presentes Virtuais preencha os dados abaixo.</h3>

                        </div>


                        <div class="payment-warn">
                            
                            <h4 id="desdocument-warn">O CPF e o nome completo informado aqui devem ser os mesmos que constam na conta corrente ou poupança que irá receber os valores<br><small>(<a target="_blank" href="/termos-lista#bancos">Ver bancos aceitos</a>)</small></h4>

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







                  <form id="dash-form" action="/dashboard/cadastrar" method="post">

                    

                    <div class="row">
                        
                        <div class="col-md-6 dash-column">
                            

                           <div class="dash-input-row">

                                <input class="texst" type="text" placeholder="Nome" name="desname" id="desname" class="form-control"  value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->


                            <div class="dash-input-row">

                                <input class="text" type="text" placeholder="E-mail" name="desemail" id="desemail" class="form-control"  value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->


                            <div class="dash-input-row">

                                <input type="text" placeholder="CPF" name="desdocument" id="desdocument" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                            <div class="dash-input-row row">

                                <div class="col-md-3 col-4 width40">

                                    <input type="text" placeholder="DDD" name="nrddd" id="nrddd" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->



                                <div class="col-md-9 col-8 width60">

                                    <input type="text" placeholder="Telefone" name="nrphone" id="nrphone" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->

                            </div><!--row-->







                            <div class="dash-input-row row">

                                <div class="col-md-3 col-4 width30">
                                    
                                    <label for="payment_birth_1">Nascimento:</label>
                                    
                                </div><!--col-->



                                <div class="col-md-9 col-8 width70">

                                    <input type="date" placeholder="Nascimento" name="dtbirth" id="dtbirth" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!--col-->

                            </div><!--row-->


                            
                            





                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            

                            <div class="dash-input-row">
                    
                                <input type="text" placeholder="CEP apenas com números" name="zipcode" id="zipcode" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Logradouro, rua, avenida" name="desaddress" id="desadress" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Número" name="desnumber" id="desnumber" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Complemento (opcional)" name="descomplement" id="descomplement" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>


                            <div class="dash-input-row">
                                
                                <input type="text" placeholder="Bairro" name="desdistrict" id="desdistrict" class="form-control" value="<?php echo htmlspecialchars( $planPurchaseRegisterValues["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                            </div>

                                



                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">
                                
                                    <label for="state">Estado</label>
                                
                                    <select id="state" form="dash-form" name="desstate">

                                            <option value="0">Insira um Estado...</option>
                                        <?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
                                            <option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $planPurchaseRegisterValues["desstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?> 
                                        
                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->





                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">

                                    <label for="city">Cidade</label>
                                
                                    <select id="city" form="dash-form" name="descity">
                                        <option value="0">Insira uma Cidade...</option>

                                        <?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
                                            <option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $planPurchaseRegisterValues["descity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?>

                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->

                           
                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-12">

                            <div class="body-footer">
                    
                                <!--<input type="submit" value="Continuar" id="button1" name="button1">-->

                                <!--<button type="button" id="ModalDashRegisterButton" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Enviar</button>-->
                                
                                <button type="button" id="ModalDashRegisterButton" class="btn btn-primary" data-toggle="modal" data-target="#ModalDashRegister">
                                    Enviar
                                  </button>
                            
                            </div>


                            <div class="dash-input-row buttons-wrapper1">
                                    
                                <input type="checkbox" class="input-text" id="interms-check" name="interms" value="1">
                                <div id="interms-text" for="interms-check">Li e Concordo com os <a target="_blank" href="/termos-uso">Termos de Uso</a>, os <a target="_blank" href="/termos-lista">Termos da Lista de Presentes Virtuais</a> e a <a target="_blank" href="/politica-privacidade">Política de Privacidade</a>.</div>

                            </div>                            
                        </div><!--col-->

                    </div><!--row-->



                


                

                





                  <!-- Modal -->
                <div class="modal fade" id="ModalDashRegister" tabindex="-1" role="dialog" aria-labelledby="ModalDashRegisterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="payment-warn">
                                <h3>Confirme Seus Dados</h3>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="content1" class="payment-warn2"></div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Corrigir</button>
                        <button type="submit" id="confirmation1" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                    </div>
                </div>



            </form>


            </div><!--col-->
        



      
        </div><!--row-->




        
    
    </div><!--container-->

</section>


