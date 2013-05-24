(function($){
    $(document).ready(function(){
        /**
         * DatePicker
         */
        $('.bootstrap-datepicker').each(function(){
            var $input = $('input', this);
            var week_start = $input.data('week-start');
            var view_mode = $input.data('view-mode');
            var min_view_mode = $input.data('min-view-mode');
            var format = $input.data('format');
            $(this).datepicker({
                format: format,
                weekStart: week_start,
                viewMode: view_mode,
                minViewMode: min_view_mode
            });
        });
        /**
         * TimePicker
         */
        $('.bootstrap-timepicker input').each(function(){
            $(this).timepicker({
                showMeridian: false,
                defaultTime: false
            });
        });
        /**
         * DateRangePicker
         */
        $('.bootstrap-daterangepicker input').each(function(){
            var $input = $(this);
            var opens = $input.data('opens');
            var separator = $input.data('separator');
            var showWeekNumbers = $input.data('show-week-numbers');
            var showDropdowns = $input.data('show-dropdowns');
            var minDate = $input.data('min-date');
            var maxDate = $input.data('max-date');
            var dateLimit = $input.data('date-limit');
            var ranges = $input.data('ranges');
            var locale = $input.data('locale');

            var options = {
                format: 'yyyy-MM-dd',
                opens: opens,
                separator: separator,
                showWeekNumbers: showWeekNumbers,
                showDropdowns: showDropdowns,
                minDate: minDate,
                maxDate: maxDate,
                dateLimit: dateLimit,
                locale: locale
            };
            if ( ranges ) {
                options.ranges = ranges;
            }
            $input.daterangepicker(options);
        });
        /**
         * ColorPicker
         */
        $('.bootstrap-colorpicker').each(function(){
            $(this).colorpicker();
        })
        /**
         * ColorPicker
         */
        $('.bootstrap-slider').each(function(){
            $(this).slider();
        })
        /**
         * Chosen
         */
        $('.chzn-select').each(function(){
            var $input = $(this);
            var no_results_text = $input.data('no-result-text');
            var options = {};
            if ( no_results_text ) {
                options.no_results_text = no_results_text;
            }
            console.log(options);
            $(this).chosen(options);
        })
    });
})(jQuery);