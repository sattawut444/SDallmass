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
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);">กลุ่มผู้ใช้งาน</h1>
                            <div>
                                
                                <a href="{{url('/admin/register/admin_group')}}">
                                    <button class="ripple ripple-surface btn btn-rounded" style="color: white; background-color: rgb(2, 203, 52);" role="button"
                                        fdprocessedid="z4lstl">เพิ่ม กลุ่มผู้ใช้งาน</button>
                                </a>
                            </div>
                        </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex     justify-content-between" style="background-color: rgb(7, 28, 85);">
                                <p class="text-white" style="color:rgb(2, 4, 52); margin: auto 0%;">กลุ่มผู้ใช้งานทั้งหมด</p>
                                <div class="d-flex " style="margin: auto 0%">

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3" >
            
                                </div>
                                <input type="hidden" name="page" value="1">
                                <table class="table table-borderless" style="width: 100%;border-radius: 10px;">
                                    <thead style="border-radius: 10px; width: 100%;">
                                        <tr style=" border-bottom: 1px solid #dcd8e4;;background-color: rgba(208, 202, 202, 0.23);">
                                          <th scope="col">ชื่อ</th>
                                          <th scope="col">บทบาท</th>
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
            console.log(result)
            let results = result[0]
            console.log(results)
            html_1 = ''
            results.forEach(value => {
            // console.log(value)
            
                        html_1 += `
                        <tr>
                            <td class="col"style="font-weight: bold">${value.name}</td>
                            <td scope="col">${value.description}</td>
                            <td class="text-center">
                            <a href = "{{url('/admin/edit/admin_group/${value.id}')}}">
                            <img src="{{ asset('/image/icon/pen.png') }}" title="" class="icon01"  width='30px'/>&nbsp;
                            </a>
                            <a href = "{{url('/admin/delete/admin_groups/${value.id}')}}">
                            <img src="{{ asset('/image/icon/trash.png') }}" title="" class="icon01" width='30px'/>
                        </td>
                    </tr>`
                    });
            $('#tb_1').html(html_1)
           
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>

