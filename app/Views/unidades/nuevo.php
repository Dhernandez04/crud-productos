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
    
    <form action="<?= base_url()?>/unidades/insertar" method="POST" autocomplete="off">
        <?php csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text"  autofocus  name="nombre" value="<?= set_value('nombre')?>" class="form-control">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre corto</label>
                    <input type="text"  name="nombre_corto" value="<?= set_value('nombre_corto')?>" class="form-control">
                </div>
            </div>
           
        </div>
        <a href="<?= base_url()?>/unidades" class="btn btn-info">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</a>
    </form>
<?= $this->endSection()?>