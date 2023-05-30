@component('components.master')
@endcomponent
@component('components.nav')
@endcomponent
{{-- ------------------------------- --}}
<input type="hidden" name="server" value="{{ url('') }}">
<div class="sd-menu-box" style="justify-content: space-between;">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white"style=" font-family: 'Noto Sans Thai', sans-serif;" style="background-color: rgb(7, 28, 85);">
        <div class="position-sticky" style=" display: flex; background-color: rgb(7, 28, 85); ">
         
                @component('components.menu')
                @endcomponent
            

            <main class=" pt-4  mdb-docs-layout" style="width: 100%;padding:2%; height:100vh; background-color: rgb(255, 255, 255);" >
                
                <div class="container  mt-3 shadow-lg" style="background-color: white; padding:2%; border-radius: 10px; ">
                    <div class="container-fluid" >
                        {{-- <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);">ผู้ใช้งานทั้งหมด</h1><br> --}}
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);">ผู้ใช้งานทั้งหมด</h1>
                            <div>
                                <a href="{{url('/admin/register/admin_user')}}">
                                    <button class="ripple ripple-surface btn btn-rounded" style="color: white; background-color: rgb(2, 203, 52);" role="button"
                                        fdprocessedid="z4lstl">เพิ่ม ผู้ใช้งาน</button>
                                </a>
                            </div>
                        </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex     justify-content-between" style="background-color: rgb(7, 28, 85);">
                                <p class="text-white" style="color:rgb(2, 4, 52); margin: auto 0%;">ข้อมูลผู้ใช้งานทั้งหมด</p>
                                <div class="d-flex " style="margin: auto 0%">

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3" >
            
                                </div>
                                <input type="hidden" name="page" value="1">
                                <table class="table table-borderless" style="border-radius: 10px;">
                                    <thead style="border-radius: 10px;">
                                        <tr style="border-radius: 10px;background-color: rgba(204, 204, 204, 0.442);">
                                          <th scope="col"class="text-center"></th>
                                          <th scope="col">ชื่อ</th>
                                          <th scope="col">บทบาท</th>
                                          <th scope="col" class="text-center"></th>
                                          <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_1">

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
                        {{--  --}}
                                
                        {{--  --}}
                        
                        
                    </div>
                </div>
            </main>
        </div>
    </nav>
</div>

{{-- ------------------------------------------------------------------------------------------------------- --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
GetPolicy()
function GetPolicy(){
        let web = $('[name="server"]').val();
        let order_by = $('[name="order_by"]').val();
        let limit_data = $('[name="limit_data"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/admin_user',
        datatype: 'json',
        data: {
            order_by,
            limit_data
        },
        success: function(result) { 
            // console.log(result)
            let results = result[0]
            console.log(results)
            html_1 = ''
            results.forEach(value => {
            // console.log(value)
            if(value.name != null){
                html_1 += `
                            <tr data="${value.id}">
                              <th class="text-center" scope="row">
                                <img src="{{ asset('/image/icon/user1.png') }}" title="" class="icon01" width='30px' />
                              </th>
                              <td>${value.name}</td>
                              <td>${value.group}</td>
                              <td class="text-center">
                                
                              </td>
                              <td class="text-center">
                                <a href = "{{url('/admin/edit_admin_user/${value.id}')}}">
                                <img src="{{ asset('/image/icon/pen.png') }}" title="" class="icon01"  width='30px'/></a>&nbsp;
                                <a href = "{{url('admin/delete/admin_users/${value.id}')}}">
                                <img src="{{ asset('/image/icon/trash.png') }}" title="" class="icon01" width='30px'/>
                                </a>
                              </td>
                            </tr>`
            }  
                    });
            $('#tb_1').html(html_1)
           
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>

