<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">





    <div class="menu-main-pages">
        
        <a href="/dashboard" class="list-group-item list-group-item-action">Início</a>

        <a href="/dashboard/meus-dados" class="list-group-item list-group-item-action">Meus Dados</a>


        <a href="/dashboard/meu-plano" class="list-group-item list-group-item-action">Meu Plano</a>

    </div>






    <div class="accordion" id="accordion">


   



        







        <div class="card">

            <div data-toggle="collapse" data-target="#collapseOne" class="card-header btn" id="headingOne">

                    <button>Configurações</button>  

            </div><!--card-hader-->

            <div id="collapseOne" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['dominio','meu-template','personalizar-site','menu','pagina-inicial']) ){ ?> show<?php } ?>" aria-labelledby="headingOne" data-parent="#accordion">

                <div class="card-body card-body-text">

                    <p>
                        
    
                        <a href="/dashboard/dominio" class="list-group-item list-group-item-action">Domínio</a>

                        <a href="/dashboard/meu-template" class="list-group-item list-group-item-action">Meu Template</a>

                        <a href="/dashboard/personalizar-site" class="list-group-item list-group-item-action">Personalizar Site</a>

                        <a href="/dashboard/menu" class="list-group-item list-group-item-action">Menu</a>

                        <a href="/dashboard/pagina-inicial" class="list-group-item list-group-item-action">Página Inicial</a>

                    </p>

                </div><!--card-body-->

            </div><!--collapseOne-->

        </div><!--card-->






        <div class="card">

            <div data-toggle="collapse" data-target="#collapseThree" class="card-header btn collapsed" id="headingThree">

                    <button>Loja</button>

            </div><!--card-header-->

            <div id="collapseThree" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['painel-financeiro','presentes-virtuais','lista-pronta']) ){ ?> show<?php } ?>" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body card-body-text">
                

                        <a href="/dashboard/presentes-virtuais" class="list-group-item list-group-item-action">Presentes Virtuais</a>

                        <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Painel Financeiro</a>



        
                </div><!--card-body-->

            </div><!--collapseThree-->

        </div><!--card-->













        <div class="card">

            <div data-toggle="collapse" data-target="#collapseTwo" class="card-header btn collapsed" id="headingTwo">


                    <button>Meu Casamento</button>


            </div><!--card-header-->

            <div id="collapseTwo" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['meu-casamento','meu-amor','festa-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="headingTwo" data-parent="#accordion">

                <div class="card-body card-body-text">

                        <a href="/dashboard/meu-amor" class="list-group-item list-group-item-action">Meu Amor</a>
                    
                        <a href="/dashboard/meu-casamento" class="list-group-item list-group-item-action">Casamento</a>         
                        
                        <a href="/dashboard/festa-de-casamento" class="list-group-item list-group-item-action">Festa</a>

                          
                        
                </div><!--card-body-->

            </div><!--collapseTwo-->

        </div><!--card-->
   
    


    </div><!--accordion-->







    
    <div class="menu-main-pages">

        <a href="/dashboard/padrinhos-madrinhas" class="list-group-item list-group-item-action">Padrinhos e Madrinhas</a>

        <a href="/dashboard/rsvp" class="list-group-item list-group-item-action">RSVP</a>
    
        <a href="/dashboard/mensagens" class="list-group-item list-group-item-action">Mensagens</a>

        <a href="/dashboard/album" class="list-group-item list-group-item-action">Album</a>
        
        <a href="/dashboard/videos" class="list-group-item list-group-item-action">Vídeos</a>
        
        <a href="/dashboard/eventos" class="list-group-item list-group-item-action">Eventos</a>

        <a href="/dashboard/fornecedores" class="list-group-item list-group-item-action">Fornecedores</a>
        
        
        <a href="/dashboard/listas-de-fora" class="list-group-item list-group-item-action">Listas de Fora</a>

        <a href="/dashboard/social" class="list-group-item list-group-item-action">Redes Sociais</a>

        <a href="/dashboard/tags-papelaria" class="list-group-item list-group-item-action">Tags e Papelaria</a>
        
        
        <!--<a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Tags e Papelaria</a>  -->


    </div><!--menu-main-pages-->



    <div class="accordion" id="accordion14">




        <div class="card">

            <div data-toggle="modal" data-target="#ExemploModalCentralizado" class="card-header btn collapsed disabled-links" id="heading-guide4">


                <button>Guia de Casamento</button>


        </div><!--card-header-->

        <div id="collapse-guide4" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['guia-de-casamento']) ){ ?> show<?php } ?>" aria-labelledby="heading-guide4" data-parent="#accordion">

            <div class="card-body card-body-text">

                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Noivado</a>
                    

                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Padrinhos, Madrinhas, Daminhas e Pajens</a>
                    

                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Planejamento</a>


                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Eventos</a>
                    
                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Listas de Presentes e Confirmação de Presença</a>


                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Cerimonial e Decoração</a>

                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Buffet</a>


                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Roupa, Cabelo e Maquiagem</a>


                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Fotos, Filmagens e DJ</a>



                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Ensaios</a>


                    <a data-toggle="modal" data-target="#ExemploModalCentralizado" class="list-group-item list-group-item-action disabled-links">Lua de Mel</a>


            </div><!--card-body-->

        </div><!--collapse-guide-->

    </div><!--card-->




    

        <div class="card">

            <div data-toggle="collapse" data-target="#collapseFourteen" class="card-header btn collapsed" id="headingFourteen">

                    <button>Termos de Serviço</button>

            </div><!--card-header-->

            <div id="collapseFourteen" class="collapse<?php if( in_array(getUri($_SERVER['REQUEST_URI']) , ['termos-uso','politica-privacidade','termos-lista']) ){ ?> show<?php } ?>" aria-labelledby="headingFourteen" data-parent="#accordion14">
                <div class="card-body card-body-text">
                
                        <a href="/dashboard/termos-uso" class="list-group-item list-group-item-action">Termos de Uso</a>


                        <a href="/dashboard/politica-privacidade" class="list-group-item list-group-item-action">Política de Privacidade</a>

                        <a href="/dashboard/termos-lista" class="list-group-item list-group-item-action">Termos da Lista de Presentes Virtuais</a>
        
                </div><!--card-body-->

            </div><!--collapseFourteen-->

        </div><!--card-->






    </div><!--accordion-->



    <div class="menu-main-pages">

        <a href="/dashboard/central-ajuda" class="list-group-item list-group-item-action">Central de Ajuda</a>
          
        <a href="/dashboard/mudar-senha" class="list-group-item list-group-item-action">Alterar Senha</a>
          
        <a href="/logout" class="list-group-item list-group-item-action">Sair</a>

    </div><!--menu-main-pages-->




</div><!--list-group-->