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


                

               <form method="post" action="/dashboard/videos/adicionar">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="dash-title">
                                <h1>Adicionar Vídeo</h1>
                            </div><!--dash-title-->

                        </div><!--col-->
                    </div><!--row-->



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
                        
                        <div class="col-md-6 dash-column">



                            <div class="dash-input-row input-date">
                                
                                <div class="input-group mb-3">

                                  <div class="input-group-prepend">

                                    <label class="input-group-text" for="instatus">Visível</label>

                                  </div><!--input-group-prepend-->

                                  <select id="instatus" name="instatus" class="custom-select">

                                    <option value="0">Não</option>
                                    <option value="1" selected>Sim</option>

                                  </select>

                                
                                </div><!--mb-3-->

                            </div><!--dash-input-row-->










                            <div class="dash-input-row input-inposition">

                                <label for="inposition">Posição</label>
                                <input type="text" class="form-control" id="inposition" name="inposition">

                            </div><!--dash-input-row-->





                        


                            <div class="dash-input-row input-date">


                                <label for="desvideo">Título</label>
                                <input type="text" class="form-control" id="desvideo" name="desvideo">


                            </div><!--dash-input-row-->







                            <div class="dash-input-row">

                                <label for="desurl"><abbr title="Cole a URL inteira do YouTube | Exemplo: https://www.youtube.com/watch?v=ethMAfdGgA0" class="required">URL do Video</abbr></label> 
                                <input type="text" class="form-control" id="desurl" name="desurl">

                            </div><!--dash-input-row-->









                            <div class="dash-input-row">

                                <div>
                                    <label for="desdescription">Descrição</label>
                                    <!--<input type="text" class="form-control" id="desdescription" name="desdescription"  ">-->
                                </div>
                                
                                <textarea rows="10" cols="90" maxlength="500" id="desdescription" name="desdescription"></textarea>

                            </div><!--dash-input-row-->










                            




                            

                            


                                   

                        </div><!--col-md-6-->




                        <div class="col-md-6">
                            
                            
                            
                            &nbsp;



                            
                            
                        </div><!--col-md-6-->


                    </div><!--row-->





                    <div class="row">

                        <div class="col-md-6">

                            <div class="dash-input-row input-footer">
                                
                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="/dashboard/videos" class="btn btn-danger">Cancelar</a>

                            </div><!--dash-input-row-->
                            
                        </div><!--col-->



                        <div class="col-md-6">

                            &nbsp;
                            
                        </div><!--col-->



                    </div><!--row-->



                </form>



            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>



