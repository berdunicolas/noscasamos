<form action="{{route('api.invitation.modules.update', ['invitation' => $invitationId, 'module' => $moduleId])}}" enctype="multipart/form-data" onsubmit="sendModuleForm(event, this, '{{$moduleType}}', '{{$moduleName}}')">
    @method("PATCH")
    {{$slot}}
</form>