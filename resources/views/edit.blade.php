@extends('create');

@section('editTitle',$item->title)

@section('editBody',$item->body)

@section('method')
{{method_field('PUT')}}
@endsection

@section('editId',$item->id)