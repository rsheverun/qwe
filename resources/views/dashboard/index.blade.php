@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">Statistics</span>
    </div>
</div>
<div class="row statistics">
    <div class="col-md-4  col-xs-12 text-center">
        <h4 class="number">476</h4>
        <p class="text-statistics">Total number of images per camera</p>
    </div>
    <div class="col-md-4 col-xs-12 text-center">
        <h4 class="number">12</h4>
        <p class="text-statistics">images last 24 hour per camera</p>
    </div>
    <div class="col-md-4 col-xs-12 text-center">
        <h4 class="number">4</h4>
        <p class="text-statistics">number of cameras with 0 and >1 image last 24h</p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">activity stream</span>
    </div>
</div>
<div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
        <button type="button" class="btn btn-outline-success button-look button-img btn-green" >look more</button>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset('img/img1.png')}}" class="zoom img-fluid" alt="">
    </div>
</div>
<hr>
<div class="row activity no-image">
    <div class="col-6">
         <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
    </div>
        <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-success button-look btn-green">look more</button>
           
    </div>
</div>
<hr>
<div class="row activity no-image">
    <div class="col-6">
         <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
    </div>
        <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-success button-look btn-green">look more</button>
           
    </div>
</div>
<hr>
<div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
        <button type="button" class="btn btn-outline-success button-look button-img btn-green">look more</button>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset('img/img2.png')}}" class="zoom img-fluid" alt="">
    </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- <div class="" data-href="{{Request::url()}}" data-layout="button_count" 
    data-size="small" data-mobile-iframe="true">
    <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fdashboard%2Fimages&amp;src=sdkpreparse', 
                         'newwindow', 
                         'width=300,height=250'); 
              return false;"
               target="_blank" 
               href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse" 
               class="fb-xfbml-parse-ignore">Поделиться</a>
               </div> -->
               <div class="fb-share-button" 
    ddata-href="{{Request::url()}}"
    data-layout="button_count">
  </div>

  <div id="fb-share-button">
    <span>Share</span>
</div>
<script>
  var fbButton = document.getElementById('fb-share-button');
var url = window.location.href;

fbButton.addEventListener('click', function() {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
        'facebook-share-dialog',
        'width=800,height=600'
    );
    return false;
});
</script>

 <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url="http://127.0.0.1:8000/dashboard/images"></script>
@endsection