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
                style="width: 100%;padding:2%; height:240vh; background-color: rgb(255, 255, 255);">

                <div class="container  mt-3 shadow-lg"
                    style="background-color: white; padding:2%; border-radius: 10px; ">
                    <div class="container-fluid">

                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            {{-- <img src="{{ asset('/image/icon/add1.png') }}" title="" class="icon01" width='50' />
                            --}}

                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(84, 82, 82);">เพิ่มกลุ่มผู้ใช้งาน</h1>
                        </div>
                        <div class="card shadow mb-4">
                            <form class="row g-3" style="margin: 2% 16%">
                                <input type="hidden" name="id" value="{{ url('') }}">

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">ชื่อกลุ่มผู้ใช้งาน</label>
                                    <input type="name" name="name" class="form-control" id="name" value="{{$post[0]->name}}">
                                        <div class="error" id="er_1"></div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">รายละเอียด</label>
                                    <textarea class="form-control" name='tex' id="tex" placeholder="{{$post[0]->description}}"
                                        rows="3"></textarea>
                                </div>
                                <div class="error" id="er_2"></div>

                                <p>สถานะการนำไปใช้งาน</p>
                                <div class="col-sm-2 text-end">
                                    <select name="status1" onchange="create()"
                                        aria-controls="DataTables_Table_0"
                                        class="form-select form-select-sm">
                                        <option value="1" selected="">ใช้งาน</option>
                                        <option value="0">ไม่ได้ใช้งาน</option>
                                        

                                    </select>
                                </div>
                                <p>จัดการสิทธิ์การเข้าถึงเมนู</p>

                                <div class="row">
                                    
                                    <div class="col" style="background-color: rgb(235, 234, 234)">
                                        <span class="material-symbols-outlined">
                                            gavel
                                        </span>&nbsp;Governance
                                    </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Aniti Bribery And Corruption
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="g1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col" style="background-color: rgb(235, 234, 234)">
                                            <span class="material-symbols-outlined">
                                                eco
                                            </span>&nbsp;Economic
                                        </div>

                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Product Quailty And Safety
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="e1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>

                                        </div><br>

                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Sustainable Supply Chain
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="e2" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Lnnovation
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="e3" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Tax
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="e4" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Contribution to External Organization And Associations
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="e5" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col" style="background-color: rgb(235, 234, 234)">
                                            <span class="material-symbols-outlined">
                                                connect_without_contact
                                            </span>Social
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Consumer's Health & Well Being
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Human Capital & Labor Practies
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s2" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Healthy and Safe Work Environment
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s3" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Corporate Citizenship & Philanthropy
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s4" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Human Right
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s5" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Ethical Marketing
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="s6" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div><br>

                                        <div class="col" style="background-color: rgb(235, 234, 234)">
                                            <span class="material-symbols-outlined">
                                                globe_asia
                                            </span>&nbsp;Environment
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Sustainable Packaging
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="en1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Energy & Climate
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="en2" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Water & Wastewater
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="en3" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Waste Manangement
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="en4" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div><br>

                                        <div class="col">
                                            <span class="material-symbols-outlined" style="background-color: rgb(235, 234, 234)">
                                                policy
                                            </span>&nbsp;Policy & Document
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - Policy & Document
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="pd1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div><br>

                                        <div class="col" style="background-color: rgb(235, 234, 234)">
                                            <span class="material-symbols-outlined">
                                                group
                                            </span> ผู้ใช้งาน
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - ผู้ใช้งานทั้งหมด
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="a1" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="color:rgb(67, 66, 66); font-size: 14px;margin-top: 1%">
                                            <div class="col-sm-4 ">
                                                - กลุ่มผู้ใช้งาน
                                            </div>
                                            <div class="col-sm-2 text-end">
                                                <select name="a2" onchange="create()"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-select form-select-sm">
                                                    <option value="2" selected="">ดู/แก้ไข</option>
                                                    <option value="1">ดูอย่างเดียว</option>
                                                    <option value="0">ปิดการมองเห็น</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="background-color: black;padding3%;">
                                        <div style="background-color: aqua;padding3%;"></div>
                                        <div style="background-color: rgb(255, 21, 21);padding3%;"></div>

                                    </div>
                                    <div class="col-12" style="margin-top:3%;">
                                        <button type="button" class="btn text-white"
                                            style="width:130PX;background-color: #FFA200;"
                                            onclick="create()">Saves</button>
                                        <a href="/sd/osotspa-sd/public/admin/admin_groups">
                                            <button type="button" class="btn text-white"
                                                style="width:130PX; background-color: rgb(184, 178, 178);">Cancel</button>
                                        </a>
                                    </div>
                            </form>
                            <div class="card-footer" style="margin-top:3%;background-color: rgba(0, 0, 0, 0.805);">
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
    let name = $('[name="name"]').val();
    let description = $('[name="tex"]').val();
    let status = $('[name="status1"]').val();
    if(name != ''){
    // governance
    let aniti_bribery_and_corruption = $('#g1').val();
    // economic
    let product_quailty_and_safety = $('[name="e1"]').val();
    let sustainable_supply_chain = $('[name="e2"]').val();
    let lnnovation = $('[name="e3"]').val();
    let tax = $('[name="e4"]').val();
    let contribution_to_external_organization_and_associations = $('[name="e5"]').val();
    // social
    let consumer_health	= $('[name="s1"]').val();
    let human_capital = $('[name="s2"]').val();
    let healthy	= $('[name="s3"]').val();
    let citizenship_philanthropy = $('[name="s4"]').val();
    let human_right = $('[name="s5"]').val();
    let ethical_marketing = $('[name="s6"]').val();
    // environment
    let sustainable_packaging = $('[name="en1"]').val();
    let energy_climate = $('[name="en2"]').val();
    let water_wastewater = $('[name="en3"]').val();
    let waste_manangement = $('[name="en4"]').val();
    // policy document
    let policy_document = $('[name="pd1"]').val();
    // admin_user
    let admin_all = $('[name="a1"]').val();
    let admin_group = $('[name="a2"]').val();
    
    let name = $('[name="name"]').val();
    let description = $('[name="tex"]').val();
    let status = $('[name="status1"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/create/admin_group',
        datatype: 'json',
        data: {
            name,
            description,
            status,
            aniti_bribery_and_corruption,
            product_quailty_and_safety,
            sustainable_supply_chain,
            lnnovation,
            tax,
            contribution_to_external_organization_and_associations,
            consumer_health,
            human_capital,
            healthy,
            citizenship_philanthropy,
            human_right,
            ethical_marketing,
            sustainable_packaging,
            energy_climate,
            water_wastewater,
            waste_manangement,
            policy_document,
            admin_all,
            admin_group,
        },
        success: function(result) { 
            console.log(result)
            // if(result[0].status == 'success')
            // location.href = '/admin/admin_user';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });

}
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/create/admin_group',
        datatype: 'json',
        data: {
            name,
            description,
            status,
        },
        success: function(result) { 
            console.log(result[0])
            html='';
            if(result[0] == 0){
                
            html += `
            <div class="alert alert-danger" role="alert">
            <span class="material-symbols-outlined">
                report
            </span>
            กรุณากรอกขอมูลให้ครบด้วยค่ะ
            </div>
            `
            }
            
              location.href = '/sd/osotspa-sd/public/admin/admin_groups';  
            
            
            $('#er_1').html(html)
        },

        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>