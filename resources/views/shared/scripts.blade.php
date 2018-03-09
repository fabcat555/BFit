<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.sparkline.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}"></script>
{{--  <script type="text/javascript" src="{{ asset('js/gritter/js/jquery.gritter.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/gritter-conf.js') }}"></script>  --}}
<!--script for this page-->
{{--  <script src="{{ asset('js/sparkline-chart.js') }}"></script>  --}}
{{--  <script src="{{ asset('js/zabuto_calendar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/js/i18n/defaults-it_IT.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/js/i18n/defaults-en_US.js') }}"></script>
@stack('script')