<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>CSV</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>

        

        <div class="container" style="margin-top:50px">    
             <br>
             
             <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success') == TRUE): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
             
            
                <form method="post" action="<?php echo base_url() ?>csv/importcsv" enctype="multipart/form-data">
                    <input type="file" name="userfile" ><br><br>
                    <input type="submit" name="submit" value="SUBIR" class="btn btn-primary">
                </form>
            
            <br><br>
            <table class="table table-striped table-hover table-bordered">
                <caption>Productos</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($addressbook == FALSE): ?>
                        <tr><td colspan="4">No hay datos en la tabla</td></tr>
                    <?php else: ?>
                        <?php foreach ($addressbook as $row): ?>
                            <tr>
                                <td><?php echo $row['id_producto']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td><?php echo $row['cantidad']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <br />
            <a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>
        </div>



    </body>
</html>
