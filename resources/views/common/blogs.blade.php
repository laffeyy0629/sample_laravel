@extends('layout.main-master')
@section('content')

<main class= "container">
    <div class= "row">
        @foreach($blogs as $blog)

            @if($blog->status == 0)
                <div class="card hover mx-2 mb-4 mt-4" style="width: 18rem;">
                    <img src="{{URL('images/hanni.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center>
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{$blog->status}}</p>
                        <p class="card-text">{{$blog->description}}</p>
                        <p class="card-text">{{$blog->name}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </center>
                    </div>
                </div>
            
            @else
                <div class="card hover mx-2 mb-4 mt-4" style="width: 18rem;">
                    <img src="{{URL('images/hanni.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center>
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{$blog->status}}</p>
                        <p class="card-text">{{$blog->description}}</p>
                        <p class="card-text">{{$blog->name}}</p>
                       
                    </center>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

</main>
@endsection

<style>
    .card:hover{
        transform:scale(1.1);
    }
    .card{
        transition: 0.1s;
    }
</style>

