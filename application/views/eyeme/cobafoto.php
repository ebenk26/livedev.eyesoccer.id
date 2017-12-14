
<!DOCTYPE html>
<html>
  <head>
    <title>cropit</title>
    <script src="<?=base_url()?>bs/jquery/jquery-2.0.0.min.js"></script>
    <script src="<?=base_url()?>node_modules/cropit/dist/jquery.cropit.js"></script>

    <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }

      .cropit-preview-background {
        opacity: .2;
      }

      /*
       * If the slider or anything else is covered by the background image,
       * use relative or absolute position on it
       */
      input.cropit-image-zoom-input {
        position: relative;
      }

      /* Limit the background image by adding overflow: hidden */
      #image-cropper {
        overflow: hidden;
      }
    </style>
  </head>
  <body>
    <div class="image-editor">
      <input type="file" class="cropit-image-input">
      <div class="cropit-preview"></div>
      <span class="image-size-label">
        Resize image
      </span>
      <input type="range" class="cropit-image-zoom-input">
      <button class="rotate-ccw">Rotate counterclockwise</button>
      <button class="rotate-cw">Rotate clockwise</button>

      <button class="export">Export</button>
    </div>

    <script>
      $(function() {
        $('.image-editor').cropit({
          imageState: {
            src: '',
          },
          imageBackground: true,
        });

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });

        $('.export').click(function() {
          var imageData = $('.image-editor').cropit('export');
          window.open(imageData);
        });
      });
    </script>
  </body>
</html>
