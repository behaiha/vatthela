<?php $image = ''; ?>
<tr>
    <td><?php echo $form->labelEx($model,$this->name); ?></td>
    <td valign="top">
        <div class="image">
            <img src="http://localhost/opencart/image/cache/no_image-100x100.jpg" alt="" id="thumb" />
            <br />
        <a onclick="">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a onclick="$('#thumb').attr('src', 'http://localhost/opencart/image/cache/no_image-100x100.jpg'); $('#image').attr('value', '');">Clear</a></div></td>
</tr>
<?php echo $form->fileField($model,$this->name,array('id'=>'filesToUpload')); ?>
<?php echo $form->error($model,'image'); ?>
<script>
var count = 0;
function TypeFile()
{
    var fup = document.getElementById('filesToUpload');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png" )
    {
        return ext;
    }
}
function fileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
            // if the file is not an image, continue
            if (!file.type.match('image.*')) {
                continue;
            }
 
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    console.log('a');
                    $('#image').attr('src',evt.target.result);
                };
            }(file));
            reader.readAsDataURL(file);
            
        }
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
function delete_image(id){
    $("#delete_image"+id).remove();
}
</script>