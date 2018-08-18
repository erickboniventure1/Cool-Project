<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, 
                                initial-scale=1, shrink-to-fit=no">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link href="{{asset('images/fav.png')}}" rel="shortcut icon" type="image">

  <link rel="stylesheet" href="/css/app.css">
  
  <script src="/js/app.js"></script>

  <style>
    body {
      /*background-image: url('/images/furley_bg.png');*/
    }
    div.container {
      text-align: center;
    }
    div>img {
      margin: 110px 0 12px 0;
    }
    .form-control {
      display: inline-block;
      width: auto;
      position: relative;
    }
    .card {
      background: transparent;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  </style>

  <script>
    $(function() {
      $(":text").keydown(function() {
        $(".alert-danger").fadeOut(0);
      });
      $("#password").keydown(function() {
        $(".alert-danger").fadeOut(0);
      });
    });
  </script>

</head>

<body class="app">
  
  <div class="app-body">
    
    <main class="main">
      
      <!-- Main content here -->
            
      <div class="container mt-5 d-flex justify-content-center
                  align-items-center">
        
        <div class="card col-12 col-md-4">
          
          <img class="card-img-top img-rounded" 
            src="{{asset('images/pink_logo.png')}}"
            alt="SheCodes Logo">

          <div class="card-body">
            
            @if ($errors->any())
              <div class="alert alert-danger" style="display: inline-block;">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            
            <form id="login_form" name="login_form" action="{{route('login')}}"
              method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <!-- <label for="username">Username:</label> -->
                <input type="text" id="username" class="form-control"
                  placeholder="username" name="username"
                  value="{{ old('username') }}" autofocus>
              </div>

              <div class="form-group">
                <!-- <label for="password">Password:</label> -->
                <input type="password" id="password" class="form-control"
                  placeholder="password" name="password">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark">
                  Login
                </button>
              </div>

            </form>

          </div>
          
        </div>
        
      </div>
      
    </main>
    
  </div>
  
  <footer class="app-footer d-flex justify-content-center">
    
    <!-- Footer content here -->
    All Rights Reserved &copy; SheCodes {{date('Y')}}
    
  </footer>
  
</body>
</html>
