@include("header")

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>memo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->memo }}</td>
      <td>
        <div>
          <a href="{{ route('admin.showUser', $user->id) }}">表示</a>
          @if($user->role != "admin")
          <a href="{{ route('admin.editUser', $user->id) }}">編集</a>
          <form action="{{ route('admin.deleteUser', $user->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit">削除</button>
          </form>
          @endif
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>

<a href="{{ route('admin.createUser') }}">Create User</a>
@include("footer")