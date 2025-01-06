<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Channel</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Edit Channel</h1>
        <form action="{{ route('channels.update', $channel->ChannelID) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <x-form-input
                type="text"
                name="ChannelName"
                label="Channel Name"
                :value="$channel->ChannelName"
                required="true" />
            <x-form-input
                type="textarea"
                name="Description"
                label="Description"
                :value="$channel->Description"
                required="true" />
            <x-form-input
                type="number"
                name="SubscribersCount"
                label="Subscribers Count"
                :value="$channel->SubscribersCount"
                required="true" />
            <x-form-input
                type="url"
                name="URL"
                label="URL"
                :value="$channel->URL"
                required="true" />
            <!-- <x-form-input 
                type="file" 
                name="image" 
                label="Channel Image" 
                :value="$channel->image ?? ''" 
                required="false"
                /> -->
            <x-form-input
                type="email" 
                name="Email"
                label="Email Address" 
                :value="$channel->Email" 
                required="true" />

            <button type="submit" class="btn btn-primary">Update Channel</button>
            <a href="{{ route('channels.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>