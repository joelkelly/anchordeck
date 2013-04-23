'use strict';

function FileUploadCtrl($scope){

    $scope.pendingFiles = [];   // The pending file queue

    /*
    |--------------------------------------------------------------------------
    | Add files to pending file queue and apply them to the view
    |--------------------------------------------------------------------------
    |
    */
    $scope.addFiles = function($element){
        $scope.$apply(function($scope){
            for (var i = 0; i < $element.files.length; i++) {
                // Check to see that the element is not already in the queue
                if(!containsObject($element.files[i], $scope.pendingFiles)){
                    $scope.pendingFiles.push($element.files[i]);
                }
            }
            // Set progress bar to invisible
            $scope.progressVisible = false;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Loop through pending files and upload them
    |--------------------------------------------------------------------------
    |
    */
    $scope.uploadFiles = function(){
        for (var i in $scope.pendingFiles) {
            $scope.uploadFile($scope.pendingFiles[i]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Upload an individual file
    |--------------------------------------------------------------------------
    |
    | Sets up and XHR response to the passed in file. Also sets up
    | eventListenters for progress and complete responses. Upon complete
    | it removes the file from the pending file queue
    |
    */
    $scope.uploadFile = function(file){

        var formData   = new FormData(),
            xhr         = new XMLHttpRequest()

        formData.append("file", file);

        // Event listener for upload progress
        xhr.upload.addEventListener("progress", uploadProgress, false)

        // Event listener for complete
        xhr.addEventListener("load", (function(evt){
            $scope.$apply(function($scope){ // $apply to show adjustments in the view
                $scope.pendingFiles.splice($scope.pendingFiles.indexOf(file), 1);
            });

            // Handle response ** TODO
            // evt.target.responseText;
        }), false);

        // Set progress bar to visible
        $scope.progressVisible = true;

         // Set XHR destination and send the data.
        xhr.open("POST", "/upload/post");
        xhr.send(formData);
    }

    /*
    |--------------------------------------------------------------------------
    | File upload progress handler
    |--------------------------------------------------------------------------
    |
    | Sets file progress to be displayed
    |
    */
    function uploadProgress(evt) {
        $scope.$apply(function(){
            if (evt.lengthComputable) {
                $scope.progress = Math.round(evt.loaded * 100 / evt.total)
            } else {
                $scope.progress = '...'
            }
        })
    }

    /*
    |--------------------------------------------------------------------------
    | Utility function to check if array contains object
    |--------------------------------------------------------------------------
    |
    | This is based on name and size of file due to the fact that a hashObject
    | is added when the object is added. So traditional array/object comparisons
    | are not effective.
    |
    */
    function containsObject(obj, list) {
        for (var i = 0; i < list.length; i++) {
            if (list[i].name === obj.name && list[i].size === obj.size) return true;
        }
        return false;
    }
}

