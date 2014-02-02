@extends('layouts.main')

@section('content')
    <div id="admin">
        <h1>Categories Admin Panel</h1>
        <p>Here you can view, delete and create new categories.</p>
        <h2>Categories</h2><hr/>
        <ul>
            @foreach($categories as $category)
                <li>
                    {{ $category->name }} -
                    {{ Form::open(array('url' => 'admin/categories/destroy', 'class' => 'form-inline')) }}
                    {{ Form::hidden('id', $category->id) }}
                    {{ Form::submit('delete') }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
        <h2>Create New Category</h2> <hr>

    @if($errors->has())
        <div id="form-errors">
            <p>The following errors have occurred:</p>
            <ul>
               @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach 
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => 'admin/categories/create')) }}
    <p>
        {{ Form::label('name') }}
        {{ Form::text('name') }}
    </p>
    {{ Form::submit('Create Category', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}
    </div>
@stop