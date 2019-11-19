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
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Personalizar Site</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->






                    <div class="row">

                        <div class="col-12">


                              

                            <div class="button-header">


                                <a onclick="return confirm('Deseja realmente voltar às configurações padrão do template? (Atenção: Não é possível reverter esta ação)')"  href="/dashboard/personalizar-site/resetar">

                                    <button>Restaurar Configurações Padrão do Template Atual</button>

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

                                          



                    <div class="row dash-input-row">






                        <div class="col-md-4 col-12 custom-style-row">

                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <form id="dash-form" method="post" action="/dashboard/personalizar-site" enctype="multipart/form-data">

                                    <label for="desbgcolorbanner">Cabeçalho | <small><strong>Cor de Fundo</strong></small></label>

                                    <div>   

                                        <input type="text" class="jscolor form-control" id="desbgcolorbanner" name="desbgcolorbanner" value="<?php echo htmlspecialchars( $customstyle["desbgcolorbanner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        
                                    </div><!--nrddd-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">


                                    <label for="descolor1">Nome do Casal | <small><strong>Cor da Fonte</strong></small></label>
                                    <input type="text" class="jscolor form-control" id="descolor1" name="descolor1" value="<?php echo htmlspecialchars( $customstyle["descolor1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    
                                    

                                </div>

                            </div>
                            

                        </div><!--col-->






                        <div class="col-md-4 col-12 custom-style-row">


                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    <label for="descolordate">Contagem Regressiva | <small><strong>Cor</strong></small></label>
                                    <input type="text" class="jscolor form-control" id="descolordate" name="descolordate" value="<?php echo htmlspecialchars( $customstyle["descolordate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="desfontfamilydate">Contagem Regressiva | <small><strong>Fonte</strong></small></label>

                                    <select style="font-family: '<?php echo htmlspecialchars( $customstyle["desfontfamilydate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'" id="desfontfamilydate" name="desfontfamilydate" class="custom-select">

                                        <option value="Arial" data-fontfamily="Arial" style="font-family: 'Arial'" <?php if( $customstyle["desfontfamilydate"] == 'Arial' ){ ?>selected<?php } ?>>Arial</option>

                                        <option value="Heebo" data-fontfamily="Heebo" style="font-family: 'Heebo'" <?php if( $customstyle["desfontfamilydate"] == 'Heebo' ){ ?>selected<?php } ?>>Heebo</option>

                                        <option value="OpenSans" data-fontfamily="OpenSans" style="font-family: 'OpenSans'" <?php if( $customstyle["desfontfamilydate"] == 'OpenSans' ){ ?>selected<?php } ?>>OpenSans</option>
         
                                        <option value="Poppins" data-fontfamily="Poppins" style="font-family: 'Poppins'" <?php if( $customstyle["desfontfamilydate"] == 'Poppins' ){ ?>selected<?php } ?>>Poppins</option>

                                        <option value="Roboto" data-fontfamily="Roboto" style="font-family: 'Roboto'" <?php if( $customstyle["desfontfamilydate"] == 'Roboto' ){ ?>selected<?php } ?>>Roboto</option>

                                        <option value="Euphoria" data-fontfamily="Euphoria" style="font-family: 'Euphoria'" <?php if( $customstyle["desfontfamilydate"] == 'Euphoria' ){ ?>selected<?php } ?>>Euphoria</option>

                                        <option value="KaushanScript" data-fontfamily="KaushanScript" style="font-family: 'KaushanScript'" <?php if( $customstyle["desfontfamilydate"] == 'KaushanScript' ){ ?>selected<?php } ?>>KaushanScript</option>

                                        <option value="Norican" data-fontfamily="Norican" style="font-family: 'Norican'" <?php if( $customstyle["desfontfamilydate"] == 'Norican' ){ ?>selected<?php } ?>>Norican</option>

                                        <option value="Pacifico" data-fontfamily="Pacifico" style="font-family: 'Pacifico'" <?php if( $customstyle["desfontfamilydate"] == 'Pacifico' ){ ?>selected<?php } ?>>Pacifico</option>

                                        <option value="Satisfy" data-fontfamily="Satisfy" style="font-family: 'Satisfy'" <?php if( $customstyle["desfontfamilydate"] == 'Satisfy' ){ ?>selected<?php } ?>>Satisfy</option>

                                    </select>

                                </div>

                            </div>

                            

                   


                        </div><!--col-->




                        <div class="col-md-4 col-12 custom-style-row">
                            
                            
                            

                            <div class="row row-item">
                                
                                <div class="col-12">

                                    
                                    <label for="inbgcolorgradient">Efeito Esfumaçado | <small><strong>Cabeçalho</strong></small></label>


                                    <select id="inbgcolorgradient" name="inbgcolorgradient" class="custom-select">

                                        <option value="0" <?php if( $customstyle["inbgcolorgradient"] == '0' ){ ?>selected<?php } ?>>Não</option>
                                        <option value="1" <?php if( $customstyle["inbgcolorgradient"] == '1' ){ ?>selected<?php } ?>>Sim</option>

                                    </select>
                                    
                                

                                </div>

                            </div>




                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    &nbsp;
                                

                                </div>

                            </div> 

                        </div><!--col-->




                    </div><!--row-->







































                    <div class="row dash-input-row">






                        <div class="col-md-4 col-12 custom-style-row">

                            <div class="row row-item">
                                
                                <div class="col-12">

                                    <label for="descolor2">Cor Principal | <small><strong>Títulos e Botões</strong></small></label>


                                    <input type="text" class="jscolor form-control" id="descolor2" name="descolor2" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $customstyle["descolor2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    

                                    <label for="desfontfamily1">Fonte Principal | <small><strong>Títulos e Botões</strong></small></label>

                                    <select style="font-family: '<?php echo htmlspecialchars( $customstyle["desfontfamily1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'" id="desfontfamily1" name="desfontfamily1" class="custom-select">


                                        <option data-fontfamily="Euphoria" value="Euphoria" style="font-family: 'Euphoria'" <?php if( $customstyle["desfontfamily1"] == 'Euphoria' ){ ?>selected<?php } ?>>Euphoria</option>

                                        <option data-fontfamily="KaushanScript" value="KaushanScript" style="font-family: 'KaushanScript'" <?php if( $customstyle["desfontfamily1"] == 'KaushanScript' ){ ?>selected<?php } ?>>KaushanScript</option>

                                        <option data-fontfamily="Norican" value="Norican" style="font-family: 'Norican'" <?php if( $customstyle["desfontfamily1"] == 'Norican' ){ ?>selected<?php } ?>>Norican</option>

                                        <option data-fontfamily="Pacifico" value="Pacifico" style="font-family: 'Pacifico'" <?php if( $customstyle["desfontfamily1"] == 'Pacifico' ){ ?>selected<?php } ?>>Pacifico</option>

                                        <option data-fontfamily="Satisfy" value="Satisfy" style="font-family: 'Satisfy'" <?php if( $customstyle["desfontfamily1"] == 'Satisfy' ){ ?>selected<?php } ?>>Satisfy</option>


                                        <option data-fontfamily="Arial" value="Arial" style="font-family: 'Arial'" <?php if( $customstyle["desfontfamily1"] == 'Arial' ){ ?>selected<?php } ?>>Arial</option>

                                        <option data-fontfamily="Heebo" value="Heebo" style="font-family: 'Heebo'" <?php if( $customstyle["desfontfamily1"] == 'Heebo' ){ ?>selected<?php } ?>>Heebo</option>

                                        <option data-fontfamily="OpenSans" value="OpenSans" style="font-family: 'OpenSans'" <?php if( $customstyle["desfontfamily1"] == 'OpenSans' ){ ?>selected<?php } ?>>OpenSans</option>
         
                                        <option data-fontfamily="Poppins" value="Poppins" style="font-family: 'Poppins'" <?php if( $customstyle["desfontfamily1"] == 'Poppins' ){ ?>selected<?php } ?>>Poppins</option>

                                        <option data-fontfamily="Roboto" value="Roboto" style="font-family: 'Roboto'" <?php if( $customstyle["desfontfamily1"] == 'Roboto' ){ ?>selected<?php } ?>>Roboto</option>

                                        

                                    </select>



                                </div>

                            </div>
                            

                        </div><!--col-->






                        <div class="col-md-4 col-12 custom-style-row">


                            <div class="row row-item">
                                
                                <div class="col-12">


                                    <label for="desfontfamily2">Fonte do Texto</label>

                                    <select style="font-family: '<?php echo htmlspecialchars( $customstyle["desfontfamily2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'" id="desfontfamily2" name="desfontfamily2" class="custom-select">

                                        <option data-fontfamily="Arial" value="Arial" style="font-family: 'Arial'" <?php if( $customstyle["desfontfamily2"] == 'Arial' ){ ?>selected<?php } ?>>Arial</option>

                                        <option data-fontfamily="Heebo" value="Heebo" style="font-family: 'Heebo'" <?php if( $customstyle["desfontfamily2"] == 'Heebo' ){ ?>selected<?php } ?>>Heebo</option>

                                        <option data-fontfamily="OpenSans" value="OpenSans" style="font-family: 'OpenSans'" <?php if( $customstyle["desfontfamily2"] == 'OpenSans' ){ ?>selected<?php } ?>>OpenSans</option>
         
                                        <option data-fontfamily="Poppins" value="Poppins" style="font-family: 'Poppins'" <?php if( $customstyle["desfontfamily2"] == 'Poppins' ){ ?>selected<?php } ?>>Poppins</option>

                                        <option data-fontfamily="Roboto" value="Roboto" style="font-family: 'Roboto'" <?php if( $customstyle["desfontfamily2"] == 'Roboto' ){ ?>selected<?php } ?>>Roboto</option>


                                    </select>






                                    
                                    
                                    
                                

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    &nbsp;

                                </div>

                            </div>

                            




                        </div><!--col-->




                        <div class="col-md-4 col-12 custom-style-row">

                            
                            <div class="row row-item">
                                
                                <div class="col-12">


                                    <label for="descolortexthover">Links do Texto | <small><strong>Cor quando o mouse passa por cima</strong></small></label>


                                    <input type="text" class="jscolor form-control" id="descolortexthover" name="descolortexthover" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $customstyle["descolortexthover"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    
                                    &nbsp;


                                </div>

                            </div>
                                

                        </div><!--col-->




                    </div><!--row-->


































                    <div class="row dash-input-row">






                        <div class="col-md-4 col-12 custom-style-row">

                            <div class="row row-item">
                                
                                <div class="col-12">




                                    <label for="inroundborderimage">Imagens Arredondadas | <small><strong>Para Cerimônia e Festa</strong></small></label>


                                    <select id="inroundborderimage" name="inroundborderimage" class="custom-select">

                                        <option value="0" <?php if( $customstyle["inroundborderimage"] == '0' ){ ?>selected<?php } ?>>Não</option>
                                        <option value="1" <?php if( $customstyle["inroundborderimage"] == '1' ){ ?>selected<?php } ?>>Sim</option>

                                    </select>

                                    
                                    
                                    
                                

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    
                                    <label for="desborderimagesize">Espessura da Borda das Imagens: &nbsp;<strong id="border-size"><?php echo htmlspecialchars( $customstyle["desborderimagesize"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></label>


                                    <input type="range"  min="0" max="12" class="form-control" id="desborderimagesize" name="desborderimagesize" value="<?php echo htmlspecialchars( $customstyle["desborderimagesize"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">


                                </div>

                            </div>
                            

                        </div><!--col-->






                        <div class="col-md-4 col-12 custom-style-row">


                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    <label for="desborderradiusbutton">Arredondamento dos Botões: &nbsp;<strong id="border-radius"><?php echo htmlspecialchars( $customstyle["desborderradiusbutton"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></label>


                                    <input type="range"  min="0" max="20" class="form-control" id="desborderradiusbutton" name="desborderradiusbutton" value="<?php echo htmlspecialchars( $customstyle["desborderradiusbutton"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="inbgcolorbutton">Botões</label>


                                    <select id="inbgcolorbutton" name="inbgcolorbutton" class="custom-select">

                                        <option value="0" <?php if( $customstyle["inbgcolorbutton"] == '0' ){ ?>selected<?php } ?>>Claros</option>
                                        <option value="1" <?php if( $customstyle["inbgcolorbutton"] == '1' ){ ?>selected<?php } ?>>Escuros</option>

                                    </select>


                                </div>

                            </div>

                            




                        </div><!--col-->




                        <div class="col-md-4 col-12 custom-style-row">

                            
                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    
                                    <label for="inbordersocial">Redes Sociais | <small><strong>Borda Redonda</strong></small></label>


                                    <select id="inbordersocial" name="inbordersocial" class="custom-select">

                                        <option value="0" <?php if( $customstyle["inbordersocial"] == '0' ){ ?>selected<?php } ?>>Sem Borda</option>
                                        <option value="1" <?php if( $customstyle["inbordersocial"] == '1' ){ ?>selected<?php } ?>>Com Borda</option>

                                    </select>

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    &nbsp;


                                </div>

                            </div>
                                

                        </div><!--col-->




                    </div><!--row-->
















































                    <div class="row dash-input-row">






                        <div class="col-md-4 col-12 custom-style-row">

                            <div class="row row-item">
                                
                                <div class="col-12">

                                     <label for="desbgcolorfooter">Rodapé | <small><strong>Cor de Fundo</strong></small></label>


                                    <input type="text" class="jscolor form-control" id="desbgcolorfooter" name="desbgcolorfooter" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $customstyle["desbgcolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    &nbsp;

                                </div>

                            </div>
                            

                        </div><!--col-->






                        <div class="col-md-4 col-12 custom-style-row">


                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    <label for="descolorfooter">Fonte do Rodapé | <small><strong>Cor</strong></small></label>


                                    <input type="text" class="jscolor form-control" id="descolorfooter" name="descolorfooter" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $customstyle["descolorfooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <label for="descolorfooterhover">Fonte do Rodapé | <small><strong>Cor quando o mouse passa por cima</strong></small></label>


                                    <input type="text" class="jscolor form-control" id="descolorfooterhover" name="descolorfooterhover" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $customstyle["descolorfooterhover"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div>

                            </div>

                            




                        </div><!--col-->




                        <div class="col-md-4 col-12 custom-style-row">

                            
                            <div class="row row-item">
                                
                                <div class="col-12">
                                    
                                    
                                    <div class="dash-input-row input-photo">

                    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="file"></label>

                                            </div>
                                        </div>
                                        <div class="input-rows">
                                            <img class="img-responsive" id="image-preview" src="/uploads/banners/<?php echo htmlspecialchars( $customstyle["desbanner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>

                                        
                                    </div><!--dash-input-row-->

                                </div>

                            </div>



                            <div class="row row-item">

                                <div class="col-12">
                                    
                                    <div class="dash-input-row">
                                        <input type="hidden" class="form-control" id="idcustomstyle" name="idcustomstyle" value="<?php echo htmlspecialchars( $customstyle["idcustomstyle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    </div>




                                    <div class="dash-input-row">
                                        <input type="hidden" class="form-control" id="idtemplate" name="idtemplate" value="<?php echo htmlspecialchars( $customstyle["idtemplate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    </div>


                                </div>

                            </div>
                                

                        </div><!--col-->




                    </div><!--row-->


































                    <div class="row dash-input-row custom-style-row">

                        <div class="col-12">
 
                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard" class="btn btn-danger">Voltar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->

                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

