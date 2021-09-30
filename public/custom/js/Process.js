/**
 * Proses for execute form master data dynamic element HTML
 *
 * @author Oki Permana
 * @version 1.0
 */
const ADMIN = '/backend/';

let ORI_URL = window.location.origin,
    CURRENT_URL = window.location.href,
    LAST_URL = CURRENT_URL.substr(CURRENT_URL.lastIndexOf('/') + 1), //the last url
    ADMIN_URL = ORI_URL + ADMIN,
    SITE_URL = ADMIN_URL + LAST_URL;

let ID,
    _table,
    setSave,
    ul,
    formTable;

// Data array from option
let option = [];

// Data field array is readonly default
let fieldReadOnly = [];

// Method default controller
const SHOWALL = '/showAll',
    CREATE = '/create',
    SHOW = '/show/',
    EDIT = '/edit',
    DELETE = '/destroy/',
    EXPORT = '/export';

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
    'autoWidth': false,
    'scrollX': true
    // 'fixedColumns': {
    //     'rightColumns': checkRight(),
    //     'leftColumns': checkLeft()
    // }
});

let _tablePro = $('.tb_product').DataTable({
    'processing': true,
    'serverSide': true,
    'ajax': {
        'url': SITE_URL + SHOWALL,
        'type': 'POST',
        'data': function (d) {
            return $.extend({}, d, {
                'form': formTable
            });
        }
    },
    'columnDefs': [{
            'targets': '_all',
            'orderable': false
        },
        {
            'targets': 0,
            'visible': false //hide column
        }
    ],
    'order': [],
    'autoWidth': false,
    'scrollX': true,
    'scrollY': '400px',
    'scrollCollapse': true,
    'fixedColumns': {
        'rightColumns': checkRight(),
        'leftColumns': checkLeft()
    }
});

$('.tb_tree').treeFy({
    initState: 'expanded',
    treeColumn: 0,
    collapseAnimateCallback: function (row) {
        row.fadeOut();
    },
    expandAnimateCallback: function (row) {
        row.fadeIn();
    }
});

/**
 * 
 * @returns check column datatable
 */
function checkRight() {
    return $('.tb_product thead th').length > 15 ? 1 : 0;
}

function checkLeft() {
    return $('.tb_product thead th').length > 15 ? 3 : 0;
}

function reloadTable() {
    if ($('.tb_display').length > 0) {
        _table.ajax.reload(null, false);
    }

    if ($('.tb_product').length > 0) {
        _tablePro.ajax.reload(null, false);
    }
}

/**
 * Save
 */
$('.save_form').click(function (evt) {
    const parent = $(evt.target).closest('.row');
    const form = parent.find('form');
    cardForm = parent.find('.card-form');

    let _this = $(this);
    let oriElement = _this.html();

    let url;
    let action = 'create';

    if (isAccess(action, LAST_URL) == 'Y') {
        const field = form.find('input, select, textarea');

        //remove attribute disabled when field disabled
        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
            }
        }

        let formData = new FormData(form[0]);

        if (setSave === 'add') {
            url = SITE_URL + CREATE;
        } else {
            formData.append('id', ID);
            url = SITE_URL + EDIT;
        }

        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {

                // input type radio button to set into the formData
                if (field[i].type == 'radio') {
                    if (field[i].checked) {
                        formData.append(field[i].name, field[i].value);
                    }
                }

                // input type file whom contain class control-upload-image to set into the formData
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

                // Check textarea summernote isEmpty to set value null
                if ((form.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                        form.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) &&
                    $('[name =' + field[i].name + ']').summernote('isEmpty')) {
                    formData.append(field[i].name, '');
                }

                // Multiple select populate array data
                if (field[i].type === 'select-multiple') {
                    formData.append(field[i].name, $('[name = ' + field[i].name + ']').val())
                }
            }
        }

        // Table role
        if (form.find('table.tb_tree').length > 0) {
            const table = form.find('table.tb_tree');
            const input = table.find('td input:checkbox');

            let isView = [];
            let isCreate = [];
            let isUpdate = [];
            let isDelete = [];
            let accessID = [];

            $.each(input, function () {
                let row_index = $(this).parent().parent().parent().parent().index();
                let field = $(this).attr('name');
                let menu_id = $(this).val();
                let menu = $(this).attr('data-menu');

                let access_id = typeof $(this).attr('id') !== 'undefined' ? $(this).attr('id') : 0;

                let value;

                if ($(this).is(':checked')) {
                    value = 'Y';
                } else {
                    value = 'N';
                }

                if (field == 'isview') {
                    isView.push({
                        row: row_index,
                        view: value,
                        menu_id: menu_id,
                        menu: menu
                    });
                } else if (field == 'iscreate') {
                    isCreate.push({
                        row: row_index,
                        create: value,
                        menu_id: menu_id,
                        menu: menu
                    });
                } else if (field == 'isupdate') {
                    isUpdate.push({
                        row: row_index,
                        update: value,
                        menu_id: menu_id,
                        menu: menu
                    });
                } else if (field == 'isdelete') {
                    isDelete.push({
                        row: row_index,
                        delete: value,
                        menu_id: menu_id,
                        menu: menu
                    });
                }

                if (setSave !== 'add')
                    accessID.push({
                        row: row_index,
                        access_id
                    });
            });

            accessID = removeDuplicates(accessID, item => item.row);

            let arrRole = mergeArrayObjects(isView, isCreate, isUpdate, isDelete, accessID);

            formData.append('roles', JSON.stringify(arrRole));
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            // async: false,
            cache: false,
            dataType: 'JSON',
            beforeSend: function () {
                $('.save_form').prop('disabled', true);
                $('.x_form').prop('disabled', true);
                $('.close_form').prop('disabled', true);
                loadingForm(form.prop('id'), 'facebook');
                $(_this).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').prop('disabled', true);
            },
            complete: function () {
                $('.save_form').removeAttr('disabled');
                $('.x_form').removeAttr('disabled');
                $('.close_form').removeAttr('disabled');
                hideLoadingForm(form.prop('id'));
                $(_this).html(oriElement).prop('disabled', false);
            },
            success: function (result) {
                if (result[0].success) {
                    Toast.fire({
                        type: 'success',
                        title: result[0].message
                    });

                    clearForm(evt);

                    if (!cardForm.prop('classList').contains('modal')) {
                        const parent = cardForm.closest('.container');
                        const cardBody = parent.find('.card-body');

                        $.each(cardBody, function (idx, elem) {
                            let className = elem.className.split(/\s+/);

                            if (className.includes('card-main')) {
                                $(this).css('display', 'block');

                                // Remove breadcrumb list
                                let li = ul.find('li');
                                $.each(li, function (idx, elem) {
                                    if (idx > 2)
                                        elem.remove();
                                });

                                if (parent.find('div.filter_page').length > 0) {
                                    parent.find('div.filter_page').css('display', 'block');
                                }
                            }

                            if (className.includes('card-form')) {
                                const cardHeader = parent.find('.card-header');
                                cardHeader.find('button').show();
                                $(this).css('display', 'none');
                            }
                        });

                        cardBtn.css('display', 'none');

                        const cardHeader = parent.find('.card-header');
                        const btnList = cardHeader.find('button').prop('classList');

                        if (btnList.contains('new_form'))
                            cardHeader.find('button').css('display', 'block');
                    } else {
                        modalForm.modal('hide');
                    }

                    cardTitle.html(capitalize(LAST_URL));

                    reloadTable();

                } else if (result[0].error) {
                    errorForm(form, result);
                    $('html, body').animate({
                        scrollTop: $('.container').offset().top
                    }, 1500);

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

    } else {
        Toast.fire({
            type: 'error',
            title: "You are role don't have permission, please reload !!"
        });
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
    let arrMultiSelect = [];

    let action = 'update';

    if (isAccess(action, LAST_URL) == 'Y') {
        if (cardMain.length > 0) {
            cardMain.css('display', 'none');
            cardForm.css('display', 'block');

            const container = cardForm.closest('.container');

            if (!cardForm.prop('classList').contains('modal')) {
                cardBtn.css('display', 'block');
                const card = cardForm.closest('.card');
                const btnList = card.find('.float-right').find('button');

                const pageHeader = container.find('.page-header');
                ul = pageHeader.find('ul.breadcrumbs');

                // Append list separator and text create
                ul.find('li.nav-item > a').attr('href', CURRENT_URL);

                let list = '<li class="separator">' +
                    '<i class="flaticon-right-arrow"></i>' +
                    '</li>';

                list += '<li class="nav-item">' +
                    '<a class="text-primary font-weight-bold">Update</a>' +
                    '</li>';

                ul.append(list);

                if (container.find('div.filter_page').length > 0) {
                    container.find('div.filter_page').css('display', 'none');
                }

                btnList.css('display', 'none');

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
                    if (form.find('table.tb_tree').length > 0) {
                        const table = form.find('table.tb_tree');
                        const input = table.find('td input:checkbox');

                        let keyName = Object.keys(result[i]);
                        let label = Object.values(result[i]);

                        $.each(input, function (idx, elem) {
                            // Menu parent
                            if ($(elem).attr('data-menu') === 'parent') {

                                if (result[i].sys_menu_id == $(elem).val() && result[i].sys_submenu_id == 0) {
                                    if ((result[i].isview == 'Y' && $(elem).attr('name') === 'isview') ||
                                        (result[i].iscreate == 'Y' && $(elem).attr('name') === 'iscreate') ||
                                        (result[i].isupdate == 'Y' && $(elem).attr('name') === 'isupdate') ||
                                        (result[i].isdelete == 'Y' && $(elem).attr('name') === 'isdelete')) {
                                        $(elem).prop('checked', true);
                                    } else {
                                        $(elem).prop('checked', false);
                                    }

                                    // Set attribute id element to value sys_access_menu_id
                                    $(elem).attr('id', result[i].sys_access_menu_id);
                                }

                            } else {
                                if (result[i].sys_submenu_id === $(elem).val()) {
                                    if ((result[i].isview == 'Y' && $(elem).attr('name') === 'isview') ||
                                        (result[i].iscreate == 'Y' && $(elem).attr('name') === 'iscreate') ||
                                        (result[i].isupdate == 'Y' && $(elem).attr('name') === 'isupdate') ||
                                        (result[i].isdelete == 'Y' && $(elem).attr('name') === 'isdelete')) {
                                        $(elem).prop('checked', true);
                                    } else {
                                        $(elem).prop('checked', false);
                                    }

                                    // Set attribute id element to value sys_access_menu_id
                                    $(elem).attr('id', result[i].sys_access_menu_id);
                                }
                            }
                        });

                        // Populate data into the form field
                        $.each(keyName, function (idx, elem) {
                            form.find('input:text[name=' + elem + '], textarea[name=' + elem + '], input:password[name=' + field[i].name + ']').val(label[idx]);

                            if (elem === 'isactive' && label[idx] === 'Y') {
                                form.find('input:checkbox[name=' + elem + ']').prop('checked', true);
                                readonly(form, false);
                            } else if (elem === 'isactive' && label[idx] === 'N') {
                                form.find('input:checkbox[name=' + elem + ']').removeAttr('checked');
                                readonly(form, true);
                            }

                            if (formList.contains('modal') && elem === 'name') {
                                modalTitle.html(capitalize(label[idx]));
                            } else if (elem === 'name') {
                                cardTitle.html(capitalize(label[idx]));
                            }
                        });

                    } else {
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

                                if (className.includes('datepicker')) {
                                    form.find('input:text[name=' + field[i].name + ']').val(moment(label).format('Y-MM-DD'));
                                } else {
                                    form.find('input:text[name=' + field[i].name + ']').val(label);
                                }

                                form.find('textarea[name=' + field[i].name + '], input:password[name=' + field[i].name + ']').val(label);

                                if (form.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                                    form.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) {
                                    $('[name =' + field[i].name + ']').summernote('code', label);
                                }

                                if (field[i].type === 'select-one') {
                                    let fieldName = field[i].name;
                                    let value = label;
                                    option.push({
                                        fieldName,
                                        value
                                    });

                                    form.find('select[name=' + field[i].name + ']').val(label).change();
                                }

                                if (field[i].type === 'select-multiple') {
                                    arrMultiSelect.push(label);
                                    form.find('select[name=' + field[i].name + ']').val(arrMultiSelect).change();
                                }

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

                                // Pass data form input file to function previewImage
                                if (field[i].type === 'file') {
                                    if (className.includes('control-upload-image')) {
                                        previewImage(form.find('input[name=' + field[i].name + ']')[0], '', label);
                                    }
                                }
                            }
                        }
                    }
                }

                $('html, body').animate({
                    scrollTop: $('.main-panel').offset().top
                }, 500);
            },
            error: function (jqXHR, exception) {
                showError(jqXHR, exception);
            }
        });
    } else {
        Toast.fire({
            type: 'error',
            title: "You are role don't have permission, please reload !!"
        });
    }
}

/**
 * Button delete data
 */
function Destroy(id) {
    let url = SITE_URL + DELETE + id;
    let action = 'delete';

    if (isAccess(action, LAST_URL) == 'Y') {
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
                        showConfirmButton: false,
                        timer: 1000,
                    });

                    reloadTable()
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.info(errorThrown)
                    reloadTable()
                });
        });
    } else {
        Toast.fire({
            type: 'error',
            title: "You are role don't have permission, please reload !!"
        });
    }
}

/**
 * Button close form
 * @x_form button only in modal
 * @close_form button in card-action
 */
$(document).on('click', '.x_form, .close_form', function (evt) {
    let target = $(evt.currentTarget);

    if (target.attr('data-dismiss') !== 'modal') {
        const parent = target.closest('.container');
        const cardBody = parent.find('.card-body');

        $.each(cardBody, function (idx, elem) {
            let className = elem.className.split(/\s+/);

            if (className.includes('card-main')) {
                $(this).css('display', 'block');

                // Remove breadcrumb list
                let li = ul.find('li');
                $.each(li, function (idx, elem) {
                    if (idx > 2)
                        elem.remove();
                });

                if (parent.find('div.filter_page').length > 0) {
                    parent.find('div.filter_page').css('display', 'block');
                }
            }

            if (className.includes('card-form')) {
                $(this).css('display', 'none');
            }
        });

        cardBtn.css('display', 'none');

        const cardHeader = parent.find('.card-header');
        cardHeader.find('button').show();
    }

    clearForm(evt);
    cardTitle.html(capitalize(LAST_URL));

    $('html, body').animate({
        scrollTop: $('.main-panel').offset().top
    }, 500);
});

/**
 * Button new data
 */
$('.new_form').click(function (evt) {
    const parent = $(evt.target).closest('.container');
    const cardBody = parent.find('.card-body');

    let form;
    let action = 'create';

    if (isAccess(action, LAST_URL) == 'Y') {
        $.each(cardBody, function (idx, elem) {
            let className = elem.className.split(/\s+/);

            if (cardBody.length > 1) {
                if (className.includes('card-main')) {
                    $(this).css('display', 'none');

                    const pageHeader = parent.find('.page-header');
                    ul = pageHeader.find('ul.breadcrumbs');

                    // Append list separator and text create
                    ul.find('li.nav-item > a').attr('href', CURRENT_URL);

                    let list = '<li class="separator">' +
                        '<i class="flaticon-right-arrow"></i>' +
                        '</li>';

                    list += '<li class="nav-item">' +
                        '<a class="text-primary font-weight-bold">Create</a>' +
                        '</li>';

                    ul.append(list);

                    if (parent.find('div.filter_page').length > 0) {
                        parent.find('div.filter_page').css('display', 'none');
                    }
                }

                if (className.includes('card-form')) {
                    const cardHeader = $(evt.target).closest('.card-header');
                    cardHeader.find('button').css('display', 'none');
                    $(this).css('display', 'block');
                    cardBtn.css('display', 'block');

                    cardTitle.html('New ' + capitalize(LAST_URL));

                    form = $(this).find('form');

                    if (form.find('input:file.control-upload-image').length > 0) {
                        form.find('.img-result').attr('src', '');
                    }

                    const field = parent.find('input, textarea');

                    for (let i = 0; i < field.length; i++) {
                        if (field[i].name !== '') {

                            // set field is readonly by default
                            if (field[i].readOnly)
                                fieldReadOnly.push(field[i].name)
                        }
                    }
                }
            } else {
                openModalForm();
                Scrollmodal();
                modalTitle.html('New1 ' + capitalize(LAST_URL));

                form = modalForm.find('form');

                if (form.find('input:file.control-upload-image').length > 0) {
                    form.find('.img-result').attr('src', '');
                }
            }
        });

        form.find('input[type="checkbox"].active').prop('checked', true);

        setSave = 'add';
    } else {
        Toast.fire({
            type: 'error',
            title: "You are role don't have permission, please reload !!"
        });
    }
});

/**
 * Process for Export based on filter form
 */
$('.btn_export').click(function (evt) {
    const container = $(evt.target).closest('.container');
    const cardFilter = container.find('.card-filter');
    let form = cardFilter.find('form');

    let _this = $(this);
    let oriElement = _this.html();

    form.attr('action', SITE_URL + EXPORT);
    form.attr('method', 'POST');

    // form submit to export data
    form.submit();

    $(_this).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').prop('disabled', true);

    setTimeout(function () {
        $(_this).html(oriElement).prop('disabled', false);
    }, 700);
});

/**
 * Process for filter datatable form filter
 */
$('.btn_filter').click(function (evt) {
    const form = $(evt.target).closest('form');
    let _this = $(this);
    let oriElement = _this.html();

    formTable = form.serializeArray();

    $(_this).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').prop('disabled', true);

    setTimeout(function () {
        $(_this).html(oriElement).prop('disabled', false);
    }, 700);

    reloadTable();
});

/**
 * Process login
 */
$('.btn_login').click(function () {
    let _this = $(this);
    let oriElement = _this.html();

    const form = $(this).closest('form');

    let url = ADMIN_URL + 'auth/login';

    $.ajax({
        url: url,
        type: 'POST',
        data: form.serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function () {
            $(this).prop('disabled', true);
            $(_this).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').prop('disabled', true);
        },
        complete: function () {
            $(this).removeAttr('disabled');
            $(_this).html(oriElement).prop('disabled', false);
        },
        success: function (result) {
            if (result[0].success) {
                Toast.fire({
                    type: 'success',
                    title: result[0].message
                });

                window.open(ORI_URL + '/panel', '_self');

            } else if (result[0].error) {
                errorForm(form, result);
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
});

/**
 * Enter key press button login form
 */
$('.login-form input').keypress(function (evt) {
    let key = evt.which;

    if (key == 13)
        $('.btn_login').click();
});

/**
 * Process for active non-active field in the form using checkbox class active
 */
$('input.active:checkbox').change(function (evt) {
    const parent = $(this).closest('form');
    const field = parent.find('input, textarea, select');
    let className;

    if ($(this).is(':checked')) {
        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                className = field[i].className.split(/\s+/);

                // field is not readonly by default
                if (!fieldReadOnly.includes(field[i].name))
                    parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + '], input:password[name=' + field[i].name + ']').removeAttr('readonly');

                if (field[i].type !== 'text' && !className.includes('active')) {
                    parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');

                    if (field[i].type === 'file') {
                        parent.find('input[name=' + field[i].name + ']').removeAttr('disabled');
                        parent.find('button.close-img')
                            .removeAttr('disabled')
                            .css('display', 'block');
                    }
                }

                if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                    parent.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) {
                    $('[name =' + field[i].name + ']').summernote('enable');
                }
            }
        }
    } else {
        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                className = field[i].className.split(/\s+/);

                // set field is readonly by default
                if (field[i].readOnly)
                    fieldReadOnly.push(field[i].name);

                // field is not readonly by default
                if (!fieldReadOnly.includes(field[i].name))
                    parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + '], input:password[name=' + field[i].name + ']').prop('readonly', true);

                if (field[i].type !== 'text' && !className.includes('active')) {
                    parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').prop('disabled', true);

                    if (field[i].type === 'file') {
                        parent.find('input[name=' + field[i].name + ']').prop('disabled', true);
                        parent.find('button.close-img')
                            .prop('disabled', true)
                            .css('display', 'none');
                    }
                }

                if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                    parent.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) {
                    $('[name =' + field[i].name + ']').summernote('disable');
                }
            }
        }
    }
});


/**
 * Button close image
 */
$('.close-img').click(function (evt) {
    const parent = $(evt.currentTarget).closest('div');
    const formGroup = parent.closest('.form-group');
    const formUpload = formGroup.find('.form-upload');
    const form = $(evt.currentTarget).closest('form');
    const field = form.find('input');

    let className = parent.find('label').prop('className');

    // set condition when add to clear all
    if (className.includes('form-result')) {
        formUpload.find('label').css('display', 'block');
        parent.find('label').css('display', 'none');
        formUpload.find('input:file').val('');
        parent.find('.img-result').attr('src', '');

        for (let i = 0; i < field.length; i++) {
            if (field[i].name !== '') {
                if (field[i].type === 'file') {
                    form.find('input[name=' + field[i].name + ']').removeAttr('disabled');
                    parent.find('button.close-img')
                        .removeAttr('disabled')
                        .css('display', 'block');
                }
            }
        }
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
    const errorInput = parent.find('input, select, textarea');
    const errorText = parent.find('small');

    let arrInput = [];
    let arrText = [];

    for (let i = 0; i < errorText.length; i++) {
        if (errorText[i].id !== '')
            arrText.push(errorText[i].id);
    }

    for (let k = 0; k < errorInput.length; k++) {
        arrInput.push(errorInput[k].name);
    }

    for (let j = 0; j < data.length; j++) {
        let error = data[j].error;
        let field = data[j].field;
        let labelMsg = data[j].label;

        let textName = arrContains(error, arrText);
        let inputName = arrContains(field, arrInput);

        if (labelMsg !== '' && j > 0) {
            parent.find('small[id=' + textName + ']').html(labelMsg);
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + '], input:password[name=' + inputName + ']').closest('.form-group').addClass('has-error');
        } else {
            parent.find('small[id=' + textName + ']').html('');
            parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + '], input:password[name=' + inputName + ']').closest('.form-group').removeClass('has-error');
        }
    }
}

/**
 * Function to clear value and attribute on the field
 * @param {*} evt selector html
 */
function clearForm(evt) {
    const container = $(evt.target).closest('.container')
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

            if (fieldReadOnly.length == 0) {
                form.find('input[name=' + field[i].name + '], textarea[name=' + field[i].name + ']')
                    .removeAttr('readonly')
                    .parent('div').removeClass('has-error');
            } else if (fieldReadOnly.length > 0 && !fieldReadOnly.includes(field[i].name)) { // field is not readonly by default
                form.find('input[name=' + field[i].name + '], textarea[name=' + field[i].name + ']')
                    .removeAttr('readonly')
                    .parent('div').removeClass('has-error');
            }

            form.find('input:checkbox[name=' + field[i].name + ']')
                .removeAttr('disabled');

            //logic clear data dropdown if not selected from the beginning
            if (option.length > 0 && option.val() !== '' && setSave == 'add') {
                form.find('select[name=' + field[i].name + ']')
                    .val(option.val()).change()
                    .removeAttr('disabled')
                    .closest('.form-group').removeClass('has-error');
            } else {
                form.find('select[name=' + field[i].name + ']')
                    .val(null).change()
                    .removeAttr('disabled')
                    .closest('.form-group').removeClass('has-error');
            }

            if (field[i].type == 'file') {
                $('.close-img').click();
            }

            if (form.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                form.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) {
                $('[name =' + field[i].name + ']').summernote('reset');
                $('[name =' + field[i].name + ']').summernote('enable');
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
            let className = field[i].className.split(/\s+/);

            // set field is readonly by default
            if (field[i].readOnly)
                fieldReadOnly.push(field[i].name);

            // field is not readonly by default
            if (!fieldReadOnly.includes(field[i].name))
                parent.find('input:text[name=' + field[i].name + '], textarea[name=' + field[i].name + '], input:password[name=' + field[i].name + ']').prop('readonly', value);

            if (field[i].type !== 'text' && !className.includes('active')) {
                parent.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + '], input:radio[name=' + field[i].name + ']')
                    .prop('disabled', value);
            }

            if (field[i].type === 'file') {
                parent.find('input[name=' + field[i].name + ']').prop('disabled', value);
            }

            if (parent.find('textarea.summernote[name=' + field[i].name + ']').length > 0 ||
                parent.find('textarea.summernote-product[name=' + field[i].name + ']').length > 0) {
                if (value) {
                    $('[name =' + field[i].name + ']').summernote('disable');
                } else {
                    $('[name =' + field[i].name + ']').summernote('enable');
                }
            }
        }
    }

    // check button close image based on value
    if (parent.find('button.close-img').length > 0) {
        parent.find('button.close-img').prop('disabled', value)

        if (value) {
            parent.find('button.close-img').css('display', 'none');
        } else {
            parent.find('button.close-img').css('display', 'block');
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

    src = src == null ? '' : src;

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
    } else if (src !== '') {
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
                loadingForm(labelUpload.id, 'pulse');
                $('.save_form').attr('disabled', true);
                $('.x_form').attr('disabled', true);
                $('.close_form').attr('disabled', true);

                setTimeout(function () {
                    $(id)
                        .attr('src', src)
                        .width('auto')
                        .height(150);
                    $('.form-upload-foto').css('display', 'none');
                    $('.form-result').css('display', 'block');

                    hideLoadingForm(labelUpload.id);

                    $('.save_form').removeAttr('disabled');
                    $('.x_form').removeAttr('disabled');
                    $('.close_form').removeAttr('disabled');
                }, 500);
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
 * 
 * @param {*} input action "create, update, delete"
 * @param {*} last_url get the last url
 * @returns 
 */
function isAccess(input, last_url) {
    let url = ADMIN_URL + 'accessmenu/' + 'getAccess';
    let value;

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            last_url: last_url,
            action: input
        },
        async: false,
        dataType: 'JSON',
        success: function (result) {
            value = result;
        },
        error: function (jqXHR, exception) {
            showError(jqXHR, exception);
        }
    });

    return value;
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
        width: '100%',
        theme: "bootstrap"
    });

    $('.multiple-select').select2({
        theme: "bootstrap"
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
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            // ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['height', ['height']]
        ],
        placeholder: 'write here...'
    });

    $('.summernote-product').summernote({
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'],
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['height', ['height']]
        ],
        placeholder: 'write here...'
    });

    $('.float-number').autoNumeric('init', {
        aSep: ',',
        mDec: '0'
    });

    window.setTimeout(function () {
        $('.alert ').fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
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

/**
 * Dropdown select for change data
 */
$('select').change(function (evt) {
    let target = $(evt.target);
    let value = '';

    const form = $(this).closest('form');
    let lengthFilter = $(this).closest('.card-filter').length;

    if (option.length == 0) {
        if (target.attr('id') === 'md_principal_id' || target.attr('name') === 'md_principal_id') {
            value = target.val();
            url = SITE_URL + '/getCategory';

            for (let i = 1; i <= 3; i++) {
                if (value != 0) {
                    form.find('select[name = "category' + i + '"]').empty();

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            principal: value,
                            level: i
                        },
                        cache: false,
                        dataType: 'JSON',
                        success: function (result) {
                            if (lengthFilter > 0) {
                                form.find('select[name = "category' + i + '"]').append('<option value="0">All Categories ' + (i > 1 ? i : '') + '</option>');
                            } else {
                                form.find('select[name = "category' + i + '"]').append('<option value="0">&nbsp;</option>');
                            }

                            if (result[0].success) {
                                let data = result[0].message;

                                $.each(data, function (idx, elem) {
                                    let category_id = elem.md_category_id;
                                    let category = elem.category;
                                    let category_en = elem.category_en;

                                    form.find('select[name = "category' + i + '"]').append('<option value="' + category_id + '">' + category_en + '</option>');
                                });
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: result[0].message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function (jqXHR, exception) {
                            showError(jqXHR, exception);
                        }
                    });
                } else {
                    form.find('select[name = "category' + i + '"]').empty();
                }
            }
        }
    } else {
        url = SITE_URL + '/getCategory';
        let data = option[option.length - 1];
        let field = data.fieldName;
        let id_category = data.value;

        value = $('.main-select').val();

        if (field.slice(0, -1) === 'category') {
            let index = field[field.length - 1];

            form.find('select[name =' + field + ']').empty();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    principal: value,
                    level: index
                },
                cache: false,
                dataType: 'JSON',
                success: function (result) {
                    form.find('select[name =' + field + ']').append('<option value="0">&nbsp;</option>');

                    if (result[0].success) {
                        let data = result[0].message;

                        $.each(data, function (idx, elem) {
                            let category_id = elem.md_category_id;
                            let category_en = elem.category_en;

                            if (id_category == category_id) {
                                form.find('select[name =' + field + ']').append('<option value="' + category_id + '" selected>' + category_en + '</option>');
                            } else {
                                form.find('select[name =' + field + ']').append('<option value="' + category_id + '">' + category_en + '</option>');
                            }

                        });

                        // Set to empty array option
                        option = [];
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: result[0].message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function (jqXHR, exception) {
                    showError(jqXHR, exception);
                }
            });
        }
    }
});

/**
 * Function to merge Array Object
 * @param {*} arr1 
 * @param {*} arr2 
 * @param {*} arr3 
 * @param {*} arr4 
 * @param {*} arrID Access ID to retrieve edit data 
 * @returns 
 */
function mergeArrayObjects(arr1, arr2, arr3, arr4, arrID) {
    return arr1.map((item, i) => {
        if (item.row === arr2[i].row || item.row === arr3[i].row || item.row === arr4[i].row || item.row === arrID[i].row)
            return Object.assign({}, item, arr2[i], arr3[i], arr4[i], arrID[i]);
    })
}

/**
 * Remove duplicate array object
 * @param {*} arr 
 * @param {*} key object key to define when call function
 * @returns 
 */
function removeDuplicates(arr, key) {
    return [
        ...new Map(arr.map(item => [key(item), item])).values()
    ]
}

/**
 * Event checked checkbox table role
 */
$(document).on('click', 'input:checkbox', function () {
    const table = $(this).closest('table');
    const tr = $(this).closest('tr');
    let th = $(this).closest('th').index();
    let cell = $(this).parent().parent().parent().index()

    // Row start from 0
    let index = cell + 1;

    let dataNode;

    if ($(this).is(':checked')) {
        // Checked all checkbox based on index header
        if (th > 0)
            table.find('td:nth-child(' + index + ') input:checkbox').prop('checked', true);

        // Checked checkbox based on parent
        if (tr.hasClass('treetable-expanded') || tr.hasClass('treetable-collapsed')) {
            // Substring attribute data-node
            dataNode = tr.attr('data-node').substring(10);

            table.find('tr[data-pnode=treetable-parent-' + dataNode + '] td:nth-child(' + index + ') input:checkbox').prop('checked', true);
        }
    } else {
        // Unchecked all checkbox based on index header
        if (th > 0)
            table.find('td:nth-child(' + index + ') input:checkbox').prop('checked', false);

        // Unchecked checkbox based on parent
        if (tr.hasClass('treetable-expanded') || tr.hasClass('treetable-collapsed')) {
            // Substring attribute data-node
            dataNode = tr.attr('data-node').substring(10);

            table.find('tr[data-pnode=treetable-parent-' + dataNode + '] td:nth-child(' + index + ') input:checkbox').prop('checked', false);
        }
    }
});