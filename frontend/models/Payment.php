<?php

namespace frontend\models;

class Payment
{
    public $user_id;
    public $amount;
    public $time;
    public $id;
    public $tarrif_id;
    public $status;

    public function __construct($user, $amount = 10, $tarrif_id = 1, $status = 'wait')
    {
        $this->user_id = $user['id'];
        $this->time = time();
        if ($tarrif_id){
            $this->tarrif_id = $tarrif_id;
        }
        $this->amount = $amount;
        $this->status = $status;
    }

    public function save(){
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO payment (user_id, amount, created_at, tarrif_id, status) '
            . 'VALUES (:user_id, :amount, :created_at, :tarrif_id, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $result->bindParam(':amount', $this->amount, PDO::PARAM_INT);
        $result->bindParam(':created_at', $this->time, PDO::PARAM_INT);
        $result->bindParam(':tarrif_id', $this->tarrif_id, PDO::PARAM_INT);
        $result->bindParam(':status', $this->status, PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
    }
    public static function getPaymentById($id){
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM payment WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    public static function updateStatus($id, $status){
        $payment = self::getPaymentById($id);
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE payment
            SET 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }

}