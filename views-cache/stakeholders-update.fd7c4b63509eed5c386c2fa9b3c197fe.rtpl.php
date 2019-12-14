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

               <form method="post" action='/dashboard/fornecedores/<?php echo setHash($stakeholder["idstakeholder"]); ?>'>

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Criar Fornecedor</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        
                        <div class="col-md-6 dash-column">



                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instatus">Visível</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instatus" name="instatus" class="custom-select">

                                    <option value="0" <?php if( $stakeholder["instatus"] == '0' ){ ?>selected<?php } ?>>Não</option>
                                <option value="1" <?php if( $stakeholder["instatus"] == '1' ){ ?>selected<?php } ?>>Sim</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->







                            <div class="dash-input-row input-inposition">

                                <label for="inposition">Posição</label>
                                <input type="text" class="form-control" id="inposition" name="inposition" value="<?php echo htmlspecialchars( $stakeholder["inposition"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                        


                            <div class="dash-input-row input-date">


                                <label for="desstakeholder">Fornecedor</label>
                                <input type="text" class="form-control" id="desstakeholder" name="desstakeholder" value="<?php echo htmlspecialchars( $stakeholder["desstakeholder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->






                            <div class="dash-input-row">


                                <label for="descategory">Categoria</label>
                                <input type="text" class="form-control" id="descategory" name="descategory" value="<?php echo htmlspecialchars( $stakeholder["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->


   





                            <div class="dash-input-row">


                                <label for="nrphone">Telefone</label>
                                <input type="text" class="form-control" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $stakeholder["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->







                            <div class="dash-input-row">

                                 <label for="dessite">Site</label>
                                <input type="text" class="form-control" id="dessite" name="dessite" value="<?php echo htmlspecialchars( $stakeholder["dessite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->









                            <div class="dash-input-row">

                                <label for="desemail">E-mail</label>
                                <input type="text" class="form-control" id="desemail" name="desemail" value="<?php echo htmlspecialchars( $stakeholder["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->






                            <div class="dash-input-row">


                                <label for="deslocation">Local</label>
                                <input type="text" class="form-control" id="deslocation" name="deslocation" value="<?php echo htmlspecialchars( $stakeholder["deslocation"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                            </div><!--dash-input-row-->







                           <div class="dash-input-row">

                                <div>
                                    <label for="desdescription">Descrição</label>
                                    <!--<input type="text" class="form-control" id="desdescription" name="desdescription" ">-->
                                </div>
                                
                                <textarea rows="10" cols="90" maxlength="500" id="desdescription" name="desdescription"><?php echo htmlspecialchars( $stakeholder["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--dash-input-row-->

                            







                                    

                        </div><!--col-md-6-->








                        <div class="col-md-6">
                            
                            
                            
                           &nbsp;


                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-6">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/fornecedores" class="btn btn-danger">Voltar</a>

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

