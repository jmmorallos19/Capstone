<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Return Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        .fine-section {
            margin-top: 20px;
            background-color: #f9fafb;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #e2e2e2;
        }
        .fine-section h4 {
            color: #e74c3c;
            margin-top: 0;
        }
        .fine-section p {
            font-size: 1rem;
            margin-bottom: 10px;
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
        <p>We hope this email finds you well.</p>
        <p>This is to confirm the successful return of the following book(s) that you have borrowed from the ICC Library:</p>

        <ul>
            <li><strong>Book Title:</strong> {{ $memberBook->bookCopy->title ?? $memberBook->book->title }}</li>
            <li><strong>Returned By:</strong> {{ $memberBook->member->name }}</li>
            <li><strong>Return Date:</strong> {{ \Carbon\Carbon::now()->toFormattedDateString() }}</li>
            <li><strong>Returned To:</strong> ICC Library</li>
        </ul>

        <p><strong>Total Fines:</strong> ₱{{ $memberBook->member->total_fines }}</p>

        @if($memberBook->member->fines > 0)
            <div class="fine-section">
                <h4>Outstanding Fines:</h4>
                <p>As of the return date, there is an outstanding fine of <span class="highlight">₱{{ $memberBook->member->fines }}</span> for overdue items.</p>
                <p>Please settle the fine at the library or contact us for payment details.</p>
            </div>
        @else
            <p>We are happy to inform you that there are no outstanding fines on your account at the moment.</p>
        @endif

        <p>Thank you for returning the book(s) on time. We appreciate your cooperation in maintaining the availability of our resources for others.</p>

        <p>If you have any further questions or need assistance with any other library services, feel free to contact us.</p>

        <p>Thank you for being a valued member of the ICC Library community.</p>

        <div class="footer">
            <p>Sincerely,</p>
            <p><strong>ICC Library</strong></p>
            <p><strong>Contact Information:</strong><br>Facebook: <a href="https://www.facebook.com/ICCLRCdept">ICC Library</a></p>
        </div>
    </div>
</body>
</html>
