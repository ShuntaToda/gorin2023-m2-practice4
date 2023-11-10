@include("header")
<div>
  <div>
    <h2>Create User</h2>
    <div>
      <form action="{{ route('admin.createUser') }}" method="post">
        @csrf
        <div>
          <span>Name</span>
          <input type="text" name="name" required>
        </div>
        <div>
          <span>Email</span>
          <input type="email" name="email" required>
        </div>
        <div>
          <span>Memo</span>
          <input type="text" name="memo">
        </div>
        <div>
          <span>Password</span>
          <input type="password" name="password" required>
        </div>
        <div>
          <span>Password_confirmation</span>
          <input type="password" name="password_confirmation" required>
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