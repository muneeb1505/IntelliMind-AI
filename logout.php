<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Chatbot System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body { padding: 20px; }
        #response { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Multi-Chatbot System</h1>
    <label for="domain">Select Domain:</label>
    <select id="domain" class="form-select mb-3">
        <option value="health">Healthcare</option>
        <option value="education">Educational</option>
        <option value="business">Business</option>
    </select>

    <div class="mb-3">
        <textarea id="text" class="form-control" rows="5" placeholder="Enter your query here..."></textarea>
    </div>
    <button id="send" class="btn btn-primary">Send</button>

    <div id="response" class="mt-3"></div>

    <h2>My Searches</h2>
    <div id="mySearches"></div>
</div>

<script>
    document.getElementById('send').addEventListener('click', () => {
        const text = document.getElementById('text').value;
        const domain = document.getElementById('domain').value;

        axios.post('response.php', { text: text, domain: domain })
            .then(response => {
                document.getElementById('response').innerHTML = `<div class='alert alert-success'>${response.data}</div>`;
                loadSearches();
            })
            .catch(error => console.error('Error:', error));
    });

    function loadSearches() {
        axios.get('searches.php')
            .then(response => {
                document.getElementById('mySearches').innerHTML = response.data;
            })
            .catch(error => console.error('Error:', error));
    }

    loadSearches(); // Load searches on page load
</script>

</body>
</html>