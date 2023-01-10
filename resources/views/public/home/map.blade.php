@extends('layouts.public')
@section('style')
    <style>
        .mapouter {
            margin-top: 15px;
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
        }

        .gmap_iframe {
            height: 400px !important;
        }
    </style>
@endsection
@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Bản đồ
         </h3>
   </div>
</div>
<div class="page-width">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=707&amp;height=400&amp;hl=en&amp;q=ngõ 77, Bùi xương trạch, Hà nội&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            <a href="https://embed-googlemap.com">google maps code generator</a>
        </div>
    </div>
</div> <!-- End page-width -->
@endsection