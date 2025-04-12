<?php

namespace App\Models;

class User
{
    private static $file = __DIR__ . "/../../storage/users.json";

    private static function loadData()
    {
        if (!file_exists(self::$file)) {
            file_put_contents(self::$file, json_encode([]));
        }

        $json = file_get_contents(self::$file);
        return json_decode($json, true);
    }

    private static function saveData($data)
    {
        file_put_contents(self::$file, json_encode($data, JSON_PRETTY_PRINT));
    }

    public static function all()
    {
        return self::loadData();
    }

    public static function store($name, $email, $password, $address = '', $phone = '', $birthdate = '')
    {
        $users = self::loadData();

        $lastId = 0;
        if (!empty($users)) {
            $lastId = end($users);
            $lastId = $lastId['id'];
        }

        $newUser = [
            'id' => $lastId + 1,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'phone' => $phone,
            'birthdate' => $birthdate,
        ];

        $users[] = $newUser;
        self::saveData($users);
    }

    public static function find($id)
    {
        $users = self::loadData();

        foreach ($users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }

        return null;
    }

    public static function update($id, $name, $email, $address = '', $phone = '', $birthdate = '')
    {
        $users = self::loadData();

        foreach ($users as $index => $user) {
            if ((int)$user['id'] === (int)$id) {
                $users[$index]['name'] = $name;
                $users[$index]['email'] = $email;
                $users[$index]['address'] = $address;
                $users[$index]['phone'] = $phone;
                $users[$index]['birthdate'] = $birthdate;
                break;
            }
        }

        self::saveData($users);
    }

    public static function delete($id)
    {
        $users = self::loadData();

        $users = array_filter($users, fn($user) => $user['id'] != $id);

        $users = array_values($users);

        self::saveData($users);
    }

    public static function existsByEmail($email, $ignoreId = null)
    {
        $users = self::loadData();

        foreach ($users as $user) {
            if ($user['email'] === $email && $user['id'] != $ignoreId) {
                return true;
            }
        }

        return false;
    }
}