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
        
        <a class="btn btn-warning" href="<?=base_url()?>/categorias">Categorias</a></p>

    </div>
    <div class="col-md-6 text-right">

    </div>
</div>
<table class="table table-bordered" id="example1">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ud</th>
                      <th>Nombre</th>
                      <th>Nombre corto</th>
                      <th >Reingresar</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($datos as $dato):?>
                    <tr>
                        <td><?= $dato['id']?></td>
                        <td><?= $dato['nombre']?></td>
                 
                        <td><a class="btn btn-primary" href="<?=base_url()?>/categorias/reingresar/<?=$dato['id']?>">Reingresar</a></td>
                       
                        
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

<?= $this->endSection()?>