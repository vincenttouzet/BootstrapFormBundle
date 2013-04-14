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
            $(this).datepicker({
                format: 'yyyy-mm-dd',
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
    });
})(jQuery);