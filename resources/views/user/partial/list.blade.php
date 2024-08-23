  @foreach ($users as $user)
    @if($user->status == 1)
        <tr>
            <td>{{$user->id}}</td>
            <td>
                <div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr($user->name, 0, 2))}}</span></div><a href="">{{$user->name}}</a>
            </td>
            <td class="text-bold-300">{{$user->email}}</td>
            <td class="text-bold-300">{{$user->mobile_number}}</td>
            <td class="text-bold-300">{{empty($user->role) ? '-' : $user->role->name}}</td>
            <td>
                <div class="custom-control custom-switch custom-control-inline mb-1">
                    <input type="checkbox" class="custom-control-input" id="switch{{$user->id}}" data-user-id="{{ $user->id }}" data-toggle="modal" data-user-status="{{ $user->status }}" data-target="#deleteModal{{$user->id}}" checked>
                    <label class="custom-control-label mr-1 mt-1" for="switch{{$user->id}}"></label>
                </div>
                <div class="modal fade text-left deleteModel" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title white">Delete User</h5>
                            </div>
                            <div class="modal-body">
                                You are attempting to inactivate the user : {{$user->name}}. Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                
                                <button data-user-id="{{ $user->id }}" data-user-status="0" class="btn btn-warning ml-1 delete-record">
                                    <span class="d-none d-sm-block">Accept</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <span class="text-nowrap row">
                    <button class="btn btn-sm btn-icon me-2 edit-user-button" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="{{ $user->id }}">
                        <i class="bx bx-edit"></i>
                    </button>
                </span>
            </td>
        </tr>
    @else
        <tr>
            <td>{{$user->id}}</td>
            <td>
                <div class="avatar mr-1 bg-warning bg"><span class="avatar-content">{{strtoupper(substr($user->name, 0, 2))}}</span></div>{{$user->name}}
            </td>
            <td class="text-bold-300">{{$user->email}}</td>
            <td class="text-bold-300">{{$user->mobile_number}}</td>
            <td class="text-bold-300">{{empty($user->role) ? '-' : $user->role->name}}</td>
            <td>
                <div class="custom-control custom-switch custom-control-inline mb-1">
                    <input type="checkbox" class="custom-control-input" id="switch{{$user->id}}" data-user-id="{{ $user->id }}" data-toggle="modal" data-user-status="{{ $user->status }}" data-target="#deleteModal{{$user->id}}">
                    <label class="custom-control-label mr-1 mt-1" for="switch{{$user->id}}"></label>
                </div>
                <div class="modal fade text-left deleteModel" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title white">Active User</h5>
                            </div>
                            <div class="modal-body">
                                You are attempting to activate the user : {{$user->name}}. Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>

                                    <!--@method('DELETE')-->
                                    <button data-user-id="{{ $user->id }}" data-user-status="1" class="btn btn-primary ml-1 delete-record">
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <span class="text-nowrap row">
                    <button class="btn btn-sm btn-icon me-2 edit-user-button" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="{{ $user->id }}">
                        <i class="bx bx-edit"></i>
                    </button>
                </span>
            </td>
        </tr>
    @endif
@endforeach