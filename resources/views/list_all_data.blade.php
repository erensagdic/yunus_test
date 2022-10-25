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
    <div class="row">
        <div class="col-6">
            <h4>Permissions</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Permission Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <th scope="row">{{ $permission->id }}</th>
                        <td><input class="form-control" type="text" name="permissionName"
                                   value="{{ $permission->permission_name }}"></td>
                        <td>
                            <button onclick="updatePermission({{ $permission->id }}, $(this))" class="btn btn-success">Update</button>
                            <button onclick="deletePermission({{ $permission->id }} , $(this))" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-6">
            <h4>Roles</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>
                            <input type="text" class="form-control" name="roleName" value="{{ $role->role_name }}">
                        </td>
                        <td>
                            <button onclick="updateRole({{ $role->id }}, $(this))" class="btn btn-success">Update</button>

                            <button onclick="deleteRole({{ $role->id }}, $(this))" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
    function updateRole(roleId, _this){
        const role = _this.closest('tr').find('input')
        $.ajax({
            url: '{{ route("update_role") }}',
            method: 'post',
            data:{
                roleName: role.val(),
                roleId: roleId
            },
            success: function (res){
                alert(res.message)
            }
        })
    }
    function deleteRole(roleId, _this){
            $.ajax({
                url: '{{ route("delete_role") }}',
                method: 'post',
                data:{
                    roleId: roleId
                },
                success: function (res){
                    alert(res.message)
                    if(!res.error){
                        _this.closest('tr').remove()
                    }
                }
            })
        }

    function updatePermission(permissionId, _this){
        const permission = _this.closest('tr').find('input')
        $.ajax({
            url: '{{ route('update_permission') }}',
            method: 'post',
            data:{
                permissionName: permission.val(),
                permissionId: permissionId
            },
            success: function (res){
                alert(res.message)
            }
        })
    }
    function deletePermission(permissionId, _this){
        $.ajax({
            url: '{{ route('delete_permission') }}',
            method: 'post',
            data:{
                permissionId: permissionId
            },
            success: function (res){
                alert(res.message)
                if(!res.error){
                    _this.closest('tr').remove()
                }
            }
        })
    }

</script>

</body>
</html>
