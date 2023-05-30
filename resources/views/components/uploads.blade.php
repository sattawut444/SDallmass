@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
<input type="hidden" name="server" value="{{ url('') }}">
<div class="sd-menu-box" style="justify-content: space-between; background-color: rgba(12, 33, 94, 0.911); padding:1%">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"
        style=" font-family: 'Noto Sans Thai', sans-serif;" style="width: ">
        <div class="position-sticky" style="display: flex;">
            <div class="list-group list-group-flush mx-3 mt-4 nav nav-pills" style="width: 19%; height: 100%;">
                @component('components.menu')
                @endcomponent
            </div>

            <main class=" pt-4  mdb-docs-layout" style="width: 100%;">
                <div class="container  mt-4">
                    <div class="container-fluid" style="padding: 6%">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">
                                เพิ่ม ผลการดำเนินงาน</h1>
                        </div>
                       
                        <div class="card shadow mb-4">
                            <form class="row g-3" action="/action_page.php" style="margin: 2% 4%"  enctype="multipart/form-data" id="form-data">
                                <div class="col-12">
                                  <label for="inputAddress" class="form-label">File name</label>
                                  <input type="name" name='name' class="form-control" id="name" placeholder="name">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">FILE PDF </label>
                                    <input type= "file" name="file_upload" accept = "application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                </div>
                                <div class="col-12">
                                  <a href="#" style="width: ">
                                    <button type="button" class="btn text-white" style=" width: 12%;background-color: rgba(12, 33, 94, 0.911);" onclick="create_url()">Save</button>
                                  </a>
                                  <button type="button" class="btn text-white" style="width: 12%; background-color: rgba(67, 70, 80, 0.911);" onclick="create_url()">Cancel</button>

                                </div>
                                
                              </form>

                            <div class="card-footer" style="background-color: rgba(8, 25, 73, 0.932);">
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
    let name = $('#name').val();
    let url = $('#url').val();
    let file_upload = $('[name="Upload"]').val();
    let category = 'ผลการดำเนินงาน';

    var form = $('#form-data')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    formData.append('test',54)

console.log(formData)
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
            // console.log(result)
            // if(result[0].status == 'success')
            // location.href = '.' + result[0]['dashboard'];
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>

