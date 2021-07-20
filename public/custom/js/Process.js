/**
 * Proses for execute form master data dynamic element HTML
 *
 * @author Oki Permana
 * @version 1.0
 */
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
let cardMain = $('.card-main'),
    cardForm = $('.card-form'),
    cardBtn = $('.card-button'),
    cardTitle = $('.card-title');

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

function reloadTable() {
    _table.ajax.reload(null, false);
}

/**
 * Save
 */
$('.save_form').click(function (evt) {
    const parent = $(evt.target).closest('.row');
    const form = parent.find('form');
    cardForm = parent.find('.card-form');

    let formData = new FormData(form[0]);
    let url;

    const field = form.find('input[type="checkbox"], select, input[type="radio"], input[type="file"]');

    //remove attribute disabled when field disabled
    for (let i = 0; i < field.length; i++) {
        if (field[i].name !== '') {
            form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
        }
    }

    if (setSave === 'add') {
        url = SITE_URL + CREATE;
    } else {
        formData.append('id', ID);
        url = SITE_URL + EDIT;
    }

    for (let i = 0; i < field.length; i++) {
        if (field[i].name !== '') {
            if (field[i].type == 'radio') {
                if (field[i].checked) {
                    formData.append(field[i].name, field[i].value);
                }
            }

            if (field[i].type == 'file' && field[i].className.includes('control-upload-image')) {
                // Check condition upload add new image or not upload
                if (field[i].files.length > 0) {
                    formData.append(field[i].name, field[i].files[0]);
                } else {
                    let source = form.find('.img-result').attr('src');
                    let imgSrc;

                    if (source !== '') {
                        imgSrc = source.substr(source.lastIndexOf('/') + 1);
                    } else {
                        imgSrc = source;
                    }

                    formData.append(field[i].name, imgSrc);
                }
            }
        }
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        async: false,
        cache: false,
        dataType: 'JSON',
        beforeSend: function () {
            $('.save_form').prop('disabled', true);
            $('.x_form').prop('disabled', true);
            $('.close_form').prop('disabled', true);
            loadingForm(form.prop('id'), 'facebook');
        },
        complete: function () {
            $('.save_form').removeAttr('disabled');
            $('.x_form').removeAttr('disabled');
            $('.close_form').removeAttr('disabled');
            hideLoadingForm(form.prop('id'));
        },
        success: function (result) {
            if (result[0].success) {
                Toast.fire({
                    type: 'success',
                    title: result[0].message
                });

                clearForm(evt);

                if (!cardForm.prop('classList').contains('modal')) {
                    cardMain.css('display', 'block');
                    cardForm.css('display', 'none');
                    cardBtn.css('display', 'none');
                    const cardHeader = parent.find('.card-header');
                    const btnList = cardHeader.find('button');

                    $.each(btnList, function () {
                        const btnClass = this.classList;
                        if (btnClass.contains('new_form')) {
                            $(this).show();
                        }
                    });
                } else {
                    modalForm.modal('hide');
                }

                cardTitle.html(capitalize(LAST_URL));

                reloadTable();

            } else if (result[0].error) {
                errorForm(form, result);
                hideLoadingForm(form.prop('id'));

            } else {
                Toast.fire({
                    type: 'error',
                    title: result[0].message
                });
            }
        },
        error: function (jqXHR, exception) {
            showError(jqXHR, exception);
        }
    });

    // logic after insert / update data to set attribute based on field isactive condition
    for (let i = 0; i < field.length; i++) {
        if (field[i].name !== '') {
            let className = field[i].className.split(/\s+/);

            if (form.find('input.active').is(':checked')) {
                form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
            } else {
                if (!className.includes('active')) {
                    form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', true);
                }
            }
        }
    }
});

/**
 * Button edit data
 * Show data on the form
 * @param {*} id data
 */
function Edit(id) {
    ID = id;

    let form, formList;

    if (cardMain.length > 0) {
        cardMain.css('display', 'none');
        cardForm.css('display', 'block');

        if (!cardForm.prop('classList').contains('modal')) {
            cardBtn.css('display', 'block');
            const card = cardForm.closest('.card');
            const btnList = card.find('.card-header').find('button');

            $.each(btnList, function () {
                const btnClass = this.classList;
                if (btnClass.contains('new_form')) {
                    $(this).hide();
                }
            });

            formList = cardForm.prop('classList');
            form = cardForm.find('form');
        } else {
            cardMain.css('display', 'block');
            cardForm.css('display', 'none');
            formList = cardForm.prop('classList');
            form = cardForm.find('form');
        }
    } else {
        openModalForm();
        Scrollmodal();
        form = modalForm.find('form');
        formList = cardForm.prop('classList');
    }

    const field = form.find('input, textarea, select');
    const summernote = form.find('textarea.summernote');

    let url = SITE_URL + SHOW + ID;

    setSave = 'update';

    $.ajax({
        url: url,
        type: 'GET',
        // async: false,
        cache: false,
        dataType: 'JSON',
        beforeSend: function () {
            $('.save_form').attr('disabled', true);
            $('.x_form').attr('disabled', true);
            $('.close_form').attr('disabled', true);
            loadingForm(form.prop('id'), 'facebook');
        },
        complete: function () {
            $('.save_form').removeAttr('disabled');
            $('.x_form').removeAttr('disabled');
            $('.close_form').removeAttr('disabled');
            hideLoadingForm(form.prop('id'));
        },
        success: function (result) {
            for (let i = 0; i < result.length; i++) {
                let fieldInput = result[i].field;
                let label = result[i].label;

                if (formList.contains('modal') && fieldInput === 'title') {
                    modalTitle.html(capitalize(label));
                } else if (fieldInput === 'title') {
                    cardTitle.html(capitalize(label));
                }

                for (let i = 0; i < field.length; i++) {
                    if (field[i].name !== '' && field[i].name === fieldInput) {
                        let className = field[i].className.split(/\s+/);

                        form.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').val(label);

                        if (form.find('textarea.summernote[name=' + field[i].name + ']').length > 0) {
                            $('[name =' + field[i].name + ']').summernote('code', label);
                        }

                        form.find('select[name=' + field[i].name + ']').val(label).change();

                        // Set condition value checked for field type Checkbox based on database
                        if (field[i].type === 'checkbox' && label === 'Y') {
                            form.find('input:checkbox[name=' + field[i].name + ']').prop('checked', true);

                            if (className.includes('active'))
                                readonly(form, false);
                        } else {
                            form.find('input:checkbox[name=' + field[i].name + ']').removeAttr('checked');

                            if (className.includes('active'))
                                readonly(form, true);
                        }

                        // Set value checked for field type Radio Button
                        if (field[i].type == 'radio') {
                            if (field[i].value == label) {
                                field[i].checked = true;
                            }
                        }

                        if (field[i].type === 'file' && label !== null) {
                            previewImage(form.find('input:file')[0], '', label);
                        } else if (field[i].type === 'file' && label === null) {
                            previewImage(form.find('input:file')[0], '', label);
                        }
                    }
                }
            }

            $('html, body').animate({
                scrollTop: $('.row').offset().top
            }, 500);
        },
        error: function (jqXHR, exception) {
            showError(jqXHR, exception);
        }
    });
}

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
        confirmButtonColor: '#d33',
        confirmButtonText: 'Okay',
        cancelButtonText: 'Close',
        reverseButtons: true
    }).then((data) => {
        if (data.value) //value is true

            $.post(url, function (result) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your data has been deleted.',
                    type: 'success',
                    timer: 1000,
                })
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
 * @x_form button only in modal
 * @close_form button in card-action
 */
$(document).on('click', '.x_form, .close_form', function (evt) {
    if ($(evt.currentTarget).attr('data-dismiss') !== 'modal') {
        const parent = $(evt.target).closest('.row');
        cardMain.css('display', 'block');
        cardForm.css('display', 'none');
        cardBtn.css('display', 'none');

        const cardHeader = parent.find('.card-header');
        const btnList = cardHeader.find('button').prop('classList');

        if (btnList.contains('new_form')) {
            cardHeader.find('button').show();
        }
    }

    clearForm(evt);
    cardTitle.html(capitalize(LAST_URL));

    $('html, body').animate({
        scrollTop: $('.row').offset().top
    }, 500);
});

/**
 * Button new data
 */
$('.new_form').click(function (evt) {
    const parent = $(evt.target).closest('.row');
    const main = parent.find('.card-main');

    let form;

    if (main.length > 0) {
        cardMain.css('display', 'none');
        cardForm.css('display', 'block');

        if (!cardForm.prop('classList').contains('modal')) {
            cardBtn.css('display', 'block');
            cardTitle.html('New ' + capitalize(LAST_URL));

            $(this).hide();
            form = cardForm;
            form.find('input[type="checkbox"].active').prop('checked', true);
        } else {
            cardMain.css('display', 'block');
            cardForm.css('display', 'none');
        }
    } else {
        openModalForm();
        Scrollmodal();
        form = modalForm.find('form');
        modalTitle.html('New1 ' + capitalize(LAST_URL));
        form.find('input[type="checkbox"].active').prop('checked', true);
    }

    setSave = 'add';
});

/**
 * Process for aktif nonaktif field in the form using checkbox class active
 */
$('input.active:checkbox').change(function (evt) {
    const parent = $(this).closest('form');
    const field = parent.find('input, textarea, select');
    let className;

    if ($(this).is(':checked')) {
        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                className = field[i].className.split(/\s+/);
                parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').removeAttr('readonly');

                if (field[i].type !== 'text' && !className.includes('active')) {
                    parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');

                    if (field[i].type === 'file') {
                        parent.find('input[name=' + field[i].name + ']').removeAttr('disabled');
                        parent.find('button.close-img').removeAttr('disabled');
                    }
                }

                if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0) {
                    $('[name =' + field[i].name + ']').summernote('enable');
                }
            }
        }
    } else {
        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                className = field[i].className.split(/\s+/);
                parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').prop('readonly', true);

                if (field[i].type !== 'text' && !className.includes('active')) {
                    parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', true);

                    if (field[i].type === 'file') {
                        parent.find('input[name=' + field[i].name + ']').prop('disabled', true);
                        parent.find('button.close-img').prop('disabled', true);
                    }
                }

                if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0) {
                    $('[name =' + field[i].name + ']').summernote('disable');
                }
            }
        }
    }
});

$('.close-img').click(function (evt) {
    const parent = $(evt.currentTarget).closest('div');
    const formGroup = parent.closest('.form-group');
    const formUpload = formGroup.find('.form-upload');

    let className = parent.find('label').prop('className');

    if (className.includes('form-result')) {
        formUpload.find('label').css('display', 'block');
        parent.find('label').css('display', 'none');
        formUpload.find('input:file').val('');
        parent.find('img').attr('src', '');
    }
});

/**
 * Function to search exist value data
 * @param {*} value to search exist value
 * @param {*} arr array data
 * @returns
 */
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

/**
 * Function to show Error Validation on the field
 * @param {*} parent selector html
 * @param {*} data from database
 */
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
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').parent('div').addClass('has-error');
        } else {
            parent.find('small[id=' + textName + ']').html('');
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').parent('div').removeClass('has-error');
        }
    }
}

/**
 * Function to clear value and attribute on the field
 * @param {*} evt selector html
 */
function clearForm(evt) {
    const parent = $(evt.target).closest('.row');
    const form = parent.find('form');
    const field = form.find('input, textarea, select');
    const errorText = form.find('small');

    // clear field data on the form
    form[0].reset();

    // clear data, attribute readonly, attribute disabled on the field and remove class invalid
    for (let i = 0; i < field.length; i++) {
        if (field[i].name !== '') {
            let option = $(field[i]).find('option:selected');

            form.find('input[name=' + field[i].name + '], textarea[name=' + field[i].name + ']')
                .removeAttr('readonly')
                .parent('div').removeClass('has-error has-feedback');

            form.find('input:checkbox[name=' + field[i].name + ']')
                .removeAttr('disabled');

            //logic clear data dropdown if not selected from the beginning
            if (option.length > 0 & option.val() !== '') {
                form.find('select[name=' + field[i].name + ']')
                    .removeAttr('disabled')
                    .val(option.val()).change();
            } else {
                form.find('select[name=' + field[i].name + ']')
                    .removeAttr('disabled')
                    .val(null).change();
            }

            if (field[i].type === 'file') {
                $('.close-img').click();
            }

            if (form.find('textarea.summernote[name=' + field[i].name + ']').length > 0) {
                $('[name =' + field[i].name + ']').summernote('reset');
            }
        }
    }

    // clear text error element small
    for (let l = 0; l < errorText.length; l++) {
        if (errorText[l].id !== '')
            form.find('small[id=' + errorText[l].id + ']').html('');
    }
}

/**
 * Function to set field condition readonly true/false
 * @param {*} parent selector html
 * @param {*} value based on passing data (true/false)
 */
function readonly(parent, value) {
    const field = parent.find('input, textarea, select');

    for (let i = 0; i < field.length; i++) {
        if (field[i].name !== '') {
            let className = field[i].className.split(/\s+/)[1];

            parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').prop('readonly', value);

            if (field[i].type !== 'text' && className !== 'active') {
                parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + '], input:radio[name=' + field[i].name + ']').prop('disabled', value);
            }

            if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0) {
                if (value) {
                    $('[name =' + field[i].name + ']').summernote('disable');
                } else {
                    $('[name =' + field[i].name + ']').summernote('enable');
                }
            }
        }
    }
}

/**
 *
 * @param {*} input selector element html
 * @param {*} id
 * @param {*} src source image
 */
function previewImage(input, id, src) {
    let labelUpload = input.closest('label');
    id = id || '.img-result';

    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            loadingForm(labelUpload.id, 'pulse');
            $('.save_form').attr('disabled', true);
            $('.x_form').attr('disabled', true);
            $('.close_form').attr('disabled', true);

            setTimeout(function () {
                $(id)
                    .attr('src', e.target.result)
                    .width('auto')
                    .height(150);

                $('.form-upload-foto').css('display', 'none');
                $('.form-result').css('display', 'block');

                hideLoadingForm(labelUpload.id);

                $('.save_form').removeAttr('disabled');
                $('.x_form').removeAttr('disabled');
                $('.close_form').removeAttr('disabled');
            }, 2500);
        };

        reader.readAsDataURL(input.files[0]);
    } else if (src !== null) {
        src = ORI_URL + '/' + src;
        $.ajax({
            url: src,
            type: 'HEAD',
            error: function () {
                $(id)
                    .attr('src', '')
                    .width('auto')
                    .height(150);
                $('.form-upload-foto').css('display', 'block');
                $('.form-result').css('display', 'none');
            },
            success: function () {
                $(id)
                    .attr('src', src)
                    .width('auto')
                    .height(150);
                $('.form-upload-foto').css('display', 'none');
                $('.form-result').css('display', 'block');
            }
        });
    } else {
        $(id)
            .attr('src', '')
            .width('auto')
            .height(150);
        $('.form-upload-foto').css('display', 'block');
        $('.form-result').css('display', 'none');
    }
}

/**
 * Function to show error logic when process ajax
 * @param {*} xhr
 * @param {*} exception
 */
function showError(xhr, exception) {
    let msg = '';

    if (xhr.status === 0)
        msg = 'Not connect.\n Verify Network.';
    else if (xhr.status == 404)
        msg = 'Requested page not found. [404]';
    else if (xhr.status == 500)
        msg = 'Internal Server Error [500].';
    else if (exception === 'parsererror')
        msg = 'Requested JSON parse failed.';
    else if (exception === 'timeout')
        msg = 'Time out error.';
    else if (exception === 'abort')
        msg = 'Ajax request aborted.';
    else
        msg = 'Uncaught Error.\n' + xhr.responseText;

    Toast.fire({
        type: 'error',
        title: msg
    });
}

/**
 * Function to show wait Loading
 * @param {*} selectorID form html
 * @param {*} effect
 */
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

/**
 * Function to hide wait Loading
 * @param {*} selectorID form html
 */
function hideLoadingForm(selectorID) {
    $('#' + selectorID + '').waitMe('hide');
}

/**
 * Function to set text to Capitalize
 * @param {*} s string value
 * @returns
 */
const capitalize = (s) => {
    if (typeof s !== 'string') return ''
    return s.charAt(0).toUpperCase() + s.slice(1)
}

/**
 * Funtion to show modal form
 */
function openModalForm() {
    return modalForm.modal({
        backdrop: 'static',
        keyboard: false
    });
}

/**
 * Return call class scrollable in modal
 */
function Scrollmodal() {
    return modalDialog.addClass('modal-dialog-scrollable');
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

    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    $('.timepicker').datetimepicker({
        format: 'H:mm:ss',
    });

    $('.summernote').summernote({
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'],
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            // ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        placeholder: 'write here...'
    });
});

$(document).ready(function (evt) {
    const form = $('.form');

    if (form.length > 0) {
        const formList = form.prop('classList');

        if (!arrContains('form_page', formList)) {
            let hidden_ID = form.find('input.id:hidden');
            ID = hidden_ID.val();

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
                    loadingForm(form.find('form').attr('id'), 'facebook');
                },
                complete: function () {
                    $('.save_form').removeAttr('disabled');
                    hideLoadingForm(form.find('form').attr('id'));
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
                                form.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + ']').val(label);

                                form.find('select[name=' + field[i].name + ']').val(label).change();
                            }
                        }
                    }
                }
            });
        }
    }
});
