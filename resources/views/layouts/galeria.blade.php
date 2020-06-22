<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhotosGallery</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{url('/css/galeria.css')}}">
    <link rel="stylesheet" href="{{url('/css/alert.css')}}">


</head>
<body> 

    <div class="container gallery-container">

        @if (isset(Auth::user()->id))
        <div class="p-2 bd-highlight">
            <a href="{{ route('home') }}"><button class="btn-adm">Admin</button></a>
        </div>        
        @endif

        @if(Session::has('error'))
        <div class="mod-fade-alert">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="modal-content">
                            <button type="button" class="btn-modal-close-alert">
                                <span>x</span>
                            </button>
                            <div class="modal-body">
                                <div class="alert alert-warning content-modal-alert">
                                    @foreach (Session::get('error.message') as $message)
                                    <li>{{$message}}</li>
                                    @endforeach 

                                    @if(Session::has('error.link'))
                                    @foreach (Session::get('error.link') as $link)
                                    <li><a href="{{$link['url']}}">{{$link['text']}}</a></li>
                                    @endforeach 
                                    @endif          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="mod-fade-alert">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="modal-content">
                            <button type="button" class="btn-modal-close-alert">
                                <span>x</span>
                            </button>
                            <div class="modal-body">
                                <div class="alert alert-warning content-modal-alert">
                                    @foreach (Session::get('success.message') as $message)
                                    <li>{{$message}}</li>
                                    @endforeach 

                                    @if(Session::has('success.link'))
                                    @foreach (Session::get('success.link') as $link)
                                    <li><a href="{{$link['url']}}">{{$link['text']}}</a></li>
                                    @endforeach 
                                    @endif          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @yield('content')

    </div>
    <script src="{{url('/plugins/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Modal -->
    <script src="{{url('/js/alert.js')}}"></script>

    <!-- Footer -->
    <footer class="page-footer font-small blue credits">
    	<div class="footer-copyright text-center py-3">
    		© PhotosGallery 1.0
    	</div>
    	<div class="footer-copyright text-center py-3">By
    		<a target="blank" href="https://keniaferreira.com/">Kênia Ferreira</a>
    	</div>
    </footer>
    <!-- Footer -->

</body>
</html>