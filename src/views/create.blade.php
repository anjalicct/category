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
        </h2>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="row"> 
                <div class="col-xl-12 m-auto">
                    <div class="card shadow">
    
                        <div class="card-body pl-4 pr-4">

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_id"> ID <span class="text-danger">*</span> </label>
                                        <input type="text" name="category_id" id="category_id" class="form-control" placeholder="ID">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_name"> Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="parent_category_id"> Parent Category </label> 
                                        <select class="form-control" name="parent_category_id">
                                            <option disable selected value>Select Parent Category</option>
                                            @foreach ($categories as $key => $value)
                                                    <option value="{{ $key }} {{ $key == old('parent_category_id') ? 'selected' : null }}">
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_status"> Status <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="category_status">
                                            <option disable selected value>Select Status</option>
                                            <option value="Active"> {{ 'ACTIVE' }} </option>
                                            <option value="Inactive"> {{ 'INACTIVE' }} </option>
                                        </select>
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xl-6 offset-lg-6 text-right">
                                    <button type="submit" class="btn btn-success"> Submit </button>
                                    <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>  
            </div>
    
        </form>
    </div>

    </body>
</html>