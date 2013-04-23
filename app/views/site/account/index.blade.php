@extends('_layouts.master')

@section('content')

<div class="main-content" ng-app="uploader">
    <h2>Uploads</h2>
    <div ng-controller="FileUploadCtrl">
        <input type="file" id="fileToUpload" ng-model-instant multiple accept="image/*" onchange="angular.element(this).scope().addFiles(this)"/>
        <input type="button" ng-click="uploadFiles()" value="Upload" />
        <div ng-show="progressVisible">
            <div class="percent">[[progress]]%</div>
            <div class="progress-bar">
                <div class="uploaded" ng-style="{'width': progress+'%'}"></div>
            </div>
        </div>
        <table>
            <thead></thead>
            <tbody>
                <tr ng-cloak ng-repeat="file in pendingFiles">
                    <td><thumbnail/></td>
                    <td>[[file.name]]</td>
                    <td>[[file.size | byteCount]]</td>
                </tr>
            </tbody>
        </table>


    </div>

</div>

@stop