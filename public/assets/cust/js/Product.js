$('#new_product').click(function (e) {
    openModalForm();
    Scrollmodal();
    Largemodal();
    modalTitle.text('New Product');
    $('#pro_isactive').prop('checked', true);
    setSave = 'add';
});