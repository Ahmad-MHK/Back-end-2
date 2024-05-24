<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Contact.css">
    <title>Contact Form</title>
</head>
<body>
    <div class="form-main">
        <div class="main-wrapper">
            <h2 class="form-head">Contact Form</h2>
            @if(session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
            <form class="form-wrapper" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="form-card">
                    <input class="form-input" type="text" name="full-name" required>
                    <label class="form-label" for="full-name">Full Name</label>
                </div>

                <div class="form-card">
                    <input class="form-input" type="email" name="email" required>
                    <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-card">
                    <input class="form-input" type="number" name="phone" required>
                    <label class="form-label" for="phone">Phone Number</label>
                </div>

                <div class="form-card">
                    <textarea class="form-textarea" maxlength="420" rows="3" name="message" required></textarea>
                    <label class="form-textarea-label" for="message">Message</label>
                </div>

                <div class="btn-wrap">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
