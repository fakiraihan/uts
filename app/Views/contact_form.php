<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        textarea {
            height: 150px;
            resize: vertical;
        }
        button {
            display: inline-block;
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .success {
            color: #256029;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quiz Feedback Form</h1>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('feedback/submit') ?>" method="post">
            <?= csrf_field() ?>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="feedback_type">Feedback Type:</label>
            <select name="feedback_type" id="feedback_type">
                <option value="suggestion">Suggestion</option>
                <option value="bug_report">Bug Report</option>
                <option value="question">Question</option>
                <option value="content_improvement">Content Improvement</option>
                <option value="other">Other</option>
            </select>
            
            <label for="related_quiz">Related Quiz (Optional):</label>
            <input type="text" name="related_quiz" id="related_quiz">
            
            <label for="message">Your Feedback:</label>
            <textarea name="message" id="message" required placeholder="Please share your thoughts, suggestions or report any issues you encountered while taking our quizzes..."></textarea>
            
            <button type="submit">Submit Feedback</button>
        </form>
        
        <a href="<?= base_url() ?>" class="back-link">← Back to Quiz Dashboard</a>
    </div>
</body>
</html>
