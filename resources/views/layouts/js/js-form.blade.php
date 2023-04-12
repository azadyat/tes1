<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Validate js form  -->
<script src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Page script -->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker4, #datetimepicker41').datetimepicker({
            format: 'L', // viewMode: 'years',
            // format: 'YYYY-MM-DD'
        });
    });
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        // Summernote
        $('.textarea').summernote()
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        // $('[data-mask]').inputmask()

        //Date range picker
        // $('#reservation').daterangepicker()
        //Date range picker with time picker
        // $('#reservationtime').daterangepicker({
        //     timePicker: true,
        //     timePickerIncrement: 30,
        //     locale: {
        //         format: 'MM/DD/YYYY hh:mm A'
        //     }
        // })
        //Date range as a button
        // $('#daterange-btn').daterangepicker(
        //     {
        //         ranges   : {
        //             'Today'       : [moment(), moment()],
        //             'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //             'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        //             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //             'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        //             'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //         },
        //         startDate: moment().subtract(29, 'days'),
        //         endDate  : moment()
        //     },
        //     function (start, end) {
        //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        //     }
        // )

        // Timepicker
        $('#timepicker, #timepicker1').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        // $('.my-colorpicker2').on('colorpickerChange', function(event) {
        //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        // });
        //
        // $("input[data-bootstrap-switch]").each(function(){
        //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
        // });

    });

</script>

{{--@include('_card.custom-validate')--}}

<script>

    $(document).ready(function () {
        $('#myForm')
            .bootstrapValidator({
                // feedbackIcons: {
                //     valid: 'glyphicon glyphicon-ok',
                //     invalid: 'glyphicon glyphicon-remove',
                //     validating: 'glyphicon glyphicon-refresh'
                // },
                // fields: {
                // username: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The username is required '
                //         },
                //         stringLength: {
                //             min: 6,
                //             max: 30,
                //             message: 'The username must be more than 6 and less than 30 characters long'
                //         },
                //         regexp: {
                //             regexp: /^[a-zA-Z0-9]+$/,
                //             message: 'The username can only consist of alphabetical and digits'
                //         }
                //     }
                // }
                // }
            })
            .on('error.validator.bv', function (e, data) {
                // $(e.target)    --> The field element
                // data.bv        --> The BootstrapValidator instance
                // data.field     --> The field name
                // data.element   --> The field element
                // data.validator --> The current validator name
                data.element
                    .data('bv.messages')
                    // Hide all the messages
                    .find('.help-block[data-bv-for="' + data.field + '"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-bv-validator="' + data.validator + '"]').show();
            });
    });

</script>

