<style>
    h1{
        padding-left:110px;
        color:teal;
    }
    tr{
        background-color:lightgoldenrodyellow
    };
</style>
<h1 >Todo List</h1>
<table border="1">
    <tr>
        <td>ID</td>
        <td>TITLE</td>
        <td>DESCRIPTION</td>
        <td>DEADLINE</td>
        <td>ACTION</td>
    </tr>
    @foreach($todo as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['title']}}</td>
        <td>{{$item['description']}}</td>
        <td>{{$item['deadline']}}</td>
        <td>
            <a  onclick="return confirm('Are you sure?')" href ="delete/{{ $item['id'] }}" style="text-decoration:none; color:darkred;">DELETE</a>
            
            <a href="edit/{{ Crypt::encryptString($item['id']) }}" style="text-decoration:none;">EDIT</a>
        </td>
    </tr>
    @endforeach
    


</table>