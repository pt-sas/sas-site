const ADMIN = '/backend/';

var ORI_URL = window.location.origin,
    SITE_URL = window.location.href,
    LAST_URL = SITE_URL.substr(SITE_URL.lastIndexOf('/') + 1), //the last url
    ADMIN_URL = ORI_URL + ADMIN;

var ID,
    _table,
    setSave;

// Method default controller
const SHOWALL = '/showAll',
    CREATE = '/create',
    SHOW = '/show/',
    EDIT = '/edit',
    DELETE = '/destroy/';

// view page class on div
const mainPage = $('.main_page'),
    formPage = $('.form_page'),
    companyPage = $('.company_page');

const cardTitle = $('.card-title');
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
 * Button new data
 */
$('.new_form').click(function (e) {
    const parent = $(e.target).closest('.row');
    const parentList = parent.prop('classList');
    const buttonList = parent.find('button').prop('classList');

    let form, ckbActive;

    for (let i = 0; i < parentList.length; i++) {
        if (parentList[i].toLowerCase() === 'main_page') {
            mainPage.hide();
            formPage.css('display', 'block');

            form = formPage.closest('.form');
            ckbActive = form.find('input[type="checkbox"].active');
            cardTitle.html('New ' + capitalize(LAST_URL));

        } else {
            openModalForm();
            Scrollmodal();
            for (let i = 0; i < buttonList.length; i++) {
                if (buttonList[i] === 'modal-lg')
                    Largemodal();
                else if (buttonList[i] === 'modal-sm')
                    Smallmodal();
            }
            form = modalForm.closest('.form');
            ckbActive = form.find('input[type="checkbox"].active');
            modalTitle.html('New ' + capitalize(LAST_URL));

        }
    }

    ckbActive.prop('checked', true);
    setSave = 'add';
});

/**
 * Save
 */
$('.save_form').click(function (e) {
    const parent = $(e.target).closest('.form');
    const form = parent.find('form');
    const classList = parent.prop('classList');

    let formData, url;

    const field = form.find('input[type="checkbox"], select');

    //remove attribute disabled when field disabled
    for (let i = 0; i < field.length; i++) {
        form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
    }

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
        // dataType: 'JSON',
        cache: false,
        dataType: 'JSON',
        beforeSend: function () {
            $('.save_form').attr('disabled', true);
            $('.x_form').attr('disabled', true);
            $('.close_form').attr('disabled', true);
            loadingForm(form.attr('id'), 'facebook');
        },
        complete: function () {
            $('.save_form').removeAttr('disabled');
            $('.x_form').removeAttr('disabled');
            $('.close_form').removeAttr('disabled');
            hideLoadingForm(form.attr('id'));
        },
        success: function (result) {
            if (result[0].success == true) {
                Toast.fire({
                    type: 'success',
                    title: result[0].message
                });

                clearForm(e)

                for (let i = 0; i < classList.length; i++) {
                    if (classList[i].toLowerCase() === 'form_page' || classList[i].toLowerCase() === 'modal_form') {
                        if (classList[i].toLowerCase() !== 'modal_form') {
                            mainPage.show();
                            formPage.css('display', 'none');
                        } else {
                            modalForm.modal('hide');
                        }

                        reloadTable();
                        // cardTitle.html(capitalize(LAST_URL));
                    }
                }
            } else if (result[0].error == true) {
                errorForm(form, result);
                hideLoadingForm(form.attr('id'));

            } else {
                Toast.fire({
                    type: 'error',
                    title: result[0].message
                });
            }
        }
    });

    for (let i = 0; i < field.length; i++) {
        let classList = field[i].className.split(/\s+/)[1];
        if (classList !== 'active') {
            if ($('.active').is(':checked')) {
                form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
            } else {
                form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', true);
            }
        }
    }
});


/**
 * Show data form
 */
_table.on('click', 'td:not(:last-child)', function (e) {
    e.preventDefault();
    const card = $(e.target).closest('.card');
    const rowList = card.closest('.row').prop('classList');
    const buttonList = card.find('button').prop('classList');

    let form, formList;

    ID = _table.row(this).data()[0];

    for (let i = 0; i < rowList.length; i++) {
        if (rowList[i].toLowerCase() === 'main_page') {
            mainPage.hide();
            formPage.css('display', 'block');

            form = formPage.closest('.form');
            formList = form.prop('classList');
        } else {
            openModalForm();
            Scrollmodal();
            for (let i = 0; i < buttonList.length; i++) {
                if (buttonList[i] === 'modal-lg')
                    Largemodal();
                else if (buttonList[i] === 'modal-sm')
                    Smallmodal();
            }
            form = modalForm.closest('.form');
            formList = form.prop('classList');
        }
    }

    const field = form.find('input, textarea, select');

    let url = SITE_URL + SHOW + ID;

    setSave = 'update';

    $.ajax({
        url: url,
        type: 'GET',
        async: false,
        cache: false,
        dataType: 'JSON',
        beforeSend: function () {
            $('.save_form').attr('disabled', true);
            $('.x_form').attr('disabled', true);
            $('.close_form').attr('disabled', true);
            loadingForm(form.find('form').prop('id'), 'facebook');
        },
        complete: function () {
            $('.save_form').removeAttr('disabled');
            $('.x_form').removeAttr('disabled');
            $('.close_form').removeAttr('disabled');
            hideLoadingForm(form.find('form').prop('id'));
        },
        success: function (result) {
            cardTitle.html(capitalize(LAST_URL));
            for (let i = 0; i < result.length; i++) {
                let fieldInput = result[i].field;
                let label = result[i].label;

                for (let i = 0; i < formList.length; i++) {
                    if (formList[i].toLowerCase() === 'show' && fieldInput === 'title') {
                        modalTitle.html(capitalize(label));
                    } else if (fieldInput === 'title') {
                        cardTitle.html(capitalize(label));
                    }
                }

                for (let i = 0; i < field.length; i++) {
                    if (field[i].name === fieldInput) {
                        let className = field[i].className.split(/\s+/)[1];
                        form.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').val(label);

                        form.find('select[name=' + field[i].name + ']').val(label).change();

                        if (field[i].type === 'checkbox' && label === 'Y') {
                            form.find('input:checkbox[name=' + field[i].name + ']').prop('checked', true);

                            if (className === 'active')
                                readonly(form, false);
                        } else {
                            form.find('input:checkbox[name=' + field[i].name + ']').removeAttr('checked');

                            if (className === 'active')
                                readonly(form, true);
                        }
                    }
                }
            }
        }
    });
});

/**
 * Button delete data
 */
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

/**
 * Button close form
 */
$(document).on('click', '.x_form, .close_form', function (evt) {
    if ($(evt.currentTarget).attr('data-dismiss') !== 'modal') {
        const parent = $(evt.target).closest('.row');
        const rowList = parent.prop('classList');

        for (let i = 0; i < rowList.length; i++) {
            if (rowList[i].toLowerCase() === 'form_page') {
                mainPage.show();
                formPage.css('display', 'none');
            }
        }
    }

    clearForm(evt);
    cardTitle.html(capitalize(LAST_URL));
});

$('input.active:checkbox').change(function (e) {
    const parent = $(e.target).closest('.form_open');
    const field = parent.find('input, textarea, select');

    if ($(this).is(':checked'))
        for (let i = 0; i < field.length; i++) {
            let className = field[i].className.split(/\s+/)[1];
            parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').removeAttr('readonly');

            if (field[i].type !== 'text' && className !== 'active') {
                parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
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
    const errorInput = parent.find('input[type="text"], select, textarea');
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
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').parent('div').addClass('has-error has-feedback');
        } else {
            parent.find('small[id=' + textName + ']').html('');
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').parent('div').removeClass('has-error has-feedback');
        }
    }
}

function clearForm(evt) {
    let closeList = $(evt.currentTarget).attr('class').split(/\s+/);
    const parent = $(evt.target).closest('.form');
    const form = parent.find('form');
    const field = form.find('input, textarea, select');
    const errorText = form.find('small');

    for (let i = 0; i < closeList.length; i++) {
        if (closeList[i].toLowerCase() === 'x_form' | closeList[i].toLowerCase() === 'close_form') {

            // clear data on the form
            for (let j = 0; j < form.length; j++) {
                form[j].reset();
            }

            // clear data, attribute readonly, attribute disabled on the field and remove class invalid
            for (let k = 0; k < field.length; k++) {
                let option = $(field[k]).find('option:selected');

                form.find('input:hidden[name=' + field[k].name + ']').val('');

                form.find('input[name=' + field[k].name + '], textarea[name=' + field[k].name + ']')
                    .removeAttr('readonly')
                    .parent('div').removeClass('has-error has-feedback');

                form.find('input:checkbox[name=' + field[k].name + ']')
                    .removeAttr('disabled');

                //logic clear data dropdown if not selected from the beginning
                if (option.length > 0 & option.val() !== '') {
                    form.find('select[name=' + field[k].name + ']')
                        .removeAttr('disabled')
                        .val(option.val()).change();
                } else {
                    form.find('select[name=' + field[k].name + ']')
                        .removeAttr('disabled')
                        .val(null).change();
                }
            }

            // clear text error element small
            for (let l = 0; l < errorText.length; l++) {
                if (errorText[l].id !== '')
                    form.find('small[id=' + errorText[l].id + ']').html('');
            }

        } else {
            for (let j = i; j < parent.length; j++) {
                let classList = parent[i].className.split(/\s+/);
                if (classList.includes('form_page') || classList.includes('modal_form')) {
                    form[0].reset();
                }
            }

            for (let k = 0; k < field.length; k++) {
                let option = $(field[k]).find('option:selected');

                form.find('input:hidden[name=' + field[k].name + ']').val('');

                form.find('input[name=' + field[k].name + '], textarea[name=' + field[k].name + ']')
                    .removeAttr('readonly')
                    .parent('div').removeClass('has-error has-feedback');

                form.find('input:checkbox[name=' + field[k].name + ']')
                    .removeAttr('disabled');

                //logic clear data dropdown if not selected from the beginning
                if (option.length > 0 & option.val() !== '') {
                    form.find('select[name=' + field[k].name + ']')
                        .removeAttr('disabled')
                        .val(option.val()).change();
                } else {
                    form.find('select[name=' + field[k].name + ']')
                        .removeAttr('disabled')
                        .val(null).change();
                }
            }

            for (let l = 0; l < errorText.length; l++) {
                if (errorText[l].id !== '')
                    form.find('small[id=' + errorText[l].id + ']').html('');
            }
        }
    }
}

function readonly(parent, value) {
    const field = parent.find('input, textarea, select');

    for (let i = 0; i < field.length; i++) {
        let className = field[i].className.split(/\s+/)[1];

        parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').prop('readonly', value);

        if (field[i].type !== 'text' && className !== 'active') {
            parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', value);
        }
    }
}

const capitalize = (s) => {
    if (typeof s !== 'string') return ''
    return s.charAt(0).toUpperCase() + s.slice(1)
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

    Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 4000
    });
});

$('.datepicker').datetimepicker({
    format: 'DD/MM/YYYY',
});

$('.timepicker').datetimepicker({
    format: 'H:mm:ss',
});

function loadingForm(selectorID, effect) {
    $('#' + selectorID + '').waitMe({
        effect: effect,
        text: 'Please wait...',
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        waitTime: -1,
        textPos: 'vertical',
        fontSize: '100%',
        source: '',
        onClose: function () {}
    });
}

function hideLoadingForm(selectorID) {
    $('#' + selectorID + '').waitMe('hide');
}

$(document).ready(function (evt) {
    const form = $('.form');
    const formList = form.prop('classList');

    $.each(formList, function (idx, elem) {
        if (elem !== 'form_page') {
            let hidden_ID = form.find('input.id:hidden');
            ID = hidden_ID.val();
        }
    });

    const field = form.find('input, textarea, select');

    let url = SITE_URL + SHOW + ID;

    setSave = 'update';

    $.getJSON({
        url: url,
        type: 'GET',
        dataType: 'JSON',
        success: function (result) {
            cardTitle.html(capitalize(LAST_URL));

            for (let i = 0; i < result.length; i++) {
                let fieldInput = result[i].field;
                let label = result[i].label;

                for (let i = 0; i < formList.length; i++) {
                    if (formList[i].toLowerCase() === 'show' && fieldInput === 'title') {
                        modalTitle.html(capitalize(label));
                    } else if (fieldInput === 'title') {
                        cardTitle.html(capitalize(label));
                    }
                }

                for (let i = 0; i < field.length; i++) {
                    if (field[i].name === fieldInput) {
                        form.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').val(label);

                        form.find('select[name=' + field[i].name + ']').val(label).change();
                    }
                }
            }
        }
    });
});