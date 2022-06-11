/**
 * swapimagesonhover - v1.0.0 - 2018-04-16
 * https://github.com/chigozieorunta/swapimagesonhover
 *
 * Copyright (c) 2018 Chigozie Orunta
 * Licensed MIT <https://github.com/chigozieorunta/swapimagesonhover/blob/master/LICENSE>
**/

(function($) {	
    $(document).ready(function() {
        $('.swim').each(function(index, element) {   
            var dataImage = $(this).data("img");
            var dataClass = $(this).attr("class");
            $(this).after('<img src="' + dataImage + '" class= "' + dataClass + '"/>');
            $(this).parent().children('img').wrapAll('<div class="swim-container"></div>');
        });
    })
})( jQuery );
