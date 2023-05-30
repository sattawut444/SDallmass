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
        <div class="position-sticky" style="height: 100vh;display: flex;background-color: rgb(7, 28, 85); ">
            <div class="list-group list-group-flush mx-3 mt-4 nav nav-pills"
                style="background-color: rgba(6, 3, 46, 0); width: 11.5%; height: 100 hv;;">
                @component('components.menu')
                @endcomponent
            </div>

            <main class=" pt-4  mdb-docs-layout" style="width: 100%;padding:2%;">

                <div class="container  mt-3" style="background-color: white; padding:2%; border-radius: 10px;">
                    <div class="container-fluid">
                        {{-- <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);">Governance
                        </h1> --}}
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);">เพิ่ม ผลการดำเนินงาน</h1>
                            <div>
                                <a href="http://127.0.0.1:8000/admin/governance">
                                    <button class="ripple ripple-surface btn btn-rounded"
                                        style="color: white; background-color: rgba(130, 130, 130, 0);" role="button"
                                        fdprocessedid="z4lstl"> </button>
                                </a>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <form class="row g-3" action="/action_page.php" style="margin: 2% 4%"
                                enctype="multipart/form-data" id="form-data">
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">File name</label>
                                    <input type="name" name='name' class="form-control" id="name" placeholder="name">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Category</label>
                                    <input type="name" name='category' class="form-control" id="category" placeholder="category">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Type</label>
                                    <input type="name" name='type' class="form-control" id="type" placeholder="type">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">File PDF </label>
                                    <input type="file" name="file_upload"
                                        accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                </div>
                                <div class="col-12">
                                    <a href="#" style="width: ">
                                        <button type="button" class="btn text-white"
                                            style=" width: 12%;background-color: rgba(12, 33, 94, 0.911);"
                                            onclick="create_url()">Save</button>
                                    </a>
                                    <a href="http://127.0.0.1:8000/admin/governance" style="width: ">
                                    <button type="button" class="btn text-white"
                                        style="width: 12%; background-color: rgb(254, 156, 0);">Cancel</button>
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
    let file_upload = $('[name="Upload"]').val();
    let type = $('[name="type"]').val();
    let category = $('[name="category"]').val();
    var form = $('#form-data')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    formData.append('test',54);
    formData.append('type',category);
    formData.append('category',category);

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
            console.log(result)
            if(result.status == 'success')
            location.href = 'http://127.0.0.1:8000/admin/governance';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>