<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="th" xml:lang="th">
<head>
	<meta charset="utf-8" />
	<title>Osotspa สิทธิมนุษยชน</title>

@component('site.components.inc-script')
@endcomponent

   <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/social.css')}}">


</head>

<body>

@component('site.components.inc-header')
@endcomponent

<div class="bgSocial">

  <div class="sp-container">

  <div class="d-flex justify-content-start pt-5 mb-5">
  <a href="./" class="textNav active">สังคม <svg xmlns="http://www.w3.org/2000/svg" style=" margin-top:-4px;" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg></a> 
		<div class="textNav">สิทธิมนุษยชน</div>
	</div>
  </div>

  <div class="">
    <img src="{{asset('assets/site/img/social/social5.jpg')}}" class="img-fluid vPc">
    <img src="{{asset('assets/site/img/social/social5-mobi.jpg')}}" class="img-fluid vMobile">
  </div>


  <div class="occSec13">
    <div class="container-lg">

      <div class="d-flex justify-content-lg-between mb-3">
        <h4 class="textH3 textBule a">เอกสารดาวน์โหลด</h4>
        <h4 class="textH3 textBule a">ดาวน์โหลดไฟล์</h4>
      </div>
      
      <div class="pdf1" id="pdf1"></div>     

      <div class="underLine occ a mt-5 mb-5"></div>

    </div>
  </div>



  </div>

  @component('site.components.inc-footer')
  @endcomponent

</body>
</html>
<script>
  // GetAction_plan()
  GetAction_plan()
function GetAction_plan(){
        let web = $('[name="server"]').val();
        // let order_by = $('[name="order_by"]').val();
        let limit_data = $('[name="limit_data"]').val();
        let type = 'human_right';
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
            // order_by,
            type,
            // limit_data
        },
        success: function(result) { 
            console.log(result)
            let results = result[0]
            // console.log(results)
            html_3 = ''
            results.forEach(value => {
            console.log(value)
                    // if(value.type == 'consumer_health') <a href="{{ asset('uploads/${value.file_name}') }}" target="_blank">
                        html_3 += `
                        
                          <div class="d-lg-flex justify-content-lg-between align-items-lg-center mt-2">
                            <div class="textBody textBule">${value.name}</div>
                             <div class="boxBtnDownload">
                                <a href = "{{url('/uploads/${value.file_name}')}}" target="_blank">
                                  <img src="{{ asset('assets/site/img/social/btnDownload.png') }}" title="" class="icon01" />
                                </a>
                              </div>
                            </div>
                          </div>
                          `
                      });
              $('#pdf1').html(html_3)
             
          },
          error: function(error) {
              console.log(error);
          }
      });
  }
  
  </script>
