@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
<input type="hidden" name="server" value="{{ url('') }}">
<input type="hidden" name="id" value="{{ url('') }}">
<div class="sd-menu-box" style="justify-content: space-between;">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"
        style=" font-family: 'Noto Sans Thai', sans-serif;" style="background-color: rgb(7, 28, 85);">
        <div class="position-sticky" style=" display: flex; background-color: rgb(7, 28, 85); ">

            @component('components.menu')
            @endcomponent


            <main class=" pt-4  mdb-docs-layout"
                style="width: 100%;padding:2%; height:100vh; background-color: rgb(255, 255, 255);">

                <div class="container  mt-3 shadow-lg"
                    style="background-color: white; padding:2%; border-radius: 10px; ">
                    <div class="container-fluid">
                        @if( $post != null)
                        </h1>
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(81, 78, 78);">แก้ไข</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <form class="row g-3" action="/action_page.php" style="margin: 2% 4%"
                                enctype="multipart/form-data" id="form_data">
                                <div class="col-12">
                                    <input type="hidden" name="ids" value="{{$post->id}}">
                                    <input type="hidden" name="type" value="{{$post->type}}">
                                    <input type="hidden" name="category" value="{{$post->category}}">
                                    <label for="inputAddress" class="form-label">ชื่อ</label>
                                    <input type="name" name='name' class="form-control" id="name" placeholder="ชื่อ"
                                        value="{{$post->name}}" required />
                                    <div class="error" id="error_name"></div>
                                    <div class="file_show" id="file_show" style="display: flex">
                                        <img src="{{ asset('/image/icon/pdf.png') }}" title="" class="icon01"
                                            width="30px" style="margin-top: 2%">&nbsp;
                                        <div class="pdf" style="margin-top: 2.5%;">
                                            <a style="text-decoration: none;" id="file_show"
                                                href="{{asset('')}}uploads/{{$post->file_name}}"
                                                target="_blank">{{$post->name}}.{{$post->file_format}} </a>
                                        </div>
                                    </div>


                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">ไฟล์ เอกสาร</label>
                                    <input class="form-control" name="file_upload" type="file" placeholder="ไฟล์ pdf"
                                        accept="application/pdf" onchange="upload_file()" required />
                                </div>
                                <div class="error_file" id="error_file"></div>

                                <div class="col-12">
                                    <button type="button" class="btn text-white"
                                        style=" width: 12%;background-color: #FFA200;" onclick="update()">Save</button>
                                    <a href="{{asset('')}}admin/{{$post->category}}/{{$post->type}}">
                                        <button type="button" class="btn text-white"
                                            style="width: 12%; background-color: rgb(184, 178, 178);">Cancel</button>
                                    </a>
                                </div>
                            </form>

                            @endif
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
    function update() {
    let web = $('[name="server"]').val();
    let file_upload = $('[name="Upload"]').val();
    var form = $('#form_data')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
console.log(formData)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/update_pdf',
        data: formData,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
         processData: false, // NEEDED, DON'T OMIT THIS
        success: function(result) { 
            console.log(result.type)

            html='';
            if(result == 0){
                
            html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณาใช้ไฟล์ PDF
            </div>
            `
            //   location.href = '/admin/admin_groups';  
            $('#error_file').html(html)
            }
            if(result == -1){
                html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณาใส่ข้อมูลให้ครบ
            </div>
            `
            //   location.href = '/admin/admin_groups';  
            $('#error_name').html(html)
            }
            if(result.status == 'success')
            location.href = '/sd/osotspa-sd/public/admin/'+result.category+'/'+result.type;
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}

function upload_file() {
    $('#file_show').remove()
}
</script>