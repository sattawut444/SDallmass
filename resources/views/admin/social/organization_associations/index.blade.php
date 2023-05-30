@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
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
                        <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);">Contribution to
                            External Organization and Associations</h1><br>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color:rgb(2, 4, 52);">เอกสารดาวน์โหลด</h1>
                            <div>
                                <a href="{{url('/admin/create_pdf?category=social&type=organization_associations')}}">
                                    <button class="ripple ripple-surface btn btn-rounded"
                                        style="color: white; background-color: rgb(2, 203, 52); padding:auto;"
                                        role="button" fdprocessedid="z4lstl">เพิ่มเอกสารดาวน์โหลด</button>
                                    <div class="swal-add"></div>
                                </a>
                            </div>
                        </div>
                        <div class="card shadow mb-4">

                            <div class="card-header d-flex   justify-content-between"
                                style="background-color: rgb(7, 28, 85);">
                                <p class="text-white" style="margin: auto 0%">เอกสารดาวน์โหลดทั้งหมด</p>
                                <div class="d-flex " style="margin: auto 0%">

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">

                                </div>
                                <input type="hidden" name="page" value="1">
                                <table class="table table-borderless" style="border-radius: 10px;">
                                    <thead style="border-radius: 10px;">
                                        <tr style="border-radius: 10px;background-color: rgba(218, 214, 214, 0.471);">
                                            <th scope="col">File</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col" class="text-center">Sorting</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_3">

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
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

{{-- ------------------------------------------------------------------------------------------------------- --}}

<script>
    GetAction_plan()
function GetAction_plan(){
        let web = $('[name="server"]').val();
        let order_by = $('[name="order_by"]').val();
        let limit_data = $('[name="limit_data"]').val();
        let type = 'organization_associations';
        let category = 'social';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/data_file',
        datatype: 'json',
        data: {
            category,
            order_by,
            type,
            limit_data
        },
        success: function(result) { 
            // console.log(result)
            let results = result[0]
            // console.log(results)
            html_3 = ''
            results.forEach(value => {
            console.log(value)
                    if(value.type == 'organization_associations')
                        html_3 += `
                            <tr data="${value.id}">
                              <th scope="row">
                                <img src="{{ asset('/image/icon/pdf.png') }}" title="" class="icon01"  />
                              </th>
                              <td>${value.name}</td>
                              <td>${value.file_format}</td>
                              <td class="text-center">

                                <button onclick="sorting([${value.id},'up'])" style="border: 0px; background-color:white">
                                    <span class="material-symbols-outlined" style="color: white; border-radius: 13px;background-color: #7d97b6;">
                                        arrow_circle_up
                                    </span></a>
                                </button>

                                <button onclick="sorting([${value.id},'dow'])"style="border: 0px; background-color:white">
                                    <span class="material-symbols-outlined" style="color: white; border-radius: 13px;background-color: #7d97b6;">
                                        arrow_circle_down
                                    </span>
                                </button>
                              </td>
                              <td class="text-center">
                                <a href = "{{url('/admin/update_file/${value.id}')}}">
                                <img src="{{ asset('/image/icon/pen.png') }}" title="" class="icon01"  width='30px'/></a>&nbsp;
                                <a href = "{{url('admin/delete/${value.id}')}}">
                                <img src="{{ asset('/image/icon/trash.png') }}" title="" class="icon01" width='30px'/></a>
                              </td>
                            </tr>`
                    });
            $('#tb_3').html(html_3)
           
        },
        error: function(error) {
            console.log(error);
        }
    });
}

</script>
{{-- --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function sorting(e) {
    let web = $('[name="server"]').val();
    // let id = $('#edited').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/sorting',
        datatype: 'json',
        data: { 
            e
        },
        success: function(result) { 
            location.reload();
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>