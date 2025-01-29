@extends('layout.main-master')

@section('content')

<style>
    body {
        background-color: #0d1f4b; 
        background-image: url('{{ URL('images/1344914.jpeg') }}'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        color: #ffffff; 
    }

    .form-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: rgba(13, 31, 75, 0.9); 
        border-radius: 10px;
        border: 2px solid #80d6ff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5); 
    }

    form label {
        font-weight: bold;
        display: block;
        margin: 10px 0 5px;
        color: #80d6ff;
    }

    form input, form textarea, form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #00aaff;
        border-radius: 5px;
        background-color: #000000;
        color: #ffffff;
    }

    form input:focus, form textarea:focus, form select:focus {
        border-color: #80d6ff;
        outline: none;
    }

    form button {
        background-color: #00aaff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    form button:hover {
        background-color: #80d6ff;
    }

    form p {
        color: red;
        font-size: 14px;
    }

    .blogs-list {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: rgba(13, 31, 75, 0.9); 
        border-radius: 10px;
        border: 2px solid #80d6ff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5); 
    }

    .blogs-list h2 {
        color: #80d6ff;
        margin-bottom: 20px;
    }

    .scrollable-table {
        max-height: 300px; /* Adjust height as needed */
        overflow-y: scroll; /* Enables vertical scrolling */
        border: 1px solid #80d6ff;
    }

    .scrollable-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .scrollable-table th,
    .scrollable-table td {
        padding: 10px;
        border: 1px solid #80d6ff;
        text-align: left;
    }

    .scrollable-table th {
        background-color: #00aaff;
        color: white;
        position: sticky;
        top: 0; /* Keeps table headers visible while scrolling */
        z-index: 1;
    }

    .scrollable-table td {
        background-color: rgba(13, 31, 75, 0.9);
        color: #ffffff;
    }
</style>

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <form id="logoutForm" action="{{ route('logout') }}" method="GET">
            @csrf
            <button type="submit" style="
                background-color: red;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
            ">
                Logout
            </button>
        </form>
    </div>

<div class="container">
    <div class="form-container">
        <h1 style="text-align: center; color: #80d6ff;">Create Blog</h1>
        <form id="createBlogForm" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title') <p>{{ $message }}</p> @enderror

            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
            @error('description') <p>{{ $message }}</p> @enderror

            <label for="category">Category:</label>
            <select name="category_id" id="category_id" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p>{{ $message }}</p> @enderror

            <button type="submit">Save</button>
        </form>
    </div>

    <div class="blogs-list">
        <h2>Saved Blogs</h2>
        <div class="scrollable-table">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>{{ $blog->category->name ?? 'N/A' }}</td>
                            <td>{{ $blog->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type= "module">
    $(document).ready(function () {
        console.log('jQuery is working!');
    });
    
    const form = "#createBlogForm";

    $(function(){
        store();
    });

    function store() {
        $(form).on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('blogs.store') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    if (response.data) {
                        populateData(response.data);
                    }
                },
                error: function(response) {
                    alert(response.responseText);
                },
            });
        });
    }

    function populateData(data) {
    var row = "<tr>";
    row += "<td>" + data.title + "</td>";
    row += "<td>" + data.description + "</td>";
    row += "<td>" + (data.category ? data.category.name : 'N/A') + "</td>";
    row += "<td>" + data.created_at + "</td>";
    row += "</tr>";

    $("table").find('tbody').prepend(row);
}

</script>

@endsection
