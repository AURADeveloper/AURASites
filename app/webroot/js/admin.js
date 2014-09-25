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

/**
 * Callback used by the color variant select control to update the value of the
 * associated color widget.
 *
 * @param id The id of the select element
 * @param elem The id of the associated colour widget
 */
function previewColour(id, elem) {
  var val = $(id).val();

  // User has selected "none"
  if (val === "") {
    $(elem).val(null);
    $(elem).css("background-color", "transparent");
    return;
  }

  // User has select "custom"
  if (val === "0") return;

  // User has selected a preset, handle it
  var c = $.grep($.colours, function( n, i ) {
    return (val === n.Colour.id);
  });
  $(elem).val(c[0].Colour.code);
  $(elem).css("background-color", "#" + $(elem).val());
}

/**
 * Calls the jQuery color picker plugin to initialize on the specified element.
 *
 * @param element The element to make a color picker
 */
function initColorPicker(element, select) {
  $(element).ColorPicker({
    onChange: function(hsb, hex, rgb, el) {
      $(element).val(hex);
      $(element).css("background-color", "#" + hex);

      // If a select instance is defined, trigger this to show "custom"
      if (select !== null) {
        $(select).val("0");
      }
    },
    onBeforeShow: function () {
      $(this).ColorPickerSetColor(this.value);
    }
  })
  .bind("keyup", function() {
    $(this).ColorPickerSetColor(this.value);
  });

  // On load, assign the background colour
  $(element).css("background-color", "#" + $(element).val());
}

function initGradient(div, input, select) {
  $(div).ClassyGradient({
    onChange: function(stringGradient, cssGradient) {
      $(input).val(stringGradient);
    }
  });
}
