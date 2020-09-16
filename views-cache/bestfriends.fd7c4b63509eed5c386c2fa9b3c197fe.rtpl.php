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

                        <div class="dash-title">
                            <h1>Padrinhos e Madrinhas</h1>
                        </div>

                    </div>
                </div>



                

        

                


                <?php if(  $maxBestFriends > $nrtotal  ){ ?>

                <div class="row">

                    <div class="col-12">

                        <div class="button-header">

                            <a href="/dashboard/padrinhos-madrinhas/adicionar">
                                <button>
                                    Criar Padrinho ou Madrinha
                                </button>
                            </a>
                        
                        </div>

                    </div>

                </div>

                <?php }else{ ?>

                <div class="row">

                    <div class="col-12">

                        <div class="button-header">

                            
                            <button id="popover1" data-container="body" data-toggle="popover" data-placement="right" data-content='<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="disabled pointer-none">
                                Criar Padrinho ou Madrinha
                            </button>
                        
                        </div>

                    </div>

                </div>

                <?php } ?>

            



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
 









                <?php $counter1=-1;  if( isset($bestfriend) && ( is_array($bestfriend) || $bestfriend instanceof Traversable ) && sizeof($bestfriend) ) foreach( $bestfriend as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">



                    <div class="col-md-7 col-12">
                        


                        <div class="row card-dash-row1">
                            



                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["inposition"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header">
                                        <hr>
                                        <span>Posição</span>
                                    </div>

                                </div><!--card-dash-field-->


                            </div><!--col-->
                        






                            <div class="col-md-6 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desbestfriend"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Nome</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->









                            <div class="col-md-4 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <?php if( $value1["instatus"] == 0 ){ ?>
                                            <span>Não-visível</span>
                                        <?php }elseif( $value1["instatus"] == 1 ){ ?>
                                            <span>Visível</span>
                                        <?php } ?>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Status</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                            





                        </div><!--row-->




                        <div class="row card-dash-row2">





                            
                            
                            

                            <div class="col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Descrição</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->




                    



                        </div><!--row-->




                    </div><!--col-->










                    <div class="col-md-3 col-12 card-dash-row3">
                        

                        <div class="card-dash-field">




                            <div data-toggle="modal" data-target='#modal<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="card-photo">
                                <img src="/uploads/bestfriends/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>

                            




                            <div class="modal fade" id='modal<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>' tabindex="-1" role="dialog" aria-labelledby='<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>Title' aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-photo">
                                            <img src="/uploads/bestfriends/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>


                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->











                    <div class="col-md-2 col-12 card-dash-row3">
                        

                        <div class="card-dash-field">



                            <a href='/dashboard/padrinhos-madrinhas/<?php echo setHash($value1["idbestfriend"]); ?>'>

                                <button class="button1">Editar</button>

                            </a>
                            


                            <a onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/padrinhos-madrinhas/<?php echo setHash($value1["idbestfriend"]); ?>/deletar'>

                                <button class="del-button">Deletar</button>

                            </a>

                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->




                </div><!--row-->
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhuma Padrinho ou Madrinha foi encontrada
                        </div>
                    </div>
                </div>
                <?php } ?>











            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

