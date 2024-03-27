<form role="search" method="get" class="search_form" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="search-field" placeholder="Search..." name="s" id="search-input" />
    <button id="search_btn" type="submit">Search</button>
</form>
<div id="search-results"></div>

<script>
jQuery(document).ready(function($) {
    $('#search-input').on('keyup', function() {
        var searchTerm = $(this).val();
        if (searchTerm.length > 2) { // Adjust minimum characters to trigger

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', 
                type: 'POST',
                data: {
                    action: 'my_ajax_search',
                    search: searchTerm
                },
                success: function(response) {
                    $('#search-results').html(response); 
                }
            });
        } else {
            $('#search-results').html(''); // Clear results on short input
        }
    });
});
</script> 
