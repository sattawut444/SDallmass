@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
<input type="hidden" name="server" value="{{ url('') }}">
<input type="hidden" name="id" value="{{ url('') }}">
<div class="sd-menu-box" style="justify-content: space-between;">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"style=" font-family: 'Noto Sans Thai', sans-serif;" style="background-color: rgb(7, 28, 85);">
        <div class="position-sticky" style=" display: flex; background-color: rgb(7, 28, 85); ">
         
                @component('components.menu')
                @endcomponent
            

            <main class=" pt-4  mdb-docs-layout" style="width: 100%;padding:2%; height:150vh; background-color: rgb(255, 255, 255);" >
                
                <div class="container  mt-3 shadow-lg" style="background-color: white; padding:2%; border-radius: 10px; ">
                    <div class="container-fluid">
                        
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            {{-- <img src="{{ asset('/image/icon/add1.png') }}" title="" class="icon01"  width='50'/> --}}
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(84, 82, 82);">แก้ไขผู้ใช้งาน</h1>
                            {{-- <div>
                                <a href="http://127.0.0.1:8000/admin/governance">
                                    <button class="ripple ripple-surface btn btn-rounded" style="color: white; background-color: rgb(184, 190, 184);" role="button"
                                        fdprocessedid="z4lstl">ย้อนกลับ</button>
                                </a>
                            </div> --}}
                        </div>
                        <div class="card shadow mb-4">
                            <form class="row g-3" style="margin: 2% 16%">
                                <input type="hidden" name="id" value="{{ url('') }}">
                                <div class="col-12">
                                    <img src="{{ asset('/image/icon/user1.png') }}" title="" style="margin:0% 43%" class="icon01"  width='100px'/>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="ids" value="{{$post[0]->id}}">
                                    <label for="inputAddress" class="form-label">ชื่อ</label>
                                    <input type="name" name="name" class="form-control" id="name" value="{{$post[0]->name}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">อีเมล</label>
                                    <input type="name" name="email" class="form-control" id="email" value="{{$post[0]->email}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="name" name="phone" class="form-control" id="phone" value="{{$post[0]->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">หมายเหตุ</label>
                                    <textarea class="form-control" name='detail' id="detail" placeholder="{{$post[0]->tex}}" rows="3"></textarea>
                                  </div>
                                  <div class="col-12">
                                    <label for="inputAddress" class="form-label">ชื่อผู้ใช้งาน</label>
                                    <input type="name" name="username" class="form-control" id="username" value="{{$post[0]->username}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" id="password" value="{{$post[0]->password}}">
                                </div>
                                <div class="col-12" >
                                    <label for="inputAddress" class="form-label">เลือกบทบาท</label>
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option value="{{$post[0]->group_id}}">{{$post[0]->group}}</option>
                                        <option value="1" id="op1">Super Admin</option>
                                        <option value="2" id="op1">เจ้าหน้าที่ ดูแลระบบเว็บไซต์</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                        <button type="button" class="btn text-white" style=" width: 12%;background-color: #FFA200;"
                                            onclick="create()">Saves</button>
                                    <a href="/sd/osotspa-sd/public/admin/admin_user">
                                        <button type="button" class="btn text-white" style="width: 12%; background-color: rgb(184, 178, 178);">Cancel</button>
                                    </a>
                                </div>
                            </form>
                            <div class="card-footer" style="background-color: rgba(0, 0, 0, 0.805);">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination mb-0">

                                    </ul>
                                </nav>
                            </div>
                        </div><br>

                    </div>
                </div>
            </main>
        </div>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function create() {
    let web = $('[name="server"]').val();
    let id = $('[name="ids"]').val();
    let name = $('[name="name"]').val();
    let email = $('[name="email"]').val();
    let phone = $('[name="phone"]').val();
    let detail = $('[name="detail"]').val();
    let username = $('[name="username"]').val();
    let password = $('[name="password"]').val();
    let role = $('[name="role"]').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/update/admin_user',
        datatype: 'json',
        data: {
            id,
            name,
            email,
            phone,
            detail,
            username,
            password,
            role,
        },
        success: function(result) { 
            console.log(result)
            if(result.status == 'success')
            location.href = '/sd/osotspa-sd/public/admin/admin_user';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>