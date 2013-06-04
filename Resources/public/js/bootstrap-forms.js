(function($){
    $(document).ready(function(){
        /**
         * DatePicker
         */
        $('.bootstrap-datepicker').each(function(){
            var $input = $('input', this);
            var week_start = $input.data('week-start');
            var calendar_weeks = $input.data('calendar-weeks');
            var days_of_week_disabled = $input.data('days-of-week-disabled');
            var autoclose = $input.data('autoclose');
            var view_mode = $input.data('view-mode');
            var min_view_mode = $input.data('min-view-mode');
            var today_btn = $input.data('today-btn');
            var today_highlight = $input.data('today-highlight');
            var clear_btn = $input.data('clear-btn');
            var language = $input.data('language');
            var options = {
                weekStart: week_start,
                calendarWeeks: calendar_weeks,
                daysOfWeekDisabled: days_of_week_disabled,
                autoclose: autoclose,
                viewMode: view_mode,
                minViewMode: min_view_mode,
                todayBtn: today_btn,
                todayHighlight: today_highlight,
                clearBtn: clear_btn,
                language: language
            };
            var start_date = $input.data('start-date');
            if (start_date) {
                options.startDate = new Date(start_date);
            }
            var end_date = $input.data('end-date');
            if (end_date) {
                options.endDate = new Date(end_date);
            }
            console.log(options);
            $(this).datepicker(options);
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
        });
        /**
         * ColorPicker
         */
        $('.bootstrap-slider').each(function(){
            $(this).slider();
        });
        /**
         * Knob
         */
        $('.knob').each(function(){
            $(this).knob();
        });
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
            $(this).chosen(options);
        });
    });
})(jQuery);