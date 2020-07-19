@extends('layouts.backend.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-graph text-success">
                </i>
            </div>
            <div>Showcase Create Form
                <div class="page-title-subheading">
                    Please fill in every columns to display best information of showcase.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="" method="POST" action="{{ route('showcase.store') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label><input
                            name="email" id="exampleEmail11" placeholder="with a placeholder" type="email"
                            class="form-control"></div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="group_name" class="">Group name</label>
                        <input name="group_name" id="group_name" placeholder="The Future Legend" type="text" class="form-control"></div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="categories" class="">Categories</label>
                <input name="categories" id="categories" placeholder="1234 Main St" type="text" class="form-control">
            </div>
            {{-- <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input
                            name="city" id="exampleCity" type="text" class="form-control"></div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="exampleState" class="">State</label><input
                            name="state" id="exampleState" type="text" class="form-control"></div>
                </div>
                <div class="col-md-2">
                    <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input
                            name="zip" id="exampleZip" type="text" class="form-control"></div>
                </div>
            </div> --}}
            <div class="position-relative form-group">
                <label for="content" class="">Content</label>
                <textarea name="content" id="content" cols="100" rows="10"></textarea>
            </div>

            <button type="submit" class="mt-2 btn btn-primary">Sign in</button>
        </form>
    </div>
</div>

<br/>
@endsection

@section('javascript')
<script type="text/javascript">
    tinymce.init({
      selector: '#content',
      height : "480",
      branding: false
    });
</script>
@endsection