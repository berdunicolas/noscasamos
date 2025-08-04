<form action="{{$action}}" enctype="multipart/form-data" onsubmit="sendModuleForm(event, this, '{{$moduleType}}', '{{$moduleName}}')">
    @method("PATCH")
    {{$slot}}
</form>