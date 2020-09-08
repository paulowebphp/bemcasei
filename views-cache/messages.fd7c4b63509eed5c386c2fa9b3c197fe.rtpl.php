<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="dashboard">

    <div class="container-fluid">            
            

            
        <div class="row">

                


            <div class="col-md-3 col-12 dash-menu">


                <?php if( $user["inplancontext"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-free");?>

                
                <?php }elseif( $user["incheckout"] == 0 ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-nocheckout");?>
                

                <?php }elseif( !$validate ){ ?>

                    <?php require $this->checkTemplate("dashboard-menu-expirated");?>
                

                <?php }else{ ?>

                    <?php require $this->checkTemplate("dashboard-menu");?>

                <?php } ?>
                    

            </div><!--col-->




            <div class="col-md-9 col-12 dash-panel">





                <div class="row">
                    
                    <div class="col-12">

                        <a href="/dashboard/mensagens">
                            <div class="dash-title">
                                <h1>Mensagens</h1>
                            </div>
                        </a>

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




                <div class="row">

                   <div class="col-12">


                        <div class="account-box-wrapper">
                            <div class="account-box">
                                <div class="account-box-main">
                                    <span><?php echo htmlspecialchars( $nrtotal, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                </div>

                                <div class="account-box-title">
                                    <?php if( $nrtotal > 1 ){ ?>
                                        <span>Mensagens</span>
                                            <br>
                                        <span>Recebidas</span>
                                    <?php }else{ ?>
                                        <span>Mensagem</span>
                                            <br>
                                        <span>Recebida</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>

               </div>

            



                


                




                <?php $counter1=-1;  if( isset($message) && ( is_array($message) || $message instanceof Traversable ) && sizeof($message) ) foreach( $message as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">

                    <div class="col-md-10 col-12">
                        


                        <div class="row card-dash-row1">
                            



                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo formatDate($value1["dtregister"]); ?></span>
                                    </div>


                                    <div class="card-dash-header">
                                        <hr>
                                        <span>Data</span>
                                    </div>

                                </div><!--card-dash-field-->


                            </div><!--col-->
                        






                            <div class="col-md-6 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desmessage"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
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
                                            <span class="message-moderate">Não-visível</span>
                                        <?php }elseif( $value1["instatus"] == 1 ){ ?>
                                            <span class="message-approve">Visível</span>
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
                            
                            

                            <div class="col-md-8 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Mensagem</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->





                            <div class="col-md-4 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>E-mail</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->


                            

                    



                        </div><!--row-->




                    </div><!--col-->






                    <div class="col-md-2 col-12 card-dash-row3">
                        

                        <div class="card-dash-field">


                            <?php if( $value1["instatus"] == 0 ){ ?>
                                <a class="message-approve" href='/dashboard/mensagens/<?php echo setHash($value1["idmessage"]); ?>/aprovar'>

                                    <button>Aprovar</button>

                                </a>
                            <?php }elseif( $value1["instatus"] == 1 ){ ?>
                                <a class="message-moderate" href='/dashboard/mensagens/<?php echo setHash($value1["idmessage"]); ?>/moderar'>

                                    <button>Moderar</button>

                                </a>
                            <?php } ?>


                            <a class="del-button" onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/mensagens/<?php echo setHash($value1["idmessage"]); ?>/deletar'>

                                <button>Deletar</button>

                            </a>


                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->




                </div><!--row-->
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhuma mensagem foi recebida
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/mensagens">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/mensagens">
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

