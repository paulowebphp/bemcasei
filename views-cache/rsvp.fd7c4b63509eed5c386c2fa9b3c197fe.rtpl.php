<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


            <?php if( !$validate ){ ?>

				<?php if( $user["incheckout"] == 0 or $user["inaccount"] == 0 ){ ?>

					<?php require $this->checkTemplate("dashboard-menu-noorders");?>

				<?php }else{ ?>

					<?php require $this->checkTemplate("dashboard-menu-expirated");?>

				<?php } ?>

			<?php }elseif( $validate["incontext"] == 0 ){ ?>

				<?php require $this->checkTemplate("dashboard-menu-free");?>

			<?php }else{ ?>

				<?php require $this->checkTemplate("dashboard-menu");?>

			<?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">


         
















                <div class="row">
                    
                    <div class="col-12">

                        <a href="/dashboard/rsvp">
                            <div class="dash-title rsvp">
                                <h1>RSVP <small>Confirmação de Presença</small></h1>
                            </div>
                        </a>

                    </div>

                </div>

        

                <div class="row">

                    <div class="col-12">

                        <div class="button-header hr1">

                            
                            <a href="/dashboard/rsvp/configurar">
                                <button class="bottom1">
                                    Configurações
                                </button>
                            </a>


                            <a href="/dashboard/rsvp/confirmados">
                                <button class="bottom1">
                                    Lista de Confirmados
                                </button>
                            </a>

                            <?php if(  $maxRsvp > $nrtotal  ){ ?>

                            <hr><br>

                            <a href="/dashboard/rsvp/adicionar">
                                <button class="bottom1">
                                    Adicionar Convidado Manualmente
                                </button>
                            </a>

                            <a href="/dashboard/rsvp/upload">
                                <button class="bottom1">
                                    Adicionar Convidados A Partir de Lista
                                </button>
                            </a>

                            <?php }else{ ?>

                            <hr><br>

                            <button id="popover1" class="disabled-links pointer-none" data-toggle="popover" data-placement="bottom" title="<?php echo htmlspecialchars( $popover1["0"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-content="<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Adicionar Convidado
                            </button>
                            
                            <?php } ?>

                            <?php if(  $nrtotal > 0  ){ ?>

                            <!--
                            <hr><br>

                            <a href="/dashboard/rsvp/enviar">
                                <button class="bottom1">
                                    Enviar RSVP
                                </button>
                            </a>

                            <a href="/dashboard/rsvp/adiar">
                                <button class="bottom1">
                                    Adiar Casamento
                                </button>
                            </a>
                            -->

                            <?php } ?>
                            
                
                        </div>

                    </div>

                </div>


            



                <?php if( $success != '' ){ ?>
                <div class="row centralizer">
                    <div class="col-md-8 col-12">
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
                <div class="row centralizer">
                    <div class="col-md-8 col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> 
                </div>  
                <?php } ?>



                




                <?php $counter1=-1;  if( isset($rsvp) && ( is_array($rsvp) || $rsvp instanceof Traversable ) && sizeof($rsvp) ) foreach( $rsvp as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">

                    <div class="col-md-10 col-12">
                        


                        <div class="row card-dash-row1">
                            



                            <div class="col-md-5 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desguest"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header">
                                        <hr>
                                        <span>Nome</span>
                                    </div>

                                </div><!--card-dash-field-->


                            </div><!--col-->
                        






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["nrphone"] == '' or $value1["nrphone"] == null ){ ?>-<?php }else{ ?><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Telefone</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            






                            <div class="col-md-4 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["desemail"] == '' or $value1["desemail"] == null ){ ?>-<?php }else{ ?><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>E-mail</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                        </div><!--row-->





















                        <div class="row card-dash-row2">
                            
                








                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["inadultsconfirmed"] > 0 ){ ?><?php echo htmlspecialchars( $value1["inadultsconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>

                                        <?php if( $value1["inconfirmed"] == '0' ){ ?>
                                            <span>Adultos<br><small>(máx. <?php echo getMaxAdults($value1["inmaxadults"],$rsvpconfig["inadultsconfig"],$rsvpconfig["inmaxadultsconfig"]); ?>)</small></span>
                                        <?php }else{ ?>
                                            <span>Adultos</span>
                                        <?php } ?>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->







                            <div class="col-md-5 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["desadultsaccompanies"] == '' or $value1["desadultsaccompanies"] == null ){ ?>-<?php }else{ ?><?php echo htmlspecialchars( $value1["desadultsaccompanies"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Nomes dos Acompanhantes Adultos</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->









                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["inconfirmed"] == 0 ){ ?>Não<?php }else{ ?>Sim<?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Confirmado?</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                            






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["dtconfirmed"] == '' or $value1["dtconfirmed"] == null ){ ?>-<?php }else{ ?><?php echo formatDate($value1["dtconfirmed"]); ?><?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Data da Confirmação</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                        </div><!--row-->





                        <?php if( $value1["inchildrenconfigconfirmed"] == 1 or $rsvpconfig["inchildren"] == 1 ){ ?>
                        <div class="row card-dash-row2">
                            
                            

                                <div class="col-md-3 col-12">

                                        <div class="card-dash-field">
        
        
                                            <div class="card-dash-content">
                                                <span><?php if( $value1["inchildrenconfirmed"] > 0 ){ ?><?php echo htmlspecialchars( $value1["inchildrenconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?></span>
                                            </div>
        
                                            <div class="card-dash-header">
        
                                                <hr>
                                                
        
                                                <?php if( $value1["inconfirmed"] == '0' ){ ?>
                                                    <span>Crianças<br><small>(máx. <?php echo getMaxChildren($value1["inmaxchildren"],$rsvpconfig["inchildrenconfig"],$rsvpconfig["inmaxchildrenconfig"]); ?>)</small></span>
                                                <?php }else{ ?>
                                                    <span>Crianças</span>
                                                <?php } ?>
                                                
                                            </div>
        
        
                                        </div><!--card-dash-field-->
        
                                        
                                    </div><!--col-->
        
        
        
        
                                    <div class="col-md-3 col-12">
        
                                        <div class="card-dash-field">
        
                                            <?php if( $value1["inconfirmed"] == '0' ){ ?>
                                            <div class="card-dash-content">
                                               
                                                <span><?php echo htmlspecialchars( $rsvpconfig["inchildrenage"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                                
                                            </div>
        
                                            <div class="card-dash-header">
        
                                                <hr>
                                                <span>Idade Considerado Criança</span>
                                                
                                            </div>
                                            <?php }else{ ?>
                                                
        
        
        
        
                                            <div class="card-dash-content">
                                            
                                                <span><?php echo htmlspecialchars( $value1["inchildrenageconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                                
                                            </div>
        
                                            <div class="card-dash-header">
        
                                                <hr>
                                                <span>Idade Considerado Criança (Confirmado)</span>
                                                
                                            </div>
                                            <?php } ?>
        
        
                                        </div><!--card-dash-field-->
        
                                        
                                    </div><!--col-->





                            <div class="col-md-6 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["deschildrenaccompanies"] == '' or $value1["deschildrenaccompanies"] == null ){ ?>-<?php }else{ ?><?php echo htmlspecialchars( $value1["deschildrenaccompanies"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Nomes dos Acompanhantes Crianças</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->





                        </div><!--row-->
                        <?php } ?>

                        



                    </div><!--col-->






                    <div class="col-md-2 col-12 card-dash-row3">
                        

                        <div class="card-dash-field">


                            <?php if( $value1["inconfirmed"] == 0 ){ ?>
                                <a href='/dashboard/rsvp/<?php echo setHash($value1["idrsvp"]); ?>'>

                                    <button class="button1">Editar</button>

                                </a>
                            <?php } ?>


                            <a onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/rsvp/<?php echo setHash($value1["idrsvp"]); ?>/deletar'>

                                <button class="del-button">Deletar</button>

                            </a>


                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->




                </div><!--row-->
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum convidado foi encontrado
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/rsvp">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/rsvp">
                                            <button type="button" class="btn btn-default">

                                                <i class="fa fa-undo"></i>

                                            </button>
                                        </a>
                                        
                                        <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                        <div class="input-group-btn">

                                            <button type="submit" class="btn btn-default">

                                                <i class="fa fa-search"></i>

                                            </button>

                                        </div><!--input-group-btn--->

                                    </div><!--input-group-->

                                </form>
                                
                            </div><!--search-->

                        </div><!--col-->





                        <div class="col-md-9 col-12">

                            <div class="pagination">
                                
                                <ul>
                                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                                        <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>                             
                                                               
                                    <?php } ?>
                                </ul>

                            </div>

                        </div><!--col-->





                        

                    </div><!--row-->
























            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

