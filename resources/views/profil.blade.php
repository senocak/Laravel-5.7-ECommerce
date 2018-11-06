@extends("index")
@section("title"," Profil")
@section("içerik")
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection