<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Cupons
  </h1>
  <ol class="breadcrumb">
    <li><a href="/481738admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/481738admin/cupons">Cupons</a></li>
    <li class="active"><a href="/481738admin/cupons/adicionar">Criar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">





    <div class="col-md-6 col-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Criar Cupom</h3>
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
        <form role="form" action="/481738admin/cupons/adicionar" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="vlpercentage">Valor Percentual</label>
              <input type="number" min="1" max="100" step="1" class="form-control" id="vlpercentage" name="vlpercentage" placeholder="">
            </div>
            
            <!--<div class="form-group">
              <label for="inusage">Uso</label>
              <input type="number" min="0" max="1" step="1" class="form-control" id="inusage" name="inusage" placeholder="">
            </div>-->

            <div class="form-group">
              <label for="inusage">Uso</label>

              <select id="inusage" name="inusage" class="custom-select">

                <option value="0" selected>Ilimitado</option>
                <option value="1">Exclusivo</option>

              </select>
            </div>

            <!--<div class="form-group">
              <label for="dtexpire">Expira Em (Dias)</label>
              <input type="number" min="1" max="180" step="1" class="form-control" id="dtexpire" name="dtexpire" placeholder="">
            </div>-->
            
             <div class="form-group">
              <label for="dtexpire">Expira</label>
              <input type="date" class="form-control" id="dtexpire" name="dtexpire" placeholder="">
            </div>
            <div class="form-group">
              <label for="desdescription">Descrição</label>
              <textarea rows="5" cols="90" maxlength="500" id="desdescription" name="desdescription"></textarea>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="/481738admin/cupons">
              
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