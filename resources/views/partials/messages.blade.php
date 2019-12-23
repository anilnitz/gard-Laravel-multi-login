@if (session()->has('success'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session()->has('warning'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    {{ session()->get('warning') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session()->has('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    {{ session()->get('info') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if (count($errors) > 0)

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-sm alert-danger">
                    There were errors submitting the form. Please see the errors below
                </div>
            </div>
        </div>
    </div>

@endif