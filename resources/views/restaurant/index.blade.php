<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
</head>
<body>
<h1>Restaurants</h1>
<a href="{{ route('restaurants.create') }}" class="btn btn-primary">Create Restaurant</a>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->id }}</td>
            <td>{{ $restaurant->name }}</td>
            <td>{{ $restaurant->address }}</td>
            <td>{{ $restaurant->phone }}</td>
            <td>{{ $restaurant->email }}</td>
            <td>{{ $restaurant->category->name }}</td>
            <td>
                <a href="{{ route('restaurants.show', $restaurant) }}" class="btn btn-info">Show</a>
                <a href="{{ route('restaurants.edit', $restaurant) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
