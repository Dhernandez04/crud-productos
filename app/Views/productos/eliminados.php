<?= $this->extend('plantilla/layout')?>

<?= $this->section('title')?>
   <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('page-title')?>
 Productos
<?= $this->endSection()?>
<?= $this->section('card-title')?>
  Listado de <?= $titulo ?>
<?= $this->endSection()?>
<?= $this->section('contenido')?>
<div class="row">
    <div class="col-md-6">
        
        <a class="btn btn-warning" href="<?=base_url()?>/productos">Productos</a></p>

    </div>
    <div class="col-md-6 text-right">

    </div>
</div>
<table class="table table-bordered" id="example1">
                  <thead>                  
                    <tr>
                    <th style="width: 10px">id</th>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Existencias</th>
                     
                      <th >Reingresar</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($datos as $dato):?>
                    <tr>
                        <td><?= $dato['id']?></td>
                        <td><?= $dato['codigo']?></td>
                        <td><?= $dato['nombre']?></td>
                        <td><?= $dato['precio_venta']?></td>
                        <td><?= $dato['existencias']?></td>
                        <td><a class="btn btn-primary"data-toggle="modal" title="eliminar registro" data-target="#modal-confirma" data-placement="top" href="#"data-href="<?=base_url()?>/productos/reingresar/<?=$dato['id']?>">Reingresar</a></td>
                       
                        
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <div class="modal fade" id="modal-confirma">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reingresar Registro</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>¿Desea Reingresar este registro?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <a class="btn btn-danger btn-ok">Aceptar</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?= $this->endSection()?>