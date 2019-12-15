<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
               

                <?php }elseif( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


                

                <form id="dash-form" method="post" action="/dashboard/meus-dados">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Meus Dados</h1>
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




                    
                    <?php if( $user["inaccount"] != 0 ){ ?>
                    <div class="row">
                        
                        <div class="col-md-6 dash-column">
                            

                            <div class="dash-input-row">

                                <label for="desemail">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desperson">Nome completo</label>
                                <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desnick">Escolha um apelido</label>
                                <input type="text" class="form-control" id="desnick" name="desnick" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                            <div class="dash-input-row input-date">

                                <label for="dtbirth">Nascimento</label>
                                <input type="date" class="form-control" id="dtbirth" name="dtbirth" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["dtbirth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->


                            


                            <div class="row dash-input-row row-2-columns">



                                <div class="col-md-3">

                                    <label for="nrddd">DDD</label>

                                    <div id="nrddd">

                                        <input type="text" placeholder="Mês" id="nrddd" name="nrddd" value="<?php echo htmlspecialchars( $user["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                                        
                                    </div><!--nrddd-->

                                </div><!--col-->



                                <div class="col-md-9">

                                    <label for="nrphone">Telefone</label>

                                    <div id="nrphone">

                                        <input type="text" placeholder="Ano" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                                        
                                    </div><!--nrphone-->

                                </div><!--col-->



                            </div><!--row-->


                            
                            





                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            

                            <div class="dash-input-row">

                                <label for="deszipcode">CEP</label>

                                <input type="text" class="form-control" id="deszipcode" name="deszipcode" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $address["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desaddress">Endereço</label>

                                <input type="text" class="form-control" id="desaddress" name="desaddress" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->



                            
                            <div class="dash-input-row">

                                <label for="desnumber">Número</label>

                                <input type="tel" class="form-control" id="desnumber" name="desnumber" placeholder="Digite o telefone aqui" value="<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="descomplement">Complemento (opcional)</label>

                                <input type="text" class="form-control" id="descomplement" name="descomplement" value="<?php echo htmlspecialchars( $address["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desdistrict">Bairro</label>

                                <input type="text" class="form-control" id="desdistrict" name="desdistrict" value="<?php echo htmlspecialchars( $address["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->

                                



                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">
                                
                                    <label for="state">Estado</label>
                                
                                    <select id="state" form="dash-form" name="desstate">

                                        <?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?> 
                                            <option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idstate"] == $address["idstate"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?>

                                        
                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->





                            <div class="dash-input-row">
                                
                                <div class="dash-state-city">

                                    <label for="city">Cidade</label>
                                
                                    <select id="city" form="dash-form" name="descity">

                                        <?php $counter1=-1;  if( isset($city) && ( is_array($city) || $city instanceof Traversable ) && sizeof($city) ) foreach( $city as $key1 => $value1 ){ $counter1++; ?>
                                            <option value="<?php echo htmlspecialchars( $value1["idcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idcity"] == $address["idcity"] ){ ?>selected="selected"<?php } ?>><?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?>

                                    </select>

                                </div><!--dash-state-city-->

                            </div><!--dash-input-row-->

                            


                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->
                    <?php }else{ ?>
                    <div class="row">
                        
                        <div class="col-md-6 dash-column">
                            

                            <div class="dash-input-row">

                                <label for="desemail">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desperson">Nome completo</label>
                                <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                            <div class="dash-input-row">

                                <label for="desnick">Escolha um apelido</label>
                                <input type="text" class="form-control" id="desnick" name="desnick" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desnick"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->




                          
                            





                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                           
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->
                    <?php } ?>





                    <div class="row">

                        <div class="col-md-12">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

