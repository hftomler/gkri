$('.upload').click(function(){
    $('input[type=file]').click();
    return false;
});

$("input[type='file']").change(function() {
    this.form.submit();
});

$('#imagen-avatar').next().addClass('dropdown-menu-left');
