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


                 

               <form method="post" action="/dashboard/listas-de-fora/adicionar">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Criar Lista de Fora</h1>
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
                        
                        <div class="col-md-6 dash-column">





                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instatus">Visível</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instatus" name="instatus" class="custom-select">

                                    <option value="0">Não</option>
                                    <option value="1" selected>Sim</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->








                            <div class="dash-input-row input-inposition">

                                <label for="inposition">Posição</label>
                                <input type="text" class="form-control" id="inposition" name="inposition">

                            </div><!--dash-input-row-->





                        


                            <div class="dash-input-row input-date">


                                <label for="desouterlist">Título da Sua Lista</label>
                                <input type="text" class="form-control" id="desouterlist" name="desouterlist">


                            </div><!--dash-input-row-->









                            <div class="dash-input-row">


                                <label for="nrphone">Telefone <br><small><i>(Da própria loja ou do vendedor responsável pela lista)</i></small></label>
                                <input type="text" class="form-control" id="nrphone" name="nrphone">


                            </div><!--dash-input-row-->








                            <div class="dash-input-row">


                                <label for="dessite">Site <br><small><i>(Coloque aqui o site da sua lista | Exemplo: https://www.loja.com.br/sua-lista ou https://sua-lista.loja.com.br)</i></small></label>
                                <input type="text" class="form-control" id="dessite" name="dessite">


                            </div><!--dash-input-row-->


   



                            



                           

                            <div class="dash-input-row">


                                <label for="deslocation">Endereço <br><small><i>(Coloque aqui o endereço físico da loja onde você fez sua lista, caso haja)</i></small></label>
                                <input type="text" class="form-control" id="deslocation" name="deslocation">


                            </div><!--dash-input-row-->










                            <div class="dash-input-row">

                                <div>
                                    <label for="desdescription">Descrição</label>
                                </div>
                                
                                <textarea rows="10" cols="90" maxlength="500" id="desdescription" name="desdescription"></textarea>

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

                                <a href="/dashboard/listas-de-fora" class="btn btn-danger">Voltar</a>

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

