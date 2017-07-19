$(function () {
    'use strict';
        // Change this to the location of your server-side upload handler:
        var picName = "";
        console.log(window.location.protocol + "//" + window.location.host + "/uploads/");

        var url = window.location.protocol + "//" + window.location.host + "/uploads/",
        uploadButton = $('<button/>')
        .addClass('btnUpload btn btn-primary')
        .prop('disabled', true)
        .text('Processing...')
        .on('click', function () {

            var $this = $(this),
            data = $this.data();
            $this
            .off('click')
            .text('Abort')
            .on('click', function () {
                $this.remove();
                data.abort();
            });
            data.submit().always(function () {
                $this.remove();
            });
        });

        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: false,
            acceptFileTypes: /(\.|\/)(gif|jpg|jpe?g|png)$/i,
            maxSizeFile: 51200000,
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                picName = file.name;
               
                var node = $('<p/>')
                .append($('<span/>').text());
                if (!index) {
                    node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
            if (file.preview) {
                node
                .prepend('<br>')
                .prepend(file.preview);
            }
            if (file.error) {
                node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                .text('Upload')  
                .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
                );
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                    $(data.context.children()[index])
                    .wrap(link);
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
                }
            });
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index, file) {
                var picName = file.name;
                 $("#imgThumbnail").attr("src","/files/thumbnail/" + picName);
                 $("#txtNameFile").val(file.name);
            });
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });