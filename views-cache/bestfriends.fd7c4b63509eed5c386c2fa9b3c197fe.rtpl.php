<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

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








                

        

                <?php if(  $maxBestFriends > $nrtotal  ){ ?>

                    <div class="row">

                        <div class="col-9">

                            <div class="dash-title">
                                <h1>Padrinhos e Madrinhas</h1>
                            </div>
    
                        </div>
                   
                        <div class="col-3">
                            <div class="button-header">
                                <a title="Criar Padrinho ou Madrinha" href="/dashboard/padrinhos-madrinhas/adicionar">
                                    <div class="button2 centralizer">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    
                    </div>
                
                <?php }else{ ?>

                <div class="row">
                    
                    <div class="col-12">

                        <div class="dash-title">
                            <h1>Padrinhos e Madrinhas</h1>
                        </div>

                    </div>

                </div>

                <?php } ?>

            



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
 



                




                <?php $counter1=-1;  if( isset($bestfriend) && ( is_array($bestfriend) || $bestfriend instanceof Traversable ) && sizeof($bestfriend) ) foreach( $bestfriend as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash centralizer">

                        
                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                             <div class="card-dash-content">
                                <span><?php echo htmlspecialchars( $value1["inposition"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Posição</span>
                            </div>

                        </div>


                    </div>
                        
                            
                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content">
                                <span><?php echo htmlspecialchars( $value1["desbestfriend"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Nome</span>
                                
                            </div>


                        </div>

                        
                    </div>
                             
                            


                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content">
                                <span><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            </div>

                            <div class="card-dash-header">

                                <hr>
                                <span>Descrição</span>
                                
                            </div>


                        </div>

                        
                    </div>
                            



                     <div class="col-md-2 col-12">

                        <div class="card-dash-field">

                            <div class="card-dash-content">
                                <span><?php if( $value1["instatus"] == 1 ){ ?>Visível<?php }else{ ?>Não-visível<?php } ?></span>
                            </div>

                            <div class="card-dash-header">

                                <hr>
                                <span>Status</span>
                                
                            </div>


                        </div>

                        
                    </div>
                           


              
                            

                    

                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">
                            
                            <div class="card-photo">
                                
                                <img src="/uploads/bestfriends/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div>
                        </div>
                        


                    </div>


                    <div class="col-md-2 col-12">
                        
                        <div class="card-dash-field">




                                <a href='/dashboard/padrinhos-madrinhas/<?php echo setHash($value1["idbestfriend"]); ?>'>

                                    <button>Editar</button>

                                </a>
                                


                                <a class="del-button" onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/padrinhos-madrinhas/<?php echo setHash($value1["idbestfriend"]); ?>/deletar'>

                                    <button>Deletar</button>

                                </a>


                               
                            </div><!--card-buttons-wrappe-->

                    </div>







       
                </div>
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum padrinho ou madrinha foi encontrado
                        </div>
                    </div>
                </div>
                <?php } ?>











            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

