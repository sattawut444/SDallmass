<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Login</title>
  <style>
    body {
      background-color: #0f3ba0;
      /* font-family: 'IBM Plex Sans Thai', sans-serif; */
      font-family: 'Noto Sans Thai', sans-serif;

    }

    ._submit {
      color: #ffff;
      background-color: #040e79;
      --mdb-btn-box-shadow: 0 4px 9px -4px #09159b;

    }

    ._submit:hover {
      color: #ffff;
      background-color: #0314ff;
      --mdb-btn-box-shadow: 0 4px 9px -4px #0122b3 !important;
    }

    ._submit:focus {
      color: #ffff;
      background-color: #0119b3;
      --mdb-btn-box-shadow: 0 4px 9px -4px #011fb3 !important;
    }

    .foemTitle {
      font-weight: 600;
    }

    ._submit:disabled {
      background-color: #0107b3;

    }
  </style>
</head>

<body>
  <input type="hidden" name="server" value="{{ url('') }}">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem; ">
            <div class="card-body p-5 text-center">

              <img src="{{ asset('/image/admin/logo/Group 429.png') }}" title="" class="icon01" width="70%" />


              <form method="post" action="?" id="frmLogin">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4" style="text-align: left">
                  <label class="form-label" for="form1Example13">Username</label>
                  <input type="text" name="username" id="username" class="form-control form-control-lg" />

                </div>
                <div class="er_1"></div>
                <!-- Password input -->
                <div class="form-outline mb-4" style="text-align: left">
                  <label class="form-label" for="form1Example23">Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />

                </div>
                <!-- Submit button -->
                <button onclick="login()" style="width: 100%;" type="button"
                  class="btn btn-success-400 bg-opacity-  btn-lg btn-block _submit">

                  submit

                </button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    function login() {
            let web = $('[name="server"]').val();
            let username = $('#username').val();
            let password = $('#password').val();
            let _token = $('[name="_token"]').val();       
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type: 'POST',
                url: web + '/admin/login',
                datatype: 'json',
                data: {
                  username:username,
                  password:password,
                  _token:_token
                },
                success: function(result) {

                    if (result.status == 1) {   
                      location.href = '/admin/governance/aniti_bribery_and_corruption'; 
                    }
            
              // location.href = '/sd/osotspa-sd/public/admin/governance/aniti_bribery_and_corruption';  
                },
                error: function(error) {
                    console.log(error);
                    // return (false)
                }

                
            });
  // return (found)

        }
  // return false
  </script>
</body>

</html>