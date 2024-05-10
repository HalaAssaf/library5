@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Book</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add new book</span>
						</div>
					</div>
					
				</div>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.css">
				<h1 align="left" >create new book</h1>
				
    <div dir="auto" >
    <form action="{{route('book.store')}}" method="POST" >
        @csrf
		<label for="title">title:</label>
        <input name="title" type="text" placeholder="title"><br>
		<label for="author">author:</label>
        <input name="author" type="text" placeholder="author"><br>
		<label for="sub_category">Sub Category:</label>
        <select name="category_id" id="">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		
       
       
      <!--  <select name="available" id="">/
            <option value="1">true</option>
            <option value="0">false</option>
            
        </select>-->
        

        <input type="submit">
    </form>
</div>
				<!-- breadcrumb -->
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