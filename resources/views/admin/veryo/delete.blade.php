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

            <main class=" pt-4  mdb-docs-layout" style="width: 100%;padding:6%;">

                <div class="container  mt-3" style="background-color: white; padding:2%; border-radius: 10px;">
                    <div class="container-fluid" style="padding: 3% 9%">
                        {{-- <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);">Delete</h1> --}}
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);"> </h1>
                            
                        </div>
                        <div class="card shadow mb-4" style="margin: 2% 13%">
                            @if($post != null)
                            <form class="row g-3" style="margin: 2% 4%">
                                <input type="hidden" name="ids" value="{{$post->id}}">
                                <div class="col-12">
                                    <img src="{{ asset('/image/icon/trash.png') }}" title="" style="margin-left: 42%" class="icon01" width='15%'/>
                                    <p style="padding:8% 0% 0% 35% ">คุณต้องการที่จะลบใช่ไหม !</p>
                                <div class="col-12" style="margin: 10% 20% 5% 23%">
                                    
                                        <button type="button" class="btn text-white" onclick="update()"
                                            style="margin-right: 2%;width: 150px;background-color: rgb(252, 38, 6);"
                                            >Delete</button>
 
                                    <a href="{{ url('admin/admin_user') }}">
                                        <button type="button" class="btn text-white"
                                            style=" width: 150px;background-color: rgb(254, 156, 0);">Cancel</button>
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
                        @endif
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
    let id = $('[name="ids"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/delete/admin_user',
        datatype: 'json',
        data: {
            id,
        },
        success: function(result) { 
            console.log(result)
            // console.log(result[0])
            // if(result.status == 'success')
            location.href = '/sd/osotspa-sd/public/admin/admin_user';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>