(function($) {
    "use strict";
    $(document).ready(function() {
        /**
         * DatePicker
         */
        $('.bootstrap-datepicker').each(function() {
            var $input = $('input', this),
                week_start = $input.data('week-start'),
                calendar_weeks = $input.data('calendar-weeks'),
                days_of_week_disabled = $input.data('days-of-week-disabled'),
                autoclose = $input.data('autoclose'),
                view_mode = $input.data('view-mode'),
                min_view_mode = $input.data('min-view-mode'),
                today_btn = $input.data('today-btn'),
                today_highlight = $input.data('today-highlight'),
                clear_btn = $input.data('clear-btn'),
                language = $input.data('language'),
                options = {
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
                },
                start_date = $input.data('start-date'),
                end_date = $input.data('end-date');
            if (start_date && (start_date.substr(0,1)=='+' || start_date.substr(0,1)=='-')) {
                options.startDate = start_date;
            }else if(start_date){
                options.startDate = new Date(start_date);
            }
            if (end_date && (end_date.substr(0,1)=='+' || end_date.substr(0,1)=='-')) {
                options.endDate = end_date;
            }else if(start_date){
                options.endDate = new Date(end_date);
            }
            $(this).datepicker(options);
        });
        /**
         * TimePicker
         */
        $('.bootstrap-timepicker input').each(function() {
            $(this).timepicker({
                showMeridian: false,
                defaultTime: false
            });
        });
        /**
         * DateRangePicker
         */
        $('.bootstrap-daterangepicker input').each(function() {
            var $input = $(this),
                opens = $input.data('opens'),
                separator = $input.data('separator'),
                showWeekNumbers = $input.data('show-week-numbers'),
                showDropdowns = $input.data('show-dropdowns'),
                minDate = $input.data('min-date'),
                maxDate = $input.data('max-date'),
                dateLimit = $input.data('date-limit'),
                ranges = $input.data('ranges'),
                locale = $input.data('locale'),
                options = {
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
            if (ranges) {
                options.ranges = ranges;
            }
            $input.daterangepicker(options);
        });
        /**
         * ColorPicker
         */
        $('.bootstrap-colorpicker').each(function() {
            $(this).colorpicker();
        });
        /**
         * ColorPicker
         */
        $('.bootstrap-slider').each(function() {
            $(this).slider();
        });
        /**
         * Knob
         */
        $('.knob').each(function() {
            $(this).knob();
        });
        /**
         * Chosen
         */
        $('.chzn-select').each(function() {
            var $input = $(this),
                no_results_text = $input.data('no-result-text'),
                allow_single_deselect = $input.data('allow-single-deselect'),
                options = {};

            if (no_results_text) {
                options.no_results_text = no_results_text;
            }

            if (allow_single_deselect) {
                options.allow_single_deselect = allow_single_deselect;
            }

            $(this).chosen(options);
        });
    });
}(jQuery));
