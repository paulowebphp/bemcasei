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


         





                <div class="row">
                    
                    <div class="col-12">

                        <a href="/dashboard/sua-carteira">
                            <div class="dash-title">
                                <h1>Sua Carteira</h1>
                            </div>
                        </a>

                    </div>

                </div>

        

                <div class="row">

                    <div class="col-9">
                
                        <div class="button-header">
                
                            <a href="/dashboard/painel-financeiro">
                                <div class="button3 centralizer">
                                    <i class="fa fa-angle-left"></i>
                                </div>
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



                




                <div class="row card-dash">



                    <div class="col-md-7">
                        


                        <div class="row card-dash-row1">


                                                       



                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desaccountcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header4">
                                        <hr>
                                        <span>Conta</span>
                                    </div>

                                </div><!--card-dash-field2-->


                            </div><!--col-->







                            





                        </div><!--row-->




                        <div class="row card-dash-row2">




                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header4">
                                        <hr>
                                        <span>Nome</span>
                                    </div>

                                </div><!--card-dash-field2-->


                            </div><!--col-->


                            


                            






                       
                            

                            





                        </div><!--row-->




                        

                        <div class="row card-dash-row2">




                            


                            


                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <?php if( $account["intypedoc"] == 0 ){ ?>
                                        <span>CPF</span>
                                        <?php }else{ ?>
                                        <span>CNPJ</span>
                                        <?php } ?>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->




                    


                            





                        </div><!--row-->








                        <div class="row card-dash-row2">









                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>E-mail</span>
                                        
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                       
                            

                            





                        </div><!--row-->






                        <div class="row card-dash-row2">




                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span>(<?php echo htmlspecialchars( $account["nrddd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) <?php echo htmlspecialchars( $account["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Telefone</span>
                                        
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                            <div class="col-md-4 col-12">

                                <div class="card-dash-field2">


                                    &nbsp;


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                        </div>






                        <div class="row card-dash-row2">





                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $account["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        <?php echo htmlspecialchars( $account["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        <?php echo htmlspecialchars( $account["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                        <?php echo htmlspecialchars( $account["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Endereço</span>
                                        
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->




                            <div class="col-md-4 col-12">

                                <div class="card-dash-field2">


                                    &nbsp;


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                        </div>




                    </div><!--col-->




                    <div class="col-md-5">



                        <?php if( $bankExists ){ ?>


                            

                        <div class="row card-dash-row1">

                            <div class="col-md-8 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bankName, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Banco</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->

                            <div class="col-md-4 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desbanknumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Código</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->



                        </div>



                        <div class="row card-dash-row1">


                            
                            
                            <div class="col-md-6 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $account["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <?php if( $account["intypedoc"] == 0 ){ ?>
                                        <span>CPF</span>
                                        <?php }else{ ?>
                                        <span>CNPJ</span>
                                        <?php } ?>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->







                            <div class="col-md-6 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <?php if( $bank["desaccounttype"] == 'CHECKING' ){ ?>
                                        <span>Conta Corrente</span>
                                        <?php }else{ ?>
                                        <span>Conta Poupança</span>
                                        <?php } ?>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Tipo</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->
                            



                          

                            





                        </div><!--row-->








                        
                        <div class="row card-dash-row1">





                            


                            
                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    <div class="card-dash-header4">
                                        <hr>
                                        <span>Titular</span>
                                    </div>

                                </div><!--card-dash-field2-->


                            </div><!--col-->






                            





                        </div><!--row-->






                        <div class="row card-dash-row1">


                            
                            <div class="col-md-4 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desagencynumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Agência</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->


                            <div class="col-md-8 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desagencycheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Dígito</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->




                            
                           



                            






                            





                        </div><!--row-->







                        <div class="row card-dash-row1">


                    




                            <div class="col-md-4 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desaccountnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Conta</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->


                            <div class="col-md-8 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desaccountcheck"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>

                                    <div class="card-dash-header4">

                                        <hr>
                                        <span>Dígito</span>
                                    </div>


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->
                           



                            






                            





                        </div><!--row-->







                        <div class="row card-dash-row1">


                


                            <div class="col-md-6 col-12">

                                <div class="card-dash-field2">


                                    <div class="button-header">
                                        <a href='/dashboard/conta-bancaria/editar/<?php echo setHash($bank["idbank"]); ?>'>
                                            <div class="button4 centralizer">
                                                <i class="fa fa-plus"></i><span>Editar</span>
                                            </div>
                                        </a>
                                    </div>  


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->



                            <div class="col-md-6 col-12">

                                <div class="card-dash-field2">


                                    <div class="button-header">
                                        <a href='/dashboard/conta-bancaria/deletar/<?php echo setHash($bank["idbank"]); ?>'>
                                            <div class="button5 centralizer">
                                                <i class="fa fa-plus"></i><span>Deletar</span>
                                            </div>
                                        </a>
                                    </div>  


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->
                           



                            






                            





                        </div><!--row-->







                        <?php }else{ ?>


                        <div class="row card-dash-row1">





                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="button-header">
                                        <a href='/dashboard/conta-bancaria/adicionar/<?php echo setHash($user["iduser"]); ?>'>
                                            <div class="button5 centralizer">
                                                <i class="fa fa-plus"></i><p>Adiconar Conta Bancária</p>
                                            </div>
                                        </a>
                                    </div>  


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->
                           



                            






                            





                        </div><!--row-->



                        <?php } ?>



                        


                    
                    
                    
                    </div>








                </div><!--row-->
             












                








            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

