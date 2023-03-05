@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.dataSource.create') }}">Добавить источник</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Источник</th>
                <th>Ссылка</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($dataSourceList as $dataSource)
                <tr>
                    <td>{{ $dataSource->id }}</td>
                    <td>{{ $dataSource->source }}</td>
                    <td>{{ $dataSource->url }}</td>
                    <td>{{ $dataSource->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.dataSource.edit', ['dataSource' => $dataSource]) }}">Изменить</a> &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $dataSource->id }}" style="color: red;">Удалить</a>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Нет записей</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if (confirm(`Подтверждение удаление записи с #ID = ${id}`)) {
                        send(`/admin/dataSource/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url,  {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }

    </script>
@endpush
