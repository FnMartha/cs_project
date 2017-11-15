<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/13/17
 * Time: 3:30 PM
 */

namespace App\Controllers;


use App\AppInterface\PaymentInterface;
use App\DBManager\DB;
use App\Models\Payment;


class PaymentController implements PaymentInterface
{
    public function create(Payment $payment)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("INSERT INTO payments(txn_id, mpesa_code, phone_number, amount, house_id, status)
                          VALUES (:txn_id, :mpesa_code, :phone_number, :amount, :house_id, :status)");

            $stmt->bindValue(':txn_id', $payment->getTxnId(), \PDO::PARAM_STR);
            $stmt->bindValue(':mpesaCode', $payment->getMpesaCode(), \PDO::PARAM_STR);
            $stmt->bindValue(':phone_number', $payment->getPhoneNumber(), \PDO::PARAM_STR);
            $stmt->bindValue(':amount', $payment->getAmount());
            $stmt->bindValue(':house_id', $payment->getHouseId(), \PDO::PARAM_INT);
            $stmt->bindValue(':status', $payment->getStatus(), \PDO::PARAM_STR);

            if ($stmt->execute()) {
                return true;
            } else {
                return [
                    'error' => $stmt->errorInfo()[2]
                ];
            }
        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public function update(Payment $payment, $id)
    {

        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("UPDATE payments SET txn_id=:txn_id, mpesa_code=:mpesa_code, phone_number=:phone_number,
                                amount=:amount, house_id=:house_id, status=:status
                                WHERE id=:id");


            $stmt->bindParam(':id', $id);
            $stmt->bindValue(':txn_id', $payment->getTxnId(), \PDO::PARAM_STR);
            $stmt->bindValue(':mpesaCode', $payment->getMpesaCode(), \PDO::PARAM_STR);
            $stmt->bindValue(':phone_number', $payment->getPhoneNumber(), \PDO::PARAM_STR);
            $stmt->bindValue(':amount', $payment->getAmount());
            $stmt->bindValue(':house_id', $payment->getHouseId(), \PDO::PARAM_INT);
            $stmt->bindValue(':status', $payment->getStatus(), \PDO::PARAM_STR);

            if ($stmt->execute()) {
                return true;
            } else {
                return [
                    'error' => $stmt->errorInfo()[2]
                ];
            }
        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function getId($txnId)
    {
        $db = new DB();
        $conn = $db->connect();
        try {

            $stmt = $conn->prepare("SELECT t.* FROM  payments t WHERE  t.txn_id=:txn_id");
            $stmt->bindParam(":txn_id", $txnId, \PDO::PARAM_STR);
            if ($stmt->execute() && $stmt->rowCount() == 1) {
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } elseif ($stmt->execute() && $stmt->rowCount() > 1) {
                return [
                    "error" => "Multiple rows returned"
                ];
            } else {
                return [
                    "error" => $stmt->errorInfo()[2]
                ];
            }

        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("DELETE FROM payments WHERE id=:id");
            $stmt->bindParam(":id", $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return [
                    "error" => $stmt->errorInfo()[2]
                ];
            }
        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT t.* FROM payments t WHERE 1");
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                return [
                    "error" => $stmt->errorInfo()[2]
                ];
            }
        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function completeTxn($txnId)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("UPDATE payments SET status='paid' WHERE txn_id=:txn_id");
            $stmt->bindParam(":txn_id", $txnId);
            if ($stmt->execute()) {
                return true;
            } else {
                return [
                    "error" => $stmt->errorInfo()[2]
                ];
            }
        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

}