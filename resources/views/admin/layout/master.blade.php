<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
   @include('admin.includes.head') 
    @yield('css')
</head>
<body>
    {{--<div class="preloader">--}}
        {{--<div class="lds-ripple">--}}
            {{--<div class="lds-pos"></div>--}}
            {{--<div class="lds-pos"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div id="main-wrapper">
       @include('admin.includes.navigation')
       @include('admin.includes.sidebar')
        
       @yield('content')
       @include('admin.includes.footer')

    </div>

    @include('admin.includes.scripts')

        @yield('js')
<script>
$('#remarkview').on('show.bs.modal', function (event) {
    
  var button = $(event.relatedTarget) 
  var lve = button.data('whatever') 
  console.log(lve);
   var route="/leave/remark/"+lve;
   console.log(route);
  $('#modal-body-form').attr('action',route );
  });

  $('#imgview').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) 
    var lve = button.data('value') 
   
     var route='/uploads/gallery/'+lve;
     
    $('#modal-image-id').attr('src',route );
    });

  $( ".number" ).on( "click", function() {
        if($( ".number:checked" ).length > 0)
        {
            $('#btn').prop('disabled', false);
        }
        else
        {
            $('#btn').prop('disabled', true);
        }  
      });
      $('.edit').on('click', function () 
  {
    $('#libview').modal('hide'); //show the modal

  });
  /*$(function ()
{ var e = document.getElementById("image"); 
    $().on('click', function ()
    {
        $(this).width(1000);
    });
});*/
</script>
</body>
</html>
@section('js')

    <script src="{{asset('admin-panel/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/calendar/cal-init.js')}}"></script>

    @endsection