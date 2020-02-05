@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel panel-default">
              <div class="panel-body">
                Vous etes connecte ! en tant que <strong>{{ strtoupper(Auth::user()->type) }}</strong>
                 <br>
                      Admin Page: <a href="{{ url('/') }}/adminOnlyPage">{{ url('/') }}/adminOnlyPage</a>
                      <br>
                            Member Page: <a href="{{ url('/') }}/memberOnlyPage">{{ url('/') }}/memberOnlyPage</a>
          </div>
</div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection