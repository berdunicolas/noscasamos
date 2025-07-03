<tbody>
    @if ($logs && !empty($logs))
        @foreach ($logs as $log)
        <tr>
            <th scope="row">{{$log->id}}</th>
            <td>{{$log->user->name}}</td>
            <td>{{$log->action}}</td>
            <td>{{$log->description}}</td>
            <td>{{$log->getDataTime()}}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="text-center">No se encontraron logs</td>
        </tr>
    @endif
</tbody>
