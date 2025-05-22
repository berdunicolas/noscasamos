<form action="{{route('api.invitation.modules.update', ['invitation' => $invitationId, 'module' => $moduleName, 'displayName' => $displayName])}}" enctype="multipart/form-data" onsubmit="sendModuleForm(event, this, '{{$moduleName}}')">
    @method("PATCH")
    {{$slot}}
</form>