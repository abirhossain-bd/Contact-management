@foreach ($users as $key => $user)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile }}</td>
        <td>
            <a href="{{ route('send.otp', $user->id) }}" class="btn btn-success" href="">Send
                Otp</a>
            <a href="{{ route('contact.show', $user->id) }}" class="btn btn-success" >Show</a>
            <a href="{{ route('contact.edit', $user->id) }}" class="btn btn-primary" >Edit</a>
            <a href="{{ route('contact.delete', $user->id) }}" class="btn btn-danger"> Delete</a>
            <a href="javascript:void(0);" class="btn btn-danger contact_destroy" data-id="{{ $user->id }}" >Destroy by Ajax</a>
        </td>
    </tr>
@endforeach
