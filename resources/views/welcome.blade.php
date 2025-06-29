<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .status-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        .status-icon {
            font-size: 64px;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        h1 {
            margin: 0 0 10px 0;
            font-weight: 600;
        }

        p {
            margin: 10px 0;
            line-height: 1.5;
            color: #666;
        }

        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #4CAF50;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        .server-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            text-align: left;
            font-family: monospace;
            font-size: 14px;
        }

        .info-item {
            margin: 8px 0;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="status-container">
        <div class="status-icon">✓</div>
        <h1>Web Server is Running</h1>
        <p><span class="status-indicator"></span> Server is active and responding to requests</p>

        <div class="server-info">
            <div class="info-item">
                <span class="info-label">Status:</span> <span id="status">Operational</span>
            </div>
            <div class="info-item">
                <span class="info-label">Date/Time:</span> <span id="datetime"></span>
            </div>
            <div class="info-item">
                <span class="info-label">Environment:</span> <span id="environment">Production</span>
            </div>
        </div>
    </div>

    <script>
        // Update datetime in real-time
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZoneName: 'short'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('en-US', options);
        }

        // Initial update
        updateDateTime();

        // Update every second
        setInterval(updateDateTime, 1000);

        // Optional: Detect HTTPS
        if (window.location.protocol === 'https:') {
            document.getElementById('environment').textContent = 'Secure Production (HTTPS)';
        }else{
            document.getElementById('environment').textContent = 'Secure Production (HTTP)';
        }

        // Optional: Simulate periodic status checks
        setInterval(() => {
            // In a real app, this would be an AJAX request to check server health
            const statusElement = document.getElementById('status');
            statusElement.textContent = 'Operational';
            statusElement.style.color = '#4CAF50';
        }, 5000);
    </script>
</body>
</html>

