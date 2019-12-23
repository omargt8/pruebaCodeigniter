<html>
    <head>
        <title>Descargar</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container box">
            <h3 align="center">Importar archivo csv</h3>
            <br/>
            <form method="post" id="import_csv" enctype="multipart/form-data">
                <input type="file" name="csv-file" id="csv-file" required accept=".csv" />
                <br/>
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Importar csv</button>
            </form>
            <br/>
            <div id="imported_csv_data">
            </div>
        </div>

        <br/>
        <a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>
    </body>

    <script>
        $(document).ready(function(){

            load_data();

            function load_data()
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>cproducto/load_data",
                    method:"POST",
                    success:function(data)
                    {
                        $('#imported_csv_data').html(data);
                    }
                })
            }
            $('#import_csv').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"<?php echo base_url(); ?>cproducto/import",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function()
                    {
                        $('#import_csv_btn').html('Importando...');
                    },
                    success:function(data)
                    {
                        alert(data);
                        $('#import_csv')[0].reset();
                        $('#import_csv_btn').attr('disabled', false);
                        $('#import_csv_btn').html('Importacion Realizada');
                        load_data();
                    }
                })
            });
        });
    </script>
</html>