
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Unos podataka</h2>
    </div>
</div>

<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Podaci o kooperantima</h5>
                    </div>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Kooperant</th>
                            <th>Vrijeme</th>
                            <th>Količina</th>
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
                                <td><?= $row->kolicina ?></td>
                                
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
                                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Sign in</h3>

                                                            <p>Sign in today for more expirience.</p>

                                                            <form role="form">
                                                                <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control"></div>
                                                                <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>
                                                                    <label> <input type="checkbox" class="i-checks"> Remember me </label>
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
                                                        <div class="col-sm-12"><h3 class="m-t-none m-b">Sign in</h3>

                                                            <p>Sign in today for more expirience.</p>

                                                            <form role="form">
                                                                <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control"></div>
                                                                <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>
                                                                    <label> <input type="checkbox" class="i-checks"> Remember me </label>
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

<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Podaci o preradi</h5>
                        </div>
    
                        <div class="ibox-content" style="display: block;">
                           
                            
                            
                        </div>
                        
                        <div class="ibox-content" style="display: block;">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Količina maslina (KG)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kvaliteta maslina</label>
                                    <div class="col-sm-10"><input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Placeholder</label>

                                    <div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>
                                </div>
                               
                            </form>
                        </div>
                    </div>

<br/>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
        $('.clockpicker').clockpicker();
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
