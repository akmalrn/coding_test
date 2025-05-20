@extends('layouts.app')
@section('content')
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-4">1,245</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text fs-4">3,456</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Revenue</h5>
                    <p class="card-text fs-4">$12,000</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h4>Recent Activities</h4>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Created user</td>
                    <td>John Doe</td>
                    <td>2025-04-05</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Updated product</td>
                    <td>Jane Smith</td>
                    <td>2025-04-04</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
