@include("header")
<div>
  <div>
    <h2>Edit User</h2>
    <div>
      <form action="{{ route('admin.editUser', $user->id) }}" method="post">
        @csrf
        @method("put")
        <div>
          <span>Name</span>
          <input  type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
          <span>Email</span>
          <input  type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
          <span>Memo</span>
          <input  type="text" name="memo" value="{{ $user->memo }}">
        </div>
        <div>
          <span>Is Active</span>
          <input  type="checkbox" name="is_active" {{ $user->is_active ? "checked" : "" }}>
        </div>
        @if($errors->first())
        <div>入力が間違っています</div>
        @endif
        @if(session("message"))
        <div>{{ session("message") }}</div>
        @endif
        <button type="submit">submit</button>
      </form>
    </div>
  </div>
</div>
@include("footer")