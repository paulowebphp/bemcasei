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

                        <a href="/dashboard/fornecedores">
                            <div class="dash-title">
                                <h1>Fornecedores</h1>
                            </div>
                        </a>

                    </div>

                </div>

        

                <?php if(  $maxStakeholders > $nrtotal  ){ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <a href="/dashboard/fornecedores/adicionar">
                                <button>
                                    Criar Fornecedor
                                </button>
                            </a>
                     
                            
                
                        </div>

                    </div>

                </div>

                <?php }else{ ?>

                <div class="row">

                    <div class="col-12">


                        <div class="button-header">

                            <button id="popover1" class="disabled-links pointer-none" data-toggle="popover" data-placement="bottom" title="<?php echo htmlspecialchars( $popover1["0"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-content="<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Criar Fornecedor
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



                




                <?php $counter1=-1;  if( isset($stakeholder) && ( is_array($stakeholder) || $stakeholder instanceof Traversable ) && sizeof($stakeholder) ) foreach( $stakeholder as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash">

                    <div class="col-md-10 col-12">
                        


                        <div class="row card-dash-row1">
                            



                            <div class="col-md-1 col-12">

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
                        






                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["desstakeholder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Evento</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->









                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Categoria</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->







                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Telefone</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->






                            <div class="col-md-3 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $value1["dessite"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header">

                                        <hr>
                                        <span>Site</span>
                                        
                                    </div>


                                </div><!--card-dash-field-->

                                
                            </div><!--col-->







                            <div class="col-md-2 col-12">

                                <div class="card-dash-field">


                                    <div class="card-dash-content">
                                        <span><?php if( $value1["instatus"] == 1 ){ ?>Visível<?php }else{ ?>Não-visível<?php } ?></span>
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
                                        <span>Descrição</span>
                                        
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


                            <a href='/dashboard/fornecedores/<?php echo setHash($value1["idstakeholder"]); ?>'>

                                <button class="button1">Editar</button>

                            </a>
                            


                            <a onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/fornecedores/<?php echo setHash($value1["idstakeholder"]); ?>/deletar'>

                                <button class="del-button">Deletar</button>

                            </a>


                           
                        </div><!--card-buttons-wrappe-->




                    </div><!--col-->




                </div><!--row-->
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum fornecedor foi encontrado
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/fornecedores">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/fornecedores">
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

