
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('assetsadmin/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assetsadmin/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('assetsadmin/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
<button class="badge badge-success" onclick="curEdit(6)"><i class="glyphicon glyphicon-pencil"></i>Edit</button>

    <!-- PAKE MODAL KURIKULUM TAPI KAYA TAI -->
    <script type="text/javascript">
      var save_method; //for save method string

      function curEdit(id) {
        save_method = 'update';
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
          url: "/med/curEdit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-edit').modal('show'); // show bootstrap modal when complete loaded
          },

          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax' + ' and ' + jqXHR + ' and ' + textStatus + ' and ' + errorThrown);
          }
        });
      }

      function save() {
        $('#btnSave').text('Saved'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;
        if (save_method == 'add') {
          url = "/med/edit";
        } else {
          url = "/med/edit";
        }

        // ajax adding data to database
        $.ajax({
          url: url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data) {
            if (data.status) {
              toastr.success('Item Created Successfully.', 'Success Alert', {
                timeOut: 500
              });
              //if success close modal and reload ajax table
              $('#modal_form').modal('hide');
              location.reload(); // for reload a page

            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable 

          }
        });
      }
    </script>

    <div class="clearfix"></div>
    <div class="row">
      <div id="modal-edit" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" id="form" class="form-horizontal">
              <div class="modal-body">
                <input type="hidden" readonly value="" name="id" class="form-control"> <br>
                <div class="form-group">
                  <br><label>COURSE CODE</label><br>
                  <div class='col-md-9'><input type="text" name="name" autocomplete="off" required class="form-control"></div>
                  
                </div>
                <br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="save()" id="btnSave">Save</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

