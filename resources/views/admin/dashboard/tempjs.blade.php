
<!-- jQuery 3.1.1 -->
<script src="{!!asset('duc_admin/plugins/jQuery/jquery-3.1.1.min.js')!!}"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{!!asset('duc_admin/bootstrap/js/bootstrap.min.js')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- FastClick -->
<script src="{!!asset('duc_admin/plugins/fastclick/fastclick.js')!!}"></script>
<!-- AdminLTE App -->
<script src="{!!asset('duc_admin/dist/js/adminlte.js')!!}"></script>
<!-- Sparkline -->
<script src="{!!asset('duc_admin/plugins/sparkline/jquery.sparkline.min.js')!!}"></script>
<!-- jvectormap -->
<script src="{!!asset('duc_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')!!}"></script>
<script src="{!!asset('duc_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')!!}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{!!asset('duc_admin/plugins/slimScroll/jquery.slimscroll.min.js')!!}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{!!asset('duc_admin/plugins/chartjs/Chart.min.js')!!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!!asset('duc_admin/dist/js/pages/dashboard2.js')!!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!!asset('duc_admin/dist/js/demo.js')!!}"></script>
<!-- table -->
<script src="{!!asset('duc_admin/plugins/datatables/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('duc_admin/plugins/datatables/dataTables.bootstrap.min.js')!!}"></script>
<!-- myscrip -->
<script src="{!!asset('duc_admin/dist/js/myscript.js')!!}"></script>

<!-- datatable -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#getIMDB').click(function(){
      var requestData = $('#txtIMDB').val();
      var setMessage = $('#getMessage');
      $.ajax({
        url:'http://www.omdbapi.com/?&apikey=742c37de',
        method:'get',
        data:{i:requestData},
        dataType: 'json',
        success: function(data){
          if(data.Response != 'False'){
            $('input[name="txtTitle"]').val(data.Title);
            $('input[name="txtTitleSEO"]').val(data.Title);
            $('input[name="txtDirec"]').val(data.Director);
            $('input[name="txtYear"]').val(data.Year);
            $('input[name="txtTime"]').val(data.Runtime);
            $('input[name="txtLang"]').val(data.Language);
            $('input[name="txtRat"]').val(data.imdbRating);
            $('input[name="txtDescrip"]').val(data.Plot);
            $('input[name="txtGenre"]').val(data.Genre);
            $('input[name="fimages"]').val(data.Poster);
          }else{
            setMessage.html('Not Found!');
          }
        }
      });
    });
  });
</script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!!asset('duc_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')!!}"></script>
