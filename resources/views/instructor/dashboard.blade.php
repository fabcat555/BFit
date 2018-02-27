@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-6 col-sm-6 mb">
                        <div class="white-panel pn donut-chart">
                            <div class="white-header">
                                <h5>SERVER LOAD</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p><i class="fa fa-database"></i> 70%</p>
                                </div>
                            </div>
                            <canvas id="serverstatus01" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [
                                                                    {
                                                                        value: 70,
                                                                        color:"#68dff0"
                                                                    },
                                                                    {
                                                                        value : 30,
                                                                        color : "#fdfdfd"
                                                                    }
                                                                ];
                                                                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5>TOP USER</h5>
                            </div>
                            <p><img src="{{ asset('img/ui-zac.jpg') }}" class="img-circle" width="80"></p>
                            <p><b>Zac Snider</b></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">MEMBER SINCE</p>
                                    <p>2012</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">TOTAL SPEND</p>
                                    <p>$ 47,60</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /First row -->
                <!-- Second row -->
                <div class="row">
                    <!-- /col-md-4 -->
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- INSTAGRAM PANEL -->
                        <div class="instagram-panel pn">
                            <i class="fa fa-instagram fa-4x"></i>
                            <p>@THISISYOU<br/> 5 min. ago
                            </p>
                            <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- REVENUE PANEL -->
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>REVENUE</h5>
                            </div>
                            <div class="chart mt">
                                <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff"
                                    data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4"
                                    data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                            </div>
                            <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /Second row -->
                <!-- Third row -->
                <div class="row mt">
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5>TOP USER</h5>
                            </div>
                            <p><img src="{{ asset('img/ui-zac.jpg') }}" class="img-circle" width="80"></p>
                            <p><b>Zac Snider</b></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">MEMBER SINCE</p>
                                    <p>2012</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">TOTAL SPEND</p>
                                    <p>$ 47,60</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5>TOP USER</h5>
                            </div>
                            <p><img src="{{ asset('img/ui-zac.jpg') }}" class="img-circle" width="80"></p>
                            <p><b>Zac Snider</b></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">MEMBER SINCE</p>
                                    <p>2012</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">TOTAL SPEND</p>
                                    <p>$ 47,60</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /Third row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection