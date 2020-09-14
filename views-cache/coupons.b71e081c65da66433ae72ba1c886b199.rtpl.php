<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Coupons
  </h1>
  <ol class="breadcrumb">
    <li><a href="/481738admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/481738admin/cupons">Cupons</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/481738admin/cupons/adicionar" class="btn btn-success">Criar Cupom</a>

              <div class="box-tools">
                <form action="/481738admin/cupons">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
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
            
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">Data</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Valor Percentual</th>
                    <th>Uso</th>
                    <th>Válido até:</th>
                    <th style="width: 60px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($coupon) && ( is_array($coupon) || $coupon instanceof Traversable ) && sizeof($coupon) ) foreach( $coupon as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo formatDate($value1["dtregister"]); ?></td>
                    <td><?php echo htmlspecialchars( $value1["descouponcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["vlinverse"]*100, ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                    <td><?php if( $value1["inusage"] == 0 ){ ?><strong>Ilimitado</strong><?php }else{ ?>Exclusivo<?php } ?></td>
                    <td><?php echo formatDate($value1["dtexpire"]); ?></td>
                    <td>
                      <a href="/481738admin/cupons/<?php echo htmlspecialchars( $value1["idcoupon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/deletar" onclick="return confirm('Deseja excluir este ítem?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->