<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>

<?= $this->section('card-title')?>
 <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('contenido')?>

    <?php if(isset($validation)){?>
        <div class="alert alert-danger">
    <?php echo $validation->listErrors(); ?>
       </div>
    <?php } ?>

    <form action="<?= base_url()?>/unidades/actualizar" method="POST" autocomplete="off">

        <div class="form-group">
            <div class="row">
                
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="hidden" value="<?= $datos['id']?>" id="id_u"   name="id" class="form-control">
                    <input type="text" value="<?= $datos['nombre']?>" id="nombre" autofocus name="nombre" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre corto</label>
                    <input type="text" id="nombre_corto" value="<?= $datos['nombre_corto']?>"  name="nombre_corto" class="form-control">
                </div>
            </div>
           
        </div>
        <a href="<?= base_url()?>/unidades" class="btn btn-info">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</a>
    </form>
<?= $this->endSection()?>