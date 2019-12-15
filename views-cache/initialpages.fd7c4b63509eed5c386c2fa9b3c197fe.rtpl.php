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

                <form id="dash-form" method="post" action="/dashboard/pagina-inicial">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Página Inicial</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->



                    <div class="row">
                        
                        <div class="col-md-6 dash-column">


                            


                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inparty">Minha Festa</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inparty" name="inparty" class="custom-select">

                                    <option value="1" <?php if( $initialpage["inparty"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $initialpage["inparty"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->




















                          
                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inbestfriend">Padrinhos e Madrinhas</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inbestfriend" name="inbestfriend" class="custom-select">

                                    <option value="1" <?php if( $initialpage["inbestfriend"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $initialpage["inbestfriend"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->













                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inalbum">Album</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inalbum" name="inalbum" class="custom-select">

                                    <option value="1" <?php if( $initialpage["inalbum"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $initialpage["inalbum"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->










                            <div class="dash-input-row">

                                <input type="hidden" class="form-control" id="idinitialpage" name="idinitialpage" value="<?php echo htmlspecialchars( $initialpage["idinitialpage"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--dash-input-row-->





                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





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

