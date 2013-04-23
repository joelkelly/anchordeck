'use strict';

/*
|--------------------------------------------------------------------------
| Directive for generating a thumbnail
|--------------------------------------------------------------------------
|
*/
uploader.directive('thumbnail', function() {
    return {
        restrict: 'E',
        transclude: true,
        link: function(scope, element, attrs, ctrl) {

            /*
            |--------------------------------------------------------------------------
            | Create a filereader and setup onload
            |--------------------------------------------------------------------------
            |
            | Filreader is for modern browsers. In this instance it allows us to get file
            | information from our pending files before we upload them to the server
            |
            */
            var file_reader  = new FileReader();
            file_reader.onload = function (reader_event) {

                /*
                |--------------------------------------------------------------------------
                | Create an new image that we can resize into a thumbnail
                |--------------------------------------------------------------------------
                |
                | We are creating an image and once it is loaded we are loading it into a
                | canvas element so we can adjust the dimensions.
                | Credit to dropzonejs.org for this code.
                |
                */
                var temp_image = new Image;
                temp_image.onload = function() {
                    var canvas, ctx, srcHeight, srcRatio, srcWidth, srcX, srcY, thumbnail, trgHeight, trgRatio, trgWidth, trgX, trgY;

                    canvas = document.createElement("canvas");
                    ctx = canvas.getContext("2d");
                    srcX = 0;
                    srcY = 0;
                    srcWidth = temp_image.width;
                    srcHeight = temp_image.height;
                    canvas.width = 75;
                    canvas.height = 75;
                    trgX = 0;
                    trgY = 0;
                    trgWidth = canvas.width;
                    trgHeight = canvas.height;
                    srcRatio = temp_image.width / temp_image.height;
                    trgRatio = canvas.width / canvas.height;

                    // Figure out appropriate placement for image.
                    if (temp_image.height < canvas.height || temp_image.width < canvas.width) {
                        trgHeight = srcHeight;
                        trgWidth = srcWidth;
                    } else {
                        if (srcRatio > trgRatio) {
                            srcHeight = temp_image.height;
                            srcWidth = srcHeight * trgRatio;
                        } else {
                            srcWidth = temp_image.width;
                            srcHeight = srcWidth / trgRatio;
                        }
                    }
                    srcX = (temp_image.width - srcWidth) / 2;
                    srcY = (temp_image.height - srcHeight) / 2;
                    trgY = (canvas.height - trgHeight) / 2;
                    trgX = (canvas.width - trgWidth) / 2;

                    // Draw image into canvas at resized value;
                    ctx.drawImage(temp_image, srcX, srcY, srcWidth, srcHeight, trgX, trgY, trgWidth, trgHeight);

                    // Set source of our element to the base64 encoded image data.
                    element.attr('src', canvas.toDataURL("image/png"));
                };

                // Load the image source from the file that was read in
                temp_image.src = reader_event.target.result;
            };

            // Read the file
            file_reader.readAsDataURL(scope.file);
        },
        template:
            '<img ng-transclude class="thumbnail"/>',
        replace:true
    };
});
