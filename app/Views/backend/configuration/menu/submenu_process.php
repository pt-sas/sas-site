<script type="text/javascript">
	var setSave_sub;
	var tb_submenu;
	readOnly();
	numberOnly();
	activeValue();

	$(function () {
		tb_submenu = $('#table-submenu').DataTable({
			'ajax': '<?php echo site_url('submenu/list') ?>',
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

	function reloadSubmenu() {
		tb_submenu.ajax.reload(null, false);
	}

	function addSubmenu() {
		setSave_sub = 'add';
		$('#form_submenu')[0].reset();
		$('#modal_submenu').modal({backdrop: 'static', keyboard: false});
		$('.modal-title').text('Add New Submenu');
		generateNumber();
	}

	function saveSubmenu() {
		var url;
		var value = $('#form_submenu').serialize() +'&id_menu=' + $('#id_menu option:selected').val();

		if(setSave_sub == 'add') {
			url = '<?php echo site_url('submenu/save') ?>';
		} else {
			url = '<?php echo site_url('submenu/edit') ?>';
		}

		$.ajax({
			url: url,
			type: 'POST',
			data: value,
			dataType: 'JSON',
			success: function(data){
				if(data.error){
					if(data.sub_name_error != ''){
						$('#sub_name_error').html(data.sub_name_error);
					} else {
						$('#sub_name_error').html('');
					}
					if(data.sub_url_error != ''){
						$('#sub_url_error').html(data.sub_url_error);
					} else {
						$('#sub_url_error').html('');
					}
					if(data.sub_icon_error != ''){
						$('#sub_icon_error').html(data.sub_icon_error);
					} else {
						$('#sub_icon_error').html('');
					}
					if(data.sub_line_error != ''){
						$('#sub_line_error').html(data.sub_line_error);
					} else {
						$('#sub_line_error').html('');
					}
				}
				if(data.success) {
					$.bootstrapGrowl(data.success, {
						type: 'success',
						width: 'auto',
						offset: {from: 'top', amount: 50}
					});
					resetSubmenu();
					$('#modal_submenu').modal('hide');
					reloadSubmenu();
				}
			}, error: function(data){
				var html = '';
				if(setSave_sub == 'add') {
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

	function detailSubmenu(id){
		setSave_sub = 'update';
		var url = '<?php echo site_url('submenu/detail/') ?>';
		$.ajax({
			url: url+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('[name = id_submenu]').val(data.submenus_id);
				$('[name = subName]').val(data.submenus_name);
				$('[name = sub_line]').val(data.submenus_seqno);
				$('[name = sub_url]').val(data.submenus_url);
				$('[name = sub_icon]').val(data.submenus_icon);
				$('[name = id_menu]').val(data.menus_id).trigger('change');
				$('[name = sub_isactive]').val(data.isactive);

				var active = document.getElementById("sub_isactive").innerHTML = data.isactive;
				if (active == "N"){
					$('#sub_cb').prop('checked', false);
					$('#form_submenu input').attr('readonly', true);
					$('#id_menu').prop('disabled',true);
				}
				$('#modal_submenu').modal({backdrop: 'static', keyboard:false});
				$('.modal-title').text(data.submenus_name.toUpperCase());
			},
			error: function(jqXHR, textStatus, errorThrown){
				swal('Error Get Data', 'Please try again', 'error');
			}
		});
	}

	function resetSubmenu()
	{
		$("#modal_submenu").on("hidden.bs.modal", function(){
			$('#sub_name_error').html('');
			$('#sub_line_error').html('');
			$('#sub_url_error').html('');
			$('#sub_icon_error').html('');
			$('#form_submenu')[0].reset();
			$('.select2').val(null).trigger('change');
			$('#form_submenu input').attr('readonly', false);
			$('#id_menu').attr('disabled',false);
		});
	}

	function readOnly() {
		$('#sub_cb').on('change', function() {
			if ($('#sub_cb').is(':checked')) {
				$('#form_submenu input').attr('readonly', false);
	            $('#id_menu').attr('disabled', false);
	        } else {
	        	$('#form_submenu input').attr('readonly', true);
	            $('#id_menu').attr('disabled', 'disabled');	        }
	    });
	}

	function activeValue() {
		var ckbox = $('#sub_cb');
		ckbox.attr('checked', true);
		$("input").on('change', function() {
			if (ckbox.is(':checked')) {
				$('[name=sub_isactive]').val("Y");
			} else {
				$('[name=sub_isactive]').val("N");
			}
		});
	}

	//Show Line No after Pick Menu
	function generateNumber() {
		$('#id_menu').change(function() {
			var id = $(this).val();
			$.ajax({
				url: '<?php echo site_url('submenu/seq_number') ?>',
				method: 'POST',
				data: {id:id},
				async: true,
				dataType: 'json',
				success: function(data){
					$('[name = sub_line]').val(data);
				}
			});
		});
	}
</script>
