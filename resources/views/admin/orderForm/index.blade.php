@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Form</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>User Name</th>
                <th>Phone number</th>
                <th>E-mail</th>
                <th>Criteria of search</th>
                <th>Date updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orderFormList as $orderForm)
                <tr>
                    <td>{{ $orderForm->id }}</td>
                    <td>{{ $orderForm->user }}</td>
                    <td>{{ $orderForm->phone }}</td>
                    <td>{{ $orderForm->email }}</td>
                    <td>{{ $orderForm->criteria }}</td>
                    <td>{{ $orderForm->created_at }}</td>
                    <td><a href="{{ route('admin.orderForm.edit', ['orderForm' => $orderForm]) }}">Change</a> &nbsp; <a href="" style="color: red;">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $orderFormList->links() }}
    </div>
@endsection

