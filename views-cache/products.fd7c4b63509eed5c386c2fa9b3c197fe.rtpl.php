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




            <div class="col-md-9 col-12">






                <div class="row">
                    
                    <div class="col-12">

                        <a href="/dashboard/presentes-virtuais">
                            <div class="dash-title">
                                <h1>Presentes Virtuais</h1>
                            </div>
                        </a>

                    </div>

                </div>

        

                


                <div class="row">

                    <div class="col-12">

                        <div class="button-header">

                            <a href="/dashboard/presentes-virtuais/configurar">
                                <button>
                                    Configurar
                                </button>
                            </a>


                            <?php if(  $maxProducts > $nrtotal  ){ ?>

                            <a href="/dashboard/presentes-virtuais/adicionar">
                                <button>
                                    Criar Presente
                                </button>
                            </a>


                            <a href="/dashboard/lista-pronta">
                                <button>
                                    Adicionar da Lista Pronta
                                </button>
                            </a>

                            <?php }else{ ?>

                            <button id="popover1" class="disabled-links pointer-none" data-toggle="popover" data-placement="bottom" title="<?php echo htmlspecialchars( $popover1["0"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-content="<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Criar Presente
                            </button>


                            <button id="popover2" class="disabled-links pointer-none" data-toggle="popover" data-placement="bottom" title="<?php echo htmlspecialchars( $popover1["0"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-content="<?php echo htmlspecialchars( $popover1["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Adicionar da Lista Pronta
                            </button>

                            <?php } ?>


                            
                           
                            <?php if( checkDesdomain() ){ ?>
                            <a target="_blank" href="/<?php echo htmlspecialchars( $user["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/loja">
                                <button>
                                    Ver Loja
                                </button>
                            </a>
                            <?php } ?>


                            
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



                




                <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>
                <div class="row card-dash centralizer">

                        
                    <div class="col-md-4 col-12">

                        <div class="card-dash-field">


                             <div class="card-dash-content">
                                <span><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
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
                                <span><?php echo getCategoryName($value1["incategory"]); ?></span>
                            </div>


                            <div class="card-dash-header">
                                <hr>
                                <span>Categoria</span>
                                
                            </div>


                        </div>

                        
                    </div>
                             
                            


                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">


                            <div class="card-dash-content">
                                <span>R$ <?php echo formatPrice($value1["vlprice"]); ?></span>
                            </div>

                            <div class="card-dash-header">

                                <hr>
                                <span>Valor</span>
                                
                            </div>


                        </div>

                        
                    </div>
                            


   

                    

                    <div class="col-md-2 col-12">

                        <div class="card-dash-field">
                            
                            <div class="card-photo">
                                
                                <img src="/uploads/products/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                            </div>
                        </div>
                        


                    </div>


                    <div class="col-md-2 col-12">
                        
                        <div class="card-dash-field">




                                <a href='/dashboard/presentes-virtuais/<?php echo setHash($value1["idproduct"]); ?>'>

                                    <button>Editar</button>

                                </a>
                                


                                <a class="del-button" onclick="return confirm('Deseja realmente excluir este ítem?')"  href='/dashboard/presentes-virtuais/<?php echo setHash($value1["idproduct"]); ?>/deletar'>

                                    <button>Deletar</button>

                                </a>


                               
                            </div><!--card-buttons-wrappe-->

                    </div>







       
                </div>
                <?php }else{ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum presente foi encontrado
                        </div>
                    </div>
                </div>
                <?php } ?>












                    <div class="row">




                        
                        <div class="col-md-3 col-12">

                            <div class="search">

                                <form action="/dashboard/presentes-virtuais">

                                    <div class="input-group input-group-sm">

                                        <a href="/dashboard/presentes-virtuais">
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

