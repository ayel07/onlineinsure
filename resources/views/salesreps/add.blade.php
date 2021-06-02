@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a Sales Representative') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <input name="firstname" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Last Name</label>
                            <input name="lastname" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4">
                            <label for="commission_percentage">Commission Percentage</label>
                            <div class="input-group mb-3">
                            <input name="commission_percentage" type="number" max="100" min="0" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <label for="tax_rate">Tax Rate</label>
                            <div class="input-group mb-3">
                            <input name="tax_rate" type="number" max="100" min="0" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-4">
                            <label for="bonuses">Bonuses</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                                </div>
                                <input name="bonuses" type="text" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
