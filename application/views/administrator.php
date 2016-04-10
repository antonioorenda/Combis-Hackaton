
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
                        
                    <div class="text-center" style="margin-bottom: 15px;">
                        <button data-toggle="modal" class="btn btn-primary" href="#modal-form1">Unesi novu predbilježbu</button>
                        <button data-toggle="modal" class="btn btn-primary" href="#modal-form2">Unesi novog kooperanta</button>
                    </div>
                                

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Kooperant</th>
                            <th>Vrijeme</th>
                            <th>Količina</th>
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
                                
                            </tr>

                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>

                    </div>
                </div>

<div id="modal-form1" class="modal fade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Unos nove predbilježbe</h3>

                                            <!--<p>Sign in today for more expirience.</p>-->

                                            <form role="form" method="POST" action="<?= base_url() ?>administrator/predbiljezba">
                                                <label>Kooperanti</label>
                                                <div class="form-group">
                                                    <select name="kooperant" class="form-control bulkplan_country" required>

                                                            <option selected disabled style="display: none;">Odaberite kooperanta</option>

                                                            <?php   
                                                            if (isset($kooperanti)){
                                                                foreach($kooperanti as $kooperant){
                                                            ?>
                                                            <option value="<?=$kooperant->id?>"><?= $kooperant->ime . " " . $kooperant->prezime ?></option>

                                                        <?php  
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group"><label>Količina maslina</label> <input name="kolicina" type="number" placeholder="Unesite količinu maslina u kilogramima" class="form-control" required></div>
                                                <div class="form-group"><label>Adresa</label> <input name="adresa" type="text" placeholder="Unesite adresu kooperanda" class="form-control" required></div>
                                                <div class="form-group"><label>Mjesto</label> <input name="mjesto" type="text" placeholder="Unesite mjesto kooperanda" class="form-control" required></div>
                                                <div class="form-group"><label>Datum prerade maslina</label> <input name="datum" type="text" placeholder="<?=date("d/m/Y", time())?>" class="form-control datepicker" required></div>
                                                <div class="form-group">
                                                    <label>Vrijeme prerade maslina</label> 
                                                    <input name="vrijeme" type="text" id="single-input" placeholder="<?=date('H:i');?>" class="form-control single-input" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Prijevoz</label> 
                                                    <input type="checkbox" name="prijevoz" value="1" class="">
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
                        
                        <div id="modal-form2" class="modal fade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Unos novog kooperanta</h3>

                                            <!--<p>Sign in today for more expirience.</p>-->

                                            <form role="form" method="POST" action="<?= base_url() ?>administrator/kooperant">
                                                <div class="form-group"><label>Ime</label> <input name="ime" type="text" placeholder="Unesite ime kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Prezime</label> <input name="prezime" type="text" placeholder="Unesite prezime kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Tvrtka</label> <input name="tvrtka" type="text" placeholder="Unesite naziv tvrtke" class="form-control" required></div>
                                                <div class="form-group"><label>OIB</label> <input name="oib" type="number" placeholder="Unesite oib tvrtke" class="form-control" required></div>
                                                <div class="form-group"><label>Adresa</label> <input name="adresa" type="text" placeholder="Unesite adresu kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Mjesto</label> <input name="mjesto" type="text" placeholder="Unesite mjesto kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Fiksni telefon</label> <input name="telefon" type="number" placeholder="Unesite fiksni telefon kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Mobitel</label> <input name="mobitel" type="number" placeholder="Unesite mobitel kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Email</label> <input name="email" type="text" placeholder="Unesite email kooperanta" class="form-control" required></div>
                                                <div class="form-group"><label>Napomena</label> <input name="napomena" type="text" placeholder="Unesite napomenu kooperanta" class="form-control" required></div>
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

<br/>

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
