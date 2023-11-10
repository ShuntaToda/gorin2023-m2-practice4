<div>
  <h2>Login</h2>
  <div>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div>
        <span>Name</span>
        <input type="text" name="name">
      </div>
      <div>
        <span>Password</span>
        <input type="password" name="password">
      </div>
      @if(session("message"))
      <div>{{ session("message") }}</div>
      @endif
      <button type="submit">submit</button>
    </form>
  </div>
</div>