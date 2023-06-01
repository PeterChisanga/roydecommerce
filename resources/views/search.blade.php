@extends('master')
@section("content")
  <div class="trending-wrapper">
    @if(count($products) > 0)
      <h2 class="title towns-livraison"><i class="fa fa-truck"></i> Livraison à Casablanca, Rabat, Kénitra et Mohammedia.</h2>
      <h2 class="title towns-livraison"><i class=""></i>Résultats de recherche</h2>
      <div class="small-container">
        <div class="row">
          @foreach ($products as $item)
            <div class="col-4">
              <a href="detail/{{$item['id']}}">
                <img src="{{ asset('images/products/'.$item->gallery) }}" alt="">
                <h3>{{$item['name']}}</h3>
                <h5>{{$item['description']}}</h5>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <h4>{{$item['price']}} Dh</h4>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @else
      <div class="alert alert-warning" style="margin-bottom: 450px" role="alert">
        <h2>Aucun résultat pour votre recherche.</h2>
        <h3><a href="/"><i class="fa fa-arrow-left"></i>Accueil</a></h3>
      </div>
    @endif
  </div>
@endsection
