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
                        @if( $post != null)
                        <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px;color: rgb(2, 4, 52);">{{$post->category}}</h1>
                        <br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="color: rgb(0, 0, 0);">Edit นโยบาย</h1>
                            <div>
                                <a href="http://127.0.0.1:8000/admin/{{$post->category}}">
                                    <button class="ripple ripple-surface btn btn-rounded" style="color: white; background-color: rgb(184, 190, 184);" role="button"
                                        fdprocessedid="z4lstl">ย้อนกลับ</button>
                                </a>
                            </div>
                        </div>
            
                        <div class="card shadow mb-4">
                        
                            <form class="row g-3" style="margin: 2% 4%">
                                <input type="hidden" name="ids" value="{{$post->id}}">
                                <input type="hidden" name="type" value="{{$post->type}}">
                                <input type="hidden" name="category" value="{{$post->category}}">
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Name URL</label>
                                    <input type="name" name="name" class="form-control" id="name" value="{{$post->name}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">URL</label>
                                    <input type="name" name="url" class="form-control" id="url" value="{{$post->url}}">
                                </div>
                                <div class="col-12">
                                        <button type="button" class="btn text-white"
                                            style="background-color: rgb(68, 0, 255);"
                                            onclick="update()">Saves</button>
                                    <a href="http://127.0.0.1:8000/admin/{{$post->category}}">
                                        <button type="button" class="btn text-white"
                                            style="background-color: rgb(254, 156, 0);">Cansel</button>
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
    let id = $('[name="ids"]').val();
    let name = $('[name="name"]').val();
    let url = $('[name="url"]').val();
    let type = $('[name="type"]').val();
    let category = $('[name="category"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: web + '/admin/update',
        datatype: 'json',
        data: {
            id,
            name,
            url,
            type,
            category
        },
        success: function(result) { 
            console.log(result)
            // console.log(result[0])
            if(result.status == 'success')
            location.href = '.' + result.link;
            location.href = 'http://127.0.0.1:8000/admin/governance';
        },
        error: function(error) {
            console.log(error);
            // console.log(data)
        }
    });
}
</script>