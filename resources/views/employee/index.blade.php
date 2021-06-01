@extends('employee.layout')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <lable>Name</label>
            <input type="text" name="" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <lable>Email</label>
            <input type="email" name="" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <lable>Phone</label>
            <input type="tel" name="" class="form-control" placeholder="Enter Phone Number">
        </div>
        <div class="input-group">
            <div class="custom-file">
                <lable class="custom-file-label">Image</label>
                <input class="custom-file-input" type="file">
            </div>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
    </form>
@endsection
