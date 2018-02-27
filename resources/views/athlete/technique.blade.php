@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.Techniques')
        </h3>
        <!-- page start-->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4 class="bm-heading">
                            <i class="fa fa-angle-right"></i> Superset
                        </h4>
                        <div class="panel-body">
                            <p class="technique-description">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est nihil mollitia, blanditiis dolore nam deserunt eaque at, voluptates vel qui molestiae, itaque omnis aut. Esse obcaecati doloribus at cupiditate maxime!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam sit consequatur doloremque quisquam atque cupiditate, incidunt a quam nihil, explicabo reprehenderit, quod et fugiat voluptas aliquid officia! Sunt, dolore dolorem.
                                Temporibus suscipit hic expedita soluta, fugit consectetur repellat impedit necessitatibus sint laborum pariatur doloribus sequi rem aspernatur ipsum quas iusto ut illum in consequuntur perspiciatis possimus et alias numquam! Architecto!
                                Ratione debitis odit architecto porro rem vitae modi totam labore alias, ipsam quod excepturi fugiat voluptate nostrum nihil quae odio incidunt! Iure harum necessitatibus a sequi earum quos atque exercitationem?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- page end-->
    </section>
</section>
@endsection