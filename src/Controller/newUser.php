<?php

class newUserController
{
    /**
     * getDatas
     *
     * @return bool
     */
    public function handleRequest()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Перевірка введення прізвища
            if (!isset($_POST['surname']) || empty($_POST['surname'])) {
                $errors[] = 'Поле прізвище не може бути порожнім';
            }

            // Перевірка введення email
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errors[] = 'Поле email не може бути порожнім';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Введіть коректний email';
            }

            // Перевірка введення паролів
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                $errors[] = 'Поле пароль не може бути порожнім';
            } elseif ($_POST['password'] !== $_POST['confirm_password']) {
                $errors[] = 'Паролі не співпадають';
            }

            if (empty($errors)) {
                // Якщо форма валідна, тоді можна зберегти дані користувача в базу даних або відправити email
                // Тут ми просто виводимо повідомлення про успішну реєстрацію
                echo 'Ваша реєстрація успішна!';
                return;
            }
        }

        // Відображення форми реєстрації з помилками
        include 'registration_form.php';
    }
}