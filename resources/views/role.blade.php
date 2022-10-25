<!DOCTYPE html>
<html lang="TR-tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Role</title>

</head>
<body class="antialiased">
<div class="container mt-5">
    <div class="row col-6">
        <div class="mb-3 col-6">
            <label for="roleName" class="form-label">Role Name</label>
            <input type="text" class="form-control" id="roleName" placeholder="Pleas enter a role name">
        </div>
        <div class="mb-3">
            <button onclick="saveRole()" class="btn btn-success">Save</button>
        </div>
    </div>
    <div class="row col-6">
        <div class="mb-3 col-6">
            <label for="permissionName" class="form-label">Permission Name</label>
            <input type="text" class="form-control" id="permissionName" placeholder="Pleas enter a permission name">
        </div>
        <div class="mb-3">
            <button onclick="savePermission()" class="btn btn-success">Save</button>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   function saveRole(){
       $.ajax({
           url: '{{ route("save_role") }}',
           method: 'post',
           data:{
                roleName: $('#roleName').val()
           },
           success: function (res){
                alert(res.message)
           }
       })
   }

    function savePermission(){
        $.ajax({
            url: '{{ route('save_permission') }}',
            method: 'post',
            data:{
                permissionName: $('#permissionName').val()
            },
            success: function (res){
                alert(res.message)
            }
        })
    }
</script>

</body>
</html>
