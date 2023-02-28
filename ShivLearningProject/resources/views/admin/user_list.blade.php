@extends('admin.layouts.guest')
@section('content')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Color Table</h6>
        <table class="table table-dark">
            <a style="margin-left:94%;" href="{{route('view.add.user')}}"><button class="btn btn-primary">Add User</button></a>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone no</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userDetails as $key => $value)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->phone}}</td>
                    <td>
                        <input data-id="{{$value->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $value->user_status ? 'checked' : '' }}>
                    </td>
                    <td>
                        <a href="{{route('view.profile',$value->id)}}"><i class="fa fa-eye"></i></a>
                        <a href="{{route('edit.profile',$value->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('delete.user',$value->id)}}"><i class="fa fa-trash"></i></a>
                        <a href="{{route('chat')}}"><i class="fa fa-sms"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('custom_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.toggle-class').change(function() {
            var user_status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            $.ajax({
                type: "post",
                url: "{{route('change.status')}}",
                data: {
                    'user_status': user_status,
                    'user_id': user_id,
                    '_token': token,
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    });
</script>
@endsection