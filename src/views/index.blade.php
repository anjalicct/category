<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        
        <!-- datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>Category Module</title>

        <!-- Scripts -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
</head>
<body>
    <div class="container pt-3">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-5 mb-4">
            {{ __('Category') }}
            <a class="btn btn-success float-right" href="{{ route('category.create') }}"> Create</a>
        </h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="accordion table" id="accordionDiv">

        @foreach($categories as $category)

            <div class="card">
                <div class="card-header" id="heading_category_{{$category->category_id}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#category_{{$category->category_id}}" aria-expanded="true" aria-controls="category_{{$category->category_id}}">
                            <div class="table-row"> 
                                <!-- <div class="table-cell"> <i class="bi bi-caret-right-square-fill"></i> </div> -->
                                <div class="table-cell col-3"> {{$category->category_id}}  : {{ $category->id}}</div> 
                                <div class="table-cell col-3"> {{$category->category_name}} </div> 
                                <div class="table-cell col-3"> 
                                    @if($category->category_status == 'Active')
                                        <span class="badge badge-success">ACTIVE</span>  
                                    @elseif($category->category_status == 'Inactive')
                                        <span class="badge badge-secondary"> {{ $category->category_status }} </span>
                                    @else
                                        {{ 'N/A' }} 
                                    @endif
                                </div> 
                                <div class="table-cell col-3"> {{$category->created_at}} </div> 
                                
                            </div>
                        </button>
                    </h2>
                </div>

                @if(count($category->subcategories))
                    <div id="category_{{$category->category_id}}" class="collapse" aria-labelledby="heading_category_{{$category->category_id}}" data-parent="#accordionDiv">
                        <div class="card-body">
                                @include('category::manageSubCategory', ['subcategories' => $category->subcategories])
                        </div>
                    </div>
                @endif 				
            </div>

            @endforeach

        </div>
    </div>

    </body>
</html>