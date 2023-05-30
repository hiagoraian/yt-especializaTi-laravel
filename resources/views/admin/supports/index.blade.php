<h1>Listagem dos Suportes</h1>

<a href="{{route('supports.create')}}">Criar novo assunto</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $item)
            <tr>
                <td>{{ $item->subject }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->body }}</td>
                <td>
                    <a href="{{route ('supports.show', $item->id)}}">Ver mais</a>
                    <a href="{{route ('supports.edit', $item->id)}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> 