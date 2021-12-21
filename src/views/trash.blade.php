@extends('categories.layout')
 
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
            <a class="btn btn-info pull-right" href="{{ route('categories.index') }}"> Back</a>
        </h2>
    </x-slot>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Deleted At</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                {{ App\Models\Category::getParentName($category->parent_category_id) }}
            </td>
            <td> 
                @if($category->category_status == 'Active')
                    <span class="badge badge-success">ACTIVE</span>  
                @elseif($category->category_status == 'Inactive')
                    <span class="badge badge-secondary"> {{ $category->category_status }} </span>
                @else
                    {{ 'N/A' }}
                @endif    
            </td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->deleted_at }}</td>
            <td> <a class="btn btn-warning" href="{{ route('categories.restore', $category->category_id)}}"> Restore </a></td>
        </tr>
        @endforeach 
    </table>
    <div class="d-flex justify-content-center">
        {!! $categories->links() !!}
    </div>  
    </x-app-layout>
@endsection