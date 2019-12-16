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

                


                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #690782">Tags de Mesa - Freedom</h3>

                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">



                            <div class="tag-card">
                            

                                
                                <div class="tag-card-photo">
                                    
                                    <a target="_blank" href="/res/images/papelaria/freedom/tag/<?php echo htmlspecialchars( $tag["freedom"]["0"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/freedom/<?php echo htmlspecialchars( $tag["freedom"]["0"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                </div>

                                   

                            </div><!--tag-card-->



                            <div class="tag-card">
                            

                                
                                <div class="tag-card-photo tag-card-free" data-toggle="modal" data-target="#ExemploModalCentralizadoTags">
                                    
                                   <img src="/res/images/papelaria/freedom/<?php echo htmlspecialchars( $tag["freedom"]["1"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div>

                                   

                            </div><!--tag-card-->




                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->








                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #dd716f">Tags de Mesa - Love</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                            <div class="tag-card">
                            
                                
                                <div class="tag-card-photo">
                                    
                                    <a target="_blank" href="/res/images/papelaria/love/tag/<?php echo htmlspecialchars( $tag["love"]["0"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/love/<?php echo htmlspecialchars( $tag["love"]["0"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                </div>

                                   

                            </div><!--tag-card-->





                            <div class="tag-card">
                            
                                
                                <div class="tag-card-photo tag-card-free" data-toggle="modal" data-target="#ExemploModalCentralizadoTags">
                                    
                                    <img src="/res/images/papelaria/love/<?php echo htmlspecialchars( $tag["love"]["1"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                </div>

                                   

                            </div><!--tag-card-->





                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->
















                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #03a9f4">Tags de Mesa - Classic</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/classic/tag/<?php echo htmlspecialchars( $tag["classic"]["0"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="/res/images/papelaria/classic/<?php echo htmlspecialchars( $tag["classic"]["0"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->





                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo tag-card-free" data-toggle="modal" data-target="#ExemploModalCentralizadoTags">
                                        
                                        <img src="/res/images/papelaria/classic/<?php echo htmlspecialchars( $tag["classic"]["1"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                    </div>

                                       

                                </div><!--tag-card-->

                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->




















                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #CFB53B">Tags de Mesa - Gold</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/gold/tag/<?php echo htmlspecialchars( $tag["gold"]["0"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/gold/<?php echo htmlspecialchars( $tag["gold"]["0"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->





                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo tag-card-free" data-toggle="modal" data-target="#ExemploModalCentralizadoTags">
                                        
                                        <img src="/res/images/papelaria/gold/<?php echo htmlspecialchars( $tag["gold"]["1"]["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                    </div>

                                       

                                </div><!--tag-card-->


                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->







            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

