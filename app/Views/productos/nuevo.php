<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>

<?= $this->section('card-title')?>
 <?= $titulo ?>

 <?php \Config\Services::validation()->listErrors();?>

<?= $this->endSection()?>
<?= $this->section('contenido')?>

    <form action="<?= base_url()?>/productos/insertar" method="POST" autocomplete="off">
        <?php csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Código</label>
                    <input type="text" id="" autofocus required name="codigo" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre </label>
                    <input type="text" id="" required name="nombre" class="form-control">
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
                        <option value="<?= $unidad['id'] ?>"><?= $unidad['nombre'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Categoria </label>
                    <select name="id_categoria" required  class="form-control" id="id_categoria">
                        <option value="">Seleccionar categoria</option>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?= $categoria['id']?>"><?= $categoria['nombre'];?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
           
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Precio venta</label>
                    <input type="text" id="precio_venta" autofocus required name="precio_venta" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Precio Compra </label>
                    <input type="text" id="precio_compra" required name="precio_compra" class="form-control">
                </div>
            </div>
           
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Stock minimo</label>
                    <input type="text" id="stock_minimo" autofocus required name="stock_minimo" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Es inventariable </label>
                    <select name="inventariable"  required class="form-control" id="inventariable">
                      <option value="1">Si</option>
                      <option value="0">No</option>
                      
                  </select>
                </div>
            </div>
           
        </div>
        <a href="<?= base_url()?>/productos" class="btn btn-info">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</a>
    </form>
<?= $this->endSection()?>