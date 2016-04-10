
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Unos podataka</h2>
    </div>
</div>

<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Raspored prerade</h5>
                    </div>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Kooperant</th>
                            <th>Vrijeme</th>
                            <th>Količina</th>
                            <th>Randman</th>
                            <th>Akcije</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 0;
                                foreach ($datatable as $row){
                            ?>

                            <tr style="text-align: center;">
                                <td><?php echo $row->ime . " " . $row->prezime ?></td>
                                <td><?= date('H:i:s', $row->vrijeme) ?></td>
                                <td><?= $row->kolicina . " Kg" ?></td>
                                <td><?php if($row->randman == 0) echo 'Unesite podatke'; else echo $row->randman . "%" ?></td>
                                
                                <td>
                                   
                                    <div class="text-center">
                                        <a data-toggle="modal" class="" href="#modal-form-a<?= $i ?>">Prije</a>
                                        /
                                        <a data-toggle="modal" class="" href="#modal-form-b<?= $i ?>">Poslije</a>
                                    </div>
                                    
                                    <div id="modal-form-a<?= $i ?>" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Unos prije prerade</h3>

                                                            <!--<p>Sign in today for more expirience.</p>-->

                                                            <form role="form" method="POST" action="<?= base_url() ?>uljar/prije">
                                                                <input name="kooperant" type="hidden" value="<?= $row->pravi_koop ?>">
                                                                <div class="form-group"><label>Kvaliteta maslina</label> <input name="kvaliteta_prije" type="text" placeholder="Dobro / Loše" class="form-control"></div>
                                                                <div class="form-group"><label>Količina maslina</label> <input name="kolicina_prije" type="text" placeholder="Unesite količinu maslina u kilogramima" class="form-control"></div>
                                                                <!--<div class="form-group"><label>Datum prije prerade maslina</label> <input type="text" placeholder="<?=date("d/m/Y", time())?>" class="form-control datepicker"></div>-->
                                                                <div class="form-group">
                                                                    <label>Vrijeme prije prerade maslina</label> 
                                                                    <input name="vrijeme_prije" type="text" id="single-input" placeholder="<?=date('H:i');?>" class="form-control single-input">
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Spremi</strong></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="modal-form-b<?= $i ?>" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Unos poslije obrade</h3>

                                                            <!--<p>Sign in today for more expirience.</p>-->

                                                            <form role="form" method="POST" action="<?= base_url() ?>uljar/poslije">
                                                                <input name="kooperant" type="hidden" value="<?= $row->pravi_koop ?>">
                                                                <div class="form-group"><label>Kvaliteta ulja</label> <input name="kvaliteta_nakon" type="text" placeholder="Djevičansko / Ekstra djevičansko" class="form-control"></div>
                                                                <div class="form-group"><label>Količina ulja</label> <input name="kolicina_nakon" type="text" placeholder="Unesite količinu ulja u kilogramima" class="form-control"></div>
                                                                <!--<div class="form-group"><label>Datum nakon prerade maslina</label> <input type="text" placeholder="<?=date("d/m/Y", time())?>" class="form-control datepicker"></div>-->
                                                                <div class="form-group">
                                                                    <label>Vrijeme nakon prerade maslina</label> 
                                                                    <input name="vrijeme_nakon" type="text" id="single-input" placeholder="<?=date('H:i');?>" class="form-control single-input">
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Spremi</strong></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>

                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>

                    </div>
                </div>

<br/>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({dateFormat: 'mm/dd/yy'});
        
        $('.single-input').clockpicker({
            placement: 'bottom',
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
