var $btn = $('.searchType');
var $items = $('div .item');
$($btn).click(function() {
    for(var i=0;i<$items.length;i++) {

        if($($items[i]).attr("data-type") == $(this).attr('data-search')) {
            jQuery($items[i]).show();
        } else {
            jQuery($items[i]).hide();
        }

        if($(this).attr('data-search') == "all") {
            jQuery($items[i]).show();
        }
    }
})