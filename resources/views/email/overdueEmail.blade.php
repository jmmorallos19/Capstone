<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Overdue Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        p {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            font-size: 1rem;
            margin: 10px 0;
        }
        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }
        .footer {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-top: 30px;
            text-align: center;
        }
        .footer a {
            color: #2980b9;
            text-decoration: none;
        }
        .footer p {
            margin: 5px 0;
        }
        .fine-section {
            background-color: #f9fafb;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #e2e2e2;
            margin-top: 20px;
        }
        .fine-section h4 {
            color: #e74c3c;
            margin-top: 0;
        }
        .fine-section p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dear {{ $memberBook->member->name }},</h2>
        <p>We hope this message finds you well.</p>
        <p>This is a friendly reminder from <strong>ICC Library</strong> regarding the book(s) you borrowed. According to our records, the following item(s) are now overdue:</p>
        
        <ul>
            <li><strong>Lender:</strong> {{ $memberBook->user->firstname . " "  .  $memberBook->user->lastname }}</li>
            <li><strong>Borrower:</strong> {{ $memberBook->member->name }}</li>
            <li><strong>Book Title:</strong> {{ $memberBook->bookCopy->title ?? $memberBook->book->title }}</li>
            <li><strong>Borrowed Date:</strong> {{ \Carbon\Carbon::parse($memberBook->borrowed_at)->toFormattedDateString() }}</li>
            <li><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($memberBook->due_date)->toFormattedDateString() }}</li>
            <li><strong>Fines:</strong> ₱{{ $memberBook->fines }}</li>
        </ul>

        <p>As of today, the book has surpassed the due date. Please be advised that overdue fines have been applied to your account. Currently, your fine stands at <span style="font-weight: bold">₱15</span> for the first day of overdue, and it will increase by <span style="font-weight: bold;">₱10</span> for each additional day the book remains unreturned. The fine will continue to accumulate until the book is returned.</p>
        
        <div class="fine-section">
            <h4>Fine Structure:</h4>
            <ul>
                <li><span class="highlight">Initial Fine:</span> ₱15 (charged immediately after the due date)</li>
                <li><span class="highlight">Daily Fine:</span> ₱10 (charged for each day the book is overdue)</li>
            </ul>
        </div>

        <p>To avoid further fines and inconvenience, we kindly ask that you return the book(s) as soon as possible. You may return them in person at the library or reach out to us for assistance with the return process.</p>

        <p>If you have any questions or need further information, please don’t hesitate to contact us. We appreciate your cooperation and look forward to resolving this matter swiftly.</p>

        <p>Thank you for using <strong>ICC Library</strong>.</p>

        <div class="footer">
            <p>Sincerely,</p>
            <p>
                @if ($memberBook->user->role !== "staff")
                    <br>Library Admin<br>
                @else
                    <br>Library Staff<br>
                @endif
                <strong>ICC Library</strong>
            </p>
            <p><strong>Contact Information:</strong><br>Facebook: <a href="https://www.facebook.com/ICCLRCdept">ICC Library</a></p>
        </div>
    </div>
</body>
</html>
