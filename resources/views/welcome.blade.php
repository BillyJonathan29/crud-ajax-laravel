@extends('layouts.menu.index')


@section('content')
 @include('layouts.navbar')

 <div class="content justify-content-center d-flex fw-wrap">
    @foreach ($product as $item)
    <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $item->pegawai->nama}}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->product }}</h6>
          <p class="card-text">{{ $item->description }}</p>
          <a href="#" class="card-link" style="width: 100%">Card link</a>
        </div>
      </div>
    @endforeach
 </div>
@endsection
