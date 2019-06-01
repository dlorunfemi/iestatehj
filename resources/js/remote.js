$(document).on('ajax:success', function(e, xhr){
    if(!$('#modal').length){
        $('body').append($('<div class="modal" id="modal"></div>'))
    }
   $('#modal').html(xhr.responseText).modal('show');
});