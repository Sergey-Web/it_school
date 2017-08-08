$(document).ready(function(){

    $('.news__edit').on('click', function(e){
        var newsId = $(this).data('id');
        var newsTitle = $(this).closest('.news').find('.news__title').text();
        console.log(newsTitle);
        var newsContent = $(this).closest('.new__control-buttons').siblings('.news__content').find('.news__text').text();
        $('#newsSendEdit').val(newsId);
        $('.form-edit-news__title').val(newsTitle);
        $('.form-edit-news__content').text(newsContent);
    });

    $('.news__delete').on('click', function(e){
        var newsId = $(this).data('id');
        $('#newsSendDel').val(newsId);
    });

});
