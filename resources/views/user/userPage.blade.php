@extends("user.layouts.style")

@section('content')
    <!-- Page Content-->
    <div class="container px-4 px-lg-5" id="home" style="color: white">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.heyuguys.com/images/2021/03/Zack-Snyder-Justice-League.jpg" alt="" class="w-100 h-75">
                        </div>
                        <div class="carousel-item">
                            <img src="https://occ-0-299-37.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABcFG-uhejcRG7haLqYffZcev4rn2Sri8nnLbHAouKlSC5hkc1gAg-8ZYigjLeyLr_rVdyh3iOyO9ZBV3__4Bpiq7wuIJ4AmfhQ7N.jpg?r=8d0" alt="" class="w-100 h-75">
                        </div>
                        <div class="carousel-item">
                            <img src="https://c4.wallpaperflare.com/wallpaper/117/891/681/robert-pattinson-the-batman-2021-movies-artwork-batman-hd-wallpaper-preview.jpg" alt="" class="w-100 h-75">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.mos.cms.futurecdn.net/S5VznSGaXPh5PWGBQCMnnB-1200-80.jpg" alt="" class="w-100 h-75">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Share for Free!</h1>
                <p>Welcome to my channel .Hi I am Aung .I was created this channel with Laravel template.Have fun & Enjoy our app.Expecially in your holiday </p>
                <a class="btn btn-primary" href="#movie">Watch <i class="fa-solid fa-video"></i></a>
            </div>
        </div>

        <!-- Content Row-->
        <div class="d-flex justify-content-around">
            <div class="col-md-3  me-md-5">
                <div class="">
                    <div class="py-5 text-center ">

                        <form class="d-flex m-5 " action="{{ route('user#userSearch') }}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_movie">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>

                        @foreach ($category as $items)
                        <div class="">
                            <div class="m-2 p-2 ">
                               <a href="{{ route('user#userSearchCategory',$items->category_id) }}" class=" text-decoration-none text-white"> {{ $items->movie_category }}</a>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Start Date - End Date</h3>

                            <form action="{{ route('user#searchDate') }}" method="GET">
                                <input type="date" name="start" id="" class="form-control"> -
                                <input type="date" name="end" id="" class="form-control">
                                <button type="submit" class="btn btn-outline-secondary mt-4">Search</button>
                            </form>

                        </div>
                        <hr>
                        {{-- <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Min - Max Amount</h3>

                            <form>
                                <input type="number" name="" id="" class="form-control" placeholder="minimum price"> -
                                <input type="number" name="" id="" class="form-control" placeholder="maximun price">
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="mt-5">

                <div class="row gx-4 gx-lg-5" id="movie">
                   @if (count($movieData) ==0)
                        <h3 class=" text-muted">Not Found Movie!</>
                   @else
                   @foreach($movieData as $items )
                   <div class="col-md-4 mb-5  container-lg  hover-overlay  table-hover">
                    <div class=" ms-5 ">
                        <div class=" position-relative pe-5">
                            <div class="badge bg-dark  text-white position-absolute font-monospace" style="bottom: 0.5rem; left: 0.5rem">{{ $items->movie_rating }}.0<i class="fa-solid fa-star text-warning"></i></div>
                            <div class="badge  text-white position-absolute font-monospace bg-danger" style="top: 0.5rem; left: 0.5rem">4K HAV</div>
                           <a href="{{ route("user#userMoviedetail",$items->movie_id) }}">
                            <div class="py-3 px-4 rounded-circle text-white position-absolute font-monospace bg-success" style="bottom: 6rem;margin-left:90px"><i class="fa-solid fa-play"></i></div>
                           </a>
                            <img src="{{asset('/uploadImage/'.$items->movie_image)}}" alt="" style="width:250px;height:220px;">
                        </div>
                    </div>
                   </div>
                   @endforeach
                   @endif
                </div>

            </div>
        </div>

    </div>

    <div class="text-center d-flex justify-content-center align-items-center " id="contact">

        <div class="col-lg-4 border border-dark shadow-lg ps-5 pt-5 pe-5 pb-2 mb-5">
            @if (Session::has("success"))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" >
                {{ Session::get("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif


            <form action="{{ route('user#postMessage',auth()->user()->id) }}" class="my-4 " method="post">
                <h3>Contact Us</h3>
                @csrf
                <input type="text" name="name" id="" class="form-control my-3" placeholder="Name">
                <input type="text" name="email" id="" class="form-control my-3" placeholder="Email">
                <textarea class="form-control my-3" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message"></textarea>
                <button type="submit" class="btn btn-outline-secondary">Send  <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
   

@endsection
