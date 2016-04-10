
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Dobrodošao <?php echo $_SESSION['user']->ime ?></h2>
    </div>
</div>

<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Izvještaj</h5>
                    </div>
                    <div class="ibox-content">
                        
                        <form action="<?= base_url() ?>administrator" method="POST">
                            
                            <div class="form-group">
                                <div class="input-group input-daterange">
                                    <span class="input-group-addon">Početni datum: </span>
                                    <input class="form-control datepicker" name="datum1">
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="input-group input-daterange">
                                    <span class="input-group-addon">Završni datum: </span>
                                    <input class="form-control datepicker" name="datum2">
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="input-group">
                                    <button type="submit" class=" btn btn-primary">Kreiraj izvještaj!</button>
                                </div>
                            </div>
                            
                        </form>    
                        
                        <?php
                            if(isset($kilogrami)) echo $kilogrami;
                        ?>
                            
                    </div>
                </div>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});
        
        $('.single-input').clockpicker({
            placement: 'top',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        
        $('.dataTables-example').dataTable({
                "responsive": true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo base_url() ?>assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
    });
</script>

<style>   
    .clockpicker-popover {
        z-index: 999999;
    }
    
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
