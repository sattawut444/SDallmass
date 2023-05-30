@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
<input type="hidden" name="server" value="{{ url('') }}">
<input type="hidden" name="id" value="{{ url('') }}">
<div class="sd-menu-box" style="justify-content: space-between;">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"
        style=" font-family: 'Noto Sans Thai', sans-serif;">
        <div class="position-sticky" style="height: 120vh;display: flex;background-color: rgb(7, 28, 85); ">
            <div class="list-group list-group-flush mx-3 mt-4 nav nav-pills"
                style="background-color: rgba(6, 3, 46, 0); width: 11.5%; height: 100 hv;;">
                @component('components.menu')
                @endcomponent
            </div>

            <main class=" pt-4  mdb-docs-layout" style="width: 100%; padding:3%;">

                <div class="container  mt-3" style="background-color: white; padding:2%; border-radius: 10px;">
                    <div class="container-fluid">
                        
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            {{-- <img src="{{ asset('/image/icon/add1.png') }}" title="" class="icon01"  width='50'/> --}}
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(84, 82, 82);">เพิ่มผู้ใช้งาน</h1>
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
                                    <label for="inputAddress" class="form-label"></label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="ชื่อ">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label"></label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="เบอร์โทรศัพท์">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="หมายเหตุ" rows="3"></textarea>
                                  </div>
                                  <div class="col-12">
                                    <label for="inputAddress" class="form-label"></label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="ชื่อผู้ใช้งาน">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label"></label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="รหัสผ่าน">
                                </div>

                                <div class="col-12">
                                        <button type="button" class="btn text-white"
                                            style="background-color: rgb(68, 0, 255);"
                                            onclick="create_url()">Saves</button>
                                    <a href="http://127.0.0.1:8000/admin/governance">
                                        <button type="button" class="btn text-white"
                                            style="background-color: rgb(254, 156, 0);">Cansel</button>
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
    function create_url() {
    let web = $('[name="server"]').val();
    let id = $('[name="id"]').val();
    let name = $('[name="name"]').val();
    let url = $('[name="url"]').val();
    let type = $('[name="type"]').val();
    let category = $('[name="category"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/create_url',
        datatype: 'json',
        data: {
            name,
            url,
            type,
            category
        },
        success: function(result) { 
            // console.log(result)
            if(result[0].status == 'success')
            location.href = '.' + result[0]['dashboard'];
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>