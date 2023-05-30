<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="th" xml:lang="th">
<head>
	<meta charset="utf-8" />
	<title>Osotspa Social</title>

  @component('site.components.inc-script')
  @endcomponent

   <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/social.css')}}">

</head>

<body>
<div class="bgSocial page1">

  @component('site.components.inc-header')
  @endcomponent

<div class="sec01">
  <div class="sp-container">

    <h1 class="boxTextHeader page1 textHeader w text-center text-uppercase">social <br>(สังคม) ยกระดับคุณภาพชีวิต</h1>

  </div>
</div>

</div>

<div class="sec02">
  <div class="sp-container">

  	<h2 class="textHeader w mb-5">สังคม</h2> 
    <div class="container-sm">
	<div class="row g-5">
      <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/health-well-being-consumers" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon01.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">consumer health & <br>well-being</h4>
          <p class="textBody textGray">สุขภาพและสุขภาวะที่ดีของผู้บริโภค</p>
        </a>
      </div>
      <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/occupational-health-safety" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon02.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">health and safe <br>work environment</h4>
          <p class="textBody textGray">อาชีวอนามัยและความปลอดภัย</p>
        </a>
      </div>
      <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/social-contributions-investments" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon03.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">Citizenship <br>& Philanthropy</h4>
          <p class="textBody textGray">การบริจาคและ<br>การลงทุนเพื่อสังคม </p>
        </a>
      </div>
	    <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/human-resource-development-labor-practices" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon04.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">human capital<br> & Lador practices</h4>
          <p class="textBody textGray">การพัฒนาทรัพยากรบุคคล<br>และการปฏิบัติด้านแรงงาน</p>
        </a>
      </div>
      <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/human-rights" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon05.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">hunman right</h4>
          <p class="textBody textGray">สิทธิมนุษยชน</p>
        </a>
      </div>
      <div class="col-lg-4 d-flex align-self-stretch justify-content-md-center">
        <a href="{{ url('social') }}/marketing-responsible-communication-product-labels" class="boxSocial">
          <img src="{{asset('assets/site/img/social/page1/icon06.png')}}" class="img-fluid">
          <h4 class="textPage1 text-uppercase mt-3 mb-3">ethical <br>marketingt</h4>
          <p class="textBody textGray">การทำตลาดการสื่อสารอย่าง<br>รับผิดชอบ และฉลากสินค้า  </p>
        </a>
      </div>
    </div>
    </div>

  </div>
</div>

</div>

  @component('site.components.inc-footer')
  @endcomponent

</body>
</html>
