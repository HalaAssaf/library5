@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Books</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Books</span>
						</div>
					</div>
					
				</div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.css">

    <h1 align="left">all book</h1>
    <div dir="auto" >
   <div class="col-md-10 " >
                <table class="table table-bordered">
                    <thead class="thead-dark" >
                        <tr>
                            <th scope="col">Book ID</th>
                            <th scope="col">Book title</th>
                            <th scope="col">Book author</th>
                            <th scope="col">Book Sub Category</th>
                            <th scope="col">Book Main Category</th>
                            
                        </tr>
                    </thead>
                    <tbody>
      @foreach($book as $item)

        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->title}}</td>
          <td>{{$item->author}}</td>
          <td>{{$item->subcategory->name}}</td>
          <td>{{$item->mainCategory()->name}}</td>
          
          
        </tr>
        
       
        @endforeach
        
      </tbody>
    </table>
    </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
				
@endsection
@section('content')
				<!-- row -->
				<div class="row">

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection