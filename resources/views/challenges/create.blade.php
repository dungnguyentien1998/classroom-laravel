@extends('challenges.base')

@section('action-content')

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Answer for challenge</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/challenges/submit/{{$data[0]->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"> Challenge name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$data[0]->name}}" readonly>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Hint</label>

                                <div class="col-md-6">
                                    <input id="hint" type="text" class="form-control" name="hint" value="{{$data[0]->hint}}" readonly>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Your answer</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="answer" required>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Submit"/>
                            </div>
                            <br/>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>

    </section>

    </div>
@endsection
