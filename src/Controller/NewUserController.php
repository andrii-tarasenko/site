<?php
class NewUserController
{
    /**
     * Handles a request to create a new user.
     *
     * @param array $postData The data submitted via the request.
     *
     * @return bool False if any required field is missing or invalid, true otherwise.
     */
    public function handleRequest($postData)
    {
        // Validate input fields
        if (empty($postData['userName']) || empty($postData['email']) || empty($postData['password'])) {
            $response['success'] = false;
            $response['message'] = 'Field cannot be empty';

            echo json_encode($response);

            return false;
        } else {
            $userName = htmlspecialchars($_POST['userName'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['success'] = false;
                $response['message'] = 'Invalid email format';

                echo json_encode($response);

                return false;
            }

            // Validate password length
            if (strlen($password) < 6) {
                $response['success'] = false;
                $response['message'] = 'Password must be at least 6 characters long';

                echo json_encode($response);

                return false;
            }

            // Check if client is already registered
            $clients = [
                ['id' => '1', 'email' => 'kathleen.miller@outlook.com', 'name' => 'John'],
                ['id' => '2', 'email' => 'jason.brown@yahoo.com', 'name' => 'Emma'],
                ['id' => '3', 'email' => 'anna.davis@hotmail.com', 'name' => 'Peter'],
                ['id' => '4', 'email' => 'david.jones@icloud.com', 'name' => 'Olivia'],
                ['id' => '5', 'email' => 'emily.wilson@gmail.com', 'name' => 'David'],
            ];

            $result = $this->checkClient($email, $clients);

            // Return success response or error message
            if ($result == false) {
                $response['success'] = false;
                $response['message'] = 'You are already registered';
            } else {
                $response['success'] = true;
                $response['message'] = 'You are registered now';
            }

            echo json_encode($response);
        }
    }

    /**
     * Checks if the client is already registered.
     *
     * @param string $email The email address to check.
     * @param array $clients The array of registered clients.
     *
     * @return bool True if the client is registered, false otherwise.
     */
    public function checkClient($email, $clients) {
        $result = false;

        foreach ($clients as $client) {
            if ($client['email'] == $email) {
                $result = true;
            }
            $this->log($email, $result);
        }

        return $result;
    }

    /**
     * Logs the email address and result of the client check.
     *
     * @param string $data The email address to log.
     * @param bool $result The result of the client check.
     *
     * @return void
     */
    public function log ($data, $result) {
        $log_file = '../../var/log.txt';
        $success = 'Not found';

        if ($result) {
            $success = 'знайдено';
        }

        $log = "Email $data " . $success . " в масиві клієнтів.\n";

        file_put_contents($log_file, $log, FILE_APPEND);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = new NewUserController();
    $newUser->handleRequest($_POST);
}





