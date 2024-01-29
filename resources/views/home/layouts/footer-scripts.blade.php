<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>




    @stack('scripts')

    <script src="{{ URL::asset('/temp/summernote/summernote-bs4.min.js') }}"></script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/all.js') }}"></script> --}}
<script src="{{ URL('https://use.fontawesome.com/c2df8da394.js') }}"></script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Toastr.js CSS and JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        // Handle the "Add to Wishlist" click event
        $('.wishlist').on('click', function(event) {
            event.preventDefault();

            var product_id = $(this).closest('form').find('input[name="product_id"]').val();
            var url = '{{ route('wishlist.add') }}';

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': product_id,
                },
                success: function(response) {
                    if (response.success) {
                        alert('Added to your favorites successfully');
                    } else {
                        alert('Added to your favorites successfully');
                    }
                },
                error: function(xhr, status, error) {
                    alert('The product is already in your favorites.');
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>

    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>


