<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('page-title')?>
 Categorias
<?= $this->endSection()?>
<?= $this->section('card-title')?>
  Listado de <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('contenido')?>
<div class="row">
    <div class="col-md-6">
        <p><a class="btn btn-info" href="<?=base_url()?>/categorias/nuevo">Agregar</a>
        <a class="btn btn-warning" href="<?=base_url()?>/categorias/eliminados">Eliminados</a></p>

    </div>
    <div class="col-md-6 text-right">

    </div>
</div>
<table class="table table-bordered" id="example1">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Nombre</th>
                  
                      <th >Editar</th>
                      <th >Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($datos as $dato):?>
                    <tr class="p-0">
                        <td><?= $dato['id']?></td>
                        <td><?= $dato['nombre']?></td>
                       
                        <td><a class="btn btn-primary" href="<?=base_url()?>/categorias/editar/<?=$dato['id']?>">Editar</a></td>
                        <td><a class="btn btn-danger" href="<?=base_url()?>/categorias/eliminar/<?=$dato['id']?>">Eliminar</a></td>
                        
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

<?= $this->endSection()?>