@component('components.master')
@endcomponent
<section class=" bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
<input type="hidden" name="server" value="{{ url('') }}">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Sign up</h2>

              <form>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Name</label>
                  <input type="text" id="name" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Username</label>
                  <input type="text" id="username" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Email</label>
                  <input type="email" id="email" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" id="password" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">                  
                    <label class="form-label" for="form3Example4cdg">Repeat password</label>
                  <input type="password" id="repeat_password" class="form-control form-control-lg" />
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button style="width: 100%; " type="button"
                    class="btn text-white btn-success btn-block btn-lg gradient-custom-4 " onclick="register()">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function register() {
    let web = $('[name="server"]').val();
    let name = $('#name').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let repeat_password = $('#repeat_password').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/register',
        datatype: 'json',
        data: {
            name,
            username,
            email,
            password,
            repeat_password
        },
        success: function(result) { 
            // console.log(result)
            if(result[0].status == 'success')
            location.href = '.' + result[0]['login'];
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>
