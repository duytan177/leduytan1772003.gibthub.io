@extends('front.master')

<!--Google map-->
<style>
.map-container-3{
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}
.map-container-3 iframe{
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}


</style>
@section('content')
    <h1 style="text-align: center; color:red">Vị trí cửa hàng thời trang của chúng tôi trên bản đồ</h1>
<div id="map-container-google-3" class="z-depth-1-half map-container-3">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4135.400067898276!2d108.2501609506185!3d15.975293088884644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.!5e1!3m2!1sen!2s!4v1668433289185!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection


