<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard templates-models">

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


                




                <form id="dash-form" method="post" action="/dashboard/meu-template">


                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Meu Template</h1>
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
                        
                        <div class="col-12">
                            
                           <div class="preview">


                                <div id="preview-button">
                                    
                                    <!-- Botão para acionar modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTemplate">
                                        Template <?php echo htmlspecialchars( $preview["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    </button>

                                </div>
                               

                                <div id="preview">
                                    
                                    <img src="/res/images/template/thumb/<?php echo htmlspecialchars( $preview["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div><!-- #preview -->

                                


                           </div><!-- .preview -->

                        </div><!-- col -->

                    </div><!-- row -->


                    



                    <div class="row">
                        
                        <div class="col-md-6 col-12">



                            <div class="thumb row2">
                                


                                <input type="radio" class="form-control" id="template1" name="idtemplate" value="1" <?php if( $customstyle["idtemplate"] == '1' ){ ?>checked="checked"<?php } ?>>

                            </div><!--thumb row2-->


                            
                                

                        </div><!--col-md-6-->




                        <div class="col-md-6 col-12">




                            <div class="thumb row2">

                                <input type="radio" class="form-control" id="template2" name="idtemplate" value="2" <?php if( $customstyle["idtemplate"] == '2' ){ ?>checked="checked"<?php } ?>>

                            </div><!--thumb row2-->

                                

                        </div><!--col-md-6-->



                    </div><!--row-->































                    <div class="row">
                        
                        <div class="col-md-6 col-12">

                            

                            <div class="thumb row2">

                                <input type="radio" class="form-control" id="template3" name="idtemplate" value="3" <?php if( $customstyle["idtemplate"] == '3' ){ ?>checked="checked"<?php } ?>>

                            </div><!--thumb row2-->



            

                                

                        </div><!--col-md-6-->




                        <div class="col-md-6 col-12">




                            <div class="thumb row2">

                                <input type="radio" class="form-control" id="template4" name="idtemplate" value="4" <?php if( $customstyle["idtemplate"] == '4' ){ ?>checked="checked"<?php } ?>>

                            </div><!--thumb row2-->

                                

                        </div><!--col-md-6-->



                    </div><!--row-->






















                    <div class="row">
                        
                        <div class="col-md-6 col-12">



                            <div class="thumb row2">
                                    
                                <input type="radio" class="form-control" id="template5" name="idtemplate" value="5" <?php if( $customstyle["idtemplate"] == '5' ){ ?>checked="checked"<?php } ?>>

                            </div><!--thumb row2-->

                                

                        </div><!--col-md-6-->




                    <div class="col-md-6 col-12">




                            &nbsp;

                                

                        </div><!--col-md-6-->



                    </div><!--row-->



















                    <div class="row">

                        <div class="col-md-12">

                            <div class="input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard" class="btn btn-danger">Voltar</a>

                            </div><!--row2-->
                            
                        </div><!--col-->

                    </div><!--row-->


                    <div class="row">
                        <div class="col-md-12">
                            
                           <input type="hidden" class="form-control" id="idcustomstyle" name="idcustomstyle" value="<?php echo htmlspecialchars( $customstyle["idcustomstyle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </div><!--col-->
                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->




        <!-- Modal -->
        <div class="modal fade" id="ModalTemplate" tabindex="-1" role="dialog" aria-labelledby="TituloCentralizado" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloCentralizado">Escolha seu Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                

















                <div class="row">
                    
                    <div class="col-md-6 col-12">



                        <div class="thumb row2">
                            


                            <img id="thumb1" data-idtemplate="1" <?php if( $customstyle["idtemplate"] == '1' ){ ?>class="checked"<?php } ?> src="/res/images/template/thumb/<?php echo htmlspecialchars( $templateInfoFullArray["1"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            <span><?php echo htmlspecialchars( $templateInfoFullArray["1"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>


                        </div><!--thumb row2-->


                        
                            

                    </div><!--col-md-6-->




                    <div class="col-md-6 col-12">




                        <div class="thumb row2">

                            <img id="thumb2" data-idtemplate="2" <?php if( $customstyle["idtemplate"] == '2' ){ ?>class="checked"<?php } ?> src="/res/images/template/thumb/<?php echo htmlspecialchars( $templateInfoFullArray["2"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            
                            <span><?php echo htmlspecialchars( $templateInfoFullArray["2"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                        </div><!--thumb row2-->

                            

                    </div><!--col-md-6-->



                </div><!--row-->































                <div class="row">
                    
                    <div class="col-md-6 col-12">

                        

                        <div class="thumb row2">

                            <img id="thumb3" data-idtemplate="3" <?php if( $customstyle["idtemplate"] == '3' ){ ?>class="checked"<?php } ?>src="/res/images/template/thumb/<?php echo htmlspecialchars( $templateInfoFullArray["3"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            
                            <span><?php echo htmlspecialchars( $templateInfoFullArray["3"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div><!--thumb row2-->



        

                            

                    </div><!--col-md-6-->




                    <div class="col-md-6 col-12">




                        <div class="thumb row2">


                            <img id="thumb4" data-idtemplate="4" <?php if( $customstyle["idtemplate"] == '4' ){ ?>class="checked"<?php } ?> src="/res/images/template/thumb/<?php echo htmlspecialchars( $templateInfoFullArray["4"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            
                            <span><?php echo htmlspecialchars( $templateInfoFullArray["4"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                        </div><!--thumb row2-->

                            

                    </div><!--col-md-6-->



                </div><!--row-->






















                <div class="row">
                    
                    <div class="col-md-6 col-12">



                        <div class="thumb row2">
                                
                                <img id="thumb5" data-idtemplate="5" <?php if( $customstyle["idtemplate"] == '5' ){ ?>class="checked"<?php } ?> src="/res/images/template/thumb/<?php echo htmlspecialchars( $templateInfoFullArray["5"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">



                                <span><?php echo htmlspecialchars( $templateInfoFullArray["5"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                            </div><!--thumb row2-->

                                

                        </div><!--col-md-6-->




                    <div class="col-md-6 col-12">




                        &nbsp;

                            

                    </div><!--col-md-6-->



                </div><!--row-->
















              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
    
    </div><!--container-->

</section>
