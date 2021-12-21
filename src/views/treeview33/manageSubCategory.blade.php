
@foreach($subcategories as $subcategory)
<div class="card">
	<div class="card-header" id="heading_category_{{$subcategory->category_id}}">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#category_{{$subcategory->category_id}}" aria-expanded="false" aria-controls="category_{{$subcategory->category_id}}">
				<div class="table-row">	
					<div class="table-cell col-3"> {{$subcategory->category_id}} </div> 
					<div class="table-cell col-3"> {{$subcategory->category_name}} </div> 
					<div class="table-cell col-3">
						@if($subcategory->category_status == 'Active')
							<span class="badge badge-success">ACTIVE</span>  
						@elseif($subcategory->category_status == 'Inactive')
							<span class="badge badge-secondary"> {{ $subcategory->category_status }} </span>
						@else
							{{ 'N/A' }}
						@endif
					</div> 
					<div class="table-cell col-3"> {{$category->created_at}} </div> 
					<div class="table-cell col-1"> <a class="btn btn-light" href="{{ route('categories.show',$subcategory->id) }}"> <i class="bi bi-info-square"></i></a> </div>
					<div class="table-cell col-1"> <a class="btn btn-light" href="{{ route('categories.edit',$subcategory->id) }}"> <i class="bi bi-pencil-square"></i></a> </div>
				</div>
			</button>
		</h2>
	</div>

	@if(count($subcategory->subcategories))
		<div id="category_{{$subcategory->category_id}}" class="collapse" aria-labelledby="heading_category_{{$subcategory->category_id}}" data-parent="#category_{{$subcategory->parent_category_id}}">
			<div class="card-body">
				
					@include('category::manageSubCategory',['subcategories' => $subcategory->subcategories])

			</div>
		</div>
	@endif
</div>
@endforeach