<!-- js -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpQbIvzRtyUWbnG-fKkhDFrXWqygSoa8&callback=initMap"></script>

<!-- Loader waitMe -->
<script src="<?= base_url('atlantis-pro/js/plugin/loader/waitMe.min.js') ?>"></script>

<script>
  $('.toggle').on('click', function() {
    $('.menu-sidebar').addClass('slideIn')
  })

  $('.close-btn').on('click', function() {
    $('.menu-sidebar').removeClass('slideIn')
  })

  $('.search').on('click', function() {
    $('.search-float').toggleClass('show-up')
  })

  $(document).on('click', '.scroll-down', function(event) {
    event.preventDefault();
    var viewportHeight = $(window).height();

    $('html, body').animate({
      scrollTop: viewportHeight,
    }, 700);
  })

  function initMap(location = null) {
    if (location === null) {
      location = 'sunter';
    }

    var url = '<?= base_url('backend/location/getPosition') ?>' + '/' + location;

    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'JSON',
      beforeSend: function() {
        loadingForm('map', 'bounce');
      },
      complete: function() {
        hideLoadingForm('map');
      },
      success: function(result) {
        $.each(result, function(idx, elem) {
          var lat = parseFloat(elem.lattitude);
          var lng = parseFloat(elem.longitude);
          var location_name = elem.name;

          var mapcenter = {
            lat: lat,
            lng: lng
          };

          var map = new google.maps.Map(
            document.getElementById('map'), {
              zoom: 15,
              center: mapcenter
            }
          );

          var marker = new google.maps.Marker({
            position: {
              lat: lat,
              lng: lng
            },
            icon: 'adw/assets/images/marker-map.png',
            map: map
          });

          var infowindow = new google.maps.InfoWindow({
            content: location_name
          });

          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });

  }

  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
    var target = $(e.target).attr("href") // activated tab
    var location = target.substr(1);
    initMap(location);
  });
</script>


<script>
  $('.submit_form').click(function(evt) {
    const parent = $(evt.target).closest('.row');
    const form = parent.find('form');
    cardForm = parent.find('.card-form');

    let formData = new FormData(form[0]);

    let url = '<?= base_url('maincontroller/create'); ?>';

    const field = form.find('input[type="checkbox"], select, input[type="radio"], input[type="file"]');

    //remove attribute disabled when field disabled
    for (let i = 0; i < field.length; i++) {
      if (field[i].name !== '') {
        form.find('input:checkbox[name=' + field[i].name + '], select[name=' + field[i].name + ']').removeAttr('disabled');
      }
    }

    for (let i = 0; i < field.length; i++) {
      if (field[i].name !== '') {
        if (field[i].type == 'radio') {
          if (field[i].checked) {
            formData.append(field[i].name, field[i].value);
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
      beforeSend: function() {
        $(this).prop('disabled', true);
        loadingForm(form.prop('id'), 'bounce');
      },
      complete: function() {
        $(this).removeAttr('disabled');
        hideLoadingForm(form.prop('id'));
      },
      success: function(result) {
        console.log(result)
        if (result[0].success) {
          alert(result[0].message);
          clearForm(evt);

        } else if (result[0].error) {
          errorForm(form, result);
          hideLoadingForm(form.prop('id'));
        } else {
          alert(result[0].message);
        }
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });
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
        parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').addClass('is-invalid');
      } else {
        parent.find('small[id=' + textName + ']').html('');
        parent.find('input:text[name=' + inputName + '], select[name=' + inputName + '], textarea[name=' + inputName + ']').removeClass('is-invalid');
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

        form.find('input[name=' + field[i].name + '], textarea[name=' + field[i].name + ']')
          .removeClass('is-invalid');
      }
    }

    // clear text error element small
    for (let l = 0; l < errorText.length; l++) {
      if (errorText[l].id !== '')
        form.find('small[id=' + errorText[l].id + ']').html('');
    }
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
      onClose: function() {}
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

    console.log(msg)
  }
</script>