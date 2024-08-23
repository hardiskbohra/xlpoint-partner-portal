<form action="{{ route('users.update', $user->id) }}" method="POST" id="editUserForm">
            <input type="hidden" name="_method" value="PUT" />
    @csrf
    <div class="card-content">
        <div class="card-body pt-0">
            <h6>First Name</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <?php
                    $firstname = explode(' ',$user->name)[0];
                    $lastname = explode(' ',$user->name)[1];
                ?>
                <input type="text" class="form-control" name="first_name" id="userFname" placeholder="" value="{{ $firstname }}">
                <div class="form-control-position">
                    <i class="bx bx-user"></i>
                </div>
                <span id="first_nameError" style="color: red;"></span>
            </fieldset>
            <h6>Last Name</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control" name="last_name" id="userLname" placeholder="" value="{{ $lastname }}">
                <div class="form-control-position">
                    <i class="bx bx-user"></i>
                </div>
                <span id="last_nameError" style="color: red;"></span>
            </fieldset>
            <h6>Mobile Number</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="number" class="form-control" name="mobile_number" id="userMobile" placeholder="" value="{{ $user->mobile_number }}">
                <div class="form-control-position">
                    <i class="bx bx-mobile-alt"></i>
                </div>
                <span id="mobile_numberError" style="color: red;"></span>
            </fieldset>
            <h6>Username</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control" name="email" id="userUsername" placeholder="" value="{{ $user->email }}">
                <div class="form-control-position">
                    <i class="bx bx-face"></i>
                </div>
                <span id="emailError" style="color: red;"></span>
            </fieldset>
            <h6>Password</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="password" class="form-control" name="password" id="userPass" placeholder="">
                <div class="form-control-position">
                    <i class="bx bx-lock-open-alt"></i>
                </div>
                <span id="passwordError" style="color: red;"></span>
            </fieldset>
            <h6>Confirm Password</h6>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="password" class="form-control" id="userConfirmPass" name="password_confirmation" placeholder="">
                <div class="form-control-position">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <span id="password_confirmationError" style="color: red;"></span>
            </fieldset>
            <h6>Role</h6>
            <div class="input-group">
                <select class="form-control" name="role_id" id="userRole">
                    <option selected>Choose</option>
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Manager</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Partner</option>
                    <option value="4" {{ $user->role_id == 4 ? 'selected' : '' }}>User</option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02" style="font-size:12px">Roles</label>
                </div>
            </div>
            <span id="userRoleError" style="color: red;"></span>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end pt-0">
        <button type="button" class="update-user-button btn btn-primary" id="updateUser">
            <i class='bx bx-send mr-25'></i> <span class="d-sm-inline d-none">Update</span>
        </button>
    </div>
</form>
