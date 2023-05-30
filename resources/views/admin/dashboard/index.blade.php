@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
<div class="sd-menu-box" style="height: 100vh;justify-content: space-between; background-color: rgb(7, 28, 85);">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"
        style=" font-family: 'Noto Sans Thai', sans-serif;" style="background-color: rgb(7, 28, 85);">
        <div class="position-sticky" style=" display: flex; background-color: rgb(7, 28, 85); ">
            <div class="list-group list-group-flush mx-3 mt-4 nav nav-pills" style="width: 11.5%;">
                @component('components.menu')
                @endcomponent
            </div>
            <main class=" pt-4  mdb-docs-layout" style="width: 100%; padding:2%;">
                <div class="row justify-content-center gap-3 mt-4 ms-2 me-2">
                    <div style="width: " class="col card shadow rounded bg-white p-3 text-end" id="count_download">
                        {{-- <h5 class="text-start">จำนวนดาวน์โหลด File PDF</h5>

                        <span class="h1 text-success">0 คน</span> --}}
                    </div>
                    <div class="col card shadow rounded bg-white p-3 text-end" id="count_admin">
                        {{-- <h5 class="text-start">จำนวนเจ้าหน้าที่ผู้ดูแลระบบ</h5> --}}
                        {{-- <span class="h1 text-success">{{ $data['admin']['count'] }}</span> --}}
                        {{-- <span class="h1 text-success">1 คน</span> --}}
                    </div>
                    <div class="col card shadow rounded bg-white p-3 text-end">
                        <h5 class="text-start">จำนวนผู้เข้าชมเว็บไซต์</h5>
                        {{-- <span class="h1 text-success">{{$data['visitor_count']}}</span> --}}
                        <span class="h1 text-success">0 เข้าชม</span>
                    </div>
                </div>
                <div class="row justify-content-center gap-3 mt-3 ms-2 me-2">
                    <div style="min-height:300px;" class="col card shadow rounded bg-white p-3">
                        <h5 class="text-start">การใช้งานผู้ดูแลระบบ</h5>
                        <table class="table" id='table'>
                            <thead style="border-radius: 10px;">
                                <tr style="border-radius: 10px;background-color: rgba(237, 237, 237, 0.739);">
                                    <th scope="col">ผู้ใช้งาน</th>
                                    <th scope="col" class="text-center">เข้าสู่ระบบ</th>
                                    <th scope="col" class="text-end">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="tb" id="tb">
                            </tbody>

                        </table>
                    </div>

                </div>
            </main>
        </div>
    </nav>
</div>
<script>
    get()
function get(){
        let web = $('[name="server"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: web + '/admin/history_admin_log',
        datatype: 'json',
        success: function(result) { 
            // console.log(result[0][0])
            html = ''
            result[0].forEach(value => {
                // console.log(value)
                html += `
                    <tr>
                        <td class="col">${value.name}</td>
                        <td scope="col" class="text-center">${value.in_time}</td>
                        <td class="col text-end">${value.status}</td>
                    </tr>
                `
            });
            $('#tb').html(html)
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
<script>
    get_count()
function get_count(){
        let web = $('[name="server"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: web + '/admin/number',
        datatype: 'json',
        success: function(result) { 
            // console.log(result[0])
            html = ''
            // result[0].forEach(value => {
                // console.log(value)
                html += `
                <h5 class="text-start">จำนวนเจ้าหน้าที่ผู้ดูแลระบบ</h5>
                <span class="h1 text-success">${result[0]}</span>
                `
            // });
            $('#count_admin').html(html)
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>

<script>
    get()
function get(){
        let web = $('[name="server"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: web + '/admin/history_admin_log',
        datatype: 'json',
        success: function(result) { 
            // console.log(result[0][0])
            html = ''
            result[0].forEach(value => {
                // console.log(value)
                html += `
                    <tr>
                        <td class="col">${value.name}</td>
                        <td scope="col" class="text-center">${value.in_time}</td>
                        <td class="col text-end">${value.status}</td>
                    </tr>
                `
            });
            $('#tb').html(html)
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>

<script>
    get_count_download()
function get_count_download(){
        let web = $('[name="server"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: web + '/admin/count_download',
        datatype: 'json',
        success: function(result) { 
            console.log(result)
            html = ''
            // result[0].forEach(value => {
                // console.log(value)
                html += `
                <h5 class="text-start">จำนวนการดาวน์โหลด File </h5>
                <span class="h1 text-success">${result[0]}</span>
                `
            // });
            $('#count_download').html(html)
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>