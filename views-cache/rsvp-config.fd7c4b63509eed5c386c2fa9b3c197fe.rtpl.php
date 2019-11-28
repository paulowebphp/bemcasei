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



                <form id="dash-form" method="post" action="/dashboard/rsvp/configurar">


                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Configurações</h1>
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





                            <div class="rsvpconfig-input-row2">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="inclosed">Encerrar Confirmação de Presença</label>

                                  </div><!--input-group-prepend-->

                                  <select id="inclosed" name="inclosed" class="custom-select">

                                    <option value="1" <?php if( $rsvpconfig["inclosed"] == '1' ){ ?>selected<?php } ?>>Sim</option>
                                    <option value="0" <?php if( $rsvpconfig["inclosed"] == '0' ){ ?>selected<?php } ?>>Não</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--rsvpconfig-input-row-->







                            <div class="rsvpconfig-input-row">
                                


                                <label for="inadultsconfig">Configurar Quantidade Máxima de Adultos para Todos os Convidados<br><small>(Esta opção abrangerá os seus convidados de maneira global)</label>


                                <select id="inadultsconfig" name="inadultsconfig" class="custom-select">

                                    <option value="1" <?php if( $rsvpconfig["inadultsconfig"] == '1' ){ ?>selected<?php } ?>>Sim</option>
                                    <option value="0" <?php if( $rsvpconfig["inadultsconfig"] == '0' ){ ?>selected<?php } ?>>Não</option>

                                </select>

                                

                            </div><!--rsvpconfig-input-row-->






                            <div class="rsvpconfig-input-row2">

                                <label for="inmaxadultsconfig">Quantidade Máxima de Adultos</label>
                                <input type="text" class="form-control input-inposition2" id="inmaxadultsconfig" name="inmaxadultsconfig" value="<?php echo htmlspecialchars( $rsvpconfig["inmaxadultsconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--rsvpconfig-input-row-->









                            <div class="rsvpconfig-input-row">
                                


                                    <label for="inchildren">Permitir Crianças? <br><small>(Se marcar esta opção como "Não", mostraremos uma mensagem aos convidados avisando-os de que não serão permitidas crianças no casamento)</small></label>
    
    
                                    <select id="inchildren" name="inchildren" class="custom-select">
    
                                        <option value="1" <?php if( $rsvpconfig["inchildren"] == '1' ){ ?>selected<?php } ?>>Sim</option>
                                        <option value="0" <?php if( $rsvpconfig["inchildren"] == '0' ){ ?>selected<?php } ?>>Não</option>
    
                                    </select>
    
                                    
    
                                </div><!--rsvpconfig-input-row-->




                            <?php if( $rsvpconfig["inchildren"] == 1 ){ ?>
                            <div class="rsvpconfig-input-row">

                                <label for="inchildrenage">Idade Máxima considerado Criança para o seu Buffet</label>
                                <input type="text" class="form-control input-inposition2" id="inchildrenage" name="inchildrenage" value="<?php echo htmlspecialchars( $rsvpconfig["inchildrenage"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--rsvpconfig-input-row-->





                            <div class="rsvpconfig-input-row">
                                


                                <label for="inchildrenconfig">Configurar Quantidade Máxima de Crianças para Todos os Convidados <br><small>(Esta opção abrangerá os seus convidados de maneira global)</small> </label>


                                <select id="inchildrenconfig" name="inchildrenconfig" class="custom-select">

                                    <option value="1" <?php if( $rsvpconfig["inchildrenconfig"] == '1' ){ ?>selected<?php } ?>>Sim</option>
                                    <option value="0" <?php if( $rsvpconfig["inchildrenconfig"] == '0' ){ ?>selected<?php } ?>>Não</option>

                                </select>

                                

                            </div><!--rsvpconfig-input-row-->








                            <div class="rsvpconfig-input-row2">

                                <label for="inmaxchildrenconfig">Quantidade Máxima de Crianças</label>
                                <input type="text" class="form-control input-inposition2" id="inmaxchildrenconfig" name="inmaxchildrenconfig" value="<?php echo htmlspecialchars( $rsvpconfig["inmaxchildrenconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--rsvpconfig-input-row-->

                            <?php }else{ ?>
                            <div class="rsvpconfig-input-row">

                                <label for="desadultstitle">Título da Mensagem</label>
                                <input type="text" class="form-control" id="desadultstitle" name="desadultstitle" value="<?php echo htmlspecialchars( $rsvpconfig["desadultstitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--rsvpconfig-input-row-->


                            <div class="rsvpconfig-input-row2">

                                <label for="desadultsdescription">Mensagem que aparecerá para os convidados</label>
                                
                                <textarea rows="10" cols="90" maxlength="300" id="desadultsdescription" name="desadultsdescription"><?php echo htmlspecialchars( $rsvpconfig["desadultsdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>

                            </div><!--rsvpconfig-input-row-->
                            <?php } ?>







                            <div class="rsvpconfig-input-row">

                                <input type="hidden" class="form-control" id="idrsvpconfig" name="idrsvpconfig" value="<?php echo htmlspecialchars( $rsvpconfig["idrsvpconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div><!--rsvpconfig-input-row-->





                                

                        </div><!--col-md-6-->





                        <div class="col-md-6">
                            
                            
                            
                            &nbsp;

                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-12">

                            <div class="rsvpconfig-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/rsvp" class="btn btn-danger">Voltar</a>

                            </div><!--rsvpconfig-input-row-->
                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>








