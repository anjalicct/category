@extends('categories.layout')

@section('content')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap -->
<link rel="stylesheet" href="bootstrap.min.css">
<!-- jQuery -->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="extensions/treegrid/bootstrap-table-treegrid.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Category') }}
            <a class="btn btn-info pull-right ml-2" href="{{ route('category.index') }}"> Back</a>
            <a class="btn btn-primary pull-right" href="{{ route('category.edit', $category->id) }}"> Edit </a>
        </h2>
    </x-slot>

    <table class="table table-bordered container table-striped">
        <tr>
            <td class="col-6">Category ID </td> <td class="col-6">{{ $category->category_id }}</td>
        </tr>
        <tr>
            <td class="col-6">Category Name </td> <td class="col-6">{{ $category->category_name }}</td>
        </tr>
        <tr>
            <td class="col-6">Parent ID </td> <td class="col-6">{{ Anjalicct\Category\models\Category::getParentName($category->parent_category_id) }}</td>
        </tr>  
        <tr>
            <td class="col-6">Status </td>
            <td class="col-6"> 
                @if($category->category_status == 'Active')
                    <span class="badge badge-success"> {{ $category->category_status }} </span>  
                @elseif($category->category_status == 'Inactive')
                    <span class="badge badge-secondary"> {{ $category->category_status }} </span>
                @else
                    {{ 'N/A' }}
                @endif
            </td>
        </tr>   
        <tr>
            <td class="col-6"> Created At </td><td class="col-6">{{ $category->created_at }}</td>
        </tr>
        <tr>
            <td class="col-6"> Updated At </td><td class="col-6">{{ $category->updated_at }}</td>
        </tr>  
        <tr class="col-xl-6 offset-lg-6 text-right"> 
            
        </tr>
    </table>

</x-app-layout>
@endsection