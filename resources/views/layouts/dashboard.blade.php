<!DOCTYPE html>
<html class="light-style layout-menu-fixed">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Project Management Task</title>
  <!-- laravel  token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    @include('layouts.sections.styles')  
    <script>
        window.Laravel = @php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); @endphp
    </script>
</head>
<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.sections.sidebar')
        <!-- Layout page -->
          <div class="layout-page"> 
              <!-- Content wrapper -->
              <div class="content-wrapper">                
                @yield('listcontent')    
              </div>  
              <!-- Content wrapper -->
              <!-- Footer -->            
              @include('layouts.sections.footer')            
              <!-- / Footer -->              
          </div>
    </div>
  </div>
  @include('layouts.sections.scripts')
</body>
</html>
