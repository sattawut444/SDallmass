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
            
            <main class=" pt-4  mdb-docs-layout" style="width: 100%;padding:2%; height:100vh; background-color: rgb(255, 255, 255);" >
                
                <div class="container  mt-3 shadow-lg" style="background-color: white; padding:2%; border-radius: 10px; ">

                    <div class="container-fluid">
                        <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);"></h1>
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);">เพิ่ม เอกสารดาวน์โหลด</h1>
                            <div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <form class="row g-3" action="/action_page.php" style="margin: 2% 4%"  enctype="multipart/form-data" id="form_data">
                                <div class="col-12">
                                    <input type="hidden" name="type" value="{{$type}}">
                                    <input type="hidden" name="category" value="{{$category}}">
                                  <label for="inputAddress" class="form-label">ชื่อ</label>
                                  <input type="name" name='name' class="form-control" id="name" placeholder="ชื่อ" required />
                                  <div class="error_name" id="error_name"> </div>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">ไฟล์ เอกสาร</label>
                                    <input class="form-control" name="file_upload" type="file" placeholder="ไฟล์ pdf" accept="application/pdf," required/>
                                    <div class="error_file" id="error_file"> </div>
                                  </div>
                               
                                <div class="col-12">
                                    <button type="button" class="btn text-white" style=" width: 12%;background-color: #FFA200;" onclick="create()">Save</button>
                                    <a href="{{asset('')}}admin/{{$category}}/{{$type}}">
                                        <button  type="button" class="btn text-white" style="width: 12%; background-color: rgb(184, 178, 178);">Cancel</button>
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
    let file_upload = $('[name="Upload"]').val();
    let type = $('[name="type"]').val();
    let category = $('[name="category"]').val();
    var form = $('#form_data')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    formData.append('type',type);
    formData.append('category',category);
// console.log(formData)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/create_upload',
        data: formData,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
         processData: false, // NEEDED, DON'T OMIT THIS
        success: function(result) { 
            console.log(result.status)
            html = '';
            if(result == 0){
                html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณาใช้ไฟล์ PDF
            </div>
            `
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
            $('#error_name').html(html)
            }
            if(result == -2){
                html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            เกิดข้อผิดพลาด กรุณาใส่ข้อมูลให้ครบ
            </div>
            `
            $('#error_file').html(html)
            }
            if (result.status == 'success'){
                location.href = ''+category+'/'+type;  
                
            }
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>

