<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">




    
    section h1{
        color: <?php if( $customstyle["descolor1"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor1"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h2{
        color: <?php if( $customstyle["descolordate"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolordate"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamilydate"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamilydate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h4{
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    section h5{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }
    section h6{
        font-family: <?php if( $customstyle["desfontfamily2"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'OpenSans'<?php } ?>;
    }








    /********************************HEADER*****************************************/
    header .header-title h3{
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

    }
    header #domain-dropdown-menu a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .cart-amount {
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-weight: 700;
    }
    
    header #shopping-item-mobile .shopping-item:hover .product-count {
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header .product-count {
        background: none repeat scroll 0 0 <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    header #menu-condensed i{
        font-size: 30px;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>99<?php }else{ ?>#DD716F<?php } ?>;
    }
    header .bar-close .btn-close {
        background:none;
        border: none;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-size: 22px;
    }
    /********************************HEADER*****************************************/








    /********************************FOOTER*****************************************/

    footer{
        padding: 5% 5% 2% 5%;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        background-color: <?php if( $customstyle["desbgcolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
    }
    footer a{
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer a:hover{
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .bottom-footer p {
      line-height: 24px;
      font-size: 15px;
      padding-top: 20px;
      border-top: 1px solid <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
      color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .footer-title h3{
        font-size: 3rem;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;
    }
    footer .list-group-item{
        margin: 2% 0;
        background: none;
        color: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?>;
    }
    footer .list-group-item:hover{
        background: none;
        color: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?>;
    }
    footer .list-socials a {
      border: <?php if( $customstyle["descolorfooter"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#FFFFFF<?php } ?> 1px solid;
    }
    footer .list-socials a:hover {
      border: <?php if( $customstyle["descolorfooterhover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#F7D9E1<?php } ?> 1px solid;
    }
    /********************************FOOTER*****************************************/







    /***ALBUM,  BESTFRIENDS, EVENTS, MESSAGES, OUTERLISTS, STAKEHOLDERS, VIDEOS, STORE****/
    .alert-domain h1{
        text-align: center;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
        font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

    }
    /***ALBUM,  BESTFRIENDS, EVENTS, MESSAGES, OUTERLISTS, STAKEHOLDERS, VIDEOS, STORE****/











    /********************************DOMAIN*****************************************/
    .dropdown a:hover{
        color: <?php if( $customstyle["descolortexthover"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;

    }
    .section-title hr{
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#171F26<?php } ?>;
    }
    /********************************DOMAIN*****************************************/

















    /****************INDEX, WEDDING, PARTY , EVENTS , MESSAGE, STORE ********************/

    .buttons-wrapper button{
      padding: 10px 34px;
      border-radius: <?php if( $customstyle["desborderradiusbutton"] != '' ){ ?><?php echo htmlspecialchars( $customstyle["desborderradiusbutton"], ENT_COMPAT, 'UTF-8', FALSE ); ?>px<?php }else{ ?>20px<?php } ?>;
      font-family: <?php if( $customstyle["desfontfamily1"] != '' ){ ?>'<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'<?php }else{ ?>'Norican'<?php } ?>;

      <?php if( $customstyle["inbgcolorbutton"] == '0' ){ ?>
      background-color: transparent;
      color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
      border: 1px solid <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;
      <?php }else{ ?>
      background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#DD716F<?php } ?>;;
      color: #FFFFFF;
      border: none;
      <?php } ?>
    }
    /****************INDEX, WEDDING, PARTY , EVENTS , MESSAGE, STORE ********************/















    /********************************STORE 2*****************************************/
    .card-add-cart button{
        font-family: 'OpenSans'!important;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.16), 0 0 12px 0 rgba(0, 0, 0, 0.12);
        border: 0;
        border-radius: 12px;
        padding: 10px 34px;
        color: #fff;
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-cart button:hover{
        color: #fff;
        background-color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>DD<?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-continue button{
        font-family: 'OpenSans'!important;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.16), 0 0 12px 0 rgba(0, 0, 0, 0.12);
        background: #e6e6e6;
        border: 0;
        border-radius: 12px;
        padding: 10px 34px;
        font-size: 0.9rem;
        color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
    }
    .card-add-continue button:hover{
      background: #e1e1e1;
      color: <?php if( $customstyle["descolor2"] != '' ){ ?>#<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>#333333<?php } ?>;
      
    }
    /********************************STORE 2*****************************************/






    
</style>
<?php if( !validatePlanDomain() ){ ?>
<section class="domain">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Confirmação de Presença Desabilitada</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->
    </div>
</section>

<?php }elseif( $user["inplancontext"] == 0 ){ ?>
<section class="domain">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Para liberar as funcionalidades de Confirmação de Presença é necessário adquirir um plano</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->
    </div>
</section>


<?php }else{ ?>









<section class="domain">

    <div class="container-fluid">


        

        <div class="row">
            
            <div class="col-12">


                <div class="section-title">
                        

                    <h3>
                        RSVP
                    </h3>

                    <hr>


                </div><!--section-title-->

                     
               
            </div><!--col-->

        
        </div><!--row-->


     





        <?php if( $rsvpconfig["inclosed"] == 0 ){ ?>

        


        <div class="row">

            <div class="col-12">


                <div class="card-wrapper">


                    <div class="card3 text-left">
                        

          
                        <?php if( $success != '' ){ ?>
                        <div class="bottom3 alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        <?php } ?>


                        <?php if( $error != '' ){ ?>
                        <div class="bottom3 alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        <?php } ?>

                            
                        <form action="/<?php echo htmlspecialchars( $user["desdomain"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/rsvp/confirmacao/<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">





                            <div class="title row">

                                    
                                <div class="col-12">
                                    
                                    <h5>Olá, <strong><?php echo htmlspecialchars( $rsvp["desguest"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, faça a sua confirmação de presença:</h5>

                                </div><!--col-->


                            </div><!--big-body-row-->






                            <div class="body-row row">


                                <div class="col-12">


                                    <label for="nrphone"><span>Telefone</span>
                                    </label>
                                    <input type="text" id="nrphone" name="nrphone">

                                </div><!--col-->   
                                
                            </div><!--big-body-row-->









                            <div class="body-row row">


                                <div class="col-12">


                                    <label for="desemail"><span>E-mail</span>
                                    </label>
                                    <input type="email" id="desemail" name="desemail">

                                </div><!--col-->   
                                
                            </div><!--big-body-row-->







                            <?php if( $rsvpconfig["inchildren"] == 1 ){ ?>
                            <div class="body-row centralizer row">




                                <div class="col-md-6 col-12 inside-row">


                                    <label for="inadultsconfirmed">

                                        <span>Número de Adultos<br><small>(Máximo Permitido:&nbsp; <?php if( $rsvpconfig["inadultsconfig"] == 0 ){ ?><?php echo htmlspecialchars( $rsvp["inmaxadults"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><?php echo htmlspecialchars( $rsvpconfig["inmaxadultsconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>)</small></span>

                                    </label>
                                    
                                    

                                    <div class="input-short bottom1">
                                        
                                        <input type="text" id="inadultsconfirmed" name="inadultsconfirmed">

                                    </div><!--input-short-->


                                    
                                    <span><small>(Considera-se adultos os maiores de <strong><?php echo htmlspecialchars( $rsvpconfig["inchildrenage"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</strong> de idade)</small></span>


                                </div><!--col-->





                                <div class="col-md-6 col-12 inside-row">

                                    <label for="inchildrenconfirmed">
                                        
                                        <span>Número de Crianças<br><small>(Máximo Permitido:&nbsp; <?php if( $rsvpconfig["inchildrenconfig"] == 0 ){ ?><?php echo htmlspecialchars( $rsvp["inmaxchildren"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><?php echo htmlspecialchars( $rsvpconfig["inmaxchildrenconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>)</small></span>

                                    </label>

                                    
                                    <div class="input-short bottom1">
                                
                                        <input type="text" id="inchildrenconfirmed" name="inchildrenconfirmed">

                                    </div><!--input-short-->

                                    <span><small>(Considera-se crianças os menores de <strong><?php echo htmlspecialchars( $rsvpconfig["inchildrenage"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</strong> de idade)</small></span>

                                </div><!--col-->
                                



                            </div><!--row-->







                            <div class="body-row row">


                                <div class="col-12">


                                    <div>
                                    <label for="desadultsaccompanies"><span>Nome dos Acompanhantes Adultos<br><small>(Coloque o nome completo e separe os nomes por vírgula ou ponto e vírgula)</small></span></label>
                                    
                                    </div>
                                    
                                    <textarea rows="5" maxlength="500" id="desadultsaccompanies" name="desadultsaccompanies"></textarea>

                                </div><!--col-->   
                                
                            </div><!--big-body-row-->







                            <div class="body-row row">


                                <div class="col-12">


                                    <div>
                                    <label for="deschildrenaccompanies"><span>Nome dos Acompanhantes Crianças<br><small>(Coloque o nome completo e separe os nomes por vírgula ou ponto e vírgula)</small></span></label>
                                    
                                    </div>
                                    
                                    <textarea rows="5" maxlength="500" id="deschildrenaccompanies" name="deschildrenaccompanies"></textarea>

                                </div><!--col-->   
                                
                            </div><!--big-body-row-->
                            <?php }else{ ?>
                            <div class="body-row row">




                                <div class="col-md-6 col-12 inside-row">


                                    <label for="inadultsconfirmed">

                                        <span>Número de Adultos <br><small>(Máximo Permitido:&nbsp; <?php if( $rsvpconfig["inadultsconfig"] == 0 ){ ?><?php echo htmlspecialchars( $rsvp["inmaxadults"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><?php echo htmlspecialchars( $rsvpconfig["inmaxadultsconfig"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>)</small></span>

                                    </label>
                                    

                                    <div class="input-short">
                                        
                                        <input type="text" id="inadultsconfirmed" name="inadultsconfirmed">

                                    </div><!--input-short-->


                                </div><!--col-->



                                <div class="col-md-6 col-12 inside-row">


                                    <label for="inadultsconfirmed">

                                        <span><?php echo htmlspecialchars( $rsvpconfig["desadultstitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                                    </label>
                                    <br>
                                    <span><small><?php echo htmlspecialchars( $rsvpconfig["desadultsdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></span>


                                </div><!--col-->





                                
                

                            </div><!--row-->







                            <div class="body-row row">


                                <div class="col-12">


                                    <div>
                                    <label for="desadultsaccompanies"><span>Nome dos Acompanhantes Adultos<br><small>(Coloque o nome completo e separe os nomes por vírgula ou ponto e vírgula)</small></span></label>
                                    
                                    </div>
                                    
                                    <textarea rows="5" maxlength="500" id="desadultsaccompanies" name="desadultsaccompanies"></textarea>

                                </div><!--col-->   
                                
                            </div><!--big-body-row-->
                            <?php } ?>


                      

                            

                            <div class="body-footer text-right">


                                <button type="submit" value="Enviar Mensagem"><h4>Confirmar Presença</h4></button>


                            </div><!--big-body-row-->



                        </form>









                                              
                        
                    </div><!--card-->

                </div><!--wrapper-->    

            </div><!--col-->
    
        </div><!--row-->

        

        <?php }else{ ?>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-domain" role="alert">
                    <h1>Confirmação de Presença Encerrada!</h1>
                </div><!--alert-->
            </div><!--col-->
        </div><!--row-->

        <?php } ?>

        
            
            






    </div><!--container-->

</section>
<?php } ?>



















