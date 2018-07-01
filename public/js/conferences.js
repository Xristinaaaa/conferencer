(() => {
    $(document).ready(function() {
        const $filters = $('#filters'),
            $sorts = $('#sorts');

        // bind filter button click
        $filters.on('click', 'button', function() {
            let filterValue = $(this).attr('data-filter');
            filterValue = filterValue != '*' ? '.' + filterValue : filterValue;
            $('.grid').isotope({ filter: filterValue });
        });

        // change is-checked class on buttons
        $('.button-group').each(function(i, buttonGroup) {
            let $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });

        //when filter button clicked
        $filters.click(function() {
            $(this).data('clicked', true);
        });
    });
})();