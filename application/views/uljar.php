
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Unos podataka</h2>
    </div>
</div>
<div id="">
    <div class="ibox-content">
        <div class="row">
        <div class="col-lg-12">
            <div class="form-group col-lg-2">
                <select name="bulkplan_country" class="form-control bulkplan_country" required>
                        <option selected disabled style="display: none;">country</option>
                </select>
            </div>
            <div class="form-group col-lg-2">
                <select name="bulkplan_operator" class="form-control bulkplan_operator" required>                        
                    <option selected disabled style="display:none;">operator</option>
                    
                </select>
            </div>
            <div class="form-group col-lg-2">
                <select name="bulkplan_shortcode" class="form-control bulkplan_shortcode" required>
                    <option style="display: none;" selected="" disabled="">shortcode</option>
                    
                </select>
            </div>
            <div class="form-group col-lg-2">
                <select name="bulkplan_app" class="form-control bulkplan_app" required>
                    <option style="display: none;" selected="" disabled="">application</option>
                </select>
            </div>
            <div class="form-group col-lg-2">
                <select name="bulkplan_key" class="form-control bulkplan_key" required>
                    <option style="display: none;" selected="" disabled="">keyword</option>
                    
                </select>
            </div>
            <div class="col-lg-2">
                <div class="form-group input-group" >
                    <input style="z-index: 9999999;" name="bulkplan_date" placeholder="<?=date("Y/m/d", time())?>" class="form-control datepicker bulkplan_date" required/>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div> 
            </div>
            <div class="col-lg-2">
                <div class="form-group input-group clockpicker" data-placement="bottom"  data-autoclose="true">
                    <input type="text" class="form-control bulkplan_time" name="bulkplan_time" placeholder="<?=date('H:i');?>" required>
                    <span class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                </div>
            </div>
            <div class="form-group col-lg-2">
                <input type="number" placeholder="amount" name="bulkplan_amount" class="form-control bulkplan_amount" required>
            </div>
            <div class="form-group col-lg-2">
                <select name="bulkplan_endpoint" class="form-control bulkplan_endpoint" required>
                    <option style="display: none;" selected="" disabled="">endpoint</option>
                   
                </select>
            </div>

            <!--value is message id-->
            <div class="form-group col-lg-2">
                <select name="bulkplan_shortname" class="form-control bulkplan_shortname" required>
                    <option style="display: none;" selected="" disabled="">shortname</option>
                    
                </select>
            </div>
            <div  class="col-lg-2">
                <button style="color: white; background-color: #1ab394;" class="btn btn-primary btn-rounded btn-md col-lg-12 form-control" id="massBulkSubmit" type="submit">Save</button>
            </div>

        </div>
    </div>
    <br/><br/>

  </div>
</div>
<br/>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
        $('.clockpicker').clockpicker();
        $('.dataTables-example').dataTable({
        "pageLength": 100,
        "responsive": false,
        "dom": 'T<"clear">lfrtip',
        "bLengthChange": false,
        "order": [[ 1, "asc" ]],
		"columnDefs": [ { "targets": 0, "orderable": false } ]
        });
    });
</script>