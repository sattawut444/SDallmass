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
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(84, 82, 82);">เพิ่มผู้ใช้งาน</h1>
                        </div>
                        <div class="card shadow mb-4">
                            <form class="row g-3" style="margin: 2% 16%">
                                <input type="hidden" name="id" value="{{ url('') }}">
                                <div class="col-12">
                                    <img src="{{ asset('/image/icon/user1.png') }}" title="" style="margin:0% 43%" class="icon01"  width='100px'/>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">ชื่อ</label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="ชื่อ" required >
                                    <div class="error_name" id="error_name"></div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">อีเมล</label>
                                    <input type="name" name="email" class="form-control" id="phone" placeholder="อีเมล" required >
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="name" name="phone" class="form-control" id="phone" placeholder="เบอร์โทรศัพท์" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">รายละเอียด</label>
                                    <textarea class="form-control" name='tex' id="tex" placeholder="รายละเอียด" rows="3" required></textarea>
                                  </div>
                                  <div class="col-12">
                                    <label for="inputAddress" class="form-label">ชื่อผู้ใช้งาน</label>
                                    <input type="name" name="username" class="form-control" id="username" placeholder="ชื่อผู้ใช้งาน" required>
                                    <div class="error_id" id="error_id"></div>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน">
                                    <div class="error_id" id="error_pass"></div>
                                </div>
                                <div class="col-12" >
                                    <label for="inputAddress" class="form-label">เลือกบทบาท</label>
                                    <select class="form-select" aria-label="Default select example" name="option" id="op1">
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                        <button type="button" class="btn text-white"
                                            style="width: 12%;background-color: #FFA200;" onclick="create()">Saves</button>
                                    <a href="/sd/osotspa-sd/public/admin/admin_user">
                                        <button type="button" class="btn text-white"
                                            style="width: 12%; background-color: rgb(184, 178, 178);">Cancel</button>
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
    Get()
    function Get(){
            let web = $('[name="server"]').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: web + '/admin/admin_group',
            datatype: 'json',
            data: {
    
            },
            success: function(result) { 
                // console.log(result)
                let results = result[0]
                // console.log(results)
                html_1 = ''
                results.forEach(value => {
                // console.log(value.id)
                        html_1 += `
                            
                            <option value="${value.id}">${value.name}</option>
                        `
                        });
                $('#op1').html(html_1)
               
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    </script>

<script>
    function create() {
    let web = $('[name="server"]').val();
    let name = $('[name="name"]').val();
    let email = $('[name="email"]').val();
    let phone = $('[name="phone"]').val();
    let tex = $('[name="tex"]').val();
    let username = $('[name="username"]').val();
    let password = $('[name="password"]').val();
    let option = $('[name="option"]').val();

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
            email,
            phone,
            tex,
            username,
            password,
            option,
        },
        success: function(result) { 
            // console.log(result[0])
            html='';
            if(result[0] == 0){
                
            html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณากรอกข้อมูลให้ครบ
            </div>
            `
            //   location.href = '/admin/admin_groups';  
            $('#error_name').html(html)
            }
            if(result[0] == -1){
                html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณากรอกข้อมูลให้ครบ
            </div>
            `
            //   location.href = '/admin/admin_groups';  
            $('#error_id').html(html)
            $('#error_pass').html(html)
            }
            if(result[0].status == 'success')
            location.href = '/sd/osotspa-sd/public/admin/admin_user';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>