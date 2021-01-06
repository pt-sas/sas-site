const ADMIN = '/admin/';

var ORI_URL = window.location.origin,
    SITE_URL = window.location.href,
    LAST_URL = SITE_URL.substr(SITE_URL.lastIndexOf('/') + 1), //the last url
    ADMIN_URL = ORI_URL + ADMIN;

var ID;

// Method default controller
const SHOWALL = '/showAll',
    CREATE = '/create',
    SHOW = '/show/',
    EDIT = '/edit',
    DELETE = '/destroy/';

// Modal
const modalForm = $('.modal_form');

const modalDialog = $('.modal-dialog'),
    modalTitle = $('.modal-title'),
    modalBody = $('.modal-body');

_table = $('.tb_display').DataTable({
    'ajax': SITE_URL + SHOWALL,
    'processing': true,
    'language': {
        'processing': '<i class="fas fa-spinner fa-spin fa-1x fa-fw"></i><span> Processing...</span>'
    },
    'columnDefs': [{
            'targets': -1,
            'orderable': false //nonaktif sort by
        },
        {
            'targets': 0,
            'visible': false //hide column
        }
    ],
    'autoWidth': true,
    'scrollX': true
    // 'fixedColumns': {
    //     'rightColumns': 1,
    //     'heightMatch': 'auto'
    // }
});

/**
 * Save 
 */
$('.save_form').click(function (e) {
    let formData;
    let url;

    const parent = $(e.target).closest('.form');
    const form = parent.find('form');

    //remove attribute disabled when field disabled
    form.find('input[type="checkbox"], select').removeAttr('disabled');

    if (setSave === 'add') {
        formData = form.serialize();
        url = SITE_URL + CREATE;
    } else {
        formData = form.serialize() + '&id=' + ID;
        url = SITE_URL + EDIT;
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        success: function (result) {
            if (result[0].error) {
                errorForm(form, result);
            } else {
                clearForm(form);
                modalForm.modal('hide');
                reloadTable();
            }
        }
    });
});

/**
 * Show data form
 */
_table.on('click', 'td:not(:last-child)', function (e) {
    e.preventDefault();
    const row = _table.row(this).data();

    openModalForm();
    Scrollmodal();
    Largemodal();
    modalTitle.html(row[3]);

    ID = row[0];
    let url = SITE_URL + SHOW + ID;

    setSave = 'update';
    const parent = modalForm.closest('.form');
    const form = parent.find('form');
    const field = form.find('input, textarea, select');

    $.getJSON({
        url: url,
        type: 'GET',
        dataType: 'JSON',
        success: function (result) {
            for (let i = 0; i < result.length; i++) {
                let fieldInput = result[i].field;
                let label = result[i].label;

                for (let i = 0; i < field.length; i++) {
                    if (field[i].name === fieldInput) {
                        parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').val(label);

                        parent.find('select[name=' + field[i].name + ']').val(label).change();

                        if (field[i].type === 'checkbox' && label === 'Y') {
                            form.find('input:checkbox[name=' + field[i].name + ']').prop('checked', true);
                        } else {
                            form.find('input:checkbox[name=' + field[i].name + ']').prop('checked', false);
                        }
                    }
                }
            }
        }
    });
});

function Destroy(id) {
    let url = SITE_URL + DELETE + id;
    Swal.fire({
        title: 'Delete?',
        text: "Are you sure you wish to delete the selected data ? ",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok',
        cancelButtonText: 'Close',
    }).then((data) => {
        if (data.value) //value is true
            $.post(url, function (result) {
                reloadTable()
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.info(errorThrown)
                reloadTable()
            });
    });
}

$(document).on('click', '.x_form, .close_form', function (e) {
    const parent = $(e.target).closest('.form');
    const form = parent.find('form');
    clearForm(form);
});

$('.active').change(function (e) {
    const parent = $(e.target).closest('.form_open');
    const field = parent.find('input, textarea, select');

    if ($(this).is(':checked'))
        for (let i = 0; i < field.length; i++) {
            let className = field[i].className.split(/\s+/)[1];
            parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').prop('readonly', false);
            if (field[i].type !== 'text' && className !== 'active') {
                parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', false);
            }
        }
    else
        for (let i = 0; i < field.length; i++) {
            let className = field[i].className.split(/\s+/)[1];
            parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').prop('readonly', true);
            if (field[i].type !== 'text' && className !== 'active') {
                parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', true);
            }
        }
});

function arrContains(value, arr) {
    var result = null;

    for (let i = 0; i < arr.length; i++) {
        var fieldName = arr[i];
        if (fieldName.toString().toLowerCase() === value.toString().toLowerCase()) {
            result = fieldName;
            break;
        }
    }
    return result;
}

function errorForm(parent, data) {
    const errorInput = parent.find('input[type="text"], textarea');
    const errorText = parent.find('small');

    var arrInput = [];
    var arrText = [];

    for (let i = 0; i < errorText.length; i++) {
        if (errorText[i].id !== '')
            arrText.push(errorText[i].id);
    }

    for (let k = 0; k < errorInput.length; k++) {
        arrInput.push(errorInput[k].name);
    }

    for (let j = 0; j < data.length; j++) {
        var error = data[j].error;
        var field = data[j].field;
        var labelMsg = data[j].label;

        var textName = arrContains(error, arrText);
        var inputName = arrContains(field, arrInput);

        if (labelMsg !== '') {
            parent.find('small[id=' + textName + ']').html(labelMsg);
            parent.find('input:text[name=' + inputName + '], textarea[name=' + inputName + ']').addClass('is-invalid');
        } else {
            parent.find('small[id=' + textName + ']').html('');
            parent.find('input:text[name=' + inputName + '], textarea[name=' + inputName + ']').removeClass('is-invalid');
        }
    }
}

function clearForm(parent) {
    const errorInput = parent.find('input[type="text"], textarea');
    const errorText = parent.find('small');

    parent[0].reset();

    for (let i = 0; i < errorInput.length; i++) {
        parent.find('input:text[name=' + errorInput[i].name + '], textarea[name=' + errorInput[i].name + ']')
            .prop('readonly', false)
            .removeClass('is-invalid');
    }

    for (let j = 0; j < errorText.length; j++) {
        if (errorText[j].id !== '')
            parent.find('small[id=' + errorText[j].id + ']').html('');
    }
}

function reloadTable() {
    _table.ajax.reload(null, false);
}

function openModalForm() {
    return modalForm.modal({
        backdrop: 'static',
        keyboard: false
    });
}

// add class scrollable in modal
function Scrollmodal() {
    return modalDialog.addClass('modal-dialog-scrollable');
}

// add class size modal large
function Largemodal() {
    return modalDialog.addClass('modal-lg');
}

// add class size modal small
function Smallmodal() {
    return modalDialog.addClass('modal-sm');
}

$(document).ready(function (e) {
    $('.select2').select2({
        placeholder: 'Select an option',
        width: '100%'
    });

    $('.number').on('keypress keyup blur', function (evt) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((evt.which < 48 || evt.which > 57)) {
            evt.preventDefault();
        }
    });
});