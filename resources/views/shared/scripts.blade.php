<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>

<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/js/i18n/defaults-it_IT.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.12.4/js/i18n/defaults-en_US.js') }}"></script>
@stack('script')