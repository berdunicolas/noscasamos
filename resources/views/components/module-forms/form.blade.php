<form action="{{route('api.invitation.modules.update', ['invitation' => $invitationId, 'module' => $moduleName])}}" enctype="multipart/form-data" onsubmit="sendModuleForm(event, this)">
    @method("PATCH")
    {{$slot}}
</form>