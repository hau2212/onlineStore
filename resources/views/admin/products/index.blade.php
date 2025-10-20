@extends('layout.admin')
@section('title' , $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Create Products
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors as $erros)
                        <li>- {{ $erros }} </li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.products.store') }}"  enctype="multipart/form-data">
                @csrf 
                
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name: </label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <input name="name" value="{{ old('name') }}" type="text" class="form-controll"/>
                </div>

                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price: </label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <input name="price" value="{{ old('price') }}" type="number" class="form-controll" />
                </div>

                <div>   
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3"> {{ old('description')}}</textarea>
                </div>

                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                    <input class="form-control" type="file" name="image">
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>

    </div>
/* xuat du lieu va quan ly EDIT va Delete */
    <div class="card">
        <div class="card-header">   
            manage product
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($viewData['products'] as $product )
                        <tr>
                            <td> {{ $product->getID() }} </td>
                            <td> {{ $product -> getName() }} </td>
                            <td>
                            
                                <a class='btn btn-primary'
                                    href='{{ route('admin.products.edit' , ['id' => $product->getID()])}}'>
                                    <i class="bi-pencil"></i>
                                </a>    
                            </td>
                            
                            <td>
                                <form action="{{ route('admin.product.delete' , $product -> getID() ) }}" method="POST">
                                    @csrf
                                     @method('DELETE')
                                    <button class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div> 
    
        
    
@endsection