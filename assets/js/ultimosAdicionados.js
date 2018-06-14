$(document).ready(function () {
    $('.block2-name').each(function () {
        if($(this).text().length > 65){
            $(this).text($(this).text().substring(0, 65) + '...');
        }
    });
});