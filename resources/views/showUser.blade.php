@include("header")
<div>
  <div>
    <h2>Create User</h2>
    <div>
      <div>
        <span>Name</span>
        <span>{{ $user->name }}</span>
      </div>
      <div>
        <span>Email</span>
        <span>{{ $user->email }}</span>
      </div>
      <div>
        <span>Memo</span>
        <span>{{ $user->memo }}</span>
      </div>
      <div>
        <span>Created at</span>
        <span>{{ $user->created_at }}</span>
      </div>
      <div>
        <span>Role</span>
        <span>{{ $user->role }}</span>
      </div>
      <div>
        <span>Is Active</span>
        <span>{{ $user->is_active }}</span>
      </div>
    </div>
  </div>
</div>
@include("footer")