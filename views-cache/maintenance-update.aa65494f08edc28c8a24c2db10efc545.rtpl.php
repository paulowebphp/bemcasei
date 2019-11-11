<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Manutenção
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">





    <div class="col-md-6 col-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Manutenção</h3>
        </div>
        <!-- /.box-header -->
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
        <!-- form start -->
        <form role="form" action="/481738admin/manutencao/<?php echo htmlspecialchars( $maintenance["idmaintenance"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">

                        
            <div class="form-group">
              <label for="instatus">Status</label>
              <!--<input type="text" class="form-control" id="instatus" name="instatus" value="<?php echo htmlspecialchars( $maintenance["instatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">-->

              <select id="instatus" name="instatus" class="custom-select">
                <option value="0" <?php if( $maintenance["instatus"] == 0 ){ ?>selected<?php } ?>>Aberto</option>
                <option value="1" <?php if( $maintenance["instatus"] == 1 ){ ?>selected<?php } ?>>Fechado</option>
              </select>
            </div>


            
             <div class="form-group">
              <label for="desdescription">Descrição</label>
              <input type="text" class="form-control" id="desdescription" name="desdescription" value="<?php echo htmlspecialchars( $maintenance["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            
            <div class="form-group">
              <input type="hidden" class="form-control" id="idmaintenance" name="idmaintenance" value="<?php echo htmlspecialchars( $maintenance["idmaintenance"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="/481738admin/manutencao">
              
              <button type="button" class="btn btn-danger">Voltar</button>

            </a>
          </div>
        </form>
      </div>
    </div><!--col-->





  </div><!--row-->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->