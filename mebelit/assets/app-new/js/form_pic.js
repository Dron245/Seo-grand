var formData = new FormData(document.getElementById('upload'));

$(document).ready(function(){
	$('.filedrag a').on('click',function(e){
        e.preventDefault();
        $('.filedrag:visible .fileselect').click(); 
    });

	
	formData.delete('fileselect[]'); // удалим пустое значение
	//alert(formData);

    $('body').on('click','.close.del',function(e){ // удаление ненужного файла для загрузки
        e.preventDefault();
        var fileName =  $(this).parent().find('img').attr('title');

        $(this).closest('.img-preview').remove();
        
        var filesUpl = formData.getAll('fileselect[]');
        formData.delete('fileselect[]');

        $.each(filesUpl , function(ind,val){
        	if(fileName != val.name) {
        		formData.append('fileselect[]', val);
        	}
        });
    });

    var files;
     
    // Вешаем функцию на событие
    // Получим данные файлов и добавим их в переменную
     
    /*$('input[type=file]').change(function(){
        var clone = $(".fileselect:last").clone();
        console.log(clone);

		console.log('1');        

        clone.removeAttr('id');

       // $("#fileselect").val('');
		clone.hide();
		$('.append-clone').append(clone);
    });*/

    $('#upload').submit(function( event ){
        event.preventDefault();
        var form = $(this);

        formData.append('name', form.find('input[name=name]').val());
        formData.append('contacts', form.find('input[name=contacts]').val());
        formData.append('form-name', form.find('input[name=form-name]').val());

        $("#send").attr('disabled', true);
        var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(text){
	            swal("Мы свяжемся с вами в самое ближайшее время!");
	            $('#send-photo').modal('hide');
	        },
	        error: function() {
	            alert("error");  
	        }
        });
    });
});
 
    (function() {

	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}

	// output information
	function Output(msg) {
		var m       = $id("messages");
		m.innerHTML = msg + m.innerHTML;
	}

	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		//e.target.className = (e.type == "dragover" ? "hover" : "fileselect");
	}

	// file selection
	function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
		}

	}

	// output file information
	function ParseFile(file) {

		// display text
		/*if(file.type.indexOf("text") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong></p><pre>" +
					e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
					"</pre>"
				);
			}
			reader.readAsText(file);
		}*/
		
		// display an image
		if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			
			formData.append('fileselect[]', file); // добавим файл для загрузки ajax при дропе и отрытии
			
			reader.onload = function(e) {
				Output(
					'<div class="col-md-4 img-preview"><div class="img-preview-wrap"><button type="button" class="close del" ><span aria-hidden="true">×</span></button>' +
					'<img class="img-responsive" src="' + e.target.result + '" alt="'+file.name+'" title="'+file.name+'" /></div></div>'
				);
			}
			reader.readAsDataURL(file);
		} else {
			alert ('Выбирете изображение!');
		}
	}

	// initialize
	function Init() {
		var fileselect   = $id("fileselect"),
			filedrag     = $id("filedrag");
			
    	// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {
			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";
			// remove submit button
		
		}
	}
	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}

})();


