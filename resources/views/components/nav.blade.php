
@php
$post = session('admin_menu');
// dd($post)
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.3.4/photoswipe.min.css"
        integrity="sha512-TdCx5ObKpq3+lwUdiXFgFLhqwTB98YsdaQWSJrwkOz084qaeO86+NMYfU/pnpPo1pDVah0a7yvFmbcvI8ZiGAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<style>
    @media only screen and (min-width: 992px) {
        .bars {
            display: none;
        }
    }
</style>
<style>
    /* Style The Dropdown Button */
    .dropbtn {
      background-color: rgba(43, 91, 224, 0);
      color: rgb(7, 7, 7);
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    
    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      right: 0;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 8px 8px 16px 8px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    /* Links inside the dropdown */
    .dropdown-content a {
      color: rgb(7, 7, 7);
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    /* Change color of dropdown links on hover */
    /* .dropdown-content a:hover {background-color: #f1f1f1} */
    
    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
      background-color: rgba(43, 91, 224, 0.212);
    }
    .bar-nev{

    }
    </style>
    
    <input type="hidden" name="admin_token" value="{{ session('admin_token') }}">
<div class="bar-nev" style="padding: 1% 0%; z-index:-2; height:80px; align-items: center; display: flex; justify-content: space-between; background-color: rgb(5, 24, 78); box-shadow: 3px 3px 3px rgb(167, 160, 160);">
    <div class="logo-image" style="z-index:1; padding:2%">
        <a style="background-color: rgb(5, 24, 78)" class="link_a" href="{{url('/admin/governance/aniti_bribery_and_corruption')}}">
        <img src="{{ asset('/image/admin/logo/Group 429.png') }}" title="" class="icon01" width="170px" />
        </a>
        
    </div>
    <div class="admin" style="display: flex;wwidth:400px;">
        <div class="nav-image-logo;" style="text-align: right;" >
            <div class="dropdown " style="text-align: left"><a style="font-size: 18px; color: aliceblue">{{$post[0]->name}}</a>
                <button class="dropbtn"><img src="{{ asset('/image/icon/users.png') }}" title="" class="icon01" width="30px" /></button>
                <div class="dropdown-content" style=" border-radius: 25px; padding:1% 1% 1% 5px;background-color: rgb(12, 53, 168); color:#ffffff">
                <a >{{$post[0]->group}}</a>
                <a href="{{url('')}}" style="color:#ffffff">ชมเว็บไซต์</a>
                <a onchange="logout()" href="{{url('/admin/login')}}" style="color:#ffffff">ออกจากระบบ</a>
                </div>
              </div>
        </div>
   




    </div>
</div>




</body>
</html>
<script>
    function logout() {
        let web = $('[name="server"]').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: web + '/admin/logout',
            datatype: 'json',
            success: function(result) {
                // location.reload();
                if (result[0][0].status == 0) {
                        result[0][0].errors['username'] ? $('.error-username').html('<p>' + result.errors['username'] + '</p>') : $('.error-username').html('');
                        result[0][0].errors['password'] ? $('.error-password').html('<p>' + result.errors['password'] + '</p>') : $('.error-password').html('');
                    } else {
                        location.href = '.' + result[0]['login'];
                    }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function confirm() {
        Swal.fire({
            title: 'ออกจากระบบ',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                logout();
            }
        });
    }
</script>
