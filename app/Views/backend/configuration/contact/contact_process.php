<script type="text/javascript">
	var setSave_menu;
	var tb_menu;
	readOnly();
	numberOnly();
	activeValue();

  	$(function () {
    	tb_menu = $('#table-menu').DataTable({
    		'ajax': '<?php echo site_url('menu/list') ?>',
				'responsive': true,
				'autoWidth': false,
				'processing': true,
				'lengthChange': false,
        'language': {
          'processing': '<i class="fa fa-spinner fa-spin fa-10x fa-fw"></i><span> Processing...</span>'
        },
    		'orders': []
    	});
  	});

  	function reloadMenu() {
  		tb_menu.ajax.reload(null, false);
  	}

	function addMenu() {
		setSave_menu = 'add';
		$.ajax({
			url: '<?php echo site_url('menu/seq_number') ?>',
			type: 'ajax',
			dataType: 'json',
			success: function(data){
               	for(var i=0; i<data.length; i++){
                    $('[name = line]').val(data[i].no);
				}
				$('#modal_menu').modal({backdrop: 'static', keyboard: false});
				$('.modal-title').text('Add New Menu');
			}
		});
	}

	function saveMenu() {
		var url;
		if(setSave_menu == 'add') {
			url = '<?php echo site_url('menu/save') ?>';
		} else {
			url = '<?php echo site_url('menu/edit') ?>';
		}

		$.ajax({
			url: url,
			type: 'POST',
			data: $('#form_menu').serialize(),
			dataType: 'JSON',
			beforeSend: function(){
				$('#btn_saveMenu').attr('disabled',true);
			},
			success: function(data){
				if(data.error){
					if(data.name_error != ''){
						$('#name_error').html(data.name_error);
					} else {
						$('#name_error').html('');
					}
					if(data.lineno_error != ''){
						$('#lineno_error').html(data.lineno_error);
					} else {
						$('#lineno_error').html('');
					}
					if(data.icon_error != ''){
						$('#icon_error').html(data.icon_error);
					} else {
						$('#icon_error').html('');
					}
				}
				if(data.success) {
    				$.bootstrapGrowl(data.success, {
    					type: 'success',
    					width: 'auto',
    					offset: {from: 'top', amount: 50}
    				});
					resetMenu();
					$('#modal_menu').modal('hide');
					reloadMenu();
				}
				$('#btn_saveMenu').attr('disabled',false);
			},
			error: function(data){
				var html = '';
				if(setSave_menu == 'add') {
					html = '<h4><i class="icon fa fa-ban"></i> Error!</h4> Your data invalid inserted!';
				} else {
					html = '<h4><i class="icon fa fa-ban"></i> Error!</h4> Your data invalid updated!';
				}

    			$.bootstrapGrowl(html, {
    				type: 'success',
    				width: 'auto',
    				offset: {from: 'top', amount: 50}
    			});
    			$('#modal_menu').modal('hide');
			}
		});

	}

	function detailMenu(id){
		setSave_menu = 'update';
		var url = '<?php echo site_url('menu/detail/') ?>';
		$.ajax({
			url: url+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('[name = id_menu]').val(data.menus_id);
				$('[name = menuName]').val(data.menus_name);
				$('[name = line]').val(data.menus_seqno);
				$('[name = url]').val(data.menus_url);
				$('[name = icon]').val(data.menus_icon);
				$('[name = menus_isactive]').val(data.isactive);
				var active = document.getElementById("menus_isactive").innerHTML = data.isactive;
				if (active == "N"){
					$('#menus_cb').attr('checked', false);
					$('#form_menu input').attr('readonly', true);
				}
				$('#modal_menu').modal({backdrop: 'static', keyboard: false});
				$('.modal-title').text(data.menus_name.toUpperCase());
			},
			error: function(jqXHR, textStatus, errorThrown){
				swal('Error Get Data', 'Please try again', 'error');
			}
		});
	}

	function resetMenu()
	{
		$("#modal_menu").on("hidden.bs.modal", function(){
			$('#name_error').html('');
			$('#lineno_error').html('');
			$('#url_error').html('');
			$('#icon_error').html('');
			$('#form_menu')[0].reset();
			$('#form_menu input').attr('readonly', false);
		});
	}

	function readOnly() {
	    $('#menus_cb').on('change', function() {
	        if ($('#menus_cb').is(':checked')) {
	            $('#form_menu input').attr('readonly', false);
	        } else {
	            $('#form_menu input').attr('readonly', true);
	        }
	    });
	}

	function activeValue() {
		var ckbox = $('#menus_cb');
		ckbox.attr('checked', true);
		$("input").on('change', function() {
	        if (ckbox.is(':checked')) {
	        	$('[name=menus_isactive]').val("Y");
	        } else {
	            $('[name=menus_isactive]').val("N");
	        }
	    });
	}
</script>
