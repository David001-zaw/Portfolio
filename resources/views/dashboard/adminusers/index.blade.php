
@extends('dashboard.master')

@section('title', '| AdminUsers')

@section('custom_css')
<style>

/* Table Styles */

.table-wrapper{
    margin: 20px 70px 70px;
    color: black;
}

form{
    display: inline;
}

.fl-table {
    border-radius: 5px;
    font-size: 14px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
}

.fl-table thead th {
    font-weight: normal;
    font-size: 16px;
    color: #ffffff;
    background: #222;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #2f2f2f;
}

.fl-table tr:nth-child(even) {
    background: #F1F1F1;
}



/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 150px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
        font-size: 12px;
        width: 100px;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}

</style>
@endsection

@section('content')

<div class="table-wrapper">
    @if (Session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin_users.create') }}" class="main-btn create-btn">Create New Admin <i class="fa fa-user-plus"></i></a>
    <table class="fl-table">
        <thead>
            <tr>
                <th>No <i class="fa fa-list-ol"></i> </th>
                <th>Name <i class="fa fa-user"></i> </th>
                <th>Email <i class="fa fa-at"></i> </th>
                <th>Phone <i class="fa fa-phone"></i> </th>
                <th>Actions <i class="fa fa-radiation"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>

                            <a href="{{ route('admin_users.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                            <form action="{{ route('admin_users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger" type="submit" @if (isset(Auth::user()->id) && Auth::user()->id === $user->id) disabled  @endif><i class="fa fa-trash"></i> Delete</button>
                            </form>

                    </td>
                </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection
