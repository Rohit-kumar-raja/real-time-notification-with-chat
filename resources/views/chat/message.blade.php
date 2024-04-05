<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="card">
            <div class="card-body p-4">

                <div style="height: 200px" class="border border-2 overflow-y-auto">
                    <span id="message"></span>
                </div>
                <form id="form_data" onsubmit="preventDefault.sendData()">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Message</label>
                        <textarea name="message" class="form-control"></textarea>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="{{ asset('build/assets/app-DVK_vcVb.js') }}"></script>
    <script>
        Echo.channel("mychannel").listen('TestEvent', (e) => {
            document.querySelector("#message").innerHTML += '<p>' + e.data + '</p>';
            sendNotification(e.data);

        })
    </script>


    <script>
        // Add event listener for form submission
        const form = document.querySelector('#form_data');
        form.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            // URL to which you want to send the POST request
            const url = "{{ route('user.create') }}";

            // Data you want to send in the request body
            formdata = new FormData(form)
            // Configuration for the fetch request
            const requestOptions = {
                method: 'POST', // Specify the HTTP metho
                body: formdata
            };

            // Make the POST request using fetch
            fetch(url, requestOptions)
                .then(response => {
                    // Check if the response is ok
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Parse the JSON response
                    return response.json();
                })
                .then(data => {
                    // Handle successful response
                    console.log('POST request successful:', data);
                    // Do something with the response data
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with the POST request:', error);
                });

            form.reset()
        })


        function spawnNotification(theBody, theIcon, theTitle) {
            const options = {
                body: theBody,
                icon: "https://logos-world.net/wp-content/uploads/2023/01/MTN-Logo.jpg",
            };

            const n = new Notification(theTitle, options);

            console.log(n.title);
        }

        function sendNotification(body) {
            if ('Notification' in window && navigator.serviceWorker) {
                Notification.requestPermission().then(function(result) {
                    if (result === 'granted') {
                        spawnNotification(body, 'no', "My Webiste")
                    }
                });
            }
        }
    </script>
</body>

</html>
