@extends('admin.layouts.master')
@section('title')
    candidates
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this candidate ?</h5>
                </div>
                <form class="modal-footer text-center">
                    <a style="cursor: pointer;" class="custom-btn green-bc modalDLTBTN">Delete</a>
                    <a style="cursor: pointer;" class="custom-btn red-bc" data-dismiss="modal">Close</a>
                </form>
            </div>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>candidates</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">candidates</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="load-spinner" style="display: none;">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr >
                            <th class="text-center">#</th>
                            <th class="text-center">name</th>
                            <th class="text-center">email</th>
                            <th class="text-center">phone</th>
                            <th class="text-center">mobile</th>
                            <th class="text-center">gender</th>
                            <th class="text-center">birthdate</th>
                            <th class="text-center">country</th>
                            <th class="text-center">city</th>
                            <th class="text-center">fields</th>
                            <th class="text-center">cv</th>
                            <th class="text-center">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($candidates as $index => $candidate)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->email}}</td>
                                <td>{{$candidate->phone}}</td>
                                <td>{{$candidate->mobile}}</td>
                                <td>{{$candidate->gender}}</td>
                                <td>{{$candidate->birthdate}}</td>
                                <td>{{$candidate->country}}</td>
                                <td>{{$candidate->city}}</td>
                                <td>{{$candidate->fields}}</td>
                                <td><a href="{{asset('storage/uploads/careers/'.$candidate->cv)}}" download>Download</a></td>
                                <td class="text-center">

                                    <button data-url="{{route('admin.candidates.delete',['id' => $candidate->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection