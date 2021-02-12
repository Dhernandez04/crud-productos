<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>

<?= $this->section('card-title')?>
 <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('contenido')?>

    <form action="<?= base_url()?>/categorias/actualizar" method="POST" autocomplete="off">

        <div class="form-group">
            <div class="row">
                
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="hidden" value="<?= $datos['id']?>" id="id_u" autofocus required name="id" class="form-control">
                    <input type="text" value="<?= $datos['nombre']?>" id="nombre" autofocus required name="nombre" class="form-control">
                </div>
                
            </div>
           
        </div>
        <a href="<?= base_url()?>/categorias" class="btn btn-info">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</a>
    </form>
<?= $this->endSection()?>