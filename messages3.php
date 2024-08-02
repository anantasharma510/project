<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA First Semester Chat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>BCA First Semester Chat</h1>
    </header>
    <section id="main-content">
        <div id="chat-window">
            <ul id="chat-messages">
                <?php include 'chat.php'; ?>
            </ul>
            <form action="send_message.php" method="post">
                <input type="text" name="message" id="message-input" placeholder="Type your message...">
                <button type="submit">Send</button>
            </form>
        </div>
    </section>
</body>
</html>
