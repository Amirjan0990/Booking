<!DOCTYPE html>
<html>
<head>
    <title>Edit Restaurant</title>
</head>
<body>
<h1>Edit Restaurant</h1>

<form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $restaurant->name }}" required>
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="{{ $restaurant->address }}" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $restaurant->phone }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $restaurant->email }}" required>
    </div>
    <div>
        <label for="category_rest_id">Category:</label>
        <select name="category_rest_id" id="category_rest_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $restaurant->category_rest_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Update</button>
</form>
</body>
</html>
