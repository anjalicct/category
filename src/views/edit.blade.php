@extends('categories.layout')
   
@section('content')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>
  
    <div class="container pt-3">
        <form action="{{ route('categories.update',$category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row"> 
                <div class="col-xl-12 m-auto">
                    <div class="card shadow">

                        <div class="card-body pl-4 pr-4"> 

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_id"> ID <span class="text-danger">*</span> </label>
                                        <input type="text" name="category_id" value="{{ $category->category_id }}" id="category_id" class="form-control" placeholder="ID" value="{{ ($errors->any()) ? old('category_id') : ''}}" disabled>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_name"> Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="category_name" value="{{ $category->category_name }}" id="category_name" class="form-control" placeholder="ID" value="{{ ($errors->any()) ? old('category_name') : ''}}">
                                        @if ($errors->has('category_name'))
                                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                        @endif
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
                                                <option value="{{ $key }}" {{ $category->parent_category_id == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach    
                                        </select>
                                        @if ($errors->has('parent_category_id'))
                                            <span class="text-danger">{{ $errors->first('parent_category_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="category_status"> Status <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="category_status">
                                            <option disable selected value>Select Status</option>
                                            <option value="Active" {{$category->category_status == 'Active' ? 'selected' :''}}> {{ 'ACTIVE' }} </option>
                                            <option value="Inactive" {{$category->category_status == 'Inactive' ? 'selected' :''}}> {{ 'INACTIVE' }} </option>
                                        </select>
                                        @if ($errors->has('category_status'))
                                            <span class="text-danger">{{ $errors->first('category_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                             
                            <div class="row"> 
                                <div class="col-xl-6 offset-lg-6 text-right">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-primary" href="{{ route('categories.index') }}">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
</x-app-layout>
@endsection