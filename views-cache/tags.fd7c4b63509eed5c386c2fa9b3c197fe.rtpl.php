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

                            <?php $counter1=-1;  if( isset($tag["freedom"]) && ( is_array($tag["freedom"]) || $tag["freedom"] instanceof Traversable ) && sizeof($tag["freedom"]) ) foreach( $tag["freedom"] as $key1 => $value1 ){ $counter1++; ?>
                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/freedom/tag/<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/freedom/<?php echo htmlspecialchars( $value1["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->

                            <?php } ?>
                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->








                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #dd716f">Tags de Mesa - Love</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                            <?php $counter1=-1;  if( isset($tag["love"]) && ( is_array($tag["love"]) || $tag["love"] instanceof Traversable ) && sizeof($tag["love"]) ) foreach( $tag["love"] as $key1 => $value1 ){ $counter1++; ?>
                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/love/tag/<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/love/<?php echo htmlspecialchars( $value1["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->

                            <?php } ?>
                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->
















                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #03a9f4">Tags de Mesa - Classic</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                            <?php $counter1=-1;  if( isset($tag["classic"]) && ( is_array($tag["classic"]) || $tag["classic"] instanceof Traversable ) && sizeof($tag["classic"]) ) foreach( $tag["classic"] as $key1 => $value1 ){ $counter1++; ?>
                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/classic/tag/<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/classic/<?php echo htmlspecialchars( $value1["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->

                            <?php } ?>
                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->




















                <div class="row row-tags ">

                    <div class="col-md-12 tag-title">

                        <h3 style="color: #CFB53B">Tags de Mesa - Gold</h3>
                        
                    </div>
                    
                    <div class="col-md-12">

                        <div class="tags-box">

                            <?php $counter1=-1;  if( isset($tag["gold"]) && ( is_array($tag["gold"]) || $tag["gold"] instanceof Traversable ) && sizeof($tag["gold"]) ) foreach( $tag["gold"] as $key1 => $value1 ){ $counter1++; ?>
                                <div class="tag-card">
                                
  
                                    
                                    <div class="tag-card-photo">
                                        
                                        <a target="_blank" href="/res/images/papelaria/gold/tag/<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><img src="/res/images/papelaria/gold/<?php echo htmlspecialchars( $value1["thumb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>

                                    </div>

                                       

                                </div><!--tag-card-->

                            <?php } ?>
                        </div><!--box-->

                    </div><!--col-->
                   
                </div><!--row-->







            </div><!--col-->
        



      
        </div><!--row-->
    
    </div><!--container-->

</section>

