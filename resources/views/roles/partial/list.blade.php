@if (!is_null($roles))
    @foreach ($roles as $role)
        <tr>
            <td></td>
            <td><div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr($role->name, 0, 2))}}</span></div><a href="">{{$role->name}}</a></td>
            <td>{{$role->description}}</td>
            <td>{{$role->permissions->count()}}</td>
            <td>2</td>
            <td>
              @if($role->status == 1)
                    <div class="custom-control custom-switch custom-control-inline mb-1 mt-1">
                        <input type="checkbox" class="custom-control-input" id="switch{{$role->id}}" data-role-id="{{ $role->id }}" data-toggle="modal" data-role-status="{{ $role->status }}" data-target="#deleteModal{{$role->id}}" checked>
                        <label class="custom-control-label mr-1" for="switch{{$role->id}}"></label>
                    </div>
                    <div class="modal fade text-left deleteModel" id="deleteModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title white">Delete Role</h5>
                                    </div>
                                    <div class="modal-body">
                                        You are attempting to inactivate the role : {{$role->name}}. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        
                                        <button data-role-id="{{ $role->id }}" data-role-status="0" class="btn btn-warning ml-1 delete-record">
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @else
                    <div class="custom-control custom-switch custom-control-inline mb-1">
                        <input type="checkbox" class="custom-control-input" id="switch{{$role->id}}" data-role-id="{{ $role->id }}" data-toggle="modal" data-role-status="{{ $role->status }}" data-target="#deleteModal{{$role->id}}">
                        <label class="custom-control-label mr-1" for="switch{{$role->id}}"></label>
                    </div>
                    <div class="modal fade text-left deleteModel" id="deleteModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title white">Active Role</h5>
                                    </div>
                                    <div class="modal-body">
                                        You are attempting to activate the role : {{$role->name}}. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>

                                            <!--@method('DELETE')-->
                                            <button data-role-id="{{ $role->id }}" data-role-status="1" class="btn btn-primary ml-1 delete-record">
                                                <span class="d-none d-sm-block">Accept</span>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            </td>
            <td>
                <span class="text-nowrap">
                    <button class="btn btn-sm btn-icon me-2" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bx bx-edit"></i></button>
                </span>
            </td>
        </tr>
    @endforeach
@else
    <tr class="group">
       <td colspan="8" style="text-align:center">No records found!</td>
    </tr>
@endif