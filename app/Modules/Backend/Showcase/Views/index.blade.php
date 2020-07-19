@extends('layouts.backend.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-graph text-success">
                </i>
            </div>
            <div>List of showcases
                {{-- <div class="page-title-subheading">
                    Please fill in every columns to display best information of showcase.
                </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table id="showcase-datatables" class="mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Showcase group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Showcase group</th>
                        <th>Action</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection