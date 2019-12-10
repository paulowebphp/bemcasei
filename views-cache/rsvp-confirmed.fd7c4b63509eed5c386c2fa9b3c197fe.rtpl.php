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


         
















                <div class="row">
                    
                    <div class="col-12">

                        <a href="/dashboard/rsvp/confirmados">
                            <div class="dash-title">
                                <h1>Lista de Confirmados</h1>
                            </div>

                        </a>
                    </div>

                </div>

        

                <div class="row">

                   <div class="col-12">


                        <div class="account-box-wrapper">
                            <div class="account-box">
                                <div class="account-box-main">
                                    <span><?php echo htmlspecialchars( $numConfirmed, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                </div>

                                <div class="account-box-title">
                                    <?php if( $numConfirmed == 1 ){ ?>
                                        <span>Confirmado</span>
                                    <?php }else{ ?>
                                        <span>Confirmados</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>

               </div>

        

                

                <div class="row">

                    <div class="col-12">

                        <div class="button-header">
                            <?php if(  $numConfirmed > 0  ){ ?>
                                <a href="/dashboard/rsvp/download">
                                    <button>
                                        Baixar Lista de Confirmados em CSV
                                    </button>
                                </a>
                            <?php } ?>

                            <a href="/dashboard/rsvp">
                                <button>
                                    Voltar
                                </button>
                            </a>

                        </div>

                    </div>

                </div>

            



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



                




                <?php $counter1=-1;  if( isset($rsvp) && ( is_array($rsvp) || $rsvp instanceof Traversable ) && sizeof($rsvp) ) foreach( $rsvp as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">

                    <div class="col-md-12 col-12">
                        


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
                                                <span><?php echo htmlspecialchars( $value1["inadultsconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            </div>
        
                                            <div class="card-dash-header">
        
                                                <hr>
                                                <span>Adultos</span>
                                                
                                            </div>
        
        
                                        </div><!--card-dash-field-->
        
                                        
                                    </div><!--col-->
                            
                            

                            <div class="col-md-8 col-12">

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
                                            <span><?php if( $value1["dtconfirmed"] == '' or $value1["dtconfirmed"] == null ){ ?>-<?php }else{ ?><?php echo formatDate($value1["dtconfirmed"]); ?><?php } ?></span>
                                        </div>
    
                                        <div class="card-dash-header">
    
                                            <hr>
                                            <span>Data da Confirmação</span>
                                            
                                        </div>
    
    
                                    </div><!--card-dash-field-->
    
                                    
                                </div><!--col-->
                           







                        </div><!--row-->






                        <?php if( $value1["inchildrenconfigconfirmed"] == 1 ){ ?>
                        <div class="row card-dash-row2">



                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["inchildrenconfirmed"] > 0 ){ ?><?php echo htmlspecialchars( $value1["inchildrenconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Crianças</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->









                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["inchildrenageconfirmed"] > 0 ){ ?><?php echo htmlspecialchars( $value1["inchildrenageconfirmed"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Idade Considerado Criança</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            <div class="col-md-8 col-12">

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






                    




                </div><!--row-->
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhuma confirmação foi encontrada
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/rsvp/confirmados">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/rsvp/confirmados">
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

