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


                

                <form id="dash-form" method="post" action="/dashboard/menu">


                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Menu</h1>
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

                                    <label class="input-group-text" for="inparty">Festa de Casamento</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inparty" name="inparty" class="custom-select">

                                    <option value="1" <?php if( $menu["inparty"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inparty"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->










                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inbestfriend">Padrinhos e Madrinhas</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inbestfriend" name="inbestfriend" class="custom-select">

                                    <option value="1" <?php if( $menu["inbestfriend"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inbestfriend"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->


















                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inrsvp">Confirmação de Presença</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inrsvp" name="inrsvp" class="custom-select">

                                    <option value="1" <?php if( $menu["inrsvp"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inrsvp"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->










                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inmessage">Mural de Mensagens</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inmessage" name="inmessage" class="custom-select">

                                    <option value="1" <?php if( $menu["inmessage"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inmessage"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->






                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instore">Loja</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instore" name="instore" class="custom-select">

                                    <option value="1" <?php if( $menu["instore"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["instore"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->









                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inevent">Eventos</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inevent" name="inevent" class="custom-select">

                                    <option value="1" <?php if( $menu["inevent"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inevent"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->











                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inalbum">Album</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inalbum" name="inalbum" class="custom-select">

                                    <option value="1" <?php if( $menu["inalbum"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inalbum"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->

















                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="invideo">Vídeos</label>

                                  </div><!--input-group-prepend-->

                                  <select id="invideo" name="invideo" class="custom-select">

                                    <option value="1" <?php if( $menu["invideo"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["invideo"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->















                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instakeholder">Fornecedores</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instakeholder" name="instakeholder" class="custom-select">

                                    <option value="1" <?php if( $menu["instakeholder"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["instakeholder"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->

















                            <div class="dash-input-row input-date">
                                                            
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inouterlist">Outras Listas</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inouterlist" name="inouterlist" class="custom-select">

                                    <option value="1" <?php if( $menu["inouterlist"] == '1' ){ ?>selected<?php } ?>>Visível</option>
                                    <option value="0" <?php if( $menu["inouterlist"] == '0' ){ ?>selected<?php } ?>>Não visível</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->
















                            <div class="dash-input-row">

                                <input type="hidden" class="form-control" id="idmenu" name="idmenu" value="<?php echo htmlspecialchars( $menu["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div>




                                

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

