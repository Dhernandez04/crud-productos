<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>

<?= $this->section('card-title')?>
 <?= $titulo ?>

 <?php \Config\Services::validation()->listErrors();?>

<?= $this->endSection()?>
<?= $this->section('contenido')?>

    <form action="<?= base_url()?>/productos/actualizar" method="POST" autocomplete="off">
        <?php csrf_field(); ?>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $producto['id']?>">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Código</label>
                    <input type="text" id="codigo" value="<?= $producto['codigo']?>" autofocus required name="codigo" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre </label>
                    <input type="text" id="nombre" value="<?= $producto['nombre']?>"required name="nombre" class="form-control">
                </div>
            </div>
           
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Unidad</label>
                  <select name="id_unidad"  required class="form-control" id="id_unidad">
                      <option value="">Seleccionar unidad</option>
                      <?php foreach($unidades as $unidad):?>
                        <option value="<?= $unidad['id'] ?>"
                        <?php if($unidad['id']==$producto['id_unidad']){echo 'selected';}?>
                        
                        > <?= $unidad['nombre'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Categoria </label>
                    <select name="id_categoria" required  class="form-control" id="id_categoria">
                        <option value="">Seleccionar categoria</option>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?= $categoria['id']?>"
                        <?php if($categoria['id']==$producto['id_categoria']){echo 'selected';}?>
                        ><?= $categoria['nombre'];?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
           
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Precio venta</label>
                    <input type="text"value="<?= $producto['precio_venta']?>" id="precio_venta" autofocus required name="precio_venta" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Precio Compra </label>
                    <input type="text" value="<?= $producto['precio_compra']?>"id="precio_compra" required name="precio_compra" class="form-control">
                </div>
            </div>
           
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Stock minimo</label>
                    <input type="text"value="<?= $producto['stock_minimo']?>" id="stock_minimo" autofocus required name="stock_minimo" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Es inventariable </label>
                    <select name="inventariable"  required class="form-control" id="inventariable">
                      <option value="1"<?php if($producto['inventariable']==1){echo 'selected';}?>
                        >Si</option>
                      <option value="0"<?php if($producto['inventariable']==0){echo 'selected';}?>>No</option>
                      
                  </select>
                </div>
            </div>
           
        </div>
        <a href="<?= base_url()?>/productos" class="btn btn-info">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</a>
    </form>
<?= $this->endSection()?>