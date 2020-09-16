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



                




                <div class="row card-dash2">





                    <?php if( $bankExists ){ ?>


                    <div class="col-md-7">
                        


                        <div class="row card-dash-row1 padding-header green1">


                                                       



                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content2">
                                        <span title="Sua Carteira"><?php echo htmlspecialchars( $account["desaccountcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                    

                                </div><!--card-dash-field2-->


                            </div><!--col-->







                            





                        </div><!--row-->




                        <div class="row card-dash-row2 padding5">




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




                        

                        <div class="row card-dash-row2 padding5">




                            


                            


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








                        <div class="row card-dash-row2 padding5">









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






                        <div class="row card-dash-row2 padding5">




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






                            <div class="col-md-4 col-12 padding5">

                                <div class="card-dash-field2">


                                    &nbsp;


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                        </div>






                        <div class="row card-dash-row2 padding5">





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



                    <div class="col-md-5 col-12 color2">



                        <div class="row card-dash-row1 padding-header">

                            <div class="col-md-8 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content4">
                                        <span title="ID Conta Bancária"><?php echo htmlspecialchars( $bank["desbankcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>



                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->



                        </div>

                        
                        <div class="row card-dash-row1 padding5">

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



                        <div class="row card-dash-row1 padding5">


                            
                            
                            <div class="col-md-6 col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content">
                                        <span><?php echo htmlspecialchars( $bank["desdocument"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
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








                        
                        <div class="row card-dash-row1 padding5">





                            


                            
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






                        <div class="row card-dash-row1 padding5">


                            
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







                        <div class="row card-dash-row1 padding5">


                    




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







                        <div class="row card-dash-row1 centralizer padding5">


                


                            <div class="button-header">
                                <a title="Editar" href='/dashboard/conta-bancaria/<?php echo setHash($bank["idbank"]); ?>'>
                                    <div class="button9 text-center">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </a>
                            </div> 



                            <div class="button-header">
                                <a title="Apagar" class="del-button" href='/dashboard/conta-bancaria/deletar/<?php echo setHash($bank["idbank"]); ?>' onclick="return confirm('Deseja realmente excluir este ítem?')">
                                    <div class="button5 text-center">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </a>
                            </div>  
                           

        

                            






                            





                        </div><!--row-->

                       



                        


                    
                    
                    
                    </div>



                    <?php }else{ ?>



                    <div class="col-md-7">
                        


                        <div class="row card-dash-row1 padding-header grey1">


                                                       



                            <div class="col-12">

                                <div class="card-dash-field2">


                                    <div class="card-dash-content3">
                                        <span title="Sua Carteira"><?php echo htmlspecialchars( $account["desaccountcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                    </div>


                                   

                                </div><!--card-dash-field2-->


                            </div><!--col-->







                            





                        </div><!--row-->




                        <div class="row card-dash-row2 padding5">




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




                        

                        <div class="row card-dash-row2 padding5">




                            


                            


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








                        <div class="row card-dash-row2 padding5">









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






                        <div class="row card-dash-row2 padding5">




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






                            <div class="col-md-4 col-12 padding5">

                                <div class="card-dash-field2">


                                    &nbsp;


                                </div><!--card-dash-field2-->

                                
                            </div><!--col-->






                        </div>






                        <div class="row card-dash-row2 padding5">





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



                    <div class="col-md-5 col-12 color1 centralizer">


                        <div class="row card-dash-row1">





                            <div class="col-12">
                        
                                <div class="card-dash-field2">
                        
                        
                                    <a href='/dashboard/conta-bancaria/adicionar'>
                                        <div class="button7 text-center">
                                            <i class="fa fa-plus"></i>
                                            <p>Adicionar Conta Bancária</p>
                                        </div>
                                        
                                    </a>  
                                    
                        
                                </div><!--card-dash-field2-->
                        
                                
                            </div><!--col-->
                           
                        
                        
                        
                            
                        
                        
                        
                        
                        
                        
                            
                        
                        
                        
                        
                        
                        </div><!--row-->


                    </div>



                    <?php } ?>




                </div><!--row-->
             












                








            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

