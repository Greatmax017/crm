import $ from 'jquery'

(function($) { 
    "use strict";
        
    $(document).ready(function() {
        $('body').removeClass('loading').hide()

        setTimeout(() => {
            $('body').show()
        }, 100)
    })
})($)