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

                        <a href="/dashboard/lista-pronta">
                            <div class="dash-title">
                                <h1>Lista Pronta</h1>
                            </div>
                        </a>

                    </div>


                </div>



                <div class="row">
                    
                    <div class="col-12">
                
                        <div class="button-header">
                
                            <a title="Voltar" href="/dashboard/presentes-virtuais">
                                <div class="button3 centralizer">
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                            </a>
                
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



                

















                <?php if( $nrtotal > 0 ){ ?>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Nome</th>
                                        <th class="text-center" scope="col">Categoria</th>
                                        <th class="text-center" scope="col">Valor</th>
                                        <th class="text-center" scope="col">Imagem</th>
                                        <th class="text-center" scope="col"></th>
                                        <th class="text-center" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter1=-1;  if( isset($gift) && ( is_array($gift) || $gift instanceof Traversable ) && sizeof($gift) ) foreach( $gift as $key1 => $value1 ){ $counter1++; ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlspecialchars( $value1["desgift"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td class="text-center"><?php echo getCategoryName($value1["incategory"]); ?></td>
                                        <td class="text-center">R$ <?php echo formatPrice($value1["vlprice"]); ?></td>
                                        <td class="text-center">
                                            <div data-toggle="modal" data-target='#modal<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="table-photo"><img src="/uploads/gifts/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></div>
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
                                                            <img src="/uploads/gifts/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href='/dashboard/lista-pronta/adicionar?presente=<?php echo setHash($value1["idgift"]); ?>'>

                                                <button class="button11">Adicionar</button>
            
                                            </a>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target='#modal<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="button11" >Ver Imagem</button>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum ítem foi encontrado
                        </div>
                    </div>
                </div>

                <?php } ?>












                <div class="row">




                    
                    <div class="col-md-3 col-12">

                        <div class="search">

                            <form action="/dashboard/lista-pronta">

                                <div class="input-group input-group-sm">

                                    <a href="/dashboard/lista-pronta">
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

