/**
 * Assigns a preview render of an input element image.
 *
 * @param input The input that provides the image source
 * @param prevElem The image element to render the preview
 */
function previewImage(input, prevElem) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(prevElem).attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
